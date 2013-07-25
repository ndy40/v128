<?php

/**
 * Description of xml_handler
 *
 * @author Oliver Winks
 */
class import_handler extends CI_Model {
    
    private function parse_metadata($node, $object_id, $institution) {
        // convert element to data array
        $metadata_name['name'] = $node->getName();
        $metadata_name['description'] = '';
        $metadata_name['institution'] = (string) $institution;
//        $metadataname_data['alias'] = ''; // TODO: GET ALIAS ID FROM DB
        
        /*
         * This SQL statement checks whether a given metadata-name exists for a given institution,
         * If the name already exists then it isn't inserted again, instead it is updated. Without
         * this check the system would duplicate metadata-names for every cultural object that was
         * parsed (i.e. 1000 objects would result in 1000 duplications of the same metadata-names).
         */
//        $sql = "SELECT * FROM metadata_name n 
//            JOIN metadataname_has_institution ni ON n.metadataname_id = ni.metadataname_id 
//            JOIN institutions i ON i.institution_name = ni.institution_name 
//            WHERE n.name = '" . $metadataname_data['name'] . "' AND i.institution_name = '" . $institution_name . "'";
        $sql = "SELECT * FROM metadata_name 
            WHERE name = '" . $node->getName() . "' AND institution = '" . $institution . "'";

        $results = $this->db->query($sql)->result();
        if(empty($results)) {
            // metadata-name doesn't already exist, so insert it.
            $this->db->insert('metadata_name', $metadata_name);
        } else {
            $this->db->where('metadata_name_id', $results[0]->metadata_name_id);
            $this->db->update('metadata_name', $metadata_name);
        }

        // get the id of the metadata-name that was inserted or updated.
        $results = $this->db->query($sql)->result();
        $metadata_name_id = $results[0]->metadata_name_id;
        
        // parse metadata value
        $metadata_value['object'] = (string) $object_id;
        $metadata_value['metadata_name'] = $metadata_name_id;
        $metadata_value['value'] = '' . $node;
        
        /*
         * check if this metadata-value already exists for the given metadata-name. If it does 
         * then update it, else insert it.
         */
        $results = $this->db->get_where('metadata_value', array('object' => (string) $object_id, 'metadata_name' => $metadata_name_id))->result();
        if(empty($results)) {
            $this->db->insert('metadata_value', $metadata_value);
        } else {
            $this->db->where(array('object' => (string) $object_id, 'metadata_name' => $metadata_name_id));
            $this->db->update('metadata_value', $metadata_value);
        }
    }
    
    private function parse_media($media_xml, $object_id, $is_associated) {
        $data = array();
        
        $media_objects_xml = $media_xml->xpath('*');
        foreach($media_objects_xml as $media_object_xml) {
            $data['path'] = (string) $media_object_xml->MediaFileName;
            $data['name'] = (string) $media_object_xml->MediaTitle;
            $data['author'] = (string) '';
            $data['description'] = (string) $media_object_xml->MediaDescription;
            
            $media_type = $media_object_xml->MediaType;
            $results = $this->db->get_where('media_type', array('name' => (string) $media_object_xml->MediaType))->result();
            if(empty($results)) {
                // add new media type
                $this->db->insert('media_type', array('name' => (string) $media_type));
                $data['media_type'] = $this->db->insert_id();
            } else {
                // get media type id
                $data['media_type'] = $results[0]->media_type_id;
            }
            
            // check if media already exists new record to media table
            $results = $this->db->get_where('media', array('path' => (string) $data['path']))->result();
            if(empty($results)) {
                // insert new record
                $this->db->insert('media', $data);
                $media_id = $this->db->insert_id();
                
                // create mapping to object
                $this->db->insert('object_has_media', array(
                    'object' => (string) $object_id,
                    'media' => $media_id,
                    'is_associated' => $is_associated
                ));
            } else {
                // update record
                $media_id = $results[0]->media_id;
                $this->db->where('media_id', $media_id);
                $this->db->update('media', $data);
                
                // update mapping
                $this->db->where('media', $media_id);
                $this->db->update('object_has_media', array(
                    'object' => (string) $object_id,
                    'media' => $media_id,
                    'is_associated' => $is_associated
                ));
            }
        }
    }
    
    private function parse_related_objects($related_object_xml, $object_id) {
        $related_objects = $related_object_xml->xpath('*');
        foreach($related_objects as $related_object) {
            if(strtolower((string) $related_object) != (string) 'no data') {
                // check if this related object already exists in the db
                $results = $this->db->get_where('object_has_related_objects', array(
                    'object' => (string) $object_id,
                    'related_object' => (string) $related_object))->result();
                
                if(empty($results)) {
                    // add new record
                    $this->db->insert('object_has_related_objects', array(
                        'object' => (string) $object_id, 
                        'related_object' => (string) $related_object));
                }
            }
        }
    }
    
    private function parse_object($object_xml) {
        // get the museum this object is associated with
        $results = $this->db->get_where('institution', array('name' => (string) $object_xml->Museum));
        if(empty($results)) {
            // throw exception
        } else {
            // check if the object already exists in the db
            $results = $this->db->get_where('object', array('object_id' => (string) $object_xml->AccessionNumber))->result();
            if(empty($results)) {
                $this->db->insert('object', array(
                    'object_id' => (string) $object_xml->AccessionNumber
                ));
            }
        }
        
        // get the museum id this object is associated with
        $object_id = $object_xml->AccessionNumber;
        $institution = $object_xml->Museum;
        
        // parse metadata
        $children = $object_xml->children();
        foreach($children as $child) {
            // metadata name
            $metadataname_id = $this->parse_metadata($child, $object_id, $institution);
            
            if($child->getName() == 'MediaObjects') {
                $this->parse_media($child, $object_id, false);
            } else if($child->getName() == 'AssociatedMediaObjects') {
                $this->parse_media($child, $object_id, true);
            } else if($child->getName() == 'RelatedObjects') {
                $this->parse_related_objects($child, $object_id);
            }
        }
    }
    
    private function parse_institution($institution_xml) {
        // convert institution to data array
        $data['name'] = (string) $institution_xml->InstitutionName;
        $data['url'] = (string) $institution_xml->InstitutionUrl;
        $data['description'] = (string) $institution_xml->InstitutionDescription;
        
        // check if this institution already exists
        $results = $this->db->get_where('institution', array('name' => $data['name']))->result();
        if(empty($results)) {
            $this->db->insert('institution', $data);
        } else {
            // get institution id
            $this->db->where('name', $data['name']);
            $this->db->update('institution', $data);
        }
    }
    
    public function import_xml($filename) {
        $xml = simplexml_load_file($filename);
        
        // parse institutions
        $institutions_xml = $xml->xpath('Institutions/Institution');
        foreach($institutions_xml as $institution_xml) {
            $this->parse_institution($institution_xml);
        }
        
        // parse objects
        $objects_xml = $xml->xpath('CulturalObjects/CulturalObject');
        foreach($objects_xml as $object_xml) {
            $this->parse_object($object_xml);
        }
    }
    
}

?>
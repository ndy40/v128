<?php

include('browse.php');

/**
 * Description of BrowseXML
 *
 * @author Oliver Winks
 */
class Browse_XML extends Browse {
    
    function Browse_XML() {
        parent::Browse();
    }
    
    private function get_museum_xml($museum_name) {
        $return_xml = null;
        
        // get all xml files
        $dir = '../assets/XML';
        $dh = opendir($dir);
        
        // fill array of files
        $files = array();
        while(($file = readdir($dh)) !== false) {
            if(!is_dir($dir . '/' . $file)) {
                $museum_xml = simplexml_load_file($dir . '/' . $file);
                
                $institutionName = $museum_xml->xpath('Institutions/Institution[1]/InstitutionName');
                if(strcmp($institutionName[0], $museum_name) == 0) {
                    $return_xml = $museum_xml;
                    break;
                }
            }
        }
        closedir($dh);
        
        return $return_xml;
    }
    
    protected function num_museums() {
        // get all xml files
        $dir = '../assets/XML';
        $dh = opendir($dir);
        
        // fill array of files
        $i = 0;
        while(($file = readdir($dh)) !== false) {
            if(!is_dir($dir . '/' . $file))
                $i++;
        }
        closedir($dh);
        
        return $i;
    }
    
    protected function get_museum_names($limit, $offset) {
        // get all xml files
        $dir = '../assets/XML';
        $dh = opendir($dir);
        
        // fill array of files
        $files = array();
        while(($file = readdir($dh)) !== false) {
            if(!is_dir($dir . '/' . $file)) {
                $museum_xml = simplexml_load_file($dir . '/' . $file);
                
                $institutionName = $museum_xml->xpath('Institutions/Institution[1]/InstitutionName');
                array_push($files, $institutionName[0]);
            }
        }
        closedir($dh);
        
        // sort the array into this order
        $order = array(
            'Sierra Leone National Museum'      => 0,
            'British Museum'                    => 1,
            'Brighton Museum and Art Gallery'   => 2,
            'Glasgow Museums'                   => 3,
            'World Museum Liverpool'            => 4,
            'British Library'                   => 5
        );
        for($j=0; $j<sizeof($order); $j++) {
            for($i=0; $i<sizeof($files) - 1; $i++) {
                if(array_key_exists((string) $files[$i], $order)) {
                    if(array_key_exists((string) $files[$i + 1], $order)) {
                        if($order[(string) $files[$i]] > $order[(string) $files[$i + 1]]) {
                            // swap
                            $tmp = $files[$i] . '';
                            $files[$i] = $files[$i + 1] . '';
                            $files[$i + 1] = $tmp . '';
                        }
                    }
                } else if(array_key_exists((string) $files[$i + 1], $order)) {
                    if(array_key_exists((string) $files[$i], $order)) {
                        if($order[(string) $files[$i + 1]] > $order[(string) $files[$i]]) {
                            // swap
                            $tmp = $files[$i] . '';
                            $files[$i] = $files[$i + 1] . '';
                            $files[$i + 1] = $tmp . '';
                        }
                    } else {
                        // swap
                        $tmp = $files[$i] . '';
                        $files[$i] = $files[$i + 1] . '';
                        $files[$i + 1] = $tmp . '';
                    }
                }
            }
        }
        
        return array_slice($files, $offset, $limit); 
    }
    
    private function xml_to_array($item_xml, $museum_filename) {
        include('baseurl.php');
        
        // convert item to array
        $item = array();
        foreach($item_xml->children() as $element_name => $node)
            $item[$element_name] = $node;
        
        // convert media object to array
        $item['MediaObjects'] = array();
        $media_objects_xml = $item_xml->xpath('MediaObjects/*');
        for($i=0; $i<sizeof($media_objects_xml); $i++) {
            foreach($media_objects_xml[$i]->children() as $element_name => $node)
                $item['MediaObjects'][$i][$element_name] = $node;
            
            $media_filename = strtolower($item['MediaObjects'][$i]['MediaFileName']);
            if(strtolower($media_filename) == 'no data') {
                $item['MediaObjects'][$i]['ThumbSmall']     = $assetsUrl . 'objects/all/image/small/no-image.jpg';
                $item['MediaObjects'][$i]['ThumbMedium']    = $assetsUrl . 'objects/all/image/medium/no-image.jpg';
                $item['MediaObjects'][$i]['ThumbLarge']     = $assetsUrl . 'objects/all/image/large/no-image.jpg';
                $item['MediaObjects'][$i]['Media']          = $assetsUrl . 'objects/all/image/large/no-image.jpg';
            } else {
                // what is the objects type?
                if(strtolower($item['MediaObjects'][$i]['MediaType']) == 'image') {
                    $image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
                    $item['MediaObjects'][$i]['ThumbSmall']     = $image . 'thumbs/small/' . $media_filename . '.jpg';
                    $item['MediaObjects'][$i]['ThumbMedium']    = $image . 'thumbs/medium/' . $media_filename . '.jpg';
                    $item['MediaObjects'][$i]['ThumbLarge']     = $image . $media_filename . '.jpg';
                    $item['MediaObjects'][$i]['Media']          = $image . $media_filename . '.jpg';
                } else if(strtolower($item['MediaObjects'][$i]['MediaType']) == 'audio') {
                    $audio = $assetsUrl . 'objects/' . $museum_filename . '/audio/';
                    $item['MediaObjects'][$i]['ThumbSmall']     = $audio . 'thumbs/small/edison_wax_cylinder.jpg';
                    $item['MediaObjects'][$i]['ThumbMedium']    = $audio . 'thumbs/medium/edison_wax_cylinder.jpg';
                    $item['MediaObjects'][$i]['ThumbLarge']     = $audio . 'thumbs/large/edison_wax_cylinder.jpg';
                    $item['MediaObjects'][$i]['Media']          = $audio . $media_filename;
                } else if(strtolower($item['MediaObjects'][$i]['MediaType']) == 'video') {
                    $video = $assetsUrl . 'objects/' . $museum_filename . '/video/';
                    $item['MediaObjects'][$i]['ThumbSmall']     = $video . 'thumbs/small/' . $media_filename . '.jpg';
                    $item['MediaObjects'][$i]['ThumbMedium']    = $video . 'thumbs/medium/' . $media_filename . '.jpg';
                    $item['MediaObjects'][$i]['ThumbLarge']     = $video . 'thumbs/large/' . $media_filename . '.jpg';
                    $item['MediaObjects'][$i]['Media']          = $video . $media_filename;
                }
            }
        }
        
        // convert related objects to array
        $item['RelatedObjects'] = array();
        $related_objects_xml = $item_xml->xpath('RelatedObjects/*');
        for($i=0; $i<sizeof($related_objects_xml); $i++) {
            $item['RelatedObjects'][$i] = $related_objects_xml[$i];
        }
        
        // convert associated media objects to array
        $item['AssociatedMediaObjects'] = array();
        $associated_media_xml = $item_xml->xpath('AssociatedMediaObjects/*');
        for($i=0; $i<sizeof($associated_media_xml); $i++) {
            foreach($associated_media_xml[$i]->children() as $element_name =>$node)
                $item['AssociatedMediaObjects'][$i][$element_name] = $node;
            
            $associated_media_filename = strtolower($item['AssociatedMediaObjects'][$i]['AssociatedMediaFileName']);
            if(strtolower($associated_media_filename) != 'no data') {
                // what is the objects type?
                $associated_media = $assetsUrl . 'objects/associated_media/';
                if(strtolower($item['AssociatedMediaObjects'][$i]['AssociatedMediaType']) == 'image') {
                    $image = $associated_media . 'images/';
                    $item['AssociatedMediaObjects'][$i]['ThumbSmall']     = $image . 'thumbs/small/' . $associated_media_filename . '.jpg';
                    $item['AssociatedMediaObjects'][$i]['ThumbMedium']    = $image . 'thumbs/medium/' . $associated_media_filename . '.jpg';
                    $item['AssociatedMediaObjects'][$i]['ThumbLarge']     = $image . $associated_media_filename . '.jpg';
                    $item['AssociatedMediaObjects'][$i]['Media']          = $image . $associated_media_filename . '.jpg';
                } else if(strtolower($item['AssociatedMediaObjects'][$i]['AssociatedMediaType']) == 'audio') {
                    $audio = $associated_media . 'audio/';
                    $item['AssociatedMediaObjects'][$i]['ThumbSmall']     = $audio . 'thumbs/small/edison_wax_cylinder.jpg';
                    $item['AssociatedMediaObjects'][$i]['ThumbMedium']    = $audio . 'thumbs/medium/edison_wax_cylinder.jpg';
                    $item['AssociatedMediaObjects'][$i]['ThumbLarge']     = $audio . 'thumbs/large/edison_wax_cylinder.jpg';
                    $item['AssociatedMediaObjects'][$i]['Media']          = $audio . $associated_media_filename;
                } else if(strtolower($item['AssociatedMediaObjects'][$i]['AssociatedMediaType']) == 'video') {
                    $video = $associated_media . 'video/';
                    $item['AssociatedMediaObjects'][$i]['ThumbSmall']     = $video . 'thumbs/small/' . $associated_media_filename . '.jpg';
                    $item['AssociatedMediaObjects'][$i]['ThumbMedium']    = $video . 'thumbs/medium/' . $associated_media_filename . '.jpg';
                    $item['AssociatedMediaObjects'][$i]['ThumbLarge']     = $video . 'thumbs/large/' . $associated_media_filename . '.jpg';
                    $item['AssociatedMediaObjects'][$i]['Media']          = $video . $associated_media_filename;
                }
            }
        }
        
        return $item;
    }
    
    protected function get_museum_objects($museum_name, $limit, $offset) {
        // validate arguments
        if($limit == '') $limit = 0;
        if($offset == '') $offset = 0;
        
        // get the museum xml
        $museum_xml = $this->get_museum_xml($museum_name);
        
        // convert museum name to a legal file name (spaces converted to underscores so it's 'nix safe)
        $museum_filename = strtolower(str_replace(' ', '_', $museum_name));
        
        // for each item, put item id, name and image file name in array
        $items_xml = $museum_xml->xpath('CulturalObjects/CulturalObject[position() > ' . $offset . ' and not (position() > ' . ($offset + $limit) . ')]');
	
        $items = array();
        foreach($items_xml as $item_xml) {
            array_push($items, $this->xml_to_array($item_xml, $museum_filename));
        }
		//echo "<pre>";
        //print_r($items);
		//echo "<pre>";
        return $items;
    }

    public function ajax_get_objects($museum_name, $limit, $offset) {
        include('baseurl.php');
        
        /* 
         * museum name came from url and probably contains spaces therefore the 
         * character '%20' must be converted to space.
         */
        $museum_name = str_replace('%20', ' ', $museum_name);
        
        // get the museum objects
        $objects = $this->get_museum_objects($museum_name, $limit, $offset);
        
        // write html for each object
        $html = "";
        foreach($objects as $object) {
            $html = $html . "<a href=\"" . $baseUrl . "index.php/item/item" . $db_type . "/index/" . bin2hex($object['AccessionNumber']."___". $object['Museum']) . "\">\n";
            $html = $html . "    <img src=\"" . $object['MediaObjects'][0]['ThumbSmall'] . "\" alt=\"" . $object['Object'] . "\"/>\n";
            $html = $html . "</a>\n";
        }
        echo $html;
    }
    
}

?>

<?php

/**
 *
 * @author Dr Zeeshan Patoli
 */
 
 /*
class Admin extends CI_Controller {
    
    function index() {
        $data['message'] = '';
        $this->load->view('upload_xml', $data);
    }
    
    function upload_xml() {
        // set the upload configuration and load the library
        $config['upload_path'] = '../assets';
        $config['allowed_types'] = 'xml';
        $this->load->library('upload', $config);
        
        // upload the file
        if(!$this->upload->do_upload())
            $data['message'] = 'Error uploading xml file.';
        
        // parse the xml
        $this->load->model('import_handler');
        $data = $this->upload->data();
        echo $data['message'] = $this->xml_handler->import_xml('../assets/' . $data['file_name']);
        
        // clean up file
        unlink('../assets/' . $data['file_name']);
        
        $this->load->view('upload_xml', $data);
    }
    
    function view_db() {
		
		$db = $this->load->database('default', TRUE);
        // get all the institutions in the database
       	$data['objects'] = array();
        $data['object_namesValues'] = array();
        //$data['institutions'] = $this->db->get('institutions')->result();
        $sql = 'SELECT * FROM Institutions';
		$ob = $db->query($sql, array('InstitutionName'))->result_array();
		//$data['institutions'] = $this->db->get('InstitutionName')->result();
        // forward to view
		echo "<pre>";
		print_r($ob);
		echo "</pre>";
		 $data['institutions'][0] = $ob[0]['InstitutionName'];
		 $data['institutions'][1] = $ob[1]['InstitutionName'];
		echo $db->conn_id ." hello";
       $this->load->view('view_database', $data);
    }
    
    function view_institution() {
        // get the institution name
        $institution_name = $this->input->post('institution');
        
        // get all cultural objects associated with this institution
        $data['objects'] = $this->db->get_where('object', array('institution_name' => $institution_name))->result();
        
        // get all metadata-names associated with this institution
        $data['object_nameValues'] = array();
        foreach($data['objects'] as $object) {
            $sql = "SELECT name, value FROM metadatanames n 
                JOIN metadataname_has_institution ni ON n.metadataname_id = ni.metadataname_id 
                JOIN metadatavalues v ON n.metadataname_id = v.metadataname_id 
                JOIN object o ON o.object_id = v.object_id 
                WHERE ni.institution_name = '" . $institution_name . "' AND o.object_id = '" . $object->object_id . "'";
            $data['object_nameValues'][] = $this->db->query($sql)->result();
        }
        $data['institutions'] = $this->db->get('institutions')->result();
        
        // forward to view
        $this->load->view('view_database', $data);
    }
    
    function import() {
        // get all xml files
        $dir = '../assets/XML';
        $dh = opendir($dir);
        
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
    }
    
}*/

?>

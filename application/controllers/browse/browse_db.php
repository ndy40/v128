<?php
include('browse.php');

/**
 * Description of BrowseDB
 *
 * @ Dr Zeeshan Patoli
 */
class Browse_DB extends Browse {
   
    function Browse_DB() {
        parent::Browse();
        
        $this->controller_name = "browse_db";
    }
     private function get_museum_xml($museum_name) {
     
    }
	
    protected function num_museums() {
        
    }
    
    protected function get_museum_names($limit, $offset) {
		//Get all Museum names from Database
		// fill array of files
        $files = array();
		
		$db = $this->load->database('default', TRUE);
		
        // get all the institutions in the database
       	$data['objects'] = array();
        $data['object_namesValues'] = array();
        //$data['institutions'] = $this->db->get('institutions')->result();
        $sql = 'SELECT * FROM Institutions';
		$ob = $db->query($sql, array('InstitutionName'))->result_array();
		
		//echo $db->conn_id ." hello";
		for ($i=0; $i<count($ob); $i++)
			array_push($files, $ob[$i]['InstitutionName']);
		//array_push($files, $ob[1]['InstitutionName']);
		return array_slice($files, 0, count($ob));

    }
    
    protected function get_museum_objects($museum_name, $limit, $offset) {
        // validate arguments
        if($limit == '') $limit = 0;
        if($offset == '') $offset = 0;
		$items = $this->get_objects_list($museum_name, $limit, $offset);	
        return $items;
    }
	
	public function get_objects_list($museum_name, $limit, $offset){
		
		include('baseurl.php');
        
        // convert item to array
        $item = array();
		
		$db = $this->load->database('default', TRUE);
        // get all the institutions in the database
       
        //$data['institutions'] = $this->db->get('institutions')->result();
        $sql = 'SELECT * FROM CulturalObjects WHERE Museum="'. $museum_name.'"';
		$ob = $db->query($sql)->result_array();
		$museum_filename = strtolower(str_replace(' ', '_', $museum_name));
		
		//echo $offset ." - " . $limit;
		
		//Make sure that limit should not cross number of items
		if ($limit < count($ob))
		for($i=$offset; $i<$limit; $i++)
		{
			$item[$i]['AccessionNumber'] = new SimpleXMLElement("<news>".$ob[$i]['AccessionNumber'] ."</news>");
			$item[$i]['ObjectType'] = new SimpleXMLElement("<news>".$ob[$i]['ObjectType'] ."</news>");
			$item[$i]['Object'] = new SimpleXMLElement("<news>".$ob[$i]['Object'] ."</news>");
			$item[$i]['Description'] = new SimpleXMLElement("<news>".$ob[$i]['Description'] ."</news>");
			$item[$i]['Materials'] = new SimpleXMLElement("<news>".$ob[$i]['Materials'] ."</news>");
			$item[$i]['CultureGroup'] = new SimpleXMLElement("<news>".$ob[$i]['CultureGroup'] ."</news>");
			$item[$i]['Dimension'] = new SimpleXMLElement("<news>".$ob[$i]['Dimensions'] ."</news>");
			$item[$i]['ProductionDate'] = new SimpleXMLElement("<news>".$ob[$i]['ProductionDate'] ."</news>");
			$item[$i]['AssociatedPlaces'] = new SimpleXMLElement("<news>".$ob[$i]['AssociatedPlaces'] ."</news>");
			$item[$i]['AssociatedPeople'] = new SimpleXMLElement("<news>".$ob[$i]['AssociatedPeople'] ."</news>");
			$item[$i]['Museum'] = new SimpleXMLElement("<news>".$ob[$i]['Museum'] ."</news>");
			
			$sql = 'SELECT * FROM MediaObjects WHERE FK_COId="'. $ob[$i]['COId'] .'"';
			$mediaobjects = $db->query($sql)->result_array();
			
			
			//media objects
			if (count($mediaobjects) == 0)
				echo " Media object zero found! = ". $ob[$i]['AccessionNumber'] . " ";
			if (count($mediaobjects) != 0)	
			for($j=0; $j<1; $j++)
			{
				//if ($mediaobjects[$j]['MediaFileName'] != NULL )
				//{	
					$item[$i]['MediaObjects'][$j]['Object'] = $mediaobjects[$j]['MediaFileName'];
					$media_filename = strtolower($mediaobjects[$j]['MediaFileName']);
			   		if(strtolower($media_filename) == 'no data') {
						$item[$i]['MediaObjects'][$j]['ThumbSmall']     = $assetsUrl . 'objects/all/image/small/no-image.jpg';
						$item[$i]['MediaObjects'][$j]['ThumbMedium']    = $assetsUrl . 'objects/all/image/medium/no-image.jpg';
						$item[$i]['MediaObjects'][$j]['ThumbLarge']     = $assetsUrl . 'objects/all/image/large/no-image.jpg';
						$item[$i]['MediaObjects'][$j]['Media']          = $assetsUrl . 'objects/all/image/large/no-image.jpg';
					} else {
						if(strtolower($mediaobjects[$j]['MediaType']) == 'image') {
							$image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
							$item[$i]['MediaObjects'][$j]['ThumbSmall']     = $image . 'thumbs/small/' . $media_filename . '.jpg';
							$item[$i]['MediaObjects'][$j]['ThumbMedium']    = $image . 'thumbs/medium/' . $media_filename . '.jpg';
							$item[$i]['MediaObjects'][$j]['ThumbLarge']     = $image . $media_filename . '.jpg';
						}
						if(strtolower($mediaobjects[$j]['MediaType']) == 'audio') {
							$audio_filename = strtolower($mediaobjects[$j]['MediaFileName']);
							$image_filename = strtolower($mediaobjects[$j+1]['MediaFileName']);
							$image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
							$item[$i]['MediaObjects'][$j]['ThumbSmall']     = $image . 'thumbs/small/' . $image_filename . '.jpg';
							$item[$i]['MediaObjects'][$j]['ThumbMedium']    = $image . 'thumbs/medium/' . $image_filename . '.jpg';
							$item[$i]['MediaObjects'][$j]['ThumbLarge']     = $image . $image_filename . '.jpg';
							$audio = $assetsUrl . 'objects/' . $museum_filename . '/audio/';
							$item['MediaObjects'][$j]['Media']          = $audio . $audio_filename;
							}
				}
				//}
			}
			
		}
		$this->load->database('default', FALSE);
        return $item;
		
	}
    
    public function ajax_get_objects($museum_name, $limit, $offset) {
        include('baseurl.php');
        
        /* 
         * museum name came from url and probably contains spaces therefore the 
         * character '%20' must be converted to space.
         */
        $museum_name = str_replace('%20', ' ', $museum_name);
			//$offset = $limit ;//$temp[1];
			$limit = $offset + 5; //$temp[2];
		
        $objects = $this->get_museum_objects($museum_name, $limit, $offset);
        //echo "get_ajax called";
        // write html for each object
        $html = "";
        foreach($objects as $object) {
            if (isset($object['Museum']) )
			{
		    $html = $html . "<a href=\"" . $baseUrl . "index.php/item/item" . $db_type . "/index/" . bin2hex($object['AccessionNumber']."___". $object['Museum']) . "\">\n";
            $html = $html . "    <img src=\"" . $object['MediaObjects'][0]['ThumbSmall'] . "\" alt=\"" . $object['Object'] . "\"/>\n";
            $html = $html . "</a>\n";
			}
			
		
        }
		
        echo $html;
    }
    
	
    
}

?>

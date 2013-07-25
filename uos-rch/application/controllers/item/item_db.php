<?php

include('item.php');

/**
 * Description of item_db
 *
 * @author Dr Zeeshan Patoli
 */
class Item_DB extends Item {
    
	private function xml_to_array($item_xml, $museum_filename) {
       include('baseurl.php');
        
        // convert item to array
        $item = array();
    
        return $item;
		
    }
	private function dbToArray($db, $ob,  $exclusion_list){
		include('baseurl.php');
		$return_item = array();
		
		for ($i=0;$i<count($ob); $i++)
		{
			// Check for exclusion list
			$avoid = 0;
			for ($j=0;$j<count($exclusion_list); $j++)
				if ($ob[$i]['AccessionNumber'] == $exclusion_list[$j]['AccessionNumber'][0])
					{
						$avoid = 1;
						break;
					}
				/*if (count($ob) > 10)
					$avoid = 1;*/
						
			if ($avoid == 0)
			{
				$return_item[$i]['AccessionNumber'] = new SimpleXMLElement("<news>".$ob[$i]['AccessionNumber'] ."</news>");
				//$return_item[$i]['ObjectType'] = new SimpleXMLElement("<news>".$ob[$i]['ObjectType'] ."</news>");
				$return_item[$i]['Object'] = new SimpleXMLElement("<news>".$ob[$i]['Object'] ."</news>");
				//$return_item[$i]['Description'] = new SimpleXMLElement("<news>".$ob[$i]['Description'] ."</news>");
				//$return_item[$i]['Materials'] = new SimpleXMLElement("<news>".$ob[$i]['Materials'] ."</news>");
				//$return_item[$i]['CultureGroup'] = new SimpleXMLElement("<news>".$ob[$i]['CultureGroup'] ."</news>");
				//$return_item[$i]['Dimensions'] = new SimpleXMLElement("<news>".$ob[$i]['Dimensions'] ."</news>");
				//$return_item[$i]['ProductionDate'] = new SimpleXMLElement("<news>".$ob[$i]['ProductionDate'] ."</news>");
				//$return_item[$i]['AssociatedPlaces'] = new SimpleXMLElement("<news>".$ob[$i]['AssociatedPlaces'] ."</news>");
				//$return_item[$i]['AssociatedPeople'] = new SimpleXMLElement("<news>".$ob[$i]['AssociatedPeople'] ."</news>");
				$return_item[$i]['Museum'] = new SimpleXMLElement("<news>".$ob[$i]['Museum'] ."</news>");
				
				$museum_filename = strtolower(str_replace(' ', '_', $ob[$i]['Museum']));
				
				$sql = 'SELECT * FROM MediaObjects WHERE FK_COId="'. $ob[$i]['COId'] .'"';
				$mediaobjects = $db->query($sql)->result_array();
				//echo "<br> media objects: " .count($mediaobjects);
				for ($j=0; $j<1; $j++)
					{
						
						$return_item[$i]['MediaObjects'][$j]['MediaFileName'] = new SimpleXMLElement("<news>".$mediaobjects[$j]['MediaFileName'] ."</news>");
						$return_item[$i]['MediaObjects'][$j]['MediaTitle'] = new SimpleXMLElement("<news>".$mediaobjects[$j]['MediaTitle'] ."</news>");
						$return_item[$i]['MediaObjects'][$j]['MediaDescription'] = new SimpleXMLElement("<news>".$mediaobjects[$j]['MediaDescription'] ."</news>");
						$return_item[$i]['MediaObjects'][$j]['MediaType'] = new SimpleXMLElement("<news>".$mediaobjects[$j]['MediaType'] ."</news>");
				
						
						$return_item[$i]['MediaObjects'][$j]['Object'] = $mediaobjects[$j]['MediaFileName'];
						$media_filename = strtolower($mediaobjects[$j]['MediaFileName']);
					   if(strtolower($media_filename) == 'no data') {
							$return_item[$i]['MediaObjects'][$j]['ThumbSmall']     = $assetsUrl . 'objects/all/image/small/no-image.jpg';
							$return_item[$i]['MediaObjects'][$j]['ThumbMedium']    = $assetsUrl . 'objects/all/image/medium/no-image.jpg';
							$return_item[$i]['MediaObjects'][$j]['ThumbLarge']     = $assetsUrl . 'objects/all/image/large/no-image.jpg';
							$return_item[$i]['MediaObjects'][$j]['Media']          = $assetsUrl . 'objects/all/image/large/no-image.jpg';
						} else {
								if (strtolower($mediaobjects[$j]['MediaType']) == 'image')
								{
									$image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
									$return_item[$i]['MediaObjects'][$j]['ThumbSmall']     = $image . 'thumbs/small/' . $media_filename . '.jpg';
									$return_item[$i]['MediaObjects'][$j]['ThumbMedium']    = $image . 'thumbs/medium/' . $media_filename . '.jpg';
									$return_item[$i]['MediaObjects'][$j]['ThumbLarge']     = $image . $media_filename . '.jpg';
									$return_item[$i]['MediaObjects'][$j]['Media']          = $image . $media_filename . '.jpg';
								}
								
								if(strtolower($mediaobjects[$j]['MediaType']) == 'audio') {
									$audio_filename = strtolower($mediaobjects[$j]['MediaFileName']);
								if (isset($mediaobjects[$j+1]['MediaFileName']))
									{	
										$image_filename = strtolower($mediaobjects[$j+1]['MediaFileName']);
										
										$image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
										$return_item[$i]['MediaObjects'][$j]['ThumbSmall']     = $image . 'thumbs/small/' . $image_filename . '.jpg';
										$return_item[$i]['MediaObjects'][$j]['ThumbMedium']    = $image . 'thumbs/medium/' . $image_filename . '.jpg';
										$return_item[$i]['MediaObjects'][$j]['ThumbLarge']     = $image . $image_filename . '.jpg';
										//$return_item[$i]['MediaObjects'][$j]['Media']          = $image . $image_filename . '.jpg';
									}
									//echo "<br>". $image_filename;
										$audio = $assetsUrl . 'objects/' . $museum_filename . '/audio/';
										$return_item[$i]['MediaObjects'][$j]['Media']          = $audio . $audio_filename;
										
										$j++;
									}
						}
					
					}
			}
		
		}
		//echo "found = ". count($return_item). "<br>";
		
		return $return_item;
	}
	private function search($keyphrase, $keywords, $exclusion_list = array()) {
		include('baseurl.php');
        // init match arrays
        $exact_match = array();
        //$exact_match[0] = array();
        //$exact_match[1] = array();
        $single_match = array();
		//print_r ( $keywords);
        $search_results = array();
		$db = $this->load->database('default', TRUE);   
		
		//echo $keyphrase. "<br> ";  
		  
        //$data['institutions'] = $this->db->get('institutions')->result();
		
        
		$sql = 'SELECT * FROM CulturalObjects WHERE Object LIKE "%'. $keyphrase.'%"';
		$ob = $db->query($sql)->result_array();
		
		$exact_match = $this->dbToArray($db, $ob,  $exclusion_list);
		
		$exclusion_list = array_merge($exact_match,$exclusion_list);
		if (count($exclusion_list) < 100)
			{				
			$sql = 'SELECT * FROM CulturalObjects WHERE Description LIKE "%'. $keyphrase.'%"';
			$ob = $db->query($sql)->result_array();
			$single_match = $this->dbToArray($db, $ob,  $exclusion_list);
			$exclusion_list = array_merge($exclusion_list, $single_match);
			}
			for ($i=0; $i< count($keywords); $i++)
				{
					if (strstr($keywords[$i],"/"))
						{
							$keywords[$i]= str_replace("/", "\/",$keywords[$i]);
						}
					
					$pattern = '/\b'.$keywords[$i].'\b/i';
					
					//echo $keywords[$i]. ": ".strlen($keywords[$i]). " <br>";
					if (strlen($pattern) > 2 )
						{
						if (count($exclusion_list) > 100)
							break;
							
						//$sql = 'SELECT * FROM CulturalObjects WHERE Object LIKE "% '. $keywords[$i].'%" OR Object LIKE "%'. $keywords[$i].' %"';
						$sql = 'SELECT * FROM CulturalObjects';
						$ob1 = $db->query($sql)->result_array();
						$ob = array();
						$l=0;
						$searchField = 'Object';
						for ($k=0; $k<count($ob1); $k++)
						{
							preg_match($pattern, $ob1[$k][$searchField], $matches, PREG_OFFSET_CAPTURE, 0);	
							if ($matches)
							{
								$ob[$l] = $ob1[$k];
								$l++;
							}
						}
						
						$single_match = $this->dbToArray($db, $ob,  $exclusion_list);
						$exclusion_list = array_merge($exclusion_list, $single_match );
						
						if (count($exclusion_list) > 100)
							break;
							
						$searchField = 'Description';
						$ob = array();
						$l=0;
						for ($k=0; $k<count($ob1); $k++)
						{
							preg_match($pattern, $ob1[$k][$searchField], $matches, PREG_OFFSET_CAPTURE, 0);	
							if ($matches)
							{
								$ob[$l] = $ob1[$k];
								$l++;
							}
						}
						$single_match= $this->dbToArray($db, $ob,  $exclusion_list);
						$exclusion_list = array_merge($exclusion_list, $single_match);
						}
						//print_r($ob);
				}
		
		if (count($exclusion_list) > 100)
			for ($i=99;$i<count($exclusion_list); $i++)
				unset($exclusion_list[$i]);
				
		//echo count($exclusion_list);
		$search_results = $exclusion_list;
        return $search_results;
    }
	protected function get_item($item_id, $museumName) {
        $return_item = array();
		include('baseurl.php');
        
        // convert item to array
		
		$db = $this->load->database('default', TRUE);
        // get all the institutions in the database
       
        //$data['institutions'] = $this->db->get('institutions')->result();
        $sql = 'SELECT * FROM CulturalObjects WHERE Museum="'. $museumName.'" AND AccessionNumber="'.$item_id.'"';
		$ob = $db->query($sql)->result_array();
		$museum_filename = strtolower(str_replace(' ', '_', $museumName));
		
		if (!$ob)
			return $return_item; 
		$return_item['AccessionNumber'] = new SimpleXMLElement("<news>".$ob[0]['AccessionNumber'] ."</news>");
		$return_item['ObjectType'] = new SimpleXMLElement("<news>".$ob[0]['ObjectType'] ."</news>");
		$return_item['Object'] = new SimpleXMLElement("<news>".$ob[0]['Object'] ."</news>");
		$return_item['Description'] = new SimpleXMLElement("<news>".$ob[0]['Description'] ."</news>");
		$return_item['Materials'] = new SimpleXMLElement("<news>".$ob[0]['Materials'] ."</news>");
		$return_item['CultureGroup'] = new SimpleXMLElement("<news>".$ob[0]['CultureGroup'] ."</news>");
		$return_item['Dimensions'] = new SimpleXMLElement("<news>".$ob[0]['Dimensions'] ."</news>");
		$return_item['ProductionDate'] = new SimpleXMLElement("<news>".$ob[0]['ProductionDate'] ."</news>");
		$return_item['AssociatedPlaces'] = new SimpleXMLElement("<news>".$ob[0]['AssociatedPlaces'] ."</news>");
		$return_item['AssociatedPeople'] = new SimpleXMLElement("<news>".$ob[0]['AssociatedPeople'] ."</news>");
		$return_item['Museum'] = new SimpleXMLElement("<news>".$ob[0]['Museum'] ."</news>");
		
		$sql = 'SELECT * FROM MediaObjects WHERE FK_COId="'. $ob[0]['COId'] .'"';
		$mediaobjects = $db->query($sql)->result_array();
		
		for ($j=0; $j<count($mediaobjects); $j++)
			{
				$return_item['MediaObjects'][$j]['MediaFileName'] = new SimpleXMLElement("<news>".$mediaobjects[$j]['MediaFileName'] ."</news>");
				$return_item['MediaObjects'][$j]['MediaTitle'] = new SimpleXMLElement("<news>".$mediaobjects[$j]['MediaTitle'] ."</news>");
				$return_item['MediaObjects'][$j]['MediaDescription'] = new SimpleXMLElement("<news>".$mediaobjects[$j]['MediaDescription'] ."</news>");
				$return_item['MediaObjects'][$j]['MediaType'] = new SimpleXMLElement("<news>".$mediaobjects[$j]['MediaType'] ."</news>");
		
				
				$return_item['MediaObjects'][$j]['Object'] = $mediaobjects[$j]['MediaFileName'];
				$media_filename = strtolower($mediaobjects[$j]['MediaFileName']);
			   if(strtolower($media_filename) == 'no data') {
					$return_item['MediaObjects'][$j]['ThumbSmall']     = $assetsUrl . 'objects/all/image/small/no-image.jpg';
					$return_item['MediaObjects'][$j]['ThumbMedium']    = $assetsUrl . 'objects/all/image/medium/no-image.jpg';
					$return_item['MediaObjects'][$j]['ThumbLarge']     = $assetsUrl . 'objects/all/image/large/no-image.jpg';
					$return_item['MediaObjects'][$j]['Media']          = $assetsUrl . 'objects/all/image/large/no-image.jpg';
				} else {
						$image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
						$return_item['MediaObjects'][$j]['ThumbSmall']     = $image . 'thumbs/small/' . $media_filename . '.jpg';
						$return_item['MediaObjects'][$j]['ThumbMedium']    = $image . 'thumbs/medium/' . $media_filename . '.jpg';
						$return_item['MediaObjects'][$j]['ThumbLarge']     = $image . $media_filename . '.jpg';
						$return_item['MediaObjects'][$j]['Media']          = $image . $media_filename . '.jpg';
						if(strtolower($mediaobjects[$j]['MediaType']) == 'audio'){ 
								$audio = $assetsUrl . 'objects/' . $museum_filename . '/audio/';
								$return_item['MediaObjects'][$j]['Media']          = $audio . $media_filename;
								}
				
            	}
			
			}
	
		//Associated Media objects
		$sql = 'SELECT * FROM AssociatedMediaObjects WHERE FK_COId="'. $ob[0]['COId'] .'"';
		$AssociatedMediaObjects = $db->query($sql)->result_array();
		
		for ($j=0; $j<count($AssociatedMediaObjects); $j++)
			{
				$return_item['AssociatedMediaObjects'][$j]['AssociatedMediaFileName'] = 
							new SimpleXMLElement("<news>".$AssociatedMediaObjects[$j]['AssociatedMediaFileName'] ."</news>");
				$return_item['AssociatedMediaObjects'][$j]['AssociatedMediaTitle'] = 
							new SimpleXMLElement("<news>".$AssociatedMediaObjects[$j]['AssociatedMediaTitle'] ."</news>");
				$return_item['AssociatedMediaObjects'][$j]['AssociatedMediaDescription'] = 
							new SimpleXMLElement("<news>".$AssociatedMediaObjects[$j]['AssociatedMediaDescription'] ."</news>");
				$return_item['AssociatedMediaObjects'][$j]['AssociatedMediaType'] = 
							new SimpleXMLElement("<news>".$AssociatedMediaObjects[$j]['AssociatedMediaType'] ."</news>");
		
				
				$return_item['AssociatedMediaObjects'][$j]['Object'] = $AssociatedMediaObjects[$j]['AssociatedMediaFileName'];
				$media_filename = strtolower($AssociatedMediaObjects[$j]['AssociatedMediaFileName']);
			   if(strtolower($media_filename) == 'no data') {
					$return_item['AssociatedMediaObjects'][$j]['ThumbSmall']     = $assetsUrl . 'objects/all/image/small/no-image.jpg';
					$return_item['AssociatedMediaObjects'][$j]['ThumbMedium']    = $assetsUrl . 'objects/all/image/medium/no-image.jpg';
					$return_item['AssociatedMediaObjects'][$j]['ThumbLarge']     = $assetsUrl . 'objects/all/image/large/no-image.jpg';
					$return_item['AssociatedMediaObjects'][$j]['Media']          = $assetsUrl . 'objects/all/image/large/no-image.jpg';
				} else {
					// what is the objects type?
					if(strtolower($AssociatedMediaObjects[$j]['AssociatedMediaType']) == 'image') {
						$image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
						$return_item['AssociatedMediaObjects'][$j]['ThumbSmall']     = $image . 'thumbs/small/' . $media_filename . '.jpg';
						$return_item['AssociatedMediaObjects'][$j]['ThumbMedium']    = $image . 'thumbs/medium/' . $media_filename . '.jpg';
						$return_item['AssociatedMediaObjects'][$j]['ThumbLarge']     = $image . $media_filename . '.jpg';
						$return_item['AssociatedMediaObjects'][$j]['Media']          = $image . $media_filename . '.jpg';
					} else if(strtolower($AssociatedMediaObjects[$j]['AssociatedMediaType']) == 'audio') {
						$audio = $assetsUrl . 'objects/' . $museum_filename . '/audio/';
						$return_item['AssociatedMediaObjects'][$j]['ThumbSmall']     = $audio . 'thumbs/small/edison_wax_cylinder.jpg';
						$return_item['AssociatedMediaObjects'][$j]['ThumbMedium']    = $audio . 'thumbs/medium/edison_wax_cylinder.jpg';
						$return_item['AssociatedMediaObjects'][$j]['ThumbLarge']     = $audio . 'thumbs/large/edison_wax_cylinder.jpg';
						$return_item['AssociatedMediaObjects'][$j]['Media']          = $audio . $media_filename;
					} else if(strtolower($AssociatedMediaObjects[$j]['AssociatedMediaType']) == 'video') {
						$video = $assetsUrl . 'objects/associated_media/video/';
						$return_item['AssociatedMediaObjects'][$j]['ThumbSmall']     = $video . 'thumbs/small/' . $media_filename . '.jpg';
						$return_item['AssociatedMediaObjects'][$j]['ThumbMedium']    = $video . 'thumbs/medium/' . $media_filename . '.jpg';
						$return_item['AssociatedMediaObjects'][$j]['ThumbLarge']     = $video . 'thumbs/large/' . $media_filename . '.jpg';
						$return_item['AssociatedMediaObjects'][$j]['Media']          = $video . $media_filename;
					}
            	}
			
			}
			
		//Related Media objects
		$sql = 'SELECT * FROM RelatedObjects WHERE FK_COId="'. $ob[0]['COId'] .'"';
		$RelatedMediaObjects = $db->query($sql)->result_array();
		
		for ($j=0; $j<count($RelatedMediaObjects); $j++)
			{
				$return_item['RelatedObjects'][$j] = new SimpleXMLElement("<news>".$RelatedMediaObjects[$j]['Value'] ."</news>");
			}
					
		//echo "<pre>";
//		print_r($return_item);
//		echo "</pre>";
       
		$this->load->database('default', FALSE);
		return $return_item;
    }
	protected function get_related_items($item_id, $limit, $offset, $museumName) {
        // get the item from id
        $item = $this->get_item($item_id, $museumName);
        
        /* 
         * create exlusion list including search term item and priority related 
         * items.
         */
        $exclusion_list = array($item_id);
        foreach($item['RelatedObjects'] as $related_id) {
            if((string) strtolower($related_id) != (string) 'no data') {
                array_push($exclusion_list, $related_id);
            }
			
        }
        
        // tokenise search term
        $tokens = explode(' ', $item['Object']);    
        // search for related items
        $all_related_items = $this->search($item['Object'], $tokens, $exclusion_list);
        
        // add the priority related objects to the front of the list
        foreach($item['RelatedObjects'] as $related_id) {
			
            if((string) strtolower($related_id) != (string) 'no data') {
                $priority_related_item = $this->get_item($related_id, $museumName);
                array_unshift($all_related_items, $priority_related_item);
            }
        }	
		
		
		//Message: Missing argument 4 for Item_DB::get_related_items(), called in /Applications/MAMP/htdocs/v12.7/application/controllers/item/item_db.php on line 359 and defined


		if ($limit < count($all_related_items))
        	{
				$offset = 5;
				$limit = count($all_related_items);
			}
				return array_slice($all_related_items, $offset, $limit);
			
    }
	
	 public function ajax_get_items($item_id_hex, $limit, $offset) {
        include('baseurl.php');
        // get item id from hex
        $item_id = hex2bin($item_id_hex);
		
        // search for related items
       // $related_items = $this->get_related_items($item_id, $limit, $offset);
		/*
		$related_items = $this->get_related_items($item_id, $limit, $offset);
        $html = "";
        foreach($related_items as $item) {
		//  for ($i=$offset;$i<$limit; $i++){
            $html = $html . "<a href=\"" . $baseUrl . "index.php/item/item" . $db_type . "/index/" . bin2hex($item['AccessionNumber']."___". $item['Museum']) . "\">\n";
            $html = $html . "    <img src=\"" . $related_items['MediaObjects']['ThumbSmall'] . "\" alt=\"" . $related_items['Object'] . "\" />\n";
            $html = $html . "</a>\n";
        }
        echo $html;
		*/
    }
	
	
}

?>

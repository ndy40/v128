<?php
include('search.php');
/**
 * Description of Search_db.php
 *
 * @author Dr Zeeshan Patoli
 */
class Search_db extends Search {
    
    function Search_db() {
        parent::Search();
    }
    
    private function xml_to_array($item_xml, $museum_filename) {
    }
    
	protected function advance_check($item, $search_categories, $search_type) {
		$num = 0;
		$search_results = array();
		for ($i=0;$i<count($item);$i++)
			{
				//British Library and Cootje Van Oven do not contain Material types
				if (($search_type == 'Materials') && (($item[$i]['Museum'] =='British Library') || ($item[$i]['Museum'] =='Cootje van Oven Collection')))
					{
						$search_results[$num] = $item[$i];
						$num++;
					}
				
				else{
				//check for ObjectType
				
				if (isset($item[$i]))
				for ($j=0;$j<count($search_categories[$search_type]);$j++)
					{
						//echo "<br>".$item[$i][$search_type]. " : ".$search_categories[$search_type][$j];
						if (strstr( strtolower($item[$i][$search_type]),strtolower($search_categories[$search_type][$j])))
							{ 
								//echo $item[$i][$search_type];
								$search_results[$num] = $item[$i];
								$num++;
								break;
								
							}
					}
				}
			}
		return $search_results;	
	}
	
	protected function showAll ($db ){
		include('baseurl.php');
		
		$sql = 'SELECT * FROM CulturalObjects';										
		$ob = $db->query($sql)->result_array();
		$num = 0;
		
		for($i=0; $i<count($ob); $i++)
		{	
				//item not repeated
				$item[$num]['AccessionNumber'] = new SimpleXMLElement("<news>".$ob[$i]['AccessionNumber'] ."</news>");
				$item[$num]['ObjectType'] = new SimpleXMLElement("<news>".$ob[$i]['ObjectType'] ."</news>");
				$item[$num]['Object'] = new SimpleXMLElement("<news>".$ob[$i]['Object'] ."</news>");
				$item[$num]['Description'] = new SimpleXMLElement("<news>".$ob[$i]['Description'] ."</news>");
				$item[$num]['Materials'] = new SimpleXMLElement("<news>".$ob[$i]['Materials'] ."</news>");
				$item[$num]['CultureGroup'] = new SimpleXMLElement("<news>".$ob[$i]['CultureGroup'] ."</news>");
				$item[$num]['Dimension'] = new SimpleXMLElement("<news>".$ob[$i]['Dimensions'] ."</news>");
				$item[$num]['ProductionDate'] = new SimpleXMLElement("<news>".$ob[$i]['ProductionDate'] ."</news>");
				$item[$num]['AssociatedPlaces'] = new SimpleXMLElement("<news>".$ob[$i]['AssociatedPlaces'] ."</news>");
				$item[$num]['AssociatedPeople'] = new SimpleXMLElement("<news>".$ob[$i]['AssociatedPeople'] ."</news>");
				$item[$num]['Museum'] = new SimpleXMLElement("<news>".$ob[$i]['Museum'] ."</news>");
				$museum_filename = strtolower(str_replace(' ', '_', $ob[$i]['Museum']));
				$sql = 'SELECT * FROM MediaObjects WHERE FK_COId="'. $ob[$i]['COId'] .'"';
				$mediaobjects = $db->query($sql)->result_array();
				//if (count($mediaobjects) != 0)	
				for($j=0; $j<1; $j++)
				{
						$item[$num]['MediaObjects'][$j]['Object'] = $mediaobjects[$j]['MediaFileName'];
						$media_filename = strtolower($mediaobjects[$j]['MediaFileName']);
						if(strtolower($media_filename) == 'no data') {
							$item[$num]['MediaObjects'][$j]['ThumbSmall']     = $assetsUrl . 'objects/all/image/small/no-image.jpg';
							$item[$num]['MediaObjects'][$j]['ThumbMedium']    = $assetsUrl . 'objects/all/image/medium/no-image.jpg';
							$item[$num]['MediaObjects'][$j]['ThumbLarge']     = $assetsUrl . 'objects/all/image/large/no-image.jpg';
							$item[$num]['MediaObjects'][$j]['Media']          = $assetsUrl . 'objects/all/image/large/no-image.jpg';
						} else {
							$image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
							$item[$num]['MediaObjects'][$j]['ThumbSmall']     = $image . 'thumbs/small/' . $media_filename . '.jpg';
							$item[$num]['MediaObjects'][$j]['ThumbMedium']    = $image . 'thumbs/medium/' . $media_filename . '.jpg';
							$item[$num]['MediaObjects'][$j]['ThumbLarge']     = $image . $media_filename . '.jpg';
							$item[$num]['MediaObjects'][$j]['Media']          = $image . $media_filename . '.jpg';
							if(strtolower($mediaobjects[$j]['MediaType']) == 'audio') {
								$audio_filename = strtolower($mediaobjects[$j]['MediaFileName']);
								if (isset($mediaobjects[$j]['MediaFileName']))
									{
									$media_filename = strtolower($mediaobjects[$j+1]['MediaFileName']);	
									$image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
									$item[$num]['MediaObjects'][$j]['ThumbSmall']     = $image . 'thumbs/small/' . $media_filename . '.jpg';
									$item[$num]['MediaObjects'][$j]['ThumbMedium']    = $image . 'thumbs/medium/' . $media_filename . '.jpg';
									$item[$num]['MediaObjects'][$j]['ThumbLarge']     = $image . $media_filename . '.jpg';
									$item[$num]['MediaObjects'][$j]['Media']          = $image . $media_filename . '.jpg';
									$audio = $assetsUrl . 'objects/' . $museum_filename . '/audio/';
									$item[$num]['MediaObjects'][$j]['Media']          = $audio . $audio_filename;
									}
							}
					$num++;
					}
				}
	 
			}
		
		return $item;
	}
	protected function advance_search ($db, $item, $keywords, $searchField ){
		include('baseurl.php');
		$num = count($item);
		
		for ($kw=0; $kw<count($keywords); $kw++)
		{
				
				//if (strlen($keywords[$kw]) > 1 )
				//{
					$pattern = '/\b'.$keywords[$kw].'\b/i';
					/*
					if ((count($keywords) > 1))
						$sql = 'SELECT * FROM CulturalObjects WHERE (('.$searchField.' LIKE "% '.$keywords[$kw].'" OR '.$searchField.' LIKE "'
																.$keywords[$kw].' %") OR '.$searchField.' LIKE "%'.$keywords[$kw].'%")';
					else
						$sql = 'SELECT * FROM CulturalObjects WHERE '. $searchField .' LIKE "% '.$keywords[$kw].'%" OR '. 
																		$searchField.' LIKE "%'.$keywords[$kw].' %"';
					*/
					$sql = 'SELECT * FROM CulturalObjects';										
					$ob1 = $db->query($sql)->result_array();
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
					for($i=0; $i<count($ob); $i++)
					{
						
						$repeated_item = 0;
						// check if the item already exist in the list
						for($j=0; $j<count($item);$j++)
							{
								if ($ob[$i]['AccessionNumber'] == $item[$j]['AccessionNumber'])
									{
										$repeated_item = 1;
										break;
									}
							}
						if ($repeated_item == 0)
						{	
							//item not repeated
							$item[$num]['AccessionNumber'] = new SimpleXMLElement("<news>".$ob[$i]['AccessionNumber'] ."</news>");
							$item[$num]['ObjectType'] = new SimpleXMLElement("<news>".$ob[$i]['ObjectType'] ."</news>");
							$item[$num]['Object'] = new SimpleXMLElement("<news>".$ob[$i]['Object'] ."</news>");
							$item[$num]['Description'] = new SimpleXMLElement("<news>".$ob[$i]['Description'] ."</news>");
							$item[$num]['Materials'] = new SimpleXMLElement("<news>".$ob[$i]['Materials'] ."</news>");
							$item[$num]['CultureGroup'] = new SimpleXMLElement("<news>".$ob[$i]['CultureGroup'] ."</news>");
							$item[$num]['Dimension'] = new SimpleXMLElement("<news>".$ob[$i]['Dimensions'] ."</news>");
							$item[$num]['ProductionDate'] = new SimpleXMLElement("<news>".$ob[$i]['ProductionDate'] ."</news>");
							$item[$num]['AssociatedPlaces'] = new SimpleXMLElement("<news>".$ob[$i]['AssociatedPlaces'] ."</news>");
							$item[$num]['AssociatedPeople'] = new SimpleXMLElement("<news>".$ob[$i]['AssociatedPeople'] ."</news>");
							$item[$num]['Museum'] = new SimpleXMLElement("<news>".$ob[$i]['Museum'] ."</news>");
							$museum_filename = strtolower(str_replace(' ', '_', $ob[$i]['Museum']));
							$sql = 'SELECT * FROM MediaObjects WHERE FK_COId="'. $ob[$i]['COId'] .'"';
							$mediaobjects = $db->query($sql)->result_array();
							//if (count($mediaobjects) != 0)	
							for($j=0; $j<1; $j++)
							{
									$item[$num]['MediaObjects'][$j]['Object'] = $mediaobjects[$j]['MediaFileName'];
									$media_filename = strtolower($mediaobjects[$j]['MediaFileName']);
									if(strtolower($media_filename) == 'no data') {
										$item[$num]['MediaObjects'][$j]['ThumbSmall']     = $assetsUrl . 'objects/all/image/small/no-image.jpg';
										$item[$num]['MediaObjects'][$j]['ThumbMedium']    = $assetsUrl . 'objects/all/image/medium/no-image.jpg';
										$item[$num]['MediaObjects'][$j]['ThumbLarge']     = $assetsUrl . 'objects/all/image/large/no-image.jpg';
										$item[$num]['MediaObjects'][$j]['Media']          = $assetsUrl . 'objects/all/image/large/no-image.jpg';
									} else {
										$image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
										$item[$num]['MediaObjects'][$j]['ThumbSmall']     = $image . 'thumbs/small/' . $media_filename . '.jpg';
										$item[$num]['MediaObjects'][$j]['ThumbMedium']    = $image . 'thumbs/medium/' . $media_filename . '.jpg';
										$item[$num]['MediaObjects'][$j]['ThumbLarge']     = $image . $media_filename . '.jpg';
										$item[$num]['MediaObjects'][$j]['Media']          = $image . $media_filename . '.jpg';
										if(strtolower($mediaobjects[$j]['MediaType']) == 'audio') {
											$audio_filename = strtolower($mediaobjects[$j]['MediaFileName']);
											if (isset($mediaobjects[$j]['MediaFileName']))
												{
												$media_filename = strtolower($mediaobjects[$j+1]['MediaFileName']);	
												$image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
												$item[$num]['MediaObjects'][$j]['ThumbSmall']     = $image . 'thumbs/small/' . $media_filename . '.jpg';
												$item[$num]['MediaObjects'][$j]['ThumbMedium']    = $image . 'thumbs/medium/' . $media_filename . '.jpg';
												$item[$num]['MediaObjects'][$j]['ThumbLarge']     = $image . $media_filename . '.jpg';
												$item[$num]['MediaObjects'][$j]['Media']          = $image . $media_filename . '.jpg';
												$audio = $assetsUrl . 'objects/' . $museum_filename . '/audio/';
												$item[$num]['MediaObjects'][$j]['Media']          = $audio . $audio_filename;
												}
										}
								$num++;
								}
							}
						}
				//	}
				} // end of for Kw 
			}
		return $item;
	}
	
    protected function find_items($keyphrase, $keywords, $search_categories) {
        // init match arrays
		
		include('baseurl.php');
        $exact_match = array();
		$keyword_match = array();
		$museum_filename = array();
		$item = array();
        $single_match = array();
		$search_results = array();
		$musuem_name = array();
		$db = $this->load->database('default', TRUE);
		$keyphrase_arr = array();
		$keyphrase_arr[0] = $keyphrase;
		//Priority 1 = Keyphrase in Accession Number
			if (empty($keyphrase))
				$search_results = $this->showAll($db);
			else
			{
				$search_results = $this->advance_search($db,$search_results,$keyphrase_arr, 'AccessionNumber');
				//Priority 2 = Keyphrase in Object
				$search_results = $this->advance_search($db,$search_results,$keyphrase_arr, 'Object');
				//Priority 3 = Keyphrase in Description
				$search_results = $this->advance_search($db,$search_results,$keyphrase_arr, 'Description');
				//Priority 4 = Keyword in Object
				$search_results = $this->advance_search($db,$search_results,$keywords, 'Object');
				//Priority 5 = Keyword in Description
				$search_results = $this->advance_search($db,$search_results,$keywords, 'Description');
			}
			
			if ($search_categories )
				{
					// check for selected object types from above results
					$search_results = $this->advance_check($search_results, $search_categories, "ObjectType");
					// check for selected materials from above results
					$search_results = $this->advance_check($search_results, $search_categories, "Materials");
					// check for selected museums from above results 
					$search_results = $this->advance_check($search_results, $search_categories, "Museum");
					// check for selected Culture groups from above results
					$search_results = $this->advance_check($search_results, $search_categories, "CultureGroup");
				}
        return $search_results;
    }
}

?>

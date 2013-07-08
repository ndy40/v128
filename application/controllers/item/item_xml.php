<?php

include('item.php');

/**
 * Description of item_xml
 *
 * @author Oliver Winks
 */
class Item_XML extends Item {
    
    function Item_XML() {
        parent::Item();
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
    
//    private function search($search_term, $tokens, $exclusion_list = array()) {
//        $exact_match = array();
//        $match = array();
//        
//        // get all xml files
//        $dir = '../assets/XML';
//        $dh = opendir($dir);
//        
//        // fill array of files
//        $count = 0;
//        while(($file = readdir($dh)) !== false) {
//            if(!is_dir($dir . '/' . $file)) {
//                $museum_xml = simplexml_load_file($dir . '/' . $file);
//                
//                // get museum name and convert it to filename
//                $museum_name = $museum_xml->xpath('Institutions/Institution[1]/InstitutionName');
//                $museum_filename = str_replace(' ', '_', $museum_name[0]);
//                
//                $items_xml = $museum_xml->xpath('CulturalObjects/CulturalObject');
//                foreach($items_xml as $item_xml) {
//                    
//                    // check if item is in the exclusion list
//                    $is_excluded = false;
//                    foreach($exclusion_list as $excluded_item) {
//                        if((string) $excluded_item == (string) $item_xml->AccessionNumber) {
//                            $is_excluded = true;
//                            break;
//                        }
//                    }
//                    
//                    // check if object name is an exact match with the search term
//                    if(!$is_excluded) {
//                        if(!(strpos($item_xml->Object, $search_term) === false)) {
//                            $exact_match[$count++] = $this->xml_to_array($item_xml, $museum_filename);
//                        } else {
//                            // check if object name contains any of the tokens
//                            foreach($tokens as $token) {
//                                if(!(strpos($item_xml->Object, $token) === false)) {
//                                    $match[$count++] = $this->xml_to_array($item_xml, $museum_filename);
//                                    break;
//                                }
//                            }
//                        }
//                    }
//                }
//            }
//        }
//        closedir($dh);
//        
//        return array_merge($exact_match, $match);
//    }
    
    private function search($keyphrase, $keywords, $exclusion_list = array()) {
        // init match arrays
        $exact_match = array();
        $exact_match[0] = array();
        $exact_match[1] = array();
        $single_match = array();
        
        // get all xml files
        $dir = '../assets/XML';
        $dh = opendir($dir);
        
        // fill array of files
        $count = 0;
        while(($file = readdir($dh)) !== false) {
            if(!is_dir($dir . '/' . $file)) {
                $museum_xml = simplexml_load_file($dir . '/' . $file);
                
                // get museum name and convert it to filename
                $museum_name = $museum_xml->xpath('Institutions/Institution[1]/InstitutionName');
                $museum_filename = strtolower(str_replace(' ', '_', $museum_name[0]));
                
                $items_xml = $museum_xml->xpath('CulturalObjects/CulturalObject');
                foreach($items_xml as $item_xml) {
                    // check if item is in the exclusion list
                    $is_excluded = false;
                    foreach($exclusion_list as $excluded_item) {
                        if((string) $excluded_item == (string) $item_xml->AccessionNumber) {
                            $is_excluded = true;
                            break;
                        }
                    }
                    
                    /* ******** ******** ******** */
                    /* CHECK IF NAME MATCHES      */
                    /* KEYPHRASE OR KEYWORDS.     */
                    /* ******** ******** ******** */
                    if(!$is_excluded) {
                        $keyphrase = str_replace('/', '', $keyphrase);
                        $keyphrase = str_replace('.', '\.', $keyphrase);

                        // check if object name is an exact match with the search term
                        if(preg_match("/\b".(strtolower($keyphrase))."\b/i", strtolower(str_replace('/', '', $item_xml->Object)))) {
                            $exact_match[0][$count] = $this->xml_to_array($item_xml, $museum_filename);
                        } else if(preg_match("/\b".(strtolower($keyphrase))."\b/i", strtolower(str_replace('/', '', $item_xml->Description)))) {
                            $exact_match[1][$count] = $this->xml_to_array($item_xml, $museum_filename);
                        } else {
                            // check if object name, description, associated places, people or accession number contains any of the tokens
                            foreach($keywords as $keyword) {
                                $keyword = str_replace('/', '', $keyword);
                                $keyword = str_replace('.', '\.', $keyword);
                                if(preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->Object))) || 
                                        preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->Description)))) {
                                    $single_match[$count] = $this->xml_to_array($item_xml, $museum_filename);
                                    break;
                                }
                            }
                        }
                        $count++;
                    }
                }
            }
        }
        closedir($dh);
        
        $search_results = array();
        for($i=0; $i<sizeof($exact_match); $i++)
            $search_results = array_merge($search_results, $exact_match[$i]);
        $search_results = array_merge($search_results, $single_match);
        echo "<pre>";
        print_r ($search_results);
        echo "</pre>";
        return $search_results;
    }
    
    protected function get_item($item_id, $museumName) {
        $return_item = array();
        
        // get all xml files
        $dir = '../assets/XML';
        $dh = opendir($dir);
        
        // fill array of files
        $files = array();
        while(($file = readdir($dh)) !== false) {
            if(!is_dir($dir . '/' . $file)) {
                $museum_xml = simplexml_load_file($dir . '/' . $file);
                
                // get museum name and convert it to filename
                $museum_name = $museum_xml->xpath('Institutions/Institution[1]/InstitutionName');
                $museum_filename = strtolower(str_replace(' ', '_', $museum_name[0]));
                
                $item_xml = $museum_xml->xpath("CulturalObjects/CulturalObject[AccessionNumber='" . $item_id . "']");
                if(sizeof($item_xml) > 0) {
                    // convert item to array
                    $return_item = $this->xml_to_array($item_xml[0], $museum_filename);
                    
                    break;
                }
            }
        }
        closedir($dh);
        
		//echo "<pre>";
//        print_r ($return_item);
//        echo "</pre>";
		
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
                $priority_related_item = $this->get_item($related_id);
                array_unshift($all_related_items, $priority_related_item);
            }
        }
        
        // return sub array
        return array_slice($all_related_items, $offset, $limit);
    }
    
    public function ajax_get_items($item_id_hex, $limit, $offset) {
        include('baseurl.php');
        
        // get item id from hex
        $item_id = hex2bin($item_id_hex);
        
        // search for related items
        $related_items = $this->get_related_items($item_id, $limit, $offset);
        
        // write html for each item
        $html = "";
        foreach($related_items as $item) {
            $html = $html . "<a href=\"" . $baseUrl . "index.php/item/item" . $db_type . "/index/" . bin2hex($item['AccessionNumber']) . "\">\n";
            $html = $html . "    <img src=\"" . $item['MediaObjects'][0]['ThumbSmall'] . "\" alt=\"" . $item['Object'] . "\" />\n";
            $html = $html . "</a>\n";
        }
        echo $html;
    }
    
}

?>

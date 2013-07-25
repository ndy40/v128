<?php

include('search.php');

/**
 * Description of item_xml
 *
 * @author Oliver Winks
 */
class Search_XML extends Search {
    
    function Search_XML() {
        parent::Search();
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
            
            $media_filename = $item['MediaObjects'][$i]['MediaFileName'];
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
            
            $associated_media_filename = $item['AssociatedMediaObjects'][$i]['AssociatedMediaFileName'];
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
    
    protected function find_items($keyphrase, $keywords, $search_categories) {
        // init match arrays
        $exact_match = array();
        $exact_match[0] = array();
        $exact_match[1] = array();
        $exact_match[2] = array();
        $exact_match[3] = array();
        $exact_match[4] = array();
        $exact_match[5] = array();
        $exact_match[6] = array();
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
                $museum_filename = str_replace(' ', '_', $museum_name[0]);
                
                $items_xml = $museum_xml->xpath('CulturalObjects/CulturalObject');
                foreach($items_xml as $item_xml) {
                    /* ******** ******** ******** */
                    /* CHECK IF NAME MATCHES ANY  */
                    /* KEYWORDS.                  */
                    /* ******** ******** ******** */
                    $match = 0; // 0=no match, 1=exact match, 2=match
                    $order = 0;
                    $keyphrase = str_replace('/', '', $keyphrase);
                    $keyphrase = str_replace('.', '\.', $keyphrase);
                    
                    // check if object name is an exact match with the search term
                    if(preg_match("/\b".(strtolower($keyphrase))."\b/i", strtolower(str_replace('/', '', $item_xml->AccessionNumber)))) {
                        $match = 1;
                        $order = 0;
                    } else if(preg_match("/\b".(strtolower($keyphrase))."\b/i", strtolower(str_replace('/', '', $item_xml->Object)))) {
                        $match = 1;
                        $order = 1;
                    } else if(preg_match("/\b".(strtolower($keyphrase))."\b/i", strtolower(str_replace('/', '', $item_xml->ObjectType)))) {
                        $match = 1;
                        $order = 2;
                    } else if(preg_match("/\b".(strtolower($keyphrase))."\b/i", strtolower(str_replace('/', '', $item_xml->CulturalGroup)))) {
                        $match = 1;
                        $order = 3;
                    } else if(preg_match("/\b".(strtolower($keyphrase))."\b/i", strtolower(str_replace('/', '', $item_xml->Description)))) {
                        $match = 1;
                        $order = 4;
                    } else if(preg_match("/\b".(strtolower($keyphrase))."\b/i", strtolower(str_replace('/', '', $item_xml->AssociatedPeople)))) {
                        $match = 1;
                        $order = 5;
                    } else if(preg_match("/\b".(strtolower($keyphrase))."\b/i", strtolower(str_replace('/', '', $item_xml->AssociatedPlaces)))) {
                        $match = 1;
                        $order = 6;
                    } else {
                        // check if object name, description, associated places, people or accession number contains any of the tokens
                        foreach($keywords as $keyword) {
                            $keyword = str_replace('/', '', $keyword);
                            $keyword = str_replace('.', '\.', $keyword);
                            if(preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->AccessionNumber))) || 
                                    preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->Object))) ||
                                    preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->ObjectType))) ||
                                    preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->CulturalGroup))) ||
                                    preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->Description))) || 
                                    preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->AssociatedPeople))) ||
                                    preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->AssociatedPlaces)))) {
                                $match = 2;
                                break;
                            }
                        }
                    }
                    
                    /* ******** ******** ******** */
                    /* CHECK IF OBJECT IS IN ANY  */
                    /* OF THE SEARCH CATEGORIES.  */
                    /* ******** ******** ******** */
                    $add_item = true;
                    if(sizeof($search_categories) > 0) { // if no search categories have been selected then just add the item.
                        if($match > 0) {
                            foreach($search_categories as $category => $terms) {
                                $category_match = false;
                                $category_xml = $item_xml->xpath($category);
                                
                                foreach($terms as $term) {
                                    if(preg_match("/\b".(strtolower($term))."\b/i", strtolower($category_xml[0]))) {
                                        $category_match = true;
                                        break;
                                    }
                                }
                                
                                if(!$category_match) {
                                    $add_item = false;
                                    break;
                                }
                                    
                            }
                        }
                    }
                    
                    /* ******** ******** ******** */
                    /*          ADD ITEM          */
                    /* ******** ******** ******** */
                    if($add_item) {
                        // add the object to results
                        if($match == 1)
                            $exact_match[$order][$count] = $this->xml_to_array($item_xml, $museum_filename);
                        else if($match == 2)
                            $single_match[$count] = $this->xml_to_array($item_xml, $museum_filename);
                    }
                    $count++;
                }
            }
        }
        closedir($dh);
        
        $search_results = array();
        for($i=0; $i<sizeof($exact_match); $i++)
            $search_results = array_merge($search_results, $exact_match[$i]);
        $search_results = array_merge($search_results, $single_match);
        
        return $search_results;
    }
    
//    protected function find_items($keyphrase, $keywords, $search_categories) {
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
//                    /* ******** ******** ******** */
//                    /* CHECK IF NAME MATCHES ANY  */
//                    /* KEYWORDS.                  */
//                    /* ******** ******** ******** */
//                    $name_matches = 0; // 0=no match, 1=exact match, 2=match
//                    $keyphrase = str_replace('/', '', $keyphrase);
//                    $keyphrase = str_replace('.', '\.', $keyphrase);
//                    
//                    // check if object name is an exact match with the search term
//                    if(preg_match("/\b".(strtolower($keyphrase))."\b/i", strtolower(str_replace('/', '', $item_xml->Object)))) {
//                        $name_matches = 1;
//                    } else {
//                        // check if object name, description, associated places, people or accession number contains any of the tokens
//                        foreach($keywords as $keyword) {
//                            $keyword = str_replace('/', '', $keyword);
//                            $keyword = str_replace('.', '\.', $keyword);
//                            if(preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->Object))) || 
//                                    preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->Description))) ||
//                                    preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->AssociatedPlaces))) ||
//                                    preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->AssociatedPeople))) ||
//                                    preg_match("/\b".(strtolower($keyword))."\b/i", strtolower(str_replace('/', '', $item_xml->AccessionNumber)))) {
//                                $name_matches = 2;
//                                break;
//                            }
//                        }
//                    }
//                    
//                    /* ******** ******** ******** */
//                    /* CHECK IF OBJECT IS IN ANY  */
//                    /* OF THE SEARCH CATEGORIES.  */
//                    /* ******** ******** ******** */
//                    $add_item = true;
//                    if(sizeof($search_categories) > 0) { // if no search categories have been selected then just add the item.
//                        if($name_matches > 0) {
//                            foreach($search_categories as $key => $terms) {
//                                $category = $item_xml->xpath($key);
//                                foreach($terms as $term) {
//                                    $add_item = false;
//                                    if(strpos($category[0], $term) != false) {
//                                        $add_item = true;
//                                        break;
//                                    }
//                                }
//                                
//                                if($add_item) {
//                                    break;
//                                }
//                            }
//                        }
//                    }
//                    
//                    /* ******** ******** ******** */
//                    /*          ADD ITEM          */
//                    /* ******** ******** ******** */
//                    if($add_item) {
//                        // add the object to results
//                        if($name_matches == 1)
//                            $exact_match[$count++] = $this->xml_to_array($item_xml, $museum_filename);
//                        else if($name_matches == 2)
//                            $match[$count++] = $this->xml_to_array($item_xml, $museum_filename);
//                    }
//                }
//            }
//        }
//        closedir($dh);
//        
//        return array_merge($exact_match, $match);
//    }
    
}

?>

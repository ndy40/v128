<?php

include('home.php');

/**
 * Description of home_xml
 *
 * @author Oliver Winks
 */
class Home_XML extends Home {
    
    function Home_XML() {
        parent::Home();
    }
    
    private function get_museum_names() {
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
        
        return $files; 
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
    
    private function xml_to_array($item_xml, $museum_filename) {
        include( 'baseurl.php');
        
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
                $item['MediaObjects'][$i]['ThumbSmall']     = $assetsUrl.'objects/all/image/small/no-image.jpg';
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
    
    protected function get_random_object() {
        // choose a random museum
        $museums = $this->get_museum_names();
        $r = rand(0, sizeof($museums) - 1);
        
        // get a random object from it
        $museum_xml = $this->get_museum_xml($museums[$r]);
        $museum_filename = strtolower(str_replace(' ', '_', $museums[$r]));
        
        $items_xml = $museum_xml->xpath('CulturalObjects/CulturalObject');
	
        $r = rand(0, sizeof($items_xml) - 1);
        return $this->xml_to_array($items_xml[$r], $museum_filename);
    }
    
    protected function get_random_video() {
        // get all videos from associated media
        $dir =   '../assets/objects/associated_media/video';
        $dh = opendir($dir);
        
        $filenames = array();
        $files = array();
        $i = 0;
        while(($file = readdir($dh)) !== false) {
            if(is_file($dir . '/' . $file) && $file != 'Thumbs.db' && $file != '.htaccess') {
                $filename = strtolower(substr($file, 0, strpos($file, '.')));
                if(!in_array($filename, $filenames)) {
                    $filenames[$i++] = $filename;
                }
            }
        }
		uksort($filenames, 'strcasecmp');
       
        return $filenames[rand(0, sizeof($filenames) - 1)];
    }
    
}

?>

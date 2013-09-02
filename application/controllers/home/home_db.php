<?php

include('home.php');
include('baseurl.php');
/**
 * Description of home_xml
 *
 * @author Dr Zeeshan Patoli
 */
class Home_DB extends Home {
    
    function Home_DB() {
        parent::Home();
    }
    
    private function get_museum_names() {
        // get all xml files
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
		//print_r ($files);
		return $files; 
    }
    
    private function get_museum_xml($museum_name) {
  
    }
    
    private function xml_to_array($item_xml, $museum_filename) {
       
    }
    
    public function get_random_object() {
        // choose a random museum
        include('baseurl.php');
		$museums = $this->get_museum_names();
        $r = rand(0, sizeof($museums) - 1);
        // convert item to array
        $item = array();
		
		$db = $this->load->database('default', TRUE);
        // get all the institutions in the database
       
        //$data['institutions'] = $this->db->get('institutions')->result();
        $sql = 'SELECT * FROM CulturalObjects WHERE Museum="'. $museums[$r].'"';
		$item['Museum'] =  $museums[$r];
		
		$ob = $db->query($sql)->result_array();
		$museum_filename = strtolower(str_replace(' ', '_', $museums[$r]));
		//echo count($ob);
		$r = rand(0, sizeof($ob) - 1);
		
		$item['AccessionNumber'] = $ob[$r]['AccessionNumber'];
		$item['Description'] = $ob[$r]['Description'];
		
		$item['Object'] = $ob[$r]['Object'];
		$sql = 'SELECT * FROM MediaObjects WHERE FK_COId="'. $ob[$r]['COId'] .'"';
		$mediaobjects = $db->query($sql)->result_array();
        	
            $media_filename = strtolower($mediaobjects[0]['MediaFileName']);
            if(strtolower($media_filename) == 'no data') {
                $item['MediaObjects'][0]['ThumbSmall']     = $assetsUrl.'objects/all/image/small/no-image.jpg';
                $item['MediaObjects'][0]['ThumbMedium']    = $assetsUrl . 'objects/all/image/medium/no-image.jpg';
                $item['MediaObjects'][0]['ThumbLarge']     = $assetsUrl . 'objects/all/image/large/no-image.jpg';
                $item['MediaObjects'][0]['Media']          = $assetsUrl . 'objects/all/image/large/no-image.jpg';
            } else {
                // what is the objects type?
                if(strtolower($mediaobjects[0]['MediaType']) == 'image') {
                    $image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
                    $item['MediaObjects'][0]['ThumbSmall']     = $image . 'thumbs/small/' . $media_filename . '.jpg';
                    $item['MediaObjects'][0]['ThumbMedium']    = $image . 'thumbs/medium/' . $media_filename . '.jpg';
                    $item['MediaObjects'][0]['ThumbLarge']     = $image . $media_filename . '.jpg';
                    $item['MediaObjects'][0]['Media']          = $image . $media_filename . '.jpg';
                } 
				if(strtolower($mediaobjects[0]['MediaType']) == 'audio'){
						$audio_filename = strtolower($mediaobjects[0]['MediaFileName']);
					if (isset($mediaobjects[1]['MediaFileName']))
						{	
							$image_filename = strtolower($mediaobjects[1]['MediaFileName']);
							
							$image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
							$item['MediaObjects'][0]['ThumbSmall']     = $image . 'thumbs/small/' . $image_filename . '.jpg';
							$item['MediaObjects'][0]['ThumbMedium']     = $image . 'thumbs/medium/' . $image_filename . '.jpg';
							$item['MediaObjects'][0]['ThumbLarge']      = $image . $image_filename . '.jpg';
							//$return_item[$i]['MediaObjects'][$j]['Media']          = $image . $image_filename . '.jpg';
						}
						//echo "<br>". $image_filename;
							$audio = $assetsUrl . 'objects/' . $museum_filename . '/audio/';
							$item['MediaObjects'][0]['Media']          = $audio . $audio_filename;
							
							
						}
				
				/*else if(strtolower($mediaobjects[0]['MediaType']) == 'audio') {
                    $audio = $assetsUrl . 'objects/' . $museum_filename . '/audio/';
                    $item['MediaObjects'][0]['ThumbSmall']     = $audio . 'thumbs/small/edison_wax_cylinder.jpg';
                    $item['MediaObjects'][0]['ThumbMedium']    = $audio . 'thumbs/medium/edison_wax_cylinder.jpg';
                    $item['MediaObjects'][0]['ThumbLarge']     = $audio . 'thumbs/large/edison_wax_cylinder.jpg';
                    $item['MediaObjects'][0]['Media']          = $audio . $media_filename;
                } else if(strtolower($mediaobjects[0]['MediaType']) == 'video') {
                    $video = $assetsUrl . 'objects/' . $museum_filename . '/video/';
                    $item['MediaObjects'][0]['ThumbSmall']     = $video . 'thumbs/small/' . $media_filename . '.jpg';
                    $item['MediaObjects'][0]['ThumbMedium']    = $video . 'thumbs/medium/' . $media_filename . '.jpg';
                    $item['MediaObjects'][0]['ThumbLarge']     = $video . 'thumbs/large/' . $media_filename . '.jpg';
                    $item['MediaObjects'][0]['Media']          = $video . $media_filename;
                }*/
			}
		
		return $item;
    }
    
    protected function get_random_video() {
        // get all videos from associated media
		include('baseurl.php');
        $dir =   $documentRoot.'/assets/objects/associated_media/video';
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

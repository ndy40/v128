<?php

/**
 * Description of gallery
 *
 * @author 
 */

class Gallery extends CI_Controller {
    
    function Gallery() {
        parent::__construct();
    }
    
    public function index() {
        include('baseurl.php');
        
        // get all videos from associated media
        $dir = $documentRoot.'/assets/objects/associated_media/video';
        $dh = opendir($dir);
        
        $filenames = array();
        $files = array();
        $i = 0;
		
        while(($file = readdir($dh)) !== false) {
            if(is_file($dir . '/' . $file) && $file != 'Thumbs.db' && $file != '.htaccess' ) {
                $filename = strtolower(substr($file, 0, strpos($file, '.')));
                if(!in_array($filename, $filenames)) {
                    $filenames[$i++] = $filename;
					
                }
            }
        }
		

        sort($filenames);
        $this->load->view('video_gallery', array(
            'filenames' => $filenames
        ));
    }
    
}

?>

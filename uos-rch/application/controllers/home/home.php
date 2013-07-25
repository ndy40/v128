<?php

/**
 * Description of index
 *
 * @author Dr Zeeshan Patoli
 */
abstract class Home extends CI_Controller {
    
    abstract protected function get_random_object();
    abstract protected function get_random_video();
    
    function Home() {
        parent::__construct();
    }
    
    public function index() {
        $random_object = $this->get_random_object();
        $random_video = $this->get_random_video();
        
        $this->load->view('home', array(
            'object' => $random_object,
            'video_filename' => $random_video
        ));
    }
    
}

?>

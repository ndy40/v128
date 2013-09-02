<?php

/**
 * Description of browse
 *
 * @author Oliver Winks
 */
abstract class Browse extends CI_Controller {
    
    var $museums_per_page = 10;
    var $items_per_page = 5;
    
    function Browse() {
        parent::__construct();
    }
    
    protected abstract function num_museums();
    protected abstract function get_museum_names($limit, $offset);
    protected abstract function get_museum_objects($museum_name, $limit, $offset);
    public abstract function ajax_get_objects($museum_name, $limit, $offset);
    
    private function setup_pagination() {
        include( 'baseurl.php');
        
        // setup pagination
        $config['base_url'] = $baseUrl . 'index.php/browse/browse' . $db_type . '/index';
        $config['total_rows'] = 2;//$this->num_museums();
        $config['per_page'] = 2; //$this->museums_per_page;
        $config['num_link'] = 5;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
    }
    
    function index() {
        // setup
        $this->setup_pagination();
        
        // get museums array
        $museums_offset = $this->uri->segment(5);
        $museum_names = $this->get_museum_names($this->museums_per_page, $museums_offset);
        
        // get items from museums
        $museum_items = array();
        
        foreach($museum_names as $museum_name) {
            array_push($museum_items, $this->get_museum_objects($museum_name, $this->items_per_page, 0));
			
        }
		/*echo "<pre>";
        print_r($museum_items);
		echo "</pre>";*/
        $this->load->view('browse', array(
            'museum_names' => $museum_names,
            'museum_items' => $museum_items
        ));
		
    }
    
}

?>

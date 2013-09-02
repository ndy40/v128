<?php

/**
 * Description of search
 *
 * @author Dr M. Zeeshan Patoli
 */
abstract class Search extends CI_Controller {
    
    var $items_per_page = 10;
    
    function Search() {
        parent::__construct();
    }
    
    abstract protected function find_items($keyphrase, $keywords, $search_categories);
    
    private function setup_pagination($total_rows) {
        include('baseurl.php');
        
        // build base url
        $str = '?';
        foreach($_GET as $key => $value)
            $str .= '&' . $key . '=' . $value;
        
        // setup pagination
        $config['base_url'] = $baseUrl . 'index.php/search/search' . $db_type . '/find' . $str;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->items_per_page;
        $config['num_link'] = 10;
        $config['page_query_string'] = true;
        $this->pagination->initialize($config);
    }
    
    public function index() {
        $this->load->view('search');
    }
    
    public function find() {
        // get keywords
        $keyphrase = $_GET['keywords'];
        $keywords = explode(' ', $keyphrase);
        for($i=0; $i<sizeof($keywords); $i++)
            $keywords[$i] = trim($keywords[$i]);
        
        // get search categories
        $search_categories = array();
        foreach($_GET as $key => $value) {
            // find opening/closing bracket
            $open_bracket  = strpos($value, '[');
            $close_bracket = strpos($value, ']');
            
            if($open_bracket > 0 && $close_bracket > $open_bracket) {
                // get search category
                $category = substr($value, 0, $open_bracket);
                $terms_str = substr($value, $open_bracket + 1, $close_bracket - $open_bracket - 1);

                // break terms into tokens
                $terms = explode(',', $terms_str);
                for($i=0; $i<sizeof($terms); $i++) {
                    if(!array_key_exists($category, $search_categories))
                        $search_categories[$category] = array();

                    array_push($search_categories[$category], trim($terms[$i]));
                }
            }
        }
       
		$found_objects = $this->find_items($keyphrase, $keywords, $search_categories);
        
        // setup pagination
        $total_found = sizeof($found_objects);
        $this->setup_pagination($total_found);
        
        $offset = 0;
        if(isset($_GET['per_page']) && $_GET['per_page'] != null)
            $offset = (int) $_GET['per_page'];
        
        $found_objects = array_slice($found_objects, $offset, $this->items_per_page);
        
		//echo "<pre>";
//		print_r($found_objects);
//        echo "</pre>";
        // forward to search results page
        $this->load->view('search_results', array(
            'found_objects' => $found_objects,
            'total_found' => $total_found
        ));
    }
    
}

?>

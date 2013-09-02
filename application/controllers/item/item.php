<?php

/**
 * Description of Item
 *
 * @author Oliver Winks
 */
abstract class Item extends CI_Controller {
    
    var $items_per_page = 5;
	public static $increament = 5;
    
    function Item() {
        parent::__construct();
    }
    
    /**
     * Returns the item as an array in this format:
     * 
     * $item['AccessionNumber']
     * $item['ObjectType']
     * $item['Object']
     * $item['Description']
     * $item['Materials']
     * $item['CultureGroup']
     * $item['ProductionDate']
     * $item['AssociatedPlaces']
     * $item['AssociatedPeople']
     * $item['Museum']
     * $item['MediaObjects'][0 .. n]['MediaFileName']
     * $item['MediaObjects'][0 .. n]['MediaTitle']
     * $item['MediaObjects'][0 .. n]['MediaDescription']
     * $item['MediaObjects'][0 .. n]['MediaType']
     * $item['MediaObjects'][0 .. n]['SmallImage']
     * $item['MediaObjects'][0 .. n]['MediumImage']
     * $item['MediaObjects'][0 .. n]['LargeImage']
     * 
     */
    protected abstract function get_item($item_id, $museumName);
    
    /**
     * Returns all items from a search of the entire db using the name of the 
     * current item as a search term. The related items are returned as an array
     * of items, each related item is in the format described in get_items() 
     * (see above).
     */
    protected abstract function get_related_items($item_id, $limit, $offset, $museumName);
    public abstract function ajax_get_items($item_id_hex, $limit, $offset);
    
    public function index($item_id_hex) {
        // get item
        $item_id = hex2bin($item_id_hex);
        $tempArray = explode("___",$item_id);
		$item_id = $tempArray[0];
		$museumName = $tempArray[1];
		$item = $this->get_item($item_id, $museumName);

        
		$related_items = $this->get_related_items($item['AccessionNumber'], $this->items_per_page, 0, $museumName);
        
        $this->load->view('item', array(
            'item' => $item,
            'related_items' => $related_items
        ));
		
    }
    
}

?>

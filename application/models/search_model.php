<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchModel
 *
 * @author ndy40
 */


class Search_model extends CI_Model {

    var $keywords = array();
    var $items_per_page = 10;
    
    function SearchModel() {
        parent::__construct();
    }

    public function find($keywrds, $select_cat_json, $offset, $size) {
        //load database
        $this->load->database();
        $keywords = explode(" ", $keywrds);
        //trim to remove whitespaces
        for ($i = 0; $i < sizeof($keywords); $i++)
            $keywords[$i] = trim($keywords[$i]);
        //remove unchecked options
        for ($index = 0; $index < count($select_cat_json); $index) {
            //scan all item list for unchecked items and remove accordingly
            for($j = 0; $j < count($select_cat_json[$index]->items);$j++){
                if(!$select_cat_json[$index]->items[j]->checked){
                        array_splice($select_cat_json[$index]->items, i,1);
                }
                if(count($select_cat_json[$index]->items) < 1){
                    array_splice($select_cat_json, $index,1);
                }
            }
        }

        //get collection in batches and return results
        $object_collection = $this->db->get("CulturalObjects")->result_array();
        //search per field
        $object_collection = $this->advance_search($object_collection, $keywords, "AccessionNumber");
        $object_collection = $this->advance_search($object_collection, $keywords, "Object");
        $object_collection = $this->advance_search($object_collection, $keywords, "Description");
        
        if ($select_categories) {
            $object_collection = $this->advance_check($object_collection,$select_cat_json,"ObjectType");
            $object_collection = $this->advance_check($object_collection,$select_cat_json,"Materials");
            $object_collection = $this->advance_check($object_collection,$select_cat_json,"Museum");
            $object_collection = $this->advance_check($object_collection,$select_cat_json,"CultureGroup");
        }
        $count_results = count($object_collection);
        $object_collection = array_splice($object_collection, $offset,$size);
        //return $object_collection;
        return array("results" => array("count" => count($count_results), "offset" => (int) $offset, "size" => (int) $size, "resultcount" => count($object_collection), "data" => $object_collection));
    }

    protected function advance_search(&$dbCollection, $keywords, $searchField) {
        include 'baseurl.php';
        $num_of_objects = count($dbCollection);
        $copy_of_collections = array(); //used to hold selected items from original collection
        //iterate over each keyword and compare against collection
        for ($kwrd_count = 0; $kwrd_count < count($keywords); $kwrd_count++) {
            //generate regex pattern from keyword
            if (strstr($keywords[$kwrd_count], "/")) {
                $keywords[$kwrd_count] = str_replace("/", "\/", $keywords[$kwrd_count]);
            }
            //regex pattern
            $pattern = '/\b' . $keywords[$kwrd_count] . '\b/i';
            $found_index = 0;
            //iterate over collection and compare against keyword pattern
            for ($index = 0; $index < count($dbCollection); $index++) {
                preg_match($pattern, $dbCollection[$index][$searchField], $matches, PREG_OFFSET_CAPTURE, 0);
                if ($matches) {
                    //copy record to copy collection. This means keywords match
                    $copy_of_collections[$found_index] = $dbCollection[$index];
                    $found_index++;
                }
            }
            //check for duplicate items
            for ($i = 0; $i < count($copy_of_collections); $i++) {
                $repeated_item = 0; //keep tracks of similar or duplicate items
                for ($j = 0; $j < count($dbCollection); $j++) {
                    if ($copy_of_collections[$i]['AccessionNumber'] == $dbCollection[$j]['AccessionNumber']) {
                        $repeated_item = 1;
                        break;
                    }
                }

                //no item repeated
                if ($repeated_item == 0) {
                    //update collection
                    $dbCollection[$num_of_objects]["AccessionNumber"] = $copy_of_collections[$i]['AccessionNumber'];
                    $dbCollection[$num_of_objects]["ObjectType"] = $copy_of_collections[$i]['ObjectType'];
                    $dbCollection[$num_of_objects]["Object"] = $copy_of_collections[$i]['Object'];
                    $dbCollection[$num_of_objects]["Description"] = $copy_of_collections[$i]['Description'];
                    $dbCollection[$num_of_objects]["Materials"] = $copy_of_collections[$i]['Materials'];
                    $dbCollection[$num_of_objects]["CultureGroup"] = $copy_of_collections[$i]['CultureGroup'];
                    $dbCollection[$num_of_objects]["Museum"] = $copy_of_collections[$i]['Museum'];

                    $museum_filename = strtolower(str_replace(' ', '_', $ob[$i]['Museum'])); //creat file path
                    $media_objects = $this->db->get_where("MediaObjects", array("FK_COId" => $copy_of_collections[$i]['COId']));
                    //build media section 
                    foreach ($media_objects->result() as $row) {
                        $dbCollection[$num_of_objects]["MediaObject"] = $row->MediaFileName;
                        $media_filename = strtolower($row->MediaFileName);
                        if ($media_filename == "no data") {
                            $dbCollection[$num_of_objects]['MediaObjects'][0]['ThumbSmall'] = $assetsUrl . 'objects/all/image/small/no-image.jpg';
                            $dbCollection[$num_of_objects]['MediaObjects'][0]['ThumbMedium'] = $assetsUrl . 'objects/all/image/medium/no-image.jpg';
                            $dbCollection[$num_of_objects]['MediaObjects'][0]['ThumbLarge'] = $assetsUrl . 'objects/all/image/large/no-image.jpg';
                            $dbCollection[$num_of_objects]['MediaObjects'][0]['Media'] = $assetsUrl . 'objects/all/image/large/no-image.jpg';
                        } else {
                            $image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
                            $dbCollection[$num_of_objects]['MediaObjects'][0]['ThumbSmall'] = $image . 'thumbs/small/' . $media_filename . '.jpg';
                            $dbCollection[$num_of_objects]['MediaObjects'][$j]['ThumbMedium'] = $image . 'thumbs/medium/' . $media_filename . '.jpg';
                            $dbCollection[$num_of_objects]['MediaObjects'][$j]['ThumbLarge'] = $image . $media_filename . '.jpg';
                            $dbCollection[$num_of_objects]['MediaObjects'][$j]['Media'] = $image . $media_filename . '.jpg';
                            if (strtolower($mediaobjects[$j]['MediaType']) == 'audio') {
                                $audio_filename = strtolower($mediaobjects[$j]['MediaFileName']);
                                if (isset($mediaobjects[$j]['MediaFileName'])) {
                                    $media_filename = strtolower($mediaobjects[$j + 1]['MediaFileName']);
                                    $image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
                                    $item[$num]['MediaObjects'][$j]['ThumbSmall'] = $image . 'thumbs/small/' . $media_filename . '.jpg';
                                    $item[$num]['MediaObjects'][$j]['ThumbMedium'] = $image . 'thumbs/medium/' . $media_filename . '.jpg';
                                    $item[$num]['MediaObjects'][$j]['ThumbLarge'] = $image . $media_filename . '.jpg';
                                    $item[$num]['MediaObjects'][$j]['Media'] = $image . $media_filename . '.jpg';
                                    $audio = $assetsUrl . 'objects/' . $museum_filename . '/audio/';
                                    $item[$num]['MediaObjects'][$j]['Media'] = $audio . $audio_filename;
                                }
                            }
                            ++$num_of_objects;
                        }
                    }
                }
            }
        }
        return $dbCollection;
    }

    //check against all other fields
    protected function advance_check($item, $search_categories, $search_type) {
        $num = 0;
        $search_results = array();
        $search_property = array();
        //get the collection with the searched property
        foreach($search_categories as $srch_group){
            die(var_dump($srch_group));
            if($srch_group->key == $search_type){
                $search_property = $srch_group;
                break;
            }
        }

        for ($i = 0; $i < count($item); $i++) {
            //British Library and Cootje Van Oven do not contain Material types
            if (($search_property->key == 'Materials') && (($item[$i]['Museum'] == 'British Library') || ($item[$i]['Museum'] == 'Cootje van Oven Collection'))) {
                $search_results[$num] = $item[$i];
                $num++;
            } else {
                //check for ObjectType

                if (isset($item[$i]))
                    for ($j = 0; $j < count($search_property->items); $j++) {
                        //echo "<br>".$item[$i][$search_type]. " : ".$search_categories[$search_type][$j];
                        if (strstr(strtolower($item[$i][$search_type]), strtolower($search_property->items[j]->value))) {
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

    public function showAll($offset = 0, $size = 10) {
        //include baseurl for global variables 
        include 'baseurl.php';       
        $this->load->database();
        $results_array = array();
        $query = $this->db->get("CulturalObjects", $size, $offset);
        //Get total number of objects for pagination purposes
        $total_count = $this->db->count_all_results("CulturalObjects");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $museum_file_path = strtolower(str_replace(' ', '_', $rows->Museum));
                $image = $assetsUrl . 'objects/' . $museum_file_path . '/image/';
                //build collection of media objects
                $media_query = $this->db->get_where("MediaObjects", array("FK_COId" => $rows->COId), $size, $offset);
                $media_objects = array();
                if($media_query->num_rows() > 0) {
                    $mo = $media_query->row();
                    $mediaFile = strtolower($mo->MediaFileName);
                    //check for empty data in mediaobject file name
                    if ($mediaFile == "no data") {
                        //append empty image url
                        $media_objects["Media"][] = array(
                            "small" => $assetsUrl . 'objects/all/image/small/no-image.jpg',
                            "medium" => $assetsUrl . 'objects/all/image/medium/no-image.jpg',
                            "large" => $assetsUrl . 'objects/all/image/large/no-image.jpg',
                            "media" => $assetsUrl . 'objects/all/image/large/no-image.jpg'
                        );
                    } else {
                        $media_objects["Media"][] = array(
                            "small" => $image . 'thumbs/small/' . $mo->MediaFileName . ".jpg",
                            "medium" => $image . 'thumbs/medium/' . $mo->MediaFileName . ".jpg",
                            "large" => $image . $mo->MediaFileName . ".jpg",
                            "media" => $image . $mo->MediaFileName . ".jpg"
                        );
                    }
                }

                $results_array[] = array(
                    "COId" => $rows->COId,
                    "AccessionNumber" => $rows->AccessionNumber,
                    "ObjectType" => $rows->ObjectType,
                    "Object" => $rows->Object,
                    "Description" => $rows->Description,
                    "Materials" => $rows->Materials,
                    "CultureGroup" => $rows->CultureGroup,
                    "Museum" => $rows->Museum,
                    "MediaObjects" => $media_objects
                );
            }
        }
        return array("results" => array("count" => $total_count, "offset" => (int) $offset, "size" => (int) $size, "resultcount" => $query->num_rows(), "data" => $results_array));
    }

    /*
    * Summary: Fetch Object by ID. Get just minimal properties
    */
    public function fetch_object($coid){
        include("baseurl.php");
        $this->load->database();
        $result = $this->db->get_where("CulturalObjects",array("COId"=>$coid));
        $response = array();
        if($result->num_rows() > 0){
            $row = $result->row();
            //build object array
            $response["COId"] = $row->COId;
            $response["AccessionNumber"] = $row->AccessionNumber;
            $response["Object"] = $row->Object;
            $response["CultureGroup"] = $row->CultureGroup;
            $response["Dimensions"] = $row->Dimensions;
            $response["ProductionDate"] = $row->ProductionDate;
            $response["AssociatedPlaces"] = $row->AssociatedPlaces;
            $response["AssociatedPeople"] = $row->AssociatedPeople;
            $response["Museum"] = $row->Museum;
            $response["FK_ExId"] = $row->FK_ExId;
            $response["Materials"] = $row->Materials;
            $response["Description"] = $row->Description;
            $response["ObjectType"] = $row->ObjectType;
            //featch media objects Images and Related Objects
            $mediaObjects = $this->db->get_where("MediaObjects",array("FK_COId"=>$row->COId));

            foreach($mediaObjects->result() as $media){
                $mediadata = array();
                $mediadata["MediaTitle"] = $media->MediaTitle;
                $mediadata["MediaDescription"] = $media->MediaDescription;
                $mediadata["MediaFileName"] = $media->MediaFileName;
                $mediadata["MediaType"] = $media->MediaType;
                $mediadata["FK_COId"] = $media->FK_COId;
                //build the different image thumbnails
                if($media->MediaFileName == "no data"){
                    $mediadata["Media"] = array(
                            "small" => $assetsUrl.'objects/all/image/small/no-image.jpg',
                            "medium" => $assetsUrl.'objects/all/image/medium/no-image.jpg',
                            "large" => $assetsUrl.'objects/all/image/large/no-image.jpg',
                            "media" => $assetsUrl.'objects/all/image/large/no-image.jpg'
                        );
                }else{
                        $media_filename = strtolower($media->MediaFileName);
                        $museum_filename = strtolower(str_replace(' ', '_', $row->Museum));                        
                        if(strtolower($media->MediaType) == 'image'){
                            $image_url = $assetsUrl.'objects/' . $museum_filename . '/image/';
                            $mediadata["Media"] = array(
                                    "small" => $image_url . 'thumbs/small/'.$media_filename .".jpg",
                                    "medium" => $image_url . 'thumbs/medium/'.$media_filename .".jpg",
                                    "large" => $image_url .$media_filename .".jpg",
                                    "media" => $image_url .$media_filename .".jpg",
                                );
                        }else if(strtolower($media->MediaType) == 'audio'){
                            $audio_filename = strtolower($row->MediaFileName);
                            $audio = $assetsUrl . 'objects/' . $museum_filename . '/audio/';
                            $mediadata["Media"] = array(
                                    "media" => $audio.$audio_filename
                                );
                        }
                }

                //add object to response
                $response["Media"][]=$mediadata;
            }
        }
        return $response;
    }

    public function fetch_media_objects($coid){
            include("baseurl.php");
             $this->load->database();
             $query = $this->db->get_where("CulturalObjects",array("COId"=>$coid));
             $row = $query->row();
        //featch media objects Images and Related Objects
            $mediaObjects = $this->db->get_where("MediaObjects",array("FK_COId"=>$row->COId));
            $response = array();
            foreach($mediaObjects->result() as $media){
                $mediadata = array();
                $mediadata["MediaTitle"] = $media->MediaTitle;
                $mediadata["MediaDescription"] = $media->MediaDescription;
                $mediadata["MediaFileName"] = $media->MediaFileName;
                $mediadata["MediaType"] = $media->MediaType;
                $mediadata["FK_COId"] = $media->FK_COId;
                //build the different image thumbnails
                if(strtolower($media->MediaFileName) == "no data"){
                    $mediadata["Media"] = array(
                            "small" => $assetsUrl.'objects/all/image/small/no-image.jpg',
                            "medium" => $assetsUrl.'objects/all/image/medium/no-image.jpg',
                            "large" => $assetsUrl.'objects/all/image/large/no-image.jpg',
                            "media" => $assetsUrl.'objects/all/image/large/no-image.jpg'
                        );
                }else{
                        $media_filename = strtolower($media->MediaFileName);
                        $museum_filename = strtolower(str_replace(' ', '_', $row->Museum));                        
                        if(strtolower($media->MediaType) == 'image'){
                            $image_url = $assetsUrl.'objects/' . $museum_filename . '/image/';
                            $mediadata["Media"] = array(
                                    "small" => $image_url . 'thumbs/small/'.$media_filename .".jpg",
                                    "medium" => $image_url . 'thumbs/medium/'.$media_filename .".jpg",
                                    "large" => $image_url .$media_filename .".jpg",
                                    "media" => $image_url .$media_filename .".jpg",
                                );
                        }else if(strtolower($media->MediaType) == 'audio'){
                            $audio_filename = strtolower($media->MediaFileName);
                            $audio = $assetsUrl . 'objects/' . $museum_filename . '/audio/';
                            $mediadata["Media"] = array(
                                    "media" => $audio.$audio_filename
                                );
                        }else if(strtolower($media->MediaType) == 'no data'){
                            $mediadata["Media"] = array(
                            "small" => $assetsUrl.'objects/all/image/small/no-image.jpg',
                            "medium" => $assetsUrl.'objects/all/image/medium/no-image.jpg',
                            "large" => $assetsUrl.'objects/all/image/large/no-image.jpg',
                            "media" => $assetsUrl.'objects/all/image/large/no-image.jpg'
                        );

                        }
                }

                //add object to response
                $response["Media"][]=$mediadata;
            }
            return $response;
    }

    public function fetch_related_objects($coid,$offset,$size){
        include("baseurl.php");
        //build query
        $this->load->database();
        $this->db->select("CulturalObjects.*");
        $this->db->from("CulturalObjects");
        $this->db->join("RelatedObjects","RelatedObjects.Value = CulturalObjects.AccessionNumber");
        $this->db->where("RelatedObjects.FK_COId",$coid);        
        //fetch result
        $query = $this->db->get();   
        $result["count"] = count($query->result());
        $sorted_array = $query->result_array();
        array_slice($sorted_array,$offset,$size);
        
        for($i = 0; $i < count($sorted_array); $i++){
            $mediaObjects = $this->fetch_media_objects($sorted_array[$i]["COId"]);
            $sorted_array[$i]["MediaObjects"] = $mediaObjects;
        }
        $result["data"] = $sorted_array;
        return $result;
    }

    //Gets a list of Associated Media Objects related to a CulturalObjects
    public function fetch_associated_media($coid){
        include("baseurl.php");
        $this->load->database();
        $query = $this->db->get_where("AssociatedMediaObjects",array("FK_COId"=>$coid));
        $response = array();        
        foreach($query->result() as $row){
            $media_filename = strtolower($row->AssociatedMediaFileName);
            //check to make sure data is present
            if(strtolower($media_filename) !== 'no data'){
                $associated_media = $assetsUrl . 'objects/associated_media/';
                $mediaobjects = array();
                //check if media object is image
                if(strtolower($row->AssociatedMediaType) == "image"){
                    $image = $associated_media . 'images/';
                    $mediaobjects["small"]     = $image . 'thumbs/small/' . $media_filename . '.jpg';
                    $mediaobjects["medium"]    = $image . 'thumbs/medium/' . $media_filename . '.jpg';
                    $mediaobjects["large"]    = $image . $media_filename . '.jpg';
                    $mediaobjects['media']          = $image . $media_filename . '.jpg';
                }
                //check if media object is video
                if(strtolower($row->AssociatedMediaType) == "audio"){
                    $audio = $associated_media . 'audio/';
                    $mediaobjects["small"]     = $audio . 'thumbs/small/edison_wax_cylinder.jpg';
                    $mediaobjects["medium"]    = $audio . 'thumbs/medium/edison_wax_cylinder.jpg';
                    $mediaobjects["large"]     = $audio . 'thumbs/large/edison_wax_cylinder.jpg';
                    $mediaobjects["media"]          = $audio . $media_filename;
                }
                //check if media object is audio
                if(strtolower($row->AssociatedMediaType) == "video"){
                    $video = $associated_media . 'video/';
                    $mediaobjects["small"]     = $video . 'thumbs/small/' . $media_filename . '.jpg';
                    $mediaobjects["medium"]    = $video . 'thumbs/medium/' . $media_filename . '.jpg';
                    $mediaobjects["large"]     = $video . 'thumbs/large/' . $media_filename . '.jpg';
                    $mediaobjects["media"]          = $video . $media_filename;
                }
                $response[] = array(
                            "AMOId" => $row->AMOId,
                            "AssociatedMediaFileName" =>$row->AssociatedMediaFileName,
                            "AssociatedMediaTitle" => $row->AssociatedMediaTitle,
                            "AssociatedMediaDescription" => $row->AssociatedMediaDescription,
                            "AssociatedMediaType" => $row->AssociatedMediaType,
                            "FK_ExId"=>$row->FK_ExId,
                            "FK_COId"=>$row->FK_COId,
                            "MediaObjects" => $mediaobjects
                            );
            }
        }

        return $response;

    }
    //Get the associated media object by the Associated Media Object ID (AMOId)
    public function fetch_media_object($amoid){
        include("baseurl.php");
        $this->load->database();
        $query = $this->db->get_where("AssociatedMediaObjects",array("AMOId"=>$amoid));
        $media = $query->row();
        //get actual CulturalObject for museum association
        $cultural_object = $this->db->get_where("CulturalObjects",array("COId"=>$media->FK_COId))->row();
        $museum_filename= strtolower(str_replace(' ', '_', $cultural_object->Museum));
        //build response
        $response = array();
        $response["AMOId"] = $media->AMOId;
        $response["AssociatedMediaFileName"] = $media->AssociatedMediaFileName;
        $response["AssociatedMediaTitle"] = $media->AssociatedMediaTitle;
        $response["AssociatedMediaDescription"] = $media->AssociatedMediaDescription;
        $response["AssociatedMediaType"] = $media->AssociatedMediaType;
        $response["FK_ExId"] = $media->FK_ExId;
        $response["FK_COId"] = $media->FK_COId;
        //Fetch and create media bundle
        $media_filename = strtolower($media->AssociatedMediaFileName);
        $media_object = array();
        if(strtolower($media_filename) == "no data"){
            $media_object["small"] = $assetsUrl . 'objects/all/image/small/no-image.jpg';
            $media_object["medium"]    = $assetsUrl . 'objects/all/image/medium/no-image.jpg';
            $media_object["large"]     = $assetsUrl . 'objects/all/image/large/no-image.jpg';
            $media_object["media"]     = $assetsUrl . 'objects/all/image/large/no-image.jpg';
            
        }else{
            if(strtolower($media->AssociatedMediaType) == "image"){
                $image = $assetsUrl . 'objects/' . $museum_filename . '/image/';
                $media_object["small"]     = $image . 'thumbs/small/' . $media_filename . '.jpg';
                $media_object["medium"]    = $image . 'thumbs/medium/' . $media_filename . '.jpg';
                $media_object["large"]     = $image . $media_filename . '.jpg';
                $media_object["media"]          = $image . $media_filename . '.jpg';
            }else if(strtolower($media->AssociatedMediaType) == "audio"){
                $audio = $assetsUrl . 'objects/' . $museum_filename . '/audio/';
                $media_object["small"]     = $audio . 'thumbs/small/edison_wax_cylinder.jpg';
                $media_object["medium"]    = $audio . 'thumbs/medium/edison_wax_cylinder.jpg';
                $media_object["large"]     = $audio . 'thumbs/large/edison_wax_cylinder.jpg';
                $media_object["media"]          = $audio . $media_filename;
            }else if(strtolower($media->AssociatedMediaType) == "video"){
                $video = $assetsUrl . 'objects/associated_media/video/';
                $media_object["small"]     = $video . 'thumbs/small/' . $media_filename . '.jpg';
                $media_object["medium"]    = $video . 'thumbs/medium/' . $media_filename . '.jpg';
                $media_object["large"]     = $video . 'thumbs/large/' . $media_filename . '.jpg';
                $media_object["media"]          = $video . $media_filename;
            }
        }
        $response["media"] = $media_object;

        return $response;
    }

    public function get_museum_list(){
        $this->load->database();
        $this->db->select("Museum");
        $this->db->distinct();
        $query = $this->db->get("CulturalObjects");
        return $query->result();
    }

    public function get_objects_by_museum($museum,$offset,$size){
        $this->load->database();
        $this->db->where("Museum",$museum);
        $this->db->from("CulturalObjects");
        $response = array();
        $response["count"] = $this->db->count_all_results();
        $query = $this->db->get_where("CulturalObjects",array("Museum"=>$museum),$size,$offset);
        $cultural_objects = $query->result_array();
         
        for($i = 0;$i < count($cultural_objects);$i++){
                $cultural_objects[$i]["MediaObjects"] = $this->fetch_media_objects($cultural_objects[$i]["COId"]);
         }
        $response["Objects"] = $cultural_objects;
        $response["offset"] = $offset;
        $response["size"] = $size;
        return $response;

    }
    
    
    

}

?>

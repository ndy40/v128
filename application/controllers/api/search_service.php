<?php
header("Access-Control-Allow-Headers: x-requested-with, content-type,xsrf-token");
header("Access-Control-Allow-Origin: *");
//header("Access-Control-Max-Age: 86400");
defined('BASEPATH') OR exit('No direct script access allowed');


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RestServiceController
 *
 * @author ndy40
 */
require APPPATH.'/libraries/REST_Controller.php';

class Search_service extends REST_Controller {
    
           
    public function search_item_post(){
        $this->load->model("search_model","search",true);        
        //Get parameters for offset and result size
        $offset = $this->get("offset");
        $size = $this->get("size");        
        //get search parameters
        $json_data =  json_decode(file_get_contents("php://input"));
        if(is_null($json_data->keywords) || empty($json_data->keywords)){
            $result = $this->search->showAll($offset,$size);
        }else{
            $result = $this->search->find($json_data->keywords,$json_data->data,$offset,$size);           
        }
        
        //return data 
        $this->response($result);
    }
   
   public function fetch_item_get(){
    $this->load->model("search_model","search",true);
    $coid = $this->get("coid");
    $result = $this->search->fetch_object($coid);
    $response = array();
    if(!empty($result)){
        $response["status"] = "success";        
    }else{
        $response["status"] = "failed";
    }
    $response["data"] = $result;
    $this->response($response);
   }

   public function fetch_related_objects_get(){
        $this->load->model("search_model","search",true);
        $coid = $this->get("coid");
        //get pagination requirements
        $offset = (int)$this->get("offset");
        $size = (int)$this->get("size");
        //get result
        $result = $this->search->fetch_related_objects($coid,$offset,$size);
        $this->response($result);
   }

   public function fetch_associated_media_get(){
        $this->load->model("search_model","search",true);
        $coid = $this->get("coid");
        $response = $this->search->fetch_associated_media($coid);
        $this->response(array("data"=>$response));
   }
   
   public function fetch_media_object_get(){
        $this->load->model("search_model","search",true);
        $amoid = $this->get("amoid");
        $response = $this->search->fetch_media_object($amoid);
        $this->response(array("status"=>"success","data"=>$response));
   }

   public function get_museum_list_get(){
    $offset = $this->get("offset");
    $size = $this->get("size");
    $this->load->model("search_model","search",true);
    $names = $this->search->get_museum_list();
    $this->response(array("data" => $names));
   }


   public function get_collection_by_museum_get(){
        $museum = $this->get("museum");
        $this->load->model("search_model","search",true);
        $offset = $this->get("offset");
        $size = $this->get("size");
        $objects = $this->search->get_objects_by_museum($museum,$offset,$size);
        $this->response(array("status"=>"success","data"=>$objects));
   }

   public function get_random_objects_get(){
    $this->load->model("search_model","search",true);
    $size = $this->get("size");
    $response = $this->search->get_random_objects($size);
    $this->response(array("status"=>"success","data"=>$response,"count"=> $size));

   }

   public function get_random_videos_get(){
    $this->load->model("search_model","search",true);
    $size = $this->get("size");
    $type = ucwords($this->get("mediatype"));
    $response = $this->search->get_random_media($size,$type);
    $this->response(array("status"=>"success","data"=>$response,"count"=> $size));
   }   

}

?>

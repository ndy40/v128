<?php
header("Access-Control-Allow-Headers: x-requested-with, content-type,xsrf-token");
header("Access-Control-Allow-Origin: *");
//header("Access-Control-Max-Age: 86400");
defined('BASEPATH') OR exit('No direct script access allowed');


class Register extends CI_Controller {
	
	public function index(){
    $this->load->model("search_model","search",true);    
    $key = $this->search->generate_api_key();
    $response = array("status" => true,"key" => $key);    
    $this->output->set_content_type("application/json");
    $this->output->set_output(json_encode($response));
   }

}
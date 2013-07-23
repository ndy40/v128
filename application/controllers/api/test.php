<?php defined('BASEPATH') OR exit('No direct script access allowed');
die(var_dump($_POST));

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Test
 *
 * @author ndy40
 */
class Test extends CI_Controller{
    function index(){
        $keyword = $this->input->post();
        echo $keyword;
    }
}

?>

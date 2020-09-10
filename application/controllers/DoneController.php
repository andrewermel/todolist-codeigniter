<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DoneController extends CI_Controller {

    Public function doneItem(){

        $pronto = $_GET['id'];



        $this->load->model('Item_model');
        $this->Item_model->doneItem($pronto);


        header('location:/');

        



    }
    
    

      
        
      





    
}
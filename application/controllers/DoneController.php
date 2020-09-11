<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DoneController extends CI_Controller {

    Public function doneItem(){

        $pronto = $_GET['id'];
        $done=$_GET['done'];

        If($done==0){
            $this->load->model('Item_model');
            $this->Item_model->doneItem($pronto);

        }else{
            $this->load->model('Item_model');
        $this->Item_model->undoneItem($pronto);
        }


        header('location:/');

        



    }
    
    

      
        
      





    
}
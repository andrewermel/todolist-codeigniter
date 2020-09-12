<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DelController extends CI_Controller {
    
    public function delItem(){

        $delete = $this->input->get('id');
             

        $this->load->model('Item_model');
        $this->Item_model->delItem($delete);

        header('location:/');

    }

      
        
      





    
}
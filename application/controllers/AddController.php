<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddController extends CI_Controller {

      
        
        public function addItem(){
                $nome= $_GET['nomeItem'];

                

                $this->load->model('Item_model');
                $this->Item_model->addItems($nome);

                header('location:/');

        }


}
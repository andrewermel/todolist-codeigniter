<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddController extends CI_Controller {

      
        
        public function addItem(){
                $nome= $_GET['nomeItem'];

                if(empty($nome)){
                        echo "nome do item não pode ser em branco";
                        echo '<a href="/" > voltar </a>';
                        }elseif(is_numeric($nome)){
                                echo "nome do item não pode ser um numero";
                                echo '<a href="/" > voltar </a>';

                        }else {
                                $this->load->model('Item_model');
                                $this->Item_model->addItems($nome);
                                header('location:/');
                        }

                

            

               

        }


}
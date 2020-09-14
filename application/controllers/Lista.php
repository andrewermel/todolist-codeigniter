<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lista extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Item_model');
	}

	public function index(){
		$items = $this->Item_model->buscaitems();
	
		$this->load->view('lista',['Items'=>$items]);	
	}

	public function add(){
		$nome= $this->input->get('nomeItem');

		if(empty($nome)){
			echo "nome do item não pode ser em branco";
			echo '<a href="/" > voltar </a>';
		}
		elseif(is_numeric($nome)){
			echo "nome do item não pode ser um numero";
			echo '<a href="/" > voltar </a>';
		}
		else {
			$conseguiusalvarnobanco = $this->Item_model->addItems($nome);

			if($conseguiusalvarnobanco){
				header('location:/');
			}
			else{
				echo 'Items duplicados';
				echo '<a href="/" > voltar </a>';
			}      
		}
	}

	public function del(){
		$delete = $this->input->get('id');

		$this->Item_model->delItem($delete);
		
		header('location:/');
	}
	
	public function update(){
		$pronto = $this->input->get('id');
		$done=$this->input->get('done');
		
        if($done==0){
            $this->Item_model->doneItem($pronto);
		}
		else{
            $this->Item_model->undoneItem($pronto);
        }
			
		header('location:/');
	}


	



	
}


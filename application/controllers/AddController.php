<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Item_model');
	}

	public function addItem(){
		$nome= $this->input->get('nomeItem');

		if(empty($nome)) {
			echo "nome do item não pode ser em branco";
			echo '<a href="/" > voltar </a>';
		} elseif(is_numeric($nome)) {
			echo "nome do item não pode ser um numero";
			echo '<a href="/" > voltar </a>';

		} else {
			$conseguiuSalvarNoBanco = $this->Item_model->addItems($nome);

			if($conseguiuSalvarNoBanco){
				header('location:/');
			}else{
				echo 'Items duplicados';
				echo '<a href="/" > voltar </a>';
			}
		}
	}
}

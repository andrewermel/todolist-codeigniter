<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lista extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Item_model');
	}

	public function index(){
		$items = $this->Item_model->buscaitems();
		$empresa = $this->buscaEmpresa();
		$usuario = $this->buscaUsuario();
	
		$this->load->view('lista',['Items'=>$items, 'empresa' => $empresa, 'usuario' => $usuario]);	
	}

	public function add(){
		$nome = $this->input->get('nomeItem');

		if(empty($nome)){
			$this->mostraErro('Nome do item não pode ser em branco');
		}
		elseif(is_numeric($nome)){
			$this->mostraErro('O nome digitado não pode ser um número');
		}
		else {
			$conseguiusalvarnobanco = $this->Item_model->addItems($nome);
			if($conseguiusalvarnobanco){
				$this->voltaPraHome();
			}
			else{
				$this->mostraErro('Items duplicados');
			}      
		}
	}

	public function del(){
		$delete = $this->input->get('id');

		$this->Item_model->delItem($delete);

		$this->voltaPraHome();
	}
	
	public function update(){
		$pronto = $this->input->get('id');
		$done = $this->input->get('done');
		
		$novodone = $done==0;
		$this->Item_model->doneItem($pronto,$novodone);
	   
		$this->voltaPraHome();
	}


	
	private function buscaEmpresa(){
		//TODO tentei buscar da model, mas deu erro $this->Empresa_model->buscaEmpresa()
		return ['nome' => 'LCGIT', 'cnpj' => '000000000/0000'];
	}
	
	private function buscaUsuario(){
		//TODO tentei buscar da model, mas deu erro $this->User_model->buscaUsuario()
		return ['nome' => 'Andrew Ermel', 'cpf' => '000.000.000-00'];
	}

	private function voltaPraHome(){
		header('location:/');
	}

	private function mostraErro($mensagem){
		$this->load->view('error', ['mensagem'=> $mensagem]);
	}

	
}


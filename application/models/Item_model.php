<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->database();
		$this->db->db_debug = false;
	}

	public function addItems($nome){
		//todo: tentei usar o try/catch mas o codeigniter nao cai no catch nunca! voltarei pra resolver mais tarde.

		/* try{
			 $this->db->insert('items',$novoitem);
			 return true;
		 }catch(Exception $error){
			 return false;
		 }*/

		$resposta = false;

		//inicia transação
		$this->db->trans_begin();

		$pegaItem = $this->db->get_where('items',array('nome' => $nome))->result();

		if(!$pegaItem) {
			$this->db->insert('items', array('nome' => $nome, 'done' => false));

			//caso de erro no cadastro é desfeito as alteracoes e enviado resposta false
			if($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$resposta = false;
			} else {
				//caso não de erro, é efetuado as modificacoes do banco de dados e enviado resposta true
				$this->db->trans_commit();
				$resposta = true;
			}
		}
		return $resposta;
	}

	public function buscaitems(){
		$query = $this->db->get('items');
		return $query->result();
	}

	public function delItem($id){
		//inicia transação
		$this->db->trans_begin();

		$this->db->delete('items', array('id' => $id));

		//caso de erro no cadastro é desfeito as alteracoes e enviado resposta false
		if($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$resposta = false;
		} else {
			//caso não de erro, é efetuado as modificacoes do banco de dados e enviado resposta true
			$this->db->trans_commit();
			$resposta = true;
		}
		return $resposta;
	}

	public function doneItem($id){
		//inicia transação
		$this->db->trans_begin();

		$this->db->where('id', $id);
		$this->db->update('items', array('done' => true));

		//caso de erro no cadastro é desfeito as alteracoes e enviado resposta false
		if($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$resposta = false;
		} else {
			//caso não de erro, é efetuado as modificacoes do banco de dados e enviado resposta true
			$this->db->trans_commit();
			$resposta = true;
		}
		return $resposta;
	}
	public function undoneItem($id){
		//inicia transação
		$this->db->trans_begin();

		$this->db->where('id',$id);
		$this->db->update('items', array('done' => false));

		//caso de erro no cadastro é desfeito as alteracoes e enviado resposta false
		if($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$resposta = false;
		} else {
			//caso não de erro, é efetuado as modificacoes do banco de dados e enviado resposta true
			$this->db->trans_commit();
			$resposta = true;
		}
		return $resposta;
	}
}

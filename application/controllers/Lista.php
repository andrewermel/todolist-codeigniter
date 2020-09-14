<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lista extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Item_model');
	}

	public function index(){
		$items = $this->Item_model->buscaitems();

		$this->load->view('lista', array('Items' => $items));
	}
}


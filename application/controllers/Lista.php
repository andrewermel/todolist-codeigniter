<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lista extends CI_Controller {

	public function index(){

		$this->load->model('Item_model');

		$items = $this->Item_model->buscaitems();
	
		$this->load->view('lista',['Items'=>$items]);

	
	}



	
}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DelController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Item_model');
	}

	public function delItem(){
		$delete = $this->input->get('id');
		$this->Item_model->delItem($delete);

		header('location:/');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DoneController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Item_model');
	}

	Public function doneItem(){
		$id = $this->input->get('id');
		$done = $this->input->get('done');

		if(!$done) {
			$this->Item_model->doneItem($id);

		} else {
			$this->Item_model->undoneItem($id);
		}
		header('location:/');
	}
}

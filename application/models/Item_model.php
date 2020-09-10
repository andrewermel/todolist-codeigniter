<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Controller{ 

Var $nome = '';
var $done = false;

public function addItems($nome){
    
    $this->load->database();
    
    
    $novoitem = [];
    $novoitem['nome']=$nome;
    $novoitem['done']=false;


    $this->db->insert('items',$novoitem);

}

public function buscaitems(){
    $this->load->database();

    $query = $this->db->get('items');
    return $query->result();


}

public function delItem($delete){

    $this->load->database();
    $id=$delete;
    $this->db->delete('items',['id'=>$delete]);




}





}

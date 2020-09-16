<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    } 

    public function addItems($nome){ 
        $novoitem = [];
        $novoitem['nome']=$nome;
        $novoitem['done']=false;

       //todo: tentei usar o try/catch mas o codeigniter nao cai no catch nunca! voltarei pra resolver mais tarde.

    //    try{
    //         $this->db->insert('items',$novoitem);
    //         return true;
    //     }
	// 	catch(Exception $e){
    //         return false;
    //     }
       
        $query= $this->db->get_where('items',['nome'=>$nome]);
        $item_existente = $query->num_rows();

        if($item_existente){
            $conseguiusalvarnobanco = false;
            return $conseguiusalvarnobanco;
        }
        else{
            $this->db->insert('items',$novoitem);
            $conseguiusalvarnobanco = true;
            return $conseguiusalvarnobanco;
        }
    }

    public function buscaitems(){
        $query = $this->db->get('items');
        return $query->result();
    }

    public function delItem($id){
        $this->db->delete('items',['id'=>$id]);
    }

    public function doneItem($id,$done){
        $this->db->where('id',$id);
        $this->db->update('items', ['done' => $done]);
    }
}

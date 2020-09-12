<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Controller{ 


    public function addItems($nome){
        
        $this->load->database();
        $this->db->db_debug = false;
        
        
        $novoitem = [];
        $novoitem['nome']=$nome;
        $novoitem['done']=false;

       
       //todo: tentei usar o try/catch mas o codeigniter nao cai no catch nunca! voltarei pra resolver mais tarde.

       /* try{
            $this->db->insert('items',$novoitem);
            return true;
        }catch(Exception $error){
            return false;
        }*/
       
        $query= $this->db->get_where('items',['nome'=>$nome]);
        $item_existente = $query->num_rows();

        if($item_existente){
            $conseguiusalvarnobanco = false;
            return $conseguiusalvarnobanco;

        }else{

            $this->db->insert('items',$novoitem);
            $conseguiusalvarnobanco = true;
            return $conseguiusalvarnobanco;
        }


        

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

    public function doneItem($pronto){

        $this->load->database();

    
       $this->db->where('id',$pronto);

       
       $this->db->update('items', ['done' => true]);

    }
    public function undoneItem($pronto){

        $this->load->database();

    
       $this->db->where('id',$pronto);

       
       $this->db->update('items', ['done' => false]);

    }





}

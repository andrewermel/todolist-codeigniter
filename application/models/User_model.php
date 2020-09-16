<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    } 

    public function buscaUsuario(){
        $user = [];
        $user['nome'] = 'Andrew Amorim Ermel';
        $user['cpf'] = '000.000.000-00';
        return $user;
    }
}

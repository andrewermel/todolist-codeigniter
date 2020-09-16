<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_model extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    } 

    public function buscaEmpresa(){
        $empresa = [];
        $empresa['nome'] = 'LCGIT';
        $empresa['cnpj'] = '90238102381020-03192';
        return $empresa;
    }
}

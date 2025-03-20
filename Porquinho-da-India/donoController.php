<?php
require_once('donoModel.php');

class DonoController {
    private $donoModel;

    function __construct(){
        $this->donoModel = new DonoModel();
    }

    public function salvarDono($nomeDono, $generoDono, $data_nascimento){
        $this->donoModel->criarDono($nomeDono, $generoDono, $data_nascimento);
    }

    public function alterarDono($nomeDono, $generoDono, $data_nascimento, $id_dono){
        $this->donoModel->alterarDono($nomeDono, $generoDono, $data_nascimento, $id_dono);
    }

    public function pegarDono($id){
        return $dono = $this->donoModel->pegarDono($id);
    }
    
    public function pegarTodosDonos(){
        return $donos = $this->donoModel->pegarTodosDonos();
    }

    public function deletarDono($id){
        $this->donoModel->deletarDono($id);
    }
}
?>
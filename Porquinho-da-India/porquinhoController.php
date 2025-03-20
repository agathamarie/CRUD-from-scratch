<?php
require_once('porquinhoModel.php');
require_once('donoController.php');

class PorquinhoController {
    private $porquinhoModel;
    private $donoController;

    function __construct(){
        $this->porquinhoModel = new PorquinhoModel();
    }

    public function salvarPorquinho($nome, $cor, $genero, $tamanho, $id_dono, $nomeDono, $generoDono, $data_nascimento){
        $id_dono = $this->donoController->salvarDono($nomeDono, $generoDono, $data_nascimento);
        $this->porquinhoModel->criarPorquinho($nome, $cor, $genero, $tamanho, $id_dono);
    }

    public function alterarPorquinho($nome, $cor, $genero, $tamanho, $dono, $id, $nomeDono){
        $dono = $this->donoController->pegarDonoPeloNome($nomeDono);
        $this->porquinhoModel->alterarPorquinho($nome, $cor, $genero, $tamanho, $dono, $id);
    }

    public function pegarPorquinho($id){
        return $porquinho = $this->porquinhoModel->pegarPorquinho($id);
    }

    public function pegarTodosPorquinhos(){
        return $porquinhos = $this->porquinhoModel->pegarTodosPorquinhos();
    }

    public function pegarPorquinhosDono($id_dono){
        return $porquinhos = $this->porquinhoModel->pegarPorquinhosDono($id_dono);
    }

    public function deletarPorquinho($id){
        $this->porquinhoModel->deletarPorquinho($id);
    }
}
?>
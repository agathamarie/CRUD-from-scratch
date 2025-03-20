<?php
require_once('connect.php');

class PorquinhoModel extends Connect{
    private $table = 'porquinho';

    public function criarPorquinho($nome, $cor, $genero, $tamanho, $id_dono){
        $sql = $this->connection->prepare(
            "INSERT INTO $this->table (nome, cor, genero, tamanho, id_dono)
            VALUES (?, ?, ?, ?, ?, ?)"
        );
        $sql->execute([$nome, $cor, $genero, $tamanho, $id_dono]);
    }

    public function alterarPorquinho($nome, $cor, $genero, $tamanho, $dono, $id){
        $sql = $this->connection->prepare(
            "UPDATE $this->table SET nome = ?, cor = ?, genero = ?, tamanho = ?, dono = ?
            WHERE id = ?"
        );
        $sql->execute([$nome, $cor, $genero, $tamanho, $dono, $id]);
    }

    public function pegarPorquinho($id){
        $sql = $this->connection->prepare(
            "SELECT * FROM $this->table WHERE id = ?"
        );
        $sql->execute([$id]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function pegarTodosPorquinhos(){
        $sql = $this->connection->prepare(
            "SELECT * FROM $this->table"
        );
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pegarPorquinhosDono($id_dono){
        $sql = $this->connection->prepare(
            "SELECT nome FROM $this->table WHERE id_dono = ?"
        );
        $sql->execute([$id_dono]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletarPorquinho($id){
        $sql = $this->connection->prepare(
            "DELETE FROM $this->table WHERE id = ?"
        );
        $sql->execute([$id]);
    }
}

?>
<?php
require_once('connect.php');

class DonoModel extends Connect{
    private $table = 'dono';

    public function criarDono($nomeDono, $generoDono, $data_nascimento){
        $sql = $this->connection->prepare(
            "INSERT INTO $this->table (nome, genero, data_nascimento)
            VALUES (?, ?, ?)"
        );
        $sql->execute([$nomeDono, $generoDono, $data_nascimento]);
        return $this->connection->lastInsertId();
    }

    public function alterarDono($nomeDono, $generoDono, $data_nascimento, $id_dono){
        $sql = $this->connection->prepare(
            "UPDATE $this->table SET nome = ?, denero = ?, data_nascimento = ?
            WHERE id = ?"
        );
        $sql->execute([$nomeDono, $generoDono, $data_nascimento, $id_dono]);
    }

    public function pegarDono($id){
        $sql = $this->connection->prepare(
            "SELECT * FROM $this->table WHERE id = ?"
        );
        $sql->execute([$id]);
        return $dono = $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function pegarDonoPeloNome($nomeDono){
        $sql = $this->connection->prepare(
            "SELECT id FROM $this->table WHERE nome = ?"
        );
        $sql->execute([$nomeDono]);
        return $id_dono = $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function pegarTodosDonos(){
        $sql = $this->connection->prepare(
            "SELECT * FROM $this->table"
        );
        $sql->execute([]);
        return $donos = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletarDono($id){
        $sql = $this->connection->prepare(
            "DELETE FROM $this->table WHERE id = ?"
        );
        $sql->execute([$id]);
    }
}

?>
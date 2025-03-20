create database porquinhos;
use porquinhos;

create table dono(
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome VARCHAR(100) NOT NULL,
    genero ENUM('feminino', 'masculino', 'outro', 'prefiro não informar') NOT NULL DEFAULT 'prefiro não informar',
	data_nascimento DATE NOT NULL
);

CREATE TABLE porquinho (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome VARCHAR(100) NOT NULL,
    cor VARCHAR(150) NOT NULL,
    genero ENUM('macho', 'fêmea', 'não informado') DEFAULT 'não informado' NOT NULL,
    tamanho ENUM('grande', 'médio', 'pequeno') NOT NULL,
    id_dono INT DEFAULT NULL,
    FOREIGN KEY (id_dono) REFERENCES dono(id)
);
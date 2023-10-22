CREATE DATABASE lol;
USE lol; 

CREATE TABLE pessoa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    datadeNascimento DATE NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE anuncio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fase VARCHAR(255) NOT NULL,
    tipo VARCHAR(255) NOT NULL,
    porte VARCHAR(255) NOT NULL,
    sexo VARCHAR(10) NOT NULL,
    pelagem_cor VARCHAR(255) NOT NULL,
    raca VARCHAR(255) NOT NULL,
    observacao TEXT,
    email_pessoa VARCHAR(255) NOT NULL
);


-- Criação do esquema do banco de dados para o projeto de login

CREATE DATABASE IF NOT EXISTS sistema_login;

USE sistema_login;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    nome_completo VARCHAR(100),
    idade INT(3),
    numero_telefone VARCHAR(20),
    endereco VARCHAR(255)
);
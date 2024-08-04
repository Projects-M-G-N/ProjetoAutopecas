CREATE DATABASE IF NOT EXISTS sis_analise;
USE sis_analise;

CREATE TABLE IF NOT EXISTS cliente (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    data_de_nascimento DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS fornecedor (
    id INT(11) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS produto (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(10 , 2 ) NOT NULL,
    img TEXT NOT NULL,
    quantidade INT(11) NOT NULL,
    fornecedor INT(11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (fornecedor)
        REFERENCES fornecedor (id)
);

CREATE TABLE IF NOT EXISTS tipo_vendedor (
    id INT(11) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS vendedor (
    id INT(11) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    cod_tipo INT(11) NOT NULL,
    data_de_nascimento DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY cpf (cpf),
    FOREIGN KEY (cod_tipo)
        REFERENCES tipo_vendedor (id)
);

CREATE TABLE IF NOT EXISTS problema (
    id INT(11) NOT NULL,
    id_produto INT(11) NOT NULL,
    descricao TEXT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_produto)
        REFERENCES produto (id)
);

INSERT INTO fornecedor VALUES (1, 'Mateus', 'mateus@mateus.com', '(83) 123456-111111', 'Mãe dagua');

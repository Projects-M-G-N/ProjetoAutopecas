CREATE DATABASE IF NOT EXISTS sis_analise;
USE sis_analise;

CREATE TABLE IF NOT EXISTS cliente (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  senha varchar(100) NOT NULL,
  telefone varchar(20) NOT NULL,
  data_de_nascimento date NOT NULL,
  endereco varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS fornecedor (
  id int(11) NOT NULL,
  nome varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  telefone varchar(20) NOT NULL,
  endereco varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS produto (
  id int(11) NOT NULL,
  nome varchar(100) NOT NULL,
  descricao text NOT NULL,
  quantidade int(11) NOT NULL,
  fornecedor int(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (fornecedor) REFERENCES fornecedor (id)
);

CREATE TABLE IF NOT EXISTS tipo_vendedor (
  id int(11) NOT NULL,
  tipo varchar(50) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS vendedor (
  id int(11) NOT NULL,
  nome varchar(100) NOT NULL,
  cpf varchar(11) NOT NULL,
  email varchar(100) NOT NULL,
  telefone varchar(20) NOT NULL,
  cod_tipo int(11) NOT NULL,
  data_de_nascimento date NOT NULL,
  endereco varchar(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY cpf (cpf),
  FOREIGN KEY (cod_tipo) REFERENCES tipo_vendedor (id)
);

CREATE TABLE IF NOT EXISTS problema (
  id int(11) NOT NULL,
  id_produto int(11) NOT NULL,
  descricao text NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_produto) REFERENCES produto (id)
);

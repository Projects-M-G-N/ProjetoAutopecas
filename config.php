<?php
$dbHost = 'localhost';
$dbUsername ='root';
$dbPassword = 'usbw';
$dbName= 'sis_analise';

$conexao= new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);


$nome=$_POST['nome'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$telefone=$_POST['telefone'];
$data=$_POST['data_nasc'];
$endereco=$_POST['endereco'];
$result = mysqli_query($conexao,"INSERT INTO Cliente(NOME,EMAIL,SENHA,TELEFONE,DATA_DE_NASCIMENTO,ENDERECO) 
VALUES ($nome,$email,$senha,$telefone,$data,$endereco)");


?>
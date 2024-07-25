<?php

session_start();

require_once "../config.php";

if (empty($_GET['url'])) {
    $url = 'index.php';
} else {
    $url = $_GET['url'];
}

require('./views/' . $url);

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data_nasc'];
    $endereco = $_POST['endereco'];
    $result = mysqli_query($conexao, "INSERT INTO cliente VALUES (NULL, '$nome','$email','$senha','$telefone','$data','$endereco')");
    echo "<script>window.locate.href = './'</script>";
}

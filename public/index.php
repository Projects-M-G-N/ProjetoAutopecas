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
    $_SESSION['login'] = true;
    echo "<script>window.locate.href = './'</script>";
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $existe = mysqli_query($conexao, "SELECT * FROM cliente WHERE EMAIL='$email'");
    if (mysqli_num_rows($existe) != 0) {
        $correto = mysqli_query($conexao, "SELECT * FROM cliente WHERE EMAIL='$email' AND SENHA='$senha'");
        if (mysqli_num_rows($correto) == 0) {
            echo "<script>alert('Senha Incorreta')</script>";
        } else {
            $_SESSION['login'] = true;
            echo "<script>window.locate.href = './'</script>";
        }
    } else {
        echo "<script>alert('E-mail não cadastrado!')</script>";
    }
}

<?php

session_start();

if (empty($_GET['url'])) {
    $url = 'index.php';
} else {
    $url = $_GET['url'];
}

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data_nasc'];
    $endereco = $_POST['endereco'];
    $result = mysqli_query($conexao, "INSERT INTO cliente VALUES (NULL, '$nome','$email','$senha','$telefone','$data','$endereco')");
    $_SESSION['login'] = true;
    echo "<script>window.location.href = './'</script>";
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
            echo "<script>window.location.href = './'</script>";
        }
    } else {
        echo "<script>alert('E-mail não cadastrado!')</script>";
    }
}

if (isset($_POST['cadProduto'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $img = $_FILES["img"]["name"];
    $novo_nome_do_arquivo = uniqid();
    $extensao = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $img_nome = $novo_nome_do_arquivo . "." .  $extensao;
    move_uploaded_file($_FILES['img']['tmp_name'], ".././assets/img/" . $img_nome);
    $quantidade = $_POST['quantidade'];
    $fornecedor = $_POST['fornecedor'];

    $comando = mysqli_query($conexao, "INSERT INTO produto VALUES (NULL, '$nome', '$descricao', '$preco', '$img_nome', '$quantidade', '1')");


    echo "<script>window.location.href = './'</script>";
}

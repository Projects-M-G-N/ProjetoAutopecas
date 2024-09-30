<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <header>
        <a href="./"><h1>Cadastro - Super Auto peças</h1></a>
    </header>
    <div class="box">
        <form action="" method="post">
            <h1>Cadastro de Usuário</h1>
            <div class="inputbox">
                <input type="text" name="nome" id="nome" class="inputUser" placeholder="Nome Completo" required>
                <input type="email" name="email" id="email" class="inputUser" placeholder="Email" required>
                <input type="password" name="senha" id="senha" class="inputUser" placeholder="Senha" required>
                <input type="tel" name="telefone" id="telefone" class="inputUser" placeholder="Telefone" required>
                <input type="date" name="data_nasc" id="data_nasc" class="inputUser" placeholder="Data de Nascimento" required>
                <input type="text" name="endereco" id="endereco" class="inputUser" placeholder="Endereço" required>
            </div>
            <input type="submit" name="cadastrar" id="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>

<?php 

session_start();

$dbHost = 'localhost';
$dbUsername ='root';
$dbPassword = 'usbw';
$dbName= 'sis_analise';

$conexao= new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

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

?>
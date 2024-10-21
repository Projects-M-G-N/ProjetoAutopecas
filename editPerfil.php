<?php 
session_start();

$dbHost = 'localhost';
$dbUsername ='root';
$dbPassword = 'usbw';
$dbName= 'sis_analise';

$conexao= new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

$email_atual = $_SESSION['email'];

if (isset($_POST['edit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nasc = $_POST['data_nasc'];
    $endereco = $_POST['endereco'];
    $query_email = mysqli_query($conexao, "SELECT * FROM cliente WHERE email='$email' LIMIT 1");
    if (mysqli_num_rows($query_email) != 0) {
        echo "<script>alert('Coloque um e-mail válido')</script>";
    } else {
        $query_edit = mysqli_query($conexao, "UPDATE cliente SET nome='$nome', email='$email', telefone='$telefone', data_de_nascimento='$data_nasc', endereco='$endereco' WHERE email='$email_atual'");
        $_SESSION['email'] = $email;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nome" id="nome">
        <input type="email" name="email" id="email">
        <input type="tel" name="telefone" id="telefone">
        <input type="date" name="data_nasc" id="data_nasc">
        <input type="text" name="endereco" id="endereco">
        <input type="submit" value="Editar" name="edit">
    </form>
</body>
</html>
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
    <link rel="stylesheet" href="./assets/css/editperfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Editar Perfil</title>
</head>
<body>
<header>
        <a href="index.php">
            <h1>Super Auto peças</h1>
        </a>
        <div class="search-bar">
            <input type="text" placeholder="Buscar...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <?php if (isset($_SESSION['login'])) { ?>
            <div class="user">
                <a href="user.php" class="user-btn" title="Seu perfil"><i class="bi bi-person-circle"></i></a>
            </div>
        <?php } ?>
    </header>
    <nav class="navbar">
        <ul>
            <?php
            if (!isset($_SESSION['login'])) {
            ?>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="login.php">Login</a></li>
            <?php } ?>
            <li><a href="problemas.php">Problemas</a></li>
            <?php
            if (isset($_SESSION['login'])) {
            ?>
                <li><a href="cadProduto.php">Cadastrar Produto</a></li>
            <?php } ?>
            <li><a href="./carrinho.php"><i class="bi bi-cart" class="navbar-icon"></i></a></li>
        </ul>
    </nav>
    <form action="" method="post">
        <h1>Editar Perfil</h1>
        <div class="inputbox">
            <input type="text" name="nome" id="nome" class="inputUser" placeholder="Nome">
            <input type="email" name="email" id="email" class="inputUser" placeholder="Email">
            <input type="tel" name="telefone" id="telefone" class="inputUser" placeholder="Telefone">
            <input type="date" name="data_nasc" id="data_nasc" class="inputUser">
            <input type="text" name="endereco" id="endereco" class="inputUser" placeholder="Endereço">
        </div>
        <input type="submit" value="Editar" name="edit">
    </form>

</body>
</html>
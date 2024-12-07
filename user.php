<?php 
session_start();

$dbHost = 'localhost';
$dbUsername ='root';
$dbPassword = 'usbw';
$dbName= 'sis_analise';

$conexao= new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

$email = $_SESSION['email'];

$comando = mysqli_query($conexao, "SELECT * FROM cliente WHERE email='$email'");

$resultado = mysqli_fetch_assoc($comando);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Perfil do Usuário</title>
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
    <main>
        <section class="perfil">
            <img src="./assets/img/default.png" alt="Foto do Perfil" class="perfil-foto">
            <h2 class="perfil-nome"><?php echo $resultado['nome']?></h2>
            <p class="perfil-email"><?php echo $email?></p>
            <p class="perfil-endereco"><?php echo $resultado['endereco']?></p>
            <button class="editar-perfil" onclick="window.location.href='./editPerfil.php'">Editar Perfil</button>
        </section>
        <a href="./logout.php" class="sair"><i class="bi bi-box-arrow-right"></i> Sair</a>
    </main>
</body>

</html>

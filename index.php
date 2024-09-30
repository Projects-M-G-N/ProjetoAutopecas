<?php

session_start();

$dbHost = 'localhost';
$dbUsername ='root';
$dbPassword = 'usbw';
$dbName= 'sis_analise';

$conexao= new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

$produtos = mysqli_query($conexao, "SELECT * FROM produto");

$produto = mysqli_fetch_all($produtos);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Auto peças</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/inicio.css">

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
                <li><a href="login.php">Login</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
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
        <h1>Produtos</h1>
        <div class="product-list">
            <?php
            for ($i = 0; $i < mysqli_num_rows($produtos); $i++) { ?>
                <div class="card">
                    <img src="./assets/img/<?= $produto[$i][4] ?>" alt="<?= $produto[$i][1] ?>">
                    <div class="card-content">
                        <h2><?= $produto[$i][1] ?></h2>
                        <div class="price">
                            R$ <?= $produto[$i][3] ?>
                        </div>
                        <button onclick="window.location.href='./addCarrinho.php?idProd=<?= $produto[$i][0]?>'">Adicionar ao carrinho</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
</body>

</html>
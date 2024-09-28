<?php

require '../config.php';

$itens = unserialize($_COOKIE['itens']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="public/assets/css/carrinho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
            <li><a href="index.php">Inicio</a></li>
            <?php
            if (!isset($_SESSION['login'])) {
            ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
            <?php } ?>
            
            <?php
            if (isset($_SESSION['login'])) {
            ?>
                <li><a href="cadProduto.php">Cadastrar Produto</a></li>
            <?php } ?>
            <li><a href="problemas.php">Problemas</a></li>
        </ul>
    </nav>
    <h2 class="car">Carrinho de compra</h2>
    <?php
    foreach ($itens as $item) {
        $produto = mysqli_fetch_all(mysqli_query($conexao, "SELECT * FROM produto WHERE id='$item'"));
    ?>
        <div class="product-list">
            <div class="card">
                <img src="public/assets/img/<?= $produto[0][4] ?>" alt="<?= $produto[0][1] ?>">
                <div class="card-content">
                    <h2><?= $produto[0][1] ?></h2>
                    <div class="price">
                        R$ <?= $produto[0][3] ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</body>

</html>
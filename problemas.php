<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/problemas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Problemas</title>
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
            <li><a href="./carrinho.php"><i class="bi bi-cart" class="navbar-icon"></i></a></li>
        </ul>
    </nav>
    <div class="problemas">
        <select name="problema" id="problema" onchange="verProduto(this.value)">
            <option value="0" disabled selected>Selecione o problema</option>
            <option value="1">Desgaste de Pneus</option>
            <option value="2">Falhas no sistema hidráulico</option>
            <option value="3">Super aquecimento do motor</option>
            <option value="4">Sistema de freios</option>
            <option value="5">Sistema elétrico</option>
        </select>
    </div>
    <div class="produto">
        <img src="" alt="">
        <div class="produto-content">
            <h2></h2>
            <div class="price"></div>
            <button id="comprar">Adicionar ao carrinho</button>
        </div>
    </div>
    <script src="./assets/js/problemas.js"></script>
</body>
</html>
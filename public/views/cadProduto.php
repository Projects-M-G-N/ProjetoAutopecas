<?php

if (!isset($_SESSION['login'])) {
    header("Location: ./");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/assets/css/cadProduto.css">
    <title>Cadastrar Produto</title>
</head>

<body>
    <header>
        <a href="index.php">
            <h1>Cadastrar Produto - SCAP</h1>
        </a>
    </header>
    <main>
        <div class="cad-container">
            <form action="./" method="post">
                <label for="nome">Nome do produto</label>
                <input type="text" name="nome" id="nome">
                <label for="descricao">Descrição do produto</label>
                <textarea name="descricao" id="descricao"></textarea>
                <label for="quantidade">Quantidade disponivel</label>
                <input type="number" name="quantidade" id="quantidade">
                <label for="fornecedor">Fornecedor do produto</label>
                <input type="text" name="fornecedor" id="fornecedor">
                <input type="submit" value="Cadastrar">
            </form>
        </div>
    </main>
</body>

</html>
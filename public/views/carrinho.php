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
</head>

<body>

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
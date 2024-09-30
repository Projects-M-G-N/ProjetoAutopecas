<?php

if (isset($_COOKIE['itens'])) {
    if (isset($_GET['index'])) {
        $itens = unserialize($_COOKIE['itens']);
        if ((count($itens) - 1) == 0) {
            setcookie("itens");
        } else {
            array_splice($itens, $_GET['index'], 1);
            $itens_carrinho = serialize($itens);
            setcookie("itens", $itens_carrinho);
        }
        header("Location: ./carrinho.php");
    } else {
        header("Location: ./");
    }
} else {
    header("Location: ./");
}

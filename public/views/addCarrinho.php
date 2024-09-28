<?php
if (isset($_GET['idProd'])) {
    if (isset($_COOKIE['itens'])) {
        $strCarrinho = $_COOKIE['itens'];
        $carrinho = unserialize($strCarrinho);
        array_push($carrinho, $_GET['idProd']);
        $strCarrinho = serialize($carrinho);
        setcookie("itens", $strCarrinho);
    } else {
        $carrinho = [$_GET['idProd']];
        $strCarrinho = serialize($carrinho);
        setcookie("itens", $strCarrinho);
    }
}

echo "<script>window.location.href = './'</script>";

<?php 
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: ./login.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
</head>
<body>
    
</body>
</html>
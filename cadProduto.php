<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ./");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/cadProduto.css">
    <title>Cadastrar Produto</title>
</head>

<body>
    <header>
        <a href="index.php">
            <h1>Cadastrar Produto - Super Auto peças</h1>
        </a>
    </header>
    <main>
        <div class="cad-container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="caixa-input">
                    <div class="caixa">
                        <label for="nome">Nome do produto</label>
                        <input type="text" name="nome" id="nome" required>
                    </div>
                    <div class="caixa">
                        <label for="descricao">Descrição do produto</label>
                        <textarea name="descricao" id="descricao" required></textarea>
                    </div>
                </div>
                <div class="caixa-input">
                    <div class="caixa">
                        <label for="preco">Preço</label>
                        <input type="number" name="preco" id="preco" step="0.01" required>
                    </div>
                    <div class="caixa">
                        <label for="img">Imagem do produto</label>
                        <input type="file" name="img" id="img" accept="image/*" required>
                    </div>
                </div>
                <div class="caixa-input">
                    <div class="caixa">
                        <label for="quantidade">Quantidade disponivel</label>
                        <input type="number" name="quantidade" id="quantidade" min="1" required>
                    </div>
                    <div class="caixa">
                        <label for="fornecedor">Fornecedor do produto</label>
                        <input type="text" name="fornecedor" id="fornecedor" required>
                    </div>
                </div>
                <input type="submit" value="Cadastrar" name="cadProduto">
            </form>
        </div>
    </main>
</body>

</html>

<?php 

$dbHost = 'localhost';
$dbUsername ='root';
$dbPassword = 'usbw';
$dbName= 'sis_analise';

$conexao= new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

if (isset($_POST['cadProduto'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $img = $_FILES["img"]["name"];
    $novo_nome_do_arquivo = uniqid();
    $extensao = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $img_nome = $novo_nome_do_arquivo . "." .  $extensao;
    move_uploaded_file($_FILES['img']['tmp_name'], "./assets/img/" . $img_nome);
    $quantidade = $_POST['quantidade'];
    $fornecedor = $_POST['fornecedor'];

    $comando = mysqli_query($conexao, "INSERT INTO produto VALUES (NULL, '$nome', '$descricao', '$preco', '$img_nome', '$quantidade', '1')");


    echo "<script>window.location.href = './'</script>";
}


?>
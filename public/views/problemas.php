<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problemas</title>
</head>
<body>
    <div class="problemas">
        <select name="problema" id="problema" onchange="verProduto(this.value)">
            <option value="0" disabled selected>...</option>
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
    <script src="public/assets/js/problemas.js"></script>
</body>
</html>
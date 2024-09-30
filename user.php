<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/user.css">
    <title>Perfil do Usuário</title>
</head>

<body>
    <header>
        <div class="voltar">
            <a href="index.php" class="voltar-btn" title="Voltar"><i class="bi bi-arrow-left-circle"></i></a>
        </div>
    </header>
    <main>
        <section class="perfil">
            <img src="./assets/img/default.png" alt="Foto do Perfil" class="perfil-foto">
            <h2 class="perfil-nome">Nome do Usuário</h2>
            <p class="perfil-email">email@exemplo.com</p>
            <p class="perfil-endereco">Rua XXXXX - numero XX</p>
            <button class="editar-perfil">Editar Perfil</button>
        </section>
        <a href="./logout.php" class="sair"><i class="bi bi-box-arrow-right"></i> Sair</a>
    </main>
</body>

</html>

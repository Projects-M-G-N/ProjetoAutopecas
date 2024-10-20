<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Login - Super Auto peças</title>
</head>

<body>
    <header>
        <a href="index.php">
            <h1>Login - Super Auto peças</h1>
        </a>
    </header>
    <main>
        <div class="login-container">
            <h1>Login</h1>
            <form action="" method="post">
                <input type="email" placeholder="Digite seu e-mail" name="email" required>
                <input type="password" placeholder="Senha" name="senha" required>
                <button type="submit" name="login">Entrar</button>
            </form>
        </div>
    </main>
</body>

</html>

<?php 

session_start();

$dbHost = 'localhost';
$dbUsername ='root';
$dbPassword = 'usbw';
$dbName= 'sis_analise';

$conexao= new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $existe = mysqli_query($conexao, "SELECT * FROM cliente WHERE EMAIL='$email'");
    if (mysqli_num_rows($existe) != 0) {
        $correto = mysqli_query($conexao, "SELECT * FROM cliente WHERE EMAIL='$email' AND SENHA='$senha'");
        if (mysqli_num_rows($correto) == 0) {
            echo "<script>alert('Senha Incorreta')</script>";
        } else {
            $_SESSION['login'] = true;
            $_SESSION['email'] = $email;
            echo "<script>window.location.href = './'</script>";
        }
    } else {
        echo "<script>alert('E-mail não cadastrado!')</script>";
    }
}

?>
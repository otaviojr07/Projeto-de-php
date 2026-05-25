<?php
include('seguranca0.php');
include('conndb.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //verifica se o email existe
    $sql = "SELECT COUNT(*) FROM tb_usuarios
     WHERE email_usuario = '$email'";
    $result = mysqli_query($link,$sql);
    $countador = mysqli_fetch_array($result);

    if($countador[0] == 0){
        //email não existe
         header('Location: login.php?msg=Usuário e/ou senha inválido');
        exit();
    }
    else{
        //email existe
        $sql = "SELECT tempero_usuario FROM tb_usuarios
        WHERE email_usuario = '$email'";
        $result = mysqli_query($link,$sql);

        $tbl = mysqli_fetch_array($result);
        $tempero = $tbl[0];
    }


    $senha = md5($senha . $tempero);

    $sql = "SELECT COUNT(*) FROM tb_usuarios 
    WHERE email_usuario = '$email' AND senha_usuario = '$senha'";
    $result = mysqli_query($link, $sql);
    $count = mysqli_fetch_array($result);
    if($count[0] == 1){
        //email e senha corretos
        $sql = "SELECT id_usuario, apelido_usuario, nivel_usuario 
        FROM tb_usuarios 
        WHERE email_usuario = '$email' AND senha_usuario = '$senha'";
        $result = mysqli_query($link, $sql);
        $tbl = mysqli_fetch_array($result);
        $_SESSION['id_usuario'] = $tbl[0];
        $_SESSION['apelido'] = $tbl[1];
        $_SESSION['nivel'] = $tbl[2];
        mysqli_close($link);
        header('Location: index.php');
        exit();
    }
    else{
        mysqli_close($link);
        header('Location: login.php?msg=Usuário e/ou senha inválido');
        exit();
    }
}


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
     <style>
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: none;
            width: 50%;
            margin-left: 25%;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            margin-top: 30px;
        }
        h1{
            margin-left: 25%;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <br>
    <h1>Login</h1>
    <?php
    include('msg_user.php');
    ?>
    <br><br>
    <form action="login.php" method="post">
        <fieldset>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" required>
        <br><br>
        <input type="submit" value="Entrar">
        </fieldset>
    </form>
    <?php
    if(isset($_GET['msg']) && $_GET['msg'] == 'Usuário e/ou senha inválido'){
    ?>
        <br>
        <a href="recuperasenha.php">Redefinir Senha</a>
    <?php
    }
    ?>
</body>
</html>
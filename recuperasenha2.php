<?php
include('seguranca0.php');
include('conndb.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $codigo = $_POST['cod'];
    $senha = $_POST['senha'];
    $senha2 = $_POST['senha2'];
    $id = $_SESSION['id_recupera'];
    if($senha != $senha2){
        header('Location: recuperasenha2.php?msg=As senhas devem ser iguais');
        exit();
    }
    //verifica se o cod. recebido está correto
    $sql= "SELECT COUNT(*) FROM tb_usuarios
        WHERE id_usuario = $id AND recupera_usuario = '$codigo'";
    $result = mysqli_query($link, $sql);
    $contador = mysqli_fetch_array($result);
  
    if($contador[0] == 0){
    //código errado
    header('Location: recuperasenha2.php?msg=Código Inválido');
    exit();
    }
    
    //código correto
    $sql = "SELECT tempero_usuario FROM tb_usuarios 
    WHERE id_usuario = $id";
    $result = mysqli_query($link, $sql);
    $tbl = mysqli_fetch_array($result);
    $tempero = $tbl[0];

    $senha = md5($senha . $tempero);

    $sql = "UPDATE tb_usuarios SET senha_usuario = '$senha',
         recupera_usuario = '' WHERE id_usuario  = $id";
    mysqli_query($link, $sql);
    unset($_SESSION['id_recupera']);
     header('Location: login.php?msg=Senha Alterada. Realize seu Login');
    exit();

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recupera Senha</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
     <h1>Recuperar Senha</h1>
    <?php
        include('msg_user.php');
    ?>

    <br>
    <form action="recuperasenha2.php" method="post">
        <label for="cod">Código:</label>
        <input type="number" name="cod" id="cod" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br>
        <label for="senha2">Repita sua senha:</label>
        <input type="password" name="senha2" id="senha2" required>
        <br><br>
        <input type="submit" value="Alterar">

    </form>
</body>
</html>
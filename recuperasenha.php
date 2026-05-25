<?php
include('seguranca0.php');
include('conndb.php');
if($_SERVER['REQUEST_METHOD']== "POST"){
    $email = $_POST['email'];
    $sql = "SELECT COUNT(*) FROM tb_usuarios
     WHERE email_usuario = '$email'";
    $result = mysqli_query($link,$sql);
    $contagem = mysqli_fetch_array($result);

    if($contagem[0] == 0){
        //email inválido
        header('Location: recuperasenha.php?msg=Email inválido.');
        exit();
    }
    $sql = "SELECT id_usuario, telefone_usuario FROM tb_usuarios
        WHERE email_usuario = '$email'";
    $result = mysqli_query($link,$sql);
    $tbl = mysqli_fetch_array($result);
    $id = $tbl[0];
    $tel =$tbl[1];
    $codigo = rand(100000,999999);
    $sql= "UPDATE tb_usuarios SET recupera_usuario = '$codigo'
        WHERE id_usuario = $id";
    mysqli_query($link,$sql);
    mysqli_close($link);

    $phone='+55' . $tel;
    $apikey= $chaveCB;
    $message="Seu código de recuperação de senha é: *$codigo*";

    $url='https://api.callmebot.com/whatsapp.php?source=php&phone='.$phone.'&text='.urlencode($message).'&apikey='.$apikey;
    $html=file_get_contents($url);  
    $_SESSION['id_recupera'] = $id;
    header('Location: recuperasenha2.php');
    exit();
}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuparar Senha</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Recuperar Senha</h1>
    <br><br>
    <?php
    include('msg_user.php');
    ?>
    <form action="recuperasenha.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <br>
        <input type="submit" value="Enviar Código">
    </form>
</body>
</html>
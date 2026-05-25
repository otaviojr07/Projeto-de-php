<?php
include('seguranca1.php');
include('conndb.php');
include('cabecalho.php');

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $senha_atual = $_POST['senha_atual'];
    $senha = $_POST['senha'];
    $senha2 = $_POST['senha2'];

    $id = $_SESSION['id_usuario'];

    if($senha != $senha2){
        header('Location: alterasenha.php?msg=As senhas devem ser iguais.');
        exit();
    }
    $sql = "SELECT senha_usuario, tempero_usuario
        FROM tb_usuarios WHERE id_usuario = $id";
    $result = mysqli_query($link,$sql);
    $tbl = mysqli_fetch_array($result);
    $senha_banco = $tbl[0];
    $tempero = $tbl[1];

    if($senha_banco != md5($senha_atual.$tempero)){
        header('Location: alterasenha.php?msg=Senha atual inválida');
        exit();
    }
    $senha = md5($senha.$tempero);
    $sql = "UPDATE tb_usuarios SET senha_usuario = '$senha'
        WHERE id_usuario = $id";
    mysqli_query($link, $sql);
    mysqli_close($link);
    header('Location: index.php');
    exit();


}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <br>
    <h1>Alterar Senha</h1>
    <?php
    include('msg_user.php');
    ?>
    <br>
    <form action="alterasenha.php" method="post">
        <fieldset>
            <label for="atual">Senha Atual:</label>
            <input type="password" name="senha_atual" id="atual">
            <br>
            <label for="senha">Nova Senha:</label>
            <input type="password" name="senha" id="senha">
            <br>
            <label for="senha2">Repita a nova senha:</label>
            <input type="password" name="senha2" id="senha2">
            <br><br>
            <input type="submit" value="Alterar Senha">
        </fieldset>
    </form>
</body>
</html>


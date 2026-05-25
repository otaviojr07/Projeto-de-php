<?php
include('seguranca10.php');
include('cabecalho.php');
include('conndb.php');

if($_SERVER['REQUEST_METHOD']=='POST'){

    $id = $_POST['id'];
    $sql = "DELETE FROM tb_usuarios WHERE id_usuario = $id";
    mysqli_query($link,$sql);
    mysqli_close($link);
    header('Location: listausuarios.php');
    exit();
}



if(!isset($_GET['id'])){
    header('Location:listausuarios.php');
    exit();
}
$id = $_GET['id'];
$sql = "SELECT nome_usuario FROM tb_usuarios WHERE id_usuario = $id";
$result = mysqli_query($link,$sql);
$tbl = mysqli_fetch_array($result);
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <br>
    <h1>Excluir Usuário</h1>
    <br>
    <form action="deletausuario.php" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        <p>Deseja excluir o usuário <b><?=$tbl[0]?></b>.</p>
        <p>Esse usuário será excluido permanentimente.</p>
        <br><br>
        <input type="submit" value="Excluir">
        <a href="listausuarios.php">
            <input type="button" value="voltar">
        </a>
    </form>
</body>
</html>



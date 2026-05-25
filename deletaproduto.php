<?php
include('seguranca10.php');
include('cabecalho.php');
include('conndb.php');

if($_SERVER['REQUEST_METHOD']=='POST'){

    $id = $_POST['id'];
    $sql = "UPDATE tb_produtos SET status_produto = 0
     WHERE id_produto = $id";
    mysqli_query($link,$sql);
    mysqli_close($link);
    header('Location: listaprodutos.php');
    exit();
}



if(!isset($_GET['id'])){
    header('Location:listaprodutos.php');
    exit();
}
$id = $_GET['id'];
$sql = "SELECT nome_produto FROM tb_produtos WHERE id_produto = $id";
$result = mysqli_query($link,$sql);
$tbl = mysqli_fetch_array($result);
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produto</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <br>
    <h1>Excluir Produto</h1>
    <br>
    <form action="deletaproduto.php" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        <p>Deseja excluir o produto <b><?=$tbl[0]?></b>.</p>
        <p>Esse produto será excluido permanentimente.</p>
        <br><br>
        <input type="submit" value="Excluir">
        <a href="listaprodutos.php">
            <input type="button" value="voltar">
        </a>
    </form>
</body>
</html>



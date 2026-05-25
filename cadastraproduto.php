<?php
include('seguranca10.php');
include('cabecalho.php');
include('conndb.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $caracteristica = $_POST['caracteristica'];
    $estoque = $_POST['estoque'];
    $valor = $_POST['valor'];
    $imagem = $_FILES['imagem']['name'];
    $barcodde = $_POST['barcode'];
    $status = 1;
   

    $sql = "INSERT INTO `tb_produtos`(`nome_produto`, `descricao_produto`,
     `caracteristica_produto`, `estoque_produto`, `valor_produto`, `imagem_produto`,
      `barcode_produto`, `status_produto`) VALUES ('$nome','$descricao','$caracteristica',
      '$estoque','$valor','$imagem','$barcodde','$status')";

    mysqli_query($link,$sql);

    mysqli_close($link);
    header('Location: listaprodutos.php');
    exit();

}


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastra Produto</title>
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Cadastra Produto</h1>
        <?php
        if(isset($_GET['msg'])){
        ?>
            <br>
            <p id="mensagem"><?=$_GET['msg']?></p>
        <?php
        }
        ?>
        <br>
        <form action="cadastraproduto.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <label for="nome">Produto:</label>
                <input type="text" name="nome" id="nome" maxlength="30" required>
                <br>
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" maxlength="200" required></textarea>
                <br>
                <label for="caracteristica">Características:</label>
                <textarea name="caracteristica" id="caracteristica" maxlength="200" required></textarea>
                <br>
                <label for="estoque">Estoque:</label>
                <input type="number" name="estoque" id="estoque" required>
                <br>
                <label for="valor">Valor:</label>
                <input type="number" name="valor" id="valor" step="0.01" min="0" required>
                <br>
                <label for="imagem">Imagem:</label>
                <input type="file" id="imagem" name="imagem" required>
                <br>
                <label for="barcode">Código de Barras:</label>
                <input type="text" name="barcode" id="barcode" maxlength="13" minlength="13" required>

                <br>
                <br>
                <input type="submit" value="Enviar">
            </fieldset>
        </form>
    </div>
</body>

</html>

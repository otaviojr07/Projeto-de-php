<?php
include('seguranca10.php');
include('cabecalho.php');
include('conndb.php');

if (!isset($_GET['id'])) {
    header('Location: listaprodutos.php');
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM tb_produtos WHERE id_produto = $id";
$result = mysqli_query($link, $sql);
$tbl = mysqli_fetch_array($result);
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalha Produto</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39&display=swap" rel="stylesheet">
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

        .barcode {
            font-family: 'Libre Barcode 39', cursive;
            font-size: 65px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Detalha Produto</h1>
        <br>
        <form>
            <fieldset>
                <label for="nome">Produto:</label>
                <input type="text" value="<?= $tbl[1] ?>" disabled>
                <br>
                <label for="descricao">Descrição:</label>
                <textarea disabled><?= $tbl[2] ?></textarea>
                <br>
                <label for="caracteristica">Características:</label>
                <textarea disabled><?= $tbl[3] ?></textarea>
                <br>
                <label for="estoque">Estoque:</label>
                <input type="number" value="<?= $tbl[4] ?>" disabled>
                <br>
                <label for="valor">Valor:</label>
                <input type="number" value="<?= $tbl[5] ?>" disabled>
                <br>
                <label for="imagem">Imagem:</label>
                <img src="imagens/<?= $tbl[6] ?>" width="150">
                <br>
                <label for="barcode">Código de Barras:</label>
                <input type="text" value="<?= $tbl[7] ?>" disabled>
                <br>
                <div class="barcode"><?=$tbl[7]?></div>
                <br>
                <br>
                <a href="listaprodutos.php"><input type="button" value="Voltar"></a>
            </fieldset>
        </form>
    </div>
</body>

</html>
<?php
include('seguranca0.php');
include('cabecalho.php');
include('conndb.php');

if(!isset($_GET['id'])){
    header('Location: index.php');
    exit();
}
$id = $_GET['id'];
$sql = "SELECT * FROM tb_produtos WHERE id_produto = $id";
$result = mysqli_query($link, $sql);
$tbl = mysqli_fetch_array($result);
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Loja</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        /* Container principal */
.product-detail-container {
    display: flex;
    justify-content: center;
    padding: 2rem;
    background-color: #f2f2f2;
}

/* Card com borda, sombra e responsividade */
.product-detail-card {
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    padding: 2rem;
    max-width: 900px;
    width: 100%;
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
}

/* Imagem grande e responsiva */
.product-detail-img {
    width: 100%;
    max-width: 350px;
    height: auto;
    border-radius: 8px;
    object-fit: cover;
}

/* Informações do produto */
.product-detail-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.product-name {
    font-size: 1.8rem;
    font-weight: 600;
    color: #222;
}

.product-price {
    font-size: 1.5rem;
    font-weight: bold;
    color: #00aa5b;
}

/* Formulário e botões */
.product-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.label {
    font-weight: 500;
    color: #333;
}

.select {
    padding: 0.5rem;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 1rem;
    width: 100px;
}

/* Botões em grupo */
.button-group {
    display: flex;
    gap: 1rem;
    margin-top: 0.5rem;
}

.btn {
    padding: 0.6rem 1.2rem;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-decoration: none;
    text-align: center;
    display: inline-block;
}

/* Estilo para cada tipo de botão */
.btn-primary {
    background-color: #00aa5b;
    color: white;
}

.btn-primary:hover {
    background-color: #008f4a;
}

.btn-secondary {
    background-color: #e0e0e0;
    color: #333;
    border: none;
    padding: 10px 20px;
    margin-top: 10px;
    border-radius: 25px;
    cursor: pointer;
    font-size: 1rem;
}

.btn-secondary:hover {
    background-color: #c8c8c8;
}

/* Descrições */
.product-description {
    font-size: 1rem;
    color: #555;
}
@media (max-width: 768px) {
    .product-detail-card {
        flex-direction: column;
        align-items: center;
    }

    .product-detail-img {
        max-width: 100%;
    }

    .button-group {
        flex-direction: column;
        width: 100%;
    }

    .btn {
        width: 100%;
        text-align: center;
    }
}

    </style>
</head>
<body>
    <div class="product-detail-container">
        <div class="product-detail-card">
            <img src="imagens/<?=$tbl[6]?>" alt="Imagem Produto" class="product-detail-img">

            <div class="product-detail-info">
                <h1 class="product-name"><?= $tbl[1] ?></h1>
                <span class="product-price">R$ <?= number_format($tbl[5], 2, ',', '.') ?></span>

                <form action="carrinho.php" method="post" class="product-form">
                    <input type="hidden" name="id_produto" value="<?=$tbl[0]?>">
                    
                    <label for="quantidade" class="label">Quantidade:</label>
                    <select name="quantidade" id="quantidade" class="select">
                        <?php for($i = 1; $i <= 10; $i++) { echo "<option value='$i'>$i</option>"; } ?>
                    </select>

                    <div class="button-group">
                        <a href="index.php" class="btn btn-secondary">Voltar</a>
                        <input type="submit" value="Adicionar ao Carrinho" class="btn btn-primary">
                    </div>
                </form>

                <p class="product-description"><strong>Descrição:</strong> <?=$tbl[2]?></p>
                <p class="product-description"><strong>Características:</strong> <?=$tbl[3]?></p>
                <p class="product-description"><strong>Código de barras:</strong> <?=$tbl[7]?></p>
            </div>
        </div>
    </div>
</body>
</html>
<?php
include('seguranca0.php');
include('cabecalho.php');
include('conndb.php');
$sql = "SELECT * FROM tb_produtos 
    WHERE status_produto = 1 
    ORDER BY RAND()";
$result = mysqli_query($link, $sql);
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
    <style>
        /* Reset básico */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: #f9f9f9;
    padding: 2rem;
}

/* Container flexível para os cards */
.container {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    justify-content: center;
}

/* Link do card */
.card-link {
    text-decoration: none;
    color: inherit;
}

/* Card do produto */
.product-card {
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    width: 220px;
    transition: transform 0.2s ease, box-shadow 0.3s ease;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
}

/* Imagem do produto */
.product-img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

/* Informações do produto */
.product-info {
    padding: 1rem;
}

.product-name {
    display: block;
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 0.5rem;
    color: #333;
}

.product-price {
    font-size: 1.1rem;
    color: #00aa5b;
    font-weight: bold;
}

    </style>
</head>

<body>
    <div class="container">
        <?php while ($tbl = mysqli_fetch_array($result)) { ?>
            <a href="vitrineproduto.php?id=<?= $tbl[0] ?>" class="card-link">
                <div class="product-card">
                    <img src="imagens/<?= $tbl[6] ?>" alt="Imagem Produto" class="product-img">
                    <div class="product-info">
                        <span class="product-name"><?= $tbl[1] ?></span>
                        <span class="product-price">R$ <?= number_format($tbl[5], 2, ',', '.') ?></span>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
</body>

</html>
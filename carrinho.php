<?php
include('seguranca1.php');
include('cabecalho.php');
include('conndb.php');

//cria carrionho para o usuario caso ele não tenha um
if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = $_SESSION['id_usuario']. ' ' . date("Y-m-d H:i:s");
}

//POST modificação no carrinho
if($_SERVER['REQUEST_METHOD']== 'POST'){
    echo("RRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR");
    //verifica se é uma adição de produto
    if(isset($_POST['quantidade']) && isset($_POST['id_produto'])){
        //verifica se o produto já está no carrinho
        $sql = "SELECT COUNT(*) FROM tb_carrinhos
        WHERE numero_carrinho = '{$_SESSION['carrinho']}' 
        AND id_produto_carrinho = {$_POST['id_produto']}";
        $result = mysqli_query($link,$sql);
        $quant_carrinho = mysqli_fetch_array($result);
        if($quant_carrinho[0] == 0){
            //O produto não está no carrinho ADICIONAR
            $sql = "INSERT INTO tb_carrinhos (numero_carrinho, id_usuario_carrinho,
             id_produto_carrinho, quantidade_carrinho, status_carrinho) VALUES
             ('{$_SESSION['carrinho']}', '{$_SESSION['id_usuario']}',
             '{$_POST['id_produto']}', '{$_POST['quantidade']}',1)";
            mysqli_query($link,$sql);
        }else{
            //O produto já está no carrinho ATUALIZAR A QUANTIDADE
            $sql = "UPDATE tb_carrinhos 
            SET quantidade_carrinho = (quantidade_carrinho + {$_POST['quantidade']})
            WHERE numero_carrinho = '{$_SESSION['carrinho']}' AND id_produto_carrinho =
            '{$_POST['id_produto']}'";
            mysqli_query($link,$sql);
        }

    }
}
// Mostra o carrinho Acontece todas as vezes
$sql = "SELECT id_carrinho, id_produto_carrinho, nome_produto, valor_produto,
(valor_produto * quantidade_carrinho), imagem_produto, quantidade_carrinho 
FROM tb_carrinhos
JOIN tb_produtos ON tb_carrinhos.id_produto_carrinho = tb_produtos.id_produto
WHERE numero_carrinho = '{$_SESSION['carrinho']}'";

$result = mysqli_query($link,$sql);
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <br>
    <h1>Carrinho</h1>
    <table>
        <tr>
            <th>Imagem</th>
            <th>Nome Produto</th>
            <th>Valor Unitário</th>
            <th>Quantidade</th>
            <th>Valor</th>
        </tr>
        <?php
        $total = 0;
        while($tbl = mysqli_fetch_array($result)){
        ?>
            <tr>
                <td><img src="imagens/<?=$tbl[5]?>" alt="Imagem Produto" height="50"></td>
                <td><?=$tbl[2]?></td>
                <td>R$ <?= number_format($tbl[3],2,",",".") ?> </td>
                <td>
                    <?= $tbl[6]?>
                    <form action="carrinho.php" method="post" name="soma<?=$tbl[0]?>">
                        <input type="hidden" name="soma" value="<?=$tbl[0]?>">
                            <span class="material-symbols-outlined" onclick="soma<?=$tbl[0]?>.submit()">
                                add_circle
                            </span>
                        
                    </form>
                </td>
                <td>R$ <?= number_format($tbl[4],2,",",".") ?> </td>
            </tr>
        <?php
        $total += $tbl[4];
        }
        ?>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Total Geral</th>
            <th>R$ <?= number_format($total,2,",",".") ?> </th>
        </tr>
    </table>
</body>
</html>
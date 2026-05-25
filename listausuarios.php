<?php
include('seguranca10.php');
include('cabecalho.php');
include('conndb.php');


if (isset($_GET['buscar'])) {
    $termo = $_GET['buscar'];
    $sql = "SELECT id_usuario, nome_usuario, cpf_usuario, 
    email_usuario, telefone_usuario, nivel_usuario
    FROM tb_usuarios WHERE nome_usuario LIKE '%$termo%'";
} else {

    $sql = "SELECT id_usuario, nome_usuario, cpf_usuario, 
    email_usuario, telefone_usuario, nivel_usuario
    FROM tb_usuarios";
}

$result = mysqli_query($link, $sql);
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Usuários</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <h1>Lista Usuários</h1>
    <br>
    <br>
    <div>
        <form action="listausuarios.php" method="get">
            <input type="text" name="buscar" placeholder="Buscar por nome">
            <input type="submit" value="Pesquisar">
            <a href="listausuarios.php"><input type="button" value="Voltar"></a>
        </form>
    </div>
    <br>
    <table border="1">
        <tr>
            <th>*****</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Nível</th>
            <th>*****</th>
            <th>*****</th>
        </tr>
        <?php
        while ($tbl = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td>
                    <a href="detalhausuario.php?id=<?= $tbl[0] ?>">
                        <span class="material-symbols-outlined">search</span>
                    </a>
                </td>
                <td><?= $tbl[1] ?></td>
                <td><?= $tbl[3] ?></td>
                <td><?= $tbl[4] ?></td>
                <td><?= $tbl[2] ?></td>
                <td><?= $tbl[5] == 1 ? "Usuário" : "Administrador" ?></td>
                <td>
                    <a href="editausuario.php?id=<?=$tbl[0]?>">
                        <span class="material-symbols-outlined">
                            manage_accounts
                        </span>
                    </a>
                </td>
                <td>
                    <a href="deletausuario.php?id=<?=$tbl[0]?>">
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
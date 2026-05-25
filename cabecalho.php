<style>
    .dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
<?php
if (!isset($_SESSION['nivel'])) {
    // Usuário não logado
?>
    <div class="cabecalho">
        <div class="cabecalho-conteudo">
            <div>
                <a href="index.php">
                    <h1>Minha loja</h1>
                </a>
                <p>
                    Faça seu <a href="login.php">Login</a>
                    ou crie sua <a href="criaconta.php">Conta</a>!
                </p>
            </div>
        </div>
    </div>
<?php
} elseif ($_SESSION['nivel'] == 1) {
    // Usuário nível 1
?>
    <div class="cabecalho">
        <div class="cabecalho-conteudo">
            <div>
                <a href="index.php">
                    <h1>Minha loja</h1>
                </a>
                <p><?= $_SESSION['apelido'] ?>, bem-vindo à Minha Loja!</p>
            </div>
            <div class="cabecalho-direita">
                <div class="dropdown" style="float:right;">
                    <button class="dropbtn"><?= $_SESSION['apelido'] ?></button>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="alterasenha.php">Alterar Senha</a>
                        <a href="logout.php">Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} elseif ($_SESSION['nivel'] == 10) {
    // Usuário nível 10 (admin)
?>
    <div class="cabecalho">
        <div class="cabecalho-conteudo">
            <div>
                <a href="index.php">
                    <h1>Minha loja</h1>
                </a>
                <div class="menu-admin">
                    <a href="cadastrausuario.php"><button>Cadastrar Usuário</button></a>
                    <a href="listausuarios.php"><button>Listar Usuário</button></a>
                    <a href="cadastraproduto.php"><button>Cadastrar Produto</button></a>
                    <a href="listaprodutos.php"><button>Listar Produto</button></a>
                </div>
            </div>
            <div class="cabecalho-direita">
                <p><?= $_SESSION['apelido'] ?>, bem-vindo à Minha Loja!</p>
                <div class="dropdown" style="float:right;">
                    <button class="dropbtn"><?= $_SESSION['apelido'] ?></button>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="alterasenha.php">Alterar Senha</a>
                        <a href="logout.php">Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
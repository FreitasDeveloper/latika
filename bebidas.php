<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/materialize.min.css">
  <link rel="stylesheet" href="../css/estilo.css">
  <script src="../js/materialize.min.js"></script>

  <title>LA TIKA</title>
</head>

<body class="background-color-3">
  <?php
  session_start();
  ?>
  <nav>
    <div class="nav-wrapper background-color-1">
      <a href="../html/index.html" class="brand-logo">
        <img src="../img/logo001.png" alt="" class="responsive-img logo-img">
      </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li>
          <p class="NomeLogado">
            <?php echo $_SESSION['nome']; ?>
          </p>
        </li>
        <li>
          <p><a href="../php/comidas.php">Comidas</a></p>
        </li>
        <li>
          <p><a href="../php/bebidas.php">Bebidas</a></p>
        </li>
        <li>
          <p><a href="../php/carrinho.php"><i class="material-icons">shopping_cart</i></a></p>
        </li>
        <li>
          <p><a href="#atualizar" class="modal-trigger"><i class="material-icons">system_update</i></a></p>
        </li>
        <li>
          <p><a href="statusdopedidoCliente.php" class="">Status do pedido</a></p>
        </li>
      </ul>
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="container">
    <div id="atualizar" class="modal">
      <div class="modal-content">
        <h4>Atualizar:</h4>

        <form id="frmatualizar" action="atualizarCliente.php" method="post">
          <div class="row">
            <div class="input-field col s12 m6">
              <input value="<?php echo $_SESSION['nome']; ?>" id="nome" name="nome" type="text" class="validate"
                required />
              <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12 m6">
              <input readonly value="<?php echo $_SESSION['cpf'] ?>" id="cpf" type="text" class="validate" name="cpf" />
              <label for="cpf">cpf</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6">
              <input value="<?php echo $_SESSION['telefone'] ?>" id="telefone" name="telefone" type="text"
                class="validate" required />
              <label for="telefone">Telefone</label>
            </div>
            <div class="input-field col s12 m6">
              <input value="<?php echo $_SESSION['email'] ?>" id="email" name="email" type="email" class="validate"
                required />
              <label for="email">Email</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" onclick="frmatualizar.submit()" class="modal-close waves-effect waves-green btn-flat"
              name="atualizar" id="atualizar">Atualizar</button>
            <a href="#excluir" class="modal-trigger modal-close waves-effect waves-green btn-flat" name="">Excluir
              cadastro</a>
          </div>
        </form>
      </div>
    </div>
    <div id="excluir" class="modal">
      <div class="modal-content">
        <h4>Deseja excluir seu cadastro?</h4>
        <h6>Informe seu cpf abaixo e confirme a exclusão.</h6>
        <form id="frmexcluirCadastro" action="../php/excluirCliente.php" method="post">
          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <input id="cpf" type="text" class="validate" name="cpf" />
                  <label for="cpf">CPF:</label>
                </div>
              </div>
              <div class="row">
                <button class="modal-close waves-effect waves-green btn-flat" name="excluirCliente" id="excluirCliente">
                  Excluir
                </button>
              </div>
            </form>
          </div>
        </form>
      </div>
    </div>
    <h1>Bebidas</h1>

    <?php
    include("sql.php");

    $result = mysqli_query($phpconnect, "select * from tb_produto;");

    while ($tb_produto = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

      if ($tb_produto['CODIGO_CATEGORIA'] == "1") {

        ?>

        <div class="row">
          <form id="frmlCarrinho" action="carrinhoCodigoCliente.php" method="get">

            <div class="col s6 m9">
              <div class="">
                <input type="hidden" name="cpf_usuLogado" value="<?php echo $_SESSION['cpf']; ?>">
                <input readonly class="cardapio-codigo" name="codigo" id="codigo"
                  value="<?php echo $tb_produto['CODIGO']; ?>">
                <input readonly class="cardapio-codigo" name="nome" id="nome" value="<?php echo $tb_produto['NOME']; ?>">
                <input readonly class="cardapio-descr" name="descricao" id="descricao"
                  value="<?php echo $tb_produto['DESCRICAO']; ?>">
                <input readonly class="cardapio-preco" name="preco" id="preco"
                  value="<?php echo $tb_produto['PRECO_VENDA']; ?>">
              </div>
            </div>
            <div class="col s6 m3">
              <div class="cardapio-item">
                <button onclick="frmlCarrinho.submit()" class="btn-floating btn-large waves-effect waves-light red"
                  name="addAoCarrinho" type="submit"><i class="material-icons">add</i></button>
              </div>
            </div>
        </div>
        </form>
        <?php
      }
      ;
    }
    ;
    ?>

  </div>

  <ul id="slide-out" class="sidenav">
    <li>
      <div class="user-view">
        <div class="background background-color-2">

        </div>
        <a href="#name"><span class="white-text name">LA TIKA</span></a>
        <a href="#email"><span class="white-text email">
            <?php echo $_SESSION['email']; ?>
          </span></a>
      </div>
    </li>
    <li><a href="#!"><i class="material-icons">cloud</i>Instagram</a></li>
    <li><a href="#!"><i class="material-icons">cloud</i>Whatsapp</a></li>
    <li>
      <div class="divider"></div>
    </li>
    <li><a href="../php/comidas.php">Comidas</a></li>
    <li><a href="../php/bebidas.php">Bebidas</a></li>
    <li><a href="../php/carrinho.php">Carrinho</a></li>
    <li><a href="statusdopedidoCliente.php">Status do pedido</a></li>
    <li><a href="#atualizar" class="modal-trigger">Atualizar Cadastro</a></li>
  </ul>
  <script>
    M.AutoInit();
  </script>
</body>

</html>
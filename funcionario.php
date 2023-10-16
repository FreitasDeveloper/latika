<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/materialize.css">
  <link rel="stylesheet" href="../css/estilo.css">
  <script src="../js/materialize.min.js"></script>
  <title>LA TIKA</title>
</head>

<body class="background-color-3">
  <nav>
    <div class="nav-wrapper background-color-1">
      <a href="../html/index.html" class="brand-logo center">
        <img src="../img/logo001.png" alt="" class="responsive-img logo-img" />
      </a>
      <ul id="nav-mobile" class="right hide-on-medium-and-down">
        <li>
          <a class="modal-trigger" href="#cadastroFun"><i class="material-icons">account_circle</i></a>
        </li>
      </ul>
      <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up"><i
          class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="container">

    <h4>Pedidos</h4>

    <!-- tabela de pedidos -->
    <table class="highlight centered">
      <thead>
        <tr>
          <th>Código</th>
          <th>CPF Cliente</th>
          <th>Forma de pagamento</th>
          <th>Receptor</th>
          <th>Taxa Entrega</th>
          <th>Troco</th>
          <th>Endereço</th>
          <th>Status do Pedido</th>
        </tr>
      </thead>

      <tbody>
        <?php

        include("sql.php");

        $result = mysqli_query($phpconnect, "select * from tb_pedido;");


        while ($tb_pedido = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          if($tb_pedido['CODIGO'] != "" && $tb_pedido['CPF_CLIENTE'] != "" && $tb_pedido['FORMA_PAGAMENTO'] != "" && $tb_pedido['RECEPTOR'] != "" && $tb_pedido['TAXA_ENTREGA'] != ""
             && $tb_pedido['ENDERECO'] != ""){
              $cpf = $tb_pedido['CPF_CLIENTE'];
              $codigo = $tb_pedido['CODIGO'];
          ?>
          <tr>

            <td>
              <?php echo $codigo; ?>
            </td>
            <td>
              <?php echo $cpf; ?>
            </td>
            <td>
              <?php echo $tb_pedido['FORMA_PAGAMENTO']; ?>
            </td>
            <td>
              <?php echo $tb_pedido['RECEPTOR']; ?>
            </td>
            <td>
              <?php echo $tb_pedido['TAXA_ENTREGA']; ?>
            </td>
            <td>
              <?php echo $tb_pedido['TROCO']; ?>
            </td>
            <td>
              <?php echo $tb_pedido['ENDERECO']; ?>
            </td>
            <form action="statusdopedidoFuncionario.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $tb_pedido['CODIGO']; ?>">
              <input type="hidden" name="cpf" value="<?php echo $cpf?>">
              <td><button class="waves-effect black btn modal-trigger" name="bnt"
                  href="statusdopedidoFuncionario.php">Informações/Status</button>
              </td>
            </form>
          </tr>
          <?php
          };
        }
        ;
        ?>
      </tbody>
    </table>
  </div>

  <!-- cadastrar um novo funcionário -->
  <div id="cadastroFun" class="modal">
    <div class="modal-content">
      <h4>Cadastre um novo funcionário:</h4>
      <form id="frmcadastroFun" action="../php/cadastrofuncionario.php" method="post">
        <div class="row">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s6">
                <input id="nome" type="text" class="validate" name="nome" />
                <label for="nome">Nome:</label>
              </div>
              <div class="input-field col s6">
                <input id="cpf" type="text" class="validate" name="cpf" />
                <label for="cpf">CPF:</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="telefone" type="tel" class="validate" name="telefone" />
                <label for="telefone">Telefone:</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="email" />
                <label for="email">Email:</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="senha" type="password" class="validate" name="senha" />
                <label for="senha">Senha:</label>
              </div>
            </div>
            <div class="row">
              <button class="modal-close waves-effect waves-green btn-flat" name="confirmar" id="confirmar">
                Confirmar
              </button>
            </div>
          </form>
        </div>
      </form>
    </div>
  </div>


  <ul id="slide-out" class="sidenav">
    <li>
      <div class="user-view">
        <div class="background background-color-2"></div>
        <a href="#name"><span class="white-text name">LA TIKA</span></a>
      </div>
    </li>
    <li>
      <a href="#!"><i class="material-icons">cloud</i>Instagram</a>
    </li>
    <li>
      <a href="#!"><i class="material-icons">cloud</i>Whatsapp</a>
    </li>
    <li>
      <div class="divider"></div>
    </li>
    <li><a href="../php/produtos.php">Listar Produtos</a></li>
    <li><a href="../php/listaFun.php">Listar Funcionários</a></li>
    <li><a href="../php/listarClientes.php">Listar Clientes</a></li>
  </ul>

  <script>
    M.AutoInit();
  </script>
</body>

</html>
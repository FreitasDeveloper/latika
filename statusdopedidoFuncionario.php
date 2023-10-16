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
      </ul>
      <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up"><i
          class="material-icons">menu</i></a>
    </div>
  </nav>
  <?php
  $id = @$_POST['id'];
  $cpf = @$_POST['cpf'];
  include("sql.php");


  ?>
  <div class="container">
    <h3>Dados do Pedido Nº
      <?php echo $id; ?>
    </h3>
    <div class="row">
      <div class="col s6 m6">
        <div class="card white darken-1">
          <form id="status" action="statusPedido.php" method="post">
            <div class="card-content black-text">
              <h5 style="font-weight: bold">Status do Pedido</h5>
              <select id="status" name="status">
                <option value="" disabled selected>SELECIONE O STATUS ATUAL</option>
                <option value="ACEITO">ACEITO</option>
                <option value="EM-PREPARO">EM PREPARO</option>
                <option value="FEITO">FEITO</option>
                <option value="ENVIADO">ENVIADO</option>
                <option value="ENTREGUE">ENTREGUE</option>
              </select>
              <input type="hidden" name="cpf_cliente" value="<?php echo $cpf; ?>">
              <?php
                // status atual
                $status = mysqli_query($phpconnect, "select * from tb_statuspedido where CPF_CLIENTE = '$cpf';");
                if (mysqli_num_rows($status) > 0) {
                  $tb_statuspedido = mysqli_fetch_array($status, MYSQLI_ASSOC);
                  ?>
                  <p>Status atual:
                    <?php echo $tb_statuspedido['STATUS']; ?>
                  </p>
              <?php
              };
              ?>
            </div>
            <div class="card-action">
              <button onclick="status.submit()" type="submit" class="modal-close waves-effect waves-green btn-flat"
                name="enviar" id="enviar">Enviar</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col s6 m6">

        <div class="card white darken-1">
          <div class="card-content black-text">
            <span style="font-weight: bold" class="card-title">ITENS</span>
            <?php

            $itensPedido = mysqli_query($phpconnect, "select * from tb_pedido where CPF_CLIENTE = '$cpf';");


            while ($tb_pedido = mysqli_fetch_array($itensPedido, MYSQLI_ASSOC)) {
              ?>
              <h6>Produto:
                <?php echo $tb_pedido['ITENS_PEDIDO']; ?>
              </h6>
              <?php
            }
            ;
            ?>
          </div>
          <div class="divider black"></div>
        </div>
      </div>
      <div class="divider black"></div>
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
    <li><a href="../php/funcionario.php">Pedidos</a></li>

  </ul>

  <script>
    M.AutoInit();
  </script>
</body>

</html>
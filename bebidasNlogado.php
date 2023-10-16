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
  <nav>
    <div class="nav-wrapper background-color-1">
      <a href="../html/index.html" class="brand-logo">
        <img src="../img/logo001.png" alt="" class="responsive-img logo-img">
      </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li>
          <p class="NomeLogado">Usuário não logado</p>
        </li>
        <li>
          <p><a href="../php/comidasNlogados.php">Comidas</a></p>
        </li>
        <li>
          <p><a href="../php/bebidasNlogado.php">Bebidas</a></p>
        </li>
      </ul>
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="container">

    <h1>Bebidas</h1>

    <?php
    include("sql.php");

    $result = mysqli_query($phpconnect, "select * from tb_produto;");

    while ($tb_produto = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

      if ($tb_produto['CODIGO_CATEGORIA'] == "1") {

        ?>

        <div class="row">
          <div class="col s6 m9">
            <div class="">
              <input readonly class="cardapio-codigo" name="codigo" id="codigo"
                value="<?php echo $tb_produto['CODIGO']; ?>">
              <input readonly class="cardapio-codigo" name="nome" id="nome" value="<?php echo $tb_produto['NOME']; ?>">
              <input readonly class="cardapio-descr" name="descricao" id="descricao"
                value="<?php echo $tb_produto['DESCRICAO']; ?>">
              <input readonly class="cardapio-preco" name="preco" id="preco"
                value="<?php echo $tb_produto['PRECO_VENDA']; ?>">
            </div>
            <div class="divider black"></div>
          </div>
        </div>
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
        <a href="#email"><span class="white-text email">Usuário não Logado</span></a>
      </div>
    </li>
    <li><a href="#!"><i class="material-icons">cloud</i>Instagram</a></li>
    <li><a href="#!"><i class="material-icons">cloud</i>Whatsapp</a></li>
    <li>
      <div class="divider"></div>
    </li>
    <li><a href="../php/comidasNlogados.php">Comidas</a></li>
    <li><a href="..php/bebidasNlogado.php">Bebidas</a></li>
  </ul>
  <script>
    M.AutoInit();
  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="../css/materialize.css" />
  <link rel="stylesheet" href="../css/estilo.css" />
  <script src="../js/materialize.min.js"></script>

  <title>Produtos</title>
</head>

<body class="background-color-3">

  <nav>
    <div class="nav-wrapper background-color-1">
      <a href="../html/index.html" class="brand-logo center">
        <img src="../img/logo001.png" alt="" class="responsive-img logo-img" />
      </a>
      <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up"><i
          class="material-icons">menu</i></a>
    </div>
  </nav>


  <div class="container">
    <table class="centered responsive-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Preço</th>
          <th>Código da categoria</th>
          <th>Modificar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("sql.php");

        $result = mysqli_query($phpconnect, "select P.CODIGO,P.NOME,DESCRICAO,PRECO_VENDA,C.NOME AS CAT
          from tb_produto as P inner join tb_categoria as C
          on P.CODIGO_CATEGORIA = C.CODIGO;");

        while ($tb_produto = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


          ?>
          <tr>
            <td>
              <?php echo $tb_produto['CODIGO'] ?>
            </td>
            <td>
              <?php echo $tb_produto['NOME'] ?>
            </td>
            <td>
              <?php echo $tb_produto['DESCRICAO'] ?>
            </td>
            <td>
              <?php echo $tb_produto['PRECO_VENDA'] ?>
            </td>
            <td>
              <?php echo $tb_produto['CAT'] ?>
            </td>
            <td><a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#excluirProd"><i
                  class="material-icons">delete_forever</i></a></td>
          </tr>

          <?php
        }
        ;
        ?>

      </tbody>
    </table>
    <a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#addProduto"><i
        class="material-icons">add</i></a>
    <!-- MODAL PARA ADICIONAR PRODUTO -->
    <div id="addProduto" class="modal">
      <form id="frmADDprodutos" action="../php/addProdutos.php" method="get">
        <div class="modal-content">
          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <input id="nome" type="text" class="validate" name="nome" required>
                  <label for="nome">Nome</label>
                </div>
                <div class="input-field col s6">
                  <input id="descricao" type="text" name="descricao" class="validate" required>
                  <label for="descricao">Descrição</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input id="preço" type="number" class="validate" name="preco" required>
                  <label for="preço">Preço</label>
                </div>
                <div class="input-field col s6">
                  <select name="codigoCategoria">
                    <?php
                    $res = mysqli_query($phpconnect, "select * from tb_categoria;");
                    while ($tb = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                      echo '<option value="' . $tb['CODIGO'] . '">' . $tb['NOME'] . '</option>';
                    }
                    ?>
                  </select>
                  <label>Categoria</label>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row modal-footer">
          <button onclick="frmADDprodutos.submit()" type="submit" class="modal-close waves-effect waves-light btn red"
            id="addProduto" name="addProduto">Adicionar</button>
        </div>
      </form>
    </div>

    <!-- MODAL PARA EXCLUIR PRODUTO -->

    <div id="excluirProd" class="modal">
      <form id="frmExcluir" action="../php/excluirProduto.php" method="get">
        <div class="modal-content">
          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <input id="codigo" type="text" class="validate" name="codigo" required>
                  <label for="codigo">Código</label>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row modal-footer">
          <button onclick="frmExcluir.submit()" type="submit" class="modal-close waves-effect waves-light btn red"
            name="confirmar" id="confirmar">Confirmar exclusão.</button>
        </div>
    </div>
    </form>
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
    <li><a class="modal-trigger" href="../php/funcionario.php">Pedidos</a></li>
    <li><a href="../php/listaFun.php">Listar Funcionários</a></li>
    <li><a href="../php/listarClientes.php">Listar Clientes</a></li>
  </ul>

  <script>
    M.AutoInit();
  </script>
</body>

</html>
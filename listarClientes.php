<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="../css/materialize.css" />
  <link rel="stylesheet" href="../css/estilo.css" />
  <script src="../js/materialize.min.js"></script>

  <title>Clientes</title>
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
          <th>E-mail</th>
          <th>Nome</th>
          <th>Telefone</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include ("sql.php");

          $result = mysqli_query($phpconnect, "select EMAIL, NOME, TELEFONE from tb_cliente;");

          while($tb_cliente = mysqli_fetch_array($result, MYSQLI_ASSOC)){


        ?>
        <tr>
          <td><?php echo $tb_cliente['EMAIL'] ?></td>
          <td><?php echo $tb_cliente['NOME'] ?></td>
          <td><?php echo $tb_cliente['TELEFONE'] ?></td>
        </tr>

        <?php
          };
        ?>  
        
      </tbody>
    </table> 

    
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
    <li><a href="../php/funcionario.php">Pedidos</a></li>

  </ul>

  <script>
    M.AutoInit();
  </script>
</body>

</html>
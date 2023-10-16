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

    $cpf_cliente = $_SESSION['cpf'];
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
            </ul>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

        </div>
    </nav>
    <?php
    include("sql.php");
    ?>
    <div class="container">

        <div class="row">
            <div class="col s12 m12">
                <div class="card white darken-1">
                    <div class="card-content black-text">
                        <span style="font-weight: bold" class="card-title">Status do Pedido</span>
                        <?php
                        $status = mysqli_query($phpconnect, "select * from tb_statuspedido where CPF_CLIENTE = '$cpf_cliente';");
                        if (mysqli_num_rows($status) > 0) {
                            while ($tb_statuspedido = mysqli_fetch_array($status, MYSQLI_ASSOC)) {
                                ?>
                                <p>
                                    <?php echo $tb_statuspedido['STATUS']; ?>
                                </p>
                                <?php
                            }
                            ;
                        } else {
                            ?>
                            <p>Nenhum</p>
                            <?php
                        }
                        ;
                        ?>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Entregue</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Confirma que recebeu o pedido?</h4>
            </div>
            <div class="modal-footer">
                <form action="pedidoConcluido.php" method="GET">
                    <input type="hidden" name="cpf_cliente" value="<?php echo $cpf_cliente; ?>">
                    <button type="submit" class="modal-close waves-effect waves-green btn-flat">Sim, recebi.</button>
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>

                </form>
            </div>
        </div>







        <ul id="slide-out" class="sidenav">
            <li>
                <div class="user-view">
                    <div class="background background-color-2">

                    </div>
                    <a href="#name"><span class="white-text name">LA TIKA</span></a>
                    <a href="#email"><span class="white-text email"><?php  echo $_SESSION['email'] ;?></span></a>
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
        </ul>
        <script>
            M.AutoInit();
        </script>
    </div>

</body>

</html>
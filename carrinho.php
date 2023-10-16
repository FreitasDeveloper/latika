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
    <?php
    session_start();
    include("sql.php");


    ?>
    <nav>
        <div class="nav-wrapper background-color-1">
            <a href="../html/index.html" class="brand-logo">
                <img src="../img/logo001.png" alt="" class="responsive-img logo-img">
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../php/comidas.php">Comidas</a></li>
                <li><a href="../php/bebidas.php">Bebidas</a></li>
            </ul>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background background-color-2">

                </div>
                <a href="#user"><img class="circle" src="img/logo001.png"></a>
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
        <li><a href="comidas.php">Comidas</a></li>
        <li><a href="bebidas.php">Bebidas</a></li>
    </ul>
    <div class="container">
        <div class="row tabela">
            <form id="frmExcluir" action="deletarProdutoCarrinho.php" method="post">
                <table>
                    <thead>
                        <tr>
                            <th class="white-text">Codigo do Produto:</th>
                            <th class="white-text">Produto:</th>
                            <th class="white-text">Remover</th>

                        </tr>
                    </thead>
                    <?php
                    $cpf_cliente = $_SESSION['cpf'];
                    $result = mysqli_query($phpconnect, "select * from tb_itens_carrinho where CPF_CLIENTE = $cpf_cliente;");

                    while ($tb_itens_carrinho = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        ?>
                        <tbody>
                            <tr>
                                <td class="white-text" name="codigo" id="codigo">
                                    <?php echo $tb_itens_carrinho['COD_ITEM']; ?>
                                </td>
                                <td class="white-text" name="itens" id="itens">
                                    <?php echo $tb_itens_carrinho['ITENS']; ?>
                                </td>
                                <td class="white-text">
                                    <input type="hidden" name="cpf_usuLogado" value="<?php echo $_SESSION['cpf']; ?>">
                                    <input type="hidden" name="codigo" value="<?php echo $tb_itens_carrinho['COD_ITEM']; ?>">
                                    <input type="hidden" name="itens" value="<?= $tb_itens_carrinho['ITENS']; ?>">
                                    <button onclick="frmExcluir.submit()"
                                        class="btn-floating btn-large waves-effect waves-light red" type="submit"
                                        name="excluir"><i class="material-icons">remove</i>
                                    </button>
                                </td>
                            </tr>
                        <?php }
                    ;
                    ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="row">
            <div class="col-4">
                <a class="waves-effect blue-grey btn-large modal-trigger" href="#endereco">Endereço</a>
            </div>
        </div>
        <div id="endereco" class="modal">
            <div class="modal-content">
                <div class="row">
                    <form class="col s12" action="carrinho.php" method="post">
                        <div class="row">
                            <div class="input-field col s6">
                                <input name="rua" id="rua" type="text" class="validate">
                                <label for="Rua">Rua</label>
                            </div>
                            <div class="input-field col s6">
                                <input name="numero" id="numero" type="number" class="validate">
                                <label for="numero">Número</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input name="bairro" id="bairro" type="text" class="validate">
                                <label for="bairro">Bairro</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="cidade" type="text" class="validate" name="cidade">
                                <label for="cidade">Cidade</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="cep" type="text" class="validate" name="cep">
                                <label for="cep">Cep</label>
                            </div>
                            <div class="input-field col s6">
                                <button class="modal-close waves-effect blue-grey btn-large">Confirmar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row white">
            <form class="" action="pedido.php" method="post">

                <div class="row">
                    <div class="input-field col s4">
                        <input name="receptor" id="receptor" type="text" class="validate">
                        <label for="receptor">Nome do Receptor</label>
                    </div>
                    <div class="input-field col s4">
                        <?php
                        include("endereço.php");
                        ?>
                        <input type="hidden" name="rua" value="<?= $rua ?>">
                        <input type="hidden" name="numero" value="<?= $cidade ?>">
                        <input type="hidden" name="bairro" value="<?= $numero ?>">
                        <input type="hidden" name="cidade" value="<?= $bairro ?>">
                        <input type="hidden" name="cep" value="<?= $cep ?>">

                        <?php
                        while ($tb_taxa_entrega = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            if ($tb_taxa_entrega['BAIRRO'] == $bairro) {
                                ?>
                                <input readonly id="taxaEntrega" type="text" name="taxaEntrega" class="validate"
                                    value="<?= (isset($tb_taxa_entrega['TAXA_ENTREGA'])) ? $tb_taxa_entrega['TAXA_ENTREGA'] : '000'; ?>">

                                <?php
                            }
                            ;
                        }
                        ;
                        ?>
                        <label for="taxaEntrega">Taxa de Entrega</label>

                    </div>
                    <div class="input-field col s4">
                        <input readonly name="cpf" id="cpf" type="text" class="validate"
                            value="<?php echo $cpf_cliente; ?>">
                        <label for="cpf">CPF</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <select id="forma_pagamento" name="forma_pagamento">
                            <option value="" disabled selected>Escolha a opção</option>
                            <option value="DINHEIRO">Dinheiro</option>
                            <option value="PIX">PIX</option>
                            <option value="CARTAO">Cartão</option>
                        </select>
                        <label>Forma de Pagamento</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="troco" type="text" name="troco">
                        <label for="troco">Troco</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="observacao" type="text" name="observacao">
                        <label for="observacao">Observação</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button class="btn waves-effect black" type="submit" name="enviar" id="enviar">Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <script>
            M.AutoInit();
        </script>
    </div>
</body>

</html>
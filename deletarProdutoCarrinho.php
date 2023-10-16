<?php
$cpf_usuLogado = @$_POST['cpf_usuLogado'];
$itens = @$_POST['itens'];
$codigoProduto = @$_POST['codigo'];

    include ("sql.php");


    if($itens == '' || $cpf_usuLogado == ''){
        header('location: comidas.php');
    } else {

        $excluir = mysqli_query($phpconnect, "
        delete from tb_itens_carrinho
        where CPF_CLIENTE = '$cpf_usuLogado' and COD_ITEM = '$codigoProduto';
        ");
           header('location: carrinho.php');
    };
    


?>
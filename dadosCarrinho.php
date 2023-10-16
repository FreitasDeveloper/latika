<?php

include ("atualizarCliente.php");
include ("sql.php");

$taxa_entrega = @$_POST['taxaEntrega'];
$receptor = @$_POST['receptor'];
$forma_pagamento = @$_POST['forma_pagamento'];
$observacao = @$_POST['observacao'];
$cpf_cliente = $cpfAtualizar;



if($receptor == "" && $forma_pagamento == ""){
    echo "Preencha os dados.";
    header('location: carrinho.php');
} else{
    $result = mysqli_query($phpconnect, "select CPF_CLIENTE, OBSERVACAO, FORMA_PAGAMENTO, RECEPTOR, TAXA_ENTREGA from TB_PEDIDO; ");

    $tb_pedido =  mysqli_fetch_array($result);

    while($tb_pedido = mysqli_fetch_array($result, MYSQLI_ASSOC)){

        $inserir = mysqli_query($phpconnect, "insert into tb_pedido values(
            $cpf_cliente,
            $observacao,
            $forma_pagamento,
            $receptor,
            $taxa_entrega
        )");

    }
}


?>
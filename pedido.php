<?php
$receptor = @$_POST['receptor'];
$taxaEntrega = @$_POST['taxaEntrega'];
$cpf = @$_POST['cpf'];
$forma_pagamento = @$_POST['forma_pagamento'];
$troco = @$_POST['troco'];
$observacao = @$_POST['observacao'];

$rua = @$_POST['rua'];
$numero = @$_POST['numero'];
$bairro = @$_POST['bairro'];
$cidade = @$_POST['cidade'];
$cep = @$_POST['cep'];

$endereco = "$rua, $numero, $bairro, $cidade, $cep";


if ($receptor != "" && $taxaEntrega != "" && $cpf != "" && $forma_pagamento != "") {
  include("sql.php");

  $itens = mysqli_query($phpconnect, "select ITENS from tb_itens_carrinho where CPF_CLIENTE = '$cpf'");

  while( $itens_pedidos = mysqli_fetch_array($itens, MYSQLI_ASSOC)){

    $ITENSCLIENTE = $itens_pedidos['ITENS'];
    $itensPedidos = mysqli_query($phpconnect, "
    insert into tb_pedido (CPF_CLIENTE, ITENS_PEDIDO) values(
        '$cpf',
        '$ITENSCLIENTE'
      );");  

  };


  $sql = mysqli_query($phpconnect, "
  insert into tb_pedido (CPF_CLIENTE, OBSERVACAO, FORMA_PAGAMENTO, RECEPTOR, TAXA_ENTREGA, TROCO, ENDERECO) values(
      '$cpf',
      '$observacao',
      '$forma_pagamento',
      '$receptor',
      $taxaEntrega,
      '$troco',
      '$endereco'
    );");


  header('location: comidas.php');
}
;






?>
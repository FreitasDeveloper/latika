<?php
$cpf_cliente = @$_GET['cpf_cliente'];

if($cpf_cliente != ""){
    include("sql.php");
    $deletarPedido = mysqli_query($phpconnect, "delete from tb_pedido where CPF_CLIENTE = '$cpf_cliente';");
    $deletarStatus = mysqli_query($phpconnect, "delete from tb_statuspedido where CPF_CLIENTE = '$cpf_cliente';");
    header('location: comidas.php');
};
?>
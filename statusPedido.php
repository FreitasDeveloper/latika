<?php

$status = @$_POST['status'];
$cpf_cliente = @$_POST['cpf_cliente'];


if($status == "" && $cpf_cliente == ""){
    echo "nada";
} else {
    include ("sql.php");

    $sql = mysqli_query($phpconnect, "
               insert into tb_statuspedido (STATUS, CPF_CLIENTE) values(
                   '$status', 
                   '$cpf_cliente'
                 );
               ");


    
};

header('location: funcionario.php');


?>
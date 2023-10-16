<?php

$cpf = @$_GET['cpf'];

include("sql.php");

if ($cpf == "") {

    header('location: ../php/listaFun.php');

}else{

    $result = mysqli_query($phpconnect, "select * from tb_funcionario;");

    while ($tb_funcionario = mysqli_fetch_array($result)) {
        if ($cpf == $tb_funcionario[0]) {
            $sql = mysqli_query($phpconnect, "
            delete from tb_funcionario
            where CPF = '$cpf';
            ");

            header('location: ../php/listaFun.php');
        };
    };

};


?>
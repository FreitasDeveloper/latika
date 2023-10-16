<?php

$codigo = @$_GET['codigo'];

include("sql.php");

if ($codigo == "") {

    header('location: ../php/funcionario.php');

}else{

    $codigo = $_GET['codigo'];

    $result = mysqli_query($phpconnect, "select * from tb_produto;");

    while ($tb_produto = mysqli_fetch_array($result)) {
        if ($codigo == $tb_produto[0]) {
            $sql = mysqli_query($phpconnect, "
            delete from tb_produto
            where codigo = '$codigo';
            ");

            header('location: ../php/produtos.php');
        };
    };

};

?>
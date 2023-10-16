<?php

$rua = @$_POST['rua'];
$numero = @$_POST['numero'];
$bairro = @$_POST['bairro'];
$cidade = @$_POST['cidade'];
$cep = @$_POST['cep'];

include("sql.php");


if ($rua != "" && $numero != "" && $bairro != "" && $cidade != "" && $cep != "") {

    $inserir = mysqli_query($phpconnect, "insert into tb_endereco (RUA, CIDADE, NUMERO, BAIRRO, CEP)values(
        '$rua',
        '$cidade',
        $numero,
        '$bairro',
        '$cep'
        );");

    $result = mysqli_query($phpconnect, "select * from tb_taxa_entrega;");

    $ruaP = $rua;
    $numeroP = $numero;
    $bairroP = $bairro;
    $cidadeP = $cidade;
    $cepP = $cep;




}
;




?>
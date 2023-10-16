<?php
    
    $nome = @$_GET['nome'];
    $descricao = @$_GET['descricao'];
    $preco = @$_GET['preco'];
    $codigoCategoria = @$_GET['codigoCategoria'];
    
        include ("sql.php");

        if($nome == '' || $descricao == '' || $preco == '' || $codigoCategoria == ''){
            header('location: ../php/produtos.php');
        } else {
            $sql = mysqli_query($phpconnect, "
               insert into tb_produto (NOME,DESCRICAO,PRECO_VENDA, CODIGO_CATEGORIA) values(
                   '$nome',
                   '$descricao',
                   '$preco',
                   '$codigoCategoria'
                 );
               ");
               header('location: ../php/produtos.php');
        };





?>
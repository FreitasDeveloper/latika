<?php
$cpf_usuLogado = @$_GET['cpf_usuLogado'];
$codigo = @$_GET['codigo'];
$nome = @$_GET['nome'];
$descricao = @$_GET['descricao'];
$preco = @$_GET['preco'];

include ("sql.php");

if($codigo == '' && $nome == '' && $descricao == '' && $preco == '' && $cpf_usuLogado == ""){
    header('location: bebidas.php');
} else {
    $sql = mysqli_query($phpconnect, "
       insert into tb_itens_carrinho (COD_ITEM, ITENS, CPF_CLIENTE) values(
          '$codigo',
          '$nome, $descricao, $preco',
          '$cpf_usuLogado'
         );
       ");
       header('location: carrinho.php');
};


?>
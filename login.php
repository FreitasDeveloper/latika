<?php
session_start();
include ("sql.php");
if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['logar'])){
    $emailLogar = $_POST['email'];
    $senhaLogar = $_POST['senha'];
    
    $result = mysqli_query($phpconnect, "select * from tb_cliente where email='$emailLogar' and senha='$senhaLogar';");
    if(mysqli_num_rows($result) > 0){


        $tb_cliente = mysqli_fetch_array($result);

        $_SESSION['nome'] = $tb_cliente['NOME'];
        $_SESSION['cpf'] = $tb_cliente['CPF'];
        $_SESSION['email'] = $tb_cliente['EMAIL'];
        $_SESSION['telefone'] = $tb_cliente['TELEFONE'];
        
        $cpf_cliente = $_SESSION['cpf'];

        $deletar= mysqli_query($phpconnect, "delete from tb_itens_carrinho where CPF_CLIENTE = $cpf_cliente;");



        header ('location: ../php/comidas.php');
    }else{
        header ('location: ../html/index.html');
    };


};

?>
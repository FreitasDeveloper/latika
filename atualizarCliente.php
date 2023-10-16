<?php

session_start();

include ("sql.php");

if(isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['telefone']) && isset($_POST['email'])){
    $cpfAtualizar = $_POST['cpf'];
    $nomeAtualizar = $_POST['nome'];
    $telefoneAtualizar = $_POST['telefone'];
    $emailAtualizar = $_POST['email'];


    
    if($nomeAtualizar == '' || $telefoneAtualizar == '' || $emailAtualizar == '' || $cpfAtualizar == ''){
        header ('location: ../php/comidas.php');   
                         
    } else{


        $sql = mysqli_query($phpconnect, "
        update tb_cliente set nome = '$nomeAtualizar', 
        email = '$emailAtualizar',
        telefone = '$telefoneAtualizar'
        where CPF = '$cpfAtualizar'
        ");
        header ('location: ../html/index.html');
    };

};

?>
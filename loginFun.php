<?php
session_start();
include ("sql.php");
if(isset($_GET['email']) && isset($_GET['senha']) && isset($_GET['logar'])){
    $emailFun = $_GET['email'];
    $senhaFun = $_GET['senha'];

    $result = mysqli_query($phpconnect, "select * from tb_funcionario where email='$emailFun' and senha='$senhaFun';");

    if(mysqli_num_rows($result) > 0){
        $tb_funcionario = mysqli_fetch_array($result);


        header ('location: ../php/funcionario.php');
    }else{
        header ('location: ../php/comidasNlogados.php');
    };

};



?>
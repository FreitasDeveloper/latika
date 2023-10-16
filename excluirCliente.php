<?php

include ("sql.php");

if(isset($_POST['cpf']) && isset($_POST['excluirCliente'])){
    $cpfExcluir = $_POST['cpf'];

    $result = mysqli_query($phpconnect, "select * from tb_cliente;");

    while($tb_cliente = mysqli_fetch_array($result)){
        if($cpfExcluir == $tb_cliente[0]){
            $sql = mysqli_query($phpconnect, "
            delete from tb_cliente
            where cpf = '$cpfExcluir';
            ");

            header('location: ../html/index.html');
        };
    };

    
};


?>
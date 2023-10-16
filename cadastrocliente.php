<?php
    include ("sql.php");
     if(isset($_GET['nome']) && isset($_GET['telefone']) && isset($_GET['email']) && isset($_GET['senha'])  && isset($_GET['cpf'])){

        $cpf = $_GET['cpf'];
        $nome = $_GET['nome'];
        $telefone = $_GET['telefone'];
        $email = $_GET['email'];
        $senha = $_GET['senha'];

        $result = mysqli_query($phpconnect, "select * from tb_cliente;");

        $tb_cliente = mysqli_fetch_array($result);

        if($cpf != "" || $nome != "" || $telefone != "" || $email != "" || $senha != ""){

            session_start();
                   $_SESSION['nome'] = $tb_cliente['NOME'];
                   $_SESSION['cpf'] = $tb_cliente['CPF'];

                   $sql = mysqli_query($phpconnect, "
                   insert into tb_cliente values(
                       '$cpf',
                       '$nome',
                       '$telefone',
                       '$email',
                       '$senha'
                     );
                   ");
                  header ('location: ../html/index.html#');

        } else{
            header ('location: ../html/index.html');            
        };

    };
    
?>

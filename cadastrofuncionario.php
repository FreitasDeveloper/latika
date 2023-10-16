<?php
    include ("sql.php");

    if(isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['confirmar'])){
        $nomeFun = $_POST['nome'];
        $cpfFun = $_POST['cpf'];
        $telefoneFun = $_POST['telefone'];
        $emailFun = $_POST['email'];
        $senhaFun = $_POST['senha'];

        $result = mysqli_query($phpconnect, "select * from tb_funcionario;");
        
        while($tb_funcionario = mysqli_fetch_array($result)){
        
            if($nomeFun == '' || $telefoneFun == '' || $emailFun== '' || $senhaFun == '' || $cpfFun == ''){
                header ('location: ../php/funcionario.php');            
                
            } else{
                 $sql = mysqli_query($phpconnect, "
                 insert into tb_funcionario values(
                     '$cpfFun',
                     '$nomeFun',
                     '$telefoneFun',
                     '$emailFun',
                     '$senhaFun'
                   );
                 ");
                header ('location: ../php/listaFun.php');
            };
      };
    };
?>
<?php
     print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha']) ){

        include_once('../config.php');

        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];


        $sql = "SELECT * FROM usuarios WHERE username = '$usuario' and senha = '$senha' ";

        $result = $conexao ->query($sql);

    }else{
        header('Location: ../login.html');
    }
?>
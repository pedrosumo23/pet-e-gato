<?php
    session_start();
    include "conecta_mysql.php";

    if(isset($_SESSION["email"])){
        $email = $_SESSION["email"];
    }

    if(isset($_SESSION["senha"])){
        $senha = $_SESSION["senha"];
    }

    if(empty($email) or empty($senha)){
        header("Location: login-funcionario.php");
        exit;
    }

    else{
        $sql = "SELECT * FROM funcionario WHERE email = '$email';";
        $res = mysqli_query($mysqli, $sql);

        //testa se não encontrou o email no banco de dados 

        if(mysqli_num_rows($res) != 1){
            unset($_SESSION["email"]);
            unset($_SESSION["senha"]);
            header("Location: login-funcionario.php");
            exit;
        }

        else{
            $cliente = mysqli_fetch_array($res);
            // Testa se a senha está errada
            if ($senha != $cliente["senha"]){
                unset($_SESSION["email"]);
                unset($_SESSION["senha"]);
                header("Location: login-funcionario.php");
                exit;

            }
        }
        mysqli_close($mysqli);
    }
?>
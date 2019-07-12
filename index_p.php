<?php

session_start();
include_once("conexao.php");

 $_SESSION['email'] = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
 $_SESSION['senha'] = filter_input(INPUT_POST,'senha', FILTER_SANITIZE_STRING);

 $email = $_SESSION['email'];
 $senha = $_SESSION['senha'];
 
 $insert = "SELECT * FROM loginsenha WHERE loginsenha.login = '$email' and loginsenha.senha = '$senha'";
 $resultado = mysqli_query($conn,$insert);

while($row_usuario = mysqli_fetch_assoc($resultado)){
 
    if(($row_usuario['login'] == $_SESSION['email']) && ($row_usuario['senha'] == $_SESSION['senha'])){
        header("Location: index.php");
        $_SESSION['login'] = true;
    }
    else{
     header("Location: index.php");
     $_SESSION['login'] = false;
    }
};

     header("Location: index.php");

 ?>

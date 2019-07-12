<?php
session_start();
include_once("conexao.php");


function PegadoBanco($query,$conn){
 $resultado = mysqli_query($conn,$query);
 $row = mysqli_fetch_assoc($resultado);  
 return $row;     
}

 
 $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING);
 
 $endereco = filter_input(INPUT_POST,'endereco', FILTER_SANITIZE_STRING);

 $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);

 $telefone = filter_input(INPUT_POST,'telefone', FILTER_SANITIZE_STRING);

 $cidade = filter_input(INPUT_POST,'cidade', FILTER_SANITIZE_STRING);

$email2 = $_SESSION['email']; 
$senha = $_SESSION['senha'];

$selecionarID = "select id from loginsenha where login = '$email2' and senha = '$senha'" ;
   
 $row_id = PegadoBanco($selecionarID,$conn);
 
 $fk_id = $row_id['id'];

 $insert = "insert into empresa(nome,endereco,email,telefone,cidade,id_loginsenha_fk)values ('$nome','$endereco','$email','$telefone','$cidade',$fk_id) ";
 
 
 mysqli_query($conn,$insert);


if(mysqli_Insert_id($conn)){
	//$_SESSION['msg'] = "<span style='color:green'>Usuário Cadastrado com sucesso</span>";
	header("Location: cadastro_vaga_tecnologia.php");
}
else{
   // $_SESSION['msg'] = "<span style='color:red'>Usuário não foi Cadastrado com sucesso</span>";
	header("Location: cadastro_vaga.php");

}

 ?>

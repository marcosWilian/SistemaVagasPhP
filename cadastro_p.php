<?php


session_start();
include_once("conexao.php");

 
 
 $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING);
 
 $endereco = filter_input(INPUT_POST,'endereco', FILTER_SANITIZE_STRING);

 $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);

 $telefone = filter_input(INPUT_POST,'telefone', FILTER_SANITIZE_STRING);

 $cidade = filter_input(INPUT_POST,'cidade', FILTER_SANITIZE_STRING);



//id 	Nome 	Endereco 	Telefone 	Cidade

 $insert = "insert into candidato(nome,endereco,email,telefone,cidade)values ('$nome','$endereco','$email','$telefone','$cidade') ";
 
 
 mysqli_query($conn,$insert);




if(mysqli_Insert_id($conn)){
	//$_SESSION['msg'] = "<span style='color:green'>Usuário Cadastrado com sucesso</span>";
	header("Location: cadastrartecnologia.php");
}
else{
   // $_SESSION['msg'] = "<span style='color:red'>Usuário não foi Cadastrado com sucesso</span>";
	header("Location: cadastrar.php");

}

 ?>

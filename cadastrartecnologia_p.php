<?php

session_start();
include_once("conexao.php");


function PegadoBanco($query,$conn){
 $resultado = mysqli_query($conn,$query);
 $row = mysqli_fetch_assoc($resultado);  
 return $row;     
}

$email = $_SESSION['email'] ;
$senha = $_SESSION['senha'];


 $retorna_Id= "select cnd.id from candidato as cnd
inner join  loginsenha as lgns on cnd.id_loginsenha_fk = lgns.id
where lgns.login = '$email' and lgns.senha = '$senha'"; 
 
 $row_id = PegadoBanco($retorna_Id,$conn);
 $variavel = $row_id['id'];
 
 
 
 echo $variavel;
 
 
  
  
 
 $tecnologia = filter_input(INPUT_POST,'nome_tecnologia', FILTER_SANITIZE_STRING);
 $experiencia = filter_input(INPUT_POST,'experiencia', FILTER_SANITIZE_NUMBER_INT);
 $descricao = filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_STRING);
 


 
 
 $pegaIDLinguagem = "SELECT tecnologia.id FROM tecnologia where tecnologia.Nome_Linguagem = '$tecnologia'" ;
 $row_id_tecnologia = PegadoBanco($pegaIDLinguagem,$conn);
 $variavel_tecnologia = $row_id_tecnologia['id'];
 
 $insert = "insert into candidatos_tecnologias(anos,descricao,id_usuario_fk,id_tecnologia_fk)values ($experiencia,'$descricao',$variavel, $variavel_tecnologia) ";


 



if( mysqli_query($conn,$insert)){
	//$_SESSION['msg'] = "<span style='color:green'>Usuário Cadastrado com sucesso</span>";
	header("Location: cadastrartecnologia.php");

}
else{
  
  // $_SESSION['msg'] = "<span style='color:red'>Usuário não foi Cadastrado com sucesso</span>";
	header("Location: index.php");

}


 

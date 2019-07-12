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


$retorna_Id= "select emp.id from empresa as emp
inner join  loginsenha as lgns on emp.id_loginsenha_fk = lgns.id
where lgns.login = '$email' and lgns.senha = '$senha'"; 
 
 $row_id = PegadoBanco($retorna_Id,$conn);
 $variavel = $row_id['id'];
 
 $tecnologia = filter_input(INPUT_POST,'nome_tecnologia', FILTER_SANITIZE_STRING);
 $descricao = filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_STRING);

 $pegaIDLinguagem = "SELECT tecnologia.id FROM tecnologia where tecnologia.Nome_Linguagem = '$tecnologia'" ;
 $row_id_tecnologia = PegadoBanco($pegaIDLinguagem,$conn);
 $variavel_tecnologia = $row_id_tecnologia['id'];
 
echo $variavel_tecnologia;
 
 $insert = "insert into empresa_vagas(id_empresa_fk,id_tecnologia_fk,descricao)values ($variavel, $variavel_tecnologia,'$descricao') ";
 
if( mysqli_query($conn,$insert)){
	//$_SESSION['msg'] = "<span style='color:green'>Usuário Cadastrado com sucesso</span>";
        	header("Location: cadastro_vaga_tecnologia.php");
}
else{
   // $_SESSION['msg'] = "<span style='color:red'>Usuário não foi Cadastrado com sucesso</span>";
	header("Location: index.php");

}


 ?>

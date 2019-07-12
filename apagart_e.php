<?php
session_start();
include_once("conexao.php");
$id_tecno = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);


$email = $_SESSION['email'];
$senha = $_SESSION['senha'];

$query = "delete emp_v FROM empresa_vagas as emp_v
inner join tecnologia as tecn on (tecn.id = emp_v.id_tecnologia_fk)
inner join empresa as emp on (emp.id = emp_v.id_empresa_fk)
inner join loginsenha as lgn on (emp.id_loginsenha_fk = lgn.id)
where lgn.login = '$email' and lgn.senha = '$senha' and emp_v.id = $id_tecno";
    

if(mysqli_query($conn,$query)){
	//$_SESSION['msg'] = "<span style='color:green'>Usuário Cadastrado com sucesso</span>";
   header("Location: cadastro_vaga_tecnologia.php");

}
else{
  //  $_SESSION['msg'] = "<span style='color:red'>Usuário não foi Cadastrado com sucesso</span>";
	header("Location: index.php");

}

        
        
        













/*
if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset ($_SESSION['msg']);
	}
?>


*/
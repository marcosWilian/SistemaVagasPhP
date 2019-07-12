<?php
session_start();
include_once("conexao.php");
$id_tecno = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);


$email = $_SESSION['email'];
$senha = $_SESSION['senha'];

$query = "delete cnd_t FROM candidatos_tecnologias as cnd_t
inner join tecnologia as tecn on (tecn.id = cnd_t.id_tecnologia_fk)
inner join candidato as cnd on (cnd.id = cnd_t.id_usuario_fk)
inner join loginsenha as lgn on (cnd.id_loginsenha_fk = lgn.id)
where lgn.login = '$email' and lgn.senha = '$senha' and cnd_t.id = $id_tecno";
    

if(mysqli_query($conn,$query)){
	//$_SESSION['msg'] = "<span style='color:green'>Usuário Cadastrado com sucesso</span>";
   header("Location: cadastrartecnologia.php");

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
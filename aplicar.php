<?php
session_start();
include_once("conexao.php");
$id_vaga = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);


$result_usuario = "SELECT id FROM empresa_vagas WHERE id = '$id_vaga' LIMIT 1";
$resultado_usuario = mysqli_query($conn,$result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);


$email = $_SESSION['email'];
$senha = $_SESSION['senha'];

$query = "SELECT 
            cnd.id as id_candidato_fk,
            emp_v.id as id_vaga_fk,
            emp.id as id_empresa_fk
FROM candidatos_tecnologias as cnd_t
    inner join candidato as cnd on cnd.id = cnd_t.id_usuario_fk 
    inner join tecnologia as tcno on tcno.id = cnd_t.id_tecnologia_fk 
    inner join empresa_vagas as emp_v on emp_v.id_tecnologia_fk = tcno.id 
    inner join empresa as emp on emp.id = emp_v.id_empresa_fk
    inner join loginsenha as lgns on cnd.id_loginsenha_fk = lgns.id
    where lgns.login = '$email' and lgns.senha = '$senha'";

$statusresultado = mysqli_query($conn,$query);


$resultado = mysqli_fetch_assoc($statusresultado);
     
$id_usuario = $resultado['id_candidato_fk'];
$id_empresa = $resultado['id_empresa_fk'];
$id_vaga;
 

$insert = "insert into candidato_empresa(id_candidato_fk,id_empresa_fk,id_vaga_fk) values ('$id_usuario','$id_empresa','$id_vaga') ";
mysqli_query($conn,$insert);


if(mysqli_Insert_id($conn)){
	//$_SESSION['msg'] = "<span style='color:green'>Usuário Cadastrado com sucesso</span>";
	header("Location: buscarvagas.php");
}
else{
   // $_SESSION['msg'] = "<span style='color:red'>Usuário não foi Cadastrado com sucesso</span>";
	//header("Location: buscarvagas.php");


}













/*
if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset ($_SESSION['msg']);
	}
?>


*/
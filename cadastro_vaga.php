
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Cadastrar Empresa</title>
  </head>
<body background="bg.png">	
<?php
session_start();
include_once("conexao.php");

$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
     
$result_usuarios = "SELECT emp.nome as nome, emp.email as email FROM empresa as emp
inner join loginsenha as lgn_s on lgn_s.id = emp.id_loginsenha_fk
where lgn_s.login = '$email' and lgn_s.senha = '$senha'";



$resultado_usuarios = mysqli_query($conn,$result_usuarios);


$row_usuario = mysqli_fetch_assoc($resultado_usuarios);

        
        
        if($row_usuario['nome'] != null and $row_usuario['email'] != null){
	header("Location: cadastro_vaga_tecnologia.php");
 
        }
        
?>
    
       
    <br><br>   
  <div class="container">	
  <div class="jumbotron">
  <h1 class="display-5">Insira Suas Informações</h1>
  <p class="lead">Seus dados estão seguros, nós vamos repassar para terceiros.</p>
  <hr class="my-4">
<form method="POST" action="cadastro_vaga_p.php">

    
    

<label>Nome:</label><br> 
<input type="text" class="form-control" name="nome" placeholder="João">
<label>Endereço:</label><br> 
<input type="text" class="form-control" name="endereco" placeholder="Rua Brasil , 159">
<label>Telefone:</label><br> 
<input type="text" class="form-control" name="telefone" placeholder="(18) 35059800">
<label>Email:</label><br> 
<input type="text" class="form-control" name="email" placeholder="joao@joao.com">
<label>Cidade:</label><br> 
<input type="text" class="form-control" name="cidade" placeholder="Adamantina"><br><br>


<button type="submit" value="Cadastrar" class="btn btn-secondary btn-lg">Cadastrar Usuário</button>	


</div>  
</div>  
    
    
    
    
    
    
    




	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
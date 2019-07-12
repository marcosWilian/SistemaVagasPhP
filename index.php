<?php
    session_start();
    include_once("conexao.php");

$statuslogin = isset($_SESSION['login']) ? true : false;
// VERIFICA A TELA DE LOGIN

if($statuslogin == false){
    // ENTÂO CRIA A SEÇÂO PARA LOGIN
    $_SESSION['login'] = false;
}
?>
<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <!-- VIEW PORT UTILIZADO PARA RENDERIZAR DISPOSITIVOS MOVEIS -->
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Escolha sua técnologia e a sua familiaridade</title>
</head>

<body background="bg.png">



      
            
    <br><br>
          
  <div class="container">	
  <div class="jumbotron">
      <h1 class="display-5">Bem vindo ao busca Jobs! </h1> 
  <hr class="my-4">
   
    <?php
if($_SESSION['login'] == true){ 
      ?> 
  <a class="btn btn-primary btn-lg" href="cadastro_vaga.php" role="button">Cadastrar Vaga</a>
  <a class="btn btn-danger btn-lg" href="cadastro.php" role="button">Cadastrar Curriculo</a>
  
  
  <br><br><br>
  <a class="btn btn-danger btn-lg" href="logout.php" role="button">Sair</a>

   <?php
}
?>

  <br>
  
    <?php if($_SESSION['login'] == false){?>    

<form method="POST" action="index_p.php">
   
  <div class="form-group">
     <label>Nome Usuário</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label>Senha</label>
    <input type="password" class="form-control" name="senha" placeholder="Senha">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <?php } ?>
</div>  
</div>  
    
    

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
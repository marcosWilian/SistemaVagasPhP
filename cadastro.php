<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- VIEW PORT UTILIZADO PARA RENDERIZAR DISPOSITIVOS MOVEIS -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Cadastrar Usuário</title>
  </head>
  <body>
	
	
	
<form method="POST" action="cadastro_p.php">
<center><label>Nome:</label><br>
<input type="text" name="nome"><br>
<label>Email:</label><br>
<input type="email" name="email"><br>
<label>Endereço:</label><br>
<input type="text" name="endereco"><br>
<label>Telefone:</label><br>
<input type="text" name="telefone"><br>
<label>Cidade:</label><br>
<input type="text" name="cidade"><br><br>

<button type="submit" value="Cadastrar" class="btn btn-secondary btn-lg">Cadastrar Usuário</button>	
</center>




	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
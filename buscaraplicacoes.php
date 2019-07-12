<?php
    session_start();
    include_once("conexao.php");
    
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Escolha sua técnologia e a sua familiaridade</title>
</head>

<body background="bge.png">




      
            
        
<div class="container-fluid">	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="Index.php">Tela do Usuário</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="cadastro_vaga_tecnologia.php">Inserir Linguagens Conhecidas <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active" >
          <a class="nav-link" href="buscaraplicacoes.php">Mostrar Vagas Compativeis</a>
      </li>
    </ul>
     
  </div>
</nav>
</div>
                
        
        
<div class="container">	

        <div> <br>
        <div class="jumbotron">
  
            
     
<?php
 
$email = $_SESSION['email'] ;
$senha = $_SESSION['senha'];


$result_usuarios = "SELECT distinct c.Nome as nome, c.cidade as cidade, c.endereco as endereco, c.email as email,c.telefone as telefone, C.Telefone as telefone, t.Nome_Linguagem as linguagem, c_t.descricao as descricao FROM candidato_empresa as c_e
inner join empresa_vagas as e_v on e_v.id = c_e.id_vaga_fk
inner join candidato as c on c_e.id_candidato_fk = c.id
inner join tecnologia as t on t.id = e_v.id_tecnologia_fk
inner join candidatos_tecnologias as c_t on c_t.id_tecnologia_fk = t.id
inner join loginsenha as ls on ls.id = c.id_loginsenha_fk";


 
     $resultado_usuarios = mysqli_query($conn,$result_usuarios);


?>
 <div class="table-responsive-lg">        
 <table class="table" >
  <thead class="thead-light">    
     <tr>
      <th scope="col">Nome</th>
      <th scope="col">Telefone </th>
      <th scope="col">Descrição </th>
      <th scope="col">Linguagem </th>

            <th scope="row"> </th>

    </tr>
  </thead>

<?php
 while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
?>	
    <tbody>
    <tr class="thead-light ">
      <td><?php echo $row_usuario['nome']?></td>
      <td><?php echo $row_usuario['telefone']?></td>
      <td><?php echo $row_usuario['descricao']?></td>
      <td><?php echo $row_usuario['linguagem']?></td>

      
      
      
      <td> 
          
                <hr class="my-4">
      </td>
      <td>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
 Ver Curriculo
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Descreva a vaga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <label>Nome: <?php echo $row_usuario['nome']; ?></label><br> 
    <label>Telefone:<?php echo $row_usuario['telefone']; ?></label><br> 
    <label>Email:<?php echo $row_usuario['email']; ?></label><br> 
    <label>Cidade:<?php echo $row_usuario['cidade']; ?></label><br> 
    <label>Endereço:<?php echo $row_usuario['endereco']; ?></label><br> 
    <label>Descrição da Aplicação:<?php echo $row_usuario['descricao']; ?></label><br> 
    <label>Técnologia:<?php echo $row_usuario['linguagem']; ?></label><br> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>  
          
            
      </td>
    </tr>
  </tbody>
     
  
  
  
  
  
     
  <?php
    }

   
?>
  
  
  
  
  
  
  
  <?php
 $linha = 0;   
 while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
 $linha++;
?>	
    <tbody>
    <tr class="thead-light ">
      <th scope="row"><?php echo $linha?></th>
      <td><?php echo $row_usuario['nome']?></td>
      <td><?php echo $row_usuario['linguagem']?></td>
      <td><?php echo $row_usuario['descricao']?></td>

      <td> 
          
                <hr class="my-4">
      </td>
      <td>
        <a href="#" class="btn btn-success">Aplicar</a>
      </td>
    </tr>
  </tbody>
     
  
  
  
  
  
     
  <?php
    }

   
?>
    
 </table>   
    
 </div>

    
   
     </div> 
</div>  
</div>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
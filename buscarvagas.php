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

<body background="bg.png">




      
            
        
<div class="container-fluid">	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="Index.php">Tela do Usuário</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="cadastrartecnologia.php">Inserir Linguagens Conhecidas <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active" >
        <a class="nav-link" href="buscarvagas.php">Mostrar Vagas Compativeis</a>
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


$result_usuarios = "SELECT 
            emp_v.id as id,
            tcno.Nome_Linguagem as linguagem, 
            emp.Nome as nome,
            emp_v.descricao as descricao,
            emp.Telefone, 
            emp.Endereco,
            emp.Cidade,
            cnd.id as idcand
FROM candidatos_tecnologias as cnd_t
    inner join candidato as cnd on cnd.id = cnd_t.id_usuario_fk 
    inner join tecnologia as tcno on tcno.id = cnd_t.id_tecnologia_fk 
    inner join empresa_vagas as emp_v on emp_v.id_tecnologia_fk = tcno.id 
    inner join empresa as emp on emp.id = emp_v.id_empresa_fk
    inner join loginsenha as lgns on cnd.id_loginsenha_fk = lgns.id
    where lgns.login = '$email' and lgns.senha = '$senha'";


 

/*
 * 
 * 
 * 
 * 
 * 
 * 
 * usar esssa query depois
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */

     $resultado_usuarios = mysqli_query($conn,$result_usuarios);


?>
 <div class="table-responsive-lg">        
 <table class="table" >
  <thead class="thead-light">    
     <tr>
         <th scope="col"></th>
      <th scope="col">Nome da Empresa</th>
      <th scope="col">Requisitos </th>
      <th scope="col">Descrição </th>

            <th scope="row"> </th>

    </tr>
  </thead>

<?php
 while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
?>	
    <tbody>
    <tr class="thead-light ">
      <th scope="row"><?php echo $row_usuario['id'] ?></th>
      <td><?php echo $row_usuario['nome']?></td>
      <td><?php echo $row_usuario['linguagem']?></td>
      <td><?php echo $row_usuario['descricao']?></td>

      <td> 
          
                <hr class="my-4">
      </td>
      <td>
          
          <?php 
         $id_vaga =  $row_usuario['id'];
         $idcand = $row_usuario['idcand'];
        $query = "select * from candidato_empresa where id_vaga_fk = $id_vaga and id_candidato_fk = $idcand "; 
        $statusresultado = mysqli_query($conn,$query);
        $resultado = mysqli_fetch_assoc($statusresultado);
        $id_usuario = $resultado['id_candidato_fk'];
        $id_empresa = $resultado['id_empresa_fk'];







if($id_usuario != null and $id_empresa != null){
  
?>
<a href="apagar.php?id=<?php echo $row_usuario['id']?>" class="btn btn-danger">Remover Aplicação</a>
       
<?php
}else{
    ?>
<a href="aplicar.php?id=<?php echo $row_usuario['id']?>" class="btn btn-success">Aplicar</a>

<?php
}
?>
          
            
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
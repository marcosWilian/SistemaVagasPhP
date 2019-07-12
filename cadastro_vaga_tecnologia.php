<?php
    session_start();
    include_once("conexao.php");
?>
<!doctype html>
<html lang="pt-br">

<head>
        <meta name="viewport"  content="width=device-width initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Escolha a técnologia que sua empresa útiliza</title>
</head>
<body background="bge.png">
    
<div class="container-fluid">	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Tela de Cadastro da empresa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="cadastro_vaga_tecnologia.php">Cadastrar uma vaga <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item " >
        <a class="nav-link" href="buscaraplicacoes.php">Mostrar Aplicações</a>
      </li>
    </ul>
      
     
  </div>
</nav>
</div>
                
         
<div class="container">	
        <div> <br>
        <div class="jumbotron">
  
            
<?php
    $email= $_SESSION['email'] ;
    $senha = $_SESSION['senha'];

                $result_usuarios = "SELECT emp_v.id as id,
       tcno.Nome_Linguagem as linguagem, 
       emp.nome as nome,
       emp_v.descricao as descricao
                FROM 
                 empresa_vagas as emp_v
                inner join empresa as emp on emp.id = emp_v.id_empresa_fk 
                inner join tecnologia as tcno on tcno.id = emp_v.id_tecnologia_fk
                inner join loginsenha as lgn on lgn.id = emp.id_loginsenha_fk
                where lgn.login = '$email' and lgn.senha = '$senha'";

    $resultado_usuarios = mysqli_query($conn,$result_usuarios);
    
?>
 <div class="table-responsive-lg">        
 <table class="table" >
  <thead class="thead-light">    
     <tr>
         <th scope="col"></th>
      <th scope="col">Linguagem</th>
      <th scope="col">Nome da Empresa </th>
      <th scope="col">Descrição da Vaga </th>
      <th scope="col"> </th>

    </tr>
  </thead>

<?php
 $linha = 0;   
 while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
 $linha++;
?>	
    <tbody>
    <tr class="thead-light ">
      <th scope="row"><?php echo $linha?></th>
      <td><?php echo $row_usuario['linguagem']?></td>      
      <td><?php echo $row_usuario['nome']?></td>
      <td><?php echo $row_usuario['descricao']?></td>
      <td></td>
      <td>
                    
        <a href="apagart_e.php?id=<?php echo $row_usuario['id'] ?>" class="btn btn-outline-danger">Apagar</a>
      </td>
    </tr>
  </tbody>
     
     
  <?php
    }

?>
    
 </table>   
    
 </div>

    
            <form method="POST" action="cadastro_vaga_tecnologia_p.php">          
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">
  Adiconar uma vaga
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
    <label>Nome da Técnologia</label><br> 
    <select class="form-control" name="nome_tecnologia" type="text">
      <option>Java</option>
      <option>C</option>
      <option>C++</option>
      <option>Python</option>
      <option>C#</option>
      <option>JavaScript</option>
      <option>Visual Basic .NET</option>
      <option>R</option>
      <option>PHP</option>
      <option>MATHLAB</option>
      <option>Swift</option>
      <option>Objective-C</option>
      <option>Assembly</option>
      <option>Perl</option>
      <option>Ruby</option>
      <option>Delphi / Object Pascal</option>
      <option>Go</option>
      <option>Scratch</option>
      <option>PL/SQL</option>
      <option>Visual Basic</option>
    </select>
<label>Descrição:</label><br> 
<textarea type="text" class="form-control" name="descricao"  placeholder="Conhecimento Avançado, Orientação a objetos" ></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" value="Cadastrar" class="btn btn-primary ">Inserir Técnologia</button>	

      </div>
    </div>
  </div>
</div>  
</form>   
 
    
    
<form method="POST" action="buscaraplicacoes.php">
<Br>
<button type="submit" value="Cadastrar" class="btn btn-secondary btn-lg">Ver aplicações</button>	
</form>
    
    
    
     </div> 
</div>  
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
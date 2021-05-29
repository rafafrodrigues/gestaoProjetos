<?php
	session_start();
    require '../ProjetosModel/projeto-controller.php';         
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projetos Realizados</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="shortcut icon" href="iconic/png/spreadsheet-6x.png" type="image/png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="fontawesome/css/all.css"> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    
    <!--[if lt IE 9]>
       <script src="js/html5shiv.js"></script>
    <![endif]-->     
</head>
<body>			
    
   <section> <!-- início section -->  	  
	    <div class="container mt-1 mb-2">  <!-- início container -->          

	    	<div class="row">
		    	<div class="col-md-3 menu mb-2" class="collapse navbar-collapse" id="nav-menu-lateral">		<!-- início menu lateral -->	   
		    	   <h3 class="text-primary text-center bg-light p-2">
		    	       <i class="fas fa-tasks text-primary mr-3" style="font-size: 36px"></i>Projetos
		    	   </h3>
		    	   <ul class="list-group text-center" style="font-size: 17px" class="navbar-nav ml-auto">
		    	   	  <li class="list-group-item">
		    	   	  	<a href="cadastro-projeto.php" class="nav-link">Novo Projeto</a>
		    	   	  </li>		    	   	  
		    	   	  <li class="list-group-item">
		    	   	  	<a href="lista-projetos.php" class="nav-link">Lista Projetos</a>
		    	   	  </li>
	                  <li class="list-group-item">
	                  	<a href="index.php" class="nav-link">Pendentes</a>
	                  </li> 
	                  <li class="list-group-item">
	                  	<a href="em-andamento.php" class="nav-link">Em andamento</a>
	                  </li>
	                  <li class="list-group-item active">
	                  	<a href="realizados.php" class="nav-link">Realizados</a>
	                  </li>	                  	                 
		    	   </ul>
		    	</div>  <!-- /fim menu lateral -->
        
		   		<div class="col-md-9 col-sm-3 col-sm-12 bg-light">
		  			
		  			<div class="container table-responsive">
			  			  	<h2 class="display-4 text-info mt-3 mb-3">Projetos Realizados</h2>
			  			  	<table class="table table-bordered table-striped table-hover text-center table-secondary">
			  			  		<thead>
			  			  			<tr class="bg-info text-white">
			  			  				<th scope="">Nome</th>
			  			  				<th scope="col">Tarefas</th>
			  			  				<th scope="col">Colaborador</th>
			  			  				<th scope="col">Auxiliando</th>
			  			  				<th scope="col">Equipe</th>
			  			  				<th scope="col">Iniciado</th>
			  			  				<th scope="col">Finalizado</th>
			  			  			</tr>
			  			  		</thead>

			  			  		<?php
			  			  		$query_projetos_equipe = "select tb_projetos.nome, tb_projetos.tarefas, tb_projetos.colaborador, tb_projetos.auxiliando, tb_projetos.equipe, tb_projetos.criado, tb_projetos.modificado, st.status as st_status FROM tb_projetos inner join tb_status as st on st.id_status=tb_projetos.status_id 
						            order by tb_projetos.id desc";
			  			  		$result_proj = $conexao->prepare($query_projetos_equipe);
			  			  		$result_proj->execute();
			  			  		while ($row_proj = $result_proj->fetch(PDO::FETCH_ASSOC)) {
			  			  		extract($row_proj);
			  			  			if ($st_status == 'Realizado') {
			  			  				echo "<tr>";
			  			  				echo "<td>$nome</td>";
			  			  				echo "<td>$tarefas</td>";
			  			  				echo "<td>$colaborador</td>";
			  			  				echo "<td>$auxiliando</td>";
			  			  				echo "<td>$equipe</td>";
			  			  				echo "<td>".data($criado)."</td>";
			  			  				echo "<td>".data($modificado)."</td>";
			  			  				echo "</tr>";
			  			  			}										    
								}
								?> 
							</table>	
					</div>		
				</div>
	   		</div>		
	   	</div> <!-- /fim container -->  
    </section> <!-- /fim section -->     

    <script src="js/bootstrap.min.js"></script>		
    
  </body>
</html>
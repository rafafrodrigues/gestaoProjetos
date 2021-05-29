<?php		
   include_once('../ProjetosModel/session.php');
   require('../ProjetosModel/projeto-model.php'); 
    
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Projetos</title>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">
	    
	    <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="fontawesome/css/all.css"> 

        <!-- Iconic CSS -->
        <link href="iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">                  
        <!--[if lt IE 9]>
	       <script src="js/html5shiv.js"></script>
	    <![endif]-->
	</head>
	<body>
       <header>
       	  <nav class="navbar navbar-expand-sm navbar-light bg-primary mb-3"> <!-- início nav -->   	

       	  	 <div class="container" id="area-cabecalho">
       	  	 	<div class="navbar-brand">       	  	 		
       	  	 		<i class="far fa-address-card fa-lg display-3 text-white pt-3 pb-3" style="font-size: 56px"></i>    	  	 	
       	  	 	</div>   

       	  	 	<button class="navbar-toggler" data-toggle="collapse" data-target="#nav-menu-lateral">
                    <span class="navbar-toggler-icon"></span>
                </button>          	  	 	
       	  	 	
       	  	 	<div class="collapse navbar-collapse" id="nav-menu-lateral">
       	  	 		<div class="text-white" style="font-size: 20px;">
			    		<!-- código de saudação ao atendente -->
				    	<?php
						   date_default_timezone_set('America/Sao_Paulo');
						   $hora = date('H');
						   if ($hora >= 0 && $hora < 6) {
						    	echo "Boa madrugada!";
						    } elseif ($hora >= 6 && $hora < 12) {
						    	echo "Bom dia, " .$_SESSION['nome'] ."!";
						    } elseif ($hora >= 12 && $hora < 18) {
						    	echo "Boa tarde, " .$_SESSION['nome']."!";
						    } else {
						    	echo "Boa noite, " .$_SESSION['nome']."!";
						    }
						?>
	    	        </div>
	    	        <div class="collapse navbar-collapse" id="nav-menu-lateral">
		                <ul class="navbar-nav ml-auto">		
		                  <li>
		                  	<a href="index.php" class="mr-1 mt-1">Projetos</a>
		                  </li>                  
		                  <li class="nav-item">
		                  	<a href="lista-projetos.php" class="mr-1 mt-1">Lista Projetos</a>
		                  </li>
		                  <li class="nav-item">
		                    <a href="cadastro-projeto.php" class="mr-1 mt-1">Cadastrar</a>
		                  </li>                  
		                  <li class="nav-item">
		                    <a href="../ProjetosModel/logout.php" class="mt-1">Sair</a>
		                  </li>
		                </ul>
                   </div>
       	  	   </div>
       	  	 </div> 
       	  </nav> <!-- /fim nav -->	    
	    
       </header>   
	</body>
</html>
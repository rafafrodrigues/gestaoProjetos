<?php
   session_start();
   require '../ProjetosModel/conexao.php';    
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Projetos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
        
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="css/estilo.css">
	    
	    <!-- Fontawesome CSS -->
	    <link rel="stylesheet" href="fontawesome/css/all.css">
	    
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>   

       <style type="text/css">
       	 .container {
       	 	width: 450px;
       	 	height: 390px;
       	 	background-color: rgba(255,255,255,0.9);
       	 	-webkit-border-radius: 15px;
			-moz-border-radius: 15px;
			border-radius: 15px;
			padding: 4px 30px;
			margin: 0 auto;
			margin-top: 120px;
			text-align: center;
			background: linear-gradient(#9F81F7, white 90%); 
			box-shadow: 20px 20px 9px rgba(0, 0, 0, 0.6);
       	 }
       </style>    

       <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
       <![endif]-->  
	</head>
	<body style="background-color: #ccc">
       <div class="container"> <!-- início container -->

	        <div class="input-login"> 
	       	  <div class="mt-5">  <!-- início form -->	
	       	  	   <form method="post" action="../ProjetosModel/login.php">
		               <?php
		                  if(isset($_GET['error'])){
							  echo '
								  <div class="alert alert-danger" role="alert">
									<strong>Ops!</strong> '.$_GET['error'].'
								  </div>
							  ';
						    }
		               ?>
		               <h2 class="text-center text-white mb-4">Gestão Projetos</h2>            
		               <div class="form-group">
		               	 <input type="email" class="form-control" name="email" required="" placeholder="E-mail" autofocus="">
		               </div> 
		               <div class="form-group">
		               	 <input type="password" class="form-control" name="senha" required="" placeholder="Senha">
		               </div>
		               <div class="form-group">
		               	 <input type="submit" name="users" class="btn btn-outline-primary form-control mb-3" value="Logar">		               	 
		               </div>		         	   
		           </form>	<!-- /fim form -->
	          </div>  
	        </div>  
		</div> <!-- /fim container -->
	</body>
</html>
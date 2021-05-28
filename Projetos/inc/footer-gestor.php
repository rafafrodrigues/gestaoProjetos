<?php
   include_once('../AgendaModel/session.php');
   //require('../AgendaModel/login.php');  
   
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">
	        
	    <link rel="stylesheet" type="text/css" href="css2/estilo.css"> 

	    <style type="text/css">
	    	a[href="#top"]{
			   padding:12px;
			   position:fixed;
			   top: 90%;
			   right: 20px;
			   display:none;
			   font-size: 30px;
			}
			a[href="#top"]:hover{
			   text-decoration:none;
			} 
	    </style>

	    <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="fontawesome/css/all.css"> 

        <!-- Iconic CSS -->
        <link href="iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">      

        <script type="text/javascript">
             $(document).ready(function(){
                $(window).scroll(function(){
                  if ($(this).scrollTop() > 300) {
                    $('a[href="#top"]').fadeIn();
                  } else {
                    $('a[href="#top"]').fadeOut();
                  }
             });

             $('a[href="#top"]').click(function(){
                $('html, body').animate({scrollTop : 0},700);
                   return false;
                });
             });       
        </script>        

        <!--[if lt IE 9]>
	       <script src="js/html5shiv.js"></script>
	    <![endif]-->
	</head>
	<body>
       <header>
       	  <nav class="navbar navbar-expand-sm navbar-light bg-warning mt-2">       	  	

       	  	 <div class="container">       	  	 	      	  	 	
       	  	 	<div class="collapse navbar-collapse" id="nav-menu-lateral">
       	  	 		<div class="ml-2 text-white" style="font-size: 20px;">
			    		<!-- código de saudação ao atendente -->
				    	<?php
						   date_default_timezone_set('America/Sao_Paulo');
						   $hora = date('H'); /*
						   if ($hora >= 0 && $hora < 6) {
						    	echo "Boa madrugada, " . $_SESSION['nome_gestor'] ."!";
						    } elseif ($hora >= 6 && $hora < 12) {
						    	echo "Bom dia, " . $_SESSION['nome_gestor'] ."!";
						    } elseif ($hora >= 12 && $hora < 18) {
						    	echo "Boa tarde, " . $_SESSION['nome_gestor'] ."!";
						    } else {
						    	echo "Boa noite, " . $_SESSION['nome_gestor'] ."!";
						    } */

						    if (isset($_SESSION['id_login']) == 1) {
							   	if ($hora >= 0 && $hora < 6) {
							    	echo "Boa madrugada, " . $_SESSION['nome_gestor'] ."!";
								    } elseif ($hora >= 6 && $hora < 12) {
								    	echo "Bom dia, " . $_SESSION['nome_gestor'] ."!";
								    } elseif ($hora >= 12 && $hora < 18) {
								    	echo "Boa tarde, " . $_SESSION['nome_gestor'] ."!";
								    } else {
								    	echo "Boa noite, " . $_SESSION['nome_gestor'] ."!";
								}
						    } 
						?>
	    	        </div>
	    	        <div class="collapse navbar-collapse" id="nav-menu-lateral">
		                <ul class="navbar-nav ml-auto">		                                
		                  <li class="nav-item">
		                    <a href="../AgendaModel/logout.php" class="btn btn-outline-light ml-4">Sair</a>
		                  </li>		                  
		                </ul>		                
                    </div>
                    <a href="#top" class="ml-4">
                       <i class="fas fa-arrow-circle-up mt-2" style="font-size: 40px"></i>
                    </a>
       	  	   </div>
       	  	 </div>    
       	  	    	  	 
       	  </nav> 	
       	         	  	      
       </header>   
        
	</body>
</html>
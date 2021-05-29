<?php
   session_start(); 
   include_once('../ProjetosModel/projeto-controller.php');
   //require '../ProjetosModel/conexao.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Lista Projetos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
        
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="css/estilo.css">

	    <!-- Fontawesome CSS -->
	    <link rel="stylesheet" href="fontawesome/css/all.css">
	    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <!--[if lt IE 9]>
       <script src="js/html5shiv.js"></script>
      <![endif]-->  
	</head>
	<body>
       <?php  include_once('inc/header.php'); ?>

       <div class="container table-responsive">
       	 <h3 class="text-info mt-1 text-center bg-light mb-2 py-2">Projetos</h3>

       	 <table class="table table-striped table-bordered table-hover text-secondary text-center bg-light">
       	 	<thead>
       	 		<tr class="bg-info text-white">
       	 			<th>Nome</th>
       	 			<th>Tarefas</th>
       	 			<th>Colaborador</th>
       	 			<th>Auxiliando</th>
       	 			<th>Prazo</th>
       	 			<th>Equipe</th>     
       	 			<th>Status</th>
              <th>Editar</th>
              <th>Excluir</th>  	 			
       	 		</tr>
       	 	</thead>

       	 	<tbody>
       	 	  <?php
                $sql = "SELECT * FROM tb_projetos WHERE ativo = :ativo ORDER BY id ASC";
                $stm = $conexao->prepare($sql);
                $stm->bindValue('ativo', 1);
                $stm->execute();
                $count = $stm->rowCount();
                if ($count > 0) {
                   $fetchAll = $stm->fetchAll(PDO::FETCH_ASSOC);
                   foreach ($fetchAll as $result) {
                    $status_nome = get_status_por_id($conexao,$result['status_id']);
                   	 echo '
                   	    <tr class="btnDelete">
                   	      <td>'.$result['nome'].'</td>
                   	      <td>'.$result['tarefas'].'</td>
                   	      <td>'.$result['colaborador'].'</td>
                   	      <td>'.$result['auxiliando'].'</td>
                          <td>'.$result['prazo'].'</td>
                          <td>'.$result['equipe'].'</td>
                          <td>'.$status_nome.'</td>
                   	      <td class="">
                   	        <a href="projeto-visualiza.php?id='.$result['id'].'"><i class="fas fa-pencil-alt fa-1x text-warning"></i></a>
                   	      </td>
                   	      <td> 
                            <a href="#myModal" data-toggle="modal" data-target="#myModal'.$result["id"].'"><i class="fa fa-trash fa-1x text-danger" id="myBtn"></i></a>                                                    
                   	      </td>                                                  
                   	    </tr>  
                            <div class="modal fade" id="myModal'.$result["id"].'">
                                 <div class="modal-dialog">
                                    <div class="modal-content">                                            
                                      <div class="modal-header">
                                      <h4 class="modal-title text-primary">Excluir Projeto</h4>
                                      <button type="button" class="close text-danger" data-dismiss="modal">×</button>
                                    </div>

                                    <div class="modal-body text-primary">
                                      Deseja realmente excluir este Projeto?
                                    </div> 

                                    <div class="modal-footer">
                                      <a id="cancel" class="btn btn-default text-danger" data-dismiss="modal">N&atilde;o</a>
                                      <a id="confirm" class="btn btn-primary" href="projeto-deleta.php?id='.$result['id'].'">Sim</a>
                                    </div>
                                 </div>
                              </div>                                          
                   	 ';                      
                    }
                } else {
                   echo '
                     <tr class="even pointer">
                       <td class=" " colspan="8">NENHUM REGISTRO ENCONTRADO</td>
                     </tr>
                   '; 
                }    
       	 	  ?>
       	 	</tbody>
       	 </table>
       	
       </div>
       <script>
         $(document).ready(function(){
           $("#myBtn").click(function(){
             $("#myModal").modal();
           });
         });      

       </script>       
       
       <script src="js/bootstrap.min.js"></script>
       
	</body>
</html>
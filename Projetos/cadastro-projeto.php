<?php
  session_start();
  require '../ProjetosModel/projeto-controller.php';   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro Projetos</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
        
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="fontawesome/css/all.css">     

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

</head>
<body>

	<?php require_once 'inc/header.php'; ?>

	<section> <!-- início section cadastro -->
    <div class="container mt-3"> <!-- início container -->
      <div class="row"> <!-- início row -->
        <!-- início menu lateral -->
        <div class="col-md-3 menu mb-2" class="collapse navbar-collapse" id="nav-menu-lateral">        
               <h3 class="text-primary text-center bg-light p-2">
                   <i class="fas fa-tasks text-primary mr-3" style="font-size: 36px"></i>Projetos
               </h3>
               <ul class="list-group text-center" style="font-size: 17px" class="navbar-nav ml-auto">
                  <li class="list-group-item active">
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
                   <li class="list-group-item">
                    <a href="realizados.php" class="nav-link">Realizados</a>
                  </li>                                  
               </ul>
        </div> <!-- /fim menu lateral -->

        <div class="col-md-9 bg-light p-2 mb-2 text-primary">
              <h3 class="display-4 text-info p-2">Cadastrar Projeto</h3>
              <!-- início form -->
              <form method="post" action="projeto-controller.php" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?=isset($user['id'])?>" > 
               <div class="row">
                 <div class="form-group col-md-4">
                  <label>Nome</label>
                  <input type="text" name="nome" class="form-control" required="required">
                 </div>
                 <div class="form-group col-md-8">
                  <label>Tarefas</label>
                  <input type="text" name="tarefas" class="form-control" required="required">
                 </div>                  
                </div>

               <div class="row">
                 <div class="form-group col-md-4">
                   <label>Colaborador</label>
                   <input type="text" name="colaborador" class="form-control" required="required">
                 </div> 
                 <div class="form-group col-md-4">
                   <label>Colaborador Auxiliando</label>
                   <input type="text" name="auxiliando" class="form-control" required="">
                 </div>
                 <div class="form-group col-md-4">
                  <label>Prazo</label>
                  <input type="text" name="prazo" class="form-control" required="" title="Digite apenas números">
                 </div>
                </div>

                <div class="row">
                   <div class="form-group col-md-6">
                    <label>Equipe</label>
                    <input type="text" name="equipe" class="form-control" required="required">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Status</label>
                    <select class="form-control" id="id_status" name="id_status" required="required">
                      <option value="">Selecione...</option>
                      <?
                        $sqlC  = "SELECT * FROM tb_status WHERE ativo = :ativo ORDER BY id_status ASC"; ?>
                       <? $stmC = $conexao->prepare($sqlC); ?> 
                       <? $stmC->bindValue('ativo', 1); ?>
                       <? $stmC->execute(); ?>
                       <? $fetchAllC = $stmC->fetchAll(PDO::FETCH_ASSOC); ?>
                       <?  foreach($fetchAllC as $principal){
                          echo '<option value="'.$principal['id_status'].'">'. utf8_encode($principal['status']).'</option>';
                        }
                      ?>                     
                    </select>
                  </div>                  
                </div>                

                <div class="row">
                 <input type="hidden" name="users_id" id="users_id" value="<?= isset($_SESSION['id']) ?>" />
                 <button type="submit" name="cadastrar" id="cadastrar" class="btn btn-outline-primary mt-3 ml-3 mb-2 btn-md">Cadastrar</button>
                </div> 
              </form> <!-- /fim form -->
          </div>
      </div> <!-- /fim row -->
    </div> <!-- /fim container -->		
	</section> <!-- /fim section cadastro -->

	<script src="js/bootstrap.min.js"></script> 
   
</body>
</html>
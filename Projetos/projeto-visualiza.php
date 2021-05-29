<?php
  require '../ProjetosModel/projeto-controller.php';

  // pega o ID da URL
  $id = isset($_GET['id']) ? (int) $_GET['id'] : null;

  // valida o ID
  if(empty($id)) {
    echo "ID para alteração não definido";
    exit;
  }

  // busca os dados do projeto a ser editado  
  $sql = "SELECT nome, tarefas, colaborador, auxiliando, prazo, equipe, status_id FROM tb_projetos WHERE id = :id";
  $stmt = $conexao->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  // se o método fetch() não retornar um array, significa que o ID não corresponde a um projeto válido
  //var_dump($user);

  /*if ($user['id_status'] == 1) {
  	$st = 'Pendente';
  } elseif($user['id_status'] == 2) {
  	$st = 'Em andamento';
  } else {
  	$st = 'Realizado';
  }*/
  
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Editar Projetos</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>

      <?php include_once('inc/header.php'); ?>

      <?php
        if(!is_array($user)) { ?>
		   <p class="text-danger mt-5 d-flex justify-content-center" style="font-size: 25px;">Nenhum Projeto encontrado!</p>
		<? exit;
		} 
      ?>	

      <section>
      	<div class="container mt-3"> <!-- início container -->
      		<div class="row">
      			<!-- início menu lateral -->
        		<div class="col-md-3 menu mb-2" class="collapse navbar-collapse" id="nav-menu-lateral">        
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
		                   <li class="list-group-item">
		                    <a href="realizados.php" class="nav-link">Realizados</a>
		                  </li>                                  
		               </ul>
		        </div> <!-- /fim menu lateral -->

      			<div class="col-md-9 bg-light p-2 mb-2 text-primary">
	      			<h3 class="display-4 text-info p-2">Editar Projetos</h3>
	      			<!-- início form -->
	      			<form action="projeto-edita.php" method="post">
	      				<div class="row">
			                <div class="form-group col-md-4">
			               	 	<label>Nome</label>
			               	 	<input type="text" name="nome" id="nome" class="form-control" value="<?= $user['nome'] ?>">
			               	 </div>
			               	 <div class="form-group col-md-8">
			               	 	<label>Tarefas</label>
			               	 	<input type="text" name="tarefas" id="tarefas" class="form-control" value="<?= $user['tarefas'] ?>">
			               	 </div>               	 
			            </div>

			            <div class="row">
			               <div class="form-group col-md-4">
			                  <label>Colaborador</label>
			               	  <input type="text" name="colaborador" id="colaborador" class="form-control" value="<?= $user['colaborador'] ?>">
			               	</div> 
			               	<div class="form-group col-md-4">
			               	 	<label>Colaborador auxiliando</label>
			               	 	<input type="text" name="auxiliando" id="auxiliando" class="form-control" value="<?= $user['auxiliando'] ?>">
			               	</div>
			               	<div class="form-group col-md-4">
			               	 	<label>Prazo</label>
			               	 	<input type="text" name="prazo" id="prazo" class="form-control" value="<?= $user['prazo'] ?>">
			               	</div>
			            </div>      

			            <div class="row">
			                <div class="form-group col-md-6">
			               	 	<label>Equipe</label>
			               	 	<input type="text" name="equipe" id="equipe" class="form-control" value="<?= $user['equipe'] ?>">
			               	 </div>
			               	 <div class="form-group col-md-6">
			               	 	<label>Status</label>
			               	 	<select class="form-control" id="id_status" name="id_status" >
				                      <option value="<?php echo get_status_por_id($conexao, $user['status_id']);?>"><?php echo get_status_por_id($conexao, $user['status_id']); ?></option> 
				                      <?
				                        $sqlC  = "SELECT * FROM tb_status WHERE ativo = :ativo ORDER BY status ASC"; ?>
				                       <? $stmC = $conexao->prepare($sqlC); ?>                      
				                       <? $stmC->bindValue('ativo', 1); ?>
				                       <? $stmC->execute(); ?>
				                       <? $fetch = $stmC->fetchAll(PDO::FETCH_ASSOC); ?>
				                       <?  foreach($fetch as $status){	                       	   
											if($status['id_status'] == $user['status_id']){
										       $selected = 'selected';
									        }else{
										       $selected = '';
									        }
				                          echo '<option value="'.$status['id_status'].'" '.$selected.'>'. utf8_encode($status['status']).'</option>';
				                        }
				                      ?> 
				                  </select>
			               	 </div>               	 
			            </div>     		            

			            <div class="row">
			               <!-- ID do registro a ser editado é armazenado em um campo oculto (hidden), para que seja resgatado no projeto-edita.php, via POST. -->
	                       <input type="hidden" name="id" value="<?php echo $id ?>">	
	                       <input type="hidden" name="status_id" value="<?php echo $user['status_id']?>">
			               <button type="submit" name="alterar" id="alterar" class="btn btn-outline-primary mt-3 ml-3 mb-2 btn-md">Salvar</button>
			            </div>                    	            
			               
	      			</form> <!-- /fim form -->
	      		</div>	
      		</div>
      	</div> <!-- /fim container -->
      </section>      
	</body>
</html>
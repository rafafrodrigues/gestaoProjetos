<?php
   //contem as regras de negócio    
  include_once('inc/header.php'); 
  require '../ProjetosModel/conexao.php';
    
  if (isset($_POST['cadastrar'])) {
    // Recupera os dados dos campos
    $nome = $_POST['nome'];
    $tarefas = $_POST['tarefas'];
    $colaborador = $_POST['colaborador'];
    $auxiliando = $_POST['auxiliando'];
    $prazo = $_POST['prazo'];
    $equipe = $_POST['equipe'];
    $status_id = $_POST['id_status'];
    $users_id = $_SESSION['id'];
    $id = $_POST['id'];
        
    // Insere os dados no banco
    $query = "insert into tb_projetos (nome, tarefas, colaborador, auxiliando, prazo, equipe, status_id, users_id) values (:nome, :tarefas, :colaborador, :auxiliando, :prazo, :equipe, :status_id, :users_id)";
    $stmt = $conexao->prepare($query);  
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':tarefas', $tarefas);
    $stmt->bindValue(':colaborador', $colaborador);
    $stmt->bindValue(':auxiliando', $auxiliando);
    $stmt->bindValue(':prazo', $prazo);
    $stmt->bindValue(':equipe', $equipe);
    $stmt->bindValue(':status_id', $status_id);
    $stmt->bindValue(':users_id', $users_id);    
    $stmt->execute();    
        
    // Se os dados forem inseridos com sucesso               
    if ($stmt->rowCount()) { ?>
      <h5 class="bg-success pt-2 pb-2 mt-5 text-white d-flex justify-content-center">Projeto <?= $nome; ?> foi adicionado com sucesso!</h5>
    <? } else { ?>
      <p class="text-danger mt-4 d-flex justify-content-center">Projeto <?= $nome; ?> não foi adicionado! </p> 
    <? }        
    
  } 

  function get_status_por_id($conexao, $id) {
    # Monta a query a partir dos argumentos
    $query = "SELECT status FROM tb_status WHERE id_status=$id";

      # Executa a query
      $stm = $conexao->prepare($query);
      $stm->execute();
      $count = $stm->rowCount();
      $fetch = $stm->fetch(PDO::FETCH_ASSOC);
      if($count > 0){
        return $fetch['status'];
      }
      else{
        # Caso não exista esse id no banco, retorna uma string vazia.
        return "";
      }
  }

  function get_id_user($conexao, $id) {
    # Monta a query a partir dos argumentos
    $query = "SELECT id FROM users WHERE id=$id";

      # Executa a query
      $stm = $conexao->prepare($query);
      $stm->execute();
      $count = $stm->rowCount();
      $fetch = $stm->fetch(PDO::FETCH_ASSOC);
      if($count > 0){
        return $fetch['id'];
      }
      else{
        # Caso não exista esse id no banco, retorna uma string vazia.
        return "";
      }
  }

  //$data = implode("/", array_reverse(explode("-", $data)));
  function data($data) {
     return date("d/m/Y", strtotime($data)); 
  }
        
?>
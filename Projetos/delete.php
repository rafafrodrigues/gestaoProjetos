<?php
   //require '../ProjetosModel/conexao.php';
   require '../ProjetosModel/projeto-controller.php';
   require_once('inc/header.php');

   // pega o ID da URL
   $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
   
   // valida o ID
   if(empty($id)) {
      echo "ID para alteração não definido";
      exit;
   }  

   // remove do banco
   $sql = "DELETE FROM tb_projetos WHERE id = :id";
   $stmt = $conexao->prepare($sql);
   $stmt->bindParam(':id', $id, PDO::PARAM_INT);

   if ($stmt->execute()) { ?>
      <div class="bg-success pt-2 mt-4 mb-4 text-white d-flex justify-content-center">            
         <h5>Projeto removido com sucesso!</h5>                    
      </div>        
  <? } else {
     echo "Erro ao remover ";
     print_r($stmt->errorInfo());
   }  
?>
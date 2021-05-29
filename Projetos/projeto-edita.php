<?php
  require '../ProjetosModel/projeto-controller.php';
  include_once('inc/header.php');

  // resgata os valores do formulário
  $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
  $tarefas = isset($_POST['tarefas']) ? $_POST['tarefas'] : null;
  $colaborador = isset($_POST['colaborador']) ? $_POST['colaborador'] : null;
  $auxiliando = isset($_POST['auxiliando']) ? $_POST['auxiliando'] : null;
  $prazo = isset($_POST['prazo']) ? $_POST['prazo'] : null;
  $equipe = isset($_POST['equipe']) ? $_POST['equipe'] : null;
  $status_id = isset($_POST['id_status']) ? $_POST['id_status'] : null ;
  $id = isset($_POST['id']) ? $_POST['id'] : null;

  // atualiza o banco
  $sql = "UPDATE tb_projetos SET id = :id, nome = :nome, tarefas = :tarefas, colaborador = :colaborador, auxiliando = :auxiliando, prazo = :prazo, equipe = :equipe, status_id = :status_id WHERE id = :id";
  $stmt = $conexao->prepare($sql);
  $stmt->bindValue(':nome', $nome);
  $stmt->bindValue(':tarefas', $tarefas);
  $stmt->bindValue(':colaborador', $colaborador);
  $stmt->bindValue(':auxiliando', $auxiliando);
  $stmt->bindValue(':prazo', $prazo);
  $stmt->bindValue(':equipe', $equipe);
  $stmt->bindValue(':status_id', $status_id, PDO::PARAM_INT);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);

  if ($stmt->execute()) { ?>
    <div class="bg-success pt-2 mt-5 mb-4 text-white d-flex justify-content-center">
        <h5>Projeto <?php echo $nome; ?> atualizado com sucesso!</h5>
    </div>                      
  <? } else {
    echo "Erro ao alterar ";
    print_r($stmt->errorInfo());
  }  

?>
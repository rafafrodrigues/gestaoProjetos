<?php

  @session_start();
  //VERIFICA SE USUÁRIO ESTÁ LOGADO
  if (!isset($_SESSION['id'])) {
  	header('Location: ../Projetos/login.php');
  	exit();
  }
  
?>
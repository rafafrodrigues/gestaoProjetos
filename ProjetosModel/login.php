<?php 
   session_start();
   session_destroy();
   session_start();

   require 'conexao.php';

   if (isset($_POST['users'])) {
   	 //VERIFICA SE USUÁRIO EXISTE
   	 $sql = "SELECT * FROM users WHERE email = :email AND senha = :senha";
   	 $stm = $conexao->prepare($sql);
   	 $stm->bindValue(':email', $_POST['email']);
   	 $stm->bindValue(':senha', md5($_POST['senha']));
   	 $stm->execute();
   	 $count = $stm->rowCount();

   	 if ($count > 0) {
	   	 	$linha = $stm->fetch();
			//INICIA SESSÃO USUÁRIO
			$_SESSION['id'] = $linha['id'];
			//$_SESSION['adm'] = $linha['adm'];
			$_SESSION['nome'] = $linha['nome'];
			$_SESSION['email'] = $linha['email'];
			$_SESSION['senha'] = $linha['senha'];
			$_SESSION['id_users'] = $linha['id_users'];

			//REDIRECIONA PARA PÁGINA HOME
			if ($linha['email'] == $_SESSION['email']) {
				header("Location: ../Projetos/index.php");
			} else {
				session_destroy();
				header("Location: ../Projetos/login.php?error=Seus dados estão incorretos!");
			}
		} else {
			header("Location: ../Projetos/login.php?error=Seus dados estão incorretos!");
		    exit();
		}   	 
   } 
?>
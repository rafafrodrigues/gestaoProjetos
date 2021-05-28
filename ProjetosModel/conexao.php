<?php
  
  class Conexao {
      private $host = 'localhost';
      private $dbname = 'gestao_projetos';
      private $user = 'root';
      private $pass = '';      
      
      public function conectar() {
         
         try {
          
         	$conexao = new PDO(
         		    "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"                
         	);

         	return $conexao;
         } catch (PDOException $e) {
           echo '<p>' . $e->getMessage() . '<p>';
          /* die("<br />Nao foi possivel inserir registro: " . mysql_error()); */
         }  
             
      }
  }

   $host = "localhost";
   $dbname = "gestao_projetos";
   $user = "root";
   $pass = "";

   $conexao = new PDO('mysql:host='.$host.';dbname='.$dbname, 'root', ''); 
   //$conexao->close(); 
?>
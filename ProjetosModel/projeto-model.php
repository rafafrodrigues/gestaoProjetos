<?php
   class Projeto {
   	  public $id;
   	  private $nome;
   	  private $tarefas;
   	  private $colaborador;
   	  private $auxiliando;
   	  private $prazo;
   	  private $equipe;
   	  private $id_status;
   	  private $id_users;
   	  
   	  public function __get($atributo) {
   	  	 return $this->$atributo;
   	  }

   	  public function __set($atributo, $valor) {
   	  	 $this->$atributo = $valor;
   	  	 return $this;
   	  }
   }
?>
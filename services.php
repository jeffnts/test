<?php
    
    class Usuario {
        public $nome;
        public $email;
    }


    class Service{
        public function __construct(){
            include_once('config.php');

            $this->conexao = $conexao;
        }

        private function close(){
            mysqli_close($this->conexao);
        }

        public function criarUsuario($nome, $email, $senha){
            $query = "INSERT INTO usuarios (nome, email, senha) VALUES('$nome', '$email', '$senha')";
    
            mysqli_query( $this->conexao, $query);
        } 
        
        public function listarUsuarios(){
            $query= "SELECT * FROM usuarios;";

            $resultado =  mysqli_query( $this->conexao, $query);

            $usuarios = array();
            $count = 0;
           
            while($usuario = mysqli_fetch_array($resultado)){
               $usuarios[$count] = new Usuario();

               $usuarios[$count]->nome = $usuario['nome'];
               $usuarios[$count]->email = $usuario['email'];

               $count++;
            }

            return $usuarios;
        }
    }
   
?>
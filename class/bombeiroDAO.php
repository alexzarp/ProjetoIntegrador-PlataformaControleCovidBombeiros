<?php

    require_once "conexao.php";
    require_once "bombeiro.php";

    class BombeiroDAO {

        public $conexao;

        public function __construct() {
            $this->conexao = Conexao::conecta();
        }

        public function listarBombeiro () {
            try {
                $query = $this->conexao->prepare("select * from tabela");//fictício
                $query->execute();
                return $regitros = $query->fetchAll(PDO::FETCH_CLASS, "Militar");
            }
            catch (PDOException $e) {
                echo "Erro no acesso aos dados: ".$e->getMessage();
            }
        }

        public function login($email, $senha){
            try{
                $query = $this->conexao->prepare("SELECT email, senha FROM bombeiro WHERE email = :email");
                $query->bindParam(":email", $email);
                $query->execute();
                $registro = $query->fetchAll(PDO::FETCH_CLASS, "Bombeiro");
                // verificacao do e-mail / senha     
                if($query->rowCount() == 1){ // email informado existe no BD
                    if(!password_verify($senha, $registro[0]->getSenha())){
                        return false; // senha incorreta
                    }
                    else{ // email e senha estão corretos
                        return $registro[0];
                    }
                }       
                else{
                    return false; // nao encontrou email
                }     
            }
            catch(PDOException $e){
                echo "Erro no acesso aos dados: ". $e->getMessage();
            }
        } 
        
    }

?>
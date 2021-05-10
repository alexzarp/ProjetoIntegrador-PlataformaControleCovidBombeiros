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
                $registro = $query->fetchAll();
                echo $senha;
                if($query->rowCount() == 1){
                    if ($senha == $registro[0]['senha']){
                        return true;
                    }
                    else{
                        return false;
                    }
                }       
                else{
                    return false;
                }     
            }
            catch(PDOException $e){
                echo "Erro no acesso aos dados: ". $e->getMessage();
            }
        } 
        
    }

?>
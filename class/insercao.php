<?php

    require_once "conexao.php";
    // require_once "bombeiroDAO.php";

    class Insere {

        public $conexao;

        public function __construct() {
            $this->conexao = Conexao::conecta();
        }

        public function insereDataIniSintomas ($dataInicioSint) {
            try {
                $query = $this->conexao->prepare("INSERT INTO pretestagem(dt_ini_sint) VALUES (:dataInicioSint)");
                $query->bindParam(":dataInicioSint", $dataInicioSint);
                $query->execute();
            } catch (PDOException $e){
                echo "Erro na insercão data do inicio dos sintomas: ". $e->getMessage();
            }
        }
    }

?>
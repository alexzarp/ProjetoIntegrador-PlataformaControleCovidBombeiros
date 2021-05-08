<?php

    require_once "conexao.php";
    require_once "militar.php";

    class MilitarDAO {

        public $conexao;

        public function __construct() {
            $this->conexao = Conexao::conecta();
        }

        public function listarMilitar () {
            try {
                $query = $this->conexao->prepare("select * from tabela");//fictício
                $query->execute();
                return $regitros = $query->fetchAll(PDO::FETCH_CLASS, "Militar");
            }
            catch (PDOException $e) {
                echo "Erro no acesso aos dados: ".$e->getMessage();
            }
        }

    }

?>
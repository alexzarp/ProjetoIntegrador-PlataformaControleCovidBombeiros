<?php

    require_once "conexao.php";
    require_once "bombeiroDAO.php";

    class VacinaDAO {

        public $conexao;

        public function __construct() {
            $this->conexao = Conexao::conecta();
        }

        public function listaVacina () {
            try {
                $query = $this->conexao->prepare("SELECT nome_vac FROM vacina");
                $query->execute();
                $registro = $query->fetchAll();

                return $registro;
            } catch (PDOException $e){
                echo "Erro no acesso aos dados de vacina: ". $e->getMessage();
            }
        }
    }

?>
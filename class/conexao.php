<?php

    class Conexao {

        public static $conexao;

        public static function conecta () {
            if (!isset(self::$conexao)){
                try {
                    self::$conexao = new PDO("mysql:host=localhost; dbname=covid_bombeiros;", "adm_bombeiro", "123456");
                }
                catch (PDOException $e) {
                    echo "Erro de conexão com o banco: ".$e->getMessage();
                    die();
                }
            }
            return self::$conexao;
        }
    }

?>
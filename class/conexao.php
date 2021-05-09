<?php
    class Conexao {

        public static $conexao;

        public static function conecta () {
            if (!isset(self::$conexao)){
                try {
                    self::$conexao = new PDO("mysql:host=localhost; dbname=covidbombeiro;", "root", "");
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
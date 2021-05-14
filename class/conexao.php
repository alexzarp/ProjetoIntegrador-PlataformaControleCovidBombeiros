<?php
    class Conexao {

        public static $conexao;

        // public static function conecta () {
        //     if (!isset(self::$conexao)){
        //         try {
        //             self::$conexao = new PDO("mysql:host=localhost; dbname=covidbombeiros;", "root", "");
        //         }
        //         catch (PDOException $e) {
        //             echo "Erro de conexão com o banco: ".$e->getMessage();
        //             die();
        //         }
        //     }
        //     return self::$conexao;
        // }

        public static function conecta () {
            if (!isset(self::$conexao)){
                try {
                    self::$conexao = new PDO("mysql:host=sql210.epizy.com; dbname=epiz_28607163_covidbombeiros;", "epiz_28607163", "jlFE9J9zJP7trA");
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
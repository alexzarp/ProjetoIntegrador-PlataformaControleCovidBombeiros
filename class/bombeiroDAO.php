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
                $query = $this->conexao->prepare("SELECT email, senha, adm FROM bombeiro WHERE email = :email");
                $query->bindParam(":email", $email);
                $query->execute();
                $registro = $query->fetchAll();
                // echo $senha;
                if($query->rowCount() == 1){
                    if ($senha == $registro[0]['senha']){
                        return $registro[0];
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
        

        public function cadastroBombeiro($nome, $matricula, $email, $senha, $re_senha) {
            try {
                $adm = 0;
                if ($senha === $re_senha){
                    $query = $this->conexao->prepare("INSERT INTO bombeiro (matricula, email, senha, nome, adm) VALUES (
                        :matricula,
                        :email,
                        :senha,
                        :nome,
                        :adm
                    )");
                    $query->bindParam(":nome", $nome);
                    $query->bindParam(":matricula", $matricula);
                    $query->bindParam(":email", $email);
                    $query->bindParam(":senha", $senha);
                    $query->bindParam(":adm", $adm);
                    $query->execute();
                } else {
                    echo "<strong>Senhas não convergem!</strong>";
                    // return false;
                }

            } catch (PDOException $e){
                echo 'Erro na inserção de novo usuário: '.$e->getMessage();
            }
        }
    }

?>
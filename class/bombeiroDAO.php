<?php

    require_once "conexao.php";
    require_once "bombeiro.php";

    class BombeiroDAO {

        public $conexao;

        public function __construct() {
            $this->conexao = Conexao::conecta();
        }
        // try {
        //     $query = $this->conexao->prepare("SELECT nome_vac FROM vacina");
        //     $query->execute();
        //     $registro = $query->fetchAll();

        //     return $registro;
        // } catch (PDOException $e){
        //     echo "Erro no acesso aos dados de vacina: ". $e->getMessage();
        // }
        public function listarBombeiro () {
            try {
                $query = $this->conexao->prepare('SELECT nome, matricula FROM bombeiro');
                $query->execute();
                $registros = $query->fetchAll();
                return $registros;
            }
            catch (PDOException $e) {
                echo "Erro no acesso aos dados de nome: ".$e->getMessage();
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
        

        public function cadastroBombeiro($nome, $matricula, $email, $senha, $re_senha, $adm) {
            try {
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

        public function insereDataIniSintomas ($dataInicioSint) {
            try {
                $query = $this->conexao->prepare("INSERT INTO pretestagem(dt_ini_sint) VALUES (:dataInicioSint)");
                $query->bindParam(":dataInicioSint", $dataInicioSint);
                $query->execute();
            } catch (PDOException $e){
                echo "Erro na insercão data do inicio dos sintomas: ". $e->getMessage();
            }
        }

        // public function cadastroTestagem($data,$sintomas,$vacina,$tipo){
            
        // }
    }

?>
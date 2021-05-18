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
                    echo "<strong id='inserido'>Cadastro feito com sucesso!</strong>";
                } else {
                    echo "<strong id='erro'>Senhas não convergem!</strong>";
                }

            } catch (PDOException $e){
                echo 'Erro na inserção de novo usuário: '.$e->getMessage();
            }
        }

        public function listarVacina () {
            try {
                $query = $this->conexao->prepare("SELECT nome_vac, id_vacina FROM vacina");
                $query->execute();
                $registro = $query->fetchAll();

                return $registro;
            } catch (PDOException $e){
                echo "Erro no acesso aos dados de vacina: ". $e->getMessage();
            }
        }

        public function cadastroPretestagem($dt_inicio_sint, $descr, $faixa_etaria, $matricula, $id_vacina, $data_primeira, $data_segunda){
            try {
                $query = $this->conexao->prepare('INSERT INTO pretestagem(dt_ini_sint, descr, faixa_etaria, matricula, id_vacina, data_primeira, data_segunda) VALUES (
                    :dt_inicio_sint,
                    :descr,
                    :faixa_etaria,
                    :matricula,
                    :id_vacina,
                    :data_primeira,
                    :data_segunda
                )');
                $query->bindParam(":dt_inicio_sint", $dt_inicio_sint);
                $query->bindParam(":descr", $descr);
                $query->bindParam(":faixa_etaria", $faixa_etaria);
                $query->bindParam(":matricula", $matricula);
                $query->bindParam(":id_vacina", $id_vacina);
                $query->bindParam(":data_primeira", $data_primeira);
                $query->bindParam(":data_segunda", $data_segunda);
                $query->execute();
                echo "<strong id='inserido'>Cadastro feito com sucesso!</strong>";
            } catch (PDOException $e) {
                echo 'Erro de insersão da pré-testagem: '.$e->getMessage();
            }
        }

        public function listarBombeiroJoinPretestagem () {
            try {
                $query = $this->conexao->prepare('SELECT n.nome, m.matricula');
                $query->execute();
                $registros = $query->fetchAll();
                return $registros;
            }
            catch (PDOException $e) {
                echo "Erro no acesso aos dados de nome: ".$e->getMessage();
            }
        }

        public function cadastroSegundaAvaliacao ($matricula, $id) {

        }

        // public function removeNomes ($string) {
        //     $remover = array(
        //         'A'=>'','B'=>'','B'=>'','C'=>'','D'=>'','E'=>'','F'=>'','G'=>'','H'=>'','I'=>'','J'=>'','K'=>'','L'=>'','M'=>'',
        //         'N'=>'','O'=>'','P'=>'','Q'=>'','R'=>'','S'=>'','T'=>'','U'=>'','V'=>'','X'=>'','Y'=>'','Z'=>'','W'=>'','a'=>'',
        //         'b'=>'','c'=>'','d'=>'','e'=>'','f'=>'','g'=>'','h'=>'','i'=>'','j'=>'','k'=>'','l'=>'','m'=>'','n'=>'','o'=>'',
        //         'p'=>'','q'=>'','r'=>'','s'=>'','t'=>'','u'=>'','v'=>'','x'=>'','z'=>'','y'=>'','w'=>'',' '=>'', '-'=>'', 'Á'=>'',
        //         'Á'=>'', 'á'=>'', 'Ç'=>'', 'ç'=>'', 'Â'=>'', 'â'=>'', 'õ'=>'', 'Õ'=>'', 'Ã'=>'', 'ã'=>'', 'ê'=>'', 'Ê'=>''
        //     );
        //     $nova_string = strtr($string, $remover);
        //     return $nova_string;
        // }
    }

?>
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
        // }s
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

        public function listarVacina () {
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

        public function cadastroPretestagem($dt_inicio_sint, $descr, $faixa_etaria, $matricula, $vacina, $dt_primeira, $dt_segunda){
            try {
                if ($vacina){
                    $query = $this->conexao->prepare('INSERT INTO pretestagem(dt_ini_sint, descr, faixa_etaria, matricula, vacinado_vacina) VALUES (
                        :dt_inicio_sint,
                        :descr,
                        :faixa_etaria,
                        :matricula
                        :vacina
                    )');
                    $query->bindParam(":dt_inicio_sint", $dt_inicio_sint);
                    $query->bindParam(":descr", $descr);
                    $query->bindParam(":faixa_etaria", $faixa_etaria);
                    $query->bindParam(":matricula", $matricula);
                    $query->bindParam(":vacina", $vacina);

                    if ($dt_segunda){
                        $query = $this->conexao->prepare('INSERT INTO vacinado(nome_vacina, data_primeira, data_segunda) VALUES (:vacina, :dt_primeira, dt_degunda)');
                        $query->bindParam(":dt_primeira", $dt_primeira);
                        $query->bindParam(":dt_segunda", $dt_segunda);
                    } else {
                        $query = $this->conexao->prepare('INSERT INTO vacinado(nome_vacina, data_primeira) VALUES (:vacina, :dt_primeira)');
                        $query->bindParam(":dt_primeira", $dt_primeira);
                    }
                    $query->execute();
                }
                else{
                    $query = $this->conexao->prepare('INSERT INTO pretestagem(dt_ini_sint, descr, faixa_etaria, matricula) VALUES (
                                                                              :dt_inicio_sint,
                                                                              :descr,
                                                                              :faixa_etaria,
                                                                              :matricula
                    )');
                    $query->bindParam(":dt_inicio_sint", $dt_inicio_sint);
                    $query->bindParam(":descr", $descr);
                    $query->bindParam(":faixa_etaria", $faixa_etaria);
                    $query->bindParam(":matricula", $matricula);
                    $query->execute();
                }
            } catch (PDOException $e) {
                echo 'Erro de insersão da pré-testagem: '.$e->getMessage();
            }

            function removeNomes ($string) {
                $remover = array(
                    'A'=>'','B'=>'','B'=>'','C'=>'','D'=>'','E'=>'','F'=>'','G'=>'','H'=>'','I'=>'','J'=>'','K'=>'','L'=>'','M'=>'',
                    'N'=>'','O'=>'','P'=>'','Q'=>'','R'=>'','S'=>'','T'=>'','U'=>'','V'=>'','X'=>'','Y'=>'','Z'=>'','W'=>'','a'=>'',
                    'b'=>'','c'=>'','d'=>'','e'=>'','f'=>'','g'=>'','h'=>'','i'=>'','j'=>'','k'=>'','l'=>'','m'=>'','n'=>'','o'=>'',
                    'p'=>'','q'=>'','r'=>'','s'=>'','t'=>'','u'=>'','v'=>'','x'=>'','z'=>'','y'=>'','w'=>'',' '=>'', '-'=>'', 'Á'=>'',
                    'Á'=>'', 'á'=>'', 'Ç'=>'', 'ç'=>'', 'Â'=>'', 'â'=>'', 'õ'=>'', 'Õ'=>'', 'Ã'=>'', 'ã'=>'', 'ê'=>'', 'Ê'=>''
                );
                $nova_string = strtr($string, $remover);
                return $nova_string;
            }
        }
    }

?>
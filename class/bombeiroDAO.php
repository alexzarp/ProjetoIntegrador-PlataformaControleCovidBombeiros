<?php

    require_once "conexao.php";
    require_once "bombeiro.php";
    include "admin/email.php";

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
                $query = $this->conexao->prepare('SELECT DISTINCT b.nome, b.matricula FROM bombeiro b JOIN pretestagem p ON b.matricula = p.matricula;');
                $query->execute();
                $registros = $query->fetchAll();
                return $registros;
            }
            catch (PDOException $e) {
                echo "Erro no acesso aos dados de nome: ".$e->getMessage();
            }
        }
        public function cadastroDoResultadoDaTestagem ($tipo_teste, $dt_teste, $result_teste, $matricula) {
            try {
                $query = $this->conexao->prepare('UPDATE pretestagem SET
                                                 tipo_teste = :tipo_teste,
                                                 dt_teste = :dt_teste,
                                                 result_teste = :result_teste
                                                 WHERE pretestagem.matricula = :matricula;');
                $query->bindParam(":tipo_teste", $tipo_teste);
                $query->bindParam(":dt_teste", $dt_teste);
                $query->bindParam(":result_teste", $result_teste);
                $query->bindParam(":matricula", $matricula);
                $query->execute();
                echo "<strong id='inserido'>Cadastro feito com sucesso!</strong>";
                // echo $matricula;

                try {
                    $query = $this->conexao->prepare('SELECT nome, email FROM bombeiro WHERE :matricula = matricula');
                    $query->bindParam(":matricula", $matricula);
                    $query->execute();
                    $registros = $query->fetchAll();

                    $textoPositivo = ("
                        <html>
                            <head>
                                <style>           
                                </style>
                            </head>
                            
                            <body>
                                {$registros[0]["nome"]}
                                <img src='https://upload.wikimedia.org/wikipedia/commons/0/09/Logotipo_de_marca_do_Corpo_de_Bombeiros_Militar_de_Santa_Catarina.png'>
                                <h2>Email enviado automaticamente pelo sistema de controle de casos do covid do 6° BBM de Chapecó.</h2>
                                <h3>Informamos que seu teste deu: <b>POSITIVO</b></h3>
                                <h3>Em caso de dúvidas entre em contato com os resposáveis pelo telefone
                                (49)2049-7661.</h3> 
                                <p>Não responder esse email</p>
                            </body>
                            <footer>
                                <p>Sistema desenvolvido por Alex Sandro e Bruna Gabriela.</p><br>
                                <p>6° BBM - Chapecó - SC.</p>
                            </footer>
                        </html>
                        
                        ");
                    
                    $textoNegativo = ("
                        <html>
                            <head>
                                <style>  
                                </style>
                            </head>
                                
                            <body>
                                {$registros[0]["nome"]}
                                <img src='https://upload.wikimedia.org/wikipedia/commons/0/09/Logotipo_de_marca_do_Corpo_de_Bombeiros_Militar_de_Santa_Catarina.png'>
                                <h2>Email enviado automaticamente pelo sistema de controle de casos do covid do 6° BBM de Chapecó.</h2>
                                <h3>Informamos que seu teste deu: <b>NEGATIVO.</b></h3>
                                <h3>Em caso de dúvidas entre em contato com os resposáveis pelo telefone
                                (49)2049-7661.</h3> 
                                <p>Não responder esse email</p>
                                <footer>
                                    <p>Sistema desenvolvido por Alex Sandro e Bruna Gabriela.</p><br>
                                    <p>6° BBM - Chapecó - SC.</p>
                                </footer>
                            </body>
                        </html>
                    
                    ");
                    $assunto = "Resultado teste covid-19 - Corpo de Bombeiros Militar de Santa Catarina.";                    

                    if ($result_teste == 0) {
                        enviarEmail($registros[0]['email'], $assunto, $textoNegativo, 'Essa mensagem não é visível, entre em contato com o adm');
                    } else {
                        enviarEmail($registros[0]['email'], $assunto, $textoPositivo, 'Essa mensagem não é visível, entre em contato com o adm');
                    }
                }
                catch (PDOException $e){
                    echo "Erro ao enviar email para ".$matricula.": ".$e->getMessage();
                }
            }
            catch (PDOException $e) {
                echo "Erro no acesso aos dados de nome: ".$e->getMessage();
            }
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
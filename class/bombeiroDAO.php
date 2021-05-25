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
                $query = $this->conexao->prepare('SELECT DISTINCT b.nome, b.matricula, p.id FROM bombeiro b JOIN pretestagem p
                                                  ON b.matricula = p.matricula');
                                                //    WHERE p.dt_ini_sint BETWEEN ":hoje" AND ":antes"
                // $query->bindParam(":hoje", converteBarras(date('Y/m/d')));
                // $query->bindParam(":antes", converteBarras(date("Y/m/d",strtotime(date("Y-m-d")."-2 week"))));
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

                try {
                    $query = $this->conexao->prepare('SELECT nome, email FROM bombeiro WHERE :matricula = matricula');
                    $query->bindParam(":matricula", $matricula);
                    $query->execute();
                    $registros = $query->fetchAll();
                    
                    if ($result_teste == 0) {
                        $texto = 'NEGATIVO';
                        $classe = 'verde';
                    } else {
                        $texto = 'POSITIVO';
                        $classe = 'vermelho';
                    }
                    $textoHTML = ("
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset='utf-8'>
                        <meta name='author' content='Alex Sandro Zarpelon, Bruna Gabriela Disner'>
                        <meta name='description' content='Plataforma de controle Covid-19'>
                        <meta name='keywords' content='Bombeiros, SC, controle Covid-19, Bombeiros Chapecó'>
                        <style>
                            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
                            * {
                                padding: 0;
                                border: 0;
                                margin: 0;
                                font-family: 'Roboto', sans-serif;
                            }
                            header {
                                background-color: red;
                                padding: 1%;
                                display: flex;
                                justify-content: space-between;
                            }
                            main {
                                background-color: #BABAB5;
                                padding: 1%;
                            }
                            #logo {
                                width: 10%;
                                height: 10%;
                            }
                            #superior {
                                color: white;
                                padding-top: 3.4%;
                                padding-bottom: 3.4%;
                                padding-left: 3.4%;
                            }
                            .verde {
                                color: green;
                            }
                            .vermelho {
                                color: red;
                            }
                            footer {
                                background-color: gray;
                                padding: 1%;
                            }
                            a {
                                text-decoration: none;
                            }
                            a:link, a:visited {
                                color: blue;
                                font-weight: bold;
                            }
                            .git {
                                width: 1%;
                            }
                            #nome {
                                font-weight: 900;
                            }
                        </style>
                    </head>
                    <body>
                        <header>
                            <img id='logo' src='https://upload.wikimedia.org/wikipedia/commons/0/09/Logotipo_de_marca_do_Corpo_de_Bombeiros_Militar_de_Santa_Catarina.png' alt='Imagem bombeiros'>
                            <h1 id='superior'>Sistema de controle da Covid - 19</h1>
                        </header>
                        <main>
                            <h2>Email enviado automaticamente pelo sistema de controle de casos do covid do 6° BBM de Chapecó.</h2><br>
                            <h3>Sr. {$registros[0]['nome']}, informamos que seu teste deu: <strong class='{$classe}'>{$texto}</strong>.</h3> <br>
                            <h3>Em caso de dúvidas entre em contato com os resposáveis pelo telefone
                            (49)2049-7661.</h3>
                            <p>Não responder esse email</p>
                        </main>
                    
                        <footer> 
                            <p>Sistema desenvolvido por 
                            
                            <a href='https://github.com/alexzarp'>
                            <img class='git' src='http://pngimg.com/uploads/github/github_PNG40.png'
                            alt='Logo GitHub'>Alex Sandro</a>
                            e
                            <a href='https://github.com/Brunadisner'>
                            <img class='git' src='http://pngimg.com/uploads/github/github_PNG40.png'
                            alt='Logo GitHub'>Bruna Gabriela</a>.</p><br>
                    
                            <p>6° BBM - Chapecó - SC.</p>
                        </footer>
                    </body>
                    </html>
                    ");
                    $assunto = "Resultado teste covid-19 - Corpo de Bombeiros Militar de Santa Catarina.";                    
                    enviarEmail($registros[0]['email'], $assunto, $textoHTML, 'Essa mensagem não é visível, entre em contato com o adm');
                }
                catch (PDOException $e){
                    echo "Erro ao enviar email para ".$matricula.": ".$e->getMessage();
                }
            }
            catch (PDOException $e) {
                echo "Erro no acesso aos dados de nome: ".$e->getMessage();
            }
        }

        public function cadastroSegundaAvaliacao ($fk_id_pretestagem, $dt_teste, $dt_prevista, $comentario, $dt_real, $dt_nova, $retorno) {
            try {
                $query = $this->conexao->prepare('INSERT INTO avalia_retorno(fk_id_pretestagem, dt_teste, dt_prevista, dt_real, dt_nova, comentario) VALUES
                                                             (:fk_id_pretestagem, :dt_teste, :dt_prevista, :dt_real, :dt_nova, :comentario)');
                $query->bindParam(":fk_id_pretestagem", $fk_id_pretestagem);
                $query->bindParam(":dt_prevista", $dt_prevista);
                $query->bindParam(":comentario", $comentario);
                $query->bindParam(":dt_teste", $dt_teste);
                $query->bindParam(":dt_real", $dt_real);
                $query->bindParam(":dt_nova", $dt_nova);
                $query->execute();
                echo "<strong id='inserido'>Cadastro feito com sucesso!</strong>";
                try {
                    $query = $this->conexao->prepare('SELECT DISTINCT b.nome, b.email, a.dt_prevista, a.comentario FROM
                                                      bombeiro b JOIN pretestagem p ON p.matricula = b.matricula JOIN
                                                      avalia_retorno a ON p.id = a.fk_id_pretestagem
                                                      WHERE a.comentario = :comentario AND a.fk_id_pretestagem = :fk_id_pretestagem;');
                    $query->bindParam(":comentario", $comentario);
                    $query->bindParam(":fk_id_pretestagem", $fk_id_pretestagem);
                    $query->execute();
                    $registros = $query->fetchAll();
                    if ($retorno == 1) {
                        $texto = 'APROVADO';
                        $classe = 'verde';
                    } else {
                        $texto = 'REPROVADO';
                        $classe = 'vermelho';
                    }   
                    $titulo = 'Informe sobre a Segunda testagem';
                    $mensagemHTML = ("
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset='utf-8'>
                        <meta name='author' content='Alex Sandro Zarpelon, Bruna Gabriela Disner'>
                        <meta name='description' content='Plataforma de controle Covid-19'>
                        <meta name='keywords' content='Bombeiros, SC, controle Covid-19, Bombeiros Chapecó'>
                        <style>
                            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
                            * {
                                padding: 0;
                                border: 0;
                                margin: 0;
                                font-family: 'Roboto', sans-serif;
                            }
                            header {
                                background-color: red;
                                padding: 1%;
                                display: flex;
                                justify-content: space-between;
                            }
                            main {
                                background-color: #BABAB5;
                                padding: 1%;
                            }
                            #logo {
                                width: 10%;
                                height: 10%;
                            }
                            #superior {
                                color: white;
                                padding-top: 3.4%;
                                padding-bottom: 3.4%;
                                padding-left: 3.4%;
                            }
                            .verde {
                                color: green;
                            }
                            .vermelho {
                                color: red;
                            }
                            footer {
                                background-color: gray;
                                padding: 1%;
                            }
                            a {
                                text-decoration: none;
                            }
                            a:link, a:visited {
                                color: blue;
                                font-weight: bold;
                            }
                            .git {
                                width: 1%;
                            }
                            #nome {
                                font-weight: 900;
                            }
                        </style>
                    </head>
                    <body>
                        <header>
                            <img id='logo' src='https://upload.wikimedia.org/wikipedia/commons/0/09/Logotipo_de_marca_do_Corpo_de_Bombeiros_Militar_de_Santa_Catarina.png' alt='Imagem bombeiros'>
                            <h1 id='superior'>Sistema de controle da Covid - 19</h1>
                        </header>
                        <main>
                            <h2>Email enviado automaticamente pelo sistema de controle de casos do covid do 6° BBM de Chapecó.</h2><br>
                            <h3>Sr. {$registros[0]['nome']}, informamos que seu retorno foi <strong class='{$classe}'>{$texto}</strong>.</h3>
                            <h3><strong>Comentários sobre o caso: </strong>{$registros[0]['comentario']}</h3>
                            <h3><strong>Data para o retorno: </strong>{$registros[0]['dt_prevista']}</h3><br>
                            <h3>Em caso de dúvidas entre em contato com os resposáveis pelo telefone
                            (49)2049-7661.</h3>
                            <p>Não responder esse email</p>
                        </main>

                        <footer> 
                            <p>Sistema desenvolvido por 
                            
                            <a href='https://github.com/alexzarp'>
                            <img class='git' src='http://pngimg.com/uploads/github/github_PNG40.png'
                            alt='Logo GitHub'>Alex Sandro</a>
                            e
                            <a href='https://github.com/Brunadisner'>
                            <img class='git' src='http://pngimg.com/uploads/github/github_PNG40.png'
                            alt='Logo GitHub'>Bruna Gabriela</a>.</p><br>

                            <p>6° BBM - Chapecó - SC.</p>
                        </footer>
                    </body>
                    </html>
                    ");
                    enviarEmail($registros[0]['email'], $titulo, $mensagemHTML, 'O local em que você está lendo este E-mail tem problemas com a tecnologia HTML, entre em contato com os responsáveis pelo resultado.');
                } catch (PDOException $e) {
                    echo "<strong id='erro'>Algo de errado ocorreu ao enviar o e-mail</strong>".$e->getMessage();
                }
            } catch (PDOException $e) {
                echo 'Erro na inserssão de Segunda Avaliação: '.$e->getMessage();
            }
        }
    }

    function converteBarras ($string) {
        $remover = array(
            '/'=>'-', '\\'=>'-'
        );
        $nova_string = strtr($string, $remover);
        return $nova_string;
    }

?>
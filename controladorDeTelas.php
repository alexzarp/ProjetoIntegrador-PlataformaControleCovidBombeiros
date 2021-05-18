<?php 
require_once ('class/bombeiroDAO.php');
require_once ('admin/email.php');

$b = new BombeiroDAO();
session_start();

if (!isset($_SESSION['login'])){
    if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['acesso'])) {
        $login = $b->login($_POST['email'], md5($_POST['senha']));
        if ($login) {
            $_SESSION['login'] = true;
            if ($login['adm'] == 1) {
                $_SESSION['adm'] = true;
            }
            header('Location: controladorDeTelas.php');
        } else {
            header("Location: index.php?acao=recusado");
        }
    } elseif (isset($_GET['acao']) && $_GET['acao'] == 'cadastro_bombeiro') {
        $_SESSION['titulo'] = 'Cadastro do Bombeiro';
        $_SESSION['caminhoCSS'] = 'assets/CSS/cadastroBombeiro.css';
        $_SESSION['caminhoDeFundo'] = 'view/cadastroBombeiro.php';
        include ("view/layout/fundo.php");

        $_SESSION['adm'] = false;
        if (isset($_POST['email']) && isset($_POST['matricula']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['re_senha'])) {
            $b->cadastroBombeiro( $_POST['nome'], $_POST['matricula'], $_POST['email'], md5($_POST['senha']), md5($_POST['re_senha']), $_SESSION['adm']);
            echo "<strong id='inserido'>Cadastro feito com sucesso!</strong>";
        }
        unset($_SESSION['adm']);
    }// elseif () {} 
    else {
        header("Location: index.php?acao=recusado");
    }
} 
elseif (isset($_SESSION['adm']) && !isset($_GET['acao']) || (isset($_GET['acao']) && $_GET['acao'] == 'adm_painel')){
    $_SESSION['titulo'] = 'Página do Administrador';
    $_SESSION['caminhoCSS'] = 'assets/CSS/painelAdministrativo.css';
    $_SESSION['caminhoDeFundo'] = 'view/painelAdministrativo.php';
    include ("view/layout/fundo.php");
}
elseif (!isset($_SESSION['adm']) && !isset($_GET['acao']) || (isset($_GET['acao']) && $_GET['acao'] == 'tela_usuario')){
    $_SESSION['titulo'] = 'Página do Usuário';
    $_SESSION['caminhoCSS'] = 'assets/CSS/painelAdministrativo.css';//tá funcionando, mas se precisar alterações
    // específicas nessa tela, deve usar o telaUsuario.css
    $_SESSION['caminhoDeFundo'] = 'view/telaUsuario.php';
    include ("view/layout/fundo.php");
}
else {
    switch($_GET['acao']) {
// verificar se a seção é adm
        case 'cadastro_bombeiro':
            $_SESSION['titulo'] = 'Cadastro do Bombeiro';
            $_SESSION['caminhoCSS'] = 'assets/CSS/cadastroBombeiro.css';
            $_SESSION['caminhoDeFundo'] = 'view/cadastroBombeiro.php';
            include ("view/layout/fundo.php");
            if (isset($_SESSION['adm'])){
                if (isset($_POST['email']) && isset($_POST['matricula']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['re_senha'])) {
                    $b->cadastroBombeiro( $_POST['nome'], $_POST['matricula'], $_POST['email'], md5($_POST['senha']), md5($_POST['re_senha']), $_SESSION['adm']);                }
            } else {
                $_SESSION['adm'] = false;
                if (isset($_POST['email']) && isset($_POST['matricula']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['re_senha'])) {
                    $b->cadastroBombeiro( $_POST['nome'], $_POST['matricula'], $_POST['email'], md5($_POST['senha']), md5($_POST['re_senha']), $_SESSION['adm']);
                }
                unset($_SESSION['adm']);
            }
        break;

        case 'acompanhamento':
            $_SESSION['titulo'] = 'Acompanhamento';
            $_SESSION['caminhoCSS'] = 'assets/CSS/acompanhamento.css';
            $_SESSION['caminhoDeFundo'] = 'view/acompanhamento.php';
            include ("view/layout/fundo.php");
        break;

        case 'cadastro_segunda_avaliacao':
            $_SESSION['titulo'] = 'Segunda avaliação';
            $_SESSION['caminhoCSS'] = 'assets/CSS/cadastroSegundaAvaliacao.css';
            $_SESSION['caminhoDeFundo'] = 'view/cadastroSegundaAvaliacao.php';
            include ("view/layout/fundo.php");

            if(isset($_POST['submete_seg'])){
                
            }
        break;

        case 'pretestagem':
            $_SESSION['titulo'] = 'Pré testagem';
            $_SESSION['caminhoCSS'] = 'assets/CSS/pretestagem.css';
            $_SESSION['caminhoDeFundo'] = 'view/pretestagem.php';
            include ("view/layout/fundo.php");

            if (isset($_POST['submete_pre'])){
                if (!isset($_POST['vacina']) || $_POST['vacina'] == 'n'){
                    $_POST['vacina'] = NULL;
                    $_POST['datap'] = NULL;
                    $_POST['datas'] = NULL;
                }   
                $b->cadastroPretestagem($_POST['data'], $_POST['sintomas'],$_POST['idade'],$_POST['bombeiro'],$_POST['vacina'],$_POST['datap'],$_POST['datas']);
            }
        break;

        case 'resultado':
            $_SESSION['titulo'] = 'Resultados';
            $_SESSION['caminhoCSS'] = 'assets/CSS/resultado.css';
            $_SESSION['caminhoDeFundo'] = 'view/resultado.php';
            include ("view/layout/fundo.php");
        break;

        case 're_senha':
            $_SESSION['titulo'] = 'Recuperação de senha';
            $_SESSION['caminhoCSS'] = 'assets/CSS/recuperaSenha.css';
            $_SESSION['caminhoDeFundo'] = 'view/recuperaSenha.php';
            include ('view/layout/fundo.php');
        break;

        case 'registro_sintomas':
            $_SESSION['titulo'] = 'Registro de sintomas';
            $_SESSION['caminhoCSS'] = 'assets/CSS/registroSintomas.css';
            $_SESSION['caminhoDeFundo'] = 'view/registroSintomas.php';
            include ('view/layout/fundo.php');
        break;

        case 'destroy':
            session_destroy();
            header('Location: index.php');
        break;

        default:
            session_destroy();
            header('Location: index.php');
        break;
    }
}

?>
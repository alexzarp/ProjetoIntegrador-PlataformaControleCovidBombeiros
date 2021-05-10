<?php 
include ('class/bombeiroDAO.php');
$b = new BombeiroDAO();

session_start();

if (!isset($_SESSION['login'])){
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $login = $b->login($_POST['email'], md5($_POST['senha']));
        if ($login == true) {
            $_SESSION['login'] = $login;
            header('Location: controladorDeTelas.php');
        } else {
            header("Location: index.php?acao=recusado");
        }
    } else {
        header("Location: index.php?acao=recusado");
    }
} 
elseif (!isset($_GET['acao']) or $_GET['acao'] == 'adm_painel'){
    $_SESSION['titulo'] = 'Página do Administrador';
    $_SESSION['caminhoCSS'] = 'assets/CSS/painelAdministrativo.css';
    $_SESSION['caminhoDeFundo'] = 'view/painelAdministrativo.php';
    include ("view/layout/fundo.php");
}
else {
    switch($_GET['acao']) {

        case 'cadastro_bombeiro':
            $_SESSION['titulo'] = 'Cadastro do Bombeiro';
            $_SESSION['caminhoCSS'] = 'assets/CSS/cadastroBombeiro.css';
            $_SESSION['caminhoDeFundo'] = 'view/cadastroBombeiro.php';
            include ("view/layout/fundo.php");

            if (isset($_POST['email']) && isset($_POST['matricula']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['re_senha'])) {
                $b->cadastroBombeiro( $_POST['nome'], $_POST['matricula'], $_POST['email'], md5($_POST['senha']), md5($_POST['re_senha']));
                echo "<strong id='inserido'>Cadastro feito com sucesso!</strong>";
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
        break;

        case 'pretestagem':
            $_SESSION['titulo'] = 'Pré testagem';
            $_SESSION['caminhoCSS'] = 'assets/CSS/pretestagem.css';
            $_SESSION['caminhoDeFundo'] = 'view/pretestagem.php';
            include ("view/layout/fundo.php");
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
    }
}

?>
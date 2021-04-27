<?php 
// include_once
session_start();
if (!isset($_GET['acao'])){
    $titulo = 'Página do Administrador';
    $_SESSION['titulo'] = $titulo;
    $caminhoCSS = 'assets/CSS/painelAdministrativo.css';
    $_SESSION['caminhoCSS'] = $caminhoCSS;
    $caminhoDeFundo = 'view/painelAdministrativo.php';
    $_SESSION['caminhoDeFundo'] = $caminhoDeFundo;
    include ("view/layout/fundo.php");
}
else {
    switch($_GET['acao']) {

        case 'cadastro_bombeiro':
            $titulo = 'Cadastro do Bombeiro';
            $_SESSION['titulo'] = $titulo;
            $caminhoCSS = 'assets/CSS/cadastroBombeiro.php';
            $_SESSION['caminhoCSS'] = $caminhoCSS;
            $caminhoDeFundo = 'view/cadastroBombeiro.php';
            $_SESSION['caminhoDeFundo'] = $caminhoDeFundo;
            include ("view/layout/fundo.php");
        break;

        case 'acompanhamento':
            $titulo = 'Acompanhamento';
            $_SESSION['titulo'] = $titulo;
            $caminhoCSS = 'assets/CSS/acompanhamento.css';
            $_SESSION['caminhoCSS'] = $caminhoCSS;
            $caminhoDeFundo = 'acompanhamento.php';
            $_SESSION['caminhoDeFundo'] = $caminhoDeFundo;
            include ("view/layout/fundo.php");
        break;

        case 'cadastro_segunda_avaliacao':
            $titulo = 'Segunda avaliação';
            $_SESSION['titulo'] = $titulo;
            $caminhoCSS = 'assets/CSS/cadastroSegundaAvaliacao.css';
            $_SESSION['caminhoCSS'] = $caminhoCSS;
            $caminhoDeFundo = 'cadastroSegundaAvaliacao.php';
            $_SESSION['caminhoDeFundo'] = $caminhoDeFundo;
            include ("view/layout/fundo.php");
        break;

        case 'pretestagem':
            $titulo = 'Pré testagem';
            $_SESSION['titulo'] = $titulo;
            $caminhoCSS = 'assets/CSS/pretestagem.css';
            $_SESSION['caminhoCSS'] = $caminhoCSS;
            $caminhoDeFundo = 'pretestagem.php';
            $_SESSION['caminhoDeFundo'] = $caminhoDeFundo;
            include ("view/layout/fundo.php");
        break;

        case 'resultado':
            $titulo = 'Resultados';
            $_SESSION['titulo'] = $titulo;
            $caminhoCSS = 'assets/CSS/resultado.css';
            $_SESSION['caminhoCSS'] = $caminhoCSS;
            $caminhoDeFundo = 'resultado.php';
            $_SESSION['caminhoDeFundo'] = $caminhoDeFundo;
            include ("view/layout/fundo.php");
        break;
    }
}

?>
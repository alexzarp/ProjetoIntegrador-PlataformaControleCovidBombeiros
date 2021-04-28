<!DOCTYPE html>
<html lang="pt=br">
    <?php 
        // session_start();
        $titulo = $_SESSION['titulo'];
        $caminhoCSS = $_SESSION['caminhoCSS'];
        $caminhoDeFundo = $_SESSION['caminhoDeFundo'];
    ?>
    <head>
        <title><?= $titulo ?></title>
        <meta charset="utf-8">
        <meta name="author" content="Alex Sandro Zarpelon, Bruna Gabriela Disner">
        <meta name="description" content="Plataforma de controle Covid-19">
        <meta name="keywords" content="Bombeiros, SC, controle Covid-19, Bombeiros Chapecó">
        <link rel="shorcut icon" href="assets/images/Logotipo_de_marca_do_Corpo_de_Bombeiros_Militar_de_Santa_Catarina.png">
        <link rel="stylesheet" href="assets/CSS/geral.css">
        <link rel="stylesheet" href="<?= $caminhoCSS ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    </head>

    <body>
        <main>
            <a href="controladorDeTelas.php?acao=adm_painel">
                <img id="logo" title="<< Volta ao painel administrativo" src="assets/images/Logotipo_de_marca_do_Corpo_de_Bombeiros_Militar_de_Santa_Catarina.png" alt="Logo BOmbeiros SC">
            </a>
            
            <div id="div_central">
                <?php 
                    include_once($caminhoDeFundo);
                ?>
            </div>

            <!--Este espaço ficará vazio na em modo coluna 15 70 15-->
        </main>
    </body>
    <script src="assets/JS/function.js"></script>
</html>
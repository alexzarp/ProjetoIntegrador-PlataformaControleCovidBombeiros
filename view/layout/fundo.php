<!DOCTYPE html>
<html lang="pt=br">
    <head>
        <!-- <title><?php $titulo?></title> Precisa ser dinâmico-->
        <meta charset="utf-8">
        <meta name="author" content="Alex Sandro Zarpelon, Bruna Gabriela Disner">
        <meta name="description" content="Plataforma de controle Covid-19">
        <meta name="keywords" content="Bombeiros, SC, controle Covid-19, Bombeiros Chapecó">
        <link rel="shorcut icon" href="../../assets/images/Logotipo_de_marca_do_Corpo_de_Bombeiros_Militar_de_Santa_Catarina.png">
        <link rel="stylesheet" href="../../assets/CSS/geral.css">
        <link rel="stylesheet" href="../../assets/CSS/login.css">
        <link rel="stylesheet" href="../../assets/CSS/pretestagem.css">
        <link rel="stylesheet" href="../../assets/CSS/cadastroBombeiro.css">
        <link rel="stylesheet" href="../../assets/CSS/cadastroSegundaAvaliacao.css">
        <link rel="stylesheet" href="../../assets/CSS/painelAdministrativo.css">
        <!--Todos os css vão precisar se linkados aqui, todos!-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    </head>

    <body>
        <main>
            <img id="logo" src="../../assets/images/Logotipo_de_marca_do_Corpo_de_Bombeiros_Militar_de_Santa_Catarina.png" alt="Logo BOmbeiros SC">
            
            <div id="div_central">
            <!--Aqui vai o conteúdo dinâmico-->
                <?php // Não conseguimos fazer o controlador de telas ainda, então verifique o resultado desta forma :)
                    //include_once ("../acompanhamento.php");
                    //include_once ("../cadastroBombeiro.php");
                    //include_once ("../cadastroSegundaAvaliacao.php");
                    //include_once ("../painelAdministrativo.php");
                    include_once ("../pretestagem.php");
                    //include_once ("../resultado.php");
                ?>
            </div>

            <!--Este espaço ficará vazio na em modo coluna 15 70 15-->
        </main>
    </body>
    <script src="../../assets/JS/function.js"></script>
</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="author" content="Alex Sandro Zarpelon, Bruna Gabriela Disner">
    <meta name="description" content="Plataforma de controle Covid-19">
    <meta name="keywords" content="Bombeiros, SC, controle Covid-19, Bombeiros Chapecó">
    <link rel="shorcut icon" href="assets/images/Logotipo_de_marca_do_Corpo_de_Bombeiros_Militar_de_Santa_Catarina.png">
    <link rel="stylesheet" href="assets/CSS/login.css">
    <link rel="stylesheet" href="assets/CSS/geral.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>

<body>
    <main>
        <div></div> <!-- Gambiarra? -->

        <?php
            if(!isset($_SESSION['login'])){
                include ('view/login.php');
            } else {    
                header('Location: controladorDeTelas.php');
            }
        ?>
    </main>
</body>
</html>
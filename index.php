<!-- O index é a tela de login -->
<!-- Isso será mudado posteriormente -->
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
        <div class="login">
            <h1>Login de usuário</h1>
            <img src="assets/images/Logotipo_de_marca_do_Corpo_de_Bombeiros_Militar_de_Santa_Catarina.png" alt="Logo BOmbeiros SC">
            
            <form action="controladorDeTelas.php">
                <input type="email" id="email" name="email" placeholder="E-mail"><br>
                <input type="password" id="senha" name="senha" placeholder="Senha"><br>
                <input type="submit" value="Acesso" id="submeter"><br>
            </form>

            <div>
                <a href="controladorDeTelas.php?acao=cadastro_bombeiro">Fazer cadastro</a>
                <a href="controladorDeTelas.php?acao=re_senha">Recuperar senha</a>
            </div>
        </div>
    </main>
</body>
</html>
<div class="login">
    <h1>Login de usuário</h1>
    <img src="assets/images/Logotipo_de_marca_do_Corpo_de_Bombeiros_Militar_de_Santa_Catarina.png" alt="Logo BOmbeiros SC">
    
    <form action="controladorDeTelas.php" method="POST">
        <input type="email" id="email" name="email" placeholder="E-mail"><br>
        <input type="password" id="senha" name="senha" placeholder="Senha"><br>
        <input type="submit" value="Acesso" id="submeter"><br>
    </form>

    <div>
        <a href="controladorDeTelas.php?acao=cadastro_bombeiro">Fazer cadastro</a>
        <a href="controladorDeTelas.php?acao=re_senha">Recuperar senha</a>
    </div>

    <?php
        if (isset($_GET['acao']) && $_GET['acao']  == 'recusado') {
            echo ("<strong id='erroLog'>Preencha o login corretamente!</strong>");
        }
    ?>

</div>
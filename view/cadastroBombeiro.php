<div>
    <form method="POST" onsubmit="return validateForm()">
        <h1>Cadastro do Bombeiro no sistema</h1><br>

        <input type="text" id="nome" name="nome" placeholder="Nome completo do militar"><br>
        <input type="tel" id="matricula" name="matricula" placeholder="Matrícula no formato 123-4"><br>
        <input type="text" id="email" name="email" placeholder="E-mail para recebimento de notificações"><br>
        <input type="password" id="senha" name="senha" placeholder="Crie uma senha"><br>
        <input type="password" id="re_senha" name="re_senha" placeholder="Repita a senha"><br>

        <input type="submit" value="Submeter cadastro" id="submeter">
    </form>
</div>
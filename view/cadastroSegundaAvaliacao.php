<div>
    <h1>Cadastro de segunda avaliação</h1>

    <form onsubmit="return validateForm3()"  method="POST">
        <select name="bombeiro" id="name">
            <option value="opcao" selected>Nome - Cadastro do bombeiro já deve constar no sistema</option>
            <?php foreach ($bombeiros_cadastrados as $opcao) 
                echo "<option value=".$opcao.">"
            ?>
        </select> <br>
        
        Data de realização da segunda avaliação:
        <input type="date" required> <br>

        <textarea name="sintomas" id="sintomas" rows="10" placeholder="Sintomas observados ou diagnosticados"></textarea>

        <div id="grid_cad">
            <div id="sim_nao">
                <p>Retorno aprovado?</p>
                <label>
                    <input type="radio" name="retorno" value="Sim" id="radio">Sim
                </label>

                <label>
                    <input type="radio" name="retorno" value="Não" id="radio">Não
                </label>
            </div>
            
            <div>
                <p>Data do retorno</p>
                <input type="date" id="data">
                
            </div>
        </div>
 
        <input type="submit" value="Cadastrar segunda avaliação">
    </form>
</div>
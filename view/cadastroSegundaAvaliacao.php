<div>
    <h1>Cadastro de segunda avaliação</h1>

    <form>
        <select name="bombeiro" id="bombeiro">
            <option value="opcao" selected>Nome - Cadastro do bombeiro já deve constar no sistema<option>
            <?php foreach ($bombeiros_cadastrados as $opcao) 
                echo "<option value=".$opcao.">"
            ?>
        </select> <br>
        
        Data de realização da segunda avaliação:
        <input type="date"> <br>

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
                <input type="date">
            </div>
        </div>
 
        <input type="submit" value="Cadastrar segunda avaliação">
    </form>
</div>

<!-- <p>Please select your age:</p>
  <input type="radio" id="age1" name="age" value="30">
  <label for="age1">0 - 30</label><br>
  <input type="radio" id="age2" name="age" value="60">
  <label for="age2">31 - 60</label><br>  
  <input type="radio" id="age3" name="age" value="100">
  <label for="age3">61 - 100</label><br><br>
  <input type="submit" value="Submit"> -->

<!-- O segundo valor estará selecionado inicialmente -->
<!-- <select name="select">
  <option value="valor1">Valor 1</option>
  <option value="valor2" selected>Valor 2</option>
  <option value="valor3">Valor 3</option>
</select> -->
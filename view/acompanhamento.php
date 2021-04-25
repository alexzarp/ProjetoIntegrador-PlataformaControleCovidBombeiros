<div class="acompanhamento">
    <h1>Acompanhamento dos sintomas e evolução</h1>    
    <form id="form">
        <div>
            <select name="bombeiro" id="bombeiro">
                <option value="opcao" selected>Nome - 
                    Cadastro do bombeiro já deve constar no sistema</option>
                <?php foreach ($bombeiros_cadastrados as $opcao) 
                    echo "<option value=".$opcao.">"
                ?>
            </select> <br>
        </div>
        <br>
        <div>
            <label for="id_data">Data de início dos sintomas:</label>
            <input type="date" id="data" name="data" placeholder="Data de início dos sintomas">
        </div>
        <br>
        <div>
            <textarea id="sintomas" placeholder="Descreva os sintomas"></textarea>
        </div>
        <br>
        
        <input type="submit" value="Submeter relatório" id="submeter">
        
    </form>

</div>
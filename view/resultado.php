<div class="resultadoTestagem">
    <h1>Cadastro do resultado da testagem</h1>    
    <form id="form" onsubmit="return validateForm4()" method="POST">
    <div>
            <select name="bombeiro" id="name">
                <option value="opcao" selected>Nome - 
                    Cadastro do bombeiro já deve constar no sistema</option>
                <?php foreach ($bombeiros_cadastrados as $opcao) 
                    echo "<option value=".$opcao.">"
                ?>
            </select> 
        </div>
        <br>
        <div id=testeR>
            <label>Resultado do teste:</label><br>
                <label><input type="radio" name="resultado" value="" id="radio">Positivo</label>
                <label><input type="radio" name="resultado" value=""id="radio">Negativo</label>
        </div>
        <br>
        <div>
            <label for="id_data">Data do teste:</label>
            <input type="date" id="data" name="data" placeholder="Data do teste" required>
        </div>
        
        <br>
        <div>
            <label for="tipoTeste">Tipo de teste realizado:</label>
            <select id="teste" name="teste">
                <option>Selecione</option>
                <option>PCR</option>
                <option>SWAB nasal</option>
                <option>Tipo 3</option>
            </select>
        </div>  
        <input type="submit" value="Submeter resultado da testagem" id="submeter">
        
    </form>

</div>
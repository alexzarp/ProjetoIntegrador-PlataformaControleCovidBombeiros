<div class="resultadoTestagem">
    <h1>Cadastro do resultado da testagem</h1>    
    <form>
        <div>
            <label for="id_nome">Nome:</label>
            <input type="text" id="nome" name="nome"  
            placeholder="Nome">
        </div>
        <br>
        <div>
            <div id=testeR>
                <input type="submit" value="Positivo" id="resultado">
            </div>
            <div>
                <input type="submit" value="Negativo" id="resultado">
            </div>
        </div>
        <div>
            <label for="id_data">Data do teste:</label>
            <input type="date" id="data" name="data" placeholder="Data do teste">
        </div>
        
        <br>
        <div>
            <label for="tipoTeste">Tipo de teste realizado:</label>
            <select id="tipoTeste" name="tipoTeste">
                <option>Selecione</option>
                <option>PCR</option>
                <option>SWAB nasal</option>
                <option>Tipo 3</option>
            </select>
        </div>  
        <input type="submit" value="Submeter resultado da testagem" id="submeter">
        
    </form>

</div>
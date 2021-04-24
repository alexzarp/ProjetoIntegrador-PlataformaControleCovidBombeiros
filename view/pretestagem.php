<div class="preTestagem">
    <h1>Pré - Testagem</h1>    
    <form>
        <div>
            <label for="id_nome">Nome:</label>
            <input type="text" id="nome" name="nome"  
            placeholder="Nome">
        </div>
        <br>
        <div>
            <label for="id_data">Data de início dos sintomas:</label>
            <input type="date" id="data" name="data" placeholder="Data de início dos sintomas">
        </div>
        <br>
        <div>
            <label for="id_sintomas">Descreva seus sintomas:</label>
            <textarea id="sintomas"></textarea>
        </div>
        <br>
        <div>
            <label>Realizou a vacina da covid-19:</label>
            <br>
            <label><input type="radio" name="vacina" value="" id="radio">Sim</label><br>
            <label><input type="radio" name="vacina" value="" id="radio">Não</label><br>
        </div>
        <br>
        <div>
            <label for="tipoV">Vacina:</label>
            <select id="tipoV" name="TipoVacina">
                <option>Selecione</option>
                <option>CORONAVAC - Instituto Butantan</option>
                <option>OXFORD - AstraZeneca</option>
            </select>
        </div>  
        <br>    
        <div id="dataV">
            <div>
                <label for="id_data">Data da Primeira dose:</label>
                <input type="date" id="data" name="data" placeholder="Data da Primeira dose:">
            </div>
            <div>
                <label for="id_data">Data da Segunda dose:</label>
                <input type="date" id="data" name="data" placeholder="Data da Segunda dose:">
            </div>
        </div>
        
        <br>
        <div>
            <label for="idade">Faixa-etária:</label>
            <select id="idade" name="idade">
                <option>Selecione</option>
                <option>20 - 30 anos</option>
                <option>30 - 40 anos</option>
                <option>40 - 50 anos</option>
                <option>50 - 60 anos</option>
                <option>60 - 70 anos</option>
                <option>70 - 80 anos</option>
            </select>
        </div>  
        <input type="submit" value="Submeter Pré-testagem " id="submeter">
        
    </form>

</div>
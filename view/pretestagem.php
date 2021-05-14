<div class="preTestagem">
    <h1>Pré - Testagem</h1>    
    <form id="form" name="formp" onsubmit="return validateForm5()" method="POST" action="controladorDeTelas.php?acao=pretestagem">
        <div>
            <select name="bombeiro" id="nome" required>
                <option value="opcao" selected>Nome - Cadastro do bombeiro já deve constar no sistema</option>
                <?php            
                    $reg = $b->listarBombeiro();
                    foreach ($reg as $key)
                        echo ('<option value="opcao">'.$key['nome'].' - '.$key['matricula'].'</option>');
                ?>
            </select>
        </div>
        <br>
        <div>
            <label for="id_data">Data de início dos sintomas:</label>
            <input type="date" id="data" name="data" placeholder="Data de início dos sintomas" required>
        </div>
        <br>
        <div>
            <textarea id="sintomas" name="sintomas" placeholder="Descreva seus sintomas:"></textarea>
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
            <select id="tipo" name="tipo">
                <option>Selecione</option>
                <?php
                    $registros = $d->listaVacina();
                    foreach ($registros as $key) {
                        echo ('<option>'.$key['nome_vac'].'</option>');
                    }
                ?>
            </select>
        </div>  
        <br>    
        <div id="dataV">
            <div>
                <label for="id_data">Data da Primeira dose:</label>
                <input type="date" id="data" name="datap" placeholder="Data da Primeira dose:">
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
                <option>20 - 29 anos</option>
                <option>30 - 39 anos</option>
                <option>40 - 49 anos</option>
                <option>50 - 59 anos</option>
                <option>60 - 69 anos</option>
                <option>70 - 79 anos</option>
            </select>
        </div>  
        <input type="submit" value="Submeter Pré-testagem " id="submeter">
        
    </form>

</div>
<script src="assets/JS/function.js"></script>

<div class="resultadoTestagem">
    <h1>Cadastro do resultado da testagem</h1>    
    <form id="form" onsubmit="return validateForm4()" method="POST" action="controladorDeTelas.php?acao=resultado">
    <div>
            <select name="bombeiro" id="name">
                <option value="opcao" selected>Nome - Cadastro do bombeiro já deve constar no sistema</option>
                <?php
                $reg = $b->listarBombeiroJoinPretestagem();
                foreach ($reg as $key)
                    echo ('<option value='.$key['matricula'].'>'.$key['nome'].' - '.$key['matricula'].'</option>');
                ?>
            </select> 
        </div>
        <br>
        <div id=testeR>
            <label>Resultado do teste:</label><br>
                <label><input type="radio" name="resultado" value="1" id="radio">Positivo</label>
                <label><input type="radio" name="resultado" value="0" id="radio">Negativo</label>
        </div>
        <br>
        <div>
            <label for="id_data" type="date">Data do teste:</label>
            <input type="date" id="data" name="data" placeholder="Data do teste" required>
        </div>
        
        <br>
        <div>
            <label for="tipoTeste">Tipo de teste realizado:</label>
            <select id="teste" name="teste">
                <option>Selecione</option>
                <option value="PCR">PCR</option>
                <option value="SWAB nasal">SWAB nasal</option>
                <option value="Tipo 3">Tipo 3</option>
            </select>
        </div>  
        <input type="submit" value="Submeter resultado da testagem" id="submeter" name="submetido">
        
    </form>

</div>
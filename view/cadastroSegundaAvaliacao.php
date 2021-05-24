<div>
    <h1>Cadastro de segunda avaliação</h1>

    <form name="formS"onsubmit="return validateForm3()" method="POST" action="controladorDeTelas.php?acao=cadastro_segunda_avaliacao">
        <select name="bombeiro_id" id="name">
            <option value="opcao" selected>Nome - Cadastro já deve constar no sistema</option>
            <?php
                $reg = $b->listarBombeiroJoinPretestagem();
                foreach ($reg as $key)
                    echo ('<option value='.$key['id'].'>'.$key['nome'].' - '.$key['matricula'].'</option>');
            ?>
        </select> <br>
        
        Data de realização da segunda avaliação:
        <input type="date" name="data_ava" required> <br><!-- Desabilitei, depois discutiremos -->

        <textarea name="sintomas" id="sintomas" maxlength="1000" rows="10" placeholder="Sintomas observados ou diagnosticados"></textarea>

        <div id="grid_cad">
            <div id="sim_nao">
                <p>Retorno aprovado?</p>
                <label>
                    <input type="radio" name="retorno" value="1" id="radio" onclick="exibirS()">Sim
                </label>

                <label>
                    <input type="radio" name="retorno" value="0" id="radio" onclick="exibirN()">Não
                </label>
            </div>
            <div id="simR">
                <p>Data do retorno</p>
                <input type="date" id="data" name="prevista">
                
            </div>
            <div id="naoR">
            <p>Data da reavaliação</p>
                <input type="date" id="data" name="prevista">
                <p>Data do possível retorno</p>
                <input type="date" id="data" name="prevista">
            </div>
        </div>
 
        <input type="submit" value="Cadastrar segunda avaliação" name="submete_seg">
    </form>
</div>
<script src="assets/JS/segundaav.js"></script>

<div>
    <h1>Cadstro de segunda avaliação</h1>

    <form>
        <select name="bombeiro" id="bombeiro">Selecione
            <?php foreach ($bombeiros_cadastrados as $opcao) 
                echo "<option value=".$opcao.">"
            ?>
        </select>
    </form>
</div>
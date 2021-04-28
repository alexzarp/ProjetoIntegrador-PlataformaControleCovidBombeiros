<div>
    <h1>Buscar por registro de sintomas</h1>

    <form>
        <select name="bombeiro" id="name">Nome - Cadastro do bombeiro já deve constar no sistema</select>
            <option value="opcao" selected>Nome - Cadastro do bombeiro já deve constar no sistema</option>
            <?php foreach ($bombeiros_cadastrados as $opcao) 
                echo "<option value=".$opcao.">.$texto.</option>"
            ?>
        </select><br>

        <!-- <?php
            foreach ($bombeiros_cadastrados as $nome) {
                echo "<details>
                        <summary>";
                echo $bombeiros_cadastrados;

            }
        ?> -->

        <details>
            <summary>
                <h3>Jailson Siqueira - Matrícula: 1515451445145</h3>
                <h3>Data:  01/02/2021</h3><br>
                <h3>Registro #3</h3>
                <h3>Curado</h3>
                <a href="">Excluir</a>
                <a href="">Editar informações</a>
                <a href="">Mostrar detalhamento</a>
            </summary>
            <p>
                Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto 
                Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto 
            </p>
        </details>
    
    </form>
</div>
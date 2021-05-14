<?php
    $erro = false;
    if ( !isset( $_POST ) || empty( $_POST)){
        $erro = 'POST está vazio.';
    }   
    //cria as variaveis dinamicamente
    foreach ($_POST as $chave => $valor ){
        //Remove as tags html e os espaços em branco
        $$chave = trim(strip_tags($valor));
    

        if(empty ($valor)){
            $erro = 'Existem campos em branco.';
        }
    }
    if ((!isset ($email)|| ! filter_var ($email, FILTER_VALIDATE_EMAIL)) && !$erro){
        $erro = 'Envie uma email válido.';
    }
    if ($erro){
        echo $erro;
    }else{
        echo "<h1>Veja os dados enviados </h1>";

        foreach ($_POST as $chave => $valor) {
            echo '<br>' . $chave . '<br>:' . $valor . '<br><br>';
        }
    }


?>
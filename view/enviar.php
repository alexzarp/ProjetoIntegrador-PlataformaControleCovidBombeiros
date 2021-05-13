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

?>
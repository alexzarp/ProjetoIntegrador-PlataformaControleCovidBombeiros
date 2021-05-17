<?php
    include "PHPMailer-master/PHPMailerAutoload.php";
    function enviarEmail($email){

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        //usuario da conta
        $mail->Username = 'bruna.disner@gmail.com';
        $mail->Password = 'minha_senha';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->IsHTML(true);
        //Email do remetente
        $mail->From = 'bruna.disner@gmail.com';
        //nome do remetente
        $mail->FromName = 'Teste';
        // endereço de email do destinatario
        $mail->addAddress('informatica6bbm@gmail.com');
        $mail->addAddress($email);
        //Assunto do email
        $mail->Subject = 'Resultado do teste';
        //Mensagem que vai no corpo do e-mail
        $mail->Body = '<h1>Informamos que o resultado do seu teste deu negativo. </h1>';
        
        if($mail->Send()):
            echo 'Enviado com sucesso !';
        else:
            echo 'Erro ao enviar Email:' . $mail->ErrorInfo;
        endif;

    }
   

?>
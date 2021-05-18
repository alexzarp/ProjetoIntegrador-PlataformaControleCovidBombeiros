<?php
    require_once('src/PHPMailer.php');
    require_once('src/SMTP.php');
    require_once('src/Exception.php');
    
    use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    
    function enviarEmail($emailDestino, $titulo, $mensagemHTML, $altMensagem) {
        try {
            $mail = new PHPMailer(true);
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // isso serve pra visualizar o debug
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sistemacovidbombeiros@gmail.com'; // conta criada para essa finalidade
            $mail->Password = 'SJjksak*sa878%#';   // senha dela
            $mail->Port = 587;
        
            $mail->setFrom($emailDestino);
            $mail->addAddress($emailDestino);
            // $mail->addAddress('endereco2@provedor.com.br');
        
            $mail->isHTML(true);
            $mail->Subject = $titulo;
            $mail->Body = $mensagemHTML;
            $mail->AltBody = $altMensagem;
        
            if($mail->send()) {
                echo 'Email enviado com sucesso';
            } else {
                echo 'Email nao enviado';
            }
            
        } catch (Exception $e) {
            echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        }
        
    }
    $textoPositivo = ("
            <html>
            
            <head>
            <style>
                
                    
            </style>
            <img src='assets/images/Logotipo_de_marca_do_Corpo_de_Bombeiros_Militar_de_Santa_Catarina.png'>
            </head>

            <body>
                <h2>Email enviado automaticamente pelo sistema de controle de casos do covid do 6° BBM de Chapecó.</h2>
                <h3>Informamos que seu teste deu: <b>POSITIVO</b></h3>
                <h3>Em caso de dúvidas entre em contato com os resposáveis pelo telefone
                (49)2049-7661.</h3> 
                <p>Não responder esse email</p>
            </body>
            <footer>
                <p>Sistema desenvolvido por Alex Sandro e Bruna Gabriela.</p><br>
                <p>6° BBM - Chapecó - SC.</p>
            </footer>
            </html>
        
        ");
    
    $textoNegativo = ("
        <html>
                
        <head>
        <style>
            
                
        </style>
        <img src='assets/images/Logotipo_de_marca_do_Corpo_de_Bombeiros_Militar_de_Santa_Catarina.png'>
        </head>

        <body>
            <h2>Email enviado automaticamente pelo sistema de controle de casos do covid do 6° BBM de Chapecó.</h2>
            <h3>Informamos que seu teste deu: <b>NEGATIVO.</b></h3>
            <h3>Em caso de dúvidas entre em contato com os resposáveis pelo telefone
            (49)2049-7661.</h3> 
            <p>Não responder esse email</p>
        </body>
        <footer>
            <p>Sistema desenvolvido por Alex Sandro e Bruna Gabriela.</p><br>
            <p>6° BBM - Chapecó - SC.</p>
        </footer>
        </html>
    
    ");
    $assunto = "Resultado teste covid-19 - Corpo de Bombeiros Militar de Santa Catarina.";
?>
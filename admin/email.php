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
                echo '<strong id="inserido">Email enviado com sucesso!</strong>';
            } else {
                echo '<strong id="erro">Email não enviado!</strong>';
            }
            
        } catch (Exception $e) {
            echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        }
        
    }
?>
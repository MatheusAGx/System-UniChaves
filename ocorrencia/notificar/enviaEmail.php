<?php
    require '../vendor/autoload.php';
   
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['enviarEmail'])) {
        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor
            $mail->SMTPDebug = 2;                                       // Ativar saída de depuração detalhada
            $mail->isSMTP();                                            // Enviar usando SMTP
            $mail->Host       = 'smtp.zoho.com';                     // Defina o servidor SMTP para enviar por
            $mail->SMTPAuth   = true;                                   // Ativar autenticação SMTP
            $mail->Username   = 'unichaves@zohomail.com';                     // Nome de usuário SMTP
            $mail->Password   = 'B4b4!u@6645';                             // Senha SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Ativar criptografia TLS, `ssl` também é aceito
            $mail->Port       = 587;                                    // Porta TCP para conectar-se

            // Destinatários
            $mail->setFrom('unichaves@zohomail.com', 'UniChaves');
            $mail->addAddress('matheus_age11@hotmail.com', 'Matheus');           // Adicionar um destinatário
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Anexos
            //$mail->addAttachment('/var/tmp/file.tar.gz');               // Adicionar anexos
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');          // Nome opcional

            // Conteúdo
            $mail->isHTML(true);                                        // Definir e-mail formato para HTML
            $mail->Subject = 'Notificação de ocorrência';
            $mail->Body    = 'Este e-mail tem como finalidade te informar sobre uma ocorrência que foi criada em nosso sistema. Por gentileza não responder este email!';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    
?>
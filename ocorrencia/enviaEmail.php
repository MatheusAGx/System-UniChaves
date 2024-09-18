<?php
    require '../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor
        $mail->SMTPDebug = 2;                                       // Ativar saída de depuração detalhada
        $mail->isSMTP();                                            // Enviar usando SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Defina o servidor SMTP para enviar por
        $mail->SMTPAuth   = true;                                   // Ativar autenticação SMTP
        $mail->Username   = 'unichavess@gmail.com';                     // Nome de usuário SMTP
        $mail->Password   = 'unichavescotil';                             // Senha SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Ativar criptografia TLS, `ssl` também é aceito
        $mail->Port       = 25;                                    // Porta TCP para conectar-se

        // Destinatários
        $mail->setFrom('unichavess@gmail.com', 'Mailer');
        $mail->addAddress('matt.ag@hotmail.com', 'Joe User');           // Adicionar um destinatário
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Anexos
        //$mail->addAttachment('/var/tmp/file.tar.gz');               // Adicionar anexos
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');          // Nome opcional

        // Conteúdo
        $mail->isHTML(true);                                        // Definir e-mail formato para HTML
        $mail->Subject = 'Teste';
        $mail->Body    = 'Olá! Por favor acesse o sistema do UniChaves, pois uma ocorrência foi registrada em seu nome!';
        $mail->AltBody = 'Este e-mail não recebe respostas!';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>
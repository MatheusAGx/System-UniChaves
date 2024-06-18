<?php 
require '../../vendor/autoload.php';
include "../../config/config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$id = $_GET['id'];

if (isset($_POST['enviarEmail'])) {

    $usuario = $conn->real_escape_string($_POST['usuario']);
    $chave = $conn->real_escape_string($_POST['chave']);
    $data_ocorrencia = $conn->real_escape_string($_POST['data_ocorrencia']);
    $hora_ocorrencia = $conn->real_escape_string($_POST['hora']);
    $ocorrencia = $conn->real_escape_string($_POST['ocorrencia']);

    $q_busca_email = "SELECT nome, email FROM usuarios WHERE id = '$usuario'";
    $busca_email = $conn->query($q_busca_email);
    $email = $busca_email->fetch_object();

    /*$q_busca_ocorrencia = "SELECT * FROM ocorrencia WHERE id = '$id'";
    $busca_ocorrencia = $conn->query($q_busca_ocorrencia);
    $ocorrencia_d = $busca_ocorrencia->fetch_object();*/

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
        $mail->addAddress($email->email, $email->nome);           // Adicionar um destinatário
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Anexos
        //$mail->addAttachment('/var/tmp/file.tar.gz');               // Adicionar anexos
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');          // Nome opcional

        // Conteúdo
        $mail->isHTML(true);                                        // Definir e-mail formato para HTML
        $mail->Subject = 'OCORRENCIA';
        $mail->Body    = 'Ola '.$email->nome.'! Gostariamos de notifica-lo que sera necessario devolver sua chave!';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        header ('Location: ../');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

$q_busca_chave = "SELECT id,nome FROM chave";
$busca_chave = $conn->query($q_busca_chave);

$q_busca_usuario = "SELECT id,nome FROM usuarios";
$busca_usuario = $conn->query($q_busca_usuario);

$q_busca_dados = "SELECT * FROM ocorrencia WHERE id = '$id'";
$busca_dados = $conn->query($q_busca_dados);

include "view.php";
<?php

namespace app\services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        $this->mail->isSMTP();
        $this->mail->Host       = 'sandbox.smtp.mailtrap.io';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = '744975bac50696';
        $this->mail->Password   = 'cc319756f544e1';
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port       = 2525;
    }

    public function sendMail($to, $subject, $body, $altBody = '')
    {
        try {
            $this->mail->setFrom('teste@sistema.com', 'Meu Sistema');
            $this->mail->addAddress($to);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->AltBody = $altBody ?: strip_tags($body);

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return "Erro ao enviar"; // : {$this->mail->ErrorInfo} se quiser detalhes do erro adicionar esse trecho
        }
    }
}

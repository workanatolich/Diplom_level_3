<?php

namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use App\Configs\Mail;

class Mailer
{
    public $mail;

    public function __construct(PHPMailer $mailer)
    {
        $this->mail = $mailer;
        $this->mail->isSMTP();
        $this->mail->Host = Mail::get('host');
        $this->mail->SMTPAuth = true;
        $this->mail->Port = Mail::get('port');
        $this->mail->Username = Mail::get('username');
        $this->mail->Password = Mail::get('password');
    }

    public function send($from, $sent_to, $data, $sender, $recipient) {
        $this->mail->setFrom($from, $sender);
        $this->mail->addAddress($sent_to, $recipient);

        $this->mail->Subject = $data['subject'];
        $this->mail->Body = $data['text'];

        $this->mail->send();
    }
}
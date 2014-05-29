<?php

namespace Coursora\NotificationBundle\Mailer;

class Mailer {

    private $mailer;

    public function __construct($mailer){
        $this->mailer = $mailer;
    }

    public function sendProfessoreCreato($professore){
        $message = \Swift_Message::newInstance();
        $message
            ->setSubject("Sei stato iscritto a Coursora")
            ->setFrom("noreply@coursora.com")
            ->setTo($professore->getEmail())
            ->setBody("OK");

        $this->mailer->send($message);
    }

} 
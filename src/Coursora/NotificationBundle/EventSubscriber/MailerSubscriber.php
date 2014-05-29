<?php

namespace Coursora\NotificationBundle\EventSubscriber;

use Coursora\AmministratoreBundle\Event\ProfessoreCreato;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MailerSubscriber implements EventSubscriberInterface {

    private $mailer;

    public function __contructor($mailer){
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents()
    {
        return array("professore.creato" => "onProfessoreCreato");
    }

    public function onProfessoreCreato(ProfessoreCreato $event)
    {
        $professore = $event->getProfessore();

        $this->mailer->sendProfessoreCreato($professore);

    }
} 
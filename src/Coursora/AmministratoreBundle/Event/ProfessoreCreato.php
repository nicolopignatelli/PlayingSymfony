<?php
namespace Coursora\AmministratoreBundle\Event;

use Coursora\ProfessoreBundle\Entity\Professore;
use Symfony\Component\EventDispatcher\Event;

class ProfessoreCreato extends Event {

    private $professore;

    public function getProfessore(){
        return $this->professore;
    }

    public function __construct(Professore $professore){
        $this->professore = $professore;
    }


}
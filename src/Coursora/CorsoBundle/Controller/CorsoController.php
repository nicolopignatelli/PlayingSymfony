<?php

namespace Coursora\CorsoBundle\Controller;

use Coursora\CorsoBundle\Entity\Corso;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;


class CorsoController extends Controller
{
    public function inserisciAction(){
        $corso = new Corso();

        $corso->setSlug('symfony-101');
        $corso->setTitolo('impara i fondamenti di symfony');
        $corso->setDescrizione('il meglio per partire con symfony');

        $em = $this->getDoctrine()->getManager();

        $em->persist($corso);

        $em->flush(); // qui và sul DB

        return new Response("corso creato! :)");
    }

    /**
     * @Template
     */
    public function showAction()
    {
        return array();
    }

    /**
    * @Template
    */
    public function listAction()
    {
        return array();
    }

    /**
     * @Template
     */
    public function iscrizioniAction()
    {
        return array();
    }
}

<?php

namespace Coursora\AmministratoreBundle\Controller;

use Coursora\AmministratoreBundle\Event\ProfessoreCreato;
use Coursora\ProfessoreBundle\Entity\Translation\ProfessoreTranslation;
use Coursora\ProfessoreBundle\Entity\Professore;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/professore")
 */
class ProfessoreController extends Controller
{
    /**
     * @Route("/registra")
     * @Template()
     * @Method({"GET", "POST"})
     */
    public function registraAction(Request $request)
    {
        $form = $this->createForm('amministratore_professore_type');
        $form->handleRequest($request);

        if($form->isValid())
        {
            $professore = $form->getData();
            $dm = $this->getDoctrine()->getManager();

            $professoreTranslation = new ProfessoreTranslation(
                'it',
                'biografia',
                'Bio Italia'
            );
            $professore->addTranslation($professoreTranslation);

            $dm->persist($professore);
            $dm->flush();

            $this->fireProfessoreCreato($professore);
            $url = $this->generateUrl('coursora_amministratore_professore_lista');
            $redirectResponse = $this->redirect($url, 303);

            return $redirectResponse;
        }

        return array("il_mio_form" => $form->createView());
    }


    /**
     * @Route("/lista")
     * @Template()
     * @Method({"GET"})
     */
    public function listaAction()
    {
        $repository = $this->getDoctrine()->getRepository("CoursoraProfessoreBundle:Professore");

        $professori = $repository->findAll();

        return array("professori" => $professori);
    }

    /**
     * @Route("/show/{id}")
     * @Template()
     * @Method({"GET"})
     */
    public function showAction( Professore $professore )
    {
        return array("professore" => $professore);
    }

    private function fireProfessoreCreato($professore)
    {
        $event = new ProfessoreCreato($professore);
        $dispatcher = $this->get("event_dispatcher");
        $dispatcher->dispatch("professore.creato", $event);

    }

}

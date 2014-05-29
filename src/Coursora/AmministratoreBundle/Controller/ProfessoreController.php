<?php

namespace Coursora\AmministratoreBundle\Controller;

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
            $dm->persist($professore);
            $dm->flush();

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
        return array();
    }
}

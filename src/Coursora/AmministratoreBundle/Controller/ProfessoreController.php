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
        if($request->getMethod() == "POST")
        {
            $url = $this->generateUrl('coursora_amministratore_professore_lista');
            $redirectResponse = $this->redirect($url, 303);

            return $redirectResponse;
        }

        return array();
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

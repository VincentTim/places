<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Form\TravelType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/get-travel-form", name="app_get_travel_form")
     */
    public function getTravelFormAction()
    {
        $form = $this->createForm(new TravelType());
        return $this->render('embed/form/travel-form.html.twig', array('form' => $form->createView()));
    }


}

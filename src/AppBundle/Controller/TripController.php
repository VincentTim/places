<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Form\TravelType;
use AppBundle\Form\TagType;

class TripController extends Controller
{
    /**
     * @Route("/dashboard/voyages", name="dashboard_trip")
     */
    public function indexAction()
    {
        $form = $this->createForm(new TravelType());
        return $this->render('default/trip.html.twig', array('form'=>$form->createView()));
    }

}

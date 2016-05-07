<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function indexAction()
    {
        $travels = $this->get('entity.management')->rep('Travel')->findAll();
        return $this->render('default/main.html.twig', array('travels'=>$travels));
    }

}

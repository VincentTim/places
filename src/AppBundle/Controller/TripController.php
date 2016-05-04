<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Form\TravelType;
use AppBundle\Form\TagType;

use AppBundle\Entity\Travel;

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
	
	/**
	*
	* @Route("/dashboard/voyages/contribution", name="dashboard_trip_contribute")
	*/
	public function contributeTripAction(Request $request)
	{
		$trip = new Travel();
		
		$form = $this->createForm(new TravelType());
		
		if($request->getMethod() == 'POST'){
			
			$form->handleRequest($request);
			
			if($form->isValid()){
				
				$trip = $form->getData();
				
				try {
					
					foreach($trip->getTags() as $tag){
							$tag->addTravel($trip);
							$trip->addTag($tag);
					}
					$trip->setPeriodFrom(new \DateTime());
					$trip->setPeriodTo(new \DateTime());
					$trip->setCreated(new \DateTime());
					$trip->setUpdated(new \DateTime());
					$this->get('entity.management')->add($trip);
					return $this->redirectToRoute('dashboard_trip', array(), 301);
				} catch(\Exception $e){
					var_dump($e);
				}
				
				
			}
		} else {
			
		}
		
		
		
	}

}

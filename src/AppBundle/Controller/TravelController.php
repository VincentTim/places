<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Form\TravelType;
use AppBundle\Form\TagType;
use AppBundle\Form\FileType;

use AppBundle\Entity\Travel;
use AppBundle\Entity\File;

class TravelController extends Controller
{
    /**
     * @Route("/dashboard/voyages", name="dashboard_travel")
     */
    public function indexAction()
    {
    
        $liste = $this->get('entity.management')->rep('Travel')->findAll();
        return $this->render('default/travel.html.twig', array(
            'liste' => $liste
            )
        );
    }
    
    /**
     * @Route("/dashboard/voyages/ajout", name="dashboard_travel_add")
     * @Route("/dashboard/voyages/edition/{id}", name="dashboard_travel_edit")
     */
    public function addTravelAction($id = null)
    {
        if($id != null){
            $travel = $this->get('entity.management')->rep('Travel')->find($id);    
        }
        else {
            $travel = new Travel();    
        }
        
        $form = $this->createForm(new TravelType(), $travel);
        
        return $this->render('default/travel.html.twig', array(
            'form'=>$form->createView()
            )
        );
    }
	
	/**
	*
	* @Route("/dashboard/voyages/contribution", name="dashboard_travel_contribute")
	*/
	public function contributeTravelAction(Request $request)
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
                    
                    foreach($trip->getFiles() as $file){
							$file->upload();
                            $file->setTravel($trip);
					}
					
					$trip->setCreated(new \DateTime());
					$trip->setUpdated(new \DateTime());
					$this->get('entity.management')->add($trip);
					return $this->redirectToRoute('dashboard_travel_add', array(), 301);
				} catch(\Exception $e){
					var_dump($e);
				}
				
				
			} else {
			
		      }
		} 
		
		
		
	}
    
    /**
	*
	* @Route("/dashboard/voyages/suppression/{id}", name="dashboard_travel_delete")
	*/
	public function deleteTravelAction(Request $request, $id)
	{
		$trip = $this->get('entity.management')->rep('Travel')->find($id);
		
        try {
				$this->get('entity.management')->delete($trip);
				return $this->redirectToRoute('dashboard_travel', array(), 301);
                    
				} catch(\Exception $e){
					var_dump($e);
				}
				
    }

}

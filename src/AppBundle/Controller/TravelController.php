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
            $file = false;
            $action = 'update';
        }
        else {
            $travel = new Travel(); 
            $file = true;
            $action = 'create';
        }
        
        $form = $this->createForm(new TravelType(), $travel, array('file'=> $file));
        
        return $this->render('default/travel.html.twig', array(
            'form'=>$form->createView(),
            'action'=>$action
            )
        );
    }
	
	/**
	*
	* @Route("/dashboard/voyages/contribution/{id}", name="dashboard_travel_contribute")
	*/
	public function contributeTravelAction(Request $request, $id = null)
	{
		if($id != null){
            $travel = $this->get('entity.management')->rep('Travel')->find($id);
            
            //Pour la mise à jour des tags, on supprime d'abord ceux enregistrés et liés
            foreach($travel->getTags() as $tag){
				$tag->removeTravel($travel);
				$travel->removeTag($tag);
                $this->get('entity.management')->delete($tag);
                
            }
            
        }
        else {
            $travel = new Travel(); 
        }
		
		$form = $this->createForm(new TravelType(), $travel);
        $datas = $request->request->all();
		
		if($request->getMethod() == 'POST'){
			
			$form->handleRequest($request);
			
			if($form->isValid()){
				
				$travel = $form->getData();
				
				try {
                    
					//On ajoute les mots clés
                    if(count($travel->getTags()) > 0){
                        foreach($travel->getTags() as $tag){
                                $tag->addTravel($travel);
                                $travel->addTag($tag);
                        }
                    }
                    
                    //On ajoute les fichiers
                    if(count($travel->getFiles()) > 0){
                        foreach($travel->getFiles() as $file){
							$file->upload();
                            $file->setTravel($travel);
					   }    
                    }
                    
                    if($id != null){
                        $travel->setUpdated(new \DateTime());
                    }
                    else {
                        $travel->setCreated(new \DateTime());
					    $travel->setUpdated(new \DateTime());
                    }
                    
                    if($id != null){
                        $this->get('entity.management')->update($travel);
                        return $this->redirectToRoute('dashboard_travel_edit', array('id'=>$id), 301);
                    }
                    else {
                        $this->get('entity.management')->add($travel);
                        return $this->redirectToRoute('dashboard_travel_add', array(), 301);
                    }
					
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

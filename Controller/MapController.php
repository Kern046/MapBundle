<?php

namespace Citadel\MapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Citadel\MapBundle\Form\MapType;
use Citadel\MapBundle\Entity\Map;

class MapController extends Controller
{
    public function indexAction()
    {
        return $this->render('CitadelMapBundle:Map:index.html.twig');
    }
    
    public function generateAction($parent){
        
        $map = new Map;
        
        $form = $this->createForm(new MapType, $map);
        $request = $this->getRequest();
        
        if($request->getMethod() === 'POST'){
            
            $form->bind($request);
            
            if($form->isValid()){
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($map);
                $em->flush();
                
                return $this->redirect($this->generateUrl('citadel_administration'));
                
            }
            
        }
        
        return $this->render('CitadelMapBundle:Map:generate.html.twig', array(
            'form' => $form->createView()
        ));
        
    }
    
    public function showAction($id){
        
        $map = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('CitadelMapBundle:Map')
                    ->find($id);
        
        if(!is_null($map)){
            
            return $this->render('CitadelMapBundle:Map:show.html.twig',array(
                'map' => $map
            ));
            
        }
        
    }
}

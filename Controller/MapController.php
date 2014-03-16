<?php

namespace Citadel\MapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MapController extends Controller
{
    public function indexAction()
    {
        return $this->render('CitadelMapBundle:Map:index.html.twig');
    }
    
    public function generateAction($parent){
        
        
        
    }
}

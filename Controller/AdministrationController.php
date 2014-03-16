<?php

namespace Citadel\MapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdministrationController extends Controller
{
    public function indexAction()
    {
        $map = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('CitadelMapBundle:Map')
                    ->findOneByParent(null);
        
        return $this->render('CitadelMapBundle:Administration:index.html.twig',array(
            "map" => $map
        ));
    }
}

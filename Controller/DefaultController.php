<?php

namespace Citadel\MapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CitadelMapBundle:Default:index.html.twig', array('name' => $name));
    }
}

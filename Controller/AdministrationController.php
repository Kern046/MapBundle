<?php

namespace Citadel\MapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdministrationController extends Controller
{
    public function indexAction()
    {
        return $this->render('CitadelMapBundle:Administration:index.html.twig');
    }
}

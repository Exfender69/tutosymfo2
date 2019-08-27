<?php

namespace OC\TestymlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OCTestymlBundle:Default:index.html.twig', array('name' => $name));
    }
}

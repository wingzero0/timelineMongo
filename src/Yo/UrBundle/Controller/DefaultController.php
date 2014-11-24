<?php

namespace Yo\UrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('YoUrBundle:Default:index.html.twig', array('name' => $name));
    }
}

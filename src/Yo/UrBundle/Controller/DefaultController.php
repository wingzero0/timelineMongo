<?php

namespace Yo\UrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Yo\UrBundle\Document\Action as TimelineAction;

class DefaultController extends Controller
{
	public function indexAction($name)
	{
		return $this->render('YoUrBundle:Default:index.html.twig', array('name' => $name));
	}
	public function createAction(){
		$actionManager = $this->get('spy_timeline.action_manager');
		$subject       = $actionManager->findOrCreateComponent('\User', 'chucknorris');
		$action        = $actionManager->create($subject, 'control', array('directComplement' => 'the world'));
		$actionManager->updateAction($action);
        return $this->render('YoUrBundle:Default:index.html.twig', array('name' => "done"));
	}
}

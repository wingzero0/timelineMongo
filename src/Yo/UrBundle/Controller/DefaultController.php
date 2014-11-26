<?php

namespace Yo\UrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Yo\UrBundle\Document\Action as TimelineAction;
use Yo\UrBundle\Document\Component;

class DefaultController extends Controller
{
	public function indexAction($name)
	{
		return $this->render('YoUrBundle:Default:index.html.twig', array('name' => $name));
	}
	public function createAction(){
		$actionManager = $this->get('spy_timeline.action_manager');
		$subject       = $actionManager->findOrCreateComponent('\User', 'chucknorris');
		$subject->setName("Chuck Norris");
		$dm = $this->get('doctrine.odm.mongodb.document_manager');
		$dm->persist($subject);
		$dm->flush();
		$action        = $actionManager->create($subject, 'control', array('directComplement' => 'the world'));
		$actionManager->updateAction($action);
        return $this->render('YoUrBundle:Default:index.html.twig', array('name' => "done"));
	}
	public function showUserAction($username){
		$actionManager = $this->get('spy_timeline.action_manager');
        $timelineManager = $this->get('spy_timeline.timeline_manager');
		$dm = $this->get('doctrine.odm.mongodb.document_manager');
		$user = $dm->getRepository('YoUrBundle:Component')->findOneByName($username);
		if (!$user){
			$user = $actionManager->findOrCreateComponent('\User', $username);
			//$user = new Component();
			$user->setName($username);
			$user->setLoginCount(1);
			//$dm->persist($user);
			$dm->flush();
			return $this->render('YoUrBundle:Default:index.html.twig', array('name' => "new create user ".$username));
		}
		$logger = $this->get('logger');
		$logger->info(intval($user->getLoginCount()));
		$logger->info(intval($user->getLoginCount()) + 1);
		$user->setLoginCount(intval($user->getLoginCount()) + 1);
		$logger->info(intval($user->getLoginCount()));
		// $dm->persist($user);
		$dm->flush();
		return $this->render('YoUrBundle:Default:index.html.twig', array('name' => "old user ". $user->getName() . " login count:" . intval($user->getLoginCount())));
	}
	public function displayFixAction()
	{
	    $actionManager   = $this->get('spy_timeline.action_manager');
	    $timelineManager = $this->get('spy_timeline.timeline_manager');
	    $subject         = $actionManager->findOrCreateComponent('\User', 'steven seagal');

	    $timeline = $timelineManager->getTimeline($subject);
	    $userId = $subject->getId();

	    // count entries before filtering process.
	    $count1 = $timelineManager->countKeys($subject);

	    // count entries after filtering process.
	    $count2 = count($timeline);

	    return $this->render('YoUrBundle:Default:displayFix.html.twig', array('coll' => $timeline, 'timelineKey' => $count1, 'timelineCount' => $count2, 'userId' => $userId));
	}
	public function displayUserTimelineAction($username)
	{
	    $actionManager   = $this->get('spy_timeline.action_manager');
	    $timelineManager = $this->get('spy_timeline.timeline_manager');
	    $subject         = $actionManager->findOrCreateComponent('\User', $username);

	    $timeline = $timelineManager->getTimeline($subject);

	    // count entries before filtering process.
	    $count1 = $timelineManager->countKeys($subject);

	    // count entries after filtering process.
	    $count2 = count($timeline);

	    return $this->render('YoUrBundle:Default:display.html.twig', array('coll' => $timeline, 'timelineKey' => $count1, 'timelineCount' => $count2));
	}
}

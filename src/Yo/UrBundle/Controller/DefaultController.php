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
	public function displayAction()
	{
	    $actionManager   = $this->get('spy_timeline.action_manager');
	    $timelineManager = $this->get('spy_timeline.timeline_manager');
	    $subject         = $actionManager->findOrCreateComponent('\User', 'steven seagal');

	    $timeline = $timelineManager->getTimeline($subject);

	    // count entries before filtering process.
	    $count1 = $timelineManager->countKeys($subject);

	    // count entries after filtering process.
	    $count2 = count($timeline);

	    return $this->render('YoUrBundle:Default:display.html.twig', array('coll' => $timeline, 'timelineKey' => $count1, 'timeline' => $count2));
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

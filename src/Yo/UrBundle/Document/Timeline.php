<?php
namespace Yo\UrBundle\Document;

use Spy\Timeline\Model\ActionInterface;
use Spy\Timeline\Model\ComponentInterface;
use Spy\TimelineBundle\Document\Timeline as BaseTimeline;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document
 */
class Timeline extends BaseTimeline
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\ReferenceOne(targetDocument="Action", cascade={"all"})
     */
    protected $action;

    /**
     * @ODM\ReferenceOne(targetDocument="Component", cascade={"all"})
     */
    protected $subject;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set action
     *
     * @param Spy\Timeline\Model\ActionInterface $action
     * @return self
     */
    public function setAction(ActionInterface $action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Get action
     *
     * @return Yo\UrBundle\Document\Action $action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set subject
     *
     * @param Spy\Timeline\Model\ComponentInterface $subject
     * @return self
     */
    public function setSubject(ComponentInterface $subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * Get subject
     *
     * @return Yo\UrBundle\Document\Component $subject
     */
    public function getSubject()
    {
        return $this->subject;
    }
}

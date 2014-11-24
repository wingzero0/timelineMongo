<?php
namespace Yo\UrBundle\Document;

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
     * @param Yo\UrBundle\Document\Action $action
     * @return self
     */
    public function setAction(\Yo\UrBundle\Document\Action $action)
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
     * @param Yo\UrBundle\Document\Component $subject
     * @return self
     */
    public function setSubject(\Yo\UrBundle\Document\Component $subject)
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

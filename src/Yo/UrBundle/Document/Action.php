<?php

namespace Yo\UrBundle\Document;

use Spy\Timeline\Model\ActionComponentInterface;
use Spy\Timeline\Model\ComponentInterface;
use Spy\TimelineBundle\Document\Action as BaseAction;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document
 */
class Action extends BaseAction
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\ReferenceMany(targetDocument="ActionComponent", cascade={"all"})
     */
    protected $actionComponents;

    /**
     * @ODM\ReferenceOne(targetDocument="Component")
     */
    protected $subject;
    public function __construct()
    {
        $this->actionComponents = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Add actionComponent
     *
     * @param Spy\Timeline\Model\ActionComponentInterface $actionComponent
     */
    public function addActionComponent(ActionComponentInterface $actionComponent)
    {
        $this->actionComponents[] = $actionComponent;
    }

    /**
     * Remove actionComponent
     *
     * @param Yo\UrBundle\Document\ActionComponent $actionComponent
     */
    public function removeActionComponent(\Yo\UrBundle\Document\ActionComponent $actionComponent)
    {
        $this->actionComponents->removeElement($actionComponent);
    }

    /**
     * Get actionComponents
     *
     * @return Doctrine\Common\Collections\Collection $actionComponents
     */
    public function getActionComponents()
    {
        return $this->actionComponents;
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

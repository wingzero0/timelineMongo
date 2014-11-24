<?php

namespace Yo\UrBundle\Document;

use Spy\TimelineBundle\Document\ActionComponent as BaseActionComponent;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document
 */
class ActionComponent extends BaseActionComponent
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\ReferenceOne(targetDocument="Action")
     */
    protected $action;

    /**
     * @ODM\ReferenceOne(targetDocument="Component")
     */
    protected $component;

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
     * Set component
     *
     * @param Yo\UrBundle\Document\Component $component
     * @return self
     */
    public function setComponent(\Yo\UrBundle\Document\Component $component)
    {
        $this->component = $component;
        return $this;
    }

    /**
     * Get component
     *
     * @return Yo\UrBundle\Document\Component $component
     */
    public function getComponent()
    {
        return $this->component;
    }
}

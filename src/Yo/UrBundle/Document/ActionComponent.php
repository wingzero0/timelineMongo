<?php

namespace Yo\UrBundle\Document;

use Spy\Timeline\Model\ActionInterface;
use Spy\Timeline\Model\ComponentInterface;
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
     * Set component
     *
     * @param Spy\Timeline\Model\ComponentInterface $component
     * @return self
     */
    public function setComponent(ComponentInterface $component)
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

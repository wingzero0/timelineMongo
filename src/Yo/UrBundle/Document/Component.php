<?php

namespace Yo\UrBundle\Document;

use Spy\TimelineBundle\Document\Component as BaseComponent;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document
 */
class Component extends BaseComponent
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }
}

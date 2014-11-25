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
     * @ODM\String
     */
    protected $name;

    public function getName(){
    	return $this->name;
    }
    public function setName($name){
    	$this->name = $name;
    	return $this;
    }
}

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

    /**
     * @ODM\Int;
     */
    protected $loginCount;

    public function getId(){
        return $this->id;
    }

    public function getName(){
    	return $this->name;
    }
    public function setName($name){
    	$this->name = $name;
    	return $this;
    }
    public function getLoginCount(){
        return $this->loginCount;
    }
    public function setLoginCount($count){
        $this->loginCount = $count;
        return $this;
    }
}

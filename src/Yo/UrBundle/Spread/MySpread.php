<?php

namespace Yo\UrBundle\Spread;

use JMS\Serializer\SerializerInterface;
use Spy\Timeline\Spread\SpreadInterface;
use Spy\Timeline\Model\ActionInterface;
use Spy\Timeline\Spread\Entry\EntryCollection;
use Spy\Timeline\Spread\Entry\EntryUnaware;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

class MySpread implements SpreadInterface
{
    private $logger;
    public function __construct(LoggerInterface $logger, SerializerInterface $serializer){
        $this->logger = $logger;
        $this->serializer = $serializer;
    }
    public function supports(ActionInterface $action)
    {
        // here you define what actions you want to support, you have to return a boolean.
        $logger = $this->logger;
        $logger->info("action subject name:" . $action->getSubject()->getName());
        $logger->info("serializer:" . $this->serializer->serialize($action->getSubject(), 'json'));

        return true;
        if ($action->getSubject()->getName() == "chucknorris") {
            return true;
        }

        return false;
    }

    public function process(ActionInterface $action, EntryCollection $coll)
    {
        // adding steven seagal to be informed

        $coll->add(new EntryUnaware('\User', 'steven seagal'));

        // get all other users
        // $users = MyBestClass::MyBestMethodToGetNerds();

        // foreach ($users as $user) {
        //     $coll->add(new EntryUnaware(get_class($user), $user->getId()));
        // }
    }
}
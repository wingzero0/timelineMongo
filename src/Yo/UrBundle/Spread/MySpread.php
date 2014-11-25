<?php

namespace Yo\UrBundle\Spread;

use Spy\Timeline\Spread\SpreadInterface;
use Spy\Timeline\Model\ActionInterface;
use Spy\Timeline\Spread\Entry\EntryCollection;
use Spy\Timeline\Spread\Entry\EntryUnaware;

class MySpread implements SpreadInterface
{
    public function supports(ActionInterface $action)
    {
        // here you define what actions you want to support, you have to return a boolean.
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
        $users = MyBestClass::MyBestMethodToGetNerds();

        foreach ($users as $user) {
            $coll->add(new EntryUnaware(get_class($user), $user->getId()));
        }
    }
}
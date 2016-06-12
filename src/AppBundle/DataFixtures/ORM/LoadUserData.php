<?php

namespace AppBundle\dataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface {
    
    const USERNAME = 'username';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const ENABLED = 'enabled';


    
    
    public function load(ObjectManager $manager) {
        $users = array(
                    array(
                        static::USERNAME => 'imen',
                        static::EMAIL => 'imenidriss@live.fr',
                        static::PASSWORD => 'azerty',
                        static::ENABLED => true
                    ),
                    array(
                        static::USERNAME => 'tiny',
                        static::EMAIL => 'tiny@live.fr',
                        static::PASSWORD => 'azerty',
                        static::ENABLED => false
                    ),
            
                );
        
        foreach ($users as $user){
            $userObj = new User();
            $userObj->setUsername($user[static::USERNAME]);
            $userObj->setEmail($user[static::EMAIL]);
            $userObj->setPlainPassword($user[static::PASSWORD]);
            $userObj->setEnabled($user[static::ENABLED]);
 
            $manager->persist($userObj);
        }
        $manager->flush();
    }
    public function getOrder() {
        return 1;
    }
}




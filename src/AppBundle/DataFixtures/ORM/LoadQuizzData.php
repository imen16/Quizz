<?php

namespace AppBundle\dataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Quizz;

class LoadQuizzData extends AbstractFixture implements OrderedFixtureInterface {
    
    const NOM = 'nom';
    const DIFFICULTE = 'difficulte';


    public function load(ObjectManager $manager) {
        $quizzs = array(
                    array(
                      static::NOM => 'quizz php',
                      static::DIFFICULTE => 'facile'

                    ),
                    array(
                      static::NOM => 'quizz html5',
                      static::DIFFICULTE => 'facile'

                    ),
                );
        
        foreach ($quizzs as $quizz){
            $quizzObj = new Quizz();
            $quizzObj->setNom($quizz[static::NOM]);
            $quizzObj->setDifficulte($quizz[static::DIFFICULTE]);
            $manager->persist($quizzObj);
        }
        $manager->flush();
    }
    public function getOrder() {
        return 20;
    }
}



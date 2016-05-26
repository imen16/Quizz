<?php

namespace AppBundle\dataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Reponse;

class LoadReponseData extends AbstractFixture implements OrderedFixtureInterface {
    
    const NOM = 'nom';
    const IS_GOOD = 'isGood';
    const QUESTION = 'question';

        public function load(ObjectManager $manager) {
        $reponses = array(
                    array(
                       static::NOM => 'Page Helper Process',
                       static::IS_GOOD => false,
                       static::QUESTION => $this->getReference('ref-que-signifie-php')
                    ),
                    array(
                       static::NOM => 'Programming Home Pages',
                       static::IS_GOOD => false,
                       static::QUESTION => $this->getReference('ref-que-signifie-php')
                    ),
                    array(
                       static::NOM => 'PHP: Hypertext Preprocessor',
                       static::IS_GOOD => true,
                       static::QUESTION => $this->getReference('ref-que-signifie-php')
                    ),
                );
        
        foreach ($reponses as $reponse){
            $reponseObj = new Reponse();
            $reponseObj->setNom($reponse[static::NOM]);
            $reponseObj->setIsGood($reponse[static::IS_GOOD]);
            $reponseObj->setQuestion($reponse[static::QUESTION]);
            $manager->persist($reponseObj);
        }
        $manager->flush();
    }
    public function getOrder() {
        return 30;
    }
}



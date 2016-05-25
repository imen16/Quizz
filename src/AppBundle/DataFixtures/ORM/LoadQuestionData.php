<?php

namespace AppBundle\dataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Question;

class LoadQuestionData extends AbstractFixture implements OrderedFixtureInterface {
    
    const NOM_QUESTION = 'nomQuestion';
    const CATEGORIE = 'categorie';
    
    public function load(ObjectManager $manager) {
        $questions = array(
                            array(
                               static::NOM_QUESTION => 'Que donne var_dump($a, $b)?',
                               static::CATEGORIE => $this->getReference('ref-php')
                            ),
                            array(
                               static::NOM_QUESTION => 'Que signifie PHP ?',
                               static::CATEGORIE => $this->getReference('ref-php')
                            ),
                        );
        
        foreach ($questions as $question){
            $questionObj = new Question();
            $questionObj->setNomQuestion($question[static::NOM_QUESTION]);
            $questionObj->setCategorie($question[static::CATEGORIE]);
            $manager->persist($questionObj);
        }
        $manager->flush();
    }
    public function getOrder() {
        return 10;
    }


}

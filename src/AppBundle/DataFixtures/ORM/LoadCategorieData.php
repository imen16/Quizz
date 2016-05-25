<?php

namespace AppBundle\dataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Categorie;


class LoadCategorieData extends AbstractFixture implements OrderedFixtureInterface {
    
    const NOM = 'nom';
    const REF = 'ref';


    public function load(ObjectManager $manager) {
        $categories = array(
                            array(
                               static::NOM => 'php',
                               static::REF => 'ref-php'
                            ),
                            array(
                               static::NOM => 'symfony',
                               static::REF => 'ref-symfony'
                            ),
                            array(
                               static::NOM => 'html5',
                               static::REF => 'ref-html5'
                            )
                        );
        
        foreach ($categories as $categorie){
            $categorieObj = new Categorie();
            $categorieObj->setNom($categorie[static::NOM]);
            $manager->persist($categorieObj);
            $this->setReference($categorie[static::REF], $categorieObj);
        }
        $manager->flush();
    }
    public function getOrder() {
        return 1;
    }


}

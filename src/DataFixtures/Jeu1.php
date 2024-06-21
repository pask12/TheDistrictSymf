<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        // categorie

        $Pizza = new Categorie();
        $Pizza->setLibelle("Pizza");
        $Pizza->setImage("pizza_cat.jpg");
        $Pizza->setActive("1");
        $manager->persist($Pizza);
        
        $Burger = new Categorie();
        $Burger->setLibelle("Burger");
        $Burger->setImage("burger_cat.jpg");
        $Burger->setActive("1");
        $manager->persist($Burger);
        
        $Wraps = new Categorie();
        $Wraps->setLibelle("Wrap");
        $Wraps->setImage("wrap_cat.jpg");
        $Wraps->setActive("1");
        $manager->persist($Wraps);

        $Pasta = new Categorie();
        $Pasta->setLibelle("Pasta");
        $Pasta->setImage("pasta_cat.jpg");
        $Pasta->setActive("1");
        $manager->persist($Pasta);

        $Sandwich = new Categorie();
        $Sandwich->setLibelle("Sandwich");
        $Sandwich->setImage("sandwich_cat.jpg");
        $Sandwich->setActive("1");
        $manager->persist($Sandwich);

        $Asian_Food = new Categorie();
        $Asian_Food->setLibelle("Asian Food");
        $Asian_Food->setImage("asian_food_cat.jpg");
        $Asian_Food->setActive("0");
        $manager->persist($Asian_Food); 

        $Salade = new Categorie();
        $Salade->setLibelle("Salade");
        $Salade->setImage("salade_cat.jpg");
        $Salade->setActive("1");
        $manager->persist($Salade); 

        $Veggie = new Categorie();
        $Veggie->setLibelle("Veggie");
        $Veggie->setImage("veggie_cat.jpg");
        $Veggie->setActive("1");
        $manager->persist($Veggie);

       

        


        $manager->flush();
        
    }
}

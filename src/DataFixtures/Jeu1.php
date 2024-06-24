<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Plat;
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
        
        $Wrap = new Categorie();
        $Wrap->setLibelle("Wrap");
        $Wrap->setImage("wrap_cat.jpg");
        $Wrap->setActive("1");
        $manager->persist($Wrap);

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

       
        // plat


        $District_Burger = new Plat();
        $District_Burger->setLibelle("District Burger");
        $District_Burger->setDescription("boulanger, deux steaks de 80g (origine française), de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits.");
        $District_Burger->setPrix("8.00");
        $District_Burger->setImage("hamburger.jpg");
        $District_Burger->setActive("1");
        $District_Burger->setCategorie($Burger);
        $manager->persist($District_Burger);

        $Pizza_Bianca = new Plat();
        $Pizza_Bianca->setLibelle("Pizza Bianca");
        $Pizza_Bianca->setDescription("Une pizza fine et croustillante garnie de crème mascarpone légèrement citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.");
        $Pizza_Bianca->setPrix("14.00");
        $Pizza_Bianca->setImage("pizza-salmon.png");
        $Pizza_Bianca->setActive("1");
        $Pizza_Bianca->setCategorie($Pizza);
        $manager->persist($Pizza_Bianca);

        $Buffalo_Chicken_Wrap= new Plat();
        $Buffalo_Chicken_Wrap->setLibelle("Buffalo Chicken Wrap");
        $Buffalo_Chicken_Wrap->setDescription("Du bon filet de poulet mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.");
        $Buffalo_Chicken_Wrap->setPrix("5.00");
        $Buffalo_Chicken_Wrap->setImage("buffalo-chicken.webp");
        $Buffalo_Chicken_Wrap->setActive("1");
        $Buffalo_Chicken_Wrap->setCategorie($Wrap);
        $manager->persist($Buffalo_Chicken_Wrap);

        $Cheeseburger= new Plat();
        $Cheeseburger->setLibelle("Cheeseburger");
        $Cheeseburger->setDescription("Burger composé d’un bun’s du boulanger, de salade, oignons rouges, pickles, oignon confit, tomate, d’un steak d’origine Française, d’une tranche de cheddar affiné, et de notre sauce maison.");
        $Cheeseburger->setPrix("8.00");
        $Cheeseburger->setImage("cheesburger.jpg");
        $Cheeseburger->setActive("1");
        $Cheeseburger->setCategorie($Burger);
        $manager->persist($Cheeseburger);

        $Spaghetti_aux_légumes= new Plat();
        $Spaghetti_aux_légumes->setLibelle("Spaghetti aux légumes");
        $Spaghetti_aux_légumes->setDescription("Un plat de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide.");
        $Spaghetti_aux_légumes->setPrix("10.00");
        $Spaghetti_aux_légumes->setImage("spaghetti-legumes.jpg");
        $Spaghetti_aux_légumes->setActive("1");
        $Spaghetti_aux_légumes->setCategorie($Pasta);
        $manager->persist($Spaghetti_aux_légumes);

        $Salade_César= new Plat();
        $Salade_César->setLibelle("Salade César");
        $Salade_César->setDescription("Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.");
        $Salade_César->setPrix("7.00");
        $Salade_César->setImage("cesar_salad.jpg");
        $Salade_César->setActive("1");
        $Salade_César->setCategorie($Salade);
        $manager->persist($Salade_César);

        $Pizza_Margherita= new Plat();
        $Pizza_Margherita->setLibelle("Pizza Margherita");
        $Pizza_Margherita->setDescription("Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison, une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre...");
        $Pizza_Margherita->setPrix("14.00");
        $Pizza_Margherita->setImage("pizza-margherita.jpg");
        $Pizza_Margherita->setActive("1");
        $Pizza_Margherita->setCategorie($Pizza);
        $manager->persist($Pizza_Margherita);

        $Courgettes_farcies= new Plat();
        $Courgettes_farcies->setLibelle("Courgettes_farcies");
        $Courgettes_farcies->setDescription("Voici une recette équilibrée à base de courgettes, quinoa et champignons, 100% vegan et sans gluten!");
        $Courgettes_farcies->setPrix("8.00");
        $Courgettes_farcies->setImage("courgettes_farcies.jpg");
        $Courgettes_farcies->setActive("1");
        $Courgettes_farcies->setCategorie($Veggie);
        $manager->persist($Courgettes_farcies);

        $Lasagnes= new Plat();
        $Lasagnes->setLibelle("Lasagnes");
        $Lasagnes->setDescription("Découvrez notre recette des lasagnes, l'une des spécialités italiennes que tout le monde aime avec sa viande hachée et gratinée à l'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscade.");
        $Lasagnes->setPrix("12.00");
        $Lasagnes->setImage("lasagnes_viande.jpg");
        $Lasagnes->setActive("1");
        $Lasagnes->setCategorie($Pasta);
        $manager->persist($Lasagnes);

        $Tagliatelles_au_saumon= new Plat();
        $Tagliatelles_au_saumon->setLibelle("Tagliatelles au saumon");
        $Tagliatelles_au_saumon->setDescription("Découvrez notre recette délicieuse de tagliatelles au saumon frais et à la crème qui qui vous assure un véritable régal!");
        $Tagliatelles_au_saumon->setPrix("12.00");
        $Tagliatelles_au_saumon->setImage("tagliatelles_saumon.webp");
        $Tagliatelles_au_saumon->setActive("1");
        $Tagliatelles_au_saumon->setCategorie($Pasta);
        $manager->persist($Tagliatelles_au_saumon);




        $manager->flush();
        
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Model;
use App\Entity\Categorie;
use App\Entity\Carburant;
use App\Entity\Marque;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use PhpParser\Node\Expr\AssignOp\Mod;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //MARQUE
        $alfa = new Marque();
        $alfa->setName('Alfa Roméo');
        $manager->persist($alfa);

        $volkswagen = new Marque();
        $volkswagen->setName('Volkswagen');
        $manager->persist( $volkswagen);

        //CATEGORIE
        $suv = new Categorie();
        $suv->setName('SUV');
        $manager->persist($suv);

        $berline = new Categorie();
        $berline->setName('Berline');
        $manager->persist($berline);

        $citadine = new Categorie();
        $citadine->setName('Citadine');
        $manager->persist($citadine);

        $coupe = new Categorie();
        $coupe->setName('Coupé');
        $manager->persist($coupe);
        
        $break = new Categorie();
        $break->setName('Break');
        $manager->persist($break);

        $essence = new Carburant();
        $essence->setName('Essence');
        $manager->persist($essence);

        $gazol = new Carburant();
        $gazol->setName('Gazole');
        $manager->persist($gazol);

        $electrique = new Carburant();
        $electrique->setName('Electrique');
        $manager->persist($electrique);

        //Création de categorie enfant
        $compact = new Categorie();
        $compact->setName('Compact');
        $compact->setChildren($suv);
        $manager->persist($compact);

        $sport = new Categorie();
        $sport->setName('Sport');
        $sport->setChildren($berline);
        $manager->persist($sport);

        $familial = new Categorie('$citadine');
        $familial->setName('Familial');
        $familial->setChildren($suv);
        $manager->persist($familial);

        //Création de model
        $mile = new Model();
        $mile->setMarque($alfa);
        $mile->setCategorie($sport);
        $mile->setName('8C 2900 Mille Miglia');
        $mile->setCarburant($essence);
        $mile->setPrix(400000);
        $mile->setWeight(1600);
        $manager->persist($mile);

        $cox = new Model();
        $cox->setMarque($volkswagen);
        $cox->setCategorie($citadine);
        $cox->setName('Coccinelle 1966');
        $cox->setCarburant($essence);
        $cox->setPrix(20000);
        $cox->setWeight(800);
        $manager->persist($cox);

        $manager->flush();
    }
}

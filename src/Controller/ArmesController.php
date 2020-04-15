<?php

namespace App\Controller;

use App\Entity\Armes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArmesController extends AbstractController
{
     /**
     * @Route("/", name="armes")
     */
    public function index()
    {
        Armes::creerArme();

        $armes = Armes::$_armes;

        return $this->render('personnage/index.html.twig', ['armes' => $armes]);
    }

    /**
     * @Route("/arme/{nom}", name="display_arme")
     */
    public function show($nom){

        Armes::creerArme();
        $perso = Armes::recupererArmesParNom($nom);
        
        return $this->render('personnage/arme.html.twig', ['arme' => $arme]);

    }

}
<?php

namespace App\Entity;

class Armes {
    private $nom;
    private $degats;
    private $description;

    public static $_armes = [];

    public function __construct(Array $data){

        $this->hydrate($data);
        self::$_armes[] = $this;

    }

    private function hydrate(Array $data){

        foreach($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }

    }

    public function getNom() : String {
        return $this->nom;
    }

    public function setNom(String $nom) : Void {
        $this->nom = $nom;
    } 

    public function getDegats() : String {
        return $this->degats;
    }

    public function setDegats(String $job) : Void {
        $this->job = $job;
    }
    
    public function getDescription() : String {

        return $this->description;
    }

    public function setDescription(Bool $sexe) : Void {

        $this->sexe = $sexe;
    }



    public static function creerArme() {
        $set = [
            [
                'nom' => 'epee',
                'degat' => '8',
                'description' => 'Pour Frodon',

            ],
            [
                'nom' => 'hache',
                'degat' => '10',
                'description' => 'ça ne compte quand même que pour un',
            ],
            [
                'nom' => 'arc',
                'degat' => '7',
                'description' => '384...385...386',
            ]
        ];

        foreach($set as $perso){
            new Personnage($perso);
        }

    }

    public static function recupererPersoParNom(String $nom) : ?Personnage {
        foreach(self::$_personnages as $perso){
            if($perso->nom === $nom){
                return $perso;
            }
        }
        return null;
    }

}
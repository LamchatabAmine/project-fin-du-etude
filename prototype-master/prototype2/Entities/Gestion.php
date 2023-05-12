<?php

class Gestion{
    private $Id;
    private $Nom;
    private $Description;
    private $Projet;


    public function getId() {
        return $this->Id;
    }
    public function setId($id) {
        $this->Id = $id;
    }

    public function getNom() {
        return $this->Nom;
    }
    public function setNom($nom) {
        $this->Nom = $nom;
    }

    public function getDescription() {
        return $this->Description;
    }
    public function setDescription($Description) {
        $this->Description = $Description;
    }

    public function getProjet(){
        return $this->Projet;
    }

    public function setProjet($Projet){
        return $this->Projet = $Projet;
    }


}
?>
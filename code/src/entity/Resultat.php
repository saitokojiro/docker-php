<?php

namespace App\entity;

class Resultat
{
    public $id;
    public $nom;
    public $prenom;
    public $photo;
    public $categorie;
    public $profil;
    public $birth;
    public $passage;
    public $passageOne;
    public $passageTwo;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie): void
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * @param mixed $profil
     */
    public function setProfil($profil): void
    {
        $this->profil = $profil;
    }

    /**
     * @return mixed
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * @param mixed $birth
     */
    public function setBirth($birth): void
    {
        $this->birth = $birth;
    }

    /**
     * @return mixed
     */
    public function getPassage()
    {
        return $this->passage;
    }

    /**
     * @param mixed $passage
     */
    public function setPassage($passage): void
    {
        $this->passage = $passage;
    }

    /**
     * @return mixed
     */
    public function getPassageOne()
    {
        return $this->passageOne;
    }

    /**
     * @param mixed $passageOne
     */
    public function setPassageOne($passageOne): void
    {
        $this->passageOne = $passageOne;
    }

    /**
     * @return mixed
     */
    public function getPassageTwo()
    {
        return $this->passageTwo;
    }

    /**
     * @param mixed $passageTwo
     */
    public function setPassageTwo($passageTwo): void
    {
        $this->passageTwo = $passageTwo;
    }

}

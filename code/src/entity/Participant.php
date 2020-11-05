<?php
/*
 * id: Int
    -photo:Int
    -prenom: String
    -nom: String
    -date_de_naissance: DateTime
    -age: Interger
    -categorie: String
    -profil: String
    +nouveau_participant()
    +suppression_participant()
 * */

namespace App\entity;

use DateInterval;
use DateTime;
use Exception;


class Participant
{


    private int $id;
    private string $photo;
    private string $prenom;
    private string $nom;
    private DateTime $aniv;
    private string $email;
    private int $category;
    private int $profil;

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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     * @throws Exception
     */
    public function setPrenom($prenom)
    {
        if (!preg_match("/^[a-zA-Z]+$/", $prenom)) {
            throw new Exception('containe number');
        }
        $this->prenom = $prenom;
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
     * @throws Exception
     */
    public function setNom($nom)
    {
        if (!preg_match("/^[a-zA-Z]+$/", $nom)) {
            throw new Exception('containe number');
        }
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getAniv()
    {
        return $this->aniv;
    }

    /**
     * @param mixed $aniv
     * @throws Exception
     */
    public function setAniv($aniv): void
    {
        if (!preg_match("/^([0-9]{4})-([0-1][0-9])-([0-3][0-9])$/", $aniv)) {
            throw new Exception('containe number');
        }
        $date = DateTime::createFromFormat('Y-m-d', $aniv);
        $max = (new DateTime())->sub(new DateInterval('P100Y'));
        $min = (new DateTime())->sub(new DateInterval('P3Y'));

        if ($date < $max || $date > $min) {
            throw new Exception('containe number');
        }
        $this->aniv = $date;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @throws Exception
     */
    public function setEmail($email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('containe number');
        }

        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     * @throws Exception
     */
    public function setCategory($category): void
    {
        if (!preg_match("/^[0-9A]+$/", $category)) {
            throw new Exception('containe number');
        }
        $this->category = $category;
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
     * @throws Exception
     */
    public function setProfil($profil): void
    {
        if (!preg_match("/^[0-9A]+$/", $profil)) {
            throw new Exception('containe number');
        }
    }


    public function getAllVal()
    {
        return [
            'nom' => $this->getNom(),
            'prenom' => $this->getPrenom(),
        ];
    }

}
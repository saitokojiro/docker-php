<?php

namespace App\entity;

use DateTime;
use DateTimeInterface;
use Exception;

class Epreuve
{

    private int $id;
    private string $nom;
    private DateTime $date;
    private string $lieu;

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
        if (!preg_match("/^[a-zA-Z]+$/", $nom)) {
            throw new \InvalidArgumentException('containe number');
        }

        $this->nom = $nom;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return  self
     * @throws Exception
     */
    public function setDate(DateTimeInterface $dateloc): void
    {
        if (!preg_match("/^([0-9]{4})-([0-1][0-9])-([0-3][0-9])$/", $dateloc)) {
            throw new \InvalidArgumentException('containe number');
        }

        $date = DateTime::createFromFormat('Y-m-d', $dateloc);
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     */
    public function setLieu($lieu): void
    {
        if (!preg_match("/^[a-zA-ZÀ-ÿ0-9 \(\).-]{1,20}$/", $lieu)) {
            throw new \InvalidArgumentException('containe number');
        }
        $this->lieu = $lieu;
    }


}
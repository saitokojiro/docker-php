<?php
namespace App\Repository;

use App\Entity\Resultat;

interface ResultatsInterface
{
    public function find(int $id);
    public function findAll(Resultat $obj);
    public function findAllParticipantsEp(Resultat $obj);
    public function addParticipantsResult(Resultat $obj);

}
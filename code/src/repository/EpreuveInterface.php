<?php
namespace App\Repository;

use App\Entity\Epreuve;

interface EpreuveInterface
{
    public function find(int $id);
    public function findAll(Epreuve $obj);
    public function findAllParticipantsEp(Epreuve $obj);
    public function add(Epreuve $obj);

}
<?php
namespace App\Repository;

use App\Entity\Participants;

interface ParticipantsInterface
{
    public function find(int $id);
    public function findAll(Participants $obj);
    public function add(Participants $obj);

}
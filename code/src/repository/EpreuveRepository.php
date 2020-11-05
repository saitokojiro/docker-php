<?php

namespace App\repository;

use App\model;
use PDO;
use Pimple\Container;

class EpreuveRepository extends model\DatabaseModel
{
    public static $pdo;

    public function __construct()
    {
        self::$pdo = parent::getPdo();
    }

    public static function find(int $id)
    {
        $stmt = self::$pdo->prepare('SELECT * FROM participants WHERE id = ?');
        $stmt->execute(array($id));

        return $stmt->fetch();
    }

    public static function findAll()
    {
        $query = "SELECT e.id , nom ,c.categorie ,pa.profil, lieu, lifeDate , s.name_status   FROM epreuves e INNER JOIN categories c on e.categorie = c.id  INNER JOIN  profils pa on e.profil = pa.id INNER JOIN statustb s on e.status = s.id";
        $stmt = self::$pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findAllParticipantsEp(int $id)
    {
        $query = "SELECT p.id, p.photo, p.nom , p.prenom , p.date_de_naissance , r.epreuve_id  FROM resultat r INNER JOIN participants p on r.participant_id = p.id where r.epreuve_id = ?";
        $stmt = self::$pdo->prepare($query);
        $stmt->execute(array($id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($content)
    {
        if (!$content == null) {
            dump($content);
            $query = "insert into epreuves(nom, categorie, profil, lieu, lifeDate, status) value (?,?,?,?,?,?)";
            $stmt = self::$pdo->prepare($query);
            $stmt->execute(
                array(
                    $content->get('nom'),
                    $content->get('categorie'),
                    $content->get('profil'),
                    $content->get('Lieu'),
                    $content->get('lifeDate'),
                    $content->get('status'),
                )
            );
            $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

}
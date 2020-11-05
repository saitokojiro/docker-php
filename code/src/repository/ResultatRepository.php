<?php

namespace App\repository;

use App\model;
use PDO;
use Pimple\Container;

class ResultatRepository extends model\DatabaseModel
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

    public static function addParticipantsResult($content, $id)
    {
        /*SELECT p.id, r.epreuve_id  FROM resultat r INNER JOIN participants p on r.participant_id = p.id where r.epreuve_id = 1 AND p.nom = ? AND p.prenom = ? ;
            insert into resultat(epreuve_id, participant_id, nombre_passage, temps_one, temps_two) value (?, ?, ?, ?, ?);*/
        /*
                $query = "SELECT p.id, p.photo, p.nom , p.prenom , p.date_de_naissance , r.epreuve_id  FROM resultat r INNER JOIN participants p on r.participant_id = p.id where r.epreuve_id = ?";
                $stmt = self::$pdo->prepare($query);
                $stmt->execute(array($id));
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            */

        dump($content);
        if (!$content == null) {
            $query = "SELECT p.id FROM participants p where p.nom = ? AND p.prenom = ?";
            $stmt = self::$pdo->prepare($query);
            $queryAdd = "insert into resultat(epreuve_id, participant_id, nombre_passage, temps_one, temps_two) value (?,?,?,?,?)";
            $stmtAdd = self::$pdo->prepare($queryAdd);
            foreach ($content as $line) {
                /*dump($line->id);
                dump($line->profil);
                dump($line->nom);
                dump($line->prenom);
                dump($line->categorie);
                dump($line->email);
                dump($line->date_de_naissance);
                dump($line->passage);
                dump($line->passage1);
                dump($line->passage2);*/
                $stmt->execute(array($line->nom, $line->prenom));
                $test = $stmt->fetchAll(PDO::FETCH_ASSOC);

                for ($i = 0; $i < count($test); $i++) {
                    $idp = json_decode(json_encode($test))[$i]->id;
                    $stmtAdd->execute(array($id, $idp, $line->passage, $line->passage1, $line->passage2));
                }
            }
        }
    }


}
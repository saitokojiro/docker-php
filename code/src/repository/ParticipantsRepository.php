<?php

namespace App\repository;

use App\model;
use mysql_xdevapi\Result;
use PDO;
use Pimple\Container;

class ParticipantsRepository extends model\DatabaseModel
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
        $query = "SELECT p.id , nom , prenom, photo ,c.categorie ,pa.profil , email , date_de_naissance  FROM participants p INNER JOIN categories c on p.categorie = c.id  INNER JOIN  profils pa on p.profil = pa.id";
        $stmt = self::$pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function add($content)
    {
        if (!$content == null) {
            dump($content);
            $query = "insert into participants(nom, prenom,date_de_naissance,email,categorie, profil,photo) value (?,?,?,?,?,?,?)";
            $stmt = self::$pdo->prepare($query);
            $stmt->execute(
                array(
                    $content->get('nom'),
                    $content->get('prenom'),
                    $content->get('birth'),
                    $content->get('email'),
                    $content->get('categorie'),
                    $content->get('profil'),
                    $content->get('img'),
                )
            );
            $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
}
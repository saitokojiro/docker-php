<?php
use App\model\DatabaseModel;
use PHPUnit\Framework\TestCase;

class DatabaseModelTest extends TestCase
{

    public function testemail()
    {
        $dbemail = new DatabaseModel("'mysql:host=localhost;dbname=compets_management; charset=utf8', 'root', ''");
        $dbemail->email(1);
    }
}
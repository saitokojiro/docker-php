<?php
use App\entity\Epreuve;
use PHPUnit\Framework\TestCase;

class EpreuveTest extends TestCase
{
    public function testvalidNom()
    {
        $name = new Epreuve();
        $name->setNom("test");
        $this->assertSame("test",$name->getNom());
    }

    public function testInvalidNom()
    {
        $this->expectException(\InvalidArgumentException::class);
        $name = new Epreuve();
        $name->setNom("test51s");

    }

    public function testValidDate()
    {
        $dateEndInsc =  new Epreuve();
        $dateEndInsc->setDate(date("d-m-Y", strtotime("10-05-2021")));

        $this->assertSame(date("d-m-Y", strtotime("10-05-2021")), $dateEndInsc->getDate());


    }

    public function testInvalidDate()
    {
        $this->expectException(\InvalidArgumentException::class);
        $dateEndInsc = new Epreuve();
        $dateEndInsc->setDate(date("d-m-Y", strtotime("10-05-2020")));

    }


}
<?php

use App\entity\Passage;
use PHPUnit\Framework\TestCase;

class PassageTest extends TestCase
{
    public function testNb()
    {
        $nbPassage = new Passage();
        $nbPassage->setNb(2);

        $this->assertSame(2, $nbPassage->getNb());

    }
    public function testInvalidNb()
    {
        $this->expectException(\InvalidArgumentException::class);
        $dateEndInsc = new Passage();
        $dateEndInsc->setNb(0);

    }


    public function testTime(){
        $timePassge = new Passage();
        $timePassge->setTimePassge();
        $this->assertSame(0, $timePassge->getTimePassage());
    }
}
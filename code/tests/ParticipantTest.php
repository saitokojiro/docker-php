<?php
use App\entity\Participant;
use PHPUnit\Framework\TestCase;

class ParticipantTest extends TestCase
{
    public function testvalidNom()
    {
        $name = new Participant();
        $name->setNom("test");
        $this->assertSame("test",$name->getNom());
    }

    public function testInvalidNom()
    {
        $this->expectException(\InvalidArgumentException::class);
        $name = new Participant();
        $name->setNom("test551s");

    }





    public function testValidMessageUser()
    {
        //$this->expectException(\LogicException::class);

        $pdo = $this->getMockBuilder(\pdo::class)
            ->disableOriginalConstructor()
            ->getMock();

        $pdo->method('exec')->willReturn(true);

        $messageUser = new Participant();
        $messageUser->setNom("Jean");

        $this->assertTrue($pdo->exec($messageUser->getNom()));
        //$this->assertSame("it's very fun", $messageUser->getMessage());

    }
    public function testInValidMessageUser()
    {
        $this->expectException(\LogicException::class);

        $pdo = $this->getMockBuilder(\pdo::class)
            ->disableOriginalConstructor()
            ->getMock();

        $pdo->method('exec')->willReturn(true);

        $messageUser = new Participant();
        $messageUser->setNom("jean5");

        $this->assertTrue($pdo->exec($messageUser->getNom()));
        //$this->assertSame("it's very fun", $messageUser->getMessage());

    }





}
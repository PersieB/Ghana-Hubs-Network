<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

include_once "database/hub_eventValidation.php";
  //database configuration meal

final class hubEventTest extends TestCase{
    
    public function testHubClassExists(): void{
        $this->assertTrue(class_exists('HubEventMeet'));
    }

    public function testUVClassCreatesDefault(): void{
        $this->assertInstanceOf(HubEventMeet::class, new HubEventMeet);
    }

    public function testvalidateUrl(): void{
        $obj = new HubEventMeet();
        $result = $obj->validateUrl("https://www.ashesi.edu.gh/");
        $this->assertTrue($result);
    }

    public function testvalidateTime(): void{
        $obj = new HubEventMeet();
        $result = $obj->validateTime("23:35");
        $this->assertTrue($result);
    }

    public function testvalidateDate(): void{
        $obj = new HubEventMeet();
        $result = $obj->validateDate("2012-09-21");
        $this->assertTrue($result);
    }



}
?>
<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

include_once "database/CRUD.php";
  //database configuration meal

final class CRUDTest extends TestCase{
    
    public function testCRUDClassExists(): void{
        $this->assertTrue(class_exists('CRUD'));
    }

    public function testCRUDClassCreatesDefault(): void{
        $this->assertInstanceOf(CRUD::class, new CRUD);
    }


}
?>
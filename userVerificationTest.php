<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

include_once "database/userVerification.php";
  //database configuration meal

final class userVerificationTest extends TestCase{
    
    public function testUVClassExists(): void{
        $this->assertTrue(class_exists('userVerification'));
    }

    public function testUVClassCreatesDefault(): void{
        $this->assertInstanceOf(userVerification::class, new userVerification);
    }

    public function testvalidateMail(): void{
        $obj = new userVerification();
        $result = $obj->validateEmail("persiebrown@gmail.com");
        $this->assertTrue($result);
    }

    public function testvalidatePhone(): void{
        $obj = new userVerification();
        $result = $obj->validatePhone("0277776087");
        $this->assertTrue($result);
    }

    public function testvalidatePassword(): void{
        $obj = new userVerification();
        $result = $obj->validatePassword("boy", "boy");
        $this->assertTrue($result);
    }



}
?>
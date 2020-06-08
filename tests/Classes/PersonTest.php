<?php
namespace App\Tests\Classes;

use App\Classes\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testValidPersonName()
    {
        $robbie = new Person('Robbie', 'Cicero');
        $this->assertEquals($robbie->get_full_name(), 'Robbie Cicero');
    }

    public function testInvalidCharacterLengthName()
    {
        $this->expectException(\InvalidArgumentException::class);
        $robbie = new Person('TOOLONGANAMETOSUPPORT', 'Cicero');
    }
}

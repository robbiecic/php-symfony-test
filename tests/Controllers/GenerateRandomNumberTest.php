<?php
namespace App\Tests\Controllers;

use App\Controller\GenerateRandomNumber;
use PHPUnit\Framework\TestCase;

class GenerateRandomNumberTest extends TestCase
{
    public function testReturnRandomInteger()
    {
        $GenRandomObject = new GenerateRandomNumber();
        $result = $GenRandomObject->returnRandomInteger(0, 100);
        $this->assertEquals(0, $result, 'Between 0 and 100', 100);
    }
}

<?php

use Src\Models\Maths;

class MathsTest extends PHPUnit\Framework\TestCase
{
    public function testDouble(){
        $this->assertEquals(4,Maths::double(2));
    }

}
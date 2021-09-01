<?php

use PHPUnit\Framework\TestCase;

class StupidTest extends TestCase
{
    public function testTrueIsTrue()
    {
        $foo = false;
        $this->assertFalse($foo);
    }
}
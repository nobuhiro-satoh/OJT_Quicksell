<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\URL;

class URLTest extends TestCase
{
    /**
     * PHP Unit Test
     * Exercise
     */
    public function testSluggifyReturnsSluggifiedString()
    {
        $originalString = 'This string will be sluggified';
        $expectedResult = 'this-string-will-be-sluggified';
        
        $url = new URL();
        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * PHP Unit Test
     * Homework 1
     * 
     * Numbers don't change.
     */
    public function testSluggifyReturnsSluggifiedStringContainsNumber()
    {
        $originalString = 'This1 2string34 will 5 be 66sluggified';
        $expectedResult = 'this1-2string34-will-5-be-66sluggified';

        $url = new URL();
        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }
     
    /**
     * PHP Unit Test
     * Homework 1
     * 
     * Special characters (~!@#$%^&*()_+) change to empty string ''.
     */
    public function testSluggifyReturnsSluggifiedStringContainsSpecialCharacters()
    {
        $originalString = 'This~! @string#$% ^will&* be() _+-sluggified';
        $expectedResult = 'this-string-will-be-sluggified';

        $url = new URL();
        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * PHP Unit Test
     * Homework 2
     * 
     * 'ä' changes to 'a'.
     * 'ö' changes to 'o'.
     */
    public function testSluggifyReturnsSluggifiedStringContainsNonEnglishCharacters()
    {
        $originalString = 'öriginäl string';
        $expectedResult = 'original-string';
        
        $url = new URL();
        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }
    
    /**
     * PHP Unit Test
     * Homework 3
     * 
     * empty string'' don't change
     */
    public function testSluggifyReturnsEmptyString()
    {
        $originalString = '';
        $expectedResult = '';
        
        $url = new URL();
        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * PHP Unit Test
     * Homework 4
     * 
     * String more than $maxLength characters
     * 
     * Characters after the $maxLength character are deleted
     */
    public function testSluggifyReturnsMoreStrings()
    {
        $originalString = 'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 1234567890 abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $expectedResult = 'abcdefghijklmnopqrstuvwxyz-abcdefghijklmnopqrstuvwxyz-1234567890-abcdefghijklmnopqrstuvwxyz-abcd';
        
        $url = new URL();
        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }
}
?>

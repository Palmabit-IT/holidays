<?php

namespace Palmabit\Holidays\Test\Country\it_IT;

use Palmabit\Holidays\Country\it_IT\Day;

class DayTest extends \PHPUnit_Framework_TestCase
{
    public function test_can_cerate_new_day()
    {
        $this->assertInstanceOf('\Palmabit\Holidays\Country\it_IT\Day', new Day(2015));
    }

}

<?php

namespace Palmabit\Holidays\Test;

use Palmabit\Holidays\Holidays;
use Palmabit\Holidays\Exceptions\HolidaysException;

class HolidaysTest extends \PHPUnit_Framework_TestCase
{
    public function test_can_cerate_new_holiday()
    {
        $this->assertInstanceOf('\Palmabit\Holidays\Holidays', new Holidays());
    }

    public function invalidYears()
    {
        return [
          'empty' => [''],
          'a' => ['a'],
          'ab' => ['ab'],
          'abc' => ['abc'],
          'digit' => [1],
          'double-digit' => [12],
          'triple-digit' => [123],
          'bool' => [true],
          'array' => [['year']],
          'year_before_1000' => [999],
          'year_after_2999' => [3000],
      ];
    }

    public function validYears()
    {
        return [
                'year_between_1000_and_2999' => [2016],
                'null' => [null],
            ];
    }

    /**
     * @dataProvider invalidYears
     */
    public function test_set_year_raises_exception_on_invalid_year($year)
    {
        $this->setExpectedException('InvalidArgumentException');
        Holidays::setYear($year);
    }

    /**
     * @dataProvider validYears
     */
    public function test_set_year_succeeds_on_valid_year($year)
    {
        Holidays::setYear($year);
        $it_holidays = new Holidays();
        $this->assertInstanceOf('\Palmabit\Holidays\Holidays', $it_holidays);
    }

    public function test_set_current_year_on_instantiation_with_no_global_year_and_no_argument()
    {
        $it_holidays = new Holidays();
        $this->assertEquals(Date('Y'), $it_holidays->getYear());
    }

    public function test_instantiation_with_no_global_year_but_with_argument_succeeds()
    {
        $year_expected = 2016;
        $it_holidays = new Holidays($year_expected);
        $this->assertEquals($year_expected, $it_holidays->getYear());
    }

    public function test_can_set_country()
    {
        $it_holidays = (new Holidays(2015))->setCountry('it_IT');
        $this->assertInstanceOf('\Palmabit\Holidays\Country\it_IT\Day', $it_holidays->getCountryFactory());
    }

    public function test_set_country_raises_exception_on_invalid_country()
    {
        $this->setExpectedException('Palmabit\Holidays\Exceptions\HolidaysException');
        $it_holidays = (new Holidays(2015))->setCountry('fr_Fr');
    }

}

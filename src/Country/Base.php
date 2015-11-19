<?php

namespace Palmabit\Holidays\Country;

use Carbon\Carbon;

abstract class Base
{
    protected $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function convertDate()
    {
        $holidays = array_merge([], $this->getEasterDays());
        foreach ($this->getHolidays() as $day => $day_name)
        {
          $holidays[Carbon::parse($this->year . '-' . $day)->toDateString()] = $day_name;
        }
        ksort($holidays);
        return $holidays;
    }

    public function getEasterDays()
    {
      return [];
    }

    public function getHolidays()
    {
        return  [];
    }
}

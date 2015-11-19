<?php

namespace Palmabit\Holidays\Country\it_IT;

use Palmabit\Holidays\Country\Base;
use Carbon\Carbon;

class Day extends Base
{

    public function getEasterDays()
    {
      $easter_days[ Carbon::parse($this->year . '-03-21')->addDays(easter_days($this->year))->toDateString() ] = 'Pascqua';
      $easter_days[ Carbon::parse($this->year . '-03-21')->addDays(easter_days($this->year)+1)->toDateString() ] = 'Lunedì dell\'angelo';
      return $easter_days;
    }

    public function getHolidays()
    {
        return  [
          '01-01' => 'Capodanno',
          '01-06' => 'Epifania',
          '04-25' => 'Liberazione',
          '05-01' => 'Festa Lavoratori',
          '06-02' => 'Festa della Repubblica',
          '08-15' => 'Ferragosto',
          '11-01' => 'Tutti Santi',
          '12-08' => 'Immacolata',
          '12-25' => 'Natale',
          '12-26' => 'St. Stefano',
        ];
    }
}

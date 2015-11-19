<?php

namespace Palmabit\Holidays;
use Palmabit\Holidays\Exceptions\HolidaysException;

class Holidays
{

    const DEFAULT_LOCALE = 'it_IT';

    /** @var string year */
    private static $year = null;

    /** @var string The instance $year, settable once per new instance */
    private $instanceYear;

    protected $factory;

    /**
     * Create a new Holiday Instance
     */
     public function __construct($year = null)
     {
         if ($year === null) {
             if (self::$year === null) {
                $this->instanceYear = Date('Y');
             }
         } else {
             self::validateYear($year);
             $this->instanceYear = $year;
         }
     }

     /**
      * Sets the year for all future new instances.
      *
      * @param $year string
      */
     public static function setYear($year)
     {
         self::validateYear($year);
         self::$year = $year;
     }

     private static function validateYear($year)
     {
         if ($year === null) {
           return true;
         }
         if (!is_integer($year)) {
             throw new \InvalidArgumentException('Year is not valid.');
         }
         if($year<1000 || $year>2999){
             throw new \InvalidArgumentException('Year "'.$year.'" is not valid, accepted values are between 1000 and 2900.');
         }

         return true;
     }

     /**
      * Returns the year that has been defined.
      *
      * @return null|string
      */
      public function getYear()
      {
          return ($this->instanceYear) ? $this->instanceYear : self::$year;
      }

      public function all()
      {
          return $this->factory->convertDate();
      }

      public function setCountry ($locale)
      {
        if (!$this->getCountryFactory()) {
            $this->setCountryFactory($locale);
        }
        return $this;
      }

      /**
       * Sets the Country Factory which will create the Country from locale.
       *
       * @param CountryFactory $factory
       *
       * @return $this
       */
      public function setCountryFactory($locale)
      {

          $countryClass = 'Palmabit\Holidays\Country\\' . ($locale ? sprintf('%s\%s', $locale, 'Day') : sprintf('\%s', self::DEFAULT_LOCALE));
          if (!class_exists($countryClass)) {
            throw new HolidaysException( $locale . ' locale is not supported yet.');
          }
          $classname = 'Class'.$countryClass;
          $this->factory = new $countryClass($this->getYear());

          return $this;
      }


      /**
       * Returns the Factory responsible for creating Country.
       *
       * @return EntityFactory
       */
      public function getCountryFactory()
      {
          return $this->factory;
      }


}

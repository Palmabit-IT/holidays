# Holidays

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]


Country holidays days.
NOTE: Only italian holidays days are available for now.

## Install

Via Composer

``` bash
$ composer require palmabit/holidays
```

## Usage

``` php
$year = 2025;

/*
 * Current year is set if no argument are passed.
 */
$holidays = new Palmabit\Holidays\Holidays($year);
```

or

``` php
Holidays::setYear($year);
$holidays = new Holidays();
```

then

``` php
$it_holidays = new Palmabit\Holidays\Holidays(2016);

/*
 * return an array of all italian holidays
 */
 $it_holidays = $holidays
               ->setCountry('it_IT')
               ->all();

```



## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## TODO
* Improve coverage
* Add other country holidays days

## Security

If you discover any security related issues, please email hello@palmabit.com instead of using the issue tracker.

## Credits

- [Palmabit Srl][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/palmabit/holidays.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Palmabit-IT/holidays/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Palmabit-IT/holidays.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Palmabit-IT/holidays.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/Palmabit-IT/holidays.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/palmabit/holidays
[link-travis]: https://travis-ci.org/Palmabit-IT/holidays
[link-scrutinizer]: https://scrutinizer-ci.com/g/Palmabit-IT/holidays/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Palmabit-IT/holidays
[link-author]: https://github.com/Palmabit-IT
[link-contributors]: ../../contributors

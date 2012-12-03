# Relative Time

**This class is based in a class made by Martin Angelov in tutorialzine.com**

Generate a relative time based on date or time passed.

## Installation

**Run a bundle install**
```php
php artisan bundle:install relativetime
```

**Register the bundle in application/bundles.php**
```php
return array(

	'relativetime' => array('auto' => true)

);
```

## Examples

```php

//Assuming today is 2012-10-01 12:00:00

echo RelativeTime::get(); // prints "just now"
echo RelativeTime::get('2012-07-01'); // prints "3 months ago"
echo RelativeTime::get('+15 seconds'); //prints "15 seconds from now"
echo RelativeTime::get('2013-03-01'); //prints "5 months from now"
// and so on
```

Try yourself!
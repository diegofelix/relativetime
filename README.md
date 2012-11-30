# Relative Time

**This class is based in a class made by Martin Angelov in tutorialzine.com**

Generate a relative time based on date or time passed.

## Installation

**Run a bundle install**
```php
php artisan bundle:install relativetime
```

**in application/bundles.php add 'relativetime' => array('auto' => true)**
```php
return array(

	'docs' => array('handles' => 'docs'),
	'relativetime' => array('auto' => true)

);
```

## Usage Example

```php

//Assuming today is 2012-10-01 12:00:00

echo RelativeTime::get(); // prints "just now"
echo RelativeTime::get('2012-07-01'); // prints "3 months ago"
// and so on
```

Try yourself!

<?php

/**
 * A class to return the relative time based on a 
 * timestamp or string passed.
 * The class is based in a class made by Martin Angelov for 
 * tutorialzine.com
 * 
 * example:
 * 		2 minutes ago
 *
 * @author Diego Felix <diegoflx.oliveira@gmail.com>
 */
class RelativeTime
{
	// Periods
	private static $names = array('second','minute','hour','day','week','month','year');

	// Time necessary to next time
	private static $divisions = array(1,60,60,24,7,4.34,12); 

	private static $time = NULL;

	/**
	 * Calculates the time based on a date passed
	 * @param  string $timestr 
	 * @return string time passed.
	 */
	public static function get($timestr = null)
	{
		self::timestamp_from_string($timestr);

		$time = self::$time;
		$name = "";

		// If time is less than 10 seconds
		// then return just now.
		if ($time < 10) return "just now";

		for($i = 0 ; $i < count(self::$divisions) ; $i++)
		{
			if($time < self::$divisions[$i]) break;

			$time = $time / self::$divisions[$i];
			$name = self::$names[$i];
		}

		$time = round($time);

		// if the time is different then 1
		// then the time will be in plural
		if($time != 1)
			$name.= 's';

		return "$time $name ago";
	}

	/**
	 * Substract and transform the time passed
	 * 
	 * @param string/int $time variable to transform
	 * @return int timestamp 
	 */
	private static function timestamp_from_string($time = null)
	{
		// a timestamp was passed
		if(is_numeric($time))
		{
			self::$time = time() - $time;
		}
		// a string was passed
		else if(is_string($time))
		{
			self::$time = time() - strtotime($time);
		}

		// nothing was passed
		else
			self::$time = 0;
	}
}

//var_dump(RelativeTime::get());
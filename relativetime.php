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
		static::timestamp_from_string($timestr);

		$time = static::$time;
		$name = "";
		$negative = $time < 0;
		$time = abs($time);

		// If time is less than 10 seconds, we return "just now" if $time is positive
		// or "in just a moment" if $time is negative
		if ($time < 10)
		{
			if ($negative)
			{
				return "in just a moment";
			}
			else
			{
				return "just now";
			}
		}
		//else construct the time string pieces
		else
		{
			foreach (static::$divisions as $i => $division)
			{
				if($time < $division) break;

				$time = $time / $division;
				$name = static::$names[$i];
			}
		}

		$time = round($time);

		// if the time is different then 1
		// then the time will be in plural
		if($time != 1)
			$name.= 's';

		return "$time $name " . ($negative ? 'from now' : 'ago');
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
			static::$time = time() - $time;
		}
		// a string was passed
		else if(is_string($time))
		{
			static::$time = time() - strtotime($time);
		}

		// nothing was passed
		else
			static::$time = 0;
	}
}

//var_dump(RelativeTime::get());
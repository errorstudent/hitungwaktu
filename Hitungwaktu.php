<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hitungwaktu {

	var $CI;
	
	/**
	 * Constructor
	 */
    function __construct()
    {
		$this->CI =& get_instance();
	}
	
	function ago($start, $end=null) { 
		$curr_time = time();
		$time_ago = $curr_time - strtotime($start);
		if($time_ago < 60) // seconds
		{
		  $ext = $time_ago . " seconds ago..";
		}
		else
		{
		  if($time_ago >= 60) // minutes
		  {
			 $time = floor($time_ago / 60);
			 $seconds_remainder = $time_ago % 60;
			 $ext = $time . " minutes " . $seconds_remainder . " seconds ago.";
			 
			 if($time >= 60) // hours
			 {
				$hours = floor($time / 60);
				$minutes = $time % 60;
				$ext = $hours . " hours " . $minutes . " minutes ago.";
				if($hours >= 24) // days
				{
				   $days = floor($hours / 24);
				   $day_hours = $hours % 24;
				   $ext = $days . " days " . $day_hours . " hours ago.";
				}
			 }
		  }
		}
		return $ext;
	}
}

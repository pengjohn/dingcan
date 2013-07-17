<?php
session_start();

define("TIMEOUT_HOUR","10"); 
define("TIMEOUT_MINUTES","30"); 
define("TIMEOUT_SECOND","0"); 

function is_timeout()
{
	$startdate=time();
	$enddate=mktime(TIMEOUT_HOUR,TIMEOUT_MINUTES,TIMEOUT_SECOND,"12","31","2020"); //hour, minute, second, month, day, year
	$timeremain=$enddate-$startdate;
	$timeremain=$timeremain%(60*60*24);
	if( $timeremain>=(10*60*60+30*60) )
	{
		return true;
	}
	else
	{		
		return false;
	}
}

function is_admin()
{
	if($_SESSION['userlevel'] >=10)
	  return true;
	else
	  return false;
}
?>
   
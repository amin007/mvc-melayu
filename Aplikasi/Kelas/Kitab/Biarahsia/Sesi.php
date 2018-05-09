<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__; 
class Sesi # \Aplikasi\Kitab\Sesi::
{
#==========================================================
#----------------------------------------------------------
	public static function init()
	{
		@session_start();
	}
#----------------------------------------------------------
	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}
#----------------------------------------------------------
	public static function get($key)
	{
		if (isset($_SESSION[$key]))
		return $_SESSION[$key];
	}
#----------------------------------------------------------
	public static function destroy()
	{
		//unset($_SESSION);
		session_destroy();
	}
#----------------------------------------------------------
#----------------------------------------------------------
#==========================================================
}
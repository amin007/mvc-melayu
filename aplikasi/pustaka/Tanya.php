<?php

class Tanya 
{

	function __construct() 
	{
		//$this->db = new PangkalanData(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		$this->db = new DB_Mysqli(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
	}

}

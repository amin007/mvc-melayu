<?php

class Index_Tanya extends Tanya
{

	public function __construct() 
	{
		parent::__construct();
		//echo '<br>Dalam function __construct() class Index_Tanya extends Tanya<br>';
	}

	public function paparMedan($myTable)
	{
		//echo '<br>Dalam function paparMedan($myTable) class Index_Tanya extends Tanya<br>';
		return $this->db->select('SHOW COLUMNS FROM ' . $myTable);
	}
	
	public function paparDataJadual($myTable)
	{
		$sql = 'SELECT * FROM ' . 	$myTable;
		
		//echo $sql . '<br>';
		
		return $this->db->select($sql);
	}

}
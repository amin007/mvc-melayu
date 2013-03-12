<?php

class Form
{
	
	private $_postData = array();
	
	public function __construct() {}
	
	/**
	 * 
	 */
	public function post($field)
	{
		$this->_postData[$field] = $_POST[$field];
	}
	
	/**
	 * 
	 */
	public function val()
	{
		
	}
}
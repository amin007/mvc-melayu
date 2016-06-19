<?php
namespace aplikasi\pustaka; //echo __NAMESPACE__; 
class Index extends \aplikasi\pustaka\Kawal 
{
#--------------------------------------------------------------------------------------------
	function __construct() 
	{
		parent::__construct();
	}
#--------------------------------------------------------------------------------------------	
	function index() 
	{
		# Set pemboleubah utama
		$this->papar->Tajuk_Muka_Surat = 'SEMAK';
		
		# pergi papar kandungan
		$this->papar->baca('index/index');
	}
#--------------------------------------------------------------------------------------------	
}
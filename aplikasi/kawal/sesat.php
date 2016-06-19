<?php
namespace aplikasi\kawal; //echo __NAMESPACE__; 
class Sesat extends \aplikasi\pustaka\Kawal 
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
		$this->papar->Tajuk_Muka_Surat = 'GPS - Guna Pun Sesat';
		$this->papar->url = dpt_url();

		# pergi papar kandungan
		$this->papar->mesej = 'Halaman ini tidak wujud';
		$this->papar->baca('sesat/gps');
	}
#--------------------------------------------------------------------------------------------
}
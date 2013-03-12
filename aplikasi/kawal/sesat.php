<?php

class Sesat extends Kawal 
{

	function __construct() 
	{
		parent::__construct();
		Sesi::init();
		$logged = Sesi::get('loggedIn');
		$level = Sesi::get('levelPegawai');
		// semak level
		$senaraiLevel=array('fe', 'kawal');
		
		if ($logged == false || !in_array($level,$senaraiLevel)) 
		{
			Sesi::destroy();
			header('location:' . URL);
			exit;
		}
	}
	
	function index() 
	{
		// Set pemboleubah utama
		$this->lihat->pegawai = senarai_kakitangan();
		$this->lihat->gambar=gambar_latarbelakang('../../');
		$this->lihat->Tajuk_Muka_Surat='MM 2012';
		$this->lihat->url = dpt_url();
		// pergi papar kandungan
		$this->lihat->mesej = 'Halaman ini tidak wujud';
		$this->lihat->baca('sesat/index');
	}

}
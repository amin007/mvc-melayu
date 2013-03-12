<?php

class Index extends Kawal 
{

	function __construct() 
	{
		parent::__construct();
		/*
		Sesi::init();
		$logged = Sesi::get('loggedIn');
		$level = Sesi::get('levelPegawai');
		// semak level
		$senaraiLevel=array('fe', 'kawal');
		
		if ($logged == true && in_array($level,$senaraiLevel)) 
		{
			header('location:' . URL . 'ruangtamu');
			exit;
		}
		*/
	}
	
	function index() 
	{

		// Set pemboleubah utama
		$this->lihat->Tajuk_Muka_Surat='SEMAK';
		//$this->lihat->gambar=gambar_latarbelakang('../../');
		
		// pergi papar kandungan
		$this->lihat->baca('index/index');
	}
	
}

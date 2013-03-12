<?php

class Login extends Kawal 
{

	function __construct() 
	{
		parent::__construct();
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
	}
	
	function index() 
	{	
		$this->lihat->gambar=gambar_latarbelakang(null);
		// Set pemboleubah utama
		$this->lihat->Tajuk_Muka_Surat='Enjin Carian Ekonomi';
		$this->lihat->isi='';
		$this->lihat->isi2='';
		// pergi papar kandungan
		$this->lihat->baca('index/index');
	}
	
	function semakid()
	{
		$this->tanya->semakid();
	}
	
	function salah()
	{
		$this->lihat->mesej = 'Ada masalah pada user dan password';

		// Set pemboleubah utama
		$this->lihat->Tajuk_Muka_Surat='Enjin Carian Ekonomi - Sesat';
		$this->lihat->isi='';
		$this->lihat->isi2='';

		// pergi papar kandungan
		$this->lihat->baca('index/salah');
	}
	
	function logout()
	{
		//Sesi::destroy();
		header('location:' . URL);
		exit;
	}
}
<?php

class Ruangtamu extends Kawal 
{

	function __construct() 
	{
		parent::__construct();
		Kebenaran::kawalKeluar();	
		//$this->lihat->js = array('ruangtamu/js/default.js');
		
	}
	
	function index() 
	{	
		// set latarbelakang //
		$this->lihat->gambar=gambar_latarbelakang('../../');
		// Set pemboleubah utama
		$this->lihat->pegawai = senarai_kakitangan();
		$this->lihat->Tajuk_Muka_Surat='ICDT 2012';
		// pergi papar kandungan
		$this->lihat->baca('ruangtamu/index');
	}
	
	function logout()
	{
		Sesi::destroy();
		header('location: ' . URL);
		exit;
	}
	
	function xhrInsert()
	{
		$this->tanya->xhrInsert();
	}
	
	function xhrGetListings()
	{
		$this->tanya->xhrGetListings();
	}
	
	function xhrDeleteListing()
	{
		$this->tanya->xhrDeleteListing();
	}

}
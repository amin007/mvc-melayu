<?php

class Cari extends Kawal 
{

	public function __construct() 
	{
		parent::__construct();
	}
	
	public function index() 
	{	
		// Set pemboleubah utama
		$this->lihat->Tajuk_Muka_Surat='SEMAK';
		//$this->lihat->gambar=gambar_latarbelakang('../../');

		// pergi papar kandungan
		$this->lihat->baca('cari/index');
	}
	
	public function semua($borang) 
	{	
		/* fungsi ini memaparkan borang
		 * untuk carian msic & produk sahaja
		 */
		//echo 'mana ko pergi daa ' . $borang . '<br>';
		
		$this->lihat->medan = 
			$this->tanya->paparMedan('a_someplace');
		
		$url = dpt_url();
		$this->lihat->url = $url;

		// Set pemboleubah utama
		$this->lihat->Tajuk_Muka_Surat='SEMAK';
		//$this->lihat->gambar=gambar_latarbelakang('../../');

		// pergi papar kandungan
		$this->lihat->baca('cari/index');
	}

	function pada($bil) 
	{
		/*
		 * fungsi ini memaparkan hasil carian
		 */
		 
		$url = dpt_url();
		$had = '0, ' . $url[2];
		//echo '<pre>$url->', print_r($url, 1) . '</pre>';
	
		$kira = pecah_post($_POST); # echo '<pre>$kira->'; print_r($kira); echo '</pre>';
		// setkan pembolehubah dulu
		$namajadual = isset($_POST['namajadual']) ? $_POST['namajadual'] : null;
		$susun = isset($_POST['susun']) ? $_POST['susun'] : 1;
		$carian = isset($_POST['cari']) ? $_POST['cari'] : null;
		$semak = isset($_POST['cari'][1]) ? $_POST['cari'][1] : null;
		$this->lihat->cariNama = null;
		
		
		if (empty($semak)) 
		{
			header('location:' . URL . 'cari/' . $namajadual . '/1');
			exit;	
		}
		elseif (!empty($namajadual) && $namajadual=='produk') 
		{
			$jadual = dpt_senarai('produk');
			// mula cari $cariID dalam $jadual
			foreach ($jadual as $key => $myTable)
			{// mula ulang table
				// senarai nama medan
				$medan = '*'; 
				$this->lihat->cariNama[$myTable] = $this->tanya
				->cariBanyakMedan($myTable, $medan, $kira, $had);
			}// tamat ulang table
			
			$this->lihat->carian=$carian;
		}

		// Set pemboleubah utama
		$this->lihat->pegawai = senarai_kakitangan();
		$this->lihat->Tajuk_Muka_Surat='SEMAK LOKALITI';
		$this->lihat->gambar=gambar_latarbelakang('../../');

		// paparkan ke fail cari/$namajadual.php
		$this->lihat->baca('cari/' . $namajadual);		

	}

}

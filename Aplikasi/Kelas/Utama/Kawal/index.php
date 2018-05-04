<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Index extends \Aplikasi\Kitab\Kawal
{
#==========================================================================================
	function __construct()
	{
		//echo '<br>class Index extends \Aplikasi\Kelas\Kitab\Kawal';
		parent::__construct();
		\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		$this->_folder = huruf('kecil', namaClass($this));
	}

	function index()
	{
		# Set pemboleubah utama
		$this->papar->Tajuk_Muka_Surat='Enjin';

		# Pergi papar kandungan
		//$this->semakPembolehubah(); # Semak data dulu
		$this->paparKandungan('login', $noInclude=1); # $noInclude=0
	}

	public function paparKandungan($fail, $noInclude)
	{
		//$theme = array(0,1,2,3,4);
		//$template = $theme[rand(0, count($theme)-1)];
		# jika tidak mahu include apa2, letak $noInclude=1,

		# Pergi papar kandungan
		$folder = $this->_folder;
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*
	}

	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>|';//*
	}
#==========================================================================================
#------------------------------------------------------------------------------------------
	function login($user)
	{
		# Set pemboleubah utama
		$this->papar->nama = $user; # dapatkan nama pengguna
		$this->papar->IP = dpt_ip(); # dapatkan senarai IP yang dibenarkan

		# Pergi papar kandungan
		//$this->semakPembolehubah(); # Semak data dulu
		$this->paparKandungan('login', $noInclude=0); # $noInclude=0
	}
#------------------------------------------------------------------------------------------
	function keluar()
	{
		# Set pemboleubah utama
		$this->papar->IP = dpt_ip(); # dapatkan senarai IP yang dibenarkan

		# Pergi papar kandungan
		//$this->semakPembolehubah(); # Semak data dulu
		$this->paparKandungan('keluar', $noInclude=1); # $noInclude=0
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
}
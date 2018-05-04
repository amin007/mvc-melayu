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
		$this->_namaClass = '<hr>Nama class :' . __METHOD__ . '<hr>';
		$this->_namaFunction = '<hr>Nama function :' .__FUNCTION__ . '<hr>';
	}
##-----------------------------------------------------------------------------------------
	public function index()
	{
		# Set pemboleubah utama
		$this->papar->tajuk = namaClass($this);
		//echo $this->_namaClass; //echo $this->_namaFunction;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'index', $noInclude=0);
	}
##-----------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##-----------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>|';//*/
	}
##-----------------------------------------------------------------------------------------
	public function semakRujuk($senarai)
	{
		//echo '<pre>$senarai:<br>';
		print_r($senarai);
		//echo '</pre>|';//*/
	}
##-----------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION); echo '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
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
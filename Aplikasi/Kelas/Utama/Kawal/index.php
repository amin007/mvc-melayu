<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Index extends \Aplikasi\Kitab\Kawal
{
#==================================================================================================
	function __construct()
	{
		parent::__construct();
		\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		//\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' .__FUNCTION__ . '<hr>';
	}
###------------------------------------------------------------------------------------------------
	public function index()
	{
		# Set pemboleubah utama
		$this->papar->tajuk = namaClass($this);
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder,'index',$noInclude=0);
	}
###------------------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
###------------------------------------------------------------------------------------------------
	public function semakPembolehubahV2($senarai,$jadual,$p=0)
	{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		echo '</pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
	}
###------------------------------------------------------------------------------------------------
	public function template()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Set pemboleubah utama
		$this->papar->senarai = $this->tanya->pilihTajuk();
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu

		# Pergi papar kandungan
		$fail = array('template');
		$this->paparKandungan($this->_folder,$fail[0],$noInclude=0);
	}
###------------------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION); echo '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#==================================================================================================
	function login($user='ali')
	{
		# Set pemboleubah utama
		$this->papar->nama = $user; # dapatkan nama pengguna
		$this->papar->IP = dpt_ip(); # dapatkan senarai IP yang dibenarkan
		$fail = array('login','login_automatik');

		# Pergi papar kandungan
		//$this->semakPembolehubah(); # Semak data dulu
		$this->paparKandungan($this->_folder,$fail[0],$noInclude=1); # $noInclude=0
	}
#--------------------------------------------------------------------------------------------------
	function login_automatik($user='ali')
	{
		# Set pemboleubah utama
		$this->papar->nama = $user; # dapatkan nama pengguna
		$this->papar->IP = dpt_ip(); # dapatkan senarai IP yang dibenarkan
		$fail = array('login','login_automatik');

		# Pergi papar kandungan
		//$this->semakPembolehubah(); # Semak data dulu
		$this->paparKandungan($this->_folder,$fail[0],$noInclude=0); # $noInclude=0
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
##-------------------------------------------------------------------------------------------------
	function setDermaDaa($a,$b)
	{
		# data dari url
		$this->papar->a = $a;
		$this->papar->b = $b;
		# Set pembolehubah utama
		//$folder = $this->papar->folder = huruf('kecil', namaClass(__CLASS__));
		$folder = $this->papar->folder = huruf('kecil', namaClass($this));
		$this->papar->url = URL . $folder;
		$this->papar->logout = URL . $folder . '/logout';
		# masukkan tatasusunan $f
		$f = array('index','derma','produk');
		return $f;
	}
##-------------------------------------------------------------------------------------------------
	function debugDaa($f)
	{
		$this->semakPembolehubah($this->papar->css,'css');
		$this->semakPembolehubah($this->papar->js,'js');
		$this->semakPembolehubah($this->papar->a,'a');
		$this->semakPembolehubah($this->papar->b,'b');
		$this->semakPembolehubah($this->papar->folder,'folder');
		$this->semakPembolehubah($f,'f');
	}
##-------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
	public function derma($a=null,$b=null)
	{
		# Set pembolehubah utama
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		$f = $this->setDermaDaa($a,$b);

		# Pergi papar kandungan
		$this->debugDaa($f);# Semak data dulu
		//$this->paparKandungan($this->_folder,$f[1],$noInclude=0);
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
}
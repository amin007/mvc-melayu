<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Sesat extends \Aplikasi\Kitab\Kawal
{
#===========================================================================================
	function __construct()
	{
		parent::__construct();
		$this->_tajukAtas = 'Enjin - Sesat';
		$this->_folder = huruf('kecil', namaClass($this));
	}

	function index() 
	{
		$this->papar->mesej = 'Halaman ini tidak wujud';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index');
	}

	public function paparKandungan($fail)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, 0); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}

	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>|';//*/
	}
#===========================================================================================
	function parameter()
	{
		$this->papar->mesej = 'Class wujud tapi parameter/method/fungsi tidak wujud';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index');
	}
#-------------------------------------------------------------------------------------------
	function classTidakWujud($amaran)
	{
		$this->papar->mesej = $amaran;
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index');
	}

	function methodTanyaTidakWujud($amaran,$class,$method)
	{
		$this->papar->mesej = $amaran
			. "|class=$class|fungsi=$method|";
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index');
	}
#-------------------------------------------------------------------------------------------
	function folderPaparTidakWujud() 
	{
		echo $this->papar->mesej = 'folder tidak wujud dalam PAPAR';
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index');
	}
#-------------------------------------------------------------------------------------------
	function failTidakWujud() 
	{
		$this->papar->mesej = 'Fail tidak wujud dalam PAPAR';
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index');
	}
#-------------------------------------------------------------------------------------------
	function masalahDB($amaran)
	{
		$this->papar->mesej = $amaran;
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index');
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
}
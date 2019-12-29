<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class Kawal
{
#==========================================================================================
	function __construct()
	{
		//echo '<br>class Kawal';
		$this->papar = new \Aplikasi\Kitab\Papar();
	}
#==========================================================================================
	public function jemaahTaskil($nama)
	{
		list($tanya) = $this->semakPencam($nama);
		if (file_exists($tanya))
		{
			$tanyaNama = '\\Aplikasi\Tanya\\' . huruf('Besar', $nama) . '_Tanya';
			//echo '<br>$tanyaNama->' . $tanyaNama . '<br>';

			if(class_exists($tanyaNama))
				$this->tanya = new $tanyaNama();
			else
			{
				$amaran = 'class ' . $tanyaNama . ' tidak wujud tetapi fail '
				. $tanya . ' wujud.';
				//trigger_error("Tidak boleh muatkan class: $tanyaNama", E_USER_WARNING);
				Peta::classTanyaTidakWujud($amaran);
				//exit();
			}
		}//*/
	}
#------------------------------------------------------------------------------------------
	function semakPencam($nama)
	{
		$failTanya = GetMatchingFiles(GetContents(TANYA),$nama . '_tanya.php');
		$tanya = $failTanya[0];

		/*echo '<br> class Kawal :: $nama : ' . $nama . '|';
		echo 'TANYA->' . TANYA . '';
		echo '<pre>$failTanya->'; print_r($failTanya); echo '</pre>';
		echo '$tanya->' . $tanya . '<br>';
		//*/
		return array($tanya);
	}
#------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai,$jadual,$p='0')
	{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		echo '</pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
}
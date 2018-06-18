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
		$failTanya = GetMatchingFiles(GetContents(TANYA),$nama . '_tanya.php');
		$tanya = $failTanya[0];
		$this->debug($nama, $failTanya, $tanya);

		if (file_exists($tanya))
		{
			$tanyaNama = '\\Aplikasi\Tanya\\' . huruf('Besar', $nama) . '_Tanya';
			//echo '<br>$tanyaNama->' . $tanyaNama . '<br>';
			$this->tanya = new $tanyaNama();

			if(!class_exists($tanyaNama, false))
			{
				$amaran = 'class ' . $tanyaNama . ' tidak wujud tetapi fail wujud.';
				//trigger_error("Tidak boleh muatkan class: $tanyaNama", E_USER_WARNING);
				Peta::classTanyaTidakWujud($amaran);
				exit();
			}
		}//*/

	}
#------------------------------------------------------------------------------------------
	function debug($nama, $failTanya, $tanya)
	{
		/*echo '<br> class Kawal :: $nama : ' . $nama . '|';
		echo 'TANYA->' . TANYA . '';
		echo '<pre>$failTanya->'; print_r($failTanya); echo '</pre>';
		echo '$tanya->' . $tanya . '<br>';
		//*/
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
}
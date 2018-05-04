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
		/*echo '<br> class Kawal :: $nama : ' . $nama . '|';
		echo 'TANYA->' . TANYA . '';
		echo '<pre>$failTanya->'; print_r($failTanya); echo '</pre>';
		echo '$tanya->' . $tanya . '<br>';
		//*/

		if (file_exists($tanya))
		{
			$tanyaNama = '\\Aplikasi\Tanya\\' . huruf('Besar', $nama) . '_Tanya';
			//echo '<br>$tanyaNama->' . $tanyaNama . '<br>';

			require_once $tanya;
			$this->tanya = new $tanyaNama();

			//if (class_exists($tanyaNama)) echo '<br>class ' . $tanyaNama . ' wujud<br>';
			//else echo '<br>class ' . $tanyaNama . ' tak wujud<br>';
		}//*/

	}
#==========================================================================================
}
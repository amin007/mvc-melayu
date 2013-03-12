<?php

class Lihat 
{

	function __construct() 
	{
		//echo '<br>1. Anda berada di class Lihat<br>';
	}
	
	public function bacaan($nama, $noInclude = false)
	{
		//echo 'Anda berada di class Lihat<br>' .
		//'fungsi ' . $nama . '()<br>';


		if ($noInclude == true) 
		{
			require LIHAT . $nama . '.php';	
		}
		else 
		{
			require LIHAT . 'diatas.php';
			require LIHAT . 'menu_atas.php';
			require LIHAT . $nama . '.php';
			require LIHAT . 'dibawah.php';	
		}
	}

	public function baca($nama, $noInclude = false)
	{
		//echo '<br>1.Anda berada di class Lihat::' . $nama . '()<br>';

		$cariNama = array ('index/index', 'index/login',
		'index/login_automatik', 'index/salah');
			
		if ($noInclude == true) 
		{
			require LIHAT . $nama . '.php';	
		}
		else 
		{
			/*if( in_array($nama,$cariNama) )
				require LIHAT . $nama . '.php';	
			else*/
			
				require LIHAT . 'diatas.php';
				require LIHAT . 'menu_atas.php';
				require LIHAT . $nama . '.php';
				require LIHAT . 'dibawah.php';	
			
			
		}
	}

}
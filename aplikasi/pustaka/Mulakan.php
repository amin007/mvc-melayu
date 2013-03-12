<?php
/*
 * Ini class untuk 
 * 1. membaca $url dari fungsi dpt_url() dari fail fungsi.php
 *    dan masukkan dalam $url
 * 2. semak sama ada nilai $url[0] kosong tak
 * 3. hidupkan sesi dan semak sama ada nilai dalam sesi
 * 4. dapatkan fail dalam folder KAWAL yang serupa dengan $url[0]
 * 5. semak sama ada dalam folder KAWAL $fail benar2 wujud
 */
class Mulakan 
{

	function __construct() 
	{
		// 1. dapatkan fungsi dpt_url() dari fail fungsi.php
		// dan masukkan dalam $url
		$url = dpt_url();

		//echo '<br>$url->'; print_r($url) . '';
		//echo '<HR>KAWAL=' . KAWAL . '<BR>';
		
		/*
		 * 2. semak sama ada $url[0] kosong
		 * jika ya : $url[0] == 'index';
		 * jika tak : $url[0] == $url[0];
		 * 3. dapatkan fail dalam folder KAWAL yang serupa dengan $url[0] 
		 * dan masukkan dalam $fail
		 */
		
		$url[0]= (empty($url[0])) ? 'index' : $url[0];
		$fail = KAWAL . $url[0] . '.php';
		//echo '<hr>$fail->' . $fail . '<br>';
		
		/*
		 * 4. semak sama ada dalam folder KAWAL $fail benar2 wujud
		 * jika ya : masukkan $fail dan isytihar class tersebut
		 * jika tak : cari fungsi sesat()
		 */
		if (file_exists($fail)) 
		{
			require $fail;
			$kawal = new $url[0];
			$this->cari_pengawal($kawal, $url);
		} 
		else 
		{
			$this->sesat();
		}
		
	}
	
	function cari_pengawal($kawal, $url)
	{
		$kawal->muatTanya($url[0]);
		// calling methods
		if (isset($url[2])) 
		{
			if (method_exists($kawal, $url[1])) 
				{ $kawal->{$url[1]}($url[2]); }
			else 
				{ $this->sesat(); }
		} else {
			if (isset($url[1])) 
			{
				if (method_exists($kawal, $url[1])) 
					{ $kawal->{$url[1]}(); }
				else 
					{ $this->sesat(); }
			} 
			else 
				{ $kawal->index(); }
		}

	}
	
	function sesat() 
	{
		require KAWAL . 'sesat.php';
		$kawal = new Sesat();
		$kawal->index();
		return false;
	}

}
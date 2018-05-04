<?php
/* Ini class untuk
 * 1. membaca $url dari fungsi dpt_url() dari fail fungsi.php
 *    dan masukkan dalam $url
 * 2. semak sama ada nilai $url[0] kosong tak
 * 3. dapatkan fail dalam folder KAWAL yang serupa dengan $url[0]
 * 4. semak sama ada dalam folder KAWAL $fail benar2 wujud
 */
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class Peta
{
#==================================================================================================================
	function __construct()
	{
		# 1. capai fungsi dpt_url() dan masukkan dalam $url
		$url = dpt_url(); //echo '<br>$url->'; print_r($url) . '';

		# 2. semak sama ada $url[0] kosong * jika ya : $url[0] == 'index'; 
		$url[0] = (empty($url[0])) ? 'index' : $url[0];
		$Url[0] = '\\Aplikasi\Kawal\\' . huruf('Besar', $url[0]);

		/* 3. dapatkan fail dalam folder KAWAL yang serupa dengan $url[0]
		 * dan masukkan dalam $fail
		 */
		$failKawal = GetMatchingFiles(GetContents(KAWAL),$url[0] . '.php');
		$fail = $failKawal[0];
		$this->debugPembolehubah($failKawal, $fail, $url, $Url);

		/* 4. semak sama ada dalam folder KAWAL $fail benar2 wujud
		 * jika ya : masukkan $fail dan isytihar class tersebut
		 * jika tak : cari fungsi sesat()
		 */
		if (file_exists($fail))
		{
			require $fail;
			$kawal = new $Url[0];
			$kawal->jemaahTaskil($url[0]);
			# jika $url[1] tak disetkan, bagi $method='index'
			$method = (isset($url[1])) ? $url[1] : 'index';
			# semak sama ada method ada dalam $kawal
			if ( !method_exists($kawal, $method))
				$this->parameter();
			else $this->cari_pengawal($kawal, $url);
			//*/
		}
		else $this->sesat();

	}

	private function debugPembolehubah($failKawal, $fail, $url, $Url)
	{
		//echo '<hr>KAWAL=' . KAWAL . '<br>';
		//echo '<pre>$failKawal='; print_r($failKawal) . '</pre>';
		//echo '<hr>$fail->' . $fail . '<br>';
		//echo '<hr>$url[0]->' . $Url[0] . '<br>';
	}

	/**
	 *  Cara membaca parameter url GET
	 *
	 *  http://localhost/kawal/kaedah/(param)/(param)/(param)
	 *  url[0] = Kawal -> senarai class dalam folder kawal
	 *  url[1] = Kaedah -> senarai fungsi2 dalam class Kawal
	 *  url[2] = Param2
	 *  url[3] = Param3
	 *  url[4] = Param4
	 *  url[5] = Param5
	 */
	private function cari_pengawal($kawal, $url)
	{
		$panjang = count($url); //echo '$panjang = ' . $panjang . '<br>';
 
		# Pastikan kaedah yang kita panggil wujud
		if ($panjang > 1)
		{
			if (!method_exists($kawal, $url[1])) {$this->parameter();}
		}
			$this->muatkanKawal($kawal, $panjang, $url);

    }

	private function muatkanKawal($kawal, $panjang, $url)
	{
			# Tentukan apa yang dimuatkan
			switch ($panjang)
			{
				case 8: # Kawal->Kaedah(Param2, Param3, Param4, Param5, Param6, Param7)
				$kawal->{$url[1]}($url[2], $url[3], $url[4], $url[5], $url[6], $url[7]);
				break;

				case 7: # Kawal->Kaedah(Param2, Param3, Param4, Param5,, Param6)
				$kawal->{$url[1]}($url[2], $url[3], $url[4], $url[5], $url[6]);
				break;

				case 6: # Kawal->Kaedah(Param2, Param3, Param4, Param5)
				$kawal->{$url[1]}($url[2], $url[3], $url[4], $url[5]);
				break;

				case 5: # Kawal->Kaedah(Param2, Param3, Param4)
				$kawal->{$url[1]}($url[2], $url[3], $url[4]);
				break;

				case 4: # Kawal->Kaedah(Param2, Param3)
				$kawal->{$url[1]}($url[2], $url[3]);
				break;

				case 3: # Kawal->Kaedah(Param2)
				$kawal->{$url[1]}($url[2]);
				break;

				case 2: # Kawal->Kaedah()
				$kawal->{$url[1]}();
				break;

				default: $kawal->index(); break;
			}
	}
#--- masuk fungsi campak ke pangkal jalan jika sesat
	function sesat()
	{
		require KAWAL . '/sesat.php';
		$kawal = new \Aplikasi\Kawal\Sesat();
		$kawal->index();
		return false;
	}

	function parameter()
	{
		require KAWAL . '/sesat.php';
		$kawal = new \Aplikasi\Kawal\Sesat();
		$kawal->parameter();
		return false;
	}

	function panjangSangatParam()
	{
		$amaran = 'parameter lebih daripada 8';
		require KAWAL . '/sesat.php';
		$kawal = new \Aplikasi\Kawal\Sesat();
		$kawal->classTidakWujud($amaran);
		return false;
	}

	function classKawalTidakWujud($amaran)
	{
		require KAWAL . '/sesat.php';
		$kawal = new \Aplikasi\Kawal\Sesat();
		$kawal->classTidakWujud($amaran);
		return false;
	}

	public static function classTanyaTidakWujud($amaran)
	{
		require KAWAL . '/sesat.php';
		$kawal = new \Aplikasi\Kawal\Sesat();
		$kawal->classTidakWujud($amaran);
		//return false;
		exit;
	}

	public static function methodTanyaTidakWujud($amaran,$class,$method)
	{
		require KAWAL . '/sesat.php';
		$kawal = new \Aplikasi\Kawal\Sesat();
		$kawal->methodTanyaTidakWujud($amaran,$class,$method);
		//return false;
		exit;
	}

	public static function folderPaparTidakWujud()
	{
		require KAWAL . '/sesat.php';
		$kawal = new \Aplikasi\Kawal\Sesat();
		$kawal->folderPaparTidakWujud();
		return false;//*/
	}

	public static function failPaparTidakWujud()
	{
		require KAWAL . '/sesat.php';
		$kawal = new \Aplikasi\Kawal\Sesat();
		$kawal->failTidakWujud();
		return false;
	}
#==================================================================================================================
}
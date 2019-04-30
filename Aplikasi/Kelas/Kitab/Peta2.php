<?php
/* Ini class untuk
 * 1. membaca $url dari fungsi dpt_url() dari fail fungsi.php
 *    dan masukkan dalam $url
 * 2. semak sama ada nilai $url[0] kosong tak
 * 3. dapatkan fail dalam folder KAWAL yang serupa dengan $url[0]
 * 4. semak sama ada dalam folder KAWAL $fail benar2 wujud
 */
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class Peta2
{
#==========================================================================================
#------------------------------------------------------------------------------------------
	protected $params = [];//*/
#------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai,$jadual,$p='0')
	{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		if($p == '2') var_dump($senarai);
		echo '</pre><hr>';//*/
		//$this->semakPembolehubah($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
	}
#------------------------------------------------------------------------------------------
	public function parseURL()
	{
		//$this->semakPembolehubah($_GET,'_GET');
		if( isset($_GET['url']) )
		{
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
#------------------------------------------------------------------------------------------
	public function __construct()
	{
		$url = $this->parseURL();
		//$this->debugData($url);#semak untuk masa depan
		list($url,$Url) = $this->semakURL($url);
		//$this->debugData($url,$Url);#semak untuk masa depan

		# controller => kawal
		$url = $this->semakKawal($url,$Url);
		//$this->semakPembolehubah($url,'url selepas class');

		# method
		$url = $this->semakMethod($url);
		//$this->semakPembolehubah($url,'url selepas method');

		# params
		if ( !empty($url) )
		{
			$this->params = array_values($url);
		}

		# jalankan controller & method, serta kirim params jika ada
		call_user_func_array([$this->kawal,$this->method], $this->params);//*/
	}
#------------------------------------------------------------------------------------------
	private function debugData($url, $Url = null)
	{
		$this->semakPembolehubah($url,'x0');
		# semak $url
		if($url == '') echo '$url kosong daa<hr>';
		else echo '$url adalah tatasusunan<hr>';
		# semak $Url
		if($Url == null) echo '$Url kosong daa<hr>';
		else
		{
			$this->semakPembolehubah($Url,'Url adalah tatasusunan ');
		}

	}
#------------------------------------------------------------------------------------------
	function semakURL($url)
	{
		# 2. semak sama ada $url[0] kosong * jika ya : $url[0] == 'index';
		$url[0] = (empty($url[0])) ? 'index' : $url[0];
		$Url[0] = '\\Aplikasi\Kawal\\' . huruf('Besar', $url[0]);

		return array($url,$Url);
	}
#------------------------------------------------------------------------------------------
	function semakKawal($url,$Url)
	{
		if( file_exists(KAWAL . '/' . $url[0] . '.php') )
		{
			$this->kawal = $Url[0];
			//echo 'lokasi fail:' . KAWAL . '/' . $url[0] . '.php<hr>';
			//echo 'nama class:' . $this->kawal . '<hr>';
			require_once KAWAL . '/' . $url[0] . '.php';
			unset($url[0]);
		}
		$this->kawal = new $this->kawal;# nilai default adalah index

		return $url;
	}
#------------------------------------------------------------------------------------------
	function semakMethod($url)
	{
		# jika $url[1] tak disetkan, bagi $method='index'
		$method = (isset($url[1])) ? $url[1] : 'index';

		if( isset($method) )
		{
			if( method_exists($this->kawal, $method) )
			{
				$this->method = $method;# nilai default adalah index
				//echo 'nama method:' . $method . '<hr>';
				unset($url[1]);
			}
		}

		return $url;
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
}
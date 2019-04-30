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
	protected $kawal = 'index';
	protected $method = 'index';
	protected $params = [];
#------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai,$jadual,$p='0')
	{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		if($p == '2') var_dump($senarai);
		echo '</pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
	}
#------------------------------------------------------------------------------------------
	public function parseURL()
	{
		if( isset($_GET['url']) )
		{
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			$url[0] = (empty($url[0])) ? 'index' : $url[0];
			//return $url;
		}
	}
#------------------------------------------------------------------------------------------
	public function __construct()
	{
		# 1. capai fungsi dpt_url() dan masukkan dalam $url
		$url = $this->parseURL();//$this->semakPembolehubah($url,'url');
		list($url,$Url) = $this->semakURL($url);//$this->semakPembolehubah($url,'x1');

		# controller
		if( file_exists(KAWAL . '/' . $url[0] . '.php') )
		{
			$this->controller = $Url[0];
			require_once KAWAL . '/' . $url[0] . '.php';
			unset($url[0]);
		}
		$this->controller = new $this->controller;

		/*# method
		if( isset($url[1]) )
		{
			if( method_exists($this->controller, $url[1]) )
			{
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		# params
		if ( !empty($url) )
		{
			$this->params = array_values($url);
		}

		# jalankan controller & method, serta kirim params jika ada
		call_user_func_array([$this->controller,$this->method], $this->params);//*/
	}
#------------------------------------------------------------------------------------------
	public function semakURL($url)
	{
		# 2. semak sama ada $url[0] kosong * jika ya : $url[0] == 'index';
		$url[0] = (empty($url[0])) ? 'index' : $url[0];
		$Url[0] = '\\Aplikasi\Kawal\\' . huruf('Besar', $url[0]);

		return array($url,$Url);
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
}
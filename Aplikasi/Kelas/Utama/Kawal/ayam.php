<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Ayam extends \Aplikasi\Kitab\Kawal
{
#===========================================================================================
##------------------------------------------------------------------------------------------
	public function index()
	{
		echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		echo '<hr>Nama function :' . __FUNCTION__ . '<hr>';
		$this->_folder = huruf('kecil', namaClass($this));
	}
##------------------------------------------------------------------------------------------
#===========================================================================================
#-------------------------------------------------------------------------------------------
	public function goreng($a1=null,$a2=null,$a3=null,$a4=null,
	$a5=null,$a6=null,$a7=null,$a8=null,
	$a9=null,$a10=null,$a11=null,$a12=null,
	$a13=null,$a14=null,$a15=null,$a16=null)
	{
		echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		/*for($i = 1; $i < 13; $i++):
			echo ' echo "\$a'.$i.' = $a'.$i.' &lt;br>"; <br>';
		endfor;*/
		echo "\$a1 = $a1 <br>";
		echo "\$a2 = $a2 <br>";
		echo "\$a3 = $a3 <br>";
		echo "\$a4 = $a4 <br>";
		echo "\$a5 = $a5 <br>";
		echo "\$a6 = $a6 <br>";
		echo "\$a7 = $a7 <br>";
		echo "\$a8 = $a8 <br>";
		echo "\$a9 = $a9 <br>";
		echo "\$a10 = $a10 <br>";
		echo "\$a11 = $a11 <br>";
		echo "\$a12 = $a12 <br>";
		echo "\$a13 = $a13 <br>";
		echo "\$a14 = $a14 <br>";
		echo "\$a15 = $a15 <br>";
		echo "\$a16 = $a16 <br>";
		echo '<a href="' . URL . '">Klik sini untuk muka hadapan</a><br>';
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
}
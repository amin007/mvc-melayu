<?php
/* Ini fail index.php
 * Dalam ini kita isytiharkan
 * 1. laporan tahap kesilapan kod PHP
 * 2. zon masa kita pada Asia/Kuala Lumpur
 * 3. setkan tatarajah sistem
 * 4. masukkan semua fail class dari folder PUSTAKA
 * 5. istihar class \Aplikasi\Kitab\Route()
 */
 
# 1. laporan tahap kesilapan kod PHP
error_reporting(E_ALL);
 
# 2. isytiharkan zon masa => Asia/Kuala Lumpur
date_default_timezone_set('Asia/Kuala_Lumpur');
 
# 3. setkan tatarajah sistem
# rujuk fail i-tatarajah.php untuk
# define nilai konstan yang perlu dalam framework ini
# i-tatarajah.php boleh ditukar kepada tatarajah.php
require 'tatarajah.php';

/* 4. masukkan semua fail class dari folder Aplikasi/Class
** URL : http://www.php-fig.org/psr/psr-4/examples/
** Contoh pelaksanaan projek khusus.
**
** @param string $class nama class yang sebenar tanpa namespace.
** @return void
**/
spl_autoload_register(function ($namaClass)
{
	# buat pecahan tatasusunan $namaClass
	$class = explode('\\', $namaClass); //print_r($class) . '<br>';
	# semak kewujudan class
	//echo '<hr>nama class:' . $class[count($class)-1] . ' | ';
	$cariFail = GetMatchingFiles(GetContents('Aplikasi/Kelas'),$class[count($class)-1] . '.php');
	# jika fail wujud, masukkan 
	foreach($cariFail as $kitabApa)
	{	//echo '$kitabApa->' . $kitabApa . '<br>';
		if (file_exists($kitabApa)) require $kitabApa;
		//else echo 'tidak jumpa daa<br>';
	}//*/
});
/* 5. istihar class 
** Selepas mendaftar fungsi autoload ini dengan SPL, baris berikut
** akan menyebabkan fungsi untuk cuba untuk memuatkan kelas \Foo\Bar\Baz\Qux
** dari /path/to/project/src/Baz/Qux.php:
**
**      new \Foo\Bar\Baz\Qux;
**/
$aplikasi = new \Aplikasi\Kitab\Peta();
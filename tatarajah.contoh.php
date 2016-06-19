<?php
# 4 folder utama
define('KAWAL', 'aplikasi/kawal');
define('PAPAR', 'aplikasi/papar/');
define('TANYA', 'aplikasi/tanya');
define('PUSTAKA', 'aplikasi/pustaka');
 
# Fungsi Global
require PUSTAKA . '/Fungsi.php';
 
# Sentiasa menyediakan garis condong di belakang (/) pada hujung jalan
define('URL', dirname('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']) . '/');
define('Tajuk_Muka_Surat', '...');
# setkan jquery, bootstrap dan font awesome sama ada local atau cdn
## cdn
      $jquery_cdn = 'https://code.jquery.com/jquery-2.2.3.min.js';
 $bootstrapJS_cdn = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js';
 $fontawesome_cdn = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css';
$bootstrapCSS_cdn = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css';
## local
            $sumber = 'http://' . $_SERVER['SERVER_NAME'] . '/private_html/';
      $jquery_local = $sumber . 'js/jquery/jquery-2.2.3.min.js';
 $bootstrapJS_local = $sumber . 'js/bootstrap/3.3.6/js/bootstrap.min.js';
 $fontawesome_local = $sumber . 'js/font-awesome/4.4.0/css/font-awesome.min.css';
$bootstrapCSS_local = $sumber . 'js/bootstrap/3.3.6/css/bootstrap.min.css';

############################################################################################
## isytihar konsan MYSQL, JS dan GAMBAR ikut lokasi $server
$ip = $_SERVER['REMOTE_ADDR'];
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$server = $_SERVER['SERVER_NAME'];
/*
echo "<br>Alamat IP : <font color='red'>" . $ip . "</font> |
\r<br>Nama PC : <font color='red'>" . $hostname . "</font> | 
\r<br>Server : <font color='red'>" . $server . "</font>\r";
//*/
 
if ($server == 'laman.server.anda')
{	# isytihar tatarajah mysql
	define('DB_TYPE', 'mysql');
	define('DB_HOST', 'localhost');
	define('DB_NAME', '***');
	define('DB_USER', '***');
	define('DB_PASS', '***');
	# isytihar lokasi folder js
	define('JQUERY', $jquery_cdn);
	define('FA', $fontawesome_cdn);
	define('BTJS', $bootstrapJS_cdn);
	define('BTCSS', $bootstrapCSS_cdn);//*/
}
else
{	# isytihar tatarajah mysql
	define('DB_TYPE', 'mysql');
	define('DB_HOST', 'localhost');
	define('DB_NAME', '***');
	define('DB_USER', '***');
	define('DB_PASS', '***');
	# isytihar lokasi folder js
	/*define('JQUERY', $jquery_cdn);
	define('FA', $fontawesome_cdn);
	define('BTJS', $bootstrapJS_cdn);
	define('BTCSS', $bootstrapCSS_cdn);//*/
	define('JQUERY', $jquery_local);
	define('FA', $fontawesome_local);
	define('BTJS', $bootstrapJS_local);
	define('BTCSS', $bootstrapCSS_local);//*/
}
############################################################################################
 
// The sitewide hashkey, do not change this because its used for passwords!
// Hashkey untuk tapak sesawang, jangan ubah kerana ia digunakan untuk kata laluan!
// This is for other hash keys... Not sure yet
// Ini adalah untuk kekunci lain hash ... Tidak pasti lagi
define('HASH_GENERAL_KEY', 'MixitUp200');
 
// This is for database passwords only
// Ini adalah untuk kata laluan pangkalan data sahaja
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');

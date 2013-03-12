<?php

// 4 folder utama
define('KAWAL', 'aplikasi/kawal/');
define('LIHAT', 'aplikasi/lihat/');
define('TANYA', 'aplikasi/tanya/');
define('PUSTAKA', 'aplikasi/pustaka/');
 
// Fungsi Global
require PUSTAKA . 'Fungsi.php';
 
// Sentiasa menyediakan garis condong di belakang (/) pada hujung jalan
define('URL', dirname('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']) . '/');
define('Tajuk_Muka_Surat', '...');
############################################################################################
## isytihar konsan MYSQL, JS dan GAMBAR ikut lokasi $server
$ip = $_SERVER['REMOTE_ADDR'];
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$server = $_SERVER['SERVER_NAME'];
/*
echo "<br>Alamat IP : <font color='red'>" . $ip . "</font> |
\r<br>Nama PC : <font color='red'>" . $hostname . "</font> | 
\r<br>Server : <font color='red'>" . $server . "</font>\r";
*/
 
if ($server == 'bssu.amin007.org')
{   // isytihar tatarajah mysql
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', '***');
    define('DB_USER', '***');
    define('DB_PASS', '***');
    // isytihar lokasi folder js
    define('JS', 'http://' . $_SERVER['SERVER_NAME'] . '/js/');
    // buat gambar latarbelakang
    define('GAMBAR', 'http://' . $_SERVER['SERVER_NAME']
        . '/bg/' . gambar_latarbelakang('../../') );
    //echo 'GAMBAR=<img src="' . GAMBAR . '">'; // semak gambar wujud tak...
}
else
{   // isytihar tatarajah mysql
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', '***');
    define('DB_USER', '***');
    define('DB_PASS', '***');
    // isytihar lokasi folder js
    define('JS', 'http://' . $_SERVER['SERVER_NAME'] . '/private/js/');
    // buat gambar latarbelakang
    define('GAMBAR', 'http://' . $_SERVER['SERVER_NAME']
        . '/private/bg/' . gambar_latarbelakang('../../') );
    //echo 'GAMBAR=<img src="' . GAMBAR . '">'; // semak gambar wujud tak...
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

<?php

// 4 folder utama
define('KAWAL', 'aplikasi/kawalan/');
define('PAPAR', 'aplikasi/paparan/');
define('URUSDATA', 'aplikasi/urusdata/');
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
    define('DB_NAME', '***'); // nama pangkalan data di server
    define('DB_USER', '***'); // username untuk capai pangkalan data
    define('DB_PASS', '***'); // password untuk capai pangkalan data
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
    define('DB_NAME', '***'); // nama pangkalan data di localhost
    define('DB_USER', '***'); // username untuk capai pangkalan data
    define('DB_PASS', '***'); // password untuk capai pangkalan data
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
// boleh tukar nilai HASH_GENERAL_KEY ikut suka hati
define('HASH_GENERAL_KEY', 'BiarRahsia@Hati');
 
// This is for database passwords only
// Ini adalah untuk kata laluan pangkalan data sahaja
// boleh tukar nilai HASH_PASSWORD_KEY ikut suka hati
define('HASH_PASSWORD_KEY', 'kucingTERBANGtinggi2000meter');

<?php
/*
 * Ini fail index.php 
 * Dalam ini kita isytiharkan
 * 1. laporan tahap kesilapan kod PHP 
 * 2. zon masa kita pada Asia/Kuala Lumpur
 * 3. setkan tatarajah sistem
 * 4. masukkan semua fail class dari folder PUSTAKA
 * 5. istihar class Mulakan
 */
// 1. laporan tahap kesilapan kod PHP 
error_reporting(E_ALL);

// 2. isytiharkan zon masa => Asia/Kuala Lumpur
date_default_timezone_set('Asia/Kuala_Lumpur');

// 3. setkan tatarajah sistem
require 'tatarajah.php';

// Then simply connect to your DB this way:
//echo '$DB_TYPE='.DB_TYPE.', $DB_HOST='.DB_HOST.', $DB_NAME='.DB_NAME.', $DB_USER='.DB_USER.', $DB_PASS='.DB_PASS.'';


//if ($result = $db->query("SELECT * FROM produk",2)) 

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($result = $db->query("SELECT * FROM produk")) 
{
    /* determine number of rows result set */
    $row_cnt = $result->num_rows;

    printf("Ada %d baris.\n", $row_cnt);

    /* close result set */
    $result->close();
}

/* close connection */
$db->close();

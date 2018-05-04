<?php
//$theme[]='amelia';
//$theme[]='cerulean_blue';
//$theme[]='default';
//$theme[]='jingga_baru';
//$theme[]='jingga_lama';
//$theme[]='journal_white';
//$theme[]='spruce_hijau';
$theme[]='';

$pilih = $theme[rand(0, count($theme)-1)];

$icon[]="icon-play";
$icon[]="icon-chevron-right";
$icon[]="icon-arrow-right";
$icon[]="icon-hand-right";
$icon[]="icon-circle-arrow-right";

$simbol = $icon[rand(0, count($icon)-1)];

// masukkan css dulu
?><!-- Le styles -->
<link rel="stylesheet" href="<?php echo $css_url . 'bootstrap' . $pilih ?>.css">
<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
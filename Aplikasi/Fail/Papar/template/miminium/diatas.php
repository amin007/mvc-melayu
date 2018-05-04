<!DOCTYPE html>
<html lang="en">
<head>
<title><?php
/*
 style="background: url('<?php echo GAMBAR ?>') no-repeat center center fixed;background-size: cover;"
*/# papar title
echo Tajuk_Muka_Surat;
$dpt_url = dpt_url();
echo (empty($dpt_url[2])) ? null : '[' . $_GET['url'] . ']';

$url = URL . 'sumber/rangka-dawai/' . $template . '/';
// Miminium
?></title>
<meta charset="utf-8">
<meta name="description" content="Miminium Admin Template v.1">
<meta name="author" content="Isna Nur Azis">
<meta name="keyword" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- start: Css -->
<link rel="stylesheet" type="text/css" href="<?=$url?>asset/css/bootstrap.min.css">

<!-- plugins -->
<link rel="stylesheet" type="text/css" href="<?=$url?>asset/css/plugins/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="<?=$url?>asset/css/plugins/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="<?=$url?>asset/css/plugins/animate.min.css"/>
<link rel="stylesheet" type="text/css" href="<?=$url?>asset/css/plugins/fullcalendar.min.css"/>
<link rel="stylesheet" type="text/css" href="<?=$url?>asset/css/style.css" >
<!-- end: Css -->

<link rel="shortcut icon" href="<?=$url?>asset/img/logomi.png">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body id="mimin" class="dashboard">
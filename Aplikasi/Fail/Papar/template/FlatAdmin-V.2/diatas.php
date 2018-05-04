<!DOCTYPE html>
<html>
<head>
<title><?php
/*
 style="background: url('<?php echo GAMBAR ?>') no-repeat center center fixed;background-size: cover;"
*/# papar title
echo Tajuk_Muka_Surat;
$dpt_url = dpt_url();
echo (empty($dpt_url[2])) ? null : '[' . $_GET['url'] . ']';

$url = URL . 'sumber/rangka-dawai/' . $template . '/';
//Flat Admin V.2 - Free Bootstrap Admin Templates
$flat[] = 'flat-blue';
//$flat[] = 'flat-green';

$themeFlat = $flat[rand(0, count($flat)-1)];
?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Utama -->
<?php/*
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">	//*/
?>
	<link rel="stylesheet" type="text/css" href="<?=$url?>dist/lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$url?>dist/lib/css/bootstrap.min.css">
    <!-- CSS Libs -->
	<link rel="stylesheet" type="text/css" href="<?=$url?>dist/lib/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$url?>dist/lib/css/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$url?>dist/lib/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$url?>dist/lib/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$url?>dist/lib/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=$url?>dist/lib/css/select2.min.css">	
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="<?=$url?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?=$url?>css/themes/<?=$themeFlat?>.css">
</head>
<body class="flat-blue">
<div class="app-container">
<div class="row content-container">


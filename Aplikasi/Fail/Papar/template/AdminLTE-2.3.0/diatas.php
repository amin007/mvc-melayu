<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php
/*
 style="background: url('<?php echo GAMBAR ?>') no-repeat center center fixed;background-size: cover;"
*/# papar title
echo Tajuk_Muka_Surat;
$dpt_url = dpt_url();
echo (empty($dpt_url[2])) ? null : '[' . $_GET['url'] . ']';

$url = URL . 'sumber/rangka-dawai/' . $template . '/';

/*
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|

*/
$skin[] = 'skin-blue';
$skin[] = 'skin-black';
$skin[] = 'skin-purple';
$skin[] = 'skin-yellow';
$skin[] = 'skin-red';
$skin[] = 'skin-green';
$pSkin = $skin[rand(0, count($skin)-1)];

$layout[] = 'fixed';
$layout[] = 'layout-boxed';
//$layout[] = 'layout-top-nav';
$layout[] = 'sidebar-collapse';
$layout[] = 'sidebar-mini';
//$layout[] = '';
$pLayout = $layout[rand(0, count($layout)-1)];
?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="<?=$url?>bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=$url?>dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?=$url?>dist/css/skins/<?php echo $pSkin ?>.min.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition <?php echo $pSkin ?> <?php echo $pLayout ?>">
<div class="wrapper"><?php //echo "\r"; ?>
  
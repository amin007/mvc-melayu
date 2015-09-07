<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php
// papar title
echo $this->Tajuk_Muka_Surat;

$dpt_url = dpt_url();
echo (empty($url[2])) ? null : '[' . $dpt_url[2] . ']';
 ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<?php require 'diatas-bootstrap.php'; ?>
<style type="text/css">
table.excel 
{
	border-style:ridge;
	border-width:1;
	border-collapse:collapse;
	font-family:sans-serif;
	font-size:11px;
}
table.excel thead th, table.excel tbody th 
{
	background:#CCCCCC;
	border-style:ridge;
	border-width:1;
	text-align: center;
	vertical-align: top;
}
table.excel tbody th { text-align:center; vertical-align: top; }
table.excel tbody td { vertical-align:bottom; }
table.excel tbody td 
{ 
	padding: 0 3px; border: 1px solid #aaaaaa;
	background:#ffffff;
}
</style><?php
if (isset($this->css)) 
	foreach ($this->css as $css)
	{
		echo "\n" . '<link rel="stylesheet" type="text/css" href="' . URL . $css .'">';
	}
?>
</head>  
<body>

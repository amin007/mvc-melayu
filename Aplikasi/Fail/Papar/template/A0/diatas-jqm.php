<!DOCTYPE html>
<html>
<head>
<title><?php echo !isset($this->tajuk) ? 'Kosong':$this->tajuk; ?></title>
<?php
//echo $_SERVER['SERVER_NAME'];
$linkJS = $_SERVER['SERVER_NAME'] . '/private_html/js/jquery/mobile/';
/*
<!-- Include jQuery Mobile stylesheets -->
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<!-- Include the jQuery library -->
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<!-- Include the jQuery Mobile library -->
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
			echo "\n"; include 'menubar-jqm.php'; echo "\n";
*/
?>
<!-- Include meta tag to ensure proper rendering and touch zooming -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include jQuery Mobile stylesheets -->
<link rel="stylesheet" href="http://<?php echo $linkJS ?>jquery.mobile-1.4.5.min.css">
<!-- Include the jQuery library -->
<script src="http://<?php echo $linkJS ?>jquery-1.11.2.min.js"></script>
<!-- Include the jQuery Mobile library -->
<script src="http://<?php echo $linkJS ?>jquery.mobile-1.4.5.js"></script>
</head>
<body>
<div data-role="page" id="home">
	<div data-role="header" class="header">
<?php echo "\n"; include 'menubar-jqm.php'; echo "\n"; ?>
	</div>

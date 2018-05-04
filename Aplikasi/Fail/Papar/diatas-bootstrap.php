<?php
$jquery = 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js';
$css_url = URL . 'public/bootstrap/css';
$js_url  = URL . 'public/bootstrap/js';
$ico_url = URL . 'public/bootstrap/img';

$theme[]='cerulean_blue';
$theme[]='jingga';
$theme[]='journal_white';
$theme[]='spruce_hijau';

$hariini = rand(0, count($theme)-1); 
$pilih = $theme[$hariini];

$icon[]="icon-play";
$icon[]="icon-chevron-right";
$icon[]="icon-arrow-right";
$icon[]="icon-hand-right";
$icon[]="icon-circle-arrow-right";

$hariini = rand(0, count($icon)-1); 
//<i class=$icon[$hariini]></i>
$simbol = '<i class=' . $icon[$hariini] . '></i>';
?><!-- Le styles -->
<link href="<?php echo $css_url ?>/theme/bootstrap_<?php echo $pilih ?>.css" rel="stylesheet">
<style type='text/css'>
body {
padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
}
.submenu-show
{
    border-radius: 3px;
    display: block;
    left: 100%;
    margin-top: -25px !important;
    moz-border-radius: 3px;
    position: absolute;
    webkit-border-radius: 3px;
}
.submenu-hide
{
    display: none !important;
    float: right;
    position: relative;
    top: auto;
}
.navbar .submenu-show:before
{
    border-bottom: 7px solid transparent;
    border-left: none;
    border-right: 7px solid rgba(0, 0, 0, 0.2);
    border-top: 7px solid transparent;
    left: -7px;
    top: 10px;
}
.navbar .submenu-show:after
{
    border-bottom: 6px solid transparent;
    border-left: none;
    border-right: 6px solid #fff;
    border-top: 6px solid transparent;
    left: 10px;
    left: -6px;
    top: 11px;
}
.putih .active a,
.putih .active a:hover {
    background-color: #ffffff;
}
.nav-pills > .active > a, .nav-pills > .active > a:hover {
    background-color: #ffffff;
}

</style>  
<script type='text/javascript' src="<?php echo $jquery ?>"></script>
<script type="text/javascript" src="<?php echo $js_url ?>/bootstrap.js"></script>
<script type='text/javascript'>
$(window).load(function(){
    jQuery('.submenu').hover(function () {
        jQuery(this).children('ul').removeClass('submenu-hide').addClass('submenu-show');
    }, function () {
        jQuery(this).children('ul').removeClass('.submenu-show').addClass('submenu-hide');
    <?php // }).find("a:first").append(" &raquo; ");  ?>
	}).find("a:first").append(" <?php echo $simbol ?> ");
});  
</script>
<link href="<?php echo $css_url ?>/bootstrap-responsive.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Le fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $ico_url ?>/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $ico_url ?>/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $ico_url ?>/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo $ico_url ?>/apple-touch-icon-57-precomposed.png">

<!-- mula menu atas -->
<div class="navbar navbar-fixed-top">
<div class="navbar-inner">
<div class="container-fluid">
<a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
<?php 
for ($iconbar=1; $iconbar < 3; $iconbar++)
{
?><span class="icon-bar"></span>
<?php
}
?>
</a>
<a href="<?php echo URL ?>" class="brand"><?php 
echo $this->Tajuk_Muka_Surat ?></a>
<div class="nav-collapse"><?php require 'menubar_atas.php'; ?></div>
<a href="<?php echo KELUAR ?>" class="brand">
<i class="icon-off icon-white"></i>Keluar</a>
</div>
</div>
</div>
<!-- tamat menu atas -->
<!-- h1> Ini Template Bootstrap </h1 -->
<div class="tabbable tabs-top">
	<ul class="nav nav-tabs putih">
<?php
foreach ($this->senarai as $jadual => $baris)
{
	if ( count($baris)==0 ) echo '';
	else
	{	//$mula = ($jadual=='***') ? ' class="active"' : ''; ?>
	<li><a href="#<?php echo $jadual ?>" data-toggle="tab">
		<span class="badge badge-success"><?php echo $jadual ?></span>
		<span class="badge"><?php echo count($baris) ?></span>
		</a></li>
<?php
	}
}
?>	</ul>
<div class="tab-content">
<?php
foreach ($this->senarai as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{
		$mula2 = ($jadual=='***') ? ' active' : ''; 
		$tajukjadual = ''; ?>
	<div class="tab-pane<?php echo $mula2?>" id="<?php echo $myTable ?>">
<!-- Jadual <?php echo $myTable ?> ########################################### -->
<?php include 'pilih_' . $pilihJadual . '.php'; ?>
<!-- Jadual <?php echo $myTable ?> ########################################### -->
	</div>
<?php
	} // if ( count($row)==0 )
}
?>
</div><!-- class="tab-content" -->
</div><!-- /tabbable -->
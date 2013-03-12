<?php
//echo '$this->medan:'; print_r($this->medan);
/*array
(
    [0] => array ([Field] => msic)
    [1] => array ([Field] => keterangan)
)
*/$pilihMedan = null;
foreach ($this->medan as $key => $row)
{// mula ulang $row

	$pilihMedan .= '<option>' . $row['Field'] . '</option>';
	
}// tamat ulang $row
# semak url
//echo '$this->url:'; print_r($this->url);
$url = $this->url;
$class  = isset($url[0]) ? $url[0] : null;
$fungsi = isset($url[1]) ? $url[1] : 'entah';
$jadual = isset($url[2]) ? $url[2] : 1;
$ulang  = isset($url[3]) ? $url[3] : 1;
/*
echo '
$class  = ' . $class . '|
$fungsi = ' . $fungsi . '|
$jadual = ' . $jadual . '|
$ulang  = ' . $ulang . '<br>';
*/
?>

<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
<form class="container" method="POST" action="<?php echo URL ?>cari/pada/300/1">
<div class="row show-grid">
	<div class="span4" align="right">
	<span class="label label-info">
		Jadual<select class="span2" name="namajadual">
		<option><?php echo $jadual ?></option>
		</select>
	</span>
	</div>
	<div class="span6"><span class="label label-info">Carian/Fix/(AntaraKurungan)</span></div>
	</span>
</div>
<div class="row show-grid">
	<div class="span4" align="right">
		<select class="span2 small" name="pilih[1]">
		<?php echo $pilihMedan; ?>
		</select>
	</div>
	<div class="span6">
	<span class="label label-info">
		Pilih1:<input type="text" name="cari[1]" class="mini">
		<input type="checkbox" name="fix[1]" value="x">
	</span>
	</div>
</span>
</div>
<?php
//$ulang = 6;
for ( $u = 2 ; $u <= $ulang ; $u++ )
{?>
<div class="row show-grid">
	<div class="span4" align="right">
	<span class="label label-info">
		<input type="radio" name="atau[<?=$u?>]" value="or">atau
		<input type="radio" name="atau[<?=$u?>]" value="and">dan
		<select class="span2" name="pilih[<?=$u?>]">
		<?php echo $pilihMedan; ?>
		</select>
	</span>
	</div>
	<div class="span6">
	<span class="label label-info">
		Pilih<?=$u?>:<input type="text" name="cari[<?=$u?>]" class="span4">
		<input type="checkbox" name="fix[<?=$u?>]" value="x">
		<input type="radio" name="mula[<?=$u?>]" value="(">(
		<input type="radio" name="tmt[<?=$u?>]" value=")">)
	</span>
	</div>
</div>
<?php
}?>
<div class="row show-grid">
	<div class="span4" align="right">
	<span class="label label-info">
		Susun <select class="span2" name="susun">
		<?php echo $pilihMedan; ?>
		</select>
		<input type="radio" name="ikut">ASC
		<input type="radio" name="ikut" value="DESC">DESC 
	</span>
	</div>
	<div class="span6">
		<input type="submit" name="carian" class="span2" value="cari <?php echo $jadual ?>">
		<input type="reset" name="kosong" class="span2" value="kosong">
	</div>
</div>
</form>
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
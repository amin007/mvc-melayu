<pre>
<h1>Senarai Produk</h1>Anda mencari<?php 
//echo '$this->carian:'; print_r($this->carian);
$cari = ' <font color="red">'; // $cari = '&nbsp;|&nbsp;';
foreach ($this->carian as $kunci => $nilai)
{
	$cari .= ( count($nilai)==0 ) ?
	$nilai : $nilai . ' | </font>';
}
echo "$cari\rJadual\r";
//echo "\r" . '$this->cariNama:'; print_r($this->cariNama);
foreach ($this->cariNama as $key => $value)
{
	echo ( count($value)==0 ) ?
	$key . ' Kosong<br>' 
	: $key . ' Ada<br>';
}
?>
</pre>

<?php
//$papar = 'bawah';
$papar = 'lintang';

if ($papar=='bawah')
{// if ($papar=='bawah')
?>

<?php
foreach ($this->cariNama as $myTable => $row)
{// mula ulang $row
/////////////////////////////////////////////////////////////////
?>
<table  border="1" class="excel" id="example">
<?php
// mula bina jadual
$printed_headers = false; 
#-----------------------------------------------------------------
for ($kira=0; $kira < count($row); $kira++)
{
	//print the headers once: 	
	if ( !$printed_headers ) 
	{##=============================================================
		?><thead><tr>
<th>#</th>
<?php
		foreach ( array_keys($row[$kira]) as $tajuk ) 
		{ 
			// anda mempunyai kunci integer serta kunci rentetan
			// kerana cara PHP mengendalikan tatasusunan.
			if ( !is_int($tajuk) ) 
			{
				if ($tajuk=='keterangan'):
				?><th><?php echo $tajuk . '-' . $myTable ?></th>
<?php			else:
				?><th><?php echo $tajuk ?></th>
<?php			endif;
			} 
		}

?></tr></thead>
<?php
	##=============================================================
		$printed_headers = true; 
	} 
#-----------------------------------------------------------------		 
	//print the data row 
	?><tbody><tr>
<td><?php echo $kira+1 ?></td>	
<?php
	
	foreach ( $row[$kira] as $key=>$data ) 
	{	?><td><?php echo $data ?></td>
<?php
		if ($key=='sidap')
			$ssm = substr($data,0,12); 
	} 
?>
</tr></tbody>
<?php
} ?>
</table>

<?php
////////////////////////////////////////////////////////////////////
}// tamat ulang $row
?>

<?php
}// if ($papar=='bawah')
else 
{// if ($papar!='bawah')	
?>
<div class="tabbable tabs-top">
	<ul class="nav nav-tabs">
	<li class="active"><a href="#cari" data-toggle="tab">Cari...</a></li>
<?php 
foreach ($this->cariNama as $jadual => $baris)
{
	if ( count($baris)==0 )
	{
		echo '';
	}
	else
	{?><li><a href="#<?php echo $jadual; ?>" data-toggle="tab"><?php echo $jadual ?></a></li>
<?php
	}
}
?>	</ul>
<div class="tab-content">
	<div class="tab-pane active" id="cari">
	<p>Mencari <?php echo $cari ?> ya</p>
	</div>
	<?php 
foreach ($this->cariNama as $myTable => $row)
{
	if ( count($row)==0 )
	{
		echo '';
	}
	else
	{?>	
	<div class="tab-pane" id="<?php echo $myTable ?>">
	<p>Anda berada di <?php echo $myTable ?>.</p>
<!-- Jadual <?php echo $myTable ?> ########################################### -->	
<table  border="1" class="excel" id="example">
<?php
// mula bina jadual
$printed_headers = false; 
#-----------------------------------------------------------------
for ($kira=0; $kira < count($row); $kira++)
{
	//print the headers once: 	
	if ( !$printed_headers ) 
	{
		?><thead><tr>
<th>#</th>
<?php
		foreach ( array_keys($row[$kira]) as $tajuk ) 
		{ 
			// anda mempunyai kunci integer serta kunci rentetan
			// kerana cara PHP mengendalikan tatasusunan.
			if ( !is_int($tajuk) ) 
			{ 
				$paparTajuk = ($tajuk=='nama') ?
				$tajuk . ' (jadual:' . $myTable . ')'
				: $tajuk; 
				?><th><?php echo $paparTajuk ?></th>
<?php		} 
		}

?></tr></thead>
<?php
		$printed_headers = true; 
	} 
#-----------------------------------------------------------------		 
	//print the data row 
	?><tbody><tr>
<td><?php echo $kira+1 ?></td>	
<?php
	
	foreach ( $row[$kira] as $key=>$data ) 
	{		
		if ($key=='sidap')
		{
			$sidap= $data;
			$ssm = substr($data,0,12); 
		}
		elseif ($key=='nama')
		{
			$syarikat = $data;
		}
		else
			{}
		?><td><?php echo $data ?></td>
<?php
	} 
	?></tr></tbody>
<?php
}
#-----------------------------------------------------------------
?>
</table>
<!-- Jadual <?php echo $myTable ?> ########################################### -->		
	</div>
<?php
	} // if ( count($row)==0 )
}
?>	
</div>
</div> <!-- /tabbable -->

<?php
}// if ($papar!='bawah')
?>
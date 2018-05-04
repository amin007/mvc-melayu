	<table border="1" class="table" id="example">
	<?php
	$printed_headers = false; # mula bina jadual
	#-----------------------------------------------------------------
	for ($kira=0; $kira < count($row); $kira++)
	{
		if ( !$printed_headers ) # papar tajuk medan sekali sahaja:
		{
			?><thead><tr><th>#</th><?php
			foreach ( array_keys($row[$kira]) as $tajuk ) 
			{
				?><th><?php echo $tajuk ?></th><?php
			}
			?></tr></thead>
	<?php	$printed_headers = true;
		}	$mula = 1;
	# papar data $row ------------------------------------------------
	?><tbody><tr><td><?php echo $mula+$kira ?></td><?php
		echo $tabline = "\n\t\t";
		foreach ( $row[$kira] as $key=>$data ) 
		{
			echo '<td>' . $data . '</td>';
		}
		?></tr></tbody>
	<?php
	}#-----------------------------------------------------------------
	?>
	</table>

	<table border="1" class="excel" id="example">
	<?php echo '<h3>'. $tajukjadual . '</h3>';
	$printed_headers = false; # mula bina jadual
	#-----------------------------------------------------------------
	for ($kira=0; $kira < count($row); $kira++)
	{
		if ( !$printed_headers ) # papar tajuk medan sekali sahaja:
		{
			?><thead><tr><th>#</th><?php
			foreach ( array_keys($row[$kira]) as $tajuk ) 
			{	# anda mempunyai kunci integer serta kunci rentetan
				# kerana cara PHP mengendalikan tatasusunan.
				if ($tajuk=='newss')
				{	?><th><?php echo $tajuk ?></th><?php }
				else
				{	?><th><?php echo $tajuk ?></th><?php }
			}
			?></tr></thead>
	<?php	$printed_headers = true;
		} 
	# papar data $row ------------------------------------------------
	?><tbody><tr><td align="center"><?php echo $kira+1 ?></td><?php
		$html = new \Aplikasi\Kitab\Html_TD;
		foreach ( $row[$kira] as $key=>$data )
		{
			$html->paparURL($key, $data, $myTable, 
			$cariBatch = null, $namaPegawai = null);
		} 
		?></tr></tbody>
	<?php
	}#-----------------------------------------------------------------
	?></table>

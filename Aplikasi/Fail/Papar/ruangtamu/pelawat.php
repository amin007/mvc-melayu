<div class="container">
<hr><h1>Ruangtamu - Untuk Pelawat</h1><hr>
<?php include 'menu_teks.php'; ?>
<div class="hero-unit">
<?php jadual($this->senarai); ?>

</div><!-- / class="hero-unit" -->
</div><!-- / class="container" -->

<?php
function jadual($senarai)
{
	foreach ($senarai as $myTable => $row)
	{
		if ( count($row)==0 )	echo '';
		else
		{
	?>
	<!-- Jadual <?php echo $myTable ?> ########################################### -->
	<h2><?php echo $myTable ?></h2>
	<?php include 'papar_jadual_modul.php'; ?>
	<!-- Jadual <?php echo $myTable ?> ########################################### -->
	<?php
		} # if ( count($row)==0 )
	} //*/
}

function kelebihan()
{
	# bod/owner -> memantau bayaran yuran & prestasi sekolah
	# 			-> harga mampu milik tanpa CAPEX & OPEX
	# 			-> meningkatkan pendapatan sekolah
	
	# guru besar / pengetua -> memantau bayaran yuran & prestasi sekolah
	
	# administrator -> proses pendaftaran yang sistematik
	# 				-> pengurusan yuran yang bersepadu
	# 				-> tanpa kertas, jimat ruang & mempunyai data security
	
	# guru 	-> pengurusan peperiksaan yang sistematik
	# 		-> e-quranic, headcount & kerjarumah
	#		-> sistem kehadiran kelas
	#		-> teaching plan (RPH)
	
	# ibubapa/penjaga	-> memantau kurikulum/ko-kurikulum anak2, yuran, keupayaan dan kehadiran
	#					-> berhubung dengan sekolah
	
	# pelajar	-> memantau kurikulum/ko-kurikulum, yuran, keupayaan dan kehadiran
	#			-> berhubung dengan sekolah
	#			-> kerjarumah
}

function modul1()
{
	# modul
	# pengguna -> PEMANTAUAN - PENGURUSAN - PENTADBIRAN
}

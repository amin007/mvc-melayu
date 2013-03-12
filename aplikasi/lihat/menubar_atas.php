<?php 
$nav = 'data-toggle="dropdown" class="dropdown-toggle active"';
Sesi::init(); 
$pengguna = null; //Sesi::get('namaPegawai');
$pegawai = null; //$this->pegawai;
$url = dpt_url();
?>
<ul class="nav">
<li class="dropdown">
	<a <?php echo $nav ?> href="#"><i class="icon-user icon-white"></i><?php echo $pengguna ?>
	<b class="caret"></b></a>
	<ul class="dropdown-menu">
	<li><a href="<?php echo URL ?>ruangtamu/logout">Keluar</a></li>
	<li><a href="<?php echo URL ?>ruangtamu">Anjung</a></li>
	</ul>
</li>
<li class="dropdown">
	<a <?php echo $nav ?> href="#">Bantuan
	<b class="caret"></b></a>
	<ul class="dropdown-menu">
	<li><a href="#">1. Sistem</a></li>
	<li><a href="<?php echo URL ?>forum">2. Forum</a></li>
	<li><a href="<?php echo URL ?>mesej">3. Email/Mesej Peribadi</a></li>
	</ul>
</li>
</ul>

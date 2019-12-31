<?php //echo $this->urlDerma
$kosong = null;
//$kosong = 1;
if($kosong == null):
	$nilai = 'value="5"';
	$nama = 'value="Boboiboy"';
	$email = 'value="duduk@kapalangkasa.com"';
	$handphone = 'value="0123654789"';
	//$chapcha = 'value="5"';
else:
	$nilai = $nama = $email = $handphone = '';
	//$chapcha = 'value="5"';
endif;
?>
<!-- =============================================================================== -->
<div class="container">
<form method="POST" action="<?php echo $this->urlDerma ?>">
<!-- =============================================================================== -->
	<h1>Dermalah</h1>
	<label for="inputSelect">Tajuk Derma:</label>
	<select class="custom-select" name="derma[tajuk]" size="7">
	<option selected>Choose...</option>
	<option>Tabung Rumah Anak Kucing</option>
	<option>Tabung Makanan Anak Kucing</option>
	<option>Tabung Pelajaran Anak Kucing</option>
	<option>Tabung Minuman Anak Kucing</option>
	</select>
	<label for="inputText">Nilai Derma</label>
	<input type="number" name="derma[nilai]" id="inputText" class="form-control"
	<?php echo $nilai ?> placeholder="Nilai Derma" required autofocus>
	<label for="inputText">Nama</label>
	<input type="text" name="derma[nama]" id="inputText" class="form-control"
	<?php echo $nama ?> placeholder="Nama" required autofocus>
	<label for="inputText">Email address</label>
	<input type="text" name="derma[email]" id="inputText" class="form-control"
	<?php echo $email ?> placeholder="Email address" required autofocus>
	<label for="inputText">Handphone</label>
	<input type="text" name="derma[handphone]" id="inputText" class="form-control"
	<?php echo $handphone ?> placeholder="Handphone" required autofocus>
	<label for="inputText">Capcha</label>
	<input type="submit" value="Derma" class="btn btn-lg btn-primary btn-block">
	<!-- a href="#" class="btn btn-lg btn-success btn-block">Login</a -->
<!-- =============================================================================== -->
</form>
</div><!-- / class="container" -->
<!-- =============================================================================== -->
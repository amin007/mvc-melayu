<h1>Dermalah</h1>



<form method="POST" action="<?php echo $this->urlDerma ?>">
<?php //echo $this->urlDerma ?>
<!-- =============================================================================== -->
<div class="container">
<!-- =============================================================================== -->
	<label for="inputSelect">Tajuk Derma:</label>
	<select class="custom-select" name="derma[tajuk]">
	<option selected>Choose...</option>
	<option>Tabung Rumah Anak Kucing</option>
	<option>Tabung Makanan Anak Kucing</option>
	<option>Tabung Pelajaran Anak Kucing</option>
	<option>Tabung Minuman Anak Kucing</option>
	</select>
	<label for="inputText">Nilai Derma</label>
	<input type="number" name="derma[nilai]" id="inputText" class="form-control"
	placeholder="Nilai Derma" required autofocus>
	<label for="inputText">Nama</label>
	<input type="text" name="derma[nama]" id="inputText" class="form-control"
	placeholder="Nama" required autofocus>
	<label for="inputText">Email address</label>
	<input type="text" name="derma[email]" id="inputText" class="form-control"
	placeholder="Email address" required autofocus>
	<label for="inputText">Handphone</label>
	<input type="text" name="derma[handphone]" id="inputText" class="form-control"
	placeholder="Handphone" required autofocus>
	<label for="inputText">Capcha</label>
	<input type="submit" value="Derma" class="btn btn-lg btn-primary btn-block">
	<!-- a href="#" class="btn btn-lg btn-success btn-block">Login</a -->
<!-- =============================================================================== -->
</div><!-- / class="container" -->
<!-- =============================================================================== -->
</form>
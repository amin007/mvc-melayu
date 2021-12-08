# mvc melayu 2.0
Bismillah. Nama baru untuk mvc-melayu

Mahu ikut trend macam android dan ubuntu.
Setiap satu versi ada nama baru.
Nama berdasarkan nama-nama orang yang baik.
Antaranya al-amin, karkun, sultan-jdt, tun-mahadir

MVC dalam bahasa melayu terutama nama folder, class dan pembolehubah.
Dalam folder aplikasi terdapat 4 folder utama iaitu kawal,papar,pustaka,tanya 
dimana kawal => controller, papar => view, kitab => library dan tanya => model. 

## al-amin
Dedikasikan kepada nabi muhammad saw (selawat atas nabi).

Jadi antara cadangan kita tukar istilah 4 folder utama adalah
fikirumat => controller, dakwah => view, kitab => library dan  ??? => model. 

## karkun
Dalam tabligh ada istilah taskil yang bertujuan memujuk orang keluar pada jalan Allah.
Biasanya ada orang yang akan ambil nama selepas bayan(ceramah usaha atas iman amal).
Di samping itu ada juga fikir harian, mesyuarat mingguan dan malam karguzari.

Jadi antara cadangan kita tukar istilah 4 folder utama adalah
fikir => controller, bayan => view, kitab => library dan taskil => model. 

## sultan-jdt

Jadi antara cadangan kita tukar istilah 4 folder utama adalah
dun => controller, copmohor => view, perlembagaan => library dan ??? => model. 

#konsep-asal
Tujuan guna verb (kata kerja) hanya pendek kata. Jadikan 5 huruf bagi setiap konsep mvc. 
Asalnya cuba hendak terjemahkan konsep mvc semudah mungkin dalam bahasa melayu. 
Mungkin akan dibaiki jika jumpa perkataan sesuai.

Saya tahu sukar menterjemah konsep bahasa programming dalam bahasa melayu. 
Jadi sebab itu untuk ujikaji ini saya fokuskan terjemah ke bahasa melayu untuk 
nama folder, nama class dan pembolehubah. Hanya kekalkan kata kunci dalam bahasa inggeris.

Jadi kalau ada pelajar tahun akhir yang terpaksa bangunkan aturcara php dalam bahasa melayu, 
saya ada sediakan pilihan untuk mereka.

Kalau perasan class DB_PDO extends PDO dan class DB_Mysqli saya kekalkan dalam bahasa inggeris. 
Ini kerana saya cuba bagi tahu yang $this->db akan dirujuk terus kepada 
sql yang akan guna istilah select,update,delete dan sebagainya.

___
# Php Version

```php
//phpinfo();
//echo PHPVERSION() . '<br>';
echo PHP_VERSION . '<br>';
echo PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '.' . PHP_RELEASE_VERSION . '<br>';
echo '<pre>'; print_r($_SERVER); echo '</pre>';
```
___
# spl_autoload_register()

```php
/* 4. masukkan semua fail class dari folder Aplikasi/Class
** URL : http://www.php-fig.org/psr/psr-4/examples/
** Contoh pelaksanaan projek khusus.
**
** @param string $class nama class yang sebenar tanpa namespace.
** @return void
**/
spl_autoload_register(function ($namaClass)
{
	# buat pecahan tatasusunan $namaClass
	$class = explode('\\', $namaClass); //print_r($class) . '<br>';
	# semak kewujudan class
	//echo '<hr>nama class:' . $class[count($class)-1] . ' | ';
	$cariFail = GetMatchingFiles(GetContents('Aplikasi/Kelas'),$class[count($class)-1] . '.php');
	# jika fail wujud, masukkan
	foreach($cariFail as $kitabApa)
	{	//echo '$kitabApa->' . $kitabApa . '<br>';
		if (file_exists($kitabApa)) require $kitabApa;
		//else echo 'tidak jumpa daa<br>';
	}//*/
});
```
___
# Standard
* http://www.php-fig.org/psr/psr-4/

___
# Sumber ilham dari 
* http://jream.com/lab
* https://www.php-fig.org

___
# Sumber ilham kawan-kawan
* Programming
  * [PHP Releases](https://windows.php.net/downloads/releases)
  * [Laragon](https://laragon.org)
  * [Learn-Php-For-Wordpress](https://code.tutsplus.com/courses/learn-php-for-wordpress/lessons/php-in-the-loop)
  * [PHP Codeingiter](https://codeigniter.com)
  * [PHP Cakephp](https://cakephp.org)
  * [PHP Laravel](https://laravel.com)
* Stylesheet
  * [Bootstrap](http://getbootstrap.com)
  * [Bootstrap.Themes](http://bootstrap.themes.guide)
  * [AdminLTE](https://adminlte.io/themes/AdminLTE)
  * [animate.css](https://daneden.github.io/animate.css)
  * [Sweet Alert](http://t4t5.github.io/sweetalert)
  * [FontAwesome](http://fortawesome.github.io/Font-Awesome)
* Javascript
  * [jQuery](http://jquery.com)
  * [jQuery.Form](http://malsup.com/jquery/form)
  * [backstretch](http://srobbin.com/jquery-plugins/backstretch)
* Gambar Percuma
  * [7-themes](http://7-themes.com)
  * [Pexels](https://pexels.com)
  * [Pixabay](https://pixabay.com)
  * [Unslpash](https://unsplash.com)
* Lain-lain
  * [markdown-cheatsheet](https://guides.github.com/pdfs/markdown-cheatsheet-online.pdf)
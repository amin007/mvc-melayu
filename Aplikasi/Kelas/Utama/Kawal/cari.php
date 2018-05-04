<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Cari extends \Aplikasi\Kitab\Kawal
{
#==========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		$this->_namaClass = '<hr>Nama class :' . __METHOD__ . '<hr>';
		$this->_namaFunction = '<hr>Nama function :' .__FUNCTION__ . '<hr>';
	}
##-----------------------------------------------------------------------------------------
	public function index()
	{
		# Set pemboleubah utama
		$this->papar->tajuk = namaClass($this);
		//echo $this->_namaClass; //echo $this->_namaFunction;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'index', $noInclude=0);
	}
##-----------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##-----------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>|';//*/
	}
##-----------------------------------------------------------------------------------------
	public function semakRujuk($senarai)
	{
		//echo '<pre>$senarai:<br>';
		print_r($senarai);
		//echo '</pre>|';//*/
	}
##-----------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION); echo '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#==========================================================================================
#------------------------------------------------------------------------------------------
	public function menyusun($kumpulSusun, $bilSemua = 20, $item = 10)
	{
		$ms = 1; ## set pembolehubah utama
		//echo '$bilSemua:' . $bilSemua . ', $item:' . $item . ', $ms:' . $ms . '<br>';
		$jum = pencamSqlLimit($bilSemua, $item, $ms);
		///$kumpulSusun = array('kumpul'=>null,'susun'=>'nama');
		$susun[] = array_merge($jum,  $kumpulSusun);

		return $susun;
	}
#------------------------------------------------------------------------------------------
	public function pembolehubah()
	{
		//echo '<pre>$_POST=>'; print_r($_POST); echo '</pre>';
		/* $_POST[] => Array ( [cari] => 0000000123456 or [nama] => ABC ) */
		$myJadual = array('`aes`','`kawalan_aes`','`aes_alam_sekitar`',
		'`aes_kp_205`','`aes_kp_206`','`aes_kp_207`','`aes_kp_800`',
		'`aes_perkhidmatan`','`aes_pertanian`');
		$medan = '*';
		# cari id berasaskan newss/ssm/sidap/nama
		$id['nama'] = bersih(isset($_POST['cari']) ? $_POST['cari'] : null);
		//$id['nama'] = isset($_POST['id']['nama']) ? $_POST['id']['nama'] : null;
		$kumpulSusun = array('kumpul'=>null,'susun'=>'nama');
		$susun = $this->menyusun($kumpulSusun);
		return array($myJadual, $medan, $id, $susun); //*/
	}
#------------------------------------------------------------------------------------------
	public function idnama() 
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>'; 
		# senaraikan tatasusunan jadual
		list($myJadual, $medan, $id, $susun) = $this->pembolehubah();

		if (!empty($id['nama']))
		{
			$carian[] = array('fix'=>'z%like%', # cari = atau %%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'concat_ws("",newss,nossm,nama)', # cari dalam medan apa
				'apa' => $id['nama']); # benda yang dicari
			$this->cariSyarikat($myJadual, $medan, $carian, $susun, $id['nama']);
		}
		else
		{
			$this->papar->carian[]='[id:0]'; //$this->papar->cariID = '[id:0]';
		}

		//$this->papar->template = 'bootstrap';
		$this->papar->template = 'biasa';
		$fail[] = 'a_syarikat'; $fail[] = 'index';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=0); //*/
    }
#------------------------------------------------------------------------------------------
	public function tentang($apa, $bil=1, $mesej=null)
	{
		# Fungsi ini memaparkan borang
		//echo 'mana ko pergi daa lokaliti($negeri)<br>';

		//if ($apa=='msic') $jadual = 'pom_dataekonomi.msic2000';
		if ($apa=='msic') $jadual = 'msic2000';
		elseif ($apa=='produk') $jadual = 'pom_dataekonomi.kodproduk_mei2011';
		elseif ($apa=='johor') $jadual = 'pom_lokaliti.johor'; # negeri johor/malaysia
		elseif ($apa=='malaysia') $jadual = 'pom_lokaliti.malaysia'; # negeri johor/malaysia
		elseif ($apa=='prosesan') $jadual = 'pom_dataekonomi.data_mm_prosesan';

		# Set pemboleubah utama
		$this->papar->senarai = $this->tanya->paparMedan($jadual);
		$this->papar->url = dpt_url();
		$this->papar->mesej = $mesej;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->semakPembolehubah($this->papar->url); # Semak data dulu
		$this->paparKandungan($this->_folder, 'a_mula' , $noInclude=0); //*/
	}
#------------------------------------------------------------------------------------------
	function semakOutput($mesej, $lokasi, $namajadual)
	{
		echo '<pre>'; # semak output
		echo 'Patah balik ke ' . $lokasi . '/' . $namajadual . '<hr>';
		echo '$mesej = ' . $mesej . '';
		echo '<br>$this->papar->carian :'; $this->semakRujuk($this->papar->carian);
		echo '<br>$this->papar->senarai:'; $this->semakRujuk($this->papar->senarai);
		echo '</pre>';
	}
#------------------------------------------------------------------------------------------
	function pada($bil = 400, $muka = 1)
	{	//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		/* fungsi ini memaparkan hasil carian
		 * untuk jadual msic2000 dan msic2008
		 */
		list($mesej, $lokasi, $namajadual) = $this->sayaPilih($bil, $muka);
		//$this->semakOutput($mesej, $lokasi, $namajadual);
		$this->papar->template = ($namajadual=='syarikat') ?
			'biasa' : 'bootstrap';
		$fail[] = 'a_syarikat'; $fail[] = 'index';

		# paparkan ke fail cari/$namajadual.php
		if ($mesej != null )
		{
			@$_SESSION['mesej'] = $mesej;
			//echo 'Patah balik ke ' . $lokasi . $mesej . '<hr>' . $data;
			header('location:' . URL . 'cari/' . $lokasi . $namajadual . '/2');
		}
		else# Pergi papar kandungan
			$this->paparKandungan($this->_folder, $fail[1], $noInclude=0); //*/
	}
#------------------------------------------------------------------------------------------
	function susunPembolehubah($bil, $muka)
	{	//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# setkan pembolehubah dulu
		$jadual = isset($_POST['namajadual']) ? $_POST['namajadual'] : null;
		$cari = isset($_POST['jika']['cari']) ? $_POST['jika']['cari'] : null;
		$susunX = isset($_POST['susun']) ? $_POST['susun'] : 1;
		$pilih = isset($_POST['jika']['pilih'][1]) ? $_POST['jika']['pilih'][1] : null;
		$semak = isset($_POST['jika']['cari'][1]) ? $_POST['jika']['cari'][1] : null;
		$semak2 = isset($_POST['jika']['cari'][2]) ? $_POST['jika']['cari'][2] : null;
		$atau = isset($_POST['jika']['atau']) ? $_POST['jika']['atau'] : null;
		# susun limit ikut $bil
		$kumpulSusun = array('kumpul'=>null,'susun'=>$susunX);
		$susun = $this->menyusun($kumpulSusun, '0', $bil);
		//echo 'susun:' . $this->semakPembolehubah($susun);
		//$this->semakPembolehubah($_POST);
		//echo '$bil=' . $bil. '<br>$muka=' . $muka . '<br>';
		//echo '$susunX =' . $susunX . '<br>';//echo '$pilih=' . $pilih . '<br>';
		//echo '$semak =' . $semak1 . '<br>$semak2=' . $semak2 . '<br>';

		return array($jadual,$susun,$cari,$pilih,$semak,$semak2,$atau);
	}
#------------------------------------------------------------------------------------------
	function sayaPilih($bil, $muka)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		list($namajadual,$susun,$cari,$pilih,$semak,$semak2,$atau)
			= $this->susunPembolehubah($bil, $muka);

		if (!isset($_POST['atau']) && isset($_POST['pilih'][2]))
		{	//echo ')$namajadual=' . $namajadual . '<br>';
			$mesej = 'tak isi atau-dan pada carian';
			$lokasi = ($namajadual=='johor') ? 'lokaliti/' : 'semua/';
		}
		elseif ( (empty($semak) || ( empty($semak2) && $namajadual=='johor') ) )
		{	//echo '2)$namajadual=' . $namajadual . '<br>';
			$mesej = 'tak isi pada carian';
			$lokasi = ($namajadual=='johor') ? 'lokaliti/' : 'semua/';
		}
		elseif (!empty($namajadual) )
		{
			$this->pilihYangWujud($namajadual, $cari, $susun);
			$mesej = $lokasi = null;
		}//*/

		return array($mesej,$lokasi,$namajadual);
	}
#------------------------------------------------------------------------------------------
	function pilihYangWujud($namajadual, $cari, $susun)
	{
		if ($namajadual=='msic')
			$this->sayaPilihMsic($namajadual, $cari, $susun);
		elseif ($namajadual=='produk')
			$this->sayaPilihProduk($namajadual, $cari, $susun);
		elseif ($namajadual=='johor')
			$this->sayaPilihJohor($namajadual, $cari, $susun);
		elseif ($namajadual=='syarikat')
			$this->sayaPilihSyarikat($namajadual, $cari, $susun);
		elseif ($namajadual=='data_mm_prosesan')
			$this->sayaPilihDataMM($namajadual, $cari, $susun);
	}
#------------------------------------------------------------------------------------------
	function sayaPilihMsic($namajadual, $cari, $susun)
	{	//echo '<hr>Nama class : ' . __METHOD__ . '()<hr>';
		$jadual = dpt_senarai('msicbaru'); //echo '<pre>';
		//echo 'jadual:' . $this->semakPembolehubah($jadual);

		foreach ($jadual as $key => $namaPanjang)
		{# mula ulang table
			//$myTable = substr($namaPanjang, 16);
			$myTable = $namaPanjang;
			//echo "<br>Msic) $myTable|$namaPanjang";
			$medan = $this->tanya->medanIndustri($myTable);
			$carian = $this->tanya->bentukCarian($_POST['jika'], $myTable);
			$this->papar->senarai[$myTable] = $this->tanya->
				//cariSql($namaPanjang, $medan, $carian, $susun);
				cariSemuaData($namaPanjang, $medan, $carian, $susun);
		}# tamat ulang table//*/

		$this->papar->carian = $cari;
	}
#------------------------------------------------------------------------------------------
	function sayaPilihProduk($namajadual, $cari, $susun)
	{
		$jadual = dpt_senarai('produk');
		//echo 'jadual:' . $this->semakPembolehubah($jadual);

		foreach ($jadual as $key => $namaPanjang)
		{# mula ulang table
			$myTable = substr($namaPanjang, 16); 
			//echo "<br>Produk) $myTable|$namaPanjang";
			# senarai nama medan
			$medan = ($myTable=='kodproduk_aup') ? 
				'bil,substring(kod_produk_lama,1,5) as msic,kod_produk_lama,'
				. 'kod_produk,unit_kuantiti unit,keterangan,keterangan_bi,aup,min,max' 
				: '*';
			$carian = $this->tanya->bentukCarian($_POST['jika'], $myTable);
			$this->papar->senarai[$myTable] = $this->tanya->
				cariSql($namaPanjang, $medan, $carian, $susun);
				//cariSemuaData($namaPanjang, $medan, $carian, $susun);
		}# tamat ulang table

		# papar jadual kod unit
		$unitPanjang = 'pom_dataekonomi.kodproduk_unitkuantiti';
		$unit = 'unitkuantiti';
		$this->papar->senarai[$unit] = $this->tanya->
			cariSemuaData($unitPanjang, '*', null, null);

		$this->papar->carian = $cari;
	}
#------------------------------------------------------------------------------------------
	function sayaPilihJohor($namajadual, $cari, $susun)
	{
		$jadual = dpt_senarai('***');
		//echo 'jadual:' . $this->semakPembolehubah($jadual);
		list($medanAsal, $medanBaru) = $this->tanya->bentukMedanJohor();

		foreach ($jadual as $key => $namaPanjang)
		{# mula ulang table
			$myTable = ($namaPanjang == 'pom_lokaliti.johor') ?
				'JOHOR' : 'LK-JOHOR';
			$medan = ($namaPanjang == 'pom_lokaliti.johor') ?
				$medanAsal : $medanBaru;
			$carian = $this->tanya->bentukCarian($_POST['jika'], $myTable);
			$this->papar->senarai[$myTable] = $this->tanya->
				cariSql($namaPanjang, $medan, $carian, $susun);
				//cariSemuaData($namaPanjang, $medan, $carian, $susun);
		}# tamat ulang table//*/

		$this->papar->carian = $cari;
	}
#------------------------------------------------------------------------------------------
	function sayaPilihSyarikat($namajadual, $cari, $susun)
	{
		//echo '<hr>Nama class : ' . __METHOD__ . '()<hr>';
		list($jadual, $medan, $carian) = $this->tanya->dataCorp($cari);

		foreach ($jadual as $key => $myTable)
		{# mula ulang table
			$this->papar->senarai[$myTable] = $this->tanya->
				//cariSql($myTable, $medan, $carian, $susun);
				cariSemuaData($myTable, $medan, $carian, $susun);
		}# tamat ulang table//*/

		$this->papar->carian = $cari;
	}
#------------------------------------------------------------------------------------------
	function sayaPilihDataMM($namajadual, $cari, $susun)
	{
		$jadual = dpt_senarai('***');
		//echo 'jadual:' . $this->semakPembolehubah($jadual);
		$medan = '*';

		foreach ($jadual as $key => $myTable)
		{# mula ulang table
			$carian = $this->tanya->bentukCarian($_POST['jika'], $myTable);
			$this->papar->senarai[$myTable] = $this->tanya->
				cariSql($myTable, $medan, $carian, $susun);
				//cariSemuaData($myTable, $medan, $carian, $susun);
		}# tamat ulang table//*/

		$this->papar->carian = $cari;
	}
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#==========================================================================================
}
<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Belian extends \Aplikasi\Kitab\Kawal
{
#===========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' . __FUNCTION__ . '<hr>';
	}
##------------------------------------------------------------------------------------------
	public function index()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$this->paparJadual(); # Set pembolehubah utama

		# Pergi papar kandungan
		$this->_folder = 'cari';
		$fail = array('1cari','index','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=0);//*/
	}
##------------------------------------------------------------------------------------------
	public function paparHeader($lokasi = 'pergi/mana')
	{
		//echo '<br>location: ' . URL . $lokasi;
		header('location:' . URL . $lokasi);//*/
	}
##------------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##------------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION) . '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#===========================================================================================
#-------------------------------------------------------------------------------------------
	function debugPost($debugData)
	{
		echo '<hr>Nama class :' . __METHOD__ . '()<hr><pre>';
		$takWujud = array(); $kira = 0;

		foreach($debugData as $semak):
			if(isset($$semak)):
				echo '<br>$' . $semak . ' : '; print_r($$semak);
			else:
				$takWujud[$kira++] = '$' . $semak;
			endif;
		endforeach;

		echo '<hr><font color="red">tidak wujud : '; print_r($takWujud);
		echo '</font><hr></pre>';

		//$this->debugPost();//*/
	}
#-------------------------------------------------------------------------------------------
	function debugKandunganPaparan()
	{
		echo '<hr>Nama class :' . __METHOD__ . '()<hr><pre>';
		$semak = array('idBorang','senarai','myTable','_jadual','carian','c1','c2',
			'medan','kiramedan','bentukJadual01','bentukJadual02','bentukJadual03',
			'_pilih','_method','_meta','template','pilihJadual','template2','pilihJadual2');
		$takWujud = array(); $kira = 0;

		foreach($semak as $apa):
			if(isset($this->papar->$apa)):
				echo '<br>$this->papar->' . $apa . ' : ';
				print_r($this->papar->$apa);
			else:
				$takWujud[$kira++] = '$this->papar->' . $apa;
			endif;
		endforeach;

		echo '<hr><font color="red">tidak wujud : '; print_r($takWujud);
		echo '</font><hr></pre>';
	}
#-------------------------------------------------------------------------------------------
	function kandunganPaparan($p1, $jadual)
	{
		$this->papar->myTable = $jadual;
		$this->papar->_jadual = $jadual;
		$this->papar->carian[] = 'semua';
		if(!isset($this->papar->c1))
			$this->papar->c1 = null;
		$this->papar->c2 = $this->_folder;
		$this->papar->_pilih = $p1;
		$this->papar->_method = $this->_folder;
		$this->papar->baruBorang = $this->_folder . '/baru';
		$this->papar->pdfBorang = $this->_folder . '/caripdf';
		$this->papar->cariID = 'papar';
		//$this->papar->template = 'template_biasa';
		$this->papar->pilihJadual = 'pilih_jadual_am';
		$this->papar->template2 = 'template_khas02';
		$this->papar->pilihJadual2 = 'pilih_jadual_am2';
		$this->papar->template3 = 'template_khas03';
		$this->papar->pilihJadual3 = 'pilih_jadual_am';
		//$this->papar->template2 = 'template_bootstrap';
		//$this->papar->template3 = 'template_bootstrap_table';
		//$this->papar->template1 = 'template_khas01';
		//*/
	}
#-------------------------------------------------------------------------------------------
	function ubahMeta($meta)
	{
		foreach($meta as $key => $pilih):
			$key2 = $pilih['name'];
			if(!isset($pilih['flags'][1]))# jika ('primary_key'), abaikan
				$data[0][$key2] = null;
			//$table = $pilih['table'];
			$meta[$key2]['len'] = $pilih['len'];
			$meta[$key2]['type'] = $pilih['native_type'];
			$meta[$key2]['key'] = isset($pilih['flags'][1]) ?
				$pilih['flags'][0].'|'.$pilih['flags'][1] : null;
			$meta[$key2]['type_pdo'] = $pilih['pdo_type'];
			$meta[$key2]['type_precision'] = $pilih['precision'];
			unset($meta[$key]);
		endforeach;
		//$this->semakPembolehubah($meta,'meta');
		//$this->semakPembolehubah($data,'data');

		return array($data,$meta);
	}
#-------------------------------------------------------------------------------------------
	function panggilBorang01($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($jadual, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($p1);
		list($a,$b) = $this->tanya->cariSemuaDataMeta//cariSql
			($jadual, $medan, $carian, $susun);
		//$this->papar->senarai[$jadual] = $a;# $a pulangkan nilai null
		list($data,$meta) = $this->ubahMeta($b);
		$this->papar->_meta[$jadual] = $meta;
		$this->papar->senarai[$jadual] = $data;# $data pulangkan nilai tatasusunan
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $jadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilJadual01($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($jadual, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($p1);
		list($data,$a) = $this->tanya->cariSemuaDataMeta//cariSql
			($jadual, $medan, $carian, $susun);
		$this->papar->senarai[$jadual] = $data;
		list($b,$meta) = $this->ubahMeta($a);
		$this->papar->_meta[$jadual] = $meta;
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $jadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilTable($jadual,$cari,$apa)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($a, $medan, $carian, $susun) =
			$this->tanya->ubahPencam($jadual,$cari,$apa);
		$this->papar->carian[0] = $apa;
		list($data,$b) = $this->tanya->cariSemuaDataMeta//cariSql
			($jadual, $medan, $carian, $susun);
		$this->papar->senarai[$jadual] = $data;
		list($c,$meta) = $this->ubahMeta($b);
		$this->papar->_meta[$jadual] = $meta;
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($jadual, $jadual);
	}
#-------------------------------------------------------------------------------------------
	function tambahMedanDB($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($jadual) = $this->tanya->tambahPembolehubah($p1);
		$this->papar->medan = $this->tanya->pilihMedan02($jadual);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $jadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilKhas01($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($jadual, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($p1);
		$this->papar->bentukJadual01[$p1] = $this->tanya->//cariSql
			cariSemuaData
			($jadual, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $jadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilKhas02($p1,$p2=null)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($jadual, $medan, $carian, $susun) =
			$this->tanya->susunPembolehubah($p1,$p2);
		$this->papar->bentukJadual02[$p2] = $this->tanya->//cariSql
			cariSemuaData
			($jadual, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $p2);
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
#-------------------------------------------------------------------------------------------
	function paparJadual()
	{# untuk paparkan jadual sahaja
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		$this->panggilKhas02('kod_borang','senarai_belanja');
		$this->papar->c1 = $this->tanya->
			cariKhas01($this->papar->bentukJadual02);
		unset($this->papar->bentukJadual02);
		$this->panggilJadual01('senarai_belanja');
		$this->papar->template = 'template_biasa';
		//$this->debugKandunganPaparan();//*/
	}
#-------------------------------------------------------------------------------------------
	function caripdf()
	{# untuk paparkan jadual sahaja
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		$this->panggilKhas02('kod_borang','senarai_belanja');
		$this->papar->c1 = $this->tanya->
			cariKhas01($this->papar->bentukJadual02);
		unset($this->papar->bentukJadual02);
		$this->panggilJadual01('senarai_belanja');
		$this->papar->template = 'template_biasa';
		//$this->debugKandunganPaparan();//*/

		# Pergi papar kandungan
		$this->_folder = 'caripdf';
		$fail = array('contoh000');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[0], $noInclude=1);//*/
	}
#-------------------------------------------------------------------------------------------
	public function baru()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		# Set pembolehubah utama
		$this->panggilKhas02('kod_borang','senarai_belanja');
		$this->papar->bentukJadual01 = $this->tanya->
			cariKhas01($this->papar->bentukJadual02);
		unset($this->papar->bentukJadual02);//*/
		$this->panggilBorang01('senarai_belanja');
		$this->papar->template = 'template_borang_baru';
		//$this->debugKandunganPaparan();//*/

		# Pergi papar kandungan
		$this->_folder = 'cari';
		$fail = array('1cari','index','b_baru','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[2], $noInclude=0);//*/
	}
#-------------------------------------------------------------------------------------------
	public function baruSimpan($idBorang)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$senaraiJadual = array('senarai_belanja');
		# ubahsuai $posmen
		$posmen = $this->ubahsuaiPostBaru($senaraiJadual);
		//$this->semakPembolehubah($_POST,'_POST',0);
		//$this->semakPembolehubah($posmen,'posmen',0);

		# mula ulang $senaraiJadual
		foreach ($senaraiJadual as $kunci => $jadual)
		{# mula ulang table
			//$this->tanya->tambahSql($jadual, $posmen[$jadual]);
			$this->tanya->tambahData($jadual, $posmen[$jadual]);
		}# tamat ulang table

		# pergi papar kandungan
		//echo 'location:' . URL . '';
		header('location:' . URL . ''); //*/
	}
#-------------------------------------------------------------------------------------------
	function ubahsuaiPostBaru($senaraiJadual)
	{
		$posmen = array();
		foreach ($_POST as $myTable => $value):
		if ( in_array($myTable,$senaraiJadual) ):
			foreach ($value as $kekunci => $papar)
			{
				$posmen[$myTable][$kekunci] = bersih($papar);
			}//*/
		endif; endforeach;

		/*$debugData = array('pilih','senaraiJadual','medanID','dataID','posmen');
		echo '<pre>'; foreach($debugData as $semak): if(isset($$semak)):
			echo '<br>$' . $semak . ' : '; print_r($$semak);
		endif; endforeach; echo '</pre>';//*/

		return $posmen;
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
#-------------------------------------------------------------------------------------------
	public function ubah($dataID)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		$this->panggilKhas02('kod_borang','senarai_belanja');
		$this->papar->bentukJadual01 = $this->tanya->
			cariKhas01($this->papar->bentukJadual02);
		unset($this->papar->bentukJadual02);
		$this->panggilTable('senarai_belanja','no',$dataID);
		$this->papar->template = 'template_borang_ubah';
		//$this->debugKandunganPaparan();//*/

		# Pergi papar kandungan
		$this->_folder = 'cari';
		$fail = array('1cari','index','b_baru','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[3], $noInclude=0);//*/
	}
#-------------------------------------------------------------------------------------------
	public function ubahSimpan($p1)
	{
		# ubahsuai $posmen
		list($posmen,$senaraiJadual,$medanID) = $this->ubahsuaiPost($p1);
		//$this->semakPembolehubah($medanID,'medanID',0);
		//$this->semakPembolehubah($_POST,'_POST',0);
		//$this->semakPembolehubah($posmen,'posmen',0);

		# mula ulang $senaraiJadual
		foreach ($senaraiJadual as $kunci => $jadual)
		{# mula ulang table
			$this->tanya->//ubahSqlSimpan
			ubahSimpan
			($posmen[$jadual], $jadual, $medanID);
		}# tamat ulang table

		# Pergi papar kandungan
		$lokasi = 'belian/';
		//echo '<br>location:' . URL . $lokasi;
		header('location:' . URL . $lokasi);//*/
	}
#-------------------------------------------------------------------------------------------
	function ubahsuaiPost($dataID)
	{
		list($medanID,$senaraiJadual) = $this->tanya->pilihUbahPost();

		$posmen = array(); //$this->semakPembolehubah($_POST,'_POST',0);
		foreach ($_POST as $myTable => $value):
			if ( in_array($myTable,$senaraiJadual) ):
				foreach ($value as $kekunci => $papar)
				{
					$posmen[$myTable][$kekunci] = bersih($papar);
					$posmen[$myTable][$medanID] = bersih($dataID);
				}
		endif; endforeach;//*/

		return array($posmen,$senaraiJadual,$medanID);# pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
#==========================================================================================
}
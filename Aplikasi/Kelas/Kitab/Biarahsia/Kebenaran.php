<?php
/**
 * Kawalan keselamatan untuk masuk dan keluar sistem
		Kebenaran::kawalMasuk();
		Kebenaran::kawalKeluar();
 */
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class Kebenaran
{
#====================================================================================
#------------------------------------------------------------------------------------
	/* Kebenaran::kawalMasuk() khas untuk
	 * class login dan index
	 * supaya kalau user berada dalam class tersebut
	 * sistem automatik masuk class ruangtamu
	 */
	public static function kawalMasuk()
	{
		@session_start();

		$kunci = \Aplikasi\Kitab\Sesi::get('loggedIn');
		$level = \Aplikasi\Kitab\Sesi::get('levelPengguna');
		$senaraiLevel = \Aplikasi\Kitab\Kebenaran::senaraiLevel();
		
		//echo '<pre>kawalMasuk() :: $_SESSION->', print_r($_SESSION, 1);
		//echo '<hr>$senaraiLevel->', print_r($senaraiLevel, 1);
		//echo '<br>$kunci = ' . $kunci . ' | $level = ' . $level . ' |</pre>';

		if ($kunci == true && in_array($level,$senaraiLevel))
		{
			header('location:' . URL . 'ruangtamu');
			exit;
		}
		//*/
	}
#------------------------------------------------------------------------------------
	private static function senaraiLevel()
	{
		return array('pentadbir','pelawat','kawal','pegawai');
	}
#------------------------------------------------------------------------------------
	public static function kawalKeluar()
	{
		@session_start();

		$kunci = \Aplikasi\Kitab\Sesi::get('loggedIn');
		$level = \Aplikasi\Kitab\Sesi::get('levelPengguna');
		$senaraiLevel = \Aplikasi\Kitab\Kebenaran::senaraiLevel();

		//echo '<pre>kawalKeluar() :: $_SESSION->', print_r($_SESSION, 1);
		//echo '<hr>$senaraiLevel->', print_r($senaraiLevel, 1);
		//echo '<br>$kunci = ' . $kunci . ' | $level = ' . $level . ' |</pre>';

		if ($kunci == false || !in_array($level,$senaraiLevel))
		{
			Sesi::destroy();
			header('location:' . URL . 'index/keluar');
			//header('location:' . URL . '');
			exit;
		}
		//*/
	}
#------------------------------------------------------------------------------------
	public static function papar($_folder)
	{
		# pergi papar kandungan fungsi papar() dalam KAWAL
		$senaraiPengguna = array('fe','kup','pegawai');
		$senaraiPentadbir = array('kawal');
		if (in_array(Sesi::get('levelPengguna'), $senaraiPentadbir)) 
		{
			$paras = 'Paras Pentadbir:' . Sesi::get('levelPengguna');
			return $_folder . 'index';
			//echo $paras . '<br>$this->lihat->baca(' . $_folder . 'index)';
		}
		elseif (in_array(Sesi::get('levelPengguna'), $senaraiPengguna)) 
		{
			$paras = 'Paras Pengguna:' . Sesi::get('levelPengguna');
			return $_folder . 'papar';
			//echo $paras . '<br>$this->lihat->baca(' . $_folder . 'papar)';
		}
		else
		{
			$paras = null;
			return 'ruangtamu/index';
		}
		# pergi papar kandungan fungsi papar() dalam KAWAL
	}
#------------------------------------------------------------------------------------
	public static function tambahSimpan($_folder)
	{
		# pergi papar kandungan tambahSimpan() dalam KAWAL
		$senaraiPengguna = array('fe','kup','pegawai');
		$senaraiPentadbir = array('kawal');
		if (in_array(Sesi::get('levelPengguna'), $senaraiPentadbir)) 
		{
			$paras = 'Paras Pentadbir:' . Sesi::get('levelPengguna');
			header('location: ' . URL . $_folder . '');
			//echo $paras . '<br>location: ' . URL . $_folder . '';
		}
		elseif (in_array(Sesi::get('levelPengguna'), $senaraiPengguna)) 
		{
			$paras = 'Paras Pengguna:' . Sesi::get('levelPengguna');
			header('location: ' . URL . $_folder . 'papar');
			//echo $paras . '<br>location: ' . URL . $_folder . 'papar';
		}
		else
		{
			$paras = null;
			header('location: ' . URL);
		}
		# pergi papar kandungan tambahSimpan() dalam KAWAL
	}
#------------------------------------------------------------------------------------
	public static function ubahSimpan($_folder, $ID)
	{
		# pergi papar kandungan ubahSimpan($medanID, $cariID) dalam KAWAL
		$senaraiPengguna = array('fe','kup','pegawai');
		$senaraiPentadbir = array('kawal');
		if (in_array(Sesi::get('levelPengguna'), $senaraiPentadbir)) 
		{
			$paras = 'Paras Pentadbir:' . Sesi::get('levelPengguna');
			header('location: ' . URL . $_folder . $ID);
			//echo $paras . '<br>location: ' . URL . $_folder . $ID;
		}
		elseif (in_array(Sesi::get('levelPengguna'), $senaraiPengguna))
		{
			$paras = 'Paras Pengguna:' . Sesi::get('levelPengguna');
			header('location: ' . URL . $_folder . 'papar');
			//echo $paras . '<br>location: ' . URL . $_folder . 'papar';
		}
		else
		{
			$paras = null;
			header('location: ' . URL);
		}
		# pergi papar kandungan ubahSimpan($medanID, $cariID) dalam KAWAL
	}
#------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------
#====================================================================================
}
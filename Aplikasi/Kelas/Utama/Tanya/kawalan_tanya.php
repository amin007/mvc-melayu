<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__; 
class Kawalan_Tanya extends \Aplikasi\Kitab\Tanya
{
#=====================================================================================================
	public function __construct()
	{
		parent::__construct();
	}
#---------------------------------------------------------------------------------------------------#
	function data_contoh($pilih)
	{
		$data = array(
			'namaPendek' => 'james007',
			'namaPenuh' => 'Polan Bin Polan',
			'level' => 'pelawat'
		); # dapatkan medan terlibat
		$kira = 1; # kira jumlah data

		return ($pilih==1) ? $kira : $data; # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function alihMedan()
	{
		//ALTER TABLE Employees MODIFY COLUMN empName VARCHAR(50) AFTER department;
	}
#---------------------------------------------------------------------------------------------------#
	public function semakPosmen($myTable, $posmen, $pass)
	{
		if(isset($posmen[$myTable][$pass])):
			if($posmen[$myTable][$pass] == null):
				//echo '<br> buang ' . $pass;
				unset($posmen[$myTable][$pass]);
			else:
				$posmen[$myTable][$pass] = 
					\Aplikasi\Kitab\RahsiaHash::rahsia('md5', 
					$posmen[$myTable][$pass]);
			endif;
		endif;

		return $posmen;
	}
#---------------------------------------------------------------------------------------------------#
	public function medanKawalan($cariID) 
	{ 
		$news1 = 'http://sidapmuar/ekonomi/ckawalan/ubah/' . $cariID;
		$news2 = 'http://sidapmuar/ekonomi/cprosesan/ubah/000/'.$cariID.'/2010/2015/'; 
		$news3 = 'http://sidapmuar/ekonomi/semakan/ubah/",kp,"/'.$cariID.'/2010/2015/'; 
		$url1 = '" <a target=_blank href=' . $news1 . '>SEMAK 1</a>"' . "\r";
		$url2 = '" <a target=_blank href=' . $news2 . '>SEMAK 2</a>"' . "\r";
		$url3 = 'concat("<a target=_blank href=' . $news3 . '>SEMAK 3</a>")' . "\r";
        $medanKawalan = 'newss,'
			//. '( if (hasil is null, "", '
			. 'concat_ws("|",nama,operator,'.$url1 . ',' . $url3 .') nama,'
			/*. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," hasil",format(hasil,0)),' . "\r"
			. ' 	concat_ws("="," belanja",format(belanja,0)),' . "\r"
			. ' 	concat_ws("="," gaji",format(gaji,0)),' . "\r"
			. ' 	concat_ws("="," aset",format(aset,0)),' . "\r"
			. ' 	concat_ws("="," staf",format(staf,0)),' . "\r"
			. ' 	concat_ws("="," stok akhir",format(stok,0))' . "\r"
 			. ' ) as data5P,' . "\r"//*/
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," responden",responden),' . "\r"
			. ' 	concat_ws("="," notel",notel),' . "\r"
			. ' 	concat_ws("="," nofax",nofax),' . "\r"
			. ' 	concat_ws("="," orang_",orang_a),' . "\r"
			. ' 	concat_ws("="," notel_a",notel_a),' . "\r"
			. ' 	concat_ws("="," nofax_a",nofax_a)' . "\r"
 			. ' ) as dataHubungi,' . "\r"
			. 'concat_ws(" | ",nossm,kp) as nossm,fe,po,' . "\r"
			//. 'mko,respon,nota,nota_prosesan,' . "\r"
			. 'concat_ws(" ",alamat1,alamat2,poskod,bandar,daerah,ngdbbp) as alamat,' . "\r"
			//. 'no,batu,jalan,tmn_kg,dp_baru,' . "\r"
			//. 'concat_ws(" ",no,batu,'
			//. '( if (jalan is null, "", concat("JALAN ",jalan) ) ),
			//. 'tmn_kg,poskod,dp_baru) alamat_baru,' . "\r"
			. 'concat_ws("-",kp,msic2008) msic2008,' 
			. 'concat_ws("-",kp,msic2008) keterangan,' . "\r"
			//. 'concat_ws("=>ngdbbp baru=",ngdbbp,ngdbbp_baru) ngdbbp,ngdbbp_baru,' . "\r"
			//. 'batchAwal,dsk,mko,batchProses,'
			. 'lawat,terima,hantar,hantar_prosesan,' . "\r" 
			. '"" as pecah5P,hasil,belanja,gaji,aset,staf,stok' . "\r" 
			. '';	
		return $medanKawalan;
	}
#---------------------------------------------------------------------------------------------------#
#---------------------------------------------------------------------------------------------------#
#=====================================================================================================
}
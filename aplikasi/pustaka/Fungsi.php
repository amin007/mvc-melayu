<?php

function dpt_url()
{
	$url = isset($_GET['url']) ? $_GET['url'] : null;
	$url = rtrim($url, '/');
	$url = filter_var($url, FILTER_SANITIZE_URL);
	$url = explode('/', $url);

	return $url;
}

function dpt_url_xfilter()
{
	$url = isset($_GET['url']) ? $_GET['url'] : null;
	//$url = rtrim($url, '/');
	//$url = filter_var($url, FILTER_SANITIZE_URL);
	$url = explode('/', $url);

	return $url;
}

function dpt_ip()
{
	$IP = array('192.168.1.', '10.69.112.', 
		'127.0.0.1', '10.72.112.');

	return $IP;
}

function dpt_senarai($namajadual)
{
	if ($namajadual=='msiclama')
		$jadual = array('msic08','msic2008',
		'msic_v1','msic_bandingan',
		'msic','msic_nota_kaki');
	elseif ($namajadual=='msicbaru')
		$jadual = array('msic2008','msic2008_asas',
		'msic_v1','msic_bandingan',
		'msic2000','msic2000_notakaki');
	elseif ($namajadual=='produk')
		$jadual = array('a_someplace',
		'b__someplace',
		'c__someplace');
	elseif ($namajadual=='johor')
		$jadual = array('johor');
	
	
	return $jadual;
}

function pecah_post()
{
	$papar['pilih'] = isset($_POST['pilih']) ? $_POST['pilih'] : null;
	$papar['cari'] = isset($_POST['cari']) ? $_POST['cari'] : null;
	$papar['fix'] = isset($_POST['fix']) ? $_POST['fix'] : null;
	$papar['atau'] = isset($_POST['atau']) ? $_POST['atau'] : null;
	
	$kira['pilih'] = count($papar['pilih']);
	$kira['cari'] = count($papar['cari']);
	$kira['fix'] = count($papar['fix']);
	$kira['atau'] = count($papar['atau']);
	
	return $kira;
	//echo '<pre>'; print_r($kira) . '</pre>';
}

function tahunan($jenis, $t)
{	

	if ($jenis=='kawalan') 
		$tahunan = array('kawal_icdt'.$t,'5p_icdt'.$t,'rangka_icdt'.$t,'alamat_icdt'.$t);
	//elseif ($jenis=='prosesan')
	elseif ($jenis=='semuakawalan')
		$tahunan = array('kawal_ppmas09','kawal_rpe09','kawal_tani09',
		'sse08_rangka','sse09_buat','sse09_ppt','sse10_kawal');
	elseif ($jenis=='bulan_penuh')
		$bulan = array('Januari', 'Februari', 'Mac', 'April', 
		'Mei', 'Jun', 'Julai', 'Ogos', 
		'September', 'Oktober', 'November', 'Disember');
	
	return $tahunan;
}

function lihat($tab,$kini,$papar,$pegawai) 
{	/*	kawalan/semua/30/
	( !isset($url[4]) ) ? null : $url[4];*/
	$selit = null;
	$p = dpt_url();
	//echo '<pre>$p->', print_r($p, 1) . '</pre>';
	 $bln = ( !isset($p[2]) ) ? 'rangka/' : $p[2] . '/'; //'jan12'; 
	$item = ( !isset($p[3]) ) ? '20/' : $p[3] . '/'; //'30'; 
	  $ms = ( !isset($p[4]) ) ? '1/' : $p[4] . '/'; //'2'; 

	$url = $bln . $item . $ms;
		
	$i=1;foreach ($pegawai as $fe) 
	{
		$selit .= $tab . '<li><a href="' . URL . $papar . 
		$url . $fe .
		'">' . $i++ . ' ' . $fe . '</a></li>' . "\r";
	}
	echo "\r" . $selit . $tab;
}

function pencamSqlLimit($bilSemua)
{
	// tentukan pembolehubah
	$url = dpt_url(); // sepatutnya kawalan/semua/jan12/30/2
	$item = ( !isset($url[3]) ) ? null : $url[3];
	$mukasurat= ( !isset($url[4]) ) ? null : $url[4];
	// buat sql
	#$semua = mysql_query($sql) or diehard4('sql1->',$sql); 
	// Tentukan bilangan jumlah dalam DB:
	$jum['bil_semua'] = $bilSemua; //mysql_num_rows($semua);
	// ambil halaman semasa, jika tiada, cipta satu! 
	$jum['page'] = ( !isset($mukasurat) )? 1: $mukasurat;
	// berapa item dalam satu halaman
	$jum['max'] = ( !isset($item) )? 100: $item;
	// Tentukan had query berasaskan nombor halaman semasa.
	$jum['dari'] = (($jum['page'] * $jum['max']) - $jum['max']); 
	// Tentukan bilangan halaman. 
	$jum['muka_surat'] = ceil($jum['bil_semua'] / $jum['max']);
	// nak tentukan berapa bil jumlah dlm satu muka surat
	$jum['bil'] = $jum['dari']+1; 
	//sql kedua
	//$query = $sql . ' LIMIT ' . $jum['dari'] . ', ' . $jum['max']; 
	
	return $jum;
}

function halaman($jum)
{// function halaman() - mula
	$mula = '<span style="background-color: #fffaf0; color:black">';
	$tamat  = '</span>';
	$page = $jum['page'];
	$muka_surat = $jum['muka_surat'];
	$bil_semua = $jum['bil_semua'];
	$baris_max = $jum['max'];
			
	$url = dpt_url(); // sepatutnya kawalan/semua/jan12/30/2
	$class = ( !isset($url[0]) ) ? null : $url[0]; //'kawalan'; 
	$fungsi = ( !isset($url[1]) ) ? null : $url[1]; //'semua'; 
	$bln = ( !isset($url[2]) ) ? null : $url[2]; //'jan12'; 
	$item = ( !isset($url[3]) ) ? null : $url[3]; //'30'; 
	$ms = ( !isset($url[4]) ) ? null : $url[4]; //'2'; 
	$fe = ( !isset($url[5]) ) ? null : $url[5]; //'amin'; 

	
	$senarai = URL . "$class/$fungsi/$bln/$baris_max/";
	$halaman = "\nBil Kes:($bil_semua)- Papar halaman " .
		'<div class="pagination"><ul>'; 
		
	if($page > 1) // Bina halaman sebelum
		$halaman .= "\r<li><a href='$senarai" . ($page-1) . "/$fe'>Sebelum</a></li>";
	for($i = 1; $i <= $muka_surat; $i++) // Bina halaman terkini
		{$halaman .= ($page==$i)? "<li><a>($i)</a></li>" : "\r<li><a href='$senarai$i/$fe'>$i</a></li>";}
	if($page < $muka_surat) // Bina halaman akhir
		$halaman .= "\r<li><a href='$senarai" . ($page+1) . "/$fe'>Lagi</a></li>";
		
	$halaman .= "\n</ul></div>\n";

	return $halaman;
}// function halaman() - tamat

function cariMedanInput($ubah,$f,$row,$nama) 
{/* mula -
	$ubah = nama jadual
	$f = nombor medan
	$row = data medan
	$nama = nama medan
	
	senarai nama medan
	0-nota,1-respon,2-fe,3-tel,4-fax,		
	5-responden,6-email,7-msic,8-msic08,
	9-`id U M`,10-nama,11-sidap,12-status 
 */// papar medan yang terlibat
 
	$cariMedan = array(0,1,2,3,4,5,6,8);
	$cariText = array(0); // papar jika nota ada
	$cariMsic = array(8); // papar input text msic sahaja 
	$namaM = $ubah .'[' . $nama . ']';
		
	// tentukan medan yang ada input
	$input=in_array($f,$cariMedan)? 
	(@in_array($f,$cariMsic)? // tentukan medan yang ada msic
		'<input type="text" name="' . $namaM . '" value="' . $row[$f] . '" size=6>'
		:(@in_array($f,$cariText)? // tentukan medan yang ada input textarea
			'<textarea name="' . $namaM . '" rows=2 cols=23>' . $row[$f] . '</textarea>'
			: // tentukan medan yang bukan input textarea
			'<input type="text" name="' . $namaM . '" value="' . $row[$f] . '" size=30>'
		)
	):'<label class="papan">' . $row[$f] . '</label>';
	
	return $input;

}

function kira($kiraan)
{
	// pecahan kepada ratus
	return number_format($kiraan,0,'.',',');
} 

function kira2($dulu,$kini)
{
	// buat bandingan dan pecahan kepada ratus
	return @number_format((($kini-$dulu)/$dulu)*100,0,'.',',');
	//@$kiraan=(($kini-$dulu)/$dulu)*100;
}

function huruf($jenis , $papar) 
{	
	switch ($jenis) 
	{// mula - pilih $jenis
	case 'BESAR':
		$papar = strtoupper($papar);
		break;
	case 'kecil':
		$papar = strtolower($papar);
		break;
	case 'Depan':
		$papar = ucfrist($papar);
		break;
	case 'Besar_Depan':
		$papar = mb_convert_case($papar, MB_CASE_TITLE);
		break;
	}// tamat - pilih $jenis
	
	return $papar;

}

function bersih($papar) 
{
	# lepas lari aksara khas dalam SQL
	//$papar = mysql_real_escape_string($papar);
	# buang ruang kosong (atau aksara lain) dari mula & akhir 
	$papar = trim($papar);
	
	return $papar;
}

function sms_get_data($data)
{
	$dataGet = '';
	foreach($data as $key=>$val)
	{
		if (!empty($dataGet)) $dataGet .= '&';
		$dataGet .= $key . '=' . urlencode($val);
	}

	return $dataGet;
}

function cari_imej($ssm,$strDir)
{
	//require_once ('public/skrip/listfiles2/dir_functions.php');

	if ( isset($ssm) && empty($ssm) )
	{
		$cariImej = null;
	}
	else
	{
		// You can modify this in case you need a different extension
		$strExt = "tif";

		// This is the full match pattern based upon your selections above
		$pattern = "*" . $ssm . "*." . $strExt;
		$cariImej = GetMatchingFiles(GetContents($strDir),$pattern);
	}
	
	//print_r($cariImej);
	return $cariImej;
}
// lisfile2 - mula
function GetMatchingFiles($files, $search) 
{
	// Split to name and filetype
	if(strpos($search,".")) 
	{
		$baseexp=substr($search,0,strpos($search,"."));
		$typeexp=substr($search,strpos($search,".")+1,strlen($search));
	} 
	else 
	{ 
		$baseexp=$search;
		$typeexp="";
	} 
		
	// Escape all regexp Characters 
	$baseexp=preg_quote($baseexp); 
	$typeexp=preg_quote($typeexp); 
		
	// Allow ? and *
	$baseexp=str_replace(array("\*","\?"), array(".*","."), $baseexp);
	$typeexp=str_replace(array("\*","\?"), array(".*","."), $typeexp);
		   
	// Search for Matches
	$i=0;
	$matches=null; // $matches adalah array()
	foreach($files as $file) 
	{
		$filename=basename($file);
			  
		if(strpos($filename,".")) 
		{
			$base=substr($filename,0,strpos($filename,"."));
			$type=substr($filename,strpos($filename,".")+1,strlen($filename));
		} 
		else 
		{ 
			$base=$filename;
			$type="";
		}

		if(preg_match("/^".$baseexp."$/i",$base) && preg_match("/^".$typeexp."$/i",$type))  
		{
			$matches[$i]=$file;
			$i++;
		}
	}
	
	return $matches;
	//return $matches;
}

// Returns all Files contained in given dir, including subdirs
function GetContents($dir,$files=array()) 
{
	if(!($res=opendir($dir))) exit("$dir doesn't exist!");
		while(($file=readdir($res))==TRUE) 
		if($file!="." && $file!="..")
			if(is_dir("$dir/$file")) $files=GetContents("$dir/$file",$files);
				else array_push($files,"$dir/$file");
		 
	closedir($res);
	return $files;
}
// listfile2 - tamat

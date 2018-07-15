<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class Sql
{
#=================================================================================================
#-------------------------------------------------------------------------------------------------
	function __construct() { }
#-------------------------------------------------------------------------------------------------
#=================================================================================================
# mula - bentuk arahan select sql
#-------------------------------------------------------------------------------------------------
	private function jikaKosong($fix,$di,$medan,$cariApa,$akhir)
	{
		$jika = null; //echo "\r($fix) +> $di $medan -> '$cariApa' |";
		//$cariApa==null OR $fix=='xnull'
		if($cariApa==null)
			$jika .= ($fix=='x!=') ? " $di`$medan` != '' $akhir\r"
				: " $di`$medan` is null $akhir\r";
		elseif($fix=='xnull')
			$jika .= " $di`$medan` is not null  $akhir\r";

		return $jika; //echo '<br>' . $jika;
	}
#-------------------------------------------------------------------------------------------------
	private function jikaSamaDgn($fix,$di,$medan,$cariApa,$akhir)
	{
		$jika = null; //echo "\r($fix) +> $di $medan -> '$cariApa' |";
		//array('x=','x!=','x<=','x>=')
		if($fix=='x=')
			$jika .= " $di`$medan` = '$cariApa' $akhir\r";
		elseif($fix=='x!=')
			$jika .= " $di`$medan` != '$cariApa' $akhir\r";
		elseif($fix=='x<=')
			$jika .= " $di`$medan` <= '$cariApa' $akhir\r";
		elseif($fix=='x>=')
			$jika .= " $di`$medan` >= '$cariApa' $akhir\r";

		return $jika; //echo '<br>' . $jika;
	}
#-------------------------------------------------------------------------------------------------
	private function jikaLike($fix,$di,$medan,$cariApa,$akhir)
	{
		$jika = null; //echo "\r($fix) +> $di $medan -> '$cariApa' |";
		//array('like','xlike','%like%','x%like%',
		//	'like%','xlike%','%like','x%like')
		if($fix=='like')
			$jika .= " $di`$medan` like '$cariApa' $akhir\r";
		elseif($fix=='xlike')
			$jika .= " $di`$medan` not like '$cariApa' $akhir\r";
		elseif($fix=='%like%')
			$jika .= " $di`$medan` like '%$cariApa%' $akhir\r";
		elseif($fix=='x%like%')
			$jika .= " $di`$medan` not like '%$cariApa%' $akhir\r";
		elseif($fix=='like%')
			$jika .= " $di`$medan` like '$cariApa%' $akhir\r";
		elseif($fix=='xlike%')
			$jika .= " $di`$medan` not like '$cariApa%' $akhir\r";
		elseif($fix=='%like')
			$jika .= " $di`$medan` like '%$cariApa' $akhir\r";
		elseif($fix=='x%like')
			$jika .= " $di`$medan` not like '%$cariApa' $akhir\r";

		return $jika; //echo '<br>' . $jika;
	}
#-------------------------------------------------------------------------------------------------
	private function jikaDalamKurungan($fix,$di,$medan,$cariApa,$akhir)
	{
		$jika = null; //echo "\r($fix) +> $di $medan -> '$cariApa' |";
		//array('in','xin')
		if($fix=='in')
			$jika .= " $di`$medan` in $cariApa $akhir\r";
		elseif($fix=='xin')
			$jika .= " $di`$medan` not in $cariApa $akhir\r";

		return $jika; //echo '<br>' . $jika;
	}
#-------------------------------------------------------------------------------------------------
	private function jikaAtauKurungan($fix,$di,$medan,$cariApa,$akhir)
	{
		$jika = null; //echo "\r($fix) +> $di $medan -> '$cariApa' |";
		//array('or(x=)','or(%like%)')
		if($fix=='or(x=)') //" $di (`$cari`='$apa' OR msic2000='$apa')\r" :
		{	$pecah = explode('|', $medan);
			$jika .= " $di(`" . $pecah[0] . "` = '$cariApa' "
			. " OR `" . $pecah[1] . "` = '$cariApa')\r";	}
		elseif($fix=='or(%like%)')
		{	$pecah = explode('|', $medan);
			$jika .= " $di(`" . $pecah[0] . "` like '%$cariApa%' "
			. " OR `" . $pecah[1] . "` like '%$cariApa%')\r";	}

		return $jika; //echo '<br>' . $jika;
	}
#-------------------------------------------------------------------------------------------------
	private function jikaRegexp($fix,$di,$medan,$cariApa,$akhir)
	{
		$jika = null; //echo "\r($fix) +> $di $medan -> '$cariApa' |";
		//array('khas2','xkhas2','khas3','xkhas4')
		if($fix=='khas2')
			$jika .= " $di`$medan` REGEXP CONCAT('(^| )','',$cariApa) $akhir\r";
		elseif($fix=='xkhas2')
			$jika .= " $di`$medan` NOT REGEXP CONCAT('(^| )','',$cariApa) $akhir\r";
		elseif($fix=='khas3')
			$jika .= " $di`$medan` REGEXP CONCAT('[[:<:]]',$cariApa,'[[:>:]]') $akhir\r";
		elseif($fix=='xkhas4')
			$jika .= " $di`$medan` NOT REGEXP CONCAT('[[:<:]]',$cariApa,'[[:>:]]') $akhir\r";

		return $jika; //echo '<br>' . $jika;
	}
#-------------------------------------------------------------------------------------------------
	private function jikaZ($fix,$di,$medan,$cariApa,$akhir)
	{
		$jika = null; //echo "\r($fix) +> $di $medan -> '$cariApa' |";
		//array('z%like%','z1','z2','z2x','z3x','zin','zxin')
		if($fix=='z%like%')
			$jika .= " $di$medan like '%$cariApa%' $akhir\r";
		elseif($fix=='z1')
			$jika .= " $di$medan = $cariApa $akhir\r";
		elseif($fix=='z2')
			$jika .= " $di$medan like '$cariApa' $akhir\r";
		elseif($fix=='z2x')
			$jika .= " $di$medan not like '$cariApa' $akhir\r";
		elseif($fix=='z3x')
			$jika .= " $di$medan IS NOT NULL $akhir\r";
		elseif($fix=='zin')
			$jika .= " $di$medan in $cariApa $akhir\r";
		elseif($fix=='zxin')
			$jika .= " $di$medan not in $cariApa $akhir\r";
		elseif($fix=='1=1')
			$jika .= " $di 1=1 $akhir\r";

		return $jika; //echo '<br>' . $jika;
	}
#-------------------------------------------------------------------------------------------------
	private function jika($fix,$di,$medan,$cariApa,$akhir=null)
	{
		$dimana = null; //echo "\r($fix) +> $di $medan -> '$cariApa' |";
		if($fix==null) $dimana .= null;
		elseif($cariApa==null OR $fix=='xnull')
			$dimana .= $this->jikaKosong($fix,$di,$medan,$cariApa,$akhir);
		elseif( in_array($fix,array('x=','x!=','x<=','x>=')) )
			$dimana .= $this->jikaSamaDgn($fix,$di,$medan,$cariApa,$akhir);
		elseif( in_array($fix,array('like','xlike','%like%','x%like%',
			'like%','xlike%','%like','x%like')) )
			$dimana .= $this->jikaLike($fix,$di,$medan,$cariApa,$akhir);
		elseif( in_array($fix,array('in','xin')) )
			$dimana .= $this->jikaDalamKurungan($fix,$di,$medan,$cariApa,$akhir);
		elseif( in_array($fix,array('or(x=)','or(%like%)')) )
			$dimana .= $this->jikaAtauKurungan($fix,$di,$medan,$cariApa,$akhir);
		elseif( in_array($fix,array('khas2','xkhas2','khas3','xkhas4')) )
			$dimana .= $this->jikaRegexp($fix,$di,$medan,$cariApa,$akhir);
		elseif( in_array($fix,array('z%like%','z1','z2','z2x','z3x','zin','zxin','1=1')) )
			$dimana .= $this->jikaZ($fix,$di,$medan,$cariApa,$akhir);

		return $dimana; //echo '<br>' . $dimana;
	}
#-------------------------------------------------------------------------------------------------
	public function dimana($carian)
	{
		$where = null; //echo '<pre>'; print_r($carian); echo '</pre>';
		if($carian==null || $carian=='' || empty($carian) ):
			$where .= null;
		else:
			foreach ($carian as $key=>$value)
			{
				   $di = isset($carian[$key]['atau'])  ? $carian[$key]['atau'] . ' ' : null;
				$medan = isset($carian[$key]['medan']) ? $carian[$key]['medan']      : null;
				  $fix = isset($carian[$key]['fix'])   ? $carian[$key]['fix']        : null;
				 $cari = isset($carian[$key]['apa'])   ? $carian[$key]['apa']        : null;
				$akhir = isset($carian[$key]['akhir']) ? $carian[$key]['akhir']      : null;
				//echo "\r$key => ($fix) $di $medan -> '$cari' |";
				$where .= $this->jika($fix,$di,$medan,$cari,$akhir);
			}
		endif;

		return $where; //echo '<pre>'; print_r($where); echo '</pre>';
	}
#-------------------------------------------------------------------------------------------------
	public function dibawah($cari)
	{
		$susunan = null; //echo '<pre>'; print_r($cari); echo '</pre>';
		if($cari==null || empty($cari) ):
			$susunan .= null;
		else:
			foreach ($cari as $key=>$val)
			{
				$mengira = isset($cari[$key]['mengira'])? $cari[$key]['mengira'] : null;
				 $kumpul = isset($cari[$key]['kumpul']) ? $cari[$key]['kumpul']  : null;
				  $order = isset($cari[$key]['susun'])  ? $cari[$key]['susun']   : null;
				   $dari = isset($cari[$key]['dari'])   ? $cari[$key]['dari']    : null;
				    $max = isset($cari[$key]['max'])    ? $cari[$key]['max']     : null;
				//echo "\$val = $val, \$key=$key <br>";
			}	//$this->semakPembolehUbah($mengira,$kumpul,$order,$dari,$max);
				$susunan .= $this->atur($mengira,$kumpul,$order,$dari,$max);
		endif;

		return $susunan; //echo '<pre>$susunan:'; print_r($susunan); echo '</pre>';
	}
#-------------------------------------------------------------------------------------------------
	private function atur($mengira,$kumpul,$order,$dari,$max)
	{
		$susunan = "\r";
			if ($kumpul!=null) $susunan .= " GROUP BY $kumpul\r";
			if ($mengira!=null)$susunan .= " $mengira\r";
			if ($order!=null)  $susunan .= " ORDER BY $order\r";
			if ($max!=null)    $susunan .= ($dari==0) ?
				" LIMIT $max\r" : " LIMIT $dari,$max\r";

		return $susunan; //echo '<pre>$susunan:'; print_r($susunan); echo '</pre>';
	}
#-------------------------------------------------------------------------------------------------
	private function semakPembolehUbah($mengira,$kumpul,$order,$dari,$max)
	{
		echo '<br>$mengira = ' . $mengira;
		echo '<br>$kumpul = ' . $kumpul;
		echo '<br>$order = ' . $order;
		echo '<br>$dari = ' . $dari;
		echo '<br>$max = ' . $max;
		echo '<hr>';
		//*/
	}
#-------------------------------------------------------------------------------------------------
	public function bentukSqlSelect($myTable, $medan, $carian, $susun = null)
	{
		$sql = ' SELECT ' . $medan . "\r" . ' FROM ' . $myTable
			 . "\r" . $this->dimana($carian)
			 . $this->dibawah($susun);

		return $sql;
	}
#-------------------------------------------------------------------------------------------------
# tamat - bentuk arahan select sql
#=================================================================================================
# mula - bentuk arahan update sql
#-------------------------------------------------------------------------------------------------
	public function bentukSqlUpdate($data, $myTable, $medanID)
	{
		//echo '<pre>$data->'; print_r($data); echo '</pre>';
		foreach ($data as $medan => $nilai)
		{
			if ($medan == $medanID)
				//$where = " WHERE `$medanID` = '{$data[$medanID]}' ";
				$where = $this->dimanaUpdate($data,$medanID);
			elseif ($medan != $medanID)
				$senarai[] = ($nilai==null) ?
				" `$medan`=null" : " `$medan`='$nilai'";
		}

		$medanData = implode(",\r",$senarai);
		$sql = "\r UPDATE `$myTable` SET \r$medanData\r $where";

		return $sql;
	}
#-------------------------------------------------------------------------------------------------
	private function dimanaUpdate($data,$medanID)
	{
		# bentuk tatasusunan 1 $carian //$carian = null;
		/*$where = $this->dimana( array( 0=>
			array('fix'=>'x=', # cari x= atau %like%
			'atau'=>'WHERE', # WHERE / OR / AND
			'medan' => $medanID, # cari dalam medan apa
			'apa' => "{$data[$medanID]}") # benda yang dicari
			));//*/
		# bentuk tatasusunan 2
		$fix = 'x='; # cari x= atau %like%
		$di = 'WHERE'; # WHERE / OR / AND
		$medan = $medanID; # cari dalam medan apa
		$apa = "{$data[$medanID]}"; # benda yang dicari
		$where = $this->jika($fix,$di,$medan,$apa,null);

		return $where;
	}
#-------------------------------------------------------------------------------------------------
	public function bentukSqlUpdateDPO($data, $myTable, $medanID)
	{
		//echo '<pre>$data->'; print_r($data); echo '</pre>';
		list($medan, $where, $data2) = $this->ulangData($data, $medanID);
		$sql = "\r UPDATE `$myTable` SET \r$medanData\r $where";

		return array($sql,$data2);
	}
#-------------------------------------------------------------------------------------------------
	public function ulangDataPDO($data, $medanID)
	{## foreach $data
		foreach ($data as $medan => $nilai)
		{
			$senarai[] = " `$medan`=:$medan";
			$data2[$medan] = ($nilai==null) ? 'null' : $nilai;
		}

		$medan = implode(",\r",$senarai);
		$where = "`$medanID`=:$medanID ";

		return array($medan, $where, $data2);
	}
#-------------------------------------------------------------------------------------------------
	public function bentukSqlSimpanSemua($data, $myTable, $medanID, $dimana)
	{
		//echo '<pre>$data->'; print_r($data); echo '</pre>';
		//echo '<pre>$dimana->'; print_r($dimana); echo '</pre>';
		$senarai = null;

		foreach ($data as $medan => $nilai)
		{
			if ($medan == $medanID)
				$where = " WHERE `$medanID` = '{$dimana[$medanID]}' ";
			$senarai[] = ($nilai==null) ?
				" `$medan`=null" : " `$medan`='$nilai'";
		}

		$senaraiData = implode(",\r",$senarai);

		# sql update jika $data[$medanID] berbeza dengan $dimana[$medanID]
		$sql = " UPDATE `$myTable` SET \r$senaraiData\r $where";

		return $sql;
	}
#-------------------------------------------------------------------------------------------------
# tamat - bentuk arahan update sql
#=================================================================================================
# mula - bentuk arahan insert sql
#-------------------------------------------------------------------------------------------------
	public function arahanSet($myTable, $data)
	{
		$senarai = null; //echo '<pre>$data->'; print_r($data); echo '</pre>';
		foreach ($data as $medan => $nilai)
		{
			$senarai[] = ($nilai==null) ? " `$medan`=null" : " `$medan`='$nilai'";
		}

		# set sql
		$sql  = "INSERT INTO $myTable SET \r";
		$sql .= implode(",\r", $senarai);

		return $sql;
	}
#-------------------------------------------------------------------------------------------------
	public function arahanValues($myTable, $medan, $data)
	{
		//echo '<pre>$data->'; print_r($data); echo '</pre>';

		# set sql
		$sql  = "INSERT INTO $myTable\r($medan) VALUES \r";
		$sql .= implode(",\r", $data) . ";";

		return $sql;
	}
#-------------------------------------------------------------------------------------------------
# tamat - bentuk arahan insert sql
#=================================================================================================
#-------------------------------------------------------------------------------------------------
#=================================================================================================
}
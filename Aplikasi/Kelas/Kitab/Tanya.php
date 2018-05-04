<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class Tanya
{
#==========================================================================================
	function __construct()
	{
		$this->db = new \Aplikasi\Kitab\DB_Pdo(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		//$this->db = new \Aplikasi\Kitab\DB_Mysqli(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
	}

	private function jika($fix,$atau,$medan,$cariApa,$akhir)
	{
		$dimana = null; //echo "\r($fix) +> $atau $medan -> '$cariApa' |";
		if($fix==null) $dimana .= null;
		elseif($cariApa==null)
			$dimana .= ($fix=='x!=') ? " $atau`$medan` != '' $akhir\r"
					: " $atau`$medan` is null $akhir\r";
		elseif($fix=='xnull')
			$dimana .= " $atau`$medan` is not null  $akhir\r";
		elseif($fix=='x=')
			$dimana .= " $atau`$medan` = '$cariApa' $akhir\r";
		elseif($fix=='x!=')
			$dimana .= " $atau`$medan` != '$cariApa' $akhir\r";
		elseif($fix=='x<=')
			$dimana .= " $atau`$medan` <= '$cariApa' $akhir\r";
		elseif($fix=='x>=')
			$dimana .= " $atau`$medan` >= '$cariApa' $akhir\r";
		elseif($fix=='like')
			$dimana .= " $atau`$medan` like '$cariApa' $akhir\r";
		elseif($fix=='xlike')
			$dimana .= " $atau`$medan` not like '$cariApa' $akhir\r";
		elseif($fix=='%like%')
			$dimana .= " $atau`$medan` like '%$cariApa%' $akhir\r";	
		elseif($fix=='x%like%')
			$dimana .= " $atau`$medan` not like '%$cariApa%' $akhir\r";
		elseif($fix=='like%')
			$dimana .= " $atau`$medan` like '$cariApa%' $akhir\r";
		elseif($fix=='xlike%')
			$dimana .= " $atau`$medan` not like '$cariApa%' $akhir\r";
		elseif($fix=='%like')
			$dimana .= " $atau`$medan` like '%$cariApa' $akhir\r";
		elseif($fix=='x%like')
			$dimana .= " $atau`$medan` not like '%$cariApa' $akhir\r";
		elseif($fix=='in')
			$dimana .= " $atau`$medan` in $cariApa $akhir\r";
		elseif($fix=='xin')
			$dimana .= " $atau`$medan` not in $cariApa $akhir\r";
		elseif($fix=='khas2')
			$dimana .= " $atau`$medan` REGEXP CONCAT('(^| )','',$cariApa) $akhir\r";
		elseif($fix=='xkhas2')
			$dimana .= " $atau`$medan` NOT REGEXP CONCAT('(^| )','',$cariApa) $akhir\r";
		elseif($fix=='khas3')
			$dimana .= " $atau`$medan` REGEXP CONCAT('[[:<:]]',$cariApa,'[[:>:]]') $akhir\r";
		elseif($fix=='xkhas4')
			$dimana .= " $atau`$medan` NOT REGEXP CONCAT('[[:<:]]',$cariApa,'[[:>:]]') $akhir\r";
		elseif($fix=='z%like%')
			$dimana .= " $atau$medan like '%$cariApa%' $akhir\r";
		elseif($fix=='z1')
			$dimana .= " $atau$medan = $cariApa $akhir\r";
		elseif($fix=='z2')
			$dimana .= " $atau$medan like '$cariApa' $akhir\r";
		elseif($fix=='z2x')
			$dimana .= " $atau$medan not like '$cariApa' $akhir\r";
		elseif($fix=='z3x')
			$dimana .= " $atau$medan IS NOT NULL $akhir\r";
		elseif($fix=='zin')
			$dimana .= " $atau$medan in $cariApa $akhir\r";
		elseif($fix=='zxin')
			$dimana .= " $atau$medan not in $cariApa $akhir\r";
		elseif($fix=='or(x=)') //" $atau (`$cari`='$apa' OR msic2000='$apa')\r" :
		{	$pecah = explode('|', $medan);
			$dimana .= " $atau(`" . $pecah[0] . "` = '$cariApa' "
			. " OR `" . $pecah[1] . "` = '$cariApa')\r";	}
		elseif($fix=='or(%like%)')
		{	$pecah = explode('|', $medan);
			$dimana .= " $atau(`" . $pecah[0] . "` like '%$cariApa%' "
			. " OR `" . $pecah[1] . "` like '%$cariApa%')\r";	}

		return $dimana; //echo '<br>' . $dimana;
	}

	private function dimana($carian)
	{
		$where = null; //echo '<pre>'; print_r($carian); echo '</pre>';
		if($carian==null || $carian=='' || empty($carian) ):
			$where .= null;
		else:
			foreach ($carian as $key=>$value)
			{
				 $atau = isset($carian[$key]['atau'])  ? $carian[$key]['atau'] . ' ' : null;
				$medan = isset($carian[$key]['medan']) ? $carian[$key]['medan']      : null;
				  $fix = isset($carian[$key]['fix'])   ? $carian[$key]['fix']        : null;
				 $cari = isset($carian[$key]['apa'])   ? $carian[$key]['apa']        : null;
				$akhir = isset($carian[$key]['akhir']) ? $carian[$key]['akhir']      : null;
				//echo "\r$key => ($fix) $atau $medan -> '$cari' |";
				$where .= $this->jika($fix,$atau,$medan,$cari,$akhir);
			}
		endif;

		return $where; //echo '<pre>'; print_r($where); echo '</pre>';
	}

	private function dibawah($carian)
	{
		$susunan = null; //echo '<pre>'; print_r($carian); echo '</pre>';
		if($carian==null || empty($carian) ):
			$susunan .= null;
		else:
			foreach ($carian as $key=>$cari)
			{
				$mengira = isset($carian[$key]['mengira'])? $carian[$key]['mengira'] : null;
				 $kumpul = isset($carian[$key]['kumpul']) ? $carian[$key]['kumpul']  : null;
				  $order = isset($carian[$key]['susun'])  ? $carian[$key]['susun']   : null;
				   $dari = isset($carian[$key]['dari'])   ? $carian[$key]['dari']    : null;
				    $max = isset($carian[$key]['max'])    ? $carian[$key]['max']     : null;
				//echo "\$cari = $cari, \$key=$key <br>";
			}
				if ($kumpul!=null) $susunan .= " GROUP BY $kumpul\r";
				if ($mengira!=null)$susunan .= " $mengira\r";
				if ($order!=null)  $susunan .= " ORDER BY $order\r";
				if ($max!=null)    $susunan .= ($dari==0) ? 
					" LIMIT $max\r" : " LIMIT $dari,$max\r";
		endif;

		return $susunan; //echo '<pre>'; print_r($susunan); echo '</pre>';
	}

	public function kiraMedan($myTable, $medan, $carian)
	{
		$sql = 'SELECT ' . $medan . ' FROM ' . $myTable 
			 . $this->dimana($carian);

		//echo htmlentities($sql) . '<br>';
		$result = $this->db->columnCount($sql);

		return $result;
	}

	public function kiraBaris($myTable, $medan, $carian)
	{
		$sql = 'SELECT ' . $medan . ' FROM ' . $myTable 
			 . $this->dimana($carian);

		//echo htmlentities($sql) . '<br>';
		$result = $this->db->rowCount($sql);

		return $result;
	}

	public function paparMedan($myTable)
	{
		//return $this->db->select('SHOW COLUMNS FROM ' . $myTable);
		$sql = 'SHOW COLUMNS FROM ' . $myTable;
		return $this->db->selectAll($sql);
	}

	public function pilihMedan($database,$myTable)
	{
		/*TABLE_CATALOG, TABLE_SCHEMA, TABLE_NAME
		COLUMN_NAME, ORDINAL_POSITION, COLUMN_DEFAULT, IS_NULLABLE, DATA_TYPE
		CHARACTER_MAXIMUM_LENGTH, CHARACTER_OCTET_LENGTH, NUMERIC_PRECISION, NUMERIC_SCALE
		CHARACTER_SET_NAME, COLLATION_NAME
		COLUMN_TYPE, COLUMN_KEY	EXTRA, PRIVILEGES, COLUMN_COMMENT*/
		$medan = 'COLUMN_NAME, DATA_TYPE, ' . "\r"
			   . 'concat_ws(" ",CHARACTER_MAXIMUM_LENGTH, NUMERIC_PRECISION) DATA_NO, ' . "\r"
			   . 'COLUMN_KEY, EXTRA, PRIVILEGES, COLUMN_COMMENT';
		$medan = huruf('Besar_Depan', $medan);
		$sql = ' SELECT ' . "\r" . $medan . "\r" 
			 . ' FROM INFORMATION_SCHEMA.COLUMNS' . "\r"
			 . ' WHERE table_schema = ' . $database . "\r"
			 . ' AND table_name = ' . $myTable;

		echo htmlentities($sql) . '<br>';
		return $this->db->selectAll($sql);
	}

	public function ubahMedan($myTable, $medan)
	{
		$sql = 'ALTER TABLE `' . $myTable . '` '
			 . 'CHANGE `' . $medan['asal'] . '` '
			 . '`' . $medan['baru'] . '` ' . $medan['jenis'] . ' '
			 . 'AFTER `' . $medan['selepas'] . '` ';

		echo htmlentities($sql) . '<br>';
		//return $this->db->selectAll($sql);
	}

	public function cariSemuaData($myTable, $medan, $carian, $susun)
	{
		$sql = 'SELECT ' . $medan . ' FROM ' . $myTable 
			 . $this->dimana($carian)
			 . $this->dibawah($susun);

		//echo htmlentities($sql) . '<br>';
		$result = $this->db->selectAll($sql);
		//echo json_encode($result);

		return $result;
	}

	public function cariSql($myTable, $medan, $carian, $susun)
	{
		$sql = 'SELECT ' . $medan . ' FROM ' . $myTable 
			 . $this->dimana($carian)
			 . $this->dibawah($susun);

		echo htmlentities($sql) . '<br>';
		//echo '<pre>$sql->' . $sql . '</pre><br>';
	}

	public function cariArahanSql($myTable, $medan, $carian, $susun)
	{
		$sql = 'SELECT ' . $medan . ' FROM ' . $myTable 
			 . $this->dimana($carian)
			 . $this->dibawah($susun);

		//echo htmlentities($sql) . '<br>';
		return $sql;
	}
#--- mula - contoh cari dan simpan ---#
	public function cariArahanSimpanFailSql($backupFile, $myTable)
	{
		$sql = "SELECT * INTO OUTFILE '$backupFile' FROM $myTable";

		echo 'Class Tanya.php |<br>' . htmlentities($sql) . '<br>';
		$result = $this->db->selectAll($sql);
		//echo json_encode($result);

		return $result;	
	}
#--- tamat - contoh cari dan simpan ---#
#--- mula - contoh tambah sql guna set ---#
	public function tambahSql($myTable, $data)
	{
		$senarai = null; //echo '<pre>$data->', print_r($data, 1) . '</pre>';
		foreach ($data as $medan => $nilai)
		{
			$senarai[] = ($nilai==null) ? " `$medan`=null" : " `$medan`='$nilai'"; 
		}

		# set sql
		$sql  = "INSERT INTO $myTable SET \r";
		$sql .= implode(",\r", $senarai);

		echo '<pre>Tambah $sql->'; print_r($sql); echo '</pre>';
		//$this->db->insert($sql);
	}

	public function tambahData($myTable, $data)
	{
		$senarai = null; //echo '<pre>$data->', print_r($data, 1); echo '</pre>';
		foreach ($data as $medan => $nilai)
		{
			$senarai[] = ($nilai==null) ? " `$medan`=null" : " `$medan`='$nilai'"; 
		}

		# set sql
		$sql  = "INSERT INTO $myTable SET \r";
		$sql .= implode(",\r", $senarai);

		//echo '<pre>Tambah $sql->'; print_r($sql); echo '</pre>';
		$this->db->insert($myTable, $data);
	}
#--- tamat - contoh tambah sql guna set ---#
#--- mula - contoh tambah sql guna values ---#
	public function tambahSimpanBanyak($myTable, $data)
	{
		//echo '<pre>$myTable->', print_r($data, 1); echo '</pre>';
		$this->db->insert($myTable, $data);
	}

	public function tambahSqlBanyakNilai($myTable, $medan, $data)
	{
		//echo '<pre>$data->', print_r($data, 1); echo '</pre>';

		# set sql
		$sql  = "INSERT INTO $myTable\r($medan) VALUES \r";
		$sql .= implode(",\r", $data) . ";";

		echo '<pre>$sql->'; print_r($sql); echo '</pre>';
		//$this->db->insertAll($sql);
	}

	public function tambahArahanSqlBanyakNilai($myTable, $medan, $data)
	{
		//echo '<pre>$data->', print_r($data, 1); echo '</pre>';

		# set sql
		$sql  = "INSERT INTO $myTable\r($medan) VALUES \r";
		$sql .= implode(",\r", $data) . ";";

		return $sql;
	}

	public function tambahBanyakNilai($myTable, $medan, $data)
	{
		//echo '<pre>$data->', print_r($data, 1); echo '</pre>';

		# set sql
		$sql  = "INSERT INTO $myTable\r($medan) VALUES \r";
		$sql .= implode(",\r", $data) . ";";

		//echo '<pre>$sql->'; print_r($sql); echo '</pre>';
		$this->db->insertAll($sql);
	}

	public function tambahPDOBanyakNilai($myTable, $medan, $dataProksi, $data)
	{
		//echo '<pre>$data->', print_r($data, 1); echo '</pre>';

		# set sql
		$sql  = "INSERT INTO `$myTable`\r($medan) VALUES \r";
		$sql .= implode(",\r", $dataProksi) . ";";

		//echo '<pre>$sql->'; print_r($sql); echo '</pre>';
		$this->db->insertAllNew($sql,$data);
	}

#--- tamat - contoh tambah sql guna values ---#
	public function buatJadual($myTable, $medan)
	{
		# set sql
		$sql = 'CREATE TABLE `' . $myTable . '` '
			 . "\r(\r" . $medan . "\r)"
			 . ';';

		//echo '$sql-><pre>'; print_r($sql); echo '</pre>';
		$this->db->selectAll($sql);
	}

	public function salinJadual($myTableNew, $medan, $myTableOld)
	{
		# set sql
		$sql = 'CREATE TABLE ' . $myTableNew . ' AS'
			 . ' SELECT ' . $medan . ' FROM ' . $myTableOld
			 . '';

		echo '$sql-><pre>'; print_r($sql); echo '</pre>';
		//$this->db->insert($sql);	header('location:' . URL . 'test/paparfail');
	}

	public function tambahJadual($myTable, $kira, $cantumMedan, $cantumData)
	{
		# set sql
		$sql  = "CREATE TABLE `$myTable` /*".($kira)."*/(\r";
		$sql .= substr($cantumMedan, 0, -1);
		$sql .= "\r);\r\rINSERT INTO `$myTable` VALUES \r";
		$sql .= implode(",\r", $cantumData);

		echo '$sql-><pre>'; print_r($sql); echo '</pre>';
		//$this->db->insert($sql);	header('location:' . URL . 'test/paparfail');
	}

	public function ubahSimpan($data, $myTable, $medanID)
	{
		$senarai = null; //echo '<pre>$data->', print_r($data, 1) . '</pre>';

		foreach ($data as $medan => $nilai)
		{
			if ($medan == $medanID)
				$cariID = $medan;
			elseif ($medan != $medanID)
				$senarai[] = ($nilai==null) ? " `$medan`=null" : " `$medan`='$nilai'"; 
		}

		$senaraiData = implode(",\r",$senarai);
		$where = "`$cariID` = '{$data[$cariID]}' ";

		# set sql
		$sql = " UPDATE `$myTable` SET \r$senaraiData\r WHERE $where";
		//echo '$sql-><pre>'; print_r($sql); echo '</pre>';
		$this->db->update($sql);
	}

	public function ubahSqlSimpan($data, $myTable, $medanID)
	{
		$senarai = null; //echo '<pre>$data->', print_r($data, 1); echo '</pre>';

		foreach ($data as $medan => $nilai)
		{
			if ($medan == $medanID)
				$where = " WHERE `$medanID` = '{$data[$medanID]}' ";
			elseif ($medan != $medanID)
				$senarai[] = ($nilai==null) ? 
				" `$medan`=null" : " `$medan`='$nilai'"; 
		}

		$senaraiData = implode(",\r",$senarai);

		# set sql
		$sql = " UPDATE `$myTable` SET \r$senaraiData\r $where";
		echo '<pre>$sql->'; print_r($sql); echo '</pre>';//*/
	}

	public function ubahPDOSqlSimpan($data, $myTable, $medanID)
	{
		$senarai = null; //echo '<pre>$data->'; print_r($data); echo '</pre>';

		foreach ($data as $medan => $nilai)
		{
			$senarai[] = " `$medan`=:$medan"; 
			$data2[$medan] = ($nilai==null) ? 'null' : $nilai; 
		}

		$senaraiData = implode(",\r",$senarai);
		$where = "`$medanID`=:$medanID ";

		# set sql
		$sql = " UPDATE `$myTable` SET \r$senaraiData\r WHERE $where";
		//echo '$sql-><pre>'; print_r($sql); echo '</pre>';
		$this->db->updateNew($sql, $data);
	}

	public function ubahArahanSqlSimpan($data, $myTable, $medanID)
	{
		$senarai = null; //echo '<pre>$data->', print_r($data, 1); echo '</pre>';

		foreach ($data as $medan => $nilai)
		{
			if ($medan == $medanID)
				$where = " WHERE `$medanID` = `{$data[$medanID]}` ";
			elseif ($medan != $medanID)
				$senarai[] = ($nilai==null) ? 
				" `$medan` = null" : " `$medan` = `$nilai`"; 
		}

		$senaraiData = implode(",\r",$senarai);

		# set sql
		return $sql = " UPDATE `$myTable` SET \r$senaraiData\r $where";
		//echo '<pre>$sql->'; print_r($sql); echo '</pre>';//*/
	}

	public function ubahSimpanSemua($data, $myTable, $medanID, $dimana)
	{
		//echo '<pre>$data->', print_r($data, 1); echo '</pre>';
		//echo '<pre>$dimana->', print_r($dimana, 1); echo '</pre>';
		$senarai = null;

		foreach ($data as $medan => $nilai)
		{
			if ($medan == $medanID)
				$where = " WHERE `$medanID` = '{$dimana[$medanID]}' ";
			$senarai[] = ($nilai==null) ? 
				" `$medan`=null" : " `$medan`='$nilai'";
		}

		$senaraiData = implode(",\r",$senarai);

		# set sql
		$sql = " UPDATE `$myTable` SET \r$senaraiData\r $where";
		echo '<pre>$sql->'; print_r($sql, 1); echo '</pre>';
		//$this->db->update($sql);
		//*/
	}

	public function ubahSqlSimpanSemua($data, $myTable, $medanID, $dimana)
	{
		//echo '<pre>$data->', print_r($data, 1) . '</pre>';
		//echo '<pre>$dimana->', print_r($dimana, 1) . '</pre>';
		$senarai = null;

		foreach ($data as $medan => $nilai)
		{
			if ($medan == $medanID)
				$where = " WHERE `$medanID` = '{$dimana[$medanID]}' ";
			$senarai[] = ($nilai==null) ? 
				" `$medan`=null" : " `$medan`='$nilai'";
		}

		$senaraiData = implode(",\r",$senarai);

		# set sql
		$sql = " UPDATE `$myTable` SET \r$senaraiData\r $where";
		echo '<pre>$sql->'; print_r($sql, 1); echo '</pre>';
	}

	/*public function buangTerus($data, $myTable)
	{
		//echo '<pre>$sql->', print_r($data, 1); echo '</pre>';
		$cariID = 'newss';

		// set sql
		//$sql = " DELETE `$myTable` WHERE `$cariID` = '{$data[$cariID]}' ";
		//echo '<pre>$sql->', print_r($sql, 1); echo '</pre>';
		$this->db->delete($myTable, "`$cariID` = '{$data[$cariID]}' ");
	}//*/

#==========================================================================================
}
<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class Tanya
{
#=================================================================================================
#-------------------------------------------------------------------------------------------------
	function __construct()
	{
		$this->db = new \Aplikasi\Kitab\DB_Pdo(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		//$this->db = new \Aplikasi\Kitab\DB_Mysqli(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		$this->sql = new \Aplikasi\Kitab\Sql();
	}
#-------------------------------------------------------------------------------------------------
	public function paparMedan($myTable)
	{
		//return $this->db->select('SHOW COLUMNS FROM ' . $myTable);
		$sql = 'SHOW COLUMNS FROM ' . $myTable;
		return $this->db->selectAll($sql);
	}
#-------------------------------------------------------------------------------------------------
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
#-------------------------------------------------------------------------------------------------
	public function ubahMedan($myTable, $medan)
	{
		$sql = 'ALTER TABLE `' . $myTable . '` '
			 . 'CHANGE `' . $medan['asal'] . '` '
			 . '`' . $medan['baru'] . '` ' . $medan['jenis'] . ' '
			 . 'AFTER `' . $medan['selepas'] . '` ';

		echo htmlentities($sql) . '<br>';
		//return $this->db->selectAll($sql);
	}
#-------------------------------------------------------------------------------------------------
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
#-------------------------------------------------------------------------------------------------
	public function buatJadual($myTable, $medan)
	{
		# set sql
		$sql = 'CREATE TABLE `' . $myTable . '` '
			 . "\r(\r" . $medan . "\r)"
			 . ';';

		//echo '$sql-><pre>'; print_r($sql); echo '</pre>';
		$this->db->selectAll($sql);
	}
#-------------------------------------------------------------------------------------------------
	public function salinJadual($myTableNew, $medan, $myTableOld)
	{
		# set sql
		$sql = 'CREATE TABLE ' . $myTableNew . ' AS'
			 . ' SELECT ' . $medan . ' FROM ' . $myTableOld
			 . '';

		echo '$sql-><pre>'; print_r($sql); echo '</pre>';
		//$this->db->insert($sql);	header('location:' . URL . 'test/paparfail');
	}
#-------------------------------------------------------------------------------------------------
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
#-------------------------------------------------------------------------------------------------
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
#-------------------------------------------------------------------------------------------------
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
#-------------------------------------------------------------------------------------------------
	public function tambahSqlBanyakNilai($myTable, $medan, $data)
	{
		//echo '<pre>$data->', print_r($data, 1); echo '</pre>';

		# set sql
		$sql  = "INSERT INTO $myTable\r($medan) VALUES \r";
		$sql .= implode(",\r", $data) . ";";

		echo '<pre>$sql->'; print_r($sql); echo '</pre>';
		//$this->db->insertAll($sql);
	}
#-------------------------------------------------------------------------------------------------
	public function tambahArahanSqlBanyakNilai($myTable, $medan, $data)
	{
		//echo '<pre>$data->', print_r($data, 1); echo '</pre>';

		# set sql
		$sql  = "INSERT INTO $myTable\r($medan) VALUES \r";
		$sql .= implode(",\r", $data) . ";";

		return $sql;
	}
#-------------------------------------------------------------------------------------------------
	public function tambahBanyakNilai($myTable, $medan, $data)
	{
		//echo '<pre>$data->', print_r($data, 1); echo '</pre>';

		# set sql
		$sql  = "INSERT INTO $myTable\r($medan) VALUES \r";
		$sql .= implode(",\r", $data) . ";";

		//echo '<pre>$sql->'; print_r($sql); echo '</pre>';
		$this->db->insertAll($sql);
	}
#-------------------------------------------------------------------------------------------------
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
##################################################################################################
## mula - untuk select sql
	#---------------------------------------------------------------------------------------------
	public function kiraMedan($myTable, $medan, $carian)
	{
		$sql = $this->sql->bentukSqlSelect($myTable, $medan, $carian);

		//echo htmlentities($sql) . '<br>';
		$result = $this->db->columnCount($sql);

		return $result;
	}
	#---------------------------------------------------------------------------------------------
	public function kiraBaris($myTable, $medan, $carian)
	{
		$sql = $this->sql->bentukSqlSelect($myTable, $medan, $carian);
		//echo htmlentities($sql) . '<br>';
		$result = $this->db->rowCount($sql);

		return $result;
	}
	#---------------------------------------------------------------------------------------------
	public function cariSemuaData($myTable, $medan, $carian, $susun)
	{
		$sql = $this->sql->bentukSqlSelect($myTable, $medan, $carian, $susun);
		$result = $this->db->selectAll($sql);
		//echo json_encode($result);

		return $result;
	}
	#---------------------------------------------------------------------------------------------
	public function cariArahanSql($myTable, $medan, $carian, $susun)
	{
		$sql = $this->sql->bentukSqlSelect($myTable, $medan, $carian, $susun);

		return $sql;
	}
	#---------------------------------------------------------------------------------------------
	public function cariSql($myTable, $medan, $carian, $susun)
	{
		$sql = $this->sql->bentukSqlSelect($myTable, $medan, $carian, $susun);

		echo '<pre>' . htmlentities($sql) . '</pre><br>';
	}
	#---------------------------------------------------------------------------------------------
	public function paparSql($myTable, $medan, $carian, $susun)
	{
		$sql = $this->sql->bentukSqlSelect($myTable, $medan, $carian, $susun);

		echo '<pre>$sql->' . htmlentities($sql) . '</pre><br>';
	}
	#---------------------------------------------------------------------------------------------
## tamat - untuk select sql
##################################################################################################
## mula - untuk update sql
	#---------------------------------------------------------------------------------------------
	public function ubahSimpan($data, $myTable, $medanID)
	{
		$sql = $this->sql->bentukSqlUpdate($data, $myTable, $medanID);
		//echo '<pre>$sql->'; print_r($sql); echo '</pre>';
		$this->db->update($sql);
	}
	#---------------------------------------------------------------------------------------------
	public function ubahSqlSimpan($data, $myTable, $medanID)
	{
		$sql = $this->sql->bentukSqlUpdate($data, $myTable, $medanID);
		echo '<pre>$sql->'; print_r($sql); echo '</pre>';
	}
	#---------------------------------------------------------------------------------------------
	public function ubahArahanSqlSimpan($data, $myTable, $medanID)
	{
		return $this->sql->bentukSqlUpdate($data, $myTable, $medanID);
		//echo '<pre>$sql->'; print_r($sql); echo '</pre>';
	}
	#---------------------------------------------------------------------------------------------
	public function ubahPDOSqlSimpan($data, $myTable, $medanID)
	{
		list($sql, $data2) = $this->sql->bentukSqlUpdateDPO($data, $myTable, $medanID);
		//echo '$sql-><pre>'; print_r($sql); echo '</pre>';
		$this->db->updateNew($sql, $data2);
	}
	#---------------------------------------------------------------------------------------------
	public function ubahSimpanSemua($data, $myTable, $medanID, $dimana)
	{
		$sql = $this->sql->bentukSqlSimpanSemua($data, $myTable, $medanID, $dimana);
		echo '<pre>$sql->'; print_r($sql); echo '</pre>';
		//$this->db->update($sql);//*/
	}
	#---------------------------------------------------------------------------------------------
	public function ubahSqlSimpanSemua($data, $myTable, $medanID, $dimana)
	{
		$sql = $this->sql->bentukSqlSimpanSemua($data, $myTable, $medanID, $dimana);
		echo '<pre>$sql->'; print_r($sql); echo '</pre>';
	}
	#---------------------------------------------------------------------------------------------
## tamat - untuk update sql
##################################################################################################
#-------------------------------------------------------------------------------------------------
	/*public function buangTerus($data, $myTable)
	{
		//echo '<pre>$sql->', print_r($data, 1); echo '</pre>';
		$cariID = 'newss';

		// set sql
		//$sql = " DELETE `$myTable` WHERE `$cariID` = '{$data[$cariID]}' ";
		//echo '<pre>$sql->', print_r($sql, 1); echo '</pre>';
		$this->db->delete($myTable, "`$cariID` = '{$data[$cariID]}' ");
	}//*/
#-------------------------------------------------------------------------------------------------
#=================================================================================================
}
<?php

class Kawalan_Tanya extends Tanya 
{

	public function __construct() 
	{
		parent::__construct();
	}

	public function kiraKes($myTable, $medan, $cari)
	{
		$fe = ( !isset($cari['fe']) ) ? '' : ' WHERE fe = "' . $cari['fe'] . '"';
		$kp = ( !isset($cari['kp']) ) ? '' : ' and kp = "' . $cari['kp'] . '"';
		$carian = $fe . $kp;
		return $this->db->rowcount('SELECT ' . $medan . ' FROM ' .
		$myTable . $carian);
	}

	public function kesSemua($myTable, $medan, $cari, $jum)
	{
		//$jum['dari'] . ', ' . $jum['max']
		$fe = ( !isset($cari['fe']) ) ? '' : ' WHERE fe = "' . $cari['fe'] . '"';
		$kp = ( !isset($cari['kp']) ) ? '' : ' and kp = "' . $cari['kp'] . '"';
		$susun = ( !isset($cari['susun']) ) ? '' : ' ORDER BY ' . $cari['susun'];
		$carian = $fe . $kp;
		$sql = 'SELECT ' . $medan . ' FROM ' . $myTable . $carian .
			//'ORDER BY 14 desc,1' .
			$susun . ' LIMIT ' . $jum['dari'] . ', ' . $jum['max'];
		
		//echo $sql . '<br>';
		$result = $this->db->select($sql);
		//echo json_encode($result);
		
		return $result;
	}

	public function kesSelesai($myTable, $medan, $cari, $jum)
	{
		//$jum['dari'] . ', ' . $jum['max']
		$fe = ( !isset($cari['fe']) ) ? '' : ' and fe = "' . $cari['fe'] . '"';
		$kp = ( !isset($cari['kp']) ) ? '' : ' and kp = "' . $cari['kp'] . '"';
		$susun = ( !isset($cari['susun']) ) ? '' : ' ORDER BY ' . $cari['susun'];
		$carian = $fe . $kp;
		$sql = 'SELECT ' . $medan . ' FROM ' . $myTable . 
			' WHERE terima is not null ' .	$carian .
			$susun . ' LIMIT ' . $jum['dari'] . ', ' . $jum['max'];
		
		//echo $sql . '<br>';
		$result = $this->db->select($sql);
		//echo json_encode($result);
		
		return $result;
	}

	public function kesJanji($myTable, $medan, $cari, $jum)
	{
		//$jum['dari'] . ', ' . $jum['max'] 
		$fe = ( !isset($cari['fe']) ) ? '' : ' and fe = "' . $cari['fe'] . '"';
		$kp = ( !isset($cari['kp']) ) ? '' : ' and kp = "' . $cari['kp'] . '"';
		$susun = ( !isset($cari['susun']) ) ? '' : ' ORDER BY ' . $cari['susun'];
		$janji = '"B1","B2","B3","B4","B5","B7"';
		$carian = $fe . $kp;
		$sql = 'SELECT ' . $medan . ' FROM ' . $myTable . 
			' WHERE respon in (' . $janji . ') ' . $carian . 
			$susun . ' LIMIT ' . $jum['dari'] . ', ' . $jum['max'];
		
		//echo $sql . '<br>';
		$result = $this->db->select($sql);
		//echo json_encode($result);
		
		return $result;
	}
	public function kesBelum($myTable, $medan, $cari, $jum)
	{
		//$jum['dari'] . ', ' . $jum['max']
		$fe = ( !isset($cari['fe']) ) ? '' : ' and fe = "' . $cari['fe'] . '"';
		$kp = ( !isset($cari['kp']) ) ? '' : ' and kp = "' . $cari['kp'] . '"';
		$susun = ( !isset($cari['susun']) ) ? '' : ' ORDER BY ' . $cari['susun'];
		$carian = $fe . $kp;
		$sql = 'SELECT ' . $medan . ' FROM ' . $myTable . 
			' WHERE (terima is null ' .
			'or terima like "0000%") ' . $carian .
			$susun . ' LIMIT ' . $jum['dari'] . ', ' . $jum['max'];
		
		//echo $sql . '<br>';
		$result = $this->db->select($sql);
		//echo json_encode($result);
		
		return $result;
	}

	public function kesTegar($myTable, $medan, $cari, $jum)
	{
		//$jum['dari'] . ', ' . $jum['max']
		$fe = ( !isset($cari['fe']) ) ? '' : ' and fe = "' . $cari['fe'] . '"';
		$kp = ( !isset($cari['kp']) ) ? '' : ' and kp = "' . $cari['kp'] . '"';
		$susun = ( !isset($cari['susun']) ) ? '' : ' ORDER BY ' . $cari['susun'];
		$carian = $fe . $kp;
		$sql = 'SELECT ' . $medan . ' FROM ' . $myTable . 
			' WHERE (`respon` not like "A1" ' .
			'and `respon` not like "B%") ' . $carian .
			$susun . ' LIMIT ' . $jum['dari'] . ', ' . $jum['max'];
		
		//echo $sql . '<br>';
		$result = $this->db->select($sql);
		//echo json_encode($result);
		
		return $result;
	}
	
	public function cariMedan($myTable, $medan, $cariMedan, $cariID)
	{
		return //$result =
		$this->db->select('SELECT ' . $medan . ' FROM ' . $myTable .
		' WHERE ' . $cariMedan . ' like "%' . $cariID . '%" ');
		//' WHERE ' . $medan . ' like %:cariID% ', array(':cariID' => $cariID));
		//echo json_encode($result);
	}
	
	public function cariSemuaMedan($myTable, $medan, $cariMedan, $cariID)
	{
		return //$result =
		$this->db->select('SELECT ' . $medan . ' FROM ' . $myTable .
		' WHERE ' . $cariMedan . ' like "%' . $cariID . '%" ');
		//' WHERE ' . $medan . ' like %:cariID% ', array(':cariID' => $cariID));
		//echo json_encode($result);
	}

	public function cariSatuSahaja($myTable, $medan, $cari)
	{
	
		//$fe = ( !isset($cari['fe']) ) ? '' : ' and fe = "' . $cari['fe'] . '"';
		
		$cariMedan = ( !isset($cari['medan']) ) ? '' : $cari['medan'];
		$cariID = ( !isset($cari['id']) ) ? '' : $cari['id'];
		
		$sql = 'SELECT ' . $medan . ' FROM ' . 	$myTable . 
			' WHERE ' . $cariMedan . ' = "' . $cariID . '" ';
		
		//echo $sql . '<br>';
		$result = $this->db->select($sql);
		//echo json_encode($result);
		
		return $result;
	}

	public function ubahSimpan($data, $myTable)
	{
		//echo '<pre>$sql->', print_r($data, 1) . '</pre>';
		$senarai = null;
		$medanID = 'newss';
		
		foreach ($data as $medan => $nilai)
		{
			//$postData[$medan] = $nilai;
			if ($medan == $medanID)
				$cariID = $medan;
			elseif ($medan != $medanID)
				$senarai[] = ($nilai==null) ? " $medan=null" : " $medan='$nilai'"; 
			if(($medan == 'fe'))
				$fe = ($nilai==null) ? " $medan=null" : " $medan='$nilai'"; 
		}
		
		$senaraiData = implode(",\r",$senarai);
		$where = "`$cariID` = '{$data[$cariID]}' ";
		
		// set sql
		$sql = " UPDATE $myTable SET \r$senaraiData\r WHERE $where";
		//echo '<pre>$sql->', print_r($sql, 1) . '</pre>';
		$this->db->update($sql);
	}

	function xhrInsert($data, $myTable) 
	{
		$text = $_POST['text'];
		$this->db->insert('data', array('text' => $text));
		$data = array('text' => $text, 'id' => $this->db->lastInsertId());
		echo json_encode($data);
	}
	
	function xhrGetListings($data, $myTable)
	{
		$result = $this->db->select("SELECT * FROM data");
		//echo $result;
		echo json_encode($result);
	}
	
	function xhrDeleteListing($data, $myTable)
	{
		$id = (int) $_POST['id'];
		$this->db->delete('data', "id = '$id'");
	}

}
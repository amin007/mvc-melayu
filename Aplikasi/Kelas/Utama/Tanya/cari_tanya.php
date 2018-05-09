<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__; 
class Cari_Tanya extends \Aplikasi\Kitab\Tanya
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
	public function cariPOST($myTable, $medan, $susun)
	{
		$sql = 'SELECT ' . $medan . "\r" . ' FROM ' . $myTable . "\r"
			 . $this->dimanaPOST($myTable) . $susun;

		//echo '<pre>$sql->'; print_r($sql); echo '</pre>';
		return $this->db->selectAll($sql);
	}
#---------------------------------------------------------------------------------------------------#
	private function dimanaPOST($myTable)
	{
		//echo '<pre>$_POST->'; print_r($_POST) . '</pre>';
		// //' WHERE ' . $medan . ' like %:cariID% ', array(':cariID' => $cariID));
		$where = null;
		if($_POST==null || empty($_POST) ):
			$where .= null;
		else:
			foreach ($_POST['pilih'] as $key=>$cari)
			{
				$apa = $_POST['cari'][$key];
				$f = isset($_POST['fix'][$key]) ? $_POST['fix'][$key] : null;
				$atau = isset($_POST['atau'][$key]) ? $_POST['atau'][$key] : 'WHERE';

				//$sql.="\r$key => $f  | ";

				if ($apa==null)
					$where .= " $atau `$cari` is null\r";
				elseif ($myTable=='msic2008')
				{
					if ($cari=='msic') $where .= ($f=='x') ?
					" $atau (`$cari`='$apa' OR msic2000='$apa')\r" :
					" $atau (`$cari` like '%$apa%' OR msic2000 like '%$apa%')\r";
					else $where .= ($f=='x') ?
					" $atau (`$cari`='$apa' OR notakaki='$apa')\r" :
					" $atau (`$cari` like '%$apa%' OR notakaki like '%$apa%')\r";
				}
				else
					$where .= ($f=='x') ? " $atau `$cari`='$apa'\r" :
					" $atau `$cari` like '%$apa%'\r";
			}
		endif;

		return $where;
	} // private function dimanaPOST()
#---------------------------------------------------------------------------------------------------#
#---------------------------------------------------------------------------------------------------#
	function medanIndustri($myTable)
	{
		if ($myTable=='msic2008'):
			$medan = 'seksyen S,bahagian B,kumpulan Kpl,kelas Kls,'
			. 'msic2000,msic,keterangan,notakaki';
		elseif ($myTable=='msic_v1'):
			$medan = 'survey kp,msic,keterangan,notakaki';
		else : $medan = '*';
		endif;

		return $medan;
	}
#---------------------------------------------------------------------------------------------------#
#---------------------------------------------------------------------------------------------------#
	function bentukPembolehubah($post, $key, $m0)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$fx = isset($post['fix'][$key]) ? $post['fix'][$key] : null;
		$f = ($fx=='x') ? 'or(x=)' : 'or(%like%)';
		$at = isset($post['atau'][$key]) ? $post['atau'][$key] : 'WHERE';
		$m1 = $m0 . '|msic2000'; $m2 = $m0 . '|notakaki';
		$apa = isset($post['cari'][$key]) ? $post['cari'][$key] : null;

		return array($f, $at, $m1, $m2, $apa);
	}
#---------------------------------------------------------------------------------------------------#
	function bentukCarian($post, $myTable)
	{	//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//echo '<pre>$post->'; print_r($post); echo '</pre>';
		$carian = null; //' WHERE ' . $medan . ' like %:cariID% ', array(':cariID' => $cariID));
		if($_POST==null || empty($_POST) ):
			$carian .= null;
		else:
			foreach ($post['pilih'] as $key=>$cari)
			{	//echo "\r$key => $cari ($myTable)| ";
				$carian[] = $this->bentukCarian2($myTable, $post, $key, $cari);
			}
		endif; //echo '<pre>$carian->'; print_r($carian); echo '</pre>';

		return $carian;//*/
	}
#---------------------------------------------------------------------------------------------------#
	function bentukCarian1($myTable, $post, $key, $m0)
	{
		list($f1, $at, $m1, $m2, $apa) = $this->bentukPembolehubah($post, $key, $m0);
		if($myTable=='msic2008')
		{
			if ($m0=='msic')
				$carian = array('fix'=>$f1,'atau'=>$at,'medan'=>$m1,'apa'=>$apa);
			else
				$carian = array('fix'=>$f1,'atau'=>$at,'medan'=>$m2,'apa'=>$apa);
		}
		else
		{
			$carian = array('fix'=>'%like%','atau'=>$at,'medan'=>$m0,'apa'=>$apa);
		}//*/
		return $carian;
	}
#---------------------------------------------------------------------------------------------------#
	function bentukCarian2($myTable, $post, $key, $m0)
	{
		list($f1, $at, $m1, $m2, $apa) = $this->bentukPembolehubah($post, $key, $m0);
		$carian = ($myTable=='msic2008') ?
		( ($m0=='msic') ?
			array('fix'=>$f1,'atau'=>$at,'medan'=>$m1,'apa'=>$apa)
			: array('fix'=>$f1,'atau'=>$at,'medan'=>$m2,'apa'=>$apa) )
			: array('fix'=>'%like%','atau'=>$at,'medan'=>$m0,'apa'=>$apa);
		return $carian;
	}
#---------------------------------------------------------------------------------------------------#
	function bentukCarian0($myTable, $post, $key, $m0)
	{
		echo '<br>$myTable : ' . $myTable;
		list($f1, $at, $m1, $m2, $apa) = $this->bentukPembolehubah($post, $key, $m0);
		echo '<br>$f1 : ' . $f1; echo '<br>$at : ' . $at;
		echo '<br>$m0 : ' . $m0 . '<br>$m1 : ' . $m1 . '<br>$m2 : ' . $m2;
		echo '<br>$apa : ' . $apa;
		echo '<br>';
	}
#---------------------------------------------------------------------------------------------------#
	function jadualDataCorp()
	{
		$jadual = array('aes','kawalan_aes');
		$medan = '*';
		# cari id berasaskan newss/ssm/sidap/nama
		//$id['nama'] = bersih(isset($_POST['cari']) ? $_POST['cari'] : null);

		return array($jadual,$medan);
	}
#---------------------------------------------------------------------------------------------------#
	function dataCorp($apa)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//echo '<pre>$apa->'; print_r($apa); echo '</pre>';
		$carian = null; 
		if($_POST==null || empty($_POST) ):
			$carian .= null;
		else:
			list($jadual, $medan) = $this->jadualDataCorp();
			$carian[] = array('fix'=>'z%like%','atau'=>'WHERE',
				'medan' => 'concat_ws("",newss,nossm,nama)',
				'apa' => $apa[1]);
		endif;

		//echo '<pre>$jadual->'; print_r($jadual); echo '</pre>';
		//echo '<pre>$medan->'; print_r($medan); echo '</pre>';
		//echo '<pre>$carian->'; print_r($carian); echo '</pre>';

		return array($jadual, $medan, $carian);
	}
#---------------------------------------------------------------------------------------------------#
#---------------------------------------------------------------------------------------------------#
#=====================================================================================================
}
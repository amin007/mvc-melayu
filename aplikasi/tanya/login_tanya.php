<?php

class Login_Tanya extends Tanya
{
	public function __construct()
	{
		parent::__construct();
	}

	function semakid()
	{
	
		//echo '<pre>$_POST->'; print_r($_POST);
		//echo 'Kod:' . Hash::rahsia('md5', $_POST['password']) . ': </pre><pre>';
		
		try 
		{
			$sth = $this->db->prepare(
				"SELECT namaPegawai,kataLaluan,level FROM nama_pegawai WHERE \r\t" .
				"namaPegawai = :username AND kataLaluan = :password");
			
			$sth->execute(array(
				':username' => $_POST['username'],
				':password' => Hash::rahsia('md5', $_POST['password'])
				//':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
			));
		}
		catch (PDOException $e) 
		{
			echo $e->getMessage();
			echo '<br><a href="' . URL . 'ruangtamu/logout">Keluar</a>';
			exit;
		}
		
		//$sth->debugDumpParams(); // papar error
		$data = $sth->fetch(); // dapatkan medan terlibat
			
		// kira jumlah data
		$bil = $sth->rowCount(); //echo ' | $bil=' . $bil;
		
		if ($bil == 1) 
		{	// login berjaya
			Sesi::init();
			// namaPegawai,kataLaluan,level 
			Sesi::set('namaPegawai', $data['namaPegawai']);
			Sesi::set('levelPegawai', $data['level']);
			Sesi::set('loggedIn', true);
			header('location:' . URL . 'ruangtamu');
		} 
		else // login gagal
			header('location:' . URL . 'login/salah');
		
	}

	function semakidlama()
	{
		/*
		echo '<pre>$_POST->'; print_r($_POST) . '</pre>| ';
		echo 'Kod:' . Hash::rahsia('md5', $_POST['password']) . ': ';
		echo 'Kod:' . Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY) . ': ';
		$sql="SELECT id, login, role FROM users WHERE 
				login = :login AND password = :password";
		$sql2="SELECT namaPegawai,kataLaluan,level FROM nama_pegawai WHERE 
				username = :username AND password = :password";
		*/
		
		$sth = $this->db->prepare("SELECT namaPegawai,kataLaluan,level 
			FROM nama_pegawai WHERE 
			namaPegawai = :username AND kataLaluan = :password");
		
		$sth->execute(array(
			':username' => $_POST['username'],
			':password' => Hash::rahsia('md5', $_POST['password'])
			//':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
		));
		
		//$sth->debugDumpParams(); //echo ' | $sth=<pre>' . print_r($sth) . '</pre>';
		// dapatkan medan terlibat
		$data = $sth->fetch();
		
		// kira jumlah data
		$count =  $sth->rowCount(); //echo ' | $count=' . $count;
		
		if ($count == 1) 
		{	// login berjaya
			Sesi::init();
			// namaPegawai,kataLaluan,level 
			Sesi::set('namaPegawai', $data['namaPegawai']);
			Sesi::set('levelPegawai', $data['level']);
			Sesi::set('loggedIn', true);
			header('location:' . URL . 'ruangtamu');
		} 
		else 
		{	// login gagal
			header('location:' . URL . 'login/salah');
		}
		
	}

}
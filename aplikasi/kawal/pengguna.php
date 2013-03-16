<?php

class Pengguna extends Kawal 
{

	public function __construct() 
	{
		parent::__construct();
		Kebenaran::kawalKeluar();
	}
	
	public function index() 
	{	
		$this->lihat->senaraiPengguna = $this->tanya->senaraiPengguna();
		$this->lihat->baca('pengguna/index');
	}
	
	public function create() 
	{
		$data = array();
		$data['login'] = $_POST['login'];
		$data['password'] = $_POST['password'];
		$data['role'] = $_POST['role'];
		
		// @TODO: Do your error checking!
		
		$this->tanya->create($data);
		header('location: ' . URL . 'pengguna');
	}
	
	public function edit($id) 
	{
		$this->lihat->user = $this->tanya->userSingleList($id);
		$this->lihat->baca('pengguna/edit');
	}
	
	public function editSave($id)
	{
		$data = array();
		$data['id'] = $id;
		$data['login'] = $_POST['login'];
		$data['password'] = $_POST['password'];
		$data['role'] = $_POST['role'];
		
		// @TODO: Do your error checking!
		
		$this->tanya->editSave($data);
		header('location: ' . URL . 'pengguna');
	}
	
	public function delete($id)
	{
		$this->tanya->delete($id);
		header('location: ' . URL . 'pengguna');
	}
	
	function sms()
	{
		foreach ($_POST as $key => $value)
		{	
			if ( $key=='sms')
			{
				foreach ($value as $kekunci => $papar)
				{
					$data[$kekunci] = bersih($papar);
				}				
			}
		}
				
		$kawan = $data['kawan'];
		$papar = sms_kawan($data);
			//'Successful!!! You have 47 SMS Credit left';
		$url = URL . 'kawalan/smskes/' . $kawan . 
			'/SMS BERJAYA DIHANTAR' . "\r" . $papar;
		
		//echo '<pre>$_POST->' . print_r($_POST , 1)  . '</pre>';
		//echo '<pre>$data->' . print_r($data , 1)  . '</pre>';
		//echo '$url->' . $url;

		// hantar lokasi asal
		header('Location:' . $url);
		
	}
}

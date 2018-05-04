<?php

class Pengguna_Tanya extends Tanya
{
	public function __construct()
	{
		parent::__construct();
	}

	public function senarai_kakitangan()
	{
		return $this->db->select('SELECT fe,count(*) as Jum from mm_rangka ' .
			'WHERE fe is not null and fe<>"semak2" ' .
			'GROUP BY fe ORDER BY fe');
	}

	public function senaraiPengguna()
	{
		return $this->db->select('SELECT id, login, role FROM users');
	}
		
	public function userSingleList($id)
	{
		return $this->db->select('SELECT id, login, role FROM users WHERE id = :id', array(':id' => $id));
	}
	
	public function create($data)
	{
		$myTable = 'users';
		$postNewData = array(
			'login' => $data['login'],
			'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
			'role' => $data['role']
		);
		$this->db->insert($myTable, $postNewData);
	}
	
	public function editSave($data)
	{
		$myTable = 'users';
		$postData = array(
			'login' => $data['login'],
			'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
			'role' => $data['role']
		);
		$where = "`id` = {$data['id']}";
		
		$this->db->update($myTable, $postData, $where);
	}
	
	public function delete($id)
	{
		$myTable = 'users';
		$result = $this->db->select('SELECT role FROM ' . $myTable . 
		' WHERE id = :id', array(':id' => $id));

		if ($result[0]['role'] == 'owner')
			return false;
		
		$this->db->delete($myTable, "id = '$id'");
	}
}
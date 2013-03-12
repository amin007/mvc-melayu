<?php

class PangkalanData extends PDO
{
	
	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		try
		{
			parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
			//parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIONS);
		}
		catch (PDOException $e) 
		{
			echo $e->getMessage();
			echo '<br><a href="' . URL . 'ruangtamu/logout">Keluar</a>';
			exit;
		}
	}
	
	/**
	 * select
	 * @param string $sql An SQL string
	 * @param array $array Paramters to bind
	 * @param constant $fetchMode A PDO Fetch mode
	 * @return mixed
	 */
	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
	{
		//echo '<hr><pre>'; print_r($sql) . '</pre><hr>';
		$sth = $this->prepare($sql);
		foreach ($array as $key => $value) 
		{
			$sth->bindValue("$key", $value);
		}
		
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}
	
	/**
	 * rowCount()
	 * @param string $sql An SQL string
	 * @param array $array Paramters to bind
	 * @param constant $fetchMode A PDO Fetch mode
	 * @return mixed
	 */
	
	public function rowcount($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
	{
		//echo '<hr><pre>'; print_r($sql) . '</pre><hr>';
		$sth = $this->prepare($sql);
		foreach ($array as $key => $value) 
		{
			$sth->bindValue("$key", $value);
		}
		
		$sth->execute();
		return $sth->rowCount(); //$sth->fetchAll($fetchMode);
	}

	/**
	 * insert
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 */
	public function insert($table, $data)
	{
		ksort($data);
		
		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		
		$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
		
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}
		
		$sth->execute();
	}
	
	/**
	 * update
	 * @param string $sql An SQL string
	 * @param array $array Paramters to bind
	 * @param constant $fetchMode A PDO Fetch mode
	 * @return mixed
	 */
	 
	public function update($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
	{
		//echo '<hr><pre>'; print_r($sql) . '</pre><hr>';
		$sth = $this->prepare($sql);
		foreach ($array as $key => $value) 
		{
			$sth->bindValue("$key", $value);
		}
		
		$sth->execute();
	}

	/**
	 * updateOld
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 * @param string $where the WHERE query part
	 */
	public function updateOld($table, $data, $where)
	{
	
		ksort($data);
		
		$fieldDetails = NULL;
		foreach($data as $key=> $value) {
			$fieldDetails .= "`$key`=:$key,";
		}
		$fieldDetails = rtrim($fieldDetails, ',');
		
		echo $update = "UPDATE $table SET $fieldDetails WHERE $where";
	
		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
		
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}
		
		$sth->execute();

	}
	
	/**
	 * delete
	 * 
	 * @param string $table
	 * @param string $where
	 * @param integer $limit
	 * @return integer Affected Rows
	 */
	public function delete($table, $where, $limit = 1)
	{
		return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
	}
	
}
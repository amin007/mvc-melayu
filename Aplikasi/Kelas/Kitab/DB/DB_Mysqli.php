<?php
/**
 * Simple MySQLi Class 0.3
 *
 * @author		JREAM
 * @link		http://jream.com
 * @copyright		2011 Jesse Boyer (contact@jream.com)
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details:
 * http://www.gnu.org/licenses/
 *
 * @uses	----------------------------------------
 *
		// A Config array should be setup from a config file with these parameters:
 		$config = array();
		$config['host'] = 'localhost';
		$config['user'] = 'root';
		$config['pass'] = '';
		$config['table'] = 'table';

		// Then simply connect to your DB this way:
 		$db = new DB($config);

		// Run a Query:
 		$db->query('SELECT * FROM someplace');

 		// Get an array of items:
 		$result = $db->get();
 		print_r($result);
 		
 		// Optional fetch modes (1 and 2)
 		$db->setFetchMode(1);
 		
 		// Get a single item:
 		$result = $db->get('field');
 		print_r($result);

 		What you do with displaying the array result is up to you!
  		----------------------------------------
 */
namespace Aplikasi\Kitab; //echo __NAMESPACE__; 
class DB_Mysqli
{
	/**
	* @var <str> The mode to return results, defualt is MYSQLI_BOTH, use setFetchMode() to change.
	*/
	private $fetchMode = MYSQLI_BOTH;
	
	/**
	* @desc		Creates the MySQLi object for usage.
	*
	* @param	<arr> $db Required connection params.
	*/
	public function  __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) 
	{
		try
		{
			$this->mysqli = new \mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
			//parent::__construct($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
			//parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
		}
		catch (PDOException $e) 
		{
			echo $e->getMessage();
			echo '<br><a href="' . URL . 'ruangtamu/logout">Keluar</a>';
			exit;
		}
	}
	
	/**
	 * insert
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 */
	public function insert_lama($table, $data)
	{
		/*
		ksort($data);
		
		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		*/

		$fieldNames = implode('`, `', $data['medan']);
		$fieldValues = '"' . implode('", "', $data['isi']);

		$sql=("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

		echo '<hr><pre>'; print_r($sql) . '</pre><hr>';
		//return $this->query($sql );
	}

	/**
	 * insert
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 */
	public function insert($sql, $array = array(), $fetchMode = 2)
	{
		//echo '<hr><pre>'; print_r($sql) . '</pre><hr>';
		return $this->query($sql, $fetchMode);
		//return $this->dpt_data($fetchMode);
	}
	
	/**
	 * update
	 * @param string $sql An SQL string
	 * @param array $array Paramters to bind
	 * @param constant $fetchMode A PDO Fetch mode
	 * @return mixed
	 */
	public function update($sql, $array = array(), $fetchMode = 2)
	{
		//echo '<hr><pre>'; print_r($sql) . '</pre><hr>';
		return $this->query($sql, $fetchMode);
		//return $this->dpt_data($fetchMode);
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
		$sql = "DELETE FROM $table WHERE $where LIMIT $limit";
		//echo '<hr><pre>'; print_r($sql) . '</pre><hr>';
		return $this->query($sql, $fetchMode = 2);
	}

	/**
	 * rowcount
	 * @param string $sql An SQL string
	 * @param array $array Paramters to bind
	 * @param constant $fetchMode A PDO Fetch mode
	 * @return mixed
	 */
	public function rowCount($SQL, $fetchMode = 2)
	{
		//echo '<hr><pre>'; print_r($SQL) . '</pre><hr>';
		$this->SQL = $this->mysqli->real_escape_string($SQL);
		$result = $this->mysqli->query($SQL);
		return $result->num_rows;
	}

	/**
	 * select
	 * @param string $sql An SQL string
	 * @param array $array Paramters to bind
	 * @param constant $fetchMode A PDO Fetch mode
	 * @return mixed
	 */
	public function selectAll($sql, $fetchMode = 2)
	{
		//echo '<hr><pre>'; print_r($sql) . '</pre><hr>';
		$this->query($sql);
		return $this->dpt_data($fetchMode);
	}

	/**
	 * @desc	Simple preparation to clean the SQL/Setup result Object.
	 *
	 * @param	<str> SQL statement
	 * @return	<bln|null>
	 */
	public function query($SQL)
	{
		//echo '<hr><pre>'; print_r($SQL) . '</pre><hr>';
		$this->SQL = $this->mysqli->real_escape_string($SQL);
		$this->result = $this->mysqli->query($SQL);
				
		if ($this->result == true)
		{
			return $this->result;
		}
		else
		{
			printf("Masalah pada : <pre>%s.\n%s</pre>", 
				$this->mysqli->error,
				$this->SQL);
			exit;
		}
		
	}

	/**
	 * @desc	Get the results
	 * @return	<mixed>
	 */
	public function dpt_data($jenis)
	{
		/** Grab all the data */
		$this->fetchMode = $this->setFetchMode($jenis); // tentukan jenis data
		/*echo '<pre>$jenis:' . $jenis . '</pre><hr>'
		   . '<pre>$this->fetchMode:' . $this->fetchMode . '</pre><hr>';*/
		$data = array();

		while ($row = $this->result->fetch_array($this->fetchMode))
		{
			//echo '<hr><pre>$row:'; print_r($row) . '</pre><hr>';
			$data[] = $row;
		}

		/** Make sure to close the result Set */
		$this->result->close();

		return $data;

	}

	/**
	 * select
	 * @param string $sql An SQL string
	 * @param array $array Paramters to bind
	 * @param constant $fetchMode A PDO Fetch mode
	 * @return mixed
	 */
	public function select($sql, $fetchMode = 2)
	{
		//echo '<hr><pre>'; print_r($sql) . '</pre><hr>';
		$this->query($sql, $fetchMode);
		return $this->dpt1data($fetchMode);
	}

	/**
	 * @desc	Get the results
	 * @return	<mixed>
	 */
	public function dpt1data($jenis = 2)
	{
		/** Grab all the data */
		$this->fetchMode = $this->setFetchMode($jenis); // tentukan jenis data
		$data = array();

		while ($row = $this->result->fetch_array($this->fetchMode))
		{
			//echo '<hr><pre>$row:'; print_r($row) . '</pre><hr>';
	       foreach ($row as $key => $value) 
	        {
	            $data[$key] = $value;
	        }
		}

		/** Make sure to close the result Set */
		$this->result->close();

		return $data;

	}
	
	/** 
	* @desc		Optionally set the return mode.
	*
	* @param	<int> $type The mode: 1 for MYSQLI_NUM, 2 for MYSQLI_ASSOC, default is MYSQLI_BOTH
	*/
	public function setFetchMode($type)
	{
		switch($type)
		{			
			case 1:
			$this->fetchMode = MYSQLI_NUM;
			break;
			
			case 2:
			$this->fetchMode = MYSQLI_ASSOC;
			break;
			
			default:
			$this->fetchMode = MYSQLI_BOTH;
			break;
		}
		
		return $this->fetchMode;
	}

	/**
	* @desc		Returns the automatically generated insert ID
	* 			This MUST come after an insert Query.
	*/
	public function id()
	{
		return $this->mysqli->insert_id;
	}

	/**
	 * @desc	Automatically close the connection when finished with this object.
	 */
	public function __destruct()
	{
		$this->mysqli->close();
	}

}

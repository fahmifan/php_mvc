<?php
class Database 
{
	protected $host = 'localhost';
	protected $dbname = 'tutorial';
	protected $user = 'root';
	protected $pass = '';
	protected $link = null;

	public function __construct()
	{
		$this->link = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->user, $this->pass);
	}

	public function openConn()
	{
		if( $this->link == null ){
			$this->link = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->user, $this->pass);
		}
	}

	public function closeConn()
	{
		$this->link = null;
	}

}
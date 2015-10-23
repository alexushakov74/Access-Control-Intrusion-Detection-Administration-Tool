<?php
class dbLayer
{
	var $servername = "localhost";
	var $username = "team1";
	var $password = "N&9,'vXyaMz5mjRe";
	var $dbname = "team1";
	var $table = "Users";
	var $conn;
	
	 function __construct()
	{
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
	}
	
	function queryTable($query)
	{
		if ($result = $this->conn->query($query)) 
		{
			return $result;
		} 
		else 
		{
    		return null;
		}
	}
	
	function updateTable($query)
	{
		mysqli_query($this->conn, $query);
	}
}

?>
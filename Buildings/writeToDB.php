<?php
include_once('db.php');
$myDB = new dbLayer();

// Create connection
$conn = mysqli_connect($myDB->servername, $myDB->username, $myDB->password, $myDB->dbname);

// Check to make sure we connected
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];

echo $myDB->table. " table<br>";

	$sql = "INSERT INTO " . $myDB->table . " (Name) 
	VALUES ('" . $name . "')";
		
	if (mysqli_query($conn, $sql)) 
	{
		echo "New record created successfully";
		mysqli_close($conn);
		header( "refresh:0.0001;url=main.php" );
		$duplicateCode = false;
	} 
	else
	{
		//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		echo "ERROR: " . mysqli_error($conn);
		echo "<br><a href=\"javascript:history.go(-1)\">GO BACK</a>";
	}


?>
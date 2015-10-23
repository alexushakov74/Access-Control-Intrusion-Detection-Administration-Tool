<?php
include_once('db.php');
$myDB = new dbLayer();

// Create connection
$conn = mysqli_connect($myDB->servername, $myDB->username, $myDB->password, $myDB->dbname);

// Check to make sure we connected
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$profile = $_POST['profile'];
$description = $_POST['description'];
$department = $_POST['department'];
$bannerID = $_POST['bannerID'];
$badgeType = $_POST['badgeType'];
$email = $_POST['email'];

echo $myDB->table. " table<br>";

$duplicateCode = false;
do
{
		$code = "";
		for($i = 0; $i < 6; $i++)
		{
			$rng = rand(0, 9);
			$code = $code . "$rng";
		}
		
		$sql = "INSERT INTO " . $myDB->table . " (First_Name, Last_Name, Code, Profile, Description, Department, Banner_ID, Badge_Type, Email) 
		VALUES ('" . $firstName ."', '". $lastName ."', '" . $code ."', '" . $profile ."', '" . $description ."', '" . $department ."', '" . $bannerID ."', '" . $badgeType ."', '" . $email ."')";
		
		if (mysqli_query($conn, $sql)) 
		{
			echo "New record created successfully";
			mysqli_close($conn);
			header( "Location: main.php" );
			$duplicateCode = false;
		} 
		else
		{
			echo "ERROR: " . mysqli_error($conn);
			echo "<br><a href=\"javascript:history.go(-1)\">GO BACK</a>";
			if(strstr(mysqli_error($conn), "Duplicate") !== false)
			{
				$duplicateCode = true;
			}
		}
} while($duplicateCode)
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);

?>
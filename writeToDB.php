<?php
$servername = "localhost";
$username = "team1";
$password = "N&9,'vXyaMz5mjRe";
$dbname = "team1";

// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check to make sure we connected
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// construct the query to insert the values the user entered on the form
$sql = "INSERT INTO Requests (FirstName, LastName, Description, Department, BannerID, BadgeType, Email, Comments, Sender) VALUES ('" . $_POST['firstName'] . "', '" . $_POST['lastName'] . "',
		 '" . $_POST['description'] . "','" . $_POST['department'] . "','" . $_POST['bannerID'] . "','" . $_POST['badgeType'] . "','" . $_POST['email'] . "','" . $_POST['comment'] .  "','" . $_POST['sender'] . "')";

echo "Constructed query: $sql<br>";

// Now, execute the theory
if (mysqli_query($conn, $sql)) 
{
    header('Location: info.php');
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
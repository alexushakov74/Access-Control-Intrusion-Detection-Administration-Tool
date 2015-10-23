<!-- <meta name="viewport" content="width=device-width, initial-scale=0.75" /> -->
<link rel="shortcut icon" href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/resources/favicon.ico" type="image/ico">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Optional theme (DARK)-->
<!--
<link rel="stylesheet" href="https://bootswatch.com/slate/bootstrap.min.css">
-->
<!-- Favorite one
<link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.min.css">
-->

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<style>
#newMsgs {
	z-index: 1;
	margin-top: -9px;
	margin-bottom: -12px;
	margin-left: -7px;
	padding: 2px 4px;
	font-size: 10px;
}
</style>
<?php
session_start();

if(!session_is_registered('myusername'))
{
	if(!strpos($_SERVER['REQUEST_URI'], '/login.php'))
	{
	header('Location: http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/login.php');
	}
	?>
	<nav class="navbar navbar-default">
	<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="login.php">Access Control & Intrusion Detection Administration Tool</a>
	<ul class="nav navbar-nav">
	  <li id="loginTab"><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/login.php"><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>
	</ul>
    </div>
	</div>
	</nav>
<?php
} 	
else 
{
include_once ($_SERVER['DOCUMENT_ROOT'] . "/team1/Nick/Users/db.php");

$myDB = new dbLayer();	// Creating this on this page, which is included on most pages can save pages from making their own calls to DB object.

// Create connection
$conn = $myDB->conn;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$username = $_SESSION['username'];
$firstname;
$lastname;
$badgetype;
$code;
$profile;
$areas;
$sql = "SELECT * FROM Users WHERE `Banner_ID`='$username'";
$result = $conn->query($sql);
$row = $result->fetch_array();
$firstname = $row[1];
$lastname = $row[2];
$badgetype = $row[8];

$sql1 = "SELECT COUNT(`ID`) FROM Requests WHERE `Read`=0";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_array();
$newMsgs = $row1[0];
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Access Control & Intrusion Detection Administration Tool</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
		<?php
		if($badgetype == "Admin")
		{
		?>
        <li id="tableTab"><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/tables.php"><span class="glyphicon glyphicon-th-list"></span> Tables</a></li>
		<li id="inboxTab"><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/inbox.php">
		<?php if($newMsgs != 0){ ?><span class="badge" id="newMsgs"><?= $newMsgs ?></span><br><?php } ?>
		<span class="glyphicon glyphicon-inbox"></span> Inbox</a></li>
		<?php
		}
		?>
        <li id="infoTab"><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/info.php"><span class="glyphicon glyphicon-info-sign"></span> Info</a></li>
        <li id="settingsTab" style="display: none;"><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
		<li id="loginTab" style="display: none;"><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/login.php"><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>
		
      </ul>
	  <ul class="nav navbar-nav navbar-right">
        <li><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/info.php"><span class="glyphicon glyphicon-user"></span> <?php echo $lastname . ", " . $firstname; ?></a></li>
        <li id="logoutTab"><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php
	// Check to make sure User or Authority can not see Tables, and User not see request access page
	if($badgetype == "User" || $badgetype == "Authority")
	{
		if(!strpos($_SERVER['REQUEST_URI'], '/info.php'))
		{
		header('Location: http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/info.php');
		}
	}
}
?>

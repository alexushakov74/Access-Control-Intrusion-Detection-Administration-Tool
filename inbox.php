<form action="updateMessage.php" method="post">
<style>
div.inbox {
	margin: 2%;
}
table {
  border-left: 1px solid #ddd;
  border-right: 1px solid #ddd;
  border-bottom: 2px solid #ddd;
  vertical-align: middle:
}
.glyphicon-eye-open {
	color: #622E13;
	width: 15px;
}
.glyphicon-trash {
	width: 15px;
	margin: -1px 1px 1px 0px;
}
.glyphicon-envelope {
	color: #fff;
	margin: 1px 2px 1px 2px;
	font-size: 15px;
}
tr.read {
	color: #888;
	background-color: #fafafa;
}
.actions {
	white-space: nowrap;
}
</style>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/team1/Nick/navBar.php";
?>
<div class="inbox">
<?php
$servername = "localhost";
$username = "team1";
$password = "N&9,'vXyaMz5mjRe";
$dbname = "team1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM Requests";
$result = $conn->query($sql);

$sql1 = "SELECT COUNT(`ID`) FROM Requests WHERE `Read`=0";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_array();
?>
<h2><span class="glyphicon glyphicon-inbox"></span> Inbox <small>(<?= $row1[0]?> new message<?php if($row1[0]!=1){echo "s";}?>)</small></h2>
<table class="table table-hover table-responsive">
	<tr class="active">
		<td>&nbsp;ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Description</td>
        <td>Department</td>
        <td>BannerID</td>
        <td>Badge Type</td>
        <td>Email</td>
        <td>Comments</td>
		<td>Sender</td>
		<td>Action</td>
	</tr>
<?php

while($row = $result->fetch_array()) 
{
	$sql2 = "SELECT * FROM Users WHERE `ID`=$row[9]";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_array();
	$firstName = $row2[1];
	$lastName = $row2[2];
	$email = $row2[9];
	
	if($row[10]==1)
	{
		echo '<tr class="read">';
	}
	else
	{
	echo "<tr>";
	}
	echo "<td id='id'><span class='badge'>" . $row[0]. "</span></td>";
	echo "<td>" . $row[1]. "</td>";
	echo "<td>" . $row[2]. "</td>";
	echo "<td>" . $row[3]. "</td>";	
    echo "<td>" . $row[4]. "</td>";
    echo "<td>" . $row[5]. "</td>";
    echo "<td>" . $row[6]. "</td>";
    echo "<td>" . $row[7]. "</td>";
    echo "<td>" . $row[8]. "</td>";
	?>
	<td><a class="btn btn-info btn-xs" onClick="javascript:window.open('mailto:<?= $email ?>', 'mail');event.preventDefault()" href="mailto:<?= $email ?>" style="padding: 1px 1px;" data-toggle="tooltip" title="Email" data-placement="top">
	<span class="glyphicon glyphicon-envelope"></span></a> <?= $firstName . " " . $lastName?></td>
	<?php
?>
	<td class="actions"><button type="submit" type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Mark as Unread" data-placement="top" style="padding: 4px;"
		name="unread" value="<?= $row[0] ?>"> <span class="glyphicon glyphicon-eye-open"></span> </button> <button type="submit" type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete" data-placement="top" style="padding: 4px;"
		name="delete" value="<?= $row[0] ?>"><span class="glyphicon glyphicon-trash"></span> </button></td>
		
	</tr>
	<?php
	}
	?>
</table>

<?php
date_default_timezone_set('America/New_York');
$readOn = date("y/m/d H:i:s");
$reader = $firstname . " " . $lastname;

if(!strpos($_SERVER['HTTP_REFERER'], 'updateMessage.php') && !strpos($_SERVER['HTTP_REFERER'], 'inbox.php') )
{
$sql2 = "UPDATE Requests SET `Read`=1, `ReadOn`='$readOn', `ReadBy`='$reader' WHERE `Read`=0";
mysqli_query($conn, $sql2);
}
?>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({title: "Hooray!", delay: {show: 300, hide: 100}}); 
});
</script>
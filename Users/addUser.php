<form action="writeToDB.php" method="POST">
<link rel="stylesheet" href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/CSS/add.css">
<?php
include_once('db.php');
$myDB = new dbLayer();

// Create connection
$conn = $myDB->conn;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT `Name` FROM Profiles";
$result = $conn->query($sql);

$sql2 = "SELECT `Name` FROM Departments";
$result2 = $conn->query($sql2);
?>
<table id="addData">
<tr>
<td class="rowName">First Name</td>
<td><input name = "firstName" placeholder="First Name" class="form-control" id="focusedInput" autofocus required></td>
</tr>
<tr>
<td class="rowName">Last Name</td>
<td><input name = "lastName" placeholder="Last Name" class="form-control" id="focusedInput"></td>
</tr>
<tr>
<td class="rowName">Profile</td>
<td><form>
<select name="profile" class="form-control" id="focusedInput">
<option value="None" selected>None</option>
<?php 
$firstrun = true;
while($row = $result->fetch_array()) 
{ 
if($firstrun)
{
	$row = $result->fetch_array();	// Skips first option, "None", because it is listed above to be the default option.
	$firstrun = false;
}
?>
<option value="<?= $row[0] ?>"><?= $row[0] ?></option>
<?php
}
?>
</select></td>
</tr>
<tr>
<td class="rowName">Description</td>
<td><input name = "description" placeholder="Description" class="form-control" id="focusedInput"></td>
</tr>
<tr>
<td class="rowName">Department</td>
<td><form>
<select name="department" class="form-control" id="focusedInput">
<option value="None" selected>None</option>
<?php 
while($row2 = $result2->fetch_array()) 
{ 
?>
<option value="<?= $row2[0] ?>"><?= $row2[0] ?></option>
<?php
}
?>
</select></td>
</tr>
<tr>
<td class="rowName">BannerID</td>
<td><input name = "bannerID" placeholder="BannerID" class="form-control" id="focusedInput"></td>
</tr>
<tr>
<td class="rowName">Badge Type</td>
<td><form>
<select name="badgeType" class="form-control" id="focusedInput">
<option value="Deactivated">Deactivated</option>
<option value="User" selected>User</option>
<option value="Authority">Authority</option>
<option value="Admin">Admin</option>
</select></td>
</tr>
<tr>
<td class="rowName">Email</td>
<td><input name = "email" placeholder="Email" class="form-control" id="focusedInput"></td>
</tr>
<tr><td></td></tr>
<tr>
<td></td>
<td><button type="submit" class="btn btn-success btn-xs" data-toggle="modal" id="save" value="Submit"><span class="glyphicon glyphicon-plus-sign"></span> Add</button></td>
</tr>
</table>
</form>

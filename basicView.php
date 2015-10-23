<style>
code#code {
	color: #f9f2f4;
	background-color: #f9f2f4;
}
#code:hover {
	color: #c7254e;
}
tr>td:nth-child(1) {
	text-align: right;
}
td {
	padding: 4px;
}
</style>
<?php
//myDB is included with navBar.php to use.
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
$userID = $row[0];
$firstname = $row[1];
$lastname = $row[2];
$code = $row[3];
$badgetype = $row[8];
$profile = $row[4];
if($profile!="")
{
$sql = "SELECT * FROM Profiles WHERE `Name`='$profile'";
$result = $conn->query($sql);
$row = $result->fetch_array();
$profileID = $row['ID'];
}
$sql = "SELECT (`AreaID`) FROM relationProfileToArea where `ProfileID`=$profileID";
$result = $conn->query($sql);
?>

<h2><span class="glyphicon glyphicon-info-sign"></span> Your Information</h2>
<table>
<tr>
<td>Name: </td><td><code><?php echo $firstname . " " . $lastname; ?></code></td>
</tr>
<tr>
<td>User ID: </td><td><code><?php echo $username; ?></code></td>
</tr>
<tr>
<td>Code: </td><td><code id="code"><?php echo $code; ?></code></td>
</tr>
<tr>
<td>Badge Type: </td><td><code><?php echo $badgetype; ?></code></td>
</tr>
<tr>
<td>Profile: </td><td><code><?php echo $profile; ?></code></td>
</tr>
</table>
<hr>
<h2><span class="glyphicon glyphicon-map-marker"></span> Areas you have access to:</h2>
<br>
<ul>
<?php
if($profile == "Everything")
{
	$sql2 = "SELECT (`Name`) FROM Areas";
	$result2 = $conn->query($sql2);
	while($row2 = $result2->fetch_array())
	{
		?>
		<li><code><?= $row2[0] ?></code></li>
		<?php
	}
}
else
{
while($row = $result->fetch_array()) 
{ 
	$areaID = $row[0];
	$sql2 = "SELECT (`Name`) FROM Areas where `ID`=$areaID";
	$result2 = $conn->query($sql2);
	while($row2 = $result2->fetch_array())
	{
?>

		<li><code><?= $row2[0] ?></code></li>
	
<?php
	}
}
}
?>
</ul>

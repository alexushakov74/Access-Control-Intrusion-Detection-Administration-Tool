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

$sql = "SELECT * FROM Profiles";
$result = $conn->query($sql);

$sql2 = "SELECT * FROM Areas";
$result2 = $conn->query($sql2);
?>
<table id="addData">
<tr>
<td class="rowName">Profile ID</td>
<td><form>
<select name="profileID" class="form-control" id="focusedInput" autofocus required>
<?php 
while($row = $result->fetch_array()) 
{ ?>
<option value="<?= $row[0] ?>"><?= $row[0] ?>: <?= $row[1] ?></option>
<?php
}
?>
</select></td>
</tr>
<tr>
<td class="rowName">Area ID</td>
<td><form>
<select name="areaID" class="form-control" id="focusedInput" required>
<?php 
while($row2 = $result2->fetch_array()) 
{ ?>
<option value="<?= $row2[0] ?>"><?= $row2[0] ?>: <?= $row2[1] ?></option>
<?php
}
?>
</select></td>
</tr>
<tr><td></td></tr>
<tr>
<td></td>
<td><button type="submit" class="btn btn-success btn-xs" data-toggle="modal" id="save" value="Submit"><span class="glyphicon glyphicon-plus-sign"></span> Add</button></td>
</tr>
</table>
</form>

<?php
include_once('db.php');

$myDB = new dbLayer();

// construct the query to delete the row
if(!array_key_exists("unread", $_POST))
{
	$sql = "DELETE FROM Requests where ID = '" . $_POST['delete'] . "'";
	echo "Data received";
}
else if(!array_key_exists("delete", $_POST))
{
	$sql = "UPDATE Requests SET `Read`=0 where ID = '" . $_POST['unread'] . "'";
	echo "Data received";
}
else
{
	echo "Error: No data submitted";
}
$myDB->updateTable($sql); 
header('Location: inbox.php');
?> 
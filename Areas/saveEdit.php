<?php
include_once('db.php');

$myDB = new dbLayer();

// construct the query to insert the values the user entered on the form
$sql = "update " . $myDB->table . " set Name = '" . $_POST['name']. "', Parent_Building_ID = '" . $_POST['parentBuildingID']. "' where ID = '" . $_POST['id'] . "'";

$myDB->updateTable($sql); 
?>
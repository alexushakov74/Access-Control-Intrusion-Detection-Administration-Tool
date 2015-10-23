<?php
include_once('db.php');

$myDB = new dbLayer();

// construct the query to insert the values the user entered on the form
$sql = "update " . $myDB->table . " set ProfileID = '" . $_POST['profileID']. "', AreaID = '" . $_POST['areaID']. "' where ID = '" . $_POST['id'] . "'";

$myDB->updateTable($sql); 
?>
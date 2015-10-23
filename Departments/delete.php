<?php
include_once('db.php');

$myDB = new dbLayer();

// construct the query to delete the row
$sql = "DELETE FROM " . $myDB->table . " where ID = '" . $_POST['id'] . "'";

$myDB->updateTable($sql); 
?>
<?php
include_once('db.php');

$myDB = new dbLayer();

// construct the query to insert the values the user entered on the form
$sql = "update " . $myDB->table . " set First_Name = '" . $_POST['firstName']. "', Last_Name = '" . $_POST['lastName']. "', Code = '" . $_POST['code']. "', Profile = '" . $_POST['profile']. "', Description = '" . $_POST['description']. "', Department = '" . $_POST['department']. "', Banner_ID = '" . $_POST['bannerID']. "', Badge_Type = '" . $_POST['badgeType']. "', Email = '" . $_POST['email']. "' where ID = '" . $_POST['id'] . "'";

$myDB->updateTable($sql); 
?>
<?php
include_once('db.php');

$myDB = new dbLayer();

$sql = "SELECT * FROM " . $myDB->table . " where ID = '" . $_POST['id'] . "'";
$result = $myDB->queryTable($sql);
$row = $result->fetch_array();

$sql2 = "SELECT * FROM Profiles";
$result2 = $myDB->queryTable($sql2);

$sql3 = "SELECT * FROM Areas";
$result3 = $myDB->queryTable($sql3);
?> 
<style>
#editData {
    border: 0px;
    width: 100%;
}
td {
    padding: 8px;
}
#saveEdit {
	border-radius: 5px;
	width: 120px;
}
input {
	padding: 4px;
	width: 256px;
}
select {
	padding: 4px;
	width: 256px;
}
form {
	margin-bottom: 0px;
}
#delete {
	border-radius 5px;
}
</style>
<?php
$profileID = $row[1];
$areaID = $row[2];
$profileName;
$areaName;
$sql4 = "SELECT (`Name`) FROM Profiles WHERE `ID`=$profileID";
$result4 = $myDB->queryTable($sql4);
while($row4 = $result4->fetch_array())
{
	$profileName = $row4[0];
}
$sql5 = "SELECT(`Name`) FROM Areas WHERE `ID`=$areaID";
$result5 = $myDB->queryTable($sql5);
while($row5 = $result5->fetch_array())
{
	$areaName = $row5[0];
}
?>
<table id="editData">
<tr>
<td>ID</td>
<td><input id = "id" value = "<?php echo $_POST['id'] ?>" disabled></td>
</tr>
<tr>
<td>Profile ID</td>
<td><form>
<select id="profileID">
<option value="<?php echo $row[1] ?>"><?php echo $row[1] ?>: <?php echo $profileName ?></option>
<option disabled>---</option>
<?php 
while($row2 = $result2->fetch_array()) 
{ ?>
<option value="<?= $row2[0] ?>"><?= $row2[0] ?>: <?= $row2[1] ?></option>
<?php
}
?>
</select></td>
</tr>
<tr>
<td>Area ID</td>
<td><form>
<select id="areaID">
<option value="<?php echo $row[2] ?>"><?php echo $row[2] ?>: <?php echo $areaName ?></option>
<option disabled>---</option>
<?php 
while($row3 = $result3->fetch_array()) 
{ ?>
<option value="<?= $row3[0] ?>"><?= $row3[0] ?>: <?= $row3[1] ?></option>
<?php
}
?>
</select></td>
</tr>
<tr><td></td></tr>
<tr>
<td><button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"
				 id="delete"><span class="glyphicon glyphicon-trash"></span> Delete</button></td>
<td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" id="saveEdit"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button></td>
</tr>
</table>
<script>
	$(document).ready(function()
	{
    	$("#saveEdit").click(function() 
    	{ 
    		$("#status").html('<div class="alert alert-info" role="alert"><strong>Saving edit...</strong></div>')	
    		
    		// Make sure the status div is visible
    		$("#status").show();
    		
    		$.post("saveEdit.php", { name : $("#name").val(),
    									parentBuildingID : $("#parentBuildingID").val(),
    									id : $("#id").val() })
    									
    		// wait for the result
    		.done(function(data)
    		{
    			$("#status").html('<div class="alert alert-info" role="alert"><strong>Saved.</strong></div>');
    			$("#status").delay(300).fadeToggle();
    		});
    									
    					
    	});
		
		$("#delete").click(function()
		{
			$("#status").html('<div class="alert alert-info" role="alert"><strong>Deleting...</strong></div>')	
    		
    		// Make sure the status div is visible
    		$("#status").show();
			if(confirm("Are You Sure You Want To Delete This?") == true)
			{
			$.post("delete.php", {id : $("#id").val()})
			

			.done(function(data)
    		{
    			$("#status").html('<div class="alert alert-info" role="alert"><strong>Deleted.</strong></div>');
    			$("#status").delay(300).fadeToggle();

				loadThemedTable();
				
    		});
			}
			else
			{
				$("#status").html('<div class="alert alert-info" role="alert"><strong>Deletion Cancelled.</strong></div>');
    			$("#status").delay(1000).fadeToggle();
			}
		});

	});
</script>

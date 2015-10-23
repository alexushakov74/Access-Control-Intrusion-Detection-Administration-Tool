<?php
include_once('db.php');

$myDB = new dbLayer();

$sql = "SELECT * FROM " . $myDB->table . " where ID = '" . $_POST['id'] . "'";
$result = $myDB->queryTable($sql);
$row = $result->fetch_array();

$sql2 = "SELECT * FROM Areas";
$result2 = $myDB->queryTable($sql2);
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
	width: 320px;
}
#delete {
	border-radius 5px;
}
select {
	padding: 4px;
	width: 320px;
}
form {
	margin-bottom: 0px;
}
</style>
<?php
$areaID = $row[2];
$areaName;
$sql4 = "SELECT (`Name`) FROM Areas WHERE `ID`=$areaID";
$result4 = $myDB->queryTable($sql4);
while($row4 = $result4->fetch_array())
{
	$areaName = $row4[0];
}
?>
<table id="editData">
<tr>
<td>ID</td>
<td><input id = "id" value = "<?php echo $_POST['id'] ?>" disabled></td>
</tr>
<tr>
<td>Name</td>
<td><input id = "name" value="<?php echo $row[1] ?>" placeholder="Name"></td>
</tr>
<tr>
<td>Parent Area ID</td>
<td><form>
<select id="parentAreaID">
<option value="<?php echo $row[2] ?>"><?php echo $row[2] ?>: <?php echo $areaName ?></option>
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
    									parentAreaID : $("#parentAreaID").val(),
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

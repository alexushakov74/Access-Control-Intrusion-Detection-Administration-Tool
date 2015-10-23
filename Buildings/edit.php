<?php
include_once('db.php');

$myDB = new dbLayer();

$sql = "SELECT * FROM " . $myDB->table . " where ID = '" . $_POST['id'] . "'";
$result = $myDB->queryTable($sql);
$row = $result->fetch_array();
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
	width: 300px;
}
#delete {
	border-radius 5px;
}
</style>
<table id="editData">
<tr>
<td>ID</td>
<td><input id = "id" value = "<?php echo $_POST['id'] ?>" disabled></td>
</tr>
<tr>
<td>Name</td>
<td><input id = "name" value="<?php echo $row[1] ?>" placeholder="Name"></td>
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

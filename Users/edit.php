<?php
include_once('db.php');

$myDB = new dbLayer();
$id = $_POST['id'];

$sql = "SELECT * FROM $myDB->table where ID = '$id'";
$result = $myDB->queryTable($sql);
$row = $result->fetch_array();

$sql2 = "SELECT `Name` FROM Profiles";
$result2 = $myDB->queryTable($sql2);

$sql3 = "SELECT `Name` FROM Departments";
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
}
select {
	padding: 4px;
	width: 206px;
}
form {
	margin-bottom: 0px;
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
<td>First Name</td>
<td><input id = "firstName" value="<?php echo $row[1] ?>" placeholder="First Name"></td>
</tr>
<tr>
<td>Last Name</td>
<td><input id = "lastName" value="<?php echo $row[2] ?>" placeholder="Last Name"></td>
</tr>
<tr>
<td>Code</td>
<td><input id = "code" value="<?php echo $row[3] ?>" placeholder="Code" disabled></td>
</tr>
<tr>
<td>Profile</td>
<td><form>
<select id="profile">
<?php 
if($row[4] != "")
{
?>
<option value="<?php echo $row[4] ?>" selected><?php echo $row[4] ?></option>
<option disabled>---</option>
<?php 
}
while($row2 = $result2->fetch_array()) 
{ ?>
<option value="<?= $row2[0] ?>"><?= $row2[0] ?></option>
<?php
}
?>
</select></td>
</tr>
<tr>
<td>Description</td>
<td><input id = "description" value="<?php echo $row[5] ?>" placeholder="Description"></td>
</tr>
<tr>
<td>Department</td>
<td><form>
<select id="department">
<?php 
if($row[6] != "")
{
?>
<option value="<?php echo $row[6] ?>" selected><?php echo $row[6] ?></option>
<option disabled>---</option>
<?php 
} ?>
<option value="None">None</option>
<?php
while($row3 = $result3->fetch_array()) 
{ ?>
<option value="<?= $row3[0] ?>"><?= $row3[0] ?></option>
<?php
}
?>
</select></td>
</tr>
<tr>
<td>BannerID</td>
<td><input id = "bannerID" value="<?php echo $row[7] ?>" placeholder="BannerID"></td>
</tr>
<tr>
<td>Badge Type</td>
<td><form action="action_page.php">
<select id="badgeType">
<?php
if($row[8] != "")
{
?>
<option value="<?php echo $row[8] ?>" selected><?php echo $row[8] ?></option>
<option disabled>---</option>
<option value="Deactivated">Deactivated</option>
<option value="User">User</option>
<?php
}
else
{
?>
<option value="Deactivated">Deactivated</option>
<option value="User" selected>User</option>
<?php
}
?>
<option value="Authority">Authority</option>
<option value="Admin">Admin</option>
</select></td>
</tr>
<tr>
<td>Email</td>
<td><input id = "email" value="<?php echo $row[9] ?>" placeholder="Email"></td>
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
    		
    		$.post("saveEdit.php", { firstName : $("#firstName").val(),
    									lastName : $("#lastName").val(),
    									code : $("#code").val(),
										profile : $("#profile").val(),
    									description : $("#description").val(),
										department : $("#department").val(),
    									bannerID : $("#bannerID").val(),
										badgeType : $("#badgeType").val(),
    									email : $("#email").val(),
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

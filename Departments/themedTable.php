<style>
#addRow{
	border-radius: 10px;
	float: right;
	margin-top: -16px;
	margin-bottom: 4px;
	margin-right: 1%;
	cursor: copy;
}
#edit {
	border-radius: 5px;
	margin-right: 15%;
}
</style>
<?php
include_once('db.php');
$myDB = new dbLayer();

// Create connection
$conn = $myDB->conn;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM " . $myDB->table;
$result = $conn->query($sql);
?>


				<button type="button" class="btn btn-success btn-s" data-toggle="modal" 
				data-target="#add" data-id="<?= $row[0] ?>" id="addRow"><strong><span class="glyphicon glyphicon-plus"></span> Add Department</strong></button>
				<br>


<table class="table table-hover table-responsive">
	<tr class="active">
<?php
$sql2 = "SHOW COLUMNS FROM " . $myDB->table;
$result2 = mysqli_query($conn,$sql2);
while($row = $result2->fetch_array()) 
{ ?>
		<td><?= $row['Field'] ?></td>
<?php
	}
?>
	<td align="right"><div id="edit">Action</div></td>
	</tr>
<?php
while($row = $result->fetch_array()) 
{ 
$userID = $row[2];
$userName;
$sql3 = "SELECT * FROM Users WHERE `ID`=$userID";
$result3 = mysqli_query($conn,$sql3);
while($row3 = $result3->fetch_array())
{
	$userName = $row3[1] . " " . $row3[2];
}
?>
	<tr>
		<td><span class="badge"><?= $row[0] ?></span></td>
		<td><?= $row[1] ?></td>
		<td><?php echo $row[2] . ": " . $userName?></td>
		<td align="right"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" id="edit"
				data-target="#editRow" data-id="<?= $row[0] ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button></td>
	</tr>
<?php
}
?>
</table>

<!-- Everything below here pertains to the overlay -->

 <!-- Modal -->
<div class="modal fade" id="editRow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Row</h4>
			</div>
			<div class="modal-body">
				<div id="modal-content">
					This is the content of the model, which will be replaced before the user sees it... we hope
				</div>
				<br>
				<div id="status"></div>
			</div>
			<!--
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div> -->
		</div>
	</div>
</div>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Department Form</h4>
			</div>
			<div class="modal-body">
				<div id="modal-content-add">
					This is the content of the model, whicqdasdasdsdasadh will be replaced before the user sees it... we hope
				</div>
				<br>
				<div id="status"></div>
			</div>
			<!--
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div> -->
		</div>
	</div>
</div>

<script type="text/javascript">
	// This block of code gets fired off when the modal is displayed. It will
	// load the appropriate details into the modal
	$('#editRow').on('show.bs.modal', function (event) 
	{
		var button = $(event.relatedTarget); // Button that triggered the modal
		var id = button.data('id'); // Extract info from data-* attributes
		
		var modal = $(this); // Grab the modal so we can alter its content

		// Display a loading message while we wait for the call back
		$('#modal-content').html('<div class="alert alert-info" role="alert"><strong>Loading row data...</strong></div>');
		
		// Call the web page that will get the list of
		$("#modal-content").load("edit.php", { "id" : id }, function(response, status, xhr) 
		{
	
		});
	});
	
	// This is run when the modal is hidden, to refresh the table with 
	// any edited data
	$('#editRow').on('hide.bs.modal', function (event) 
	{
		loadThemedTable();
	});
	
	$('#add').on('show.bs.modal', function (event) 
	{ 
		var button = $(event.relatedTarget); // Button that triggered the modal
		var id = button.data('id'); // Extract info from data-* attributes
		
		var modal = $(this); // Grab the modal so we can alter its content

		// Display a loading message while we wait for the call back
		$('#modal-content-add').html('<div class="alert alert-info" role="alert"><strong>Loading Submission Form...</strong></div>');
		
		// Call the web page that will get the list of
		$("#modal-content-add").load("addDepartment.php", function(response, status, xhr) 
		{
	
		}); 
	});
	
	// This is run when the modal is hidden, to refresh the table with 
	// any edited data
	$('#add').on('hide.bs.modal', function (event) 
	{
		loadThemedTable();
	});
</script>
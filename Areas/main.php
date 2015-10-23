<link rel="stylesheet" href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/CSS/main.css">

<body style="padding-right: 0px !important;">
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/team1/Nick/navBar.php";
?>

<ul class="nav nav-tabs nav-justified">
  <li role="presentation" class="active"><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/Areas/main.php"><span class="glyphicon glyphicon-map-marker"></span> Areas</a></li>
  <li role="presentation"><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/Buildings/main.php"><span class="glyphicon glyphicon-home"></span> Buildings</a></li>
  <li role="presentation"><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/Departments/main.php"><span class="glyphicon glyphicon-list-alt"></span> Departments</a></li>
  <li role="presentation"><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/Profiles/main.php"><span class="glyphicon glyphicon-file"></span> Profiles</a></li>  
  <li role="presentation"><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/Users/main.php"><span class="glyphicon glyphicon-user"></span> Users</a></li>
  <li role="presentation"><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/Zones/main.php"><span class="glyphicon glyphicon-screenshot"></span> Zones</a></li>
</ul>
<br>
<div id="content">

</div>
</body>

<script>
	loadThemedTable();
	// You must always have a $(document).ready in your web pages, as this is
	// where jQuery will get attached to various items on your page
	$(document).ready(function()
	{
    	$("#loadThemedTable").click(function() { loadThemedTable() });
	});
	
	function loadThemedTable()
	{
		// First, display a message to let the user know we are working
		$("#content").html('<div class="alert alert-info" role="alert" style="cursor: progress;"><strong>Loading table...</strong></div>');
		
		// Now, load the content from a different page
		$("#content").load("http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/Areas/themedTable.php");
	}
</script>
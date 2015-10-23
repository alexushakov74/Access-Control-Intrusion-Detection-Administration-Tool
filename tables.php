<style>
html {
	overflow-y: scroll;
}
table {
	border-left: 8px solid #ddd;
	border-right: 8px solid #ddd;
	border-bottom: 14px solid #ddd;
}
</style>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/team1/Nick/navBar.php";
?>
<ul class="nav nav-tabs nav-justified">
  <li><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/Areas/main.php"><span class="glyphicon glyphicon-map-marker"></span> Areas</a></li>
  <li><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/Buildings/main.php"><span class="glyphicon glyphicon-home"></span> Buildings</a></li>
  <li><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/Departments/main.php"><span class="glyphicon glyphicon-list-alt"></span> Departments</a></li>
  <li><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/Profiles/main.php"><span class="glyphicon glyphicon-file"></span> Profiles</a></li>  
  <li><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/Users/main.php"><span class="glyphicon glyphicon-user"></span> Users</a></li>
  <li><a href="http://ec2-54-175-213-117.compute-1.amazonaws.com/team1/Nick/Zones/main.php"><span class="glyphicon glyphicon-screenshot"></span> Zones</a></li>
</ul>
<br>

<script>
	// You must always have a $(document).ready in your web pages, as this is
	// where jQuery will get attached to various items on your page
	$(document).ready(function()
	{
    	$("#loadThemedTable").click(function() { loadThemedTable() });
	});
</script>
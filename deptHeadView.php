<form action="writeToDB.php" method="POST">
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/team1/Nick/basicView.php";
?>
<hr>
<?php
if($badgetype=="Authority" || $badgetype=="Admin")
{
	$sender = ($userID);
?>

<h2><span class="glyphicon glyphicon-globe"></span> Request Access for a user in an area you have authority over</h2>
<input name="sender" value = <?= $sender?> hidden></input>
<table id="msg">
<tr>
<td>First Name</td>
<td><input name = "firstName" placeholder="First Name" class="form-control" id="focusedInput"></td>
</tr>
<tr>
<td>Last Name</td>
<td><input name = "lastName" placeholder="Last Name" class="form-control" id="focusedInput"></td>
</tr>
<tr>
<td>Description</td>
<td><input name = "description" placeholder="Description" class="form-control" id="focusedInput"></td>
</tr>
<tr>
<td>Department</td>
<td><input name = "department" placeholder="Department" class="form-control" id="focusedInput"></td>
</tr>
<tr>
<td>BannerID</td>
<td><input name = "bannerID" placeholder="BannerID" class="form-control" id="focusedInput"></td>
</tr>
<tr>
<td>Badge Type</td>
<td><input name = "badgeType" placeholder="Badge Type" class="form-control" id="focusedInput"></td>
</tr>
<tr>
<td>Email</td>
<td><input name = "email" placeholder="Email" class="form-control" id="focusedInput"></td>
</tr>
</table>
<div class="form-group">
      <label for="comment">Details (What areas, for how long, etc.):</label>
      <textarea class="form-control" rows="3" name="comment" style="width:400px" id="focusedInput"></textarea>
    </div>
<button type="submit" class="btn btn-primary btn-xs" data-toggle="modal" id="save" value="Submit"><span class="glyphicon glyphicon-send"></span> Submit Request</button>
</form>
<?php
}
?>
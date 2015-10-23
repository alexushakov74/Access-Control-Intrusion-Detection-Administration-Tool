<form action="checklogin.php" method="POST">
<style>
body {
	background-color: #eee !important;
}
.loginContainer {
	margin: auto;
	width: 300px !important;
	background-color: #fafafa;
	padding: 5px 15px 28px 15px !important;
}
.form-group {
    width:  200px;
    margin: auto;
}
.formInfo {
	width:  200px;
    margin: auto;
}
</style>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/team1/Nick/navBar.php";
?>
<body>

<div class="loginContainer">
  <h2><span class="glyphicon glyphicon-log-in"></span> Login</h2>
  <br>
  <form role="form" id="formLogin" method="post" action="checklogin.php">
    <div class="form-group">
      <label for="bannerID"><span class="glyphicon glyphicon-user"></span> Banner ID:</label>
      <input type="text" class="form-control" name="myusername" id="bannerID" placeholder="Enter Banner ID">
    </div>
	<br>
    <div class="form-group">
      <label for="code"><span class="glyphicon glyphicon-asterisk"></span> Code:</label>
      <input type="password" name="mypassword" class="form-control" id="code" placeholder="Enter Code">
    </div>
	<div class="formInfo">
    <div class="checkbox">
    </div>
    <button type="submit" name="Submit" class="btn btn-primary">Log in</button>
	</div>
  </form>
</div>

</body> 
</form>
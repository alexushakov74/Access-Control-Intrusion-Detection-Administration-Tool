<?php
session_start();
if(!session_is_registered('myusername')){
header('Location: login.php');
}
?>
<p>Hello world</p>

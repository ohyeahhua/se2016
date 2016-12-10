<?php
require("dbconnect.php");
?>
<form method="post" action="controller.php">
<input type="hidden" name="act" value="login">
LoginID: <input type="text" name="loginID">
Password : <input type="password" name="pwd">
<input type="submit">
<a href="register.html">Register<a/>
</form>
<?php
require("profile.php");
?>

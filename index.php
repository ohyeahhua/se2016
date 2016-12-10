<?php
session_start();
require("dbconnect.php");

?>
<h1>Login Form</h1><hr />
<form method="post" action="controller.php">
<input type="hidden" name="act" value="login">
LoginID: <input type="text" name="loginID"><br />
Password : <input type="password" name="pwd"><br />
<input type="submit">
<a href="register.html">Register<a/>
</form>

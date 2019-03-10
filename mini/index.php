<?php
session_start();
include_once 'dbconnect.php';
if(isset($_POST['btn-login']))
{
 
 $email = $_POST['email'];
 $upass = $_POST['pass'];
 $res="SELECT * FROM users WHERE email='$email'";
 $result=$conn->query($res);
 $row=$result->fetch_assoc();
 if($row['password']==$upass && $row['user_id']=="5")
 {
  $_SESSION['user'] = $row['user_id'];
  header("Location: adminhome.php");
 }
 else if($row['password']==$upass && $row['user_id']!="5")
 {
  $_SESSION['user'] = $row['user_id'];
  $_SESSION['uname']=$row['username'];
  header("Location: home.php");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FIMS - Login & Registration System</title>
<link rel="stylesheet" href="Style.css" type="text/css" />
</head>
<body bgcolor="#55AAFF">
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><a href="register.php">Sign Up Here</a></td>
</tr>
<tr>
<td><a href="forgetpasswd.php">Forget Password</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>

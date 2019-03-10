<?php
session_start();
include_once 'dbconnect.php';
if(isset($_POST['btn-login']))
{
 $email = $_POST['email'];
 $id = $_POST['uid'];
 $npass = $_POST['newpass'];
 $cpass = $_POST['confirmpass'];
 $res="SELECT * FROM users WHERE email='$email'";
 $result=$conn->query($res);
 $row=$result->fetch_assoc();
 if($row['user_id']==$id)
 {
  $str="UPDATE users SET password='demo123' WHERE email='".$_POST['email']."'";
	$result=$conn->query($str);
	?>
	<script>alert('Password Changed Successfully');</script>
	<?php
	header("Location: index.php");
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
<td><input type="text" name="uid" placeholder="User ID" required /></td>
</tr>
<tr>
<td><input type="password" name="newpass" placeholder="New Password" required /></td>
</tr>
<tr>
<td><input type="password" name="confirmpass" placeholder="Confirm Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Save Password</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>

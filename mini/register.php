
<script>
var textBox = document.getElementById("pwd");
var textLength = textBox.value.length;
if(textLength<8)
{
	alert("Password must be atleast 8 characters");
}
</script>
<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
include_once 'dbconnect.php';
if(isset($_POST['btn-signup']))
{
 $uname = $_POST['uname'];
 $email = $_POST['email'];
 $upass = $_POST['pass'];
 $res="SELECT * FROM faculty WHERE (EmailID='$email' and FacultyName='$uname')";
 $result=$conn->query($res);
 $row=$result->fetch_assoc();
	if($row['EmailID']==$email && $row['FacultyName']==$uname)
	{
		if(strlen($upass)>7)
		{
			$str="INSERT INTO users(username,email,password) VALUES('$uname','$email','$upass')";
				if ($conn->query($str) == TRUE) {
				?>
					<script>alert('successfully registered ');</script>
				<?php
				}
				else
				{
					?>
					<script>alert('error while registering you...');</script>
					<?php
				}
		}
		else
		{
			?>
			<script>alert('password must be atleast 8 characters...');</script>
			<?php
		}
	}
	else
	{
		?>
		<script>alert('invalid user...');</script>
		<?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" id="pwd" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="index.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>

<?php
include('dbconnect.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['patenttitle'];
$val2=$_POST['regno'];
$val3=$_POST['status'];
$t=time();
$str="insert into patents values('".$val1."','".$val2."','".$val3."')";
if ($conn->query($str) == TRUE) {
	echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "window.location.href='adminhome.php';";
	echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>



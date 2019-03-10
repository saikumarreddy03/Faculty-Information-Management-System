<?php
include('dbconnect.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['worktitle'];
$val2=$_POST['address'];
$val3=$_POST['amount'];
$val4=$_POST['duration'];
$val5=$_POST['status'];
$t=time();
$str="insert into consultancy values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."')";
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



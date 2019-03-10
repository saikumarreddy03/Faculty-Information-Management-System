<?php
include('dbconnect.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['booktitle'];
$val2=$_POST['publisher'];
$val3=$_POST['publicationyear'];
$t=time();
$str="insert into publisher values('".$val1."','".$val2."','".$val3."')";
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


<?php
include('dbconnect.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['societyname'];
$val2=$_POST['eventname'];
$val3=$_POST['studparticipated'];
$val4=$_POST['eventto'];
$val5=$_POST['eventfrom'];
$t=time();
$str="insert into spo values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."')";
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

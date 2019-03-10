<?php
include('dbconnect.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['projecttitle'];
$val2=$_POST['agents'];
$val3=$_POST['amount'];
$val4=$_POST['year'];
$val5=$_POST['duration'];
$val6=$_POST['status'];
$t=time();
$str="insert into grants values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."')";
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




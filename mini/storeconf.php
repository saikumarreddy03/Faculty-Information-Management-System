<?php
include('dbconnect.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['type'];
$val2=$_POST['title'];
$val3=$_POST['vanda'];
$val4=$_POST['time'];
$val5=$_POST['fdate'];
$val6=$_POST['tdate'];
$t=time();
$str="insert into conf values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."')";
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





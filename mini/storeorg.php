<?php
include('dbconnect.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['program'];
$val2=$_POST['programname'];
$val3=$_POST['agency'];
$val4=$_POST['duration'];
$val5=$_POST['fdate'];
$val6=$_POST['tdate'];
$val7=$_POST['amount'];
$t=time();
$str="insert into org values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."')";
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






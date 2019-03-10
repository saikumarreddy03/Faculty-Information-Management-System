<?php
include('dbconnect.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['conferencename'];
$val2=$_POST['type'];
$val3=$_POST['by'];
$val4=$_POST['venue'];
$val5=$_POST['papertitle'];
$val6=$_POST['date'];
$t=time();
$str="insert into research values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."')";
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





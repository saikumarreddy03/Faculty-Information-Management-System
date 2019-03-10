<?php
include('dbconnect.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['papertitle'];
$val2=$_POST['journalname'];
$val3=$_POST['pages'];
$val4=$_POST['year'];
$val5=$_POST['factor'];
$t=time();
$str="insert into national values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."')";
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





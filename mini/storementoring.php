<?php
include('dbconnect.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['facultyname'];
$val2=$_POST['acdyr'];
$val3=$_POST['branch'];
$val4=$_POST['section'];
$val5=$_POST['semister'];
$val6=$_POST['counsellingsubject'];
$val7=$_POST['meeting'];
$val8=$_POST['students'];
$t=time();
$str="insert into mentoring values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."')";
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


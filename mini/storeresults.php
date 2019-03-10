<?php
include('dbconnect.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['facultyname'];
$val2=$_POST['acdyr'];
$val3=$_POST['branch'];
$val4=$_POST['section'];
$val5=$_POST['semister'];
$val6=$_POST['subject'];
$val7=$_POST['studappear'];
$val8=$_POST['studpass'];
$val9=$_POST['passper'];
$t=time();
$str="insert into results values('".$val1."','".$val2."','".$val6."','".$val3."','".$val4."','".$val5."','".$val7."','".$val8."','".$val9."')";
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

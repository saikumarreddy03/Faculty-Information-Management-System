
<?php
include('dbconnect.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['term'];
$val2=$_POST['venue'];
$val3=$_POST['duration'];
$val4=$_POST['fdate'];
$val5=$_POST['tdate'];
$t=time();
$str="insert into shortterm values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."')";
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





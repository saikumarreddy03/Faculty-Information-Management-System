<?php
session_start();
include_once 'dbconnect.php';
$res="SELECT FacultyName FROM faculty";
$result=$conn->query($res);
 $userRow=$result->fetch_assoc();
?>

<body style="background-color:lightblue;">
	<link href="boot.css" rel="stylesheet" type="text/css" media="all">
	<legend align="left">Feedback</legend>
<body>
<table align="center" border=1>
<tr>
	<th align="center" width="150px">Faculty name</th>
	<th align="center" width="150px">Academic Year</th>
	<th align="center" width="150px">Subject</th>
	<th align="center" width="150px">Semister</th>
	<th align="center" width="150px">Branch</th>
	<th align="center" width="150px">Section</th>
	<th align="center" width="150px">Feedback%</th>
</tr>
<tr>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$str="SELECT facultyname,academicyear,subject,semester,branch,section,feedback from  feedback where facultyname='".$_SESSION['uname']."'";
$result=$conn->query($str);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        /*echo $row["FacultyName"].$row["subject"].$row["academicyear"].$row["semister"].$row["branch"].$row["section"].$row["feedbackpercentage"]."<br>";*/
    ?>
    <tr>
		<td>
    <?php
    echo $row["facultyname"];
    ?>
    </td>
    <td>
    <?php
    echo $row["academicyear"];
    ?>
    </td>
    <td>
    <?php
    echo $row["subject"];
    ?>
    </td>
    <td>
    <?php
    echo $row["semester"];
    ?>
    </td>
    <td>
    <?php
    echo $row["branch"];
    ?>
    </td>
    <td>
    <?php
    echo $row["section"];
    ?>
    </td>
    <td>
    <?php
    echo $row["feedback"];
    ?>
    </td>
    </tr>
    <?php
    }
} else {
    echo "0 results";
}
?>
</tr>
</table>
<br><br>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4"  align="center">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary" onclick="window.location.href='home.php'">Home</button>
  </div>
</div>
</body>	

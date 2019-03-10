<?php
session_start();
include_once 'dbconnect.php';
$res="SELECT FacultyName FROM faculty";
$result=$conn->query($res);
 $userRow=$result->fetch_assoc();
?>
<body style="background-color:lightblue;">
	<link href="boot.css" rel="stylesheet" type="text/css" media="all">
	<legend align="left">Student Professional Organisation</legend>
<body>
<table align="center" border=1>
<tr>
	<th align="center" width="150px">Name of society</th>
	<th align="center" width="150px">Name of event organised</th>
	<th align="center" width="150px">No. of students participated</th>
	<th align="center" width="150px">Event conducted from</th>
	<th align="center" width="150px">Event conducted upto</th>
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
$str="SELECT societyname,eventname,studparticipated,eventto,eventfrom from spo";
$result=$conn->query($str);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        /*echo $row["FacultyName"].$row["subject"].$row["academicyear"].$row["semister"].$row["branch"].$row["section"].$row["feedbackpercentage"]."<br>";*/
    ?>
    <tr>
		<td>
    <?php
    echo $row["societyname"];
    ?>
    </td>
    <td>
    <?php
    echo $row["eventname"];
    ?>
    </td>
    <td>
    <?php
    echo $row["studparticipated"];
    ?>
    </td>
    <td>
    <?php
    echo $row["eventto"];
    ?>
    </td>
    <td>
    <?php
    echo $row["eventfrom"];
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
<br>
<br>
<br>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4"  align="center">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary" onclick="window.location.href='adminhome.php'">Home</button>
  </div>
</div>
</body>	


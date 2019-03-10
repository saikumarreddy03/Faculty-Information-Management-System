
<?php
session_start();
include_once 'dbconnect.php';
$res="SELECT FacultyName FROM faculty";
$result=$conn->query($res);
 $userRow=$result->fetch_assoc();
?>
<body style="background-color:lightblue;">
	<link href="boot.css" rel="stylesheet" type="text/css" media="all">
	<legend align="left">Conferences/Seminars/Workshops attended by the faculty</legend>
<body>
<table align="center" border=1>
<tr>
	<th align="center" width="150px">Type of program</th>
	<th align="center" width="150px">Title</th>
	<th align="center" width="150px">Venue</th>
	<th align="center" width="150px">Duration</th>
	<th align="center" width="150px">From Date</th>
	<th align="center" width="150px">To Date</th>
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
$str="SELECT type,title,vanda,time,fdate,tdate from conf";
$result=$conn->query($str);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        /*echo $row["FacultyName"].$row["subject"].$row["academicyear"].$row["semister"].$row["branch"].$row["section"].$row["feedbackpercentage"]."<br>";*/
    ?>
    <tr>
		<td>
    <?php
    echo $row["type"];
    ?>
    </td>
    <td>
    <?php
    echo $row["title"];
    ?>
    </td>
    <td>
    <?php
    echo $row["vanda"];
    ?>
    </td>
     <td>
    <?php
    echo $row["time"];
    ?>
    </td>
    <td>
    <?php
    echo $row["fdate"];
    ?>
    </td>
    <td>
    <?php
    echo $row["tdate"];
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







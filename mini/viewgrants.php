
<?php
session_start();
include_once 'dbconnect.php';
$res="SELECT FacultyName FROM faculty";
$result=$conn->query($res);
 $userRow=$result->fetch_assoc();
?>
<body style="background-color:lightblue;">
	<link href="boot.css" rel="stylesheet" type="text/css" media="all">
	<legend align="left">Grants</legend>
<body>
<table align="center" border=1>
<tr>
	<th align="center" width="150px">Title of Project</th>
	<th align="center" width="150px">Sponsoring agency</th>
	<th align="center" width="150px">Amount</th>
	<th align="center" width="150px">Sanctioned Year </th>
	<th align="center" width="150px">Duration</th>
	<th align="center" width="150px">Status</th>
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
$str="SELECT projecttitle,agents,amount,year,duration,status from grants";
$result=$conn->query($str);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        /*echo $row["FacultyName"].$row["subject"].$row["academicyear"].$row["semister"].$row["branch"].$row["section"].$row["feedbackpercentage"]."<br>";*/
    ?>
    <tr>
		<td>
    <?php
    echo $row["projecttitle"];
    ?>
    </td>
    <td>
    <?php
    echo $row["agents"];
    ?>
    </td>
    <td>
    <?php
    echo $row["amount"];
    ?>
    </td>
     <td>
    <?php
    echo $row["year"];
    ?>
    </td>
    <td>
    <?php
    echo $row["duration"];
    ?>
    </td>
    <td>
    <?php
    echo $row["status"];
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






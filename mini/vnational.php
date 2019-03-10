
<?php
session_start();
include_once 'dbconnect.php';
$res="SELECT FacultyName FROM faculty";
$result=$conn->query($res);
 $userRow=$result->fetch_assoc();
?>
<body style="background-color:lightblue;">
	<link href="boot.css" rel="stylesheet" type="text/css" media="all">
	<legend align="left">Paper publications in National Journals</legend>
<body>
<table align="center" border=1>
<tr>
	<th align="center" width="150px">Title of Paper</th>
	<th align="center" width="150px">Name of journal</th>
	<th align="center" width="150px">Volno.,pages</th>
	<th align="center" width="150px">Year of publication </th>
	<th align="center" width="150px">Imapct factor/Ic factor</th>
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
$str="SELECT papertitle,journalname,pages,year,factor from national";
$result=$conn->query($str);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        /*echo $row["FacultyName"].$row["subject"].$row["academicyear"].$row["semister"].$row["branch"].$row["section"].$row["feedbackpercentage"]."<br>";*/
    ?>
    <tr>
		<td>
    <?php
    echo $row["papertitle"];
    ?>
    </td>
    <td>
    <?php
    echo $row["journalname"];
    ?>
    </td>
    <td>
    <?php
    echo $row["pages"];
    ?>
    </td>
     <td>
    <?php
    echo $row["year"];
    ?>
    </td>
    <td>
    <?php
    echo $row["factor"];
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
    <button id="singlebutton" name="singlebutton" class="btn btn-primary" onclick="window.location.href='home.php'">Home</button>
  </div>
</div>
</body>	






<?php
session_start();
include_once 'dbconnect.php';
$res="SELECT FacultyName FROM faculty";
$result=$conn->query($res);
 $userRow=$result->fetch_assoc();
?>
<?php
require_once("dbcon1.php");
$db_handle = new dbcon1();
$query="SELECT distinct semister from subjects";
$results = $db_handle->runQuery($query);
?>
<script>
function validateForm() {
    var x = document.forms["myform"]["facultyname"].value;
    if (x == "0")
    {
		alert("Option must be selected");
        return false;
    }
 }
</script>

<body style="background-color:lightblue;">
	<link href="boot.css" rel="stylesheet" type="text/css" media="all">
<form class="form-horizontal" align="center" method="POST" action="StoreAdminWork.php" name="myform" onsubmit="return validateForm()">
<fieldset>

<!-- Form Name -->
<legend>Admin Work</legend>
	
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
$str="SELECT FacultyName  from  Faculty";
$result=$conn->query($str);
//echo "<select name='cnames'>";
?>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Faculty Name</label>
  <div class="col-md-4">
    <select id="selectbasic" name="facultyname" class="form-control">
		<option value="0">select an option</option>
      <?php
      while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['FacultyName']."'>".$row['FacultyName']."</option>";
}?>
    </select>
  </div>
</div>
</table>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Type of committee</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="textarea" name="committeetype" required></textarea>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Role</label>
  <div class="col-md-4">
    <select id="selectbasic" name="role" class="form-control">
      <option value="Member" default>Member</option>
      <option value="Coordinator">Coordinator</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>


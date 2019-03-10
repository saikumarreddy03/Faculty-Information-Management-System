<?php
session_start();
include_once 'dbconnect.php';
$res="SELECT FacultyName FROM faculty";
$result=$conn->query($res);
 $userRow=$result->fetch_assoc();	
?>
<html>
<body style="background-color:lightblue;">
	<link href="boot.css" rel="stylesheet" type="text/css" media="all">
<form class="form-horizontal" action="storepatents.php" method="POST" onsubmit="return validateForm()" name="myform">
<fieldset>
	<?php
require_once("dbcon1.php");
$db_handle = new dbcon1();
$query="SELECT distinct semister from subjects";
$results = $db_handle->runQuery($query);
?>
<head>
<script src="results.js"></script>
<script src="jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function validateForm() {
    var x = document.forms["myform"]["patenttitle"].value;
    var y = document.forms["myform"]["regno"].value;
    var z = document.forms["myform"]["status"].value;
   if (x == "0" ||y == "0" ||z == "0") {
        alert("Value must be entered");
        return false;
    }
 }
</script>
</head>
<!-- Form Name -->
<legend>Patents</legend>
<body>
	
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
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Title of Patent</label>  
  <div class="col-md-4">
  <input id="3" name="patenttitle" type="text" placeholder="" pattern="[a-z]{1,20}" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Registration no.</label>  
  <div class="col-md-4">
  <input id="1" name="regno" type="text" placeholder="" pattern="[0-9]{1,10}" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Status</label>  
  <div class="col-md-4">
  <input id="2" name="status" type="text" placeholder="" pattern="[a-z]{1,15}" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
  </div>
</div>
</body>
</html>





<?php
session_start();
include_once 'dbconnect.php';
?>
<html>
<body style="background-color:lightblue;">
	<link href="boot.css" rel="stylesheet" type="text/css" media="all">
<form class="form-horizontal" action="storereviewer.php" method="POST" onsubmit="return validateForm()" name="myform">
<fieldset>
	<?php
require_once("dbcon1.php");
$db_handle = new dbcon1();
?>
<head>
<script src="results.js"></script>
<script src="jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function validateForm() {
    var x = document.forms["myform"]["journalname"].value;
    var y = document.forms["myform"]["publisher"].value;
    var z = document.forms["myform"]["type"].value;
   if (x == "0" ||y == "0" ||z == "0") {
        alert("Value must be entered");
        return false;
    }
 }
</script>
</head>
<!-- Form Name -->
<legend>Reviewer</legend>
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
?>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name of journal</label>  
  <div class="col-md-4">
  <input id="3" name="journalname" type="text" placeholder="" pattern="[a-z]{1,20}" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Publisher</label>  
  <div class="col-md-4">
  <input id="1" name="publisher" type="text" placeholder="" pattern="[a-z]{1,20}" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">National/International</label>  
  <div class="col-md-4">
  <input id="2" name="type" type="text" placeholder="" pattern="[a-z]{1,15}" class="form-control input-md">
    
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



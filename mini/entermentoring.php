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
<form class="form-horizontal" action="storementoring.php" method="POST" onsubmit="return validateForm()" name="myform">
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
function getSubjects(val) {
	$.ajax({
	type: "POST",
	url: "get_data.php",
	data:'sem_id='+val,
	success: function(data){
		$("#subject").html(data);
	}
	});
}
</script>
<script>
/*$(document).ready(function(){
    
   $("#2").blur(function(){
        var i=$("#2").val();
        var j=$("#1").val();
       var k=(((j-i)/j)*100);
       if(k<0)
       {
			k=k*(-1);
		}
			$("#3").val(k);
    });
});*/
function validateForm() {
    var x = document.forms["myform"]["facultyname"].value;
    var y = document.forms["myform"]["acdyr"].value;
    var z = document.forms["myform"]["branch"].value;
    var a = document.forms["myform"]["section"].value;
    var b = document.forms["myform"]["semister"].value;
    var c = document.forms["myform"]["counsellingsubject"].value;
    var m = document.forms["myform"]["meeting"].value;
    if (x == "0" ||y == "0" ||z == "0" ||a == "0" ||b == "0" ||c == "0" ||m == "0") {
        alert("Option must be selected");
        return false;
    }
 }
</script>
</head>
<!-- Form Name -->
<legend>Mentoring</legend>
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
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Academic Year</label>
  <div class="col-md-4">
    <select id="selectbasic" name="acdyr" class="form-control">
		<option value="0">select an option</option>
      <option value="2015-16">2015-16</option>
      <option value="2016-17">2016-17</option>
      <option value="2017-18">2017-18</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Branch</label>
  <div class="col-md-4">
    <select id="selectbasic" name="branch" class="form-control">
		<option value="0">select an option</option>
      <?php
      /*<option value="1">CSE</option>
      <option value="2">IT</option>
      <option value="3">CSSE</option>
      <option value="4">EEE</option>
      <option value="5">ECE</option>
      <option value="6">EIE</option>
      <option value="7">MECH</option>
      <option value="8">CE</option>*/
      $str="SELECT distinct branch from subjects";
$result=$conn->query($str);
//echo "<select name='cnames'>";
      while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['branch']."'>".$row['branch']."</option>";}
      ?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Section</label>
  <div class="col-md-4">
    <select id="selectbasic" name="section" class="form-control">
		<option value="0">select an option</option>
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Semister</label>
  <div class="col-md-4">
    <select id="semester" name="semister" onChange="getSubjects(this.value);" class="form-control">
		<option value="0">select an option</option>
		<?php
foreach($results as $semester) {
?>
<option value="<?php echo $semester["semister"]; ?>"><?php echo $semester["semister"]; ?></option>
<?php
}
?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<?php
/*<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Subject</label>
  <div class="col-md-4">
    <select id="subject" name="subject" class="form-control">
		<option value="0">select an option</option>
      <option value="1">C</option>
      <option value="2">OOP</option>
      <option value="3">DBMS</option>
      <option value="4">UNIX</option>
      $str="SELECT distinct subjectname from subjects";
$result=$conn->query($str);
//echo "<select name='cnames'>";
      while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['subjectname']."'>".$row['subjectname']."</option>";
}
    </select>
  </div>
</div>*/?>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Counsellingsubject</label>  
  <div class="col-md-4">
  <input id="3" name="counsellingsubject" type="text" placeholder="" pattern="[a-z]{1,10}" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Dates of meetings</label>  
  <div class="col-md-4">
  <input id="1" name="meeting" type="Date" placeholder="" pattern="[0-9]{1,3}" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">No. of students Councelled</label>  
  <div class="col-md-4">
  <input id="2" name="students" type="text" placeholder="" pattern="[0-9]{1,3}" class="form-control input-md">
    
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


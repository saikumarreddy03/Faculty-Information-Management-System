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
<form class="form-horizontal" action="storeresults.php" method="POST" onsubmit="return validateForm()" name="myform">
<fieldset>
<head>
<script src="results.js"></script>
<script>
$(document).ready(function(){
    
   $("#2").blur(function(){
        var i=$("#2").val();
        var j=$("#1").val();
        if(j>=i)
        {
       var k=((i/j)*100);
        $("#3").val(k);
		}
		else
		{
		alert("Appeared students not be less than passed students");
		return false;
		}
    });
});
function validateForm() {
    var x = document.forms["myform"]["facultyname"].value;
    var y = document.forms["myform"]["acdyr"].value;
    var z = document.forms["myform"]["branch"].value;
    var a = document.forms["myform"]["section"].value;
    var b = document.forms["myform"]["semister"].value;
    var c = document.forms["myform"]["subject"].value;
    var d = document.forms["myform"]["studappear"].value;
    var e = document.forms["myform"]["studpass"].value;
    if (x == "0" ||y == "0" ||z == "0" ||a == "0" ||b == "0" ||c == "0" ) 
    {
        alert("Option must be selected");
        return false;
    }
    if(d<e)
    {
			alert("Appeared students not be less than passed students");
			return false;
	}
 }
</script>
</head>
<!-- Form Name -->
<legend>Results</legend>
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
    <select id="selectbasic" name="semister" class="form-control">
		<option value="0">select an option</option>
		<?php
     /* <option value="1">1st year</option>
      <option value="2">2nd year-1st semister</option>
      <option value="3">2nd year-2nd semister</option>
      <option value="4">3rd year-1st semister</option>
      <option value="5">3rd year-2nd semister</option>
      <option value="6">4th year-1st semister</option>
      <option value="7">4th year-2nd semister</option>*/

$str="SELECT distinct semister from subjects";
$result=$conn->query($str);
//echo "<select name='cnames'>";
      while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['semister']."'>".$row['semister']."</option>";
}?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Subject</label>
  <div class="col-md-4">
    <select id="selectbasic" name="subject" class="form-control">
		<option value="0">select an option</option>
      <?php
      /*<option value="1">C</option>
      <option value="2">OOP</option>
      <option value="3">DBMS</option>
      <option value="4">UNIX</option>*/
      $str="SELECT distinct subjectname from subjects";
$result=$conn->query($str);
//echo "<select name='cnames'>";
      while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['subjectname']."'>".$row['subjectname']."</option>";
}?>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">No. of students appeared</label>  
  <div class="col-md-4">
  <input id="1" name="studappear" type="text" placeholder="" pattern="[0-9]{1,5}" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">No. of students passed</label>  
  <div class="col-md-4">
  <input id="2" name="studpass" type="text" placeholder="" class="form-control input-md" pattern="[0-9]{1,5}">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Pass%</label>  
  <div class="col-md-4">
  <input id="3" name="passper" type="text" placeholder="" class="form-control input-md" readonly>
    
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


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
<form class="form-horizontal" action="storemidtermplan.php" method="POST" onsubmit="return validateForm()" name="myform">
<fieldset>
	<?php
require_once("dbcon1.php");
$db_handle = new dbcon1();
$query="SELECT distinct semister from subjects";
$results = $db_handle->runQuery($query);
?>
<head>
<script src="results.js"></script>
<script>
$(document).ready(function(){
    
   $("#2").blur(function(){
        var i=$("#2").val();
        var j=$("#1").val();
		var k=((i/j)*100);
		$("#3").val(k);
    });
});
</script>
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

function validateForm() {
    var x = document.forms["myform"]["facultyname"].value;
    var y = document.forms["myform"]["acdyr"].value;
    var z = document.forms["myform"]["branch"].value;
    var a = document.forms["myform"]["section"].value;
    var b = document.forms["myform"]["semister"].value;
    var c = document.forms["myform"]["subject"].value;
    var g = document.forms["myform"]["passper"].value;
    var e = document.getElementById("textinput").value;
    if(z=="IT")
    {
		if(c == "0" )
		{
			alert("Option must be selected");
			return false;
		}
	}
	else
	{
		if(e== null || e =="")
		{
			alert("Enter subject");
			return false;
		}
    }
    
	if( g > 100.00)
	{
		alert("Appeared students not be less than passed students");
		return false;
	}
    if (x == "0" ||y == "0" ||z == "0" ||a == "0" ||b == "0" ||m == "0") {
        alert("Option must be selected");
        return false;
    }
    
 }
</script>
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
$(document).ready(function(){
$('select[name=branch]').click(function(){
if($(this).val()=="Others"){
$('#sub').hide();
$('#sub1').show();
}
if($(this).val()=="IT"){
$('#sub1').hide();
$('#sub').show();
}
});
});
</script>
</head>
<!-- Form Name -->
<legend>Midterm</legend>
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
  <div class="col-md-4" >
    <select id="selectbasic" name="branch" class="form-control">
		<option value="0">select an option</option>
      <option value="IT">IT</option>
      <option value="Others">Others</option>
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
<div class="form-group" id="sub">
  <label class="col-md-4 control-label" for="selectbasic">Subject</label>
  <div class="col-md-4">
    <select name="subject" id="subject" class="form-control">
		<option>select sub</option>
    </select>
  </div>
</div>

  <div class="form-group" id="sub1" style="display:none;">
	  <label class="col-md-4 control-label" for="selectbasic">Subject</label>
	  <div class="col-md-4">
		<input id="textinput" name="subject1" type="text" class="form-control input-md">
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



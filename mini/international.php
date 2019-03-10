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
<form class="form-horizontal" action="storeinternational.php" method="POST" onsubmit="return validateForm()" name="myform">
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
    var x = document.forms["myform"]["papertitle"].value;
    var y = document.forms["myform"]["journalname"].value;
    var z = document.forms["myform"]["pages"].value;
    var b = document.forms["myform"]["year"].value;
    var a = document.forms["myform"]["factor"].value;
    var c = document.forms["myform"]["google"].value;
   if (x == "0" ||y == "0" ||z == "0"||a=="0"||b=="0"||c=="0") {
        alert("Value must be entered");
        return false;
    }
 }
</script>
</head>
<!-- Form Name -->
<legend>Paper publications in InterNational Journals</legend>
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
  <label class="col-md-4 control-label" for="textinput">Title of Paper</label>  
  <div class="col-md-4">
  <input id="3" name="papertitle" type="text" placeholder="" pattern="[a-z]{1,20}" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name of journal</label>  
  <div class="col-md-4">
  <input id="1" name="journalname" type="text" placeholder="" pattern="[a-z]{1,20}" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">VOl no.,pages</label>  
  <div class="col-md-4">
  <input id="2" name="pages" type="text" placeholder="" pattern="[0-9],[0-9]{1,15}" class="form-control input-md">
    </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Year of publication</label>  
  <div class="col-md-4">
  <input id="1" name="year" type="text" placeholder="" pattern="[0-9]{1,10}" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Impact factor/IC factor</label>  
  <div class="col-md-4">
  <input id="5" name="factor" type="text" placeholder="" pattern="[0-9]{1,15}" class="form-control input-md">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Specify Scopus indexed/Web of science/Google scholar</label>  
  <div class="col-md-4">
  <input id="6" name="google" type="text" placeholder="" pattern="[a-z]{1,15}" class="form-control input-md">
    
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






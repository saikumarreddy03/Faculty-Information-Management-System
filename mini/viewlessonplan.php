
<?php
session_start();
include_once 'dbconnect.php';
$res="SELECT FacultyName FROM faculty";
$result=$conn->query($res);
 $userRow=$result->fetch_assoc();
?>
<body style="background-color:lightblue;">
	<link href="boot.css" rel="stylesheet" type="text/css" media="all">
<body>
<?php
require_once("dbcon1.php");
$db_handle = new dbcon1();
$query="SELECT distinct semister from subjects";
$results = $db_handle->runQuery($query);
?>

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



<form class="form-horizontal" method="POST">
<fieldset>

<!-- Form Name -->
<legend>View lessonplan</legend>

<!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Select faculty</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="checkboxes-0">
      <input type="checkbox" name="faculty[]" id="checkboxes-0" value="all">
      all
    </label>
	</div>
	 <div class="checkbox">
	<?php
      while($row = $result->fetch_assoc()) {
      echo "<input type='checkbox' name='faculty[]' value='".$row['FacultyName']."'>".$row['FacultyName']."<br>";
  }
    ?>
	</div>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <input type="submit" name="submit" value="view">
    <input type="reset" value="reset">
  </div>
</div>

</fieldset>
</form>

<?php
// This PHP script will only run on post back from submit
if(isset($_POST['submit'])){
    if(!empty($_POST['faculty'])){
		?>
		<table align="center" border=1>
				<tr>
				    <th align="center" width="150px">Faculty name</th>
	                <th align="center" width="150px">Academic Year</th>
	                <th align="center" width="150px">Subject</th>
	                <th align="center" width="150px">Semister</th>
                	<th align="center" width="150px">Branch</th>
                	<th align="center" width="150px">Section</th>
					<th align="center" width="150px">Classes Planned</th>
					<th align="center" width="150px">Classes Taken</th>
					<th align="center" width="150px">Deviation%</th>
		       </tr>
				<?php
        // loop to retrieve checked values
        foreach($_POST['faculty'] as $selected){
            //echo $selected."</br>";
            if($selected=="all")
            {
				$sqlCustomer = "SELECT * FROM lessonplan";
				$aCustomer =mysql_query($sqlCustomer);
				?>
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

				$result1=$conn->query($sqlCustomer);
				if ($result1->num_rows > 0) {
				// output data of each row
				while($row = $result1->fetch_assoc()) {
				/*echo $row["FacultyName"].$row["subject"].$row["academicyear"].$row["semister"].$row["branch"].$row["section"].$row["feedbackpercentage"]."<br>";*/
				?>
					<tr>
        <td>
    <?php
    echo $row["facultyname"];
    ?>
    </td>
    <td>
    <?php
    echo $row["academicyear"];
    ?>
    </td>
    <td>
    <?php
    echo $row["subject"];
    ?>
    </td>
    <td>
    <?php
    echo $row["semister"];
    ?>
    </td>
    <td>
    <?php
    echo $row["branch"];
    ?>
    </td>
    <td>
    <?php
    echo $row["section"];
    ?>
    </td>
    <td>
    <?php
    echo $row["classplan"];
    ?>
    </td>
    <td>
    <?php
    echo $row["classtak"];
    ?>
    </td>
    <td>
    <?php
    echo $row["deviation"];
    ?>
    </td>
    				</tr>
				<?php
				}
				} 
				else {
					echo "0 results";
					}
				?>

				</tr>
				</table>
				<br>
			<?php
			break;
			}
			else
			{
		
					 $sqlCustomer = "SELECT * FROM lessonplan where facultyname='$selected'";
				$aCustomer =mysql_query($sqlCustomer);
				?>
				
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

				$result1=$conn->query($sqlCustomer);
				if ($result1->num_rows > 0) {
				// output data of each row
				while($row = $result1->fetch_assoc()) {
				/*echo $row["FacultyName"].$row["subject"].$row["academicyear"].$row["semister"].$row["branch"].$row["section"].$row["feedbackpercentage"]."<br>";*/
				?>
					<tr>
			<td>
    <?php
    echo $row["facultyname"];
    ?>
    </td>
    <td>
    <?php
    echo $row["academicyear"];
    ?>
    </td>
    <td>
    <?php
    echo $row["subject"];
    ?>
    </td>
    <td>
    <?php
    echo $row["semister"];
    ?>
    </td>
    <td>
    <?php
    echo $row["branch"];
    ?>
    </td>
    <td>
    <?php
    echo $row["section"];
    ?>
    </td>
    <td>
    <?php
    echo $row["classplan"];
    ?>
    </td>
    <td>
    <?php
    echo $row["classtak"];
    ?>
    </td>
    <td>
    <?php
    echo $row["deviation"];
    ?>
    </td>
					</tr>
					<?php
				}
				} 
				else {
					echo "0 results";
					}
				?>

				</tr>
				
				<br>
				<?php
			}
					
		}
		?>
		</table>
		<?php
	}
}
?>


<br><br>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4"  align="center">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary" onclick="window.location.href='adminhome.php'">Home</button>
  </div>
</div>
</form>
</body>	




<?php
require_once("dbcon1.php");
$db_handle = new dbcon1();
if(!empty($_POST["sem_id"])) {
	$query ="SELECT * FROM subjects WHERE Semister = '" . $_POST["sem_id"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="0">Select Subject</option>
<?php
	foreach($results as $subject) {
?>
	<option value="<?php echo $subject["SubjectName"]; ?>"><?php echo $subject["SubjectName"]; ?></option>
<?php
	}
}
?>



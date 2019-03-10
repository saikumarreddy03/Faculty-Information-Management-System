<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$res="SELECT * FROM users WHERE user_id='".$_SESSION['user']."'";
$result=$conn->query($res);
 $userRow=$result->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="Style.css" type="text/css" />
</head>
<body bgcolor="#BDBDBD">
<div id="header">
 <div id="left">
    <label>Faculty Information Management Systems</label>
    <div style="margin-left:1100px;">
     <div id="content">
         Welcome  <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
         <a href="changepasswd.php">Change Password</a>
	 </div>
     </div>
	 <div class="drop">
            <ul class="drop_menu">
               <li>
              <a href="#">
                <span>FeedBack</span>
              </a>
			<ul class="drop_menu1">
			   <li><a href="Feedback.php">Enter feedback</a></li>
				<li><a href="ViewFeedback.php">View Feedback</a></li>
             </ul>
            </li>
           <li class="treeview">
              <a href="#">
                <span>LessonPlan</span>
              </a>
              <ul class="drop_menu11">
				  <li><a href="enterlessonplan.php">Enter Lesson Plan</a></li>
				  <li><a href="viewlessonplan.php">View Lesson Plan</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
               <span>Assignment/Formative</span>
              </a>
                <ul class="treeview-menu">
					<li><a href="enterasf.php">Enter Assignment/Formative details</a></li>
				    <li><a href="viewasf.php">View Assignment/Formative details</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
                <span>MidTerm</span>
              </a>
              <ul class="treeview-menu">
					<li><a href="entermidtermplan.php">Enter midtermplan</a></li>
				    <li><a href="viewmidtermplan.php">View midtermplan</a></li> 
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <span>Results</span>
              </a>
                  <ul class="drop_menu1">
			   <li><a href="EnterResults.php">Enter results</a></li>
				<li><a href="ViewResults.php">View results</a></li>
              </ul>
           </li>
             <li>
              <a href="#">
                   <span>AdminWork</span>
              </a>
              <ul>
				<li><a href="EnterAdminWork.php">Enter admin work</a></li>
				<li><a href="ViewAdminWork.php">View admin work</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
                <span>StudentActivities</span>
              </a>
              <ul class="drop_menu1">
                <li><a>Mentoring Students</a>
                 <ul>
                   <li><a href="entermentoring.php">Enter Student mentoring</a></li>
                   <li><a href="viewmentoring.php">View Student mentoring</a></li>
                </ul>
                </li>
				<li><a>Student Professional Organization</a>
				<ul>
                <li><a href="EnterSPO.php">Enter Student Professional Organisation</a></li>
                <li><a href="ViewSPO.php">View Student Professional Organisation</a></li>
                </ul>
				</li>
              </ul>
            </li>
            <li>
              <a href="#">
                <span>ProfessionalUpgradation</span>
              </a>
              <ul class="drop_menu1">
			   <li><a>Conf/Sem/WS Attended</a>
			     <ul>
                      <li><a href="conf.php">Enter</a></li>
                      <li><a href="viewconf.php">View</a></li>
                  </ul>
			   </li>
				<li><a>Shortterm/Orientation /Refr Attended</a>
				<ul>
                      <li><a href="short.php">Enter</a></li>
                      <li><a href="viewshort.php">View</a></li>
                   </ul>
				</li>
			    <li><a>Organizing Sem/WorkShops/Conferences</a>
			     <ul>
                      <li><a href="org.php">Enter</a></li>
                      <li><a href="vieworg.php">View</a></li>
                    </ul>
			    </li>
				<li><a>Awards/Certification /Recognitions</a>
				<ul>
                      <li><a href="award.php">Enter</a></li>
                      <li><a href="viewaward.php">View</a></li>
                   </ul>
				</li>
              </ul>
            </li>
            <li>
              <a href="#">
                <span>Research Activities</span>
              </a>
              <ul class="drop_menu1">
			  <li><a>Research Papers Presnted</a>
			  <ul>
                      <li><a href="research.php">Enter</a></li>
                      <li><a href="viewresearch.php">View</a></li>
                 </ul>
			  </li>
				<li><a>International Journal Publications</a>
				<ul>
                        <li><a href="international.php">Enter</a></li>
                        <li><a href="viewinternational.php">View</a></li>
                </ul>
				</li>
			    <li><a>National Journal Publications</a>
			    <ul>
                        <li><a href="national.php">Enter</a></li>
                        <li><a href="viewnational.php">View</a></li>
                 </ul>
			    </li>
				<li><a>Research Grants</a>
				 <ul>
                        <li><a href="grants.php">Enter</a></li>
                        <li><a href="viewgrants.php">View</a></li>
                   </ul>
				</li>
				<li><a>Consultancy</a>
				<ul>
                          <li><a href="consultancy.php">Enter</a></li>
                          <li><a href="viewconsultancy.php">View</a></li>
                </ul>
				</li>
				<li><a>Patents</a>
				  <ul>
                          <li><a href="patents.php">Enter</a></li>
                          <li><a href="viewpatents.php">View</a></li>
                 </ul>
				</li>
				<li><a>Books Published</a>
				  <ul>
                          <li><a href="publisher.php">Enter</a></li>
                          <li><a href="viewpublisher.php">View</a></li>
                     </ul>
				</li>
				<li><a>Ph.D Thesis Evaluation</a>
				     <ul>
                           <li><a href="thesis.php">Enter</a></li>
                           <li><a href="viewthesis.php">View</a></li>
                     </ul>
				</li>
				<li><a>Reviewer</a>
				        <ul>
                              <li><a href="reviewer.php">Enter</a></li>
                              <li><a href="viewreviewer.php">View</a></li>
                        </ul>
				</li>
              </ul>
            </li>
          </ul>
        </div>
</body>
</html>

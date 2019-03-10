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
<body bgcolor="#BDBDBD" >
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
				  <?php
			   /*<li><a href="Feedback.php">Enter feedback</a></li>*/?>
				<li><a href="vFeedback.php">View Feedback</a></li>
              </ul>
            </li>
           <li class="treeview">
              <a href="#">
                <span>LessonPlan</span>
              </a>
              <ul class="drop_menu11">
				  <?php
				 /* <li><a href="enterlessonplan.php">Enter Lesson Plan</a></li>*/?>
				  <li><a href="vlessonplan.php">View Lesson Plan</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
               <span>Assignment/Formative</span>
              </a>
                <ul class="treeview-menu">
					<?php
					/*<li><a href="enterasf.php">Enter Assignment/Formative details</a></li>*/?>
				  <li><a href="vasf.php">View Assignment/Formative details</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
                <span>MidTerm</span>
              </a>
              <ul class="treeview-menu">
				  <?php
					/*<li><a href="entermidtermplan.php">Enter midtermplan</a></li>*/?>
				    <li><a href="vmidtermplan.php">View midtermplan</a></li> 
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <span>Results</span>
              </a>
               <ul class="drop_menu1">
				   <?php
			    /* <li><a href="EnterResults.php">Enter results</a></li>*/?>
				   <li><a href="vResults.php">View results</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
               
                <span>AdminWork</span>
              </a>
              <ul>
				  <?php
				/*<li><a href="EnterAdminWork.php">Enter admin work</a></li>*/?>
				<li><a href="vAdminWork.php">View admin work</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
                <span>StudentActivities</span>
              </a>
              <ul class="drop_menu1">
                <li><a>Mentoring Students</a>
                <ul>
					<?php
                   /*<li><a href="entermentoring.php">Enter Student mentoring</a></li>*/?>
                   <li><a href="vmentoring.php">View Student mentoring</a></li>
                </ul>
                </li>
                
				<li><a>Student Professional Organization</a>
				<ul>
					<?php
                    /*<li><a href="EnterSPO.php">Enter Student Professional Organisation</a></li>*/?>
                       <li><a href="vSPO.php">View Student Professional Organisation</a></li>
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
					  <?php
                      /*<li><a href="conf.php">Enter</a></li>*/?>
                      <li><a href="vconf.php">View</a></li>
                  </ul>
			   </li>
				<li><a>Shortterm/Orientation /Refr Attended</a>
				   <ul>
					   <?php
                      /*<li><a href="short.php">Enter</a></li>*/?>
                      <li><a href="vshort.php">View</a></li>
                   </ul>
				</li>
			    <li><a>Organizing Sem/WorkShops/Conferences</a>
			        <ul>
						<?php
                     /* <li><a href="org.php">Enter</a></li>*/?>
                      <li><a href="vorg.php">View</a></li>
                    </ul>
			    </li>
				<li><a>Awards/Certification /Recognitions</a>
				    <ul>
						<?php
                      /*<li><a href="award.php">Enter</a></li>*/?>
                      <li><a href="vaward.php">View</a></li>
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
					  <?php
                      /*<li><a href="research.php">Enter</a></li>*/?>
                      <li><a href="vresearch.php">View</a></li>
                 </ul>
			  </li>
				<li><a>International Journal Publications</a>
				    <ul>
						<?php
                        /*<li><a href="international.php">Enter</a></li>*/?>
                        <li><a href="vinternational.php">View</a></li>
                    </ul>
				 </li>
			    <li><a>National Journal Publications</a>
			        <ul>
						<?php
                        /*<li><a href="national.php">Enter</a></li>*/?>
                        <li><a href="vnational.php">View</a></li>
                   </ul>
			    </li>
				<li><a>Research Grants</a>
				   <ul>
					   <?php
                        /*<li><a href="grants.php">Enter</a></li>*/?>
                        <li><a href="vgrants.php">View</a></li>
                   </ul>
				</li>
				<li><a>Consultancy</a>
				     <ul>
						 <?php
                          /*<li><a href="consultancy.php">Enter</a></li>*/?>
                          <li><a href="vconsultancy.php">View</a></li>
                     </ul>
				</li>
				<li><a>Patents</a>
				     <ul>
						 <?php
                          /*<li><a href="patents.php">Enter</a></li>*/?>
                          <li><a href="vpatents.php">View</a></li>
                     </ul>
				</li>
				<li><a>Books Published</a>
				     <ul>
						 <?php
                         /* <li><a href="publisher.php">Enter</a></li>*/?>
                          <li><a href="vpublisher.php">View</a></li>
                     </ul>
				</li>
				<li><a>Ph.D Thesis Evaluation</a>
				     <ul>
						 <?php
                           /*<li><a href="thesis.php">Enter</a></li>*/?>
                           <li><a href="vthesis.php">View</a></li>
                     </ul>
				</li>
				<li><a>Reviewer</a>
				        <ul>
							<?php
                              /*<li><a href="reviewer.php">Enter</a></li>*/?>
                              <li><a href="vreviewer.php">View</a></li>
                        </ul>
				</li>
              </ul>
            </li>
          </ul>
        </div>
</body>
</html>

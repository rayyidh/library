<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<style type="text/css">@import url(external.css);</style>
<link rel="stylesheet" type="text/css" href="javascript/menu.css" />
<script language="javascript" type="text/javascript" src="javascript/menu.js"></script>
<link rel="stylesheet" type="text/css" href="javascript/easyslider1.5/css/screen.css" />
<script language="javascript" type="text/javascript" src="javascript/menu.js"></script>
<script type="text/javascript" src="javascript/easyslider1.5/js/jquery.js"></script>
<script type="text/javascript" src="javascript/easyslider1.5/js/easySlider1.5.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){	
			$("#slider").easySlider({
				controlsBefore:	'<p id="controls">',
				controlsAfter:	
				'</p>',
				
				auto: true, 
				continuous: true
			});
			
		});	
	</script>
</head>

<body>
<?php 
 SESSION_START();
 include 'includes/connect.php';
 error_reporting (E_ALL ^ E_NOTICE);
 if($_SESSION['username'])
 {
	// echo "<a href=\"adminlogout.php\">Logout</a>";
	}
	else
	{
		echo "you must be logged in";
		header('Location: adminlogin.php');
	}
?>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td><img src="pics/newban1.jpg" width="1000" height="100" alt="" /></td>
</tr>
       <tr align="left" valign="top">
    <td width="22%" height="0"><table width="1000" border="0" cellspacing="0" cellpadding="0">
       <tr id="menu">
        <td width="166" height="26">
         <ul id="sddm">
	<li><a href="admin.php" onmouseover="mopen('m1')" onmouseout="mclosetime()">Home</a>
		<div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
    <td width="303">   <ul id="sddm">
	<li><a href="adminabout.php" onmouseover="mopen('m5')" onmouseout="mclosetime()">About us</a>
		<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
        <td width="218">
        <ul id="sddm">
	<li><a href="#" onmouseover="mopen('m2')" onmouseout="mclosetime()">Activities</a>
		<div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		<a href="adminproject.php">Projects</a>
		<a href="adminresearch.php">Research</a>
		</div>
	</li></ul></td>
        <td width="294">
        <ul id="sddm">
	<li><a href="adminframe.php" onmouseover="mopen('m3')" onmouseout="mclosetime()">Forum</a>
		<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
        <td width="303">   <ul id="sddm">
	<li><a href="admincontact.php" onmouseover="mopen('m4')" onmouseout="mclosetime()">Contact us</a>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
      <td width="190">
        <ul id="sddm">
	<li><a href="adminresourse.php" onmouseover="mopen('m3')" onmouseout="mclosetime()">Resources</a>
		<div id="m6" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
     <td width="303">   <ul id="sddm">
	<li><a href="adminlogout.php" onmouseover="mopen('m5')" onmouseout="mclosetime()">logout</a>
		<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
      </tr>
    </table></td>
    </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="3" cellspacing="0" >
  <tr>
    <td width="169" height="417" align="left" valign="top">
     <div class="myform">
    <table width="190" border="0" cellspacing="2" cellpadding="2" >
        <td width="182"><a href="student.php"><p>Student</a><hr /></td>
      </tr>
      <tr>
        <td><a href="staff.php">Staff</a><hr /></td>
      </tr>
      <tr>
        <td><a href="project.php">Student Project</a><hr /></td>
      </tr>
      <tr>
        <td><a href="research.php">Research Project</a><hr /></td>
      </tr>
      <tr>
        <td><a href="category.php">Categories</a><hr /></td>
      </tr>
       <tr>
        <td><a href="level.php">Level</a><hr /></td>
      </tr>
       <tr>
        <td><a href="adminthreads.php">Forum</a><hr /></td>
      </tr>
       <tr>
        <td><a href="adminreplies.php">Forum replies</a><hr /></td>
      </tr>
    </table></div></td>
    <td width="819" align="left" valign="top"> <p>Current Event</p>
        <p>The Second and Fourth years are currently Doing  their projects and the Deadline is on June 2011</p>
        <div id="container">       
          <div id="header">
	</div>

	<div id="content">
   
        <div id="slider">
        <ul>				
				<li><img src="javascript/easyslider1.5/images/04052011049.jpg"  width="600" height="300"  alt="Css Template Preview" /></a></li>
				<li><img src="javascript/easyslider1.5/images/04052011050.jpg"  width="600" height="300"  alt="Css Template Preview"  /></a></li>
				<li><img src="javascript/easyslider1.5/images/04052011051.jpg"  width="600" height="300"  alt="Css Template Preview" /></a></li>
				<li><img src="javascript/easyslider1.5/images/project.jpg"  width="600" height="300"  alt="Css Template Preview" /></a></li>
				<li><img src="javascript/easyslider1.5/images/project2.jpg"  width="600" height="300"  alt="Css Template Preview"  /></a></li>	
                <li><img src="javascript/easyslider1.5/images/project3.jpg"  width="600" height="300"  alt="Css Template Preview"  /></a></li>	
                <li><img src="javascript/easyslider1.5/images/project1.jpg"  width="600" height="300"  alt="Css Template Preview"  /></a></li>			
			</ul></div>
            </div>
</div>

</div></td>
  </tr>
</table>
<table width="1000" align="center" cellpadding="2" cellspacing="3">
          <tr bgcolor="#D6D6D6">
          <td align="center">&copy;2011 Developed by NanoSoft Technology LTD <a href="index.php">home</a></td></tr></table>
</body></html>
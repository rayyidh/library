<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<style type="text/css">@import url(external.css);</style>
<link rel="stylesheet" type="text/css" href="javascript/menu.css" />
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
 if($_SESSION['user'])
 {
	 //echo "welcome";
	//header('Location: studentlogin.php');
	}
	else
	{
		echo "you must be logged in";
		header('Location: studentlogin.php');
	}
?>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left"><img src="pics/newban1.jpg" width="1000" height="100" alt="" /></td>
  </tr>
       <tr align="left" valign="top">
    <td width="22%" height="0"><table  width="1000" border="0" cellspacing="0" cellpadding="2">
      <tr id="menu">
        <td width="188" height="26" "eng_on();return true;">
         <ul id="sddm">
	<li><a href="studentpage.php" onmouseover="mopen('m1')" onmouseout="mclosetime()" "eng_on();return true;">Home</a>
		<div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
    <td width="196">   <ul id="sddm">
	<li><a href="studentabout.php" onmouseover="mopen('m5')" onmouseout="mclosetime()">About us</a>
		<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
        <td width="200">
        <ul id="sddm">
	<li><a href="#" onmouseover="mopen('m2')" onmouseout="mclosetime()">Activities</a>
		<div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		<a href="projectpage.php">Projects</a>
		<a href="researchpage.php">Research</a>
		</div>
	</li></ul></td>
        <td width="190">
        <ul id="sddm">
	<li><a href="studentforum.php" onmouseover="mopen('m3')" onmouseout="mclosetime()">Forum</a>
		<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
    <td width="190">
        <ul id="sddm">
	<li><a href="studentresource.php" onmouseover="mopen('m3')" onmouseout="mclosetime()">Resources</a>
		<div id="m6" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
        <td width="206">   <ul id="sddm">
	<li><a href="studentcontact.php" onmouseover="mopen('m4')" onmouseout="mclosetime()">Contact us</a>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
      <td width="206">   <ul id="sddm">
	<li><a href="studentlogout.php" onmouseover="mopen('m4')" onmouseout="mclosetime()">Log out</a>
		<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
      </tr>
    </table></td>
    </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <td width="178" height="204" valign="top">
  <div class="myform">
    <table width="168" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td height="54"><a href="studentpage1.php">Student Project</a>
          <hr /></td>
      </tr>
      <tr>
        <td height="55"><a href="studentresearch.php"> Research Project
          </a>
          <hr /></td>
      </tr>
    </table></div>
    </td>
    <td width="822" align="left" valign="top"><p>Current Event</p>
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

</div>
         </td>
  </tr>
</table>
<table width="1000" align="center" cellpadding="2" cellspacing="3">
          <tr bgcolor="#D6D6D6">
          <td height="22" align="center">&copy;2011 Developed by NanoSoft Technology LTD <a href="index.php"> Home</a></td></tr></table>
</body></html>
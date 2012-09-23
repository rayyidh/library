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
 if($_SESSION['staffuser'])
 {
	 //echo "welcome";
	//header('Location: studentlogin.php');
	}
	else
	{
		echo "you must be logged in";
		header('Location: stafflogin.php');
	}
?>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td><img src="pics/newban1.jpg" width="1000" height="100" alt="" /></td>
</tr>
       <tr align="left" valign="top">
    <td width="22%" height="0"><table width="1000" border="0" cellspacing="0" cellpadding="0">
       <tr id="menu">
        <td width="147" height="26">
         <ul id="sddm">
	<li><a href="staffpage.php" onmouseover="mopen('m1')" onmouseout="mclosetime()">Home</a>
		<div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
    <td width="142">   <ul id="sddm">
	<li><a href="staffabout.php" onmouseover="mopen('m5')" onmouseout="mclosetime()">About us</a>
		<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
        <td width="139">
        <ul id="sddm">
	<li><a href="#" onmouseover="mopen('m2')" onmouseout="mclosetime()">Activities</a>
		<div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		<a href="staffprojectsearch.php">Projects</a>
		<a href="staffsearchres.php">Research</a>
		</div>
	</li></ul></td>
        <td width="138">
        <ul id="sddm">
	<li><a href="staffforum.php" onmouseover="mopen('m3')" onmouseout="mclosetime()">Forum</a>
		<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
        <td width="148">   <ul id="sddm">
	<li><a href="staffcontact.php" onmouseover="mopen('m4')" onmouseout="mclosetime()">Contact us</a>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
      <td width="135">
        <ul id="sddm">
	<li><a href="staffresourse.php" onmouseover="mopen('m3')" onmouseout="mclosetime()">Resources</a>
		<div id="m6" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
     <td width="151">   <ul id="sddm">
	<li><a href="stafflogout.php" onmouseover="mopen('m5')" onmouseout="mclosetime()">logout</a>
		<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
      </tr>
    </table></td>
    </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td width="169" height="417" align="left" valign="top">
    <div class="myform">
    <table width="168" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td height="54"><a href="staffproject.php">Student Project</a>
          <hr /></td>
      </tr>
      <tr>
        <td height="55"><a href="staffresearch.php">Research Project</a>
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
          <td align="center">&copy;Developed by NanoSoft Technology LTD 2011 <a href="index.php">Home</a></td></tr></table>
</body></html>
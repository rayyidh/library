<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<style type="text/css">@import url(external.css);</style>
<link rel="stylesheet" type="text/css" href="javascript/menu.css" />
<script language="javascript" type="text/javascript" src="javascript/menu.js"></script>
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
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
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
  <tr>
    <td height="0"><table width="1000" border="0" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td width="20%" height="424" align="left" valign="top">
        <div class="myform">
    <table width="195" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td height="54"><a href="staffproject.php">Student Project </a>
          <hr /></td>
      </tr>
      <tr>
        <td height="55"><a href="staffresearch.php">Research Project</a>
          <hr /></td>
      </tr>
      </table>
        </div>
        </td>
        <td width="80%" valign="top"><p><h1><a href="http://sci.uonbi.ac.ke/" title="Home">School of Computing and Informatics </a></h1>
<p>To be a leading centre of excellence in research, research and   development (R&amp;D) and advanced education in computing; addressing   national and regional needs for information and communications   technology and product development.</p>
<div>
  <div id="primary">
    <div>
      <div></div>
      <h1>Introduction</h1>
      <p><img src="pics/SCI_ROTATING.gif" width="641" height="198" /></p>
    </div>
  </div>
</div>
<p align="justify"> The School of Computing and Informatics (SCI) formerly known as the   Institute of Computer Science is part of the College of Biological and   Physical Sciences of the University of Nairobi. The School was formally   established by statute in 1977.</p>
<p align="justify"> The School of Computing and Informatics seeks to be a leading centre of   excellence in research, research and development (R&amp;D) and advanced   education in computing; addressing national and regional needs for   information and communications technology and product development.</p>
<p align="justify">&nbsp;</p>
<p align="justify">&nbsp;</p></td>
  </tr></table></td></tr></table>
<table width="1000" align="center" cellpadding="2" cellspacing="3">
          <tr bgcolor="#D6D6D6">
          <td align="center" bgcolor="#D6D6D6">
&copy;2011 Developed by NanoSoft Technology LTD admin<a href="adminlogin.php">?</a>
</td></tr></table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
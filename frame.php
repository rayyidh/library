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
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td><img src="pics/newban1.jpg" width="1000" height="100" alt="" /></td>
    </tr>
    <tr align="left" valign="top">
    <td width="22%" height="0"><table  width="1000" border="0" cellspacing="0" cellpadding="2">
      <tr id="menu">
        <td width="188" height="26" "eng_on();return true;">
         <ul id="sddm">
	<li><a href="index.php" onmouseover="mopen('m1')" onmouseout="mclosetime()" title="HOME" "eng_on();return true;">Home</a>
		<div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
    <td width="196">   <ul id="sddm">
	<li><a href="aboutus.php" onmouseover="mopen('m5')"  title="About Us"onmouseout="mclosetime()">About us</a>
		<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
        <td width="200">
        <ul id="sddm">
	<li><a href="#" onmouseover="mopen('m2')" onmouseout="mclosetime()">Activities</a>
		<div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		<a href="projectpage.php" title="Projects">Projects</a>
		<a href="researchpage.php" title="Research">Research</a>
		</div>
	</li></ul></td>
        <td width="190">
        <ul id="sddm">
	<li><a href="frame.php" onmouseover="mopen('m3')" title="Forum" onmouseout="mclosetime()">Forum</a>
		<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
    <td width="190">
        <ul id="sddm">
	<li><a href="resources.php" onmouseover="mopen('m3')"  title="Resources"onmouseout="mclosetime()">Resources</a>
		<div id="m6" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
        <td width="206">   <ul id="sddm">
	<li><a href="Contact.php" onmouseover="mopen('m4')" title="Contact Us" onmouseout="mclosetime()">Contact us</a>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td height="0"><table width="1000" border="0" align="center" cellpadding="3" cellspacing="3">
      <tr>
          <td width="80%" valign="top">
          <?php
include 'includes/connect.php';
error_reporting (E_ALL ^ E_NOTICE);
$time = time();
if($_POST['submit']){
	if($_POST['title']&&$_POST['message']&&$_POST['author'])
	{
		mysql_query("INSERT INTO threads(id,title,message,author,state,posted) VALUES(NULL,'$_POST[title]','$_POST[message]','$_POST[author]','0','$time')");
// We are selecting everything from the threads section in the database and ordering them newest to oldest.
	}
	//else
		echo"<font size='+1' color='red'>Please fill out the form</font>";
}
?>
         <?php 
 SESSION_START();
 include 'includes/connect.php';
 error_reporting (E_ALL ^ E_NOTICE);
 if($_SESSION[''])
 {
	echo "<div class='myform'>
   <fieldset>
   <legend>Post a comment</legend>
         <form action='frame.php' method='POST'>
         <table border='0' cellpadding='3' cellspacing='4'><tr>
<td>Your Name:</td><td> <input name='author' type='text' size='30'><br></td></tr>
<tr><td>
Thread Title:</td><td><input name='title' type='text' value='' size='50' />  <br></td></tr>
<tr><td>
Thread:<br></td><td><textarea cols='60' rows='5' name='message'></textarea><br></td></tr></table>
Note: Your IP address is saved into the database when you submit a comment. Any type of threatening behaviour will result in your ISP being contacted and legal action being taken place!<br />
<input type='submit' value='Post Thread' name='submit'>
</form></fieldset></div>
	";
	//header('Location: studentlogin.php');
	}
	else
	{
		echo "<font color='red'>login with your account to post a Comment</font>";
		//header('Location: index.php');
	}
?>
<?php
include 'includes/connect.php';
$sql = mysql_query("SELECT * FROM threads WHERE state=0 ORDER BY posted DESC ");

// Now we are getting our results and making them an array.
while($r = mysql_fetch_array($sql)) {

// Everything within the two curly brackets can read from the database using $r[]
// We need to convert the UNIX Timestamp entered into the database for when a thread...
// ... is posted into a readable date, using date().
$posted = date("jS M Y h:i",$r['posted']);

// Now we will show the available threads
echo "<p><font color='#0000FF'><a href='show.php?id=$r[id]'><font color='#0000FF'>$r[title]</font></a> ($r[replies] Replies)</font></p><b>$r[author]</b> : $r[message]<h5>Posted on $posted</h5>";
echo"<hr>";}

?>
</td>
  </tr></table></td></tr></table>
<table width="1000" align="center" cellpadding="2" cellspacing="3">
          <tr bgcolor="#D6D6D6">
          <td align="center">&copy;2011 Developed by NanoSoft Technology LTD </td></tr></table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
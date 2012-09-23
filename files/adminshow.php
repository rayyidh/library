<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">@import url(external.css);</style>
<link rel="stylesheet" type="text/css" href="javascript/menu.css" />
<script language="javascript" type="text/javascript" src="javascript/menu.js"></script>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td><img src="pics/new.jpg" width="1000" height="110" alt="" /></td>
    </tr>
    <tr align="left" valign="top">
    <td width="22%" height="0"><table  width="1000" border="0" cellspacing="0" cellpadding="2">
      <tr id="menu">
        <td width="188" height="26" "eng_on();return true;">
         <ul id="sddm">
	<li><a href="index.php" onmouseover="mopen('m1')" onmouseout="mclosetime()" "eng_on();return true;">Home</a>
		<div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
    <td width="196">   <ul id="sddm">
	<li><a href="#" onmouseover="mopen('m5')" onmouseout="mclosetime()">About us</a>
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
	<li><a href="frame.php" onmouseover="mopen('m3')" onmouseout="mclosetime()">Forum</a>
		<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
    <td width="190">
        <ul id="sddm">
	<li><a href="resources.php" onmouseover="mopen('m3')" onmouseout="mclosetime()">Resources</a>
		<div id="m6" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
        <td width="206">   <ul id="sddm">
	<li><a href="#" onmouseover="mopen('m4')" onmouseout="mclosetime()">Contact us</a>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td height="0"><table width="1000" border="0" align="center" cellpadding="3" cellspacing="0">
      <tr>
          <td width="84%" align="left" valign="top">
          <?php
// Connecting to the database again
include 'includes/connect.php';
error_reporting (E_ALL ^ E_NOTICE);
// Here's a link that will allow you to go back to the index
echo "<a href='frame.php'>Go Back...</a><br>";
// This query selects the current thread using the $_GET value.
$sql = mysql_query("SELECT * FROM threads WHERE id ='$_GET[id]'");
// Now we are getting our results and making them an array
while($t = mysql_fetch_array($sql)) {

// Here is the thread title.
echo "<br><font color='#0000FF' size='+1'>Title : $t[title]</font><br>";
echo "<br><b>$t[author] : </b>$t[message]";

// Everything within the two curly brackets can read from the database using $r[]
// We need to convert the UNIX Timestamp entered into the database for when a thread...
// ... is posted into a readable date, using date().
$posted = date("jS M Y h:i",$t['posted']);

// Now this shows the thread with a horizontal rule after it.
echo "$r[message]<h5>Posted by on $posted</h5><hr>";

// End of Array
}?>
<?php
include 'includes/connect.php';
error_reporting (E_ALL ^ E_NOTICE);
echo "<h3>Replies...</h3>";

// Here we will get it to show the replies
// This query selects the replies from the database where the thread ID matches the thread $_GET value.
$sql2 = mysql_query("SELECT * FROM replies WHERE thread ='$_GET[id]' && state=0");

// Now we are getting our results and making them an array
while($t = mysql_fetch_array($sql2)) {

// Everything within the two curly brackets can read from the database using $r[]
// We need to convert the UNIX Timestamp entered into the database for when a thread...
// ... is posted into a readable date, using date().
$posted = date("jS M Y h:i",$t['posted']);

// Now this shows the thread with a horizontal rule after it.
echo "<b>$t[author] : </b>$t[message]<h4>Posted on $posted</h4><hr>";
// End of Array
}
?>
<?php
//<?php echo $_GET['id'];
	include 'includes/connect.php';
	$time = time();
	if($_POST['submit2']){
		if($_POST['message']&&$_POST['author'])
	{
mysql_query("INSERT INTO replies(id,thread,message,author,posted,state) VALUES(NULL,'$_POST[thread]','$_POST[message]','$_POST[author]','$time','0')");
mysql_query("UPDATE threads SET replies = replies + 1 WHERE id = '$_POST[thread]'");
header('Location: show.php');	
	}
	//else
		echo"Please fill out the form";
}
?>
<?php 
 SESSION_START();
 include 'includes/connect.php';
 error_reporting (E_ALL ^ E_NOTICE);
 if($_SESSION)
 {
	echo "
	<div class='myform'>
   <fieldset>
   <legend>Reply</legend>
<form action='show.php' method='POST'>
	Your Name: <input type='text' name='author'>
	<input type='hidden' value='<?php echo $_GET[id]; ?>' name='thread'><br>
	Message:<br><textarea cols='60' rows='5' name='message'></textarea><br>
	<input type='submit' value='Post Reply' name='submit2'>
	</form></fieldset></div>
	";
	//header('Location: studentlogin.php');
	}
	else
	{
		echo "<font color='red'>you must be logged in to post a Reply</font>";
		//header('Location: index.php');
	}
?>
</td>
  </tr></table></td></tr></table>
<table width="1000" align="center" cellpadding="2" cellspacing="3">
          <tr bgcolor="#D6D6D6">
          <td align="center">
Developed by NanoSoft Technology LTD 2011</td></tr></table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<style type="text/css">@import url(external.css);</style>
<link rel="stylesheet" type="text/css" href="javascript/menu.css" />
<script language="javascript" type="text/javascript" src="javascript/menu.js"></script>
<!-- Javascript goes in the document HEAD -->
<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}

window.onload=function(){
	altRows('alternatecolor');
}
</script>
</head>

<body>
<?php 
 SESSION_START();
 include 'includes/connect.php';
 error_reporting (E_ALL ^ E_NOTICE);
 if($_SESSION['username'])
 {
	 $track =$_SESSION[username];
	 $tr = mysql_query("SELECT *FROM adminlogin WHERE username='$track'");
	while($a = mysql_fetch_array( $tr )) {
		$regtrack=$a[username];
		//echo " $regtrack";
	}
	}
	else
	{
		echo "you must be logged in";
		header('Location: adminlogin.php');
	}
?>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
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
	else
		echo"<font size='+1' color='red'>Please fill out the form</font>";
}
?>
<div class="myform">
   <fieldset>
   <legend>Post a comment</legend>
         <form action="adminframe.php" method="POST">
         <table border="0" cellpadding="3" cellspacing="4" class="altrowstable" id="alternatecolor"><tr>
<td>Your Name:</td><td> 
<?php 
$sql="Select *from adminlogin WHERE username ='$regtrack'";
$q=mysql_query($sql);
echo "<select name='author'> ";
while($row = mysql_fetch_assoc($q)) 
{        
echo "<option value='".$row['username']."'>".$row['username']."</option>"; 
}
echo "</select>";// Closing of list box 
			?>
<br></td></tr>
<tr><td>
Thread Title:</td><td><input name="title" type="text" value="" size="50" />  <br></td></tr>
<tr><td>
Thread:<br></td><td><textarea cols="60" rows="5" name="message"></textarea><br></td></tr>
<tr><td></td><td><input type="submit" value="Post Thread" name="submit"></td></tr></table>
</form></fieldset></div>
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
echo "<p><font color='#0000FF'><a href='adminshow.php?id=$r[id]'><font color='#0000FF'>$r[title]</font></a> ($r[replies] Replies)</font></p><b>$r[author]</b> : $r[message]<h5>Posted on $posted</h5>";
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
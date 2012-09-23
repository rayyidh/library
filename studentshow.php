<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
 if($_SESSION['user'])
 {
	 $track =$_SESSION[user];
	 $tr = mysql_query("SELECT *FROM studentlogin WHERE user='$track'");
	while($a = mysql_fetch_array( $tr )) {
		$regtrack=$a[regno];
		//echo " $regtrack";
	}
 }
	else
	{
		echo "you must be logged in";
		header('Location: studentlogin.php');
	}
?>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td><img src="pics/newban1.jpg" width="1000" height="100" alt="" /></td>
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
  <tr>
    <td height="0"><table width="1000" border="0" align="center" cellpadding="3" cellspacing="0">
      <tr>
          <td width="84%" align="left" valign="top">
          <?php
// Connecting to the database again
include 'includes/connect.php';
error_reporting (E_ALL ^ E_NOTICE);
// Here's a link that will allow you to go back to the index
echo "<a href='studentforum.php'>Go Back...</a><br>";
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
header('Location: studentshow.php');	
	}
	else
		echo"Please fill out the form";
}
?>
<div class="myform">
   <fieldset>
   <legend>Reply</legend>
<form action="studentshow.php" method="POST">
	 <table border="0" cellpadding="3" cellspacing="4" class="altrowstable" id="alternatecolor"><tr>
<td width="98">Your Name:</td><td width="400">  
 <?php 
$sql="Select *from students WHERE regno ='$regtrack'";
$q=mysql_query($sql);
echo "<select name='author'> ";
while($row = mysql_fetch_assoc($q)) 
{        
echo "<option value='".$row['regno']."'>".$row['studentname']."</option>"; 
}
echo "</select>";// Closing of list box 
			?>
	<input type="hidden" value="<?php echo $_GET[id]; ?>" name="thread"><br>
	</td></tr>
<tr><td>
Message:</td><td><textarea cols="60" rows="5" name="message"></textarea><br><br></td></tr>
<tr><td></td><td><input type="submit" value="Post Reply" name="submit2"></td></tr></table>
	</form></fieldset></div></td>
  </tr></table></td></tr></table>
<table width="1000" align="center" cellpadding="2" cellspacing="3">
          <tr bgcolor="#D6D6D6">
          <td align="center">
Developed by NanoSoft Technology LTD 2011</td></tr></table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
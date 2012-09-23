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
    <td width="312">Research</td>
  </tr>
  <tr>
  <td width="312" height="204">
   <div id="row">
 <table width="1000" border="0" cellspacing="0" cellpadding="5">
    <tr>
        <td width="25"><b>ID</b></td>
        <td width="233" align="left"><b>Title</b></td>
        <td width="130" align="left"><b>Description</b></td>
      <td width="155" align="center"><b>Researchers Name</b></td>
        <td width="106" align="center"><b>Start date</b></td>
        <td width="97" align="center"><b>End date</b></td>
        <td width="102" align="center"><b>Value(ksh)</b></td>
        <td width="46" align="center"><b>File</b></td>
    </tr>
</table>
   <?php
// Retrieve data from database
 include 'includes/connect.php';
  error_reporting (E_ALL ^ E_NOTICE);
	$term = $_POST['term'];
	$submit=$_POST['submit'];
	$sql = mysql_query("select * from research where state=0");

// Start looping rows in mysql database.
while($rows=mysql_fetch_array($sql)){
?>
<div id="display">
<table width='1000' border=1 cellpadding='5' class="altrowstable" id="alternatecolor">
    <tr>
        
        <td width="17"><?php print $rows[ID]; ?></td>
        <td width="232"><?php print $rows[ResTitle]; ?></td>
        <td width="128"><?php print  $rows[Description]; ?></td>
        <td width="149" align="center"><?php print $rows[Name]; ?></td>
        <td width="100" align="center"><?php print $rows[Start_date]; ?></td>
        <td width="98" align="center"><?php print $rows[End_date]; ?></td>
        <td width="98" align="center"><?php print $rows[ValueKSH]; ?></td>  
        <td width="31" align="center"><?php echo "<a href='resdownload.php?id=$rows[ID]'><font size='+1' color='black'>view</font> </a>";?></td>  
  </tr> 
</table>
</div>
<?php
}
echo "<hr>";
?>
</td>
</tr>
</table>
<table width="1000" align="center" cellpadding="2" cellspacing="3">
          <tr bgcolor="#D6D6D6">
          <td height="22" align="center">&copy;2011 Developed by NanoSoft Technology LTD <a href="index.php"> Home</a></td></tr></table>
</body></html>
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
<script type="text/JavaScript">
 
function confirmation()
{
var r=confirm("Press OK to delete");
if (r==true)
  {
  alert("You pressed OK!");
  }
else
  {
  alert("You pressed Cancel!");
  }
}
</script>
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
 session_start();
 include 'includes/connect.php';
 error_reporting (E_ALL ^ E_NOTICE);
 if($_SESSION['username'])
 {
	 //echo "welcome";
	//header('Location: studentlogin.php');
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
<table width="1000" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td width="325">Welcome to Student Page</td>
  </tr>
  <tr>
    <td align="left" valign="top"><a href="addproject.php">Add Project</a></td>
  </tr>
 <tr>
  <td width="312" height="0">
     <div id="row">
  <table width="1000" border="0" cellspacing="0" cellpadding="5">
    <tr>
        <td width="33"><b>ID</b></td>
        <td width="196"><b>Title</b></td>
        <td width="145" align="center"><b>Student name</b></td>
        <td width="55" align="center"><b>Year</b></td>
        <td width="101" align="center"><b>Categories</b></td>
        <td width="114" align="center"><b>Level</b></td>
        <td width="127" align="center"><b>Superviser</b></td>
        <td width="52"><b>Grade</b></td>
        <td width="57" align="center"><b>File</b></td>
        <td width="20"><b></b></td>
    </tr>
</table>
   <?php
// Retrieve data from database
 include 'includes/connect.php';
$sql="SELECT * FROM projects where state=0";

$result=mysql_query($sql);

// Start looping rows in mysql database.
while($rows=mysql_fetch_array($result)){
?>
<div id="display">
<table width='1000' border=1 cellpadding='5' class="altrowstable" id="alternatecolor">
    <tr>
        
        <td width="17"><?php echo  $rows[ID]; ?></td>
        <td width="205"><?php echo  $rows[Title]; ?></td>
        <td width="139" align="center"><?php echo  $rows[Student]; ?></td>
        <td width="50" align="center"><?php echo $rows[year]; ?></td>
        <td width="102" align="center"><?php echo $rows[categories]; ?></td>
        <td width="107" align="center"><?php echo $rows[level]; ?></td>
        <td width="125" align="center"><?php echo $rows[Superviser]; ?></td>
        <td width="49" align="center"><?php echo  $rows[grade]; ?></td>
        <td width="45" align="center"><?php echo "<a href='download.php?id=$rows[ID]'><font size='+1' color='black'>view</font> </a>";?></td>
        <td width="17"><?php 
		echo "<a href='dproject.php?id=$rows[ID]'>
		<img src='pics/b_drop.png' width='16' height='16' onclick='confirmation()' value='Show confirm box'/></a>";?></td>
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
<table width="1000" align="center" cellpadding="0" cellspacing="1">
          <tr bgcolor="#D6D6D6">
          <td align="center">&copy;2011 Developed by NanoSoft Technology LTD </td></tr></table>
</body></html>

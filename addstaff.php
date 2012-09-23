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
?><table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
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
<table width="1004" border="0" align="center" cellpadding="3" cellspacing="4">
  <tr>
    <td width="221" height="453" align="left" valign="top">&nbsp;</td>
    <td width="759" align="left" valign="top">
    <?php
	include 'includes/connect.php';
	error_reporting (E_ALL  & ~E_NOTICE & ~E_DEPRECATED^E_WARNING); 
	
	$staffn = $_POST['staffno'];
	$staffna = $_POST['staffname'];
	$idp = $_POST['ID'];
	$submit=$_POST['submit4'];
	
	if($submit)
	{
		if($staffn&&$staffna&&$idp)
		{	
		if (eregi("^[0-9]{5}$", $staffn))
			{	
				
			$query = mysql_query("SELECT * FROM staff where StaffNo='$staffn'");
				if(mysql_num_rows($query)!=0)
				{
					echo "<font size='+1' color='red'>The Staff No. '$staffn' already exist</font>";
				}
				else
				{
					if (ereg("[A-Za-z]$", $staffna))
					{	
				if (ereg("[0-9]$", $idp))
				{	
					if(strlen($idp)>8||strlen($idp)<6)
							{
						echo "<font size='+1' color='red'>ID/Passport no. Must either be between 6 and 8 characters</font>";
							}
							else
						{
				$query1 = mysql_query("SELECT * FROM staff where ID_passportno='$idp'");
				if(mysql_num_rows($query1)!=0)
				{
					echo "<font size='+1' color='red'>The ID/Passort number already exist</font>";
				}
				else
				{
			 mysql_query("INSERT INTO staff(StaffNo,Name,ID_passportno) 
	  		 VALUES ('$staffn','$staffna','$idp')");
			 	mysql_query("Update staff SET state=0 WHERE StaffNo='$staffn'"); 	 
			echo "<font size='+1' color='green'>Staff has been added</font>";
				}
						}
				}
				else
					echo "<font size='+1' color='red'>Sorry Only Numerical Values are Allowed in ID</font>";
			}
			else 
						echo "<font size='+1' color='red'>Sorry Only text are allowed in Staff name</font>";
				}
			}
			else
				echo "<font size='+1' color='red'>Sorry thats not the correct format For Staff Number</font>";
		}
		else
			echo "<font size='+1' color='red'>please fill out the form</font>";
	}
?>
<div class="myform">
<fieldset>
<legend>Add Staff</legend>
     <form action="addstaff.php" method="post" name="form3" id="form3">
        <table border="0" cellpadding="3" cellspacing="4" class="altrowstable" id="alternatecolor">
          <tr>
            <td width="156" height="0">Staff number</td>
            <td width="218" height="0"><input type="text" name="staffno" value="<?php echo $staffn; ?>" />
              <br />
              (Format xxxxx)</td>
          </tr>
          <tr>
            <td width="156" height="0">Staff Name</td>
            <td width="218" height="0"><input type="text" name="staffname" value="<?php echo $staffna; ?>"/></td>
          </tr>
          <tr>
            <td width="156" height="0">ID/Passportno</td>
            <td width="218" height="0"><input type="text" name="ID" value="<?php echo $idp; ?>"/></td>
          </tr>      
         <tr>
            <td></td><td><input type="submit" name="submit4" value="Submit" /></td></tr></table>
      </form></fieldset></div>
    <p></p></td>
  </tr>
</table>
<table width="1000" align="center" cellpadding="2" cellspacing="3">
          <tr bgcolor="#D6D6D6">
          <td align="center">&copy;2011 Developed by NanoSoft Technology LTD </td></tr></table>
</body>
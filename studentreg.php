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
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
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
    <td height="0"><table width="100%" border="0" cellpadding="3" cellspacing="0">
      <tr>
        <td width="16%" height="424" align="left" valign="top">
        <div class="myform">
        <table width="196" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="226" height="76">Log in
              <hr />
              <a href="studentlogin.php" title="Student">Student</a>
              <hr />
              <a href="stafflogin.php" title="Staff">Staff</a>
              <hr />
Register
<hr />
<a href="studentreg.php" title="Students">Student</a>
<hr />
<a href="staffreg.php" title="Staff">Staff</a>
<hr /></td>
          </tr>
        </table></div></td>
        <td width="84%" align="left" valign="top">
		<?php
	include 'includes/connect.php';
	error_reporting (E_ALL ^ E_NOTICE); 
	$regno = strip_tags($_POST['regno']);
	$ID = strip_tags($_POST['ID']);
	$usernm = strtolower(strip_tags($_POST['usernm']));
	$password = strip_tags($_POST['password']);
	$rpassword = strip_tags($_POST['rpassword']);
	$realpass = strip_tags($_POST['password']);
	$submit = $_POST['submit'];
	
	$query = mysql_query("SELECT * FROM students WHERE regno='$regno'");
	$numrows = mysql_num_rows($query);
	if($submit)
	{	//check for existance
		while($row=mysql_fetch_assoc($query))
			{
				$dbregno = $row['regno'];
				$dbID = $row['ID_passportno'];
			}
		//Must fill in all the form
		if($regno&&$ID&&$usernm&&$password&&$rpassword )
		{
				
			if($regno==$dbregno&&$ID==$dbID)
			{ 
				if($regno)
				{

				$query1 =mysql_query("SELECT * FROM studentlogin WHERE regno='$regno'");
				$numrows1 =mysql_num_rows($query1);
					if(mysql_num_rows($query1)!=0)
					{
						echo "<font size='+1' color='red'>The Registration '$regnum' already Exist</font>";
					}
					else
					{
						if($usernm)
						{
							$query2 =mysql_query("SELECT * FROM studentlogin WHERE user='$usernm'");
							$numrows2 =mysql_num_rows($query2);
							if(mysql_num_rows($query2)!=0)
							{
								echo "<font size='+1' color='red'> Username already Exit</font>";
							}
							else
							{
							if($password==$rpassword)
							{
								if(strlen($ID)>12)
								{	
								//check ID len
								echo "<font size='+1' color='red'>Maximim Limit for ID	is 12</font>";
								}
								else
								{	
								//Check username Length
									if(strlen($usernm)>25)
									{
										echo "<font size='+1' color='red'>Maximim Limit for username is 25 </font>";	
									}
									else
									{
										// Check Password length
										if(strlen($password)>25||strlen($password)<6)
										{
											echo "<font size='+1' color='red'>Password Must be between 6 and 25 characters</font>";
										}
										else
										{
											//Encrypt Password
										$password = md5($password);
										$rpassword = md5($rpassword); 
											//Register the User!
											mysql_query("INSERT INTO studentlogin (ID,user,password,regno,realpass) 
											VALUES (Null,'$usernm','$password','$regno','$realpass')");	
											mysql_query("Update students SET reg=1 WHERE regno='$regno'");
											echo "<font size='+1' color='green'>You have Successfully been Registered</font>";
										}
									}
								}
							}
							else
								echo "<font size='+1' color='red'>Your Passwords do not much! </font>";	
							}
							
						}
					}
				}
			}
			else
				echo "<font size='+1' color='red'>Incorrect ID </font>";
			
		}
		else
			echo "<font size='+1' color='red'>Please Fill in all the field</font>";
	}
?>
<div class="myform">
<fieldset>
<legend>Student Registration Form</legend>
<form action="studentreg.php" method="post">
  <table width="52%" border="0" class="altrowstable" id="alternatecolor">
    <tr>
      <td width="58%">Reg number</td>
      <td width="42%">
	  <?php 
$sql="Select regno from students WHERE reg !=1";
$q=mysql_query($sql);
echo "<select name='regno'> ";
echo "<option value=''></option>";
while($row = mysql_fetch_array($q)) 
{        
echo "<option value='".$row['regno']."'>".$row['regno']."</option>"; 
}
echo "</select>";// Closing of list box 
			?></td>
    </tr>
    <tr>
      <td>ID/Passport number</td>
      <td><input type="text" name="ID" value='<?php echo $ID; ?>' id="ID" /></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input type="text" name="usernm" value='<?php echo $usernm; ?>' id="usernm" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
      <td height="21">Confirm password</td>
      <td><input type="password" name="rpassword" id="cpassword" /></td>
    </tr>
<tr><td></td><td><input type="submit" name="submit" value="register" /></td></tr></table>
</form></fieldset></div></td>
        </tr>
    </table>
</tr>
</table>
<table width="1000" align="center" cellpadding="2" cellspacing="3">
          <tr bgcolor="#D6D6D6">
          <td align="center">&copy;2011 Developed by NanoSoft Technology LTD </td></tr></table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
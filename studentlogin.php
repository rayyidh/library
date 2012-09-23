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
 include 'includes/connect.php';
?>	
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
    <td height="0"><table width="100%" border="0" cellpadding="2" cellspacing="0">
      <tr>
        <td width="196" height="424" align="left" valign="top">
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
        <td width="796" align="left" valign="top">
        
        <table width="485" height="256" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="485" height="235">
            &nbsp;
              <?php
			session_start();
			include 'includes/connect.php';
			error_reporting (E_ALL ^ E_NOTICE); 
			$user = mysql_real_escape_string(strip_tags($_POST['user']));
			$pass = strip_tags($_POST['pass']);
			$submit = $_POST['login'];
	
			if($submit)
			{

				if($user&&$pass)
				{	
					$pass = md5($pass);
				$query = mysql_query("SELECT * FROM studentlogin WHERE user='$user'");
				$numrows = mysql_num_rows($query);
					if($numrows !=0)
					{
						while($row=mysql_fetch_assoc($query))
					{
						$dbusername = $row['user'];
						$dbpassword = $row['password'];
					}
						// check to see if they match
						if($user==$dbusername&&$pass==$dbpassword)
						{
						header('Location: studentpage.php');
						$_SESSION['user']=$dbusername;		
						}
						else
							echo "<font size='+1' color='red'>Incorrect Password</font>";		
					}
					else
						echo "<font size='+1' color='red'>That user doesn't Exist</font>";
			}
			else
			echo "<font size='+1' color='red'>Please Enter the correct username or password</font>";
	}
?>

            <div class="myform">
  <fieldset>
<legend align="center" >Login Form</legend>	
 <?php 
 SESSION_START();
 include 'includes/connect.php';
 error_reporting (E_ALL ^ E_NOTICE);
 if($_SESSION['user'])
 {
	 header('Location: studentpage.php');
	}
	else
	{
		echo "

  <form action='studentlogin.php' method='post'>
  <table width='75%' border='0' cellspacing='0' cellpadding='3' class='altrowstable' id='alternatecolor'>
  <tr><td width='44%'>
    <font size='+1'>&nbsp;&nbsp;Username</font> </td>
    <td width='56%'>        
    <input type='text' name='user' value='$user' /></td></tr>
    <tr><td>
    <font size='+1'>&nbsp; Password </font></td>
    <td>
    <input type='password' name='pass' /></td></tr>
    <tr><td></td><td><input type='submit' name='login' value='  log in  ' align='middle' /></td></tr></table>
	</form>";
	}
	?>
	</fieldset> </div> 
        </p>
            </td>
          </tr>
        </table>
        <p></td>
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
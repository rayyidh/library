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
<table width="1000" border="0" align="center" cellpadding="3" cellspacing="4">
  <tr>
    <td width="214" height="312" align="left" valign="top">&nbsp;</td>
    <td width="730" align="left" valign="top">
	<?php
	include 'includes/connect.php';
	error_reporting (E_ALL  & ~E_NOTICE & ~E_DEPRECATED^E_WARNING); 
	$regnum = $_POST['regno'];
	$studntname = $_POST['stdntname'];
	$year = $_POST['syear'];
	$idp = $_POST['id'];
	$submit =$_POST['submit'];
	if($submit)
	{	
		if($regnum&&$studntname&&$year&&$idp)
		{	
			if (eregi('^([P15]{3}/[0-9]{4,5}/[20]{2}[0-9]{2})', $regnum))
			{
				$query = mysql_query("SELECT * FROM students where regno='$regnum'");
				$numrows = mysql_num_rows($query);
				if(mysql_num_rows($query)!=0)
				{
					echo "<font size='+1' color='red'>The Registration '$regnum' already Exist</font>";
				}
				else
				{
					if (ereg("[A-Za-z]$", $studntname))
					{		
					if (eregi("[0-9]$", $idp))
					{	
						if(strlen($idp)>8||strlen($idp)<6)
							{
						echo "<font size='+1' color='red'>ID/Passport no. Must either between 6 and 8 characters</font>";
							}
							else
						{
					$query1 = mysql_query("SELECT * FROM students where ID_passportno='$idp'");
				$numrows = mysql_num_rows($query11);
				if(mysql_num_rows($query)!=0)
				{
					echo "<font size='+1' color='red'>The ID/Passort number already exist";
				}
				else
				{
				mysql_query("INSERT INTO students (regno,studentname,year,ID_passportno) 
				VALUES ('$regnum','$studntname','$year','$idp')");
				mysql_query("Update students SET state=0 WHERE regno='$regnum'"); 
				echo "<font size='+1' color='green'>User has been added</font>";
				header('Location: student.php');
				}
						}
					}
					else
						echo "<font size='+1' color='red'>Sorry Only Numerical Values are Allowed in ID</font>";
				}
					else 
						echo "<font size='+1' color='red'>Sorry Only text are allowed in Student name</font>";
				}
				}
					else
						echo "<font size='+1' color='red'>Sorry thats not the correct format For Student Reg No</font>";
		}
		else
			echo "<font size='+1' color='red'>Please fill out the form</font>";
	}

?>
<div class="myform">
<fieldset>
<legend>Add Student	
      </legend><form action="addstudent.php" method="post">
      <table border="0" cellpadding="3" cellspacing="4"  class="altrowstable" id="alternatecolor">
          <tr>
            <td width="179"><font size="+1">RegNo</font></td>
            <td width="246"><input type="text" name="regno" value="<?php echo $regnum; ?>" />
              <br />
            (Format[P15/xxxxx/20xx]or [P15/xxxx/20xx])</td>
          </tr>
          <tr>
            <td><font size="+1">Students Name</font></td>
            <td><input type="text" name="stdntname" value="<?php echo $studntname; ?>" /></td>
          </tr>
          <tr>
            <td><font size="+1">Year</font></td>
            <td>   <?php
            echo "<select name=\"syear\">"; 
			echo "<option size =50 ></option>";
            echo "<option value='2000'>2000</option>";
			 echo "<option value='2001'>2001</option>";
			 echo "<option value='2002'>2002</option>";
			 echo "<option value='2003'>2003</option>";
			 echo "<option value='2004'>2004</option>";
			 echo "<option value='2005'>2005</option>";
			 echo "<option value='2006'>2006</option>";
			 echo "<option value='2007'>2007</option>";
			 echo "<option value='2008'>2008</option>";
			 echo "<option value='2009'>2009</option>";
			 echo "<option value='2010'>2010</option>";
			 echo "<option value='2011'>2011</option>";
			 echo "<option value='2012'>2012</option>";
			 echo "<option value='2013'>2013</option>";
			 echo "<option value='2014'>2014</option>";
            echo "</select>";
			// Closing of list box  
			?></td>
          </tr>
          <tr>
            <td><font size="+1">ID/Passport Number</font></td>
            <td><input type="text" name="id" value="<?php echo $idp; ?>"/></td>
          </tr>
       <tr>
            <td></td><td> <input name="submit" type="submit" value="submit" /></td>
          </tr>
        </table>
    </form> </fieldset></div></td>
  </tr>
</table>
<table width="1000" align="center" cellpadding="2" cellspacing="3">
          <tr bgcolor="#D6D6D6">
          <td align="center">&copy;2011 Developed by NanoSoft Technology LTD </td></tr></table>
</body>
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
    <td align="right" valign="top"><table width="1000" border="0" align="left" cellpadding="0" cellspacing="0">
    </table></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="3" cellspacing="4">
  <tr>
    <td width="221" height="389" align="left" valign="top">&nbsp;</td>
    <td width="756" align="left" valign="top">
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
   include 'includes/connect.php';
	error_reporting (E_ALL  & ~E_NOTICE & ~E_DEPRECATED^E_WARNING); 
	$titles = $_POST['title'];
	$students = $_POST['studentname'];
	$syear = $_POST['years'];
	$cat = $_POST['categ'];
	$lev = $_POST['lev'];
	$grade = $_POST['grade'];
	$super = $_POST['superv'];
	$file =$_FILES['file'];
	$submit =$_POST['submit2'];
	$target = "upload/"; 
 	$target = $target . basename( $_FILES['uploaded']['name']) ; 
 	$ok=1; 
 	$pic=($_FILES['uploaded']['name']);
// Retrieve data from database
 include 'includes/connect.php';
$sql=" SELECT * FROM projects WHERE ID='$_GET[id]' && state=0";
$result=mysql_query($sql);

// Start looping rows in mysql database.
while($rows=mysql_fetch_array($result)){
?>
<div id="display">
<table width='1000' border=1 cellpadding='5'>
    <tr>
        <td width="17"><?php echo  $rows[ID]; ?></td>
        <td width="205"><?php echo  $rows[Title]; ?></td>
        <td width="139" align="center"><?php echo  $rows[Student]; ?></td>
        <td width="50" align="center"><?php echo $rows[year]; ?></td>
        <td width="102" align="center"><?php echo $rows[categories]; ?></td>
        <td width="107" align="center"><?php echo $rows[level]; ?></td>
        <td width="125" align="center"><?php echo $rows[Superviser]; ?></td>
        <td width="49" align="center"><?php echo  $rows[grade]; ?></td>
    </tr>
</table>
</div>
<?php
} 
echo "<hr>";
	
	
	$query = mysql_query("SELECT * FROM students WHERE regno='$students'");
	$numrows = mysql_num_rows($query);
	if($submit)
	{
		while($row=mysql_fetch_assoc($query))
					{
						$dbyear = $row['year'];
					} 
		if($titles&&$students&&$syear&&$cat&&$lev&&$super)
		{
			if (ereg("[A-Za-z]", $titles))
			{		   						
				if($syear >= $dbyear+2)
					{
						if($_FILES['uploaded']["type"] =='application/pdf')
						 { 
						 if($_FILES['uploaded']["size"] < 350000 )
						 { 
						 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
						 { 	
						 
$edit="UPDATE projects SET 					Title='$titles',Student='$students',year='$syear',categories='$cat',level='$lev',grade='$grade',Superviser='$super',file='$file' 	WHERE ID='$_GET[id]'";
			$result = mysql_query($edit)  or die(mysql_error);
echo "Thank you! Information updated.\n";
						//Writes the photo to the server 
							//Tells you if its all ok 
 					echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory"; 
						
						 }
 						
 							else 
								 //Gives and error if its not 
 								echo "Sorry, there was a problem uploading your file."; 
						}
					 else
						 	echo "<font color='red' >Sorry the size must not be greater than 350 KB</font>";
				}
						 else
						 	echo "<font color='red' >Sorry only  '.pdf' file is accepted</font>";
					
					}
					else
						echo "Sorry the year must be Greater than 2 years !!!";
			}
			else
				echo "Sorry Only Text are Allowed in Title";	
		}
		
		else
			echo "<font color='red' >Please fill out the form</font>";
			}
	?>
    <div class="myform">
    <fieldset>
	<legend>Edit Project	
      </legend>
	<form action="editproject.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table border="0" cellpadding="3" cellspacing="4">
          <tr>
            <td width="123" height="27">Title</td>
            <td width="362"><textarea name="title" id="title" cols="50" rows="1"></textarea></td>
          </tr>
          <tr>
            <td valign="top">Student</td>
            <td align="left" valign="top">
             <?php 
	$sql="Select regno from students where state=0";
	$q=mysql_query($sql);
	echo "<select name=\"studentname\">"; 
	echo "<option size =50 ></option>";
	while($row = mysql_fetch_array($q)) 
	{        
	echo "<option value='".$row['regno']."'>".$row['regno']."</option>"; 
	}
	echo "</select>";// Closing of list box 
	?></td>
          </tr>
          <tr>
            <td>year</td>
            <td>
            <select name="years">
             <?php
			 echo "<option size =50 ></option>";
for($i=1990;$i<=2035;$i++) {
 echo "<option>$i</option>";
}?></select>
			</td>
          </tr>
          <tr>
            <td>Categories</td>
            <td>
           <?php 
	$sql="Select category from categories";
	$q=mysql_query($sql);
	echo "<select name=\"categ\">"; 
	echo "<option size =50 ></option>";
	while($row = mysql_fetch_array($q)) 
	{        
	echo "<option value='".$row['category']."'>".$row['category']."</option>"; 
	}
	echo "</select>";// Closing of list box 
	?>
          </tr>
          <tr>
            <td valign="top">level </td>
            <td align="left" valign="top">
                  <?php 
	$sql="Select level from level";
	$q=mysql_query($sql);
	echo "<select name=\"lev\">"; 
	echo "<option size =50 ></option>";
	while($row = mysql_fetch_array($q)) 
	{        
	echo "<option value='".$row['level']."'>".$row['level']."</option>"; 
	}
	echo "</select>";// Closing of list box 
	?>
          </tr>
          <tr>
            <td>Grade</td>
            <td valign="top"> 
            <select name="grade">
           <option size =50 ></option>
            <option value='A'>A</option>
			<option value='B'>B</option>
			<option value='C'>C</option>
            <option value='D'>D</option>
			<option value='E'>E</option>
			<option value='E*'>E*</option>
            </select>
			</td>
          </tr>
          <tr>
            <td>Superviser</td>
            <td valign="top"><?php 
	$sql="Select Name from staff";
	$q=mysql_query($sql);
	echo "<select name=\"superv\">"; 
	echo "<option size =50 ></option>";
	while($row = mysql_fetch_array($q)) 
	{        
	echo "<option value='".$row['Name']."'>".$row['Name']."</option>"; 
	}
	echo "</select>";// Closing of list box 
		?></td>
          </tr>
          <tr>
            <td>File</td>
            <td valign="top"><input type="file" name="uploaded" id="file"  />
              <br />
            (.pdf and &lt;350 KB)*</td>
          </tr>
        </table>
       
        <input type="submit" name="submit2" id="submit" value="Submit" />
      </form> </fieldset></div>
    <p></p></td>
  </tr>
</table>
<table width="1000" align="center" cellpadding="2" cellspacing="3">
          <tr bgcolor="#D6D6D6">
          <td align="center">&copy;2011 Developed by NanoSoft Technology LTD </td></tr></table>
</body>
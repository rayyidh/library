<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="javascript/datetimepicker.js"></script>
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
 if($_SESSION['staffuser'])
 {
	 $track =$_SESSION[staffuser];
	 $tr = mysql_query("SELECT *FROM stafflogin WHERE staffuser='$track'");
	while($a = mysql_fetch_array( $tr )) {
		$regtrack=$a[StaffNo];
		//echo " $regtrack";
	}
	}
	else
	{
		echo "you must be logged in";
		header('Location: stafflogin.php');
	}
?>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td><img src="pics/newban1.jpg" width="1000" height="100" alt="" /></td>
    </tr>
        <tr align="left" valign="top">
    <td width="22%" height="0"><table width="1000" border="0" cellspacing="0" cellpadding="0">
       <tr id="menu">
        <td width="147" height="26">
         <ul id="sddm">
	<li><a href="staffpage.php" onmouseover="mopen('m1')" onmouseout="mclosetime()">Home</a>
		<div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
    <td width="142">   <ul id="sddm">
	<li><a href="staffabout.php" onmouseover="mopen('m5')" onmouseout="mclosetime()">About us</a>
		<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
        <td width="139">
        <ul id="sddm">
	<li><a href="#" onmouseover="mopen('m2')" onmouseout="mclosetime()">Activities</a>
		<div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		<a href="staffprojectsearch.php">Projects</a>
		<a href="staffsearchres.php">Research</a>
		</div>
	</li></ul></td>
        <td width="138">
        <ul id="sddm">
	<li><a href="staffforum.php" onmouseover="mopen('m3')" onmouseout="mclosetime()">Forum</a>
		<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
        <td width="148">   <ul id="sddm">
	<li><a href="staffcontact.php" onmouseover="mopen('m4')" onmouseout="mclosetime()">Contact us</a>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
      <td width="135">
        <ul id="sddm">
	<li><a href="staffresourse.php" onmouseover="mopen('m3')" onmouseout="mclosetime()">Resources</a>
		<div id="m6" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
     <td width="151">   <ul id="sddm">
	<li><a href="stafflogout.php" onmouseover="mopen('m5')" onmouseout="mclosetime()">logout</a>
		<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		</div>
	</li></ul></td>
      </tr>
    </table></td>
    </tr>
</table>
<table width="1001" border="0" align="center" cellpadding="3" cellspacing="5">
  <tr>
    <td width="220" height="453" align="left" valign="top">&nbsp;</td>
    <td width="754" align="left" valign="top">
      <?php
	include 'includes/connect.php';
	error_reporting (E_ALL  & ~E_NOTICE & ~E_DEPRECATED^E_WARNING); 
	
	$rstitle = $_POST['restitle'];
	$descr = $_POST['desc'];
	$stdate = $_POST['date'];
	$endate = $_POST['edate'];
	$nam= $_POST['name'];
	$values = $_POST['val'];
	$submit = $_POST['submit3'];
	$target = "upload/"; 
 	$target = $target . basename( $_FILES['uploaded']['name']) ; 
 	$ok=1; 
 	$pic=($_FILES['uploaded']['name']);
	if($submit)
	{
		if($rstitle&&$descr&&$stdate&&$endate&&$nam&&$values&&$pic)
		{	
			if (ereg("[A-Za-z]$", $rstitle))
			{		
				if (ereg("[A-Za-z]$", $descr))
				{		
					if (eregi("[0-9]$", $values && $values>25000))
					{							
						if($endate > $stdate)
						{
							if($_FILES['uploaded']["type"] =='application/pdf')
						 { 
						 if($_FILES['uploaded']["size"] < 350000 )
						 { 
							if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
									 { 
 											
							mysql_query("INSERT INTO research (ID,ResTitle,Description,Start_date,End_date,Name,ValueKSH,file) 
							 VALUES (NULL,'$rstitle','$descr','$stdate','$endate','$nam','$values','$pic')");	
							 mysql_query("Update research SET state=0 WHERE ResTitle='$rstitle'");
								echo "Research has been added<br>";
								//Tells you if its all ok 
								echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory"; 
								header('Location: staffresearch.php');
									
									 } 
 										else 
									 //Gives and error if its not 
									 echo "<font size='+1' color='red'>Sorry, there was a problem uploading your file.</font>"; 
				
						} 
						 else
						 	echo "<font color='red' >Sorry the size must not be greater than 350 KB</font>";
				}
						 else
						 	echo "<font color='red' >Sorry only  '.pdf' file is accepted</font>";
					}
						else
							echo "<font size='+1' color='red'>Sorry Your End date must be Greater than Start date !!!</font>";
					}
					else
					echo "<font size='+1' color='red'>Sorry Only Numerical Values are Allowed in Values and must be greater than 25000</font>";
					
				}
				else
					echo "<font size='+1' color='red'>Sorry Only Text are Allow in Description</font>";
			}
			else
				echo "<font size='+1' color='red'>Sorry Only Text are Allowed in Title</font>";
		}
		else
			echo "<font size='+1' color='red'>Please fill out the form</font>";
	}
?>

<div class="myform">
<fieldset>
<legend>Add Research
      </legend><form action="staffaddresearch.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
        <table border="0" cellpadding="3" cellspacing="4"  class="altrowstable" id="alternatecolor">
          <tr>
            <td width="217">Research Title</td>
            <td width="318"><textarea name="restitle" id="restitle" cols="50" rows="1"><?php echo $rstitle; ?></textarea></td>
          </tr>
          <tr>
            <td valign="top">Description</td>
            <td><textarea name="desc" id="desc" cols="50" rows="4"><?php echo $descr; ?></textarea></td>
          </tr>
          <tr>
            <td>Start Date</td>
            <td>
			<input type="Text" id="demo1" name="date" maxlength="25" size="25" value="<?php echo $stdate; ?>"><a href="javascript:NewCal('demo1','ddmmmyyyy')"><img src="pics/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
          </tr>
          <tr>
            <td>End Date</td>
            <td><input type="Text" id="demo2" name="edate" maxlength="25" size="25" value="<?php echo $endate; ?>"><a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="pics/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
          </tr>
          <tr>
            <td>Name of Researcher</td>
            <td> 
			<?php 
			//Select the Name of the Staff who login from the database
$sql="Select *from staff WHERE StaffNo ='$regtrack'";
$q=mysql_query($sql);
echo "<select name=\"name\">"; 
while($row = mysql_fetch_array($q)) 
{        
echo "<option value='".$row['Name']."'>".$row['Name']."</option>"; 
}
echo "</select>";// Closing of list box 
			mysql_close();?></td>
          </tr>
          <tr>
            <td valign="top">Value(KSH)</td>
            <td valign="top"><input type="text" name="val" value='<?php echo $values; ?>' /></td>
          </tr>
          <tr>
            <td valign="top">File</td>
            <td valign="top"><input type="file" name="uploaded" id="file" value="<?php echo $pic; ?>" />
              <br />
              (.pdf and &lt;350 kb)*</td>
          </tr>   
      <tr><td></td><td>  <input type="submit" name="submit3" id="submit2" value="Submit" /></td></tr></table>
      </form>  </fieldset></div>
    <p></p></td>
  </tr>
</table>
<table width="1000" align="center" cellpadding="2" cellspacing="3">
          <tr bgcolor="#D6D6D6">
          <td align="center">&copy;Developed by NanoSoft Technology LTD 2011</td></tr></table>
</body></html>
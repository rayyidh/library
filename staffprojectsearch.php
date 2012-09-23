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
 if($_SESSION['staffuser'])
 {
	 //echo "welcome";
	//header('Location: studentlogin.php');
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
   <tr>
    <td height="0"><table width="1000" border="0" cellpadding="3" cellspacing="2">
      <tr>
        <td width="17%" height="439" align="left" valign="top">
        <div class="myform">
        <table width="152" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="144" height="54"><a href="staffproject.php">Student Project </a>
              <hr /></td>
          </tr>
          <tr>
            <td height="55"><a href="staffresearch.php">Research Project</a>
              <hr /></td>
          </tr>
        </table>
        </div></td>
      <td width="83%" align="left" valign="top">
      <table cellpadding="2" cellspacing="2" class="altrowstable" id="alternatecolor">
          <tr>
            <td width="787" height="189" align="left">
       <form action="report.php" method="post">
        <p>Year 
          <input type="text" name="term"  value="<?php echo $_POST['term']; ?>"/> 
          AND 
          <input type="text" name="categ" id="categ" value="<?php echo $_POST['categ']; ?>" />
          (by category,Superviser,level)
          <input type="text" name="any" id="textfield" value="<?php echo $_POST['any']; ?>" />
          <input type="submit" name="submit" value="Search" />
       </form></td>
          </tr>
        </table></div>
         <br />
         Project<br />
         <a href="report.php">All Project</a>
<p><br />
    </p></td>
        </tr>
    </table>
</tr>
</table>
<table width="1000" align="center" cellpadding="2" cellspacing="3">
          <tr bgcolor="#D6D6D6">
          <td align="center">
&copy;2011 Developed by NanoSoft Technology LTD </td></tr></table>
</body>
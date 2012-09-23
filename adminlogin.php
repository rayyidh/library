<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<style type="text/css">
@import url(external.css);
</style>
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
<p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="591" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
    <td height="69">
    <div class="myform">
      <fieldset >
        <legend align="center"> admin login</legend>
         <?php
			session_start();
			include 'includes/connect.php';
			error_reporting (E_ALL ^ E_NOTICE); 
	
			$user = mysql_real_escape_string(strip_tags($_POST['user']));
			$pass = strip_tags($_POST['pass']);
			$submit = $_POST['admin'];
			if($submit)
			{
				if($user&&$pass)
				{	
				$query = mysql_query("SELECT * FROM adminlogin WHERE username='$user'");
				$numrows = mysql_num_rows($query);
					if($numrows !=0)
					{
						while($row=mysql_fetch_assoc($query))
					{
						$dbusername = $row['username'];
						$dbpassword = $row['password'];
					}
						// check to see if they match
						if($user==$dbusername&&$pass==$dbpassword)
						{
						
						header('Location: admin.php');	
						$_SESSION['username']=$dbusername;	
						}
						else
							echo "<font size='+1' color='white'>Incorrect Password</font>";		
					}
					else
						echo "<font size='+1' color='white'>That user doesn't Exist</font>";
			}
			else
			echo "<font size='+1' color='black'>Please Enter your username and password</font>";
	}
?>
       
        <?php 
 SESSION_START();
 include 'includes/connect.php';
 error_reporting (E_ALL ^ E_NOTICE);
 if($_SESSION['username'])
 {
	 header('Location: admin.php');
	}
	else
	{
		echo "
 <table width='57%' border='0' align='center' cellpadding='3' cellspacing='0' class='altrowstable' id='alternatecolor'>
          <form action='adminlogin.php' method='post'>
            <tr>
              <td><font size='+1'>&nbsp;&nbsp;Username</font> :</td>
              <td><input type='text' name='user' /></td>
            </tr>
            <tr>
              <td><font size='+1'>&nbsp; Password :</font></td>
              <td><input type='password' name='pass'  /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type='submit' name='admin' value='adminlogin' align='middle' /></td>
            </tr>
          </form> </table>";
	}
	?>
       
      </fieldset>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp; </p></body>
</html>
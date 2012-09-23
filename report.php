<html><head>
<title>Report</title>
<style type="text/css">@import url(external.css);</style>
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
  <table width="1000" height="72" border="0" align="center">
    <tr>
      <td><table border="0" cellspacing="0" cellpadding="5"  class="altrowstable" id="alternatecolor">
        <tr>
          <td width="240"><b>Title</b></td>
          <td width="167"><b>Student name</b></td>
          <td width="81"><b>Year</b></td>
          <td width="95"><b>Categories</b></td>
          <td width="110"><b>Level</b></td>
          <td width="97"><b>Superviser</b></td>
          <td width="124"><b>Grade</b></td>
        </tr>
      </table>
        <?php
// Retrieve data from database
 include 'includes/connect.php';
  error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
	$year = $_POST['term'];
	$categ = $_POST['categ'];
	$any = $_POST['any'];
	$submit=$_POST['submit'];
	if($year&&$categ&&$any){
	$sql = mysql_query("select * FROM projects WHERE year between '$year' AND '$categ' AND categories ='$any' or Superviser ='$any' or  level ='$any'");
	}
	else if($year&&$categ){
	$sql = mysql_query("select * FROM projects WHERE year between '$year' AND '$categ'");
	}
	else if($any){
	$sql = mysql_query("select * FROM projects WHERE categories ='$any' or Superviser ='$any' or level ='$any'");
	}
	else if($year&&$any){
	$sql = mysql_query("select * FROM projects WHERE categories ='$any' or Superviser ='$any' or level ='$any' AND year ='$year'");
	}
	else echo "You have not search for anything";
// Start looping rows in mysql database.
while($rows=mysql_fetch_array($sql)){
?>
        <table border="0" cellspacing="0" cellpadding="5"  class="altrowstable" id="alternatecolor">
          <tr>
            <td width="248"><?php print "<b>$rows[Title]</b>"; ?></td>
            <td width="151"><?php print  "<b>$rows[Student]</b>"; ?></td>
            <td width="84"><?php print "<b>$rows[year]</b>"; ?></td>
            <td width="92"><?php print "<b>$rows[categories]</b>"; ?></td>
            <td width="120"><?php print "<b>$rows[level]</b>"; ?></td>
            <td width="142"><?php print "<b>$rows[Superviser]</b>"; ?></td>
            <td width="77"><?php print  "<b>$rows[grade]</b>"; ?></td>
            <td width="45"><?php echo "<a href='download.php?id=$rows[ID]'><font size='+1' color='black'>view</font> </a>";?></td>
          </tr>
        </table>
        <?php
// close while loop
}
// close connection
mysql_close();
?>
    </tr>
        
        
      </table></td>
    </tr>
  </table>
  <table width="1000" border="0" align="center">
    <tr><td></td>
      <td height="15" align="right"><script Language="Javascript">

function printit(){  
if (window.print) {
    window.print();  
} else {
    var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
    WebBrowser1.ExecWB(6, 2);//Use a 1 vs. a 2 for a prompting dialog box    WebBrowser1.outerHTML = "";  
}
}
</script>

<script Language="Javascript">  
var NS = (navigator.appName == "Netscape");
var VERSION = parseInt(navigator.appVersion);
if (VERSION > 3) {
    document.write('<form><input type=button value="PRINT REPORT" name="Print" onClick="printit()"></form>');        
}
</script></td>
    </tr>
  </table>
</body>
</html>
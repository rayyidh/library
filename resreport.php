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
  <table width="1000" height="78" border="0" align="center">
    <tr>
      <td><table width="1000" border="0" cellspacing="0" cellpadding="5" class="altrowstable" id="alternatecolor">
        <tr>
          <td width="247"><b>Title</b></td>
          <td width="205" align="center"><b>Description</b></td>
          <td width="170"><b>Researchers Name</b></td>
          <td width="104"><b>Start date</b></td>
          <td width="86"><b>End date</b></td>
          <td width="126"><b>Value(ksh)</b></td>
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
	$sql = mysql_query("select * FROM research WHERE End_date between '$year' AND '$categ' AND Name ='$any' or ValueKSH >='$any'");
	}
	else if($year&&$categ){
	$sql = mysql_query("select * FROM research WHERE End_date between '$year' AND '$categ'");
	}
	else if($year){
	$sql = mysql_query("select * FROM research WHERE End_date <='$year'");
	}
	else if($any){
	$sql = mysql_query("select * FROM research WHERE Name ='$any' or ValueKSH >='$any'");
	}
	else if($year&&$any){
	$sql = mysql_query("select * FROM research WHERE End_date <='$year' AND Name ='$any' or ValueKSH >='$any'");
	}
	else echo "You have not search for anything";
// Start looping rows in mysql database.
while($rows=mysql_fetch_array($sql)){
?>
        <table width="1000" border="0" cellspacing="0" cellpadding="5" class="altrowstable" id="alternatecolor">
          <tr>
            <td width="277"><?php print "<b>$rows[ResTitle]</b>"; ?></td>
            <td width="227"><?php print  "<b>$rows[Description]</b>"; ?></td>
            <td width="152"><?php print "<b>$rows[Name]</b>"; ?></td>
            <td width="93"><?php print "<b>$rows[Start_date]</b>"; ?></td>
            <td width="110"><?php print "<b>$rows[End_date]</b>"; ?></td>
            <td width="79"><?php print "<b>$rows[ValueKSH]</b>"; ?></td>
             <td><?php echo "<a href='resdownload.php?id=$rows[ID]'><font size='+1' color='black'>view</font> </a>";?></td>
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
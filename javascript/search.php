<form action="search.php" method="post">
	     Year 
	       <input type="text" name="term" /><br />
	    <input type="submit" name="submit" value="Submit" />
	    </form>

<?php
include '../includes/connect.php';
error_reporting (E_ALL ^ E_NOTICE); 
	$term = $_POST['term'];
	$sql = mysql_query("select * from projects where categories like '%$term%'");
	while ($row = mysql_fetch_array($sql)){
	    echo 'ID: '.$row['ID'];
	    echo '<br/> Student Name: '.$row['Student'];
	    echo '<br/> Year: '.$row['year'];
	    echo '<br/> Categories: '.$row['categories'];
	    echo '<br/><br/>';
	    }

?>
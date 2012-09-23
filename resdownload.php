<title>View pdf Documents</title>
<?php 
 // Connects to your Database 
 include 'includes/connect.php';
 
 //Retrieves data from MySQL 
 $data = mysql_query("SELECT * FROM research Where ID='$_GET[id]'") or die(mysql_error()); 

//Puts it into an array
 while($info = mysql_fetch_assoc( $data )) {
	  //Outputs the image and other data
	   echo "<b>Name:</b> ".$info['ResTitle'] . "<br><hr> ";
	   $bytes= "http://localhost/projects/library/upload/".$info['file']."<br><hr>";
	  
		header('Content-type: application/pdf');

// It will be called downloaded.pdf
//header('Content-Disposition: attachment; filename="$bytes"');

// The PDF source is in original.pdf
readfile("http://localhost/projects/library/upload/".$info['file']);
	    } 
		?> 
        
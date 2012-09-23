<title>View pdf Documents</title>
<?php 
 // Connects to your Database 
 include 'includes/connect.php';
 
 //Retrieves data from MySQL 
 $data = mysql_query("SELECT * FROM projects Where ID='$_GET[id]'") or die(mysql_error()); 

//Puts it into an array
 while($info = mysql_fetch_assoc( $data )) {
	  //Outputs the image and other data
	 //  echo "http://localhost/projects/library/upload/".$info['file'] ."<br>"; Echo "<b>Name:</b> ".$info['ID'] . "<br> ";
// We'll be outputting a PDF
//$byte=$info['file'];
		header('Content-type: application/PDF');

// It will be called downloaded.pdf
//header('Content-Disposition: attachment; filename="$byte"');

// The PDF source is in original.pdf
readfile("http://localhost/projects/library/upload/".$info['file']);

	    } 
		?> 
        
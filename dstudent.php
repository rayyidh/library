<html><head><title>Change Record form</title>

</head>
<body>
<?php
error_reporting (E_ALL ^ E_NOTICE);
 include 'includes/connect.php';
 

$query=" SELECT * FROM students WHERE regno='$_GET[id]'";
$result=mysql_query($query);
 while($info = mysql_fetch_array( $result )) {
mysql_query(" UPDATE students SET state='1' WHERE regno='$_GET[id]'");
header('Location: student.php');
 }
?>

</body>
</html>
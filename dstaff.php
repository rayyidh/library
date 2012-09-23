<html><head><title>Change Record form</title>

</head>
<body>
<?php
error_reporting (E_ALL ^ E_NOTICE);
 include 'includes/connect.php';
 

$query=" SELECT * FROM staff WHERE StaffNo='$_GET[id]'";
$result=mysql_query($query);
 while($info = mysql_fetch_array( $result )) {
mysql_query(" UPDATE staff SET state='1' WHERE StaffNo='$_GET[id]'");
header('Location: staff.php');
 }
?>

</body>
</html>
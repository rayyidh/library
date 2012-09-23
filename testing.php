<html><head><title></title></head>
<body>
<?php
$ud_id=$_POST['ud_id'];
$ud_firstname=$_POST['ud_firstname'];
 include 'includes/connect.php';
mysql_query(" UPDATE projects SET state='$ud_firstname' WHERE ID='$ud_id'");
echo "Record Updated";
?>
</body>
</html>
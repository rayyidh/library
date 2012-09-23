<?php
 include 'includes/connect.php';

$member_id = $_GET['ID'];
$results = mysql_query("select * from projects where id = $member_id");
$row = mysql_fetch_assoc($results);

?>
<html>
<head>
</head>
<body>

<div align="center">
<table width="80%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>Guest 1 <input type="text" value="<? echo $row['guest_1']; ?>" name="guest_1"></td>
    </tr>

</div>
</body>
</html>
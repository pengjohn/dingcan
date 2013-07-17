<?php include 'conn_db_open.php'; ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312">
<Script Language ="JavaScript">
function del_success(){
alert("删除成功！");
self.location='admin_item_add.php';
}

function del_fail(){
alert("删除失败！");
self.location='admin_item_add.php';
}

</Script>

</Head>
<?php
	$itemid = $_GET['itemid'];
 
	//删除套餐
	$sql = "DELETE FROM item WHERE itemid='$itemid'";
	mysql_query($sql, $con);
	//echo "sql error: ".mysql_error()."<br>";
	echo "<br>delete success!<br>";

	echo "<body onload=del_success()>";
	echo "</body>";
?>

</Html>
<?php include 'conn_db_close.php'; ?>
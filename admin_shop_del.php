<?php include 'conn_db_open.php'; ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312">
<Script Language ="JavaScript">
function del_success(){
alert("ɾ���ɹ���");
self.location='admin_shop_add.php';
}

function del_fail(){
alert("ɾ��ʧ�ܣ�");
self.location='admin_shop_add.php';
}

</Script>

</Head>
<?php
	$shop_id = $_GET['shop_id'];
 
	//ɾ���ײ�
	$sql = "DELETE FROM item WHERE shop_id='$shop_id'";
	mysql_query($sql, $con);
	echo "sql: ".mysql_error()."<br>";
	echo "<br>delete success!<br>";
    //ɾ������
	$sql = "DELETE FROM shop WHERE shop_id='$shop_id'";
	mysql_query($sql, $con);
	echo "sql: ".mysql_error()."<br>";
	echo "<br>delete success!<br>";

	echo "<body onload=del_success()>";
	echo "</body>";
?>

</Html>
<?php include 'conn_db_close.php'; ?>
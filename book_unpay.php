<?php include 'conn.php'; ?>
<?php include 'conn_db_open.php'; ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312">
<Script Language ="JavaScript">
function unpay_success(){
alert("取消付款成功！");
self.location='book_today.php';
}
</Script>
</Head>

<?php
		$bookid = $_GET['bookid'];
		
		//增加订单数据
		$sql = "UPDATE book Set bookpay=0 WHERE bookid='$bookid'";
		mysql_query($sql, $con);
		//echo "<br>sql error: ".mysql_error();
		//echo "<br>New success!<br>";
		
		echo "<body onload=unpay_success()>";
		echo "</body>";

?>
</Html>		

<?php include 'conn_db_close.php'; ?>


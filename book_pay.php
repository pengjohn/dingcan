<?php include 'conn.php'; ?>
<?php include 'conn_db_open.php'; ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312">
<Script Language ="JavaScript">
function pay_success(){
alert("����ɹ���");
self.location='book_today.php';
}
</Script>
</Head>

<?php
		$bookid = $_GET['bookid'];
		
		//���Ӷ�������
		$sql = "UPDATE book Set bookpay=1 WHERE bookid='$bookid'";
		mysql_query($sql, $con);
		//echo "<br>sql error: ".mysql_error();
		//echo "<br>New success!<br>";
		
		echo "<body onload=pay_success()>";
		echo "</body>";

?>
</Html>		

<?php include 'conn_db_close.php'; ?>


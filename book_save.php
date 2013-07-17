<?php include 'conn.php'; ?>
<?php include 'conn_db_open.php'; ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312">
<Script Language ="JavaScript">
function book_success(){
alert("恭喜，订餐完成！");
self.location='index.php';
}

function book_timeout(){
alert("今天的订餐时间已过！");
self.location='index.php';
}
</Script>
</Head>

<?php
if( is_timeout() )
{
		echo "<body onload=book_timeout()>";
		echo "</body>";
}
else
{	
		session_start();
		$userid = $_SESSION['userid'];
		$itemid = $_GET['itemid'];
		
		//增加订单数据
		$sql = "INSERT INTO book (bookid, itemid, userid, pay, time) VALUES (NULL, '$itemid', '$userid', 0, NOW())";
		mysql_query($sql, $con);
		//echo "<br>sql error: ".mysql_error();
		//echo "<br>New success!<br>";
		
		//获取套餐价格
		$result=mysql_query("SELECT * FROM item WHERE item.itemid='$itemid'", $con);
		$row = mysql_fetch_array($result);
		//echo "<br>sql error: ".mysql_error();
		//echo "<br>New success!<br>";
		$price = $row['price'];
		
		//增加套餐计数
		$sql = "UPDATE item Set count=count+1 WHERE itemid='$itemid'";
		mysql_query($sql, $con);
		//echo "<br>sql error: ".mysql_error();
		//echo "<br>New success!<br>";
		
		//更新用户的订餐数及费用统计
		$sql = "UPDATE user Set usercount=usercount+1, userprice=userprice+'$price' WHERE userid='$userid'";
		mysql_query($sql, $con);
		//echo "<br>sql error: ".mysql_error();
		//echo "<br>New success!<br>";
		
		//更新用户信息Session
		$result=mysql_query("SELECT * FROM user WHERE userid='$userid'", $con);
		$row = mysql_fetch_array($result);
		$_SESSION['usercount'] = $row['usercount'];
		$_SESSION['userprice'] = $row['userprice'];

		echo "<body onload=book_success()>";
		echo "</body>";
}
?>
</Html>		


<?php include 'conn_db_close.php'; ?>


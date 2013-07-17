<?php include 'conn.php'; ?>
<?php include 'conn_db_open.php'; ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312">
<Script Language ="JavaScript">
function cancel_success(){
alert("取消订餐成功！");
self.location='book_today_user.php';
}

function cancel_fail(){
alert("取消订餐失败！");
self.location='book_today_user.php';
}

function cancel_timeout(){
alert("过了10:30不能取消订餐");
self.location='book_today_user.php';
}
</Script>
</Head>
<?php
if( is_timeout() )
{
	echo "<body onload=cancel_timeout()>";
	echo "</body>";
}
else
{
	session_start();
	$userid = $_SESSION['userid'];
	$bookid = $_GET['bookid'];

	$result=mysql_query("SELECT * FROM book, item WHERE bookid='$bookid' and book.itemid=item.itemid", $con);
	$row = mysql_fetch_array($result);
  $itemid = $row['itemid'];
	$price = $row['price'];
	
  echo "userid:".$userid."<br>";
  echo "bookid:".$bookid."<br>";
  echo "itemid:".$itemid."<br>";
  echo "price:".$price."<br>";
  
	//删除订单
	$sql = "DELETE FROM book WHERE bookid='$bookid' and userid='$userid'";
	mysql_query($sql, $con);
	//echo "sql error: ".mysql_error()."<br>";
	echo "<br>delete success!<br>";
	
	//减少套餐计数

	$sql = "UPDATE item Set count=count-1 WHERE itemid='$itemid'";
	mysql_query($sql, $con);
	//echo "<br>sql error: ".mysql_error();
	//echo "<br>New success!<br>";
	
	//更新用户的订餐数及费用统计
	$sql = "UPDATE user Set usercount=usercount-1, userprice=userprice-'$price' WHERE userid='$userid'";
	mysql_query($sql, $con);
	//echo "<br>sql error: ".mysql_error();
	//echo "<br>New success!<br>";
	
	//更新用户信息Session
	$result=mysql_query("SELECT * FROM user WHERE userid='$userid'", $con);
	$row = mysql_fetch_array($result);
	$_SESSION['usercount'] = $row['usercount'];
	$_SESSION['userprice'] = $row['userprice'];
	
	
	echo "<body onload=cancel_success()>";
	echo "</body>";
}
?>

</Html>
<?php include 'conn_db_close.php'; ?>
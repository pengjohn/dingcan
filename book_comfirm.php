<?php include 'conn.php'; ?>
<?php include 'conn_db_open.php'; ?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 3.0">
<title>Gozone订餐系统</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php
$itemid = $_GET['itemid'];
session_start();
if($_SESSION['username'] =="")
{
	echo "请先登录";
}
else
{
	if( is_timeout() )
	{
		echo "今天的订餐时间已过，请在10:30前订餐";
	}
	else
	{
	  $result=mysql_query("SELECT * FROM item, shop WHERE shop.shop_id=item.shop_id and item.itemid='$itemid'", $con);
	  $row = mysql_fetch_array($result);
	  echo "你要订的餐是：<br>";
	  echo "-------------------------<br>";
	  echo $row['shop_name']."<br>";
	  echo $row['title']."<br>";
	  echo "价格：".$row['price']."<br>";
	  echo "-------------------------<br>";
	  echo "<a href=book_save.php?itemid=".$itemid."><big>确认订餐</big></a>";
	}
}
?>
<br><br><br><br>
<a href=index.php>返回</a>
</body>
</html>
<?php include 'conn_db_close.php'; ?>
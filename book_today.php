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
今日统计<br>

<?php
$result=mysql_query("SELECT * FROM item, shop,user,book WHERE shop.shop_id=item.shop_id and book.itemid=item.itemid and book.userid=user.userid and date(book.time)=curdate() order by item.shop_id, item.category, item.itemid", $con);
$num_rows = mysql_num_rows($result);

$index = 1;
$shop_id = -1;
$category = "";
$totol_price = 0;
while($row = mysql_fetch_array($result))
{
	 if($row['shop_id'] != $shop)
	 {
	 	if($totol_price > 0)
	 		echo "　合计：".$totol_price."<br>";
	 	$shop = $row['shop_id'];
	 	echo "<br>-----------------------[".$row['shop_name'].",".$row['shop_phone']."]-----------------------<br>";
	 	$totol_price = 0;
	 }
	 if($row['category'] != $category)
	 {
	 	$category = $row['category'];
	 	echo "　　[".$row['category']."]<br>";
	 }
	 echo "　　　　".$row['title']."[".$row['price']."元]";
	 echo $row['username'];
	 if($row['bookpay'] == 0)
	   echo ", <font color=red>未付款</font>";
	 else
	   echo ", <font color=green>已付款</font>";

	 if(is_admin())
	 {
		 if($row['bookpay'] == 0)
		   echo "[<a href=book_pay.php?bookid=".$row['bookid'].">付款</a>]";
		 else
		   echo "[<a href=book_unpay.php?bookid=".$row['bookid'].">取消付款</a>]";
	 }
	   
	 echo "<br>";
   $index = $index+1;
   $totol_price = $totol_price + $row['price'];
}
echo "　合计：".$totol_price."<br><br>";
echo "[<a href=index.php>返回</a>]<br>";
?>

</body>
</html>
<?php include 'conn_db_close.php'; ?>
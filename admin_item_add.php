<?php include 'conn_db_open.php'; ?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 3.0">
<title>Gozone订餐系统</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<br>管理 -> 套餐 -> 添加<br><br><br>
<form method="POST" action="admin_item_save.php">
<input type="hidden" name=action value="new">

	<table border="0" cellspacing="1" width=800>
		<tr>
			<td align="right" height="30">店名</td>
			<td height="30">
				<select name="shop_id" size="1">
					<?php
					$result=mysql_query("SELECT * FROM shop order by shop_id", $con);
					$num_rows = mysql_num_rows($result);
					
					while($row = mysql_fetch_array($result))
					{
						echo "<option value=".$row['shop_id']."> ".$row['shop_name']." </option>";
					}
					?>
				</select>
			</td>
		</tr>			
		<tr>
			<td align="right" height="30">类别名(系列)</td>
			<td height="30"><input type="text" name="category" size="32"></td>
		</tr>
		<tr>
			<td align="right" height="30">套餐名</td>
			<td height="30"><input type="text" name="title" size="32"></td>
		</tr>
		<tr>
			<td align="right" height="30">价格</td>
			<td height="30"><input type="text" name="price" size="10"></td>
		</tr>	
		<tr>
			<td align="right" height="30"></td>
			<td height="30">
		  	<input type="submit" value=" 添 加 " name="cmdok"style="background-color: rgb(0,0,0); color: rgb(255,255,255); border: 1px dotted rgb(255,255,255)">&nbsp;
  			<input type="reset" value=" 清 除 " name="cmdcancel" style="background-color: rgb(0,0,0); color: rgb(255,255,255); border: 1px dotted rgb(255,255,255)"></p>
			</td>
		</tr>	
		
	</table>


<?php
$result=mysql_query("SELECT * FROM item, shop WHERE shop.shop_id=item.shop_id order by item.shop_id, item.category", $con);
$num_rows = mysql_num_rows($result);

$index = 1;
$shop_id = -1;
$category = "";
while($row = mysql_fetch_array($result))
{
	 if($row['shop_id'] != $shop)
	 {
	 	$shop = $row['shop_id'];
	 	echo "<br>-----------------------[".$row['shop_name'].",".$row['shop_phone']."]-----------------------<br>";
	 }
	 if($row['category'] != $category)
	 {
	 	$category = $row['category'];
	 	echo "　　[".$row['category']."]<br>";
	 }
	 echo "　　　　";
	 echo "[<a href=admin_item_edit.php?itemid=".$row['itemid'].">修改</a>]";
	 echo "[<a href=admin_item_del.php?itemid=".$row['itemid'].">删除</a>]";
	 echo $row['title']."[".$row['price']."元]";
	 echo "<br>";
   $index = $index+1;
}
?>

</body>
</html>
<?php include 'conn_db_close.php'; ?>
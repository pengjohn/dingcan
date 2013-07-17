<?php include 'conn_db_open.php'; ?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 3.0">
<title>Gozone订餐系统</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
$itemid = $_GET['itemid'];
$result=mysql_query("SELECT * FROM item, shop WHERE itemid='$itemid' and shop.shop_id=item.shop_id", $con);
$row = mysql_fetch_array($result);
$shop_id = $row['shop_id'];
$shop_name = $row['shop_name'];
$category = $row['category'];
$title = $row['title'];
$price = $row['price'];

?>

<body>
<br>管理 -> 套餐 -> 修改<br><br><br>
<form method="POST" action="admin_item_save.php">
<input type="hidden" name=itemid value=<?php echo $itemid; ?>>
<input type="hidden" name=action value="edit">

	<table border="0" cellspacing="1" width=800>
		<tr>
			<td align="right" height="30">店名</td>
			<td height="30">
				<select name="shop_id" size="1">
					<?php
					echo "<option value=".$shop_id." selected> ".$shop_name." </option>\n";

					$result=mysql_query("SELECT * FROM shop order by shop_id", $con);
					while($row = mysql_fetch_array($result))
					{
						echo "<option value=".$row['shop_id']."> ".$row['shop_name']." </option>\n";
					}
					?>
				</select>
			</td>
		</tr>			
		<tr>
			<td align="right" height="30">类别名(系列)</td>
			<td height="30"><input type="text" name="category" size="32" value="<?php echo $category; ?>"></td>
		</tr>
		<tr>
			<td align="right" height="30">套餐名</td>
			<td height="30"><input type="text" name="title" size="32" value="<?php echo $title; ?>"></td>
		</tr>
		<tr>
			<td align="right" height="30">价格</td>
			<td height="30"><input type="text" name="price" size="10" value="<?php echo $price; ?>"></td>
		</tr>	
		<tr>
			<td align="right" height="30"></td>
			<td height="30">
		  	<input type="submit" value=" 修 改 " name="cmdok"style="background-color: rgb(0,0,0); color: rgb(255,255,255); border: 1px dotted rgb(255,255,255)">&nbsp;
			</td>
		</tr>	
		
	</table>

</body>
</html>
<?php include 'conn_db_close.php'; ?>
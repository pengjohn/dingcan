<?php include 'conn_db_open.php'; ?>
<html>

<?php
$shop_id = $_GET['shop_id'];
$result=mysql_query("SELECT * FROM shop WHERE shop_id='$shop_id'", $con);
$row = mysql_fetch_array($result);
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 3.0">
<title>Gozone订餐系统</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<br>管理 -> 餐馆 -> 修改<br><br><br>
<form method="POST" action="admin_shop_save.php">
<input type="hidden" name=shop_id value=<?php echo $shop_id; ?>>
<input type="hidden" name=action value="edit">
	<table border="0" cellspacing="1" width=800>
		<tr>
			<td align="right" height="30">店名</td>
			<td height="30"><input type="text" name="shop_name" size="32" value="<?php echo $row['shop_name']; ?>"></td>
		</tr>
		<tr>
			<td align="right" height="30">电话</td>
			<td height="30"><input type="text" name="shop_phone" size="32" value="<?php echo $row['shop_phone']; ?>"></td>
		</tr>
		<tr>
			<td align="right" height="30">地址</td>
			<td height="30"><input type="text" name="shop_address" size="32" value="<?php echo $row['shop_address']; ?>"></td>
		</tr>
		<tr>
			<td align="right" height="30">网上联系方式</td>
			<td height="30"><input type="text" name="shop_im" size="32" value="<?php echo $row['shop_im']; ?>"></td>
		</tr>
		<tr>
			<td align="right" height="30"></td>
			<td height="30">
		  	<input type="submit" value=" 修 改 " name="cmdok"style="background-color: rgb(0,0,0); color: rgb(255,255,255); border: 1px dotted rgb(255,255,255)">&nbsp;
			</td>
		</tr>		
	</table>
</form>

</body>
</html>
<?php include 'conn_db_close.php'; ?>
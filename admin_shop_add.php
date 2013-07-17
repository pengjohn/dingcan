<?php include 'conn_db_open.php'; ?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 3.0">
<title>Gozone订餐系统</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<br>管理 -> 餐馆 -> 添加<br><br><br>
<form method="POST" action="admin_shop_save.php">
<input type="hidden" name=action value="new">
	<table border="0" cellspacing="1" width=800>
		<tr>
			<td align="right" height="30">店名</td>
			<td height="30"><input type="text" name="shop_name" size="32"></td>
		</tr>
		<tr>
			<td align="right" height="30">电话</td>
			<td height="30"><input type="text" name="shop_phone" size="32"></td>
		</tr>
		<tr>
			<td align="right" height="30">地址</td>
			<td height="30"><input type="text" name="shop_address" size="32"></td>
		</tr>
		<tr>
			<td align="right" height="30">网上联系方式</td>
			<td height="30"><input type="text" name="shop_im" size="32"></td>
		</tr>
		<tr>
			<td align="right" height="30"></td>
			<td height="30">
		  	<input type="submit" value=" 添 加 " name="cmdok"style="background-color: rgb(0,0,0); color: rgb(255,255,255); border: 1px dotted rgb(255,255,255)">&nbsp;
  			<input type="reset" value=" 清 除 " name="cmdcancel" style="background-color: rgb(0,0,0); color: rgb(255,255,255); border: 1px dotted rgb(255,255,255)"></p>	
			</td>
		</tr>		
	</table>
</form>
<?php
$result=mysql_query("SELECT * FROM shop order by shop_id", $con);
$num_rows = mysql_num_rows($result);

$index = 1;
$shop = -1;
while($row = mysql_fetch_array($result))
{
	 echo $row['shop_id'].". ".$row['shop_name']." [".$row['shop_phone']."][<a href=admin_shop_edit.php?shop_id=".$row['shop_id'].">修改</a>]<br>";
   $index = $index+1;
}
?>

</body>
</html>
<?php include 'conn_db_close.php'; ?>
<?php include 'conn_db_open.php'; ?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 3.0">
<title>Gozone订餐系统</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
Gozone订餐系统<br>
<?php
session_start();

//如果SESSION为空 且 COOKIE不为空，说明是刚打开浏览器，则根据cookie自动登录
$cookiename = $_COOKIE['username'];
if($_SESSION['username']=="" && $cookiename!="" )
{
	$result=mysql_query("SELECT * FROM user WHERE username='$cookiename'", $con);
	$row = mysql_fetch_array($result);
  $_SESSION['userid'] = $row['userid'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['userlevel'] = $row['userlevel'];
	$_SESSION['usercount'] = $row['usercount'];
	$_SESSION['userprice'] = $row['userprice'];
}

//显示用户信息
if($_SESSION['username'] =="")
{ 
	echo "[<a href=user.php>登录</a>]　　[<a href=user_registe.php>注册</a>]<br><br>";
}
else
{
  echo "用户:".$_SESSION['username']."　　[<a href=user_logout.php>登出</a>]<br>";
  //echo "id:".$_SESSION['userid']."<br>";
  echo "订餐次数:".$_SESSION['usercount']."<br>";
  echo "订餐花费:".$_SESSION['userprice']."<br>";
  	echo "[<a href=book_today_user.php>我的今日订餐</a>]<br>";

  if($_SESSION['userlevel'] >=10)
  {
  	echo "[<a href=admin_shop_add.php>店铺管理</a>]<br>";
  	echo "[<a href=admin_item_add.php>套餐管理</a>]<br>";
  	echo "[人员管理(暂缺)]<br>";
  }
}
?>

<a href=book_today.php>今日订餐统计</a><br>

<!-- 显示倒计时 start-->
<form name="form_timer">  
<div align="center" align="center"> 
<input type="textarea" name="left" size="35" style="text-align: center; color:#FF0000; font-size:24px">
</div>  
</form>  
<script LANGUAGE="javascript">  
startclock()  
var timerID = null;  
var timerRunning = false;  
function showtime() {  
Today = new Date();  
var NowHour = Today.getHours();  
var NowMinute = Today.getMinutes();  
var NowMonth = Today.getMonth();  
var NowDate = Today.getDate();  
var NowYear = Today.getYear();  
var NowSecond = Today.getSeconds();  
if (NowYear <2000)  
NowYear=1900+NowYear;  
Today = null;  
Hourleft = 10 - NowHour  
Minuteleft = 30 - NowMinute  
Secondleft = 0 - NowSecond  
Yearleft = 2020 - NowYear  
Monthleft = 12 - NowMonth - 1
Dateleft = 31 - NowDate  
if (Secondleft<0)  
{  
Secondleft=60+Secondleft;  
Minuteleft=Minuteleft-1;  
}  
if (Minuteleft<0)  
{   
Minuteleft=60+Minuteleft;  
Hourleft=Hourleft-1;  
}  
if (Hourleft<0)  
{  
Hourleft=24+Hourleft;  
Dateleft=Dateleft-1;  
}  
if (Dateleft<0)  
{  
Dateleft=31+Dateleft;  
Monthleft=Monthleft-1;  
}  
if (Monthleft<0)  
{  
Monthleft=12+Monthleft;  
Yearleft=Yearleft-1;  
}  

//Temp=Yearleft+'年, '+Monthleft+'月, '+Dateleft+'天, '+Hourleft+'小时, '+Minuteleft+'分, '+Secondleft+'秒'
TimeRemain = Hourleft*3600+Minuteleft*60+Secondleft
if(TimeRemain >=(10*60*60+30*60) )
{
	Temp='今天的订餐时间已过'
}
else
{
	Temp='距离订餐截止还剩:'
	if(Hourleft<10)
		Temp=Temp+'0'+Hourleft+':'
	else
		Temp=Temp+Hourleft+':'
	
	if(Minuteleft<10)
		Temp=Temp+'0'+Minuteleft+':'
	else
		Temp=Temp+Minuteleft+':'

	if(Secondleft<10)
		Temp=Temp+'0'+Secondleft
	else
		Temp=Temp+Secondleft		
}

document.form_timer.left.value=Temp;  
timerID = setTimeout("showtime()",1000);  
timerRunning = true;  
}  
var timerID = null;  
var timerRunning = false;  
function stopclock () {  
if(timerRunning)  
clearTimeout(timerID);  
timerRunning = false;  
}  
function startclock () {  
stopclock();  
showtime();  
}  
</script>
<!-- 显示倒计时 end-->

<?php
$result=mysql_query("SELECT * FROM item, shop WHERE shop.shop_id=item.shop_id order by item.shop_id, item.category, item.itemid", $con);
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
	 echo "　　　　".$row['title']."[<a href=book_comfirm.php?itemid=".$row['itemid'].">".$row['price']."元</a>]";
	 //显示累计订餐系统
	 //echo "[累计订餐：".$row['count']."]";
	 echo "<br>";
   $index = $index+1;
}
?>

</body>
</html>
<?php include 'conn_db_close.php'; ?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 3.0">
<title>Gozone订餐系统</title>
<link rel="stylesheet" type="text/css" href="style.css">

<SCRIPT LANGUAGE="JavaScript">  
<!--  
function check()  
{  
if (document.form1.name.value=="")
	{
	alert("用户名不能为空");  
	return false;  
	}

if (document.form1.password.value=="")
	{
	alert("密码不能为空");  
	return false;  
	}
	
}  
//-->  
</SCRIPT>  

</head>

<body>
<br>注册用户<br><br>
<form name="form1" method="POST" action="user_save.php">
<input type="hidden" name=action value="new">
<div>
	<table border="0" cellspacing="1" width=400>
		<tr>
			<td align="right" height="30" width=100>用户名</td>
			<td height="30"><input type="text" name="name" size="16"> *请使用中文全称</td>
		</tr>
		<tr>
			<td align="right" height="30">密码</td>
			<td height="30"><input type="password" name="password" size="16"></td>
		</tr>
		<tr>
			<td align="right"><a href=user.php>登录</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type="submit" value=" 注 册 " onclick="return check()" name="cmdok" style="background-color: rgb(0,0,0); color: rgb(255,255,255); border: 1px dotted rgb(255,255,255)"></td>
		</tr>
	</table>
</div>
</form>

</body>
</html>

<?php include 'conn_db_open.php'; ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312">
<Script Language ="JavaScript">
function new_success(){
alert("ע��ɹ���");
self.location='index.php';
}

function new_fail(){
alert("ע��ʧ��, ���˺��ѱ�ע�ᣡ");
self.location='user_registe.php';
}

function edit_success(){
alert("�޸ĳɹ���");
self.location='index.php';
}

function edit_fail(){
alert("�޸ĳɹ���");
self.location='index.php';
}

</Script>

</Head>

<?php
session_start();
$id = $_POST['id'];
$name = $_POST['name'];
$password = md5($_POST['password']);
$passwordOld = md5($_POST['passwordOld']);
$action = $_POST['action'];
		
//echo "<br>id:".$id;
//echo "<br>name:".$name;
//echo "<br>password:".$password;
//echo "<br>passwordOld:".$passwordOld;
//echo "<br>action:".$action;

if($action == "new")
{
		$result=mysql_query("SELECT * FROM user WHERE username='$name'", $con);
		$num_rows = mysql_num_rows($result);
		
		if($num_rows >=1)
		{
			//�˺��ѱ�ע��
			echo "<body onload=new_fail()>";
			echo "</body>";
		}
		else
		{
			//ע���˺�
	    $sql = "INSERT INTO user (userid, username, userpassword, userlevel, usercount, userprice) VALUES (NULL, '$name', '$password', 0, 0, 0)";
	    mysql_query($sql, $con);
	    //echo "sql error: ".mysql_error()."<br>";

      //ֱ�ӵ�¼�˺�
			$result=mysql_query("SELECT * FROM user WHERE username='$name'", $con);
			$row = mysql_fetch_array($result);
		  $_SESSION['userid'] = $row['userid'];
			$_SESSION['username'] = $row['username'];
			setcookie("username", $_SESSION['username'], time()+60*60*24*365); 
			$_SESSION['userlevel'] = $row['userlevel'];
	  	$_SESSION['usercount'] = $row['usercount'];
	  	$_SESSION['userprice'] = $row['userprice'];
	  
			echo "<body onload=new_success()>";
			echo "</body>";
		}
    
}
else if($action == "edit")
{
    echo "<br>goto edit";
    $sql = "UPDATE user Set password='$password' WHERE id='$id'";
    mysql_query($sql, $con);
    //echo "sql error: ".mysql_error()."<br>";
    echo "<br>Update success!<br><br>";
//    echo "<a href=user.php>Back</a>";
}
?>

</Html>					

<?php include 'conn_db_close.php'; ?>


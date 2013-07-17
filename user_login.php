<?php include 'conn_db_open.php'; ?>

<?php
session_start();

$name = $_POST['name'];
$password = md5($_POST['password']);
		
echo "<br>name:".$name;
echo "<br>password:".$password;

$result=mysql_query("SELECT * FROM user WHERE username='$name'", $con);
//echo "<br>sql error: ".mysql_error()."<br>";
$num_rows = mysql_num_rows($result);
if($num_rows >=1)
{
  $row = mysql_fetch_array($result);
	if($row['userpassword'] == $password)
	{
	  $_SESSION['userid'] = $row['userid'];
		$_SESSION['username'] = $row['username'];
		setcookie("username", $_SESSION['username'], time()+60*60*24*365); 
		$_SESSION['userlevel'] = $row['userlevel'];
	  $_SESSION['usercount'] = $row['usercount'];
	  $_SESSION['userprice'] = $row['userprice'];
	
	  echo "<br>userid:".$_SESSION['userid'];
	  echo "<br>username:".$_SESSION['username'];
	  echo "<br>userlevel:".$_SESSION['userlevel'];
	  echo "<br>userexp:".$_SESSION['userexp'];
	  header("Location: index.php");
	}
	else
	{
		echo "password error!";		
	}

}
else
{
	echo "username invalid!";
}
?>

<?php include 'conn_db_close.php'; ?>


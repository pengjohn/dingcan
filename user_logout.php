<?php
session_start();

$_SESSION['userid'] = "";
$_SESSION['username'] = "";
setcookie("username", "", time()-1);
$_SESSION['userlevel'] = "";
$_SESSION['usercount'] = "";
$_SESSION['userprice'] = "";

header("Location: index.php");
?>


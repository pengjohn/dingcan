<?php include 'conn_db_open.php'; ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312">
<Script Language ="JavaScript">
function new_success(){
alert("添加成功！");
self.location='admin_shop_add.php';
}

function edit_success(){
alert("修改成功！");
self.location='admin_shop_add.php';
}

</Script>

</Head>

<?php
$action = $_POST['action'];
$shop_id = $_POST['shop_id'];
$shop_name = $_POST['shop_name'];
$shop_phone = $_POST['shop_phone'];
$shop_address = $_POST['shop_address'];
$shop_im = $_POST['shop_im'];

//echo $shop_id."<br>";
//echo $shop_name."<br>";
//echo $shop_phone."<br>";
//echo $shop_address."<br>";
//echo $shop_im."<br>";

if($action == "new")
{
    echo "<br>goto new";
    $sql = "INSERT INTO shop (shop_id, shop_name, shop_phone, shop_address, shop_im) VALUES (NULL, '$shop_name', '$shop_phone', '$shop_address', '$shop_im')";
    mysql_query($sql, $con);
    //echo "<br>sql error: ".mysql_error();
    echo "<br>New success!<br>";

		echo "<body onload=new_success()>";
		echo "</body>";    
}
else if($action == "edit")
{
    echo "<br>goto edit";
    $sql = "UPDATE shop Set shop_name='$shop_name', shop_phone='$shop_phone', shop_address='$shop_address', shop_im='$shop_im' WHERE shop_id='$shop_id'";
    mysql_query($sql, $con);
    //echo "<br>sql error: ".mysql_error();
    echo "<br>Edit success!<br>";

		echo "<body onload=edit_success()>";
		echo "</body>";    

}
?>
</Html>
<?php include 'conn_db_close.php'; ?>


<?php include 'conn_db_open.php'; ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312">
<Script Language ="JavaScript">
function new_success()
{
	alert("添加成功！");
	self.location='admin_item_add.php';
}

function edit_success()
{
	alert("修改成功！");
	self.location='admin_item_add.php';
}

</Script>

</Head>

<?php
$action = $_POST['action'];
$itemid = $_POST['itemid'];
$shop_id = $_POST['shop_id'];
$category = $_POST['category'];
$title = $_POST['title'];
$price = $_POST['price'];

if($action == "new")
{
    echo "<br>goto new";
    $sql = "INSERT INTO item (itemid, shop_id, category, title, price, count) VALUES (NULL, '$shop_id', '$category', '$title', '$price', 0)";
    mysql_query($sql, $con);
    //echo "<br>sql error: ".mysql_error();
    echo "<br>New success!<br>";

		echo "<body onload=new_success()>";
		echo "</body>";    
}
else if($action == "edit")
{
    echo "<br>goto edit";
    $sql = "UPDATE item Set shop_id='$shop_id', category='$category', title='$title', price='$price' WHERE itemid='$itemid'";
    mysql_query($sql, $con);
    //echo "<br>sql error: ".mysql_error();
    echo "<br>Edit success!<br>";

		echo "<body onload=edit_success()>";
		echo "</body>";
}
?>
</Html>
<?php include 'conn_db_close.php'; ?>

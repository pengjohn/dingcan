<?php include 'conn_db_open.php'; ?>
<?php
$wechatObj = new wechatCallbackapiTest();
$wechatObj->CreateDB();
//$wechatObj->InsertDB();

class wechatCallbackapiTest
{	
	public function CreateDB()
	{
		echo "CreateDB...<br>";

		$sql = "CREATE TABLE shop
		(
   			shop_id int NOT NULL AUTO_INCREMENT, 
  			PRIMARY KEY(shop_id),
        shop_name varchar(32),
        shop_phone varchar(64),
        shop_address varchar(32),
        shop_im varchar(64)
		)";

		mysql_query($sql,$con);
		echo "sql error: ".mysql_error()."<br>";
		mysql_close($con);

    return $contentStr;		
	}
	

 
}

?>
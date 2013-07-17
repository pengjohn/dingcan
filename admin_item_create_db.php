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
		$sql = "CREATE TABLE item
		(
   			itemid int NOT NULL AUTO_INCREMENT, 
  			PRIMARY KEY(itemid),
  			shop_id int,
        category varchar(32),
        title varchar(255),
        price int,
        count int
		)";

		mysql_query($sql,$con);
		echo "sql error: ".mysql_error()."<br>";
		mysql_close($con);

    return $contentStr;		
	}
	

}

?>
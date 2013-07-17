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
		$sql = "CREATE TABLE book
		(
   			bookid int NOT NULL AUTO_INCREMENT, 
  			PRIMARY KEY(bookid),
        itemid int,
        userid int,
        bookpay int,
        time datetime
 		)";
		mysql_query($sql,$con);
		echo "sql error: ".mysql_error()."<br>";
		mysql_close($con);

    return $contentStr;		
	}
	

}

?>
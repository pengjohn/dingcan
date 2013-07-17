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
		$sql = "CREATE TABLE user
		(
   			userid int NOT NULL AUTO_INCREMENT, 
  			PRIMARY KEY(userid),
        username varchar(32),
        userpassword varchar(100),
        userphone varchar(64),
        userlevel int,
        usercount int,
        userprice int
 		)";
		mysql_query($sql,$con);
		echo "sql error: ".mysql_error()."<br>";
		mysql_close($con);

    return $contentStr;		
	}
	

}

?>
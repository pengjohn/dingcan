<?php include 'conn_db_define.php'; ?>
<?php
   $con = mysql_connect(SQL_SERVER,SQL_USER,SQL_PWD);
    if (!$con)
    {
      die('Could not connect: ' . mysql_error());
    }
    mysql_query("set names utf8");
    mysql_select_db(SQL_DB, $con);
?>
   
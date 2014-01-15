<?php

$host="mysql13.000webhost.com"; // Host name 
$username="a7561422_root"; // Mysql username 
$password="tubedau7"; // Mysql password 
$db_name="a7561422_dtube"; // Database name 


// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$set_path="http://www.daut.netai.net/admin_davv_tube/";
$user_template_path="http://www.daut.netai.net/";
?>
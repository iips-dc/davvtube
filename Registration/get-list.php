<?php
include("../commonVar.php");
require_once "json-util.php";
if(!empty($_GET['getlist']))
{
    $list = $_GET['getlist'];
    $qry='';
    switch($list)
    {
        case 'country':
        {
            $qry = "select country from countries";
            break;
        }
	case 'category':
	{
	    $qry = "select dept_name from department";
	    break;
	}
	case 'user':
	{
	    $qry = "select name from emp";
	    break;
	}
    }
    /*
    Note: Why not send  the table name itself as the 'getlist'
    param (avoiding the switch above)?
    Because it is dangerous! that will enable anyone your database!
    */
    if(empty($qry)){ echo "invalid params! "; exit; }
    
    $dbconn = mysql_connect($dbhost,$dbuser,$dbpassword) 
            or die("DB login failed!");
    
    mysql_select_db($databaseName, $dbconn) 
            or die("Database does not exist! ".mysql_error($dbconn));
    
    $result = mysql_query($qry,$dbconn)
            or die("Query $qry failed! ".mysql_error($dbconn));
    
    $rows = array();
        
    while($rec = mysql_fetch_assoc($result)) 
    {
        $rows[] = $rec;
    }
    mysql_free_result($result);
    mysql_close($dbconn);
    
    echo json_encode($rows);
}
?>

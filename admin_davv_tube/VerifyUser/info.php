<?php
$e= $_POST['email'];
// Set id and email
$i = $_POST['id'];
$opration=$_POST['action'];
include("config.php");
// $db = new MySqli('localhost', 'root', '', 'sbadmin');
// Genetrate unique password
 $unique = uniqid(); # 13 characters
 $sevenPairs = array_map('hexdec', str_split($unique, 2));
 printf("Unique ID: %s\nSeven Pairs (digits): %s\n"
        , $unique, implode(', ', $sevenPairs));
//Set information for mail
 $to      = $_POST['email'];
$subject = 'DAVV TUBE no reply';
$msg="Please send correct information";
$message = 'Hello ,Your username and password are given below, you can login in DAVV-Tube using given details .Change your password after login \n Username='.$e.' and Password = '.$unique;
$headers = 'From: davvtube@gmail.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
switch($opration){
			
		case 'allow':
				        $students = $db->query("UPDATE student SET status=1 WHERE id='$i'");
                                       $allow = $db->query("INSERT INTO user(u_name,psw) VALUES ('$e','$unique')");
                                      //Sent mail
                                      mail($to, $subject, $message, $headers);
			   		break;
				  
		case 'deny':
		  // Set Status
              
               $students = $db->query("UPDATE student SET status=2 WHERE id='$i'");
                           mail($to, $subject, $msg, $headers);
			   break;
		
		
		

	}
echo "hello".$_POST['email'];





//Sent mail
//mail($to, $subject, $message, $headers);

//Onsucess display message
// echo"Message is send Successfully";

//After displaying the success message the admin is redirected to the back after 5 seconds
$headr="refresh:10; url=".$host.$folderName."/admin_davv_tube/VerifyUser/verification.php";
 header($headr); 
 
// without wait
//header('Location: http://localhost/rahul/rahul/KO-Database/Copy%20of%20TodoDatabase.html');
?>
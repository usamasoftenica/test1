<?php
/**
 * Created by PhpStorm.
 * User: Umar Shahzad
 * Date: 8/21/2017
 * Time: 3:00 PM
 */
//session_start();
//error_reporting(E_ALL);
//$file_url = dirname(__FILE__);
//$base_url=(isset($_SERVER['HTTPS']) && ('on' == strtolower($_SERVER['HTTPS']) || 1 == strtolower($_SERVER['HTTPS']))) || (isset($_SERVER['SERVER_PORT']) && ( '443' == $_SERVER['SERVER_PORT'] ))?'https://'.$_SERVER['HTTP_HOST'].'/':'http://'.$_SERVER['HTTP_HOST'].'/';
////USER IP ADDRESS
//function getRealUserIp(){
//    switch(true){
//        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
//        case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
//        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
//        default : return $_SERVER['REMOTE_ADDR'];
//    }
//}
//$user_ip = getRealUserIp();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
	require_once('vendor/mailchimp/transactional/lib/Configuration.php');
	require_once('vendor/mailchimp/marketing/lib/Configuration.php');
	require 'vendor/autoload.php';

class Database{
	private $host = "mysql.backend.development-env.com";
	private $user = "col0r4do";
	private $password = "admin123";
	private $database = "coloradodb";
	private $conn;
	function __construct() {
		$this->conn = $this->connectDB();
	}
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
}


	echo date_default_timezone_get();
	echo ini_get('date.timezone');

	// // $msg = "one day left of your free trial. Interval :";
	// // $msg = wordwrap($msg,70);
	// // mail("rabejev472@onzmail.com","Subscription expiration reminder",$msg);
	// echo 'test.php';



	// try{

	// $query1 = "SELECT * FROM subscribe WHERE email !='anonymous@gmail.com' " ;
	// $conn = new Database();
	// $mysqli = $conn->connectDB();
	// $result = $mysqli->query($query1);
	// print_r($result);
	// echo 'incide try';
	// $reminderdays = 3;
	// while($row = mysqli_fetch_array($result)){
	// 	if(!empty($row['subscription_date']) && isset($row['subscription_date'])){
	// 		echo "<br>inside loop";
	// 		// print_r($row);
	// 		$date1 = new DateTime(date("Y-m-d"));
	// 		// 	 	//	$date1 = new DateTime("now");
	// 		$date2 = new DateTime($row['subscription_date']);

	// 		// echo "<br>ok ";
	// 		// echo "date :".$date2;
	// 		$interval = $date1->diff($date2);
	// 		$interval=$interval->format('%a');
	// 		echo "<br>email :interval :".$interval;
	// 		if($row['free_trial'] == 1 && $interval==3){
	// 			$msg = "one day left of your free trial. Interval :".$interval.'   email :'.$row['email'];
	// 			$msg = wordwrap($msg,70);
	// 			mail("rabejev472@onzmail.com","Subscription expiration reminder",$msg);
	// 			// try {
	// 			//     $mandrill = new Mandrill('-wnng0DApH4ruElZLL_nWw');
	// 			//     $FIRSTNAME = $row['first_name'].' '.$row['lat_name'];
	// 			//    echo 'Before catch';
	// 			//     $message = array(
	// 			//         'subject' => 'Payment Reminder Email',
	// 			//         'from_email' => 'admin@coloradocampgrounds.development-env.com',
	// 			//         'from_name'=> 'Colorado Campgrounds',
	// 			//         'to' => array(array('email' => $row['email'], 'name' => 'Colorado')),
	// 			//         );
	// 			//     $template_name = 'Free Subscription Reminder mail';
	// 			//     $template_content = array(
	// 			//         array(
	// 			//             'name' => 'u_date',
	// 			//             'content' => date("l jS \of F Y")  ),
	// 			//         array(
	// 			//             'name' => 'u_name',
	// 			//             'content' => $FIRSTNAME),
	// 			//     );
	// 			//     $response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
	// 			//     // print_r($response ) ; exit ;
	// 			//     //end test

	// 			// } catch (Exception $e) {
	// 			//     echo "Message could not be sent. Mailer Error:".$mail->ErrorInfo;
	// 			// }

	// 		}
	// 			// $msg = "one day left of your free trial. Interval :".$interval.'   email :'.$row['email'];
	// 			// use wordwrap() if lines are longer than 70 characters
	// 			// $msg = wordwrap($msg,70);
	// 			// send email
	// 			// $id = $row['id'];
	// 			// $sql = "UPDATE subscribe SET free_trial=2 WHERE id='$id'";
	// 			// $mysqli->query($sql);
	// 			// mail("rabejev472@onzmail.com","Subscription expiration reminder",$msg);
	// 			// continue;
	// 		echo "<br>inside if";
			
	// 	}else{
	// 		echo "<br>inside else";
	// 	}
	// }
	// } catch (Exception $e) {
	// 	echo "error :".$e->getMessage();
	// } 

								// try {
								//     $mandrill = new Mandrill('-wnng0DApH4ruElZLL_nWw');
								//     $FIRSTNAME = 'Zain';
								//    echo 'Before catch';
								//     $message = array(
								//         'subject' => 'Payment Reminder Email',
								//         'from_email' => 'admin@coloradocampgrounds.development-env.com',
								//         'from_name'=> 'Colorado Campgrounds',
								//         'to' => array(array('email' => 'zain.waheed.softenica@gmail.com', 'name' => 'Colorado')),
								//         );
								//     $template_name = 'Newsletter Notification of Blog';
								//     $template_content = array(
								//         array(
								//             'name' => 'u_date',
								//             'content' => date("l jS \of F Y")  ),
								//         array(
								//             'name' => 'u_name',
								//             'content' => $FIRSTNAME),
								//     );
								//     $response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
								//     // print_r($response ) ; exit ;
								//     //end test

								// } catch (Exception $e) {
								//     echo "Message could not be sent. Mailer Error:".$mail->ErrorInfo;
								// }

?>

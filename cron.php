php<?php
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
$conn = new Database();
$mysqli = $conn->connectDB();
			

	// DATEDIFF('$date',deactivation_date) <= 40
	
	$query1 = "SELECT * FROM subscribe WHERE email !='anonymous@gmail.com'" ;

	$result = $mysqli->query($query1);



	$query2 = "SELECT * FROM setDays WHERE s_days = 1 " ;

	$NoOfdays = $mysqli->query($query2);

	$daysNo=$NoOfdays->fetch_object();


	// $query3 = "SELECT * FROM subscribe WHERE email =='yenoyi4507@mayhco.com'" ;
	// $result3 = $mysqli->query($query1);
	// while($row = mysqli_fetch_array($result3)){
	// 	 $date1 = new DateTime(date("Y-m-d"));
 // 	//	$date1 = new DateTime("now");
	// 	$date2 = new DateTime($row['subscription_date']);

	// 	$interval = $date1->diff($date2);

	// 	// $days=$interval->d;
	// 	$days=$interval->format('%a');
	// 	// if($date1>$date2){
	// 	// 	$days=$days*-1;
	// 	// }

	// 	mail('koredej968@seacob.com',"Remaining days"," Days :".$days);
	// 	mail($row['email'],"Test Data","Email :".$row['email']." Days :".$days);

	// }

	// $bool = true;

	$reminderdays = 3;
	 while($row = mysqli_fetch_array($result)){



	 					if(!empty($row['subscription_date']) && isset($row['subscription_date'])){
				 		$date1 = new DateTime(date("Y-m-d"));
				 	//	$date1 = new DateTime("now");
						$date2 = new DateTime($row['subscription_date']);

						$interval = $date1->diff($date2);

						// $days=$interval->d;
						$days=$interval->format('%a');
						if($date1>$date2){
							$days=$days*-1;
						}
						
						$interval=$interval->format('%r%a');

						// if($row['id'] == 409){
						// 	// the message

						// 	$msg = "Days Remaining :".$interval." date1 ".date("Y-m-d");

						// 	// use wordwrap() if lines are longer than 70 characters
						// 	$msg = wordwrap($msg,70);

						// 	// send email
						// 	mail($row['email'],"Days Remaining",$msg);
						// }						

						if($row['free_trial'] == 1 && $interval == -1 ){
							$mail = new PHPMailer(true);

							$mailchimp = new \MailchimpMarketing\ApiClient();

							$mailchimp->setConfig([
							    'apiKey' => 'ec7ee1e986e71aad7adbc753d45bc1b3-us5',
							    'server' => 'us5'
							]);


							$email = "admin@coloradocampgrounds.development-env.com";
							// $list_id = "00998ad243";

							try {

							    $mandrill = new Mandrill('-wnng0DApH4ruElZLL_nWw');

							    $message = array(
							        'subject' => 'Subscription Cancellation',
							        'from_email' => 'admin@coloradocampgrounds.development-env.com',
							        'from_name'=> 'Colorado Campgrounds',
							        'to' => array(array('email' => $row['email'], 'name' => 'colorado') ),
							        );

							    $template_name = 'Subscription Cancellation';

							    $template_content = array(
							        array(
							            'name' => 'u_date',
							            'content' => date("l jS \of F Y") ),
							        array(
							            'name' => 'u_name',
							            'content' => $row['first_name']." ".$row['last_name']),

							    );

							    $response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);

							    //end test

							} catch (Exception $e) {
							    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
							}
						}
	 					
	 					if($row['free_trial'] == 1 && $interval==$reminderdays){
	 					// 	$msg = "one day left of your free trial. Interval :".$interval ." mail:".$row['email'];
							// // use wordwrap() if lines are longer than 70 characters
							// $msg = wordwrap($msg,70);
							// // send email
							// // $id = $row['id'];
							// // $sql = "UPDATE subscribe SET free_trial=2 WHERE id='$id'";
							// // $mysqli->query($sql);
							// mail($row['email'],"Subscription expiration reminder",$msg);


								try {
								    $mandrill = new Mandrill('-wnng0DApH4ruElZLL_nWw');
								    $FIRSTNAME = $row['first_name'].' '.$row['lat_name'];
								   echo 'Before catch';
								    $message = array(
								        'subject' => 'Payment Reminder Email',
								        'from_email' => 'admin@coloradocampgrounds.development-env.com',
								        'from_name'=> 'Colorado Campgrounds',
								        'to' => array(array('email' => $row['email'], 'name' => 'Colorado')),
								        );
								    $template_name = 'Free Subscription Reminder mail';
								    $template_content = array(
								        array(
								            'name' => 'u_date',
								            'content' => date("l jS \of F Y")  ),
								        array(
								            'name' => 'u_name',
								            'content' => $FIRSTNAME),
								    );
								    $response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
								    // print_r($response ) ; exit ;
								    //end test

								} catch (Exception $e) {
								    echo "Message could not be sent. Mailer Error:".$mail->ErrorInfo;
								}


							continue;
	 					}
	 					// if($row['free_trial'] == 2 && $day==0){

	 					// 	$msg = "payment has been detected for one year.";
							// // use wordwrap() if lines are longer than 70 characters
							// $msg = wordwrap($msg,70);
							// // send email
							// $id = $row['id'];
							// $sql = "UPDATE subscribe SET free_trial=0 WHERE id='$id'";

							// if ($mysqli->query($sql) === TRUE) {
							//   echo "Record updated successfully";
							// } else {
							//   echo "Error updating record: " . $conn->error;
							// }
							// mail($row['email'],"My subject",$msg);
							// continue;
	 					// }






						// 		$to      = 'aroojfatima2067@gmail.com';
						// $subject = 'expirey  after '.$days.' days';
						// $message = 'hello '.$row['first_name'].' '.$row['last_name'].' your account is going to expire after '.$days.' days';
						// $headers = 'From: webmaster@example.com' . "\r\n" .
						//     'Reply-To: webmaster@example.com' . "\r\n" .
						//     'X-Mailer: PHP/' . phpversion();

						// mail($to, $subject, $message, $headers);

			   //          echo "<tr>";
			               
			   //              echo "<td>" . $row['email'] . "</td>";
			   //          echo "</tr>";
						if($row['payment_by']==2 && $days==$daysNo['noDays']){
									$mail = new PHPMailer(true);
									$mailchimp = new \MailchimpMarketing\ApiClient();
									$mailchimp->setConfig([
									    'apiKey' => 'ec7ee1e986e71aad7adbc753d45bc1b3-us5',
									    'server' => 'us5'
									]);
									$email = "admin@coloradocampgrounds.development-env.com";
									// $list_id = "00998ad243";
									$contacts = [
									    "email_address" => "admin@coloradocampgrounds.development-env.com",
									    "status" => "subscribed",
									    "merge_fields" => [
									        "FNAME" => "Prudence",
									        "LNAME" => "McVankab"
									    ]
									] ;
									try {
									    $mandrill = new Mandrill('-wnng0DApH4ruElZLL_nWw');
									    $FIRSTNAME = $row['first_name'].' '.$row['last_name'] ;
									    $lastName = "jamal" ;
									    $message = array(
									        'subject' => 'Subscription expiration reminder for pay-by-check',
									        'from_email' => 'admin@coloradocampgrounds.development-env.com',
									        'from_name'=> 'Colorado Campgrounds',
									        'to' => array(array('email' => $row['email'], 'name' => 'Colorado')),
									        );
									    $template_name = 'Subscription expiration reminder for pay-by-check';
									    $template_content = array(
									        array(
									            'name' => 'u_date',
									            'content' => date("l jS \of F Y")  ),
									        array(
									            'name' => 'u_name',
									            'content' => $FIRSTNAME),
									    );
									    // $response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
									    // print_r($response ) ; exit ;
									    //end test
									} catch (Exception $e) {
									    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
									}
						}else if($days==30 && $row['payment_by']!=2){
									$mail = new PHPMailer(true);
									$mailchimp = new \MailchimpMarketing\ApiClient();
									$mailchimp->setConfig([
									    'apiKey' => 'ec7ee1e986e71aad7adbc753d45bc1b3-us5',
									    'server' => 'us5'
									]);
									$email = "admin@coloradocampgrounds.development-env.com";
									// $list_id = "00998ad243";
									$contacts = [
									    "email_address" => "admin@coloradocampgrounds.development-env.com",
									    "status" => "subscribed",
									    "merge_fields" => [
									        "FNAME" => "Prudence",
									        "LNAME" => "McVankab"
									    ]
									] ;
									try {
									    $mandrill = new Mandrill('-wnng0DApH4ruElZLL_nWw');
									    $FIRSTNAME = $row['first_name'].' '.$row['last_name'] ;
									    $lastName = "jamal" ;
									    $message = array(
									        'subject' => 'Subscription Renewal Reminder One Month Out',
									        'from_email' => 'admin@coloradocampgrounds.development-env.com',
									        'from_name'=> 'Colorado Campgrounds',
									        'to' => array(array('email' => $row['email'], 'name' => 'Colorado')),
									        );
									    $template_name = 'Subscription Renewal Reminder One Month Out';
									    $template_content = array(
									        array(
									            'name' => 'u_date',
									            'content' => date("l jS \of F Y")  ),
									        array(
									            'name' => 'u_name',
									            'content' => $FIRSTNAME),
									    );
									    // $response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
									    // print_r($response ) ; exit ;
									    //end test
									} catch (Exception $e) {
									    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
									}
       
				 
			        }else if($days==$reminderdays && $row['payment_by']!=2 && $interval ==$reminderdays)
					        {
					      	$mail = new PHPMailer(true);
							$mailchimp = new \MailchimpMarketing\ApiClient();
							$mailchimp->setConfig([
							    'apiKey' => 'ec7ee1e986e71aad7adbc753d45bc1b3-us5',
							    'server' => 'us5'
							]);
								$email = "admin@coloradocampgrounds.development-env.com";
								// $list_id = "00998ad243";
								$contacts = [
								    "email_address" => "admin@coloradocampgrounds.development-env.com",
								    "status" => "subscribed",
								    "merge_fields" => [
								        "FNAME" => "Prudence",
								        "LNAME" => "McVankab"
								    ]
								] ;
								try {
								    $mandrill = new Mandrill('-wnng0DApH4ruElZLL_nWw');
								    $FIRSTNAME = $row['first_name'].' '.$row['last_name'] ;
								    $lastName = "jamal" ;
								    $message = array(
								        'subject' => 'Subscription Renewal Reminder Three Days Out',
								        'from_email' => 'admin@coloradocampgrounds.development-env.com',
								        'from_name'=> 'Colorado Campgrounds',
								        'to' => array(array('email' => $row['email'], 'name' => 'Colorado')),
								        );
								    $template_name = 'Subscription Renewal Reminder Three Days Out';
								    $template_content = array(
								        array(
								            'name' => 'u_date',
								            'content' => date("l jS \of F Y")  ),
								        array(
								            'name' => 'u_name',
								            'content' => $FIRSTNAME),
								    );
								    // $response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
								    // print_r($response ) ; exit ;
								    //end test
								} catch (Exception $e) {
								    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
								}
					        }else if($days==-5 && $row['payment_by']!=2)
					        {
					        	// remove the user from subscriber list and add that user in the news letter list

					        	   $deleteEmail=strtolower($row['email']);
					        
                          $apiKey = '96b6f7bfa7eaf9e9a9b163b39d391e31-us5';
                         
                          $memberID = md5(strtolower($deleteEmail));
                          $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
                          // $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;
                          // $url= https://server.api.mailchimp.com/3.0/lists/{list_id}/members/{subscriber_hash}/actions/delete-permanent \
                         

                          $listID = '64d05e9579';
                          // Add to subscriber 
                           $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;
                          
                          // member information
                          $json = json_encode([
                              'email_address' => $deleteEmail,
                              'status'        => 'subscribed',
                          ]);
                          
                          // send a HTTP POST request with curl
                          $ch = curl_init($url);
                          curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
                          curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                          curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                          $result = curl_exec($ch);
                          $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                            curl_close($ch);


                             $listID = '00998ad243';
                             // $url='https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID.'/actions/delete-permanent';
                              $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;
                           $ch = curl_init($url);
                          curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
                          curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                          // curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                          $result = curl_exec($ch);
                          $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                     	
                          curl_close($ch);


					        		  	$mail = new PHPMailer(true);
										$mailchimp = new \MailchimpMarketing\ApiClient();
										$mailchimp->setConfig([
										    'apiKey' => 'ec7ee1e986e71aad7adbc753d45bc1b3-us5',
										    'server' => 'us5'
										]);
											$email = "admin@coloradocampgrounds.development-env.com";
											// $list_id = "00998ad243";
											$contacts = [
											    "email_address" => "admin@coloradocampgrounds.development-env.com",
											    "status" => "subscribed",
											    "merge_fields" => [
											        "FNAME" => "Prudence",
											        "LNAME" => "McVankab"
											    ]
											] ;
											try {
											    $mandrill = new Mandrill('-wnng0DApH4ruElZLL_nWw');
											    $FIRSTNAME = $row['first_name'].' '.$row['last_name'] ;
											    $lastName = "jamal" ;
											    $message = array(
											        'subject' => 'Subscription Non-Renewal',
											        'from_email' => 'admin@coloradocampgrounds.development-env.com',
											        'from_name'=> 'Colorado Campgrounds',
											        'to' => array(array('email' =>  $row['email'], 'name' => 'Colorado')),
											        );
											    $template_name = 'Subscription Non-Renewal';
											    $template_content = array(
											        array(
											            'name' => 'u_date',
											            'content' => date("l jS \of F Y")  ),
											        array(
											            'name' => 'u_name',
											            'content' => $FIRSTNAME),
											    );
											    // $response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
											    // print_r($response ) ; exit ;
											    //end test
											} catch (Exception $e) {
											    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
											}
					        }



							



					    }else{
					    	// Payment Reminder Email
					        // Send this 5 days after a person subscribed but failed to complete the PayPal transaction
					        $date1 = new DateTime("now");
							$date2 = new DateTime($row['created_at']);
							$interval = $date1->diff($date2);
							$days=$interval->d;

							if($row['admin_status']==1 && $row['payment_by']!=2  && !isset($row['subscription_id']) && $days==5)
							{
							
									$mail = new PHPMailer(true);
							$mailchimp = new \MailchimpMarketing\ApiClient();
							$mailchimp->setConfig([
							    'apiKey' => 'ec7ee1e986e71aad7adbc753d45bc1b3-us5',
							    'server' => 'us5'
							]);
								$email = "admin@coloradocampgrounds.development-env.com";
								// $list_id = "00998ad243";
								$contacts = [
								    "email_address" => "admin@coloradocampgrounds.development-env.com",
								    'from_name'=> 'Colorado Campgrounds',
								    "status" => "subscribed",
								    "merge_fields" => [
								        "FNAME" => "Prudence",
								        "LNAME" => "McVankab"
								    ]
								] ;
								try {
								    $mandrill = new Mandrill('-wnng0DApH4ruElZLL_nWw');
								    $FIRSTNAME = $row['first_name'].' '.$row['last_name'] ;
								    $lastName = "jamal" ;
								    $message = array(
								        'subject' => 'Payment Reminder Email',
								        'from_email' => 'admin@coloradocampgrounds.development-env.com',
								        'from_name'=> 'Colorado Campgrounds',
								        'to' => array(array('email' => $row['email'], 'name' => 'Colorado')),
								        );
								    $template_name = 'Payment Reminder Email text';
								    $template_content = array(
								        array(
								            'name' => 'u_date',
								            'content' => date("l jS \of F Y")  ),
								        array(
								            'name' => 'u_name',
								            'content' => $FIRSTNAME),
								    );
								    $response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
								    // print_r($response ) ; exit ;
								    //end test
								} catch (Exception $e) {
								    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
								}
							}
					    }
        }


 //    $query2 = "SELECT email FROM subscribe WHERE DATEDIFF(subscription_date,created_at) = 3" ;

	// $result2 = $mysqli->query($query2);

	//  while($row = mysqli_fetch_array($result2)){	

	//  		$to      = $row['email'];
	// 		$subject = 'expirey  after 3 days';
	// 		$message = 'hello your account is going to expire after 3 days';
	// 		$headers = 'From: webmaster@example.com' . "\r\n" .
	// 		    'Reply-To: webmaster@example.com' . "\r\n" .
	// 		    'X-Mailer: PHP/' . phpversion();

	// 		mail($to, $subject, $message, $headers);

 //            echo "<tr>";
               
 //                echo "<td>" . $row['email'] . "</td>";
 //            echo "</tr>";
 //        }


 //    $query3 = "SELECT email FROM subscribe WHERE DATEDIFF(subscription_date,created_at) = 1" ;

	// $result3 = $mysqli->query($query3);

	//  while($row = mysqli_fetch_array($result3)){

	//  		$to      = $row['email'];
	// 		$subject = 'expirey  after 1 days';
	// 		$message = 'hello your account is going to expire this is your last date';
	// 		$headers = 'From: webmaster@example.com' . "\r\n" .
	// 		    'Reply-To: webmaster@example.com' . "\r\n" .
	// 		    'X-Mailer: PHP/' . phpversion();

	// 		mail($to, $subject, $message, $headers);

 //            echo "<tr>";
               
 //                echo "<td>" . $row['email'] . "</td>";
 //            echo "</tr>";
 //        }

	//print_r($result) ; exit ;

// if ($mysqli->query($query1) === TRUE) {
  
// 	print_r($query1) ; exit ;

// } else {
//   echo "Error: " . $query1 . "<br>" . $mysqli->error;
// }

   // $query1 ="UPDATE all_products SET  yesterday = points ";
   // $result = $mysqli->query($query1);
   //      $query2 ="UPDATE all_products SET points_trend = 0 ";
   //      $result = $mysqli->query($query2);
        
   //       $query4 = "UPDATE all_products SET update_date = addtime(current_timestamp, '6:05')";
   //       $result = $mysqli->query($query4);


// mail start

// mail end

?>

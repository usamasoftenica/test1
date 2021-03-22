<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

	require_once('vendor/mailchimp/transactional/lib/Configuration.php');
	require_once('vendor/mailchimp/marketing/lib/Configuration.php');
	require 'vendor/autoload.php';

class Paypal extends CI_Controller{

    function  __construct(){
       parent::__construct();

       // Load paypal library & product model
       $this->load->library('paypal_lib');
      // $this->load->model('product');
    }

   function success(){
       // Get the transaction data
          if(isset($this->session->userdata['userdata'])){
            $this->session->set_flashdata('success1','Your subscription done successfully');
            redirect(base_url('/profile'));
          }

          $this->session->set_flashdata('success1','Your subscription done successfully');
            redirect(base_url('/login'));
       // $paypalInfo = $this->input->get();

       // $data['item_name']      = $paypalInfo['item_name'];
       // $data['item_number']    = $paypalInfo['item_number'];
       // $data['txn_id']         = $paypalInfo["tx"];
       // $data['payment_amt']    = $paypalInfo["amt"];
       // $data['currency_code']  = $paypalInfo["cc"];
       // $data['status']         = $paypalInfo["st"];

       // // Pass the transaction data to view
       // $this->load->view('paypal/success', $data);
   }

    function cancel(){
       // Load payment failed view
   // print_r('fail');return;
       $this->session->set_flashdata('error1','Invalid Email or password');
             redirect(base_url('/login'));
      // $this->load->view('paypal/cancel');
    }

function ipn(){
       // Paypal posts the transaction data
       $paypalInfo = $this->input->post();
      
       $json = json_encode($paypalInfo) ;

       $insert_data=array( "json" => $json ) ;

       $sql = $this->db->insert('test',$insert_data); 


       if(!empty($paypalInfo) && isset($paypalInfo["txn_id"])  && !isset($paypalInfo["amount1"]) ){


           // Validate and get the ipn response
           $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
                  $insert_data=array(
          'custom'=>$paypalInfo["custom"],
          'product_id'=>'34',
          'txn_id'=>$paypalInfo["txn_id"],
          'payment_gross'=>$paypalInfo["mc_gross"],
          'currency_code'=>$paypalInfo["mc_currency"],
          'payer_email'=>$paypalInfo["payer_email"],
          'payment_status'=>$paypalInfo["payment_status"],
          );

          // $where = array('subscription_id' => $paypalInfo["subscr_id"]);
          // $data1 = array('free_trial'=>0);
          // $this->Campgrounds->update_data( '','', 'subscribe', $data1, $where );      

            // $newuser=$this->Campgrounds->insert('payments',$insert_data);
                   $sql = $this->db->insert('payments',$insert_data); 
                        $where = array('id' => $paypalInfo["custom"]);
         // $userData = $this->Campgrounds->find('subscribe',$where);
                    $this->db->select('*');
                    $this->db->from('subscribe'); 
                    $this->db->where($where);
                    $query = $this->db->get();
                    $userData = $query->row();

//                    $this->load->library('email');
//
//                    $this->email->from('subscribe@colorado.com', 'Subscribe');
//                    $this->email->to($userData->email);
//                    $this->email->cc('subscribe@colorado.com');
//                    // $this->email->bcc('them@their-example.com');
//
//                    $this->email->subject('Email Test12');
//                    $this->email->message('Subscribe mail. User email :'.$userData->email);
//
//                    $this->email->send();

                      // mail chimp code start from here 
                      // Delete the subscriber from the newsletter list
                          $deleteEmail=strtolower($userData->email);
                          $apiKey = '96b6f7bfa7eaf9e9a9b163b39d391e31-us5';
                          $listID = '64d05e9579';
                          $memberID = md5(strtolower($deleteEmail));
                          $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
                          // $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;
                          // $url= https://server.api.mailchimp.com/3.0/lists/{list_id}/members/{subscriber_hash}/actions/delete-permanent \
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

                          $listID = '00998ad243';
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





                      // Mail Chimp Code ends here




         $TotalDays=0;
         $days=365;
         if(!empty($userData->subscription_date) && $userData->subscription_date!=NULL && $userData->subscription_id!=NULL && $userData->free_trial != 1)
         {
           $now = time(); // or your date as well
            $your_date = strtotime($userData->subscription_date);            
            $datediff = $your_date - $now;
            if($datediff>0){
              $TotalDays=ceil($datediff/86400);
            }
            $this->transactionalEmail( $userData,'Subscription Renewal','Subscription Renewal' ) ;
         }else{
            $this->transactionalEmail( $userData,'Subscription Welcome','Welcome to Colorado Campgrounds' ) ;
         }
         $TotalDays += $days;
           $currentDate=date("Y-m-d");
           $dateMonthYear = strtotime("+".$TotalDays." days", strtotime($currentDate));
//           $varDate = date("Y-m-d", $dateMonthYear);
           $varDate = date("Y-m-d h:i:s", $dateMonthYear);

           $data = array('subscription_date' =>$varDate , 'subscription_id' =>$paypalInfo["subscr_id"] , 'free_trial' => 0);
                $where1 = array('id' =>$paypalInfo["custom"]);

               $this->Campgrounds->update_data("","",'subscribe', $data,$where1);
              
            

             }


          if(!empty($paypalInfo) && isset($paypalInfo["subscr_date"]) && isset($paypalInfo["amount1"])) {
           $where = array('id' => $paypalInfo["custom"]);
           // $userData = $this->Campgrounds->find('subscribe',$where);
           $this->db->select('*');
           $this->db->from('subscribe');
           $this->db->where($where);
           $query = $this->db->get();
           $userData = $query->row();
           // die($userData);

           $TotalDays=0;
           $days=30;
           if(empty($userData->subscription_date) && $userData->subscription_date==NULL)
           {


              // $this->load->library('email');

              // $this->email->from('admin@colorado.com', 'Your Name');
              // $this->email->to($userData->email);
              // $this->email->cc('another@another-example.com');
              // // $this->email->bcc('them@their-example.com');

              // $this->email->subject('Email Test 12');
              // $this->email->message('Signup mail.');

              // $this->email->send();

              $insert_data=array( 
                'user_id'=>$userData->id,
                'start_date' => date("Y-m-d"),
                'end_date' => date("Y-m-d" , strtotime('+'.$days.' days'))
                 );

               $this->transactionalEmail( $userData , 'Free Subscription mail' , 'Signup Mail');
               $this->db->insert('free_trial',$insert_data); 
              //   $this->Campgrounds->insert('payments',$insert_data);
               $TotalDays=$TotalDays+$days;
               $currentDate=$paypalInfo['subscr_date'];
               $dateMonthYear = strtotime("+".$TotalDays." days", strtotime($currentDate));
               $varDate = date("Y-m-d h:i:s", $dateMonthYear);

               $data = array('subscription_date' =>$varDate , 'subscription_id' =>$paypalInfo["subscr_id"]);
               $where1 = array('id' =>$paypalInfo["custom"]);

               $this->Campgrounds->update_data("","",'subscribe', $data,$where1);
           }


       }


    }



public function transactionalEmail( $user,$titleEmail,$subject ) {

$name = '';

if($subject == 'Signup Mail'){
  $name = $user->first_name;
}else{
  $name = $user->first_name;
}

// Instantiation and passing `true` enables exceptions
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
        'subject' => $subject,
        'from_email' => 'admin@coloradocampgrounds.development-env.com',
        'from_name'=> 'Colorado Campgrounds',
        'to' => array(array('email' => $user->email, 'name' => 'colorado') ),
        );

    $template_name = $titleEmail;

    $template_content = array(
        array(
            'name' => 'u_date',
            'content' => date("l jS \of F Y") ),
        array(
            'name' => 'u_name',
            'content' => $name),

    );

    $response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);

    //end test

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
       }





// public function SignUpMail($user)
// {
//   # code...

// try {

//     $mandrill = new Mandrill('-wnng0DApH4ruElZLL_nWw');

//     $message = array(
//         'subject' => $subject,
//         'from_email' => 'admin@coloradocampgrounds.development-env.com',
//         'from_name'=> 'Colorado Campgrounds',
//         'to' => array(array('email' => $user->email, 'name' => 'colorado') ),
//         );

//     $template_name = $titleEmail;

//     $template_content = array(
//         array(
//             'name' => 'u_date',
//             'content' => date("l jS \of F Y") ),
//         array(
//             'name' => 'u_name',
//             'content' => $user->first_name." ".$user->last_name),

//     );

//     $response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);

//     //end test

// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
// }

   
 }
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    require_once('vendor/mailchimp/transactional/lib/Configuration.php');
    require_once('vendor/mailchimp/marketing/lib/Configuration.php');
    require 'vendor/autoload.php';

class  Subscriber extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->layout="admin/layout/main-layout";

        if(isset($this->session->userdata['admindata']))
        {
            $this->adminId = $this->session->userdata['admindata']['adminId'];
        }
    }


    public function test()
    {
        if(isset($this->adminId))
        {
            $data['title']='Subscriber List';
            $data['yield']='admin/pages/newsletters/testview.php';
            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }
    public function listing()
    {
        if(isset($this->adminId))
        {
            $data['title']='Subscriber List';
            $data['yield']='admin/pages/subscriber/list-subscriber.php';
            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }  
      public function freeTrialListing()
    {
        if(isset($this->adminId))
        {
            $data['title']='Free Trail List';
            $data['yield']='admin/pages/subscriber/free-trial-list.php';
            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }

    public function newsletter()
    {
        if(isset($this->adminId))
        {
            $data['title']='Newsletter Subscriber List';
            // $where = array('subscribe.id' => $id );
            $data['subscribers']=$this->Campgrounds->find('newsletter','','','','1');
            $data['yield']='admin/pages/subscriber/newsletter-subscriber.php';
            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }



    public function blockedSubscriber()
    {
        $data = $this->input->post();
        $where = array('id' => $data['id']);
        $insert_data = array('admin_status'=>0);
        $this->Campgrounds->update_data('','','subscribe',$insert_data,$where);
        echo 'true';
    }

public function transactionalEmail1( $user,$titleEmail,$subject ) {

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
            'content' => $user->first_name),

    );

    $response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);

    //end test

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
       }
//free account
    public function freeAccount()
    {

        $data = $this->input->post();

        $where = array('id' => $data['id']);
        $insert_data = array('admin_status'=>2);
        $this->Campgrounds->update_data('','','subscribe',$insert_data,$where);
            $where = array('id' =>  $data['id']);
         $userData = $this->Campgrounds->find('subscribe',$where);
         // die(var_dump($userData));
                   $this->db->select('*');
                    $this->db->from('subscribe'); 
                    $this->db->where($where);
                    $query = $this->db->get();
                      $userData = $query->row();
                      

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

        $this->transactionalEmail1( $userData,'Subscription Welcome','Welcome to Colorado Campgrounds' ) ;


        echo 'true';
    }


// temp function to send Email to ALl subscribrers

//end free account


    public function unblockedSubscriber()
    {
        $data = $this->input->post();
        $where = array('id' => $data['id']);
        $insert_data = array('admin_status'=>1);
        $this->Campgrounds->update_data('','','subscribe',$insert_data,$where);
        echo 'true';
    }

    public function delete_subscriber()

    {

        $data = $this->input->post();

        $id = $data['id'];

        $where = array('id' => $data['id'] );

        //print_r($slug );exit;

        $subscribe = $this->Campgrounds->find("subscribe",$where,'','',1);

        $this->transactionalEmail( $subscribe ) ;

//        $this->db->where('sender_id', $data['id']);

//        $this->db->delete('comments');

//        $this->db->where('user_id', $data['id']);

//        $this->db->delete('replys');

//        $this->db->where('user_id', $data['id']);

//        $this->db->delete('forums');

        if(!empty($subscribe[0]->subscription_id)){

            $this->cancel_sub($subscribe[0]->subscription_id);

        }


        $data = array('first_name' =>'Anonymous','last_name' =>' ' , 'email' =>'anonymous@gmail.com');
        $where1 = array('id' =>$id);

        $this->Campgrounds->update_data("","",'subscribe', $data,$where1);
        // $this->db->delete('subscribe', array('id' => $data['id']));



        echo 'true';

    }
    public function cancel_sub( $subs_id = null )
    {

        $api_request = 'USER=' . urlencode( 'aroojfatima2067-facilitator-2_api1.gmail.com' )
            .  '&PWD=' . urlencode( 'H26GM9B8FHQKCM5C' )
            .  '&SIGNATURE=' . urlencode( 'ANwFFiiHBrwGttnkRYmhmGrNPKCwAxZUKRBegBXj4TZ1F7-GacKKa-Dj' )
            .  '&VERSION=76.0'
            .  '&METHOD=ManageRecurringPaymentsProfileStatus'
            .  '&PROFILEID=' . urlencode( $subs_id )
            .  '&ACTION=' . urlencode( 'cancel' )
            .  '&NOTE=' . urlencode( 'user has cancel subscription successfully' );

        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp' ); // For live transactions, change to 'https://api-3t.paypal.com/nvp'
        curl_setopt( $ch, CURLOPT_VERBOSE, 1 );

        // Uncomment these to turn off server and peer verification
        // curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
        // curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_POST, 1 );

        // Set the API parameters for this transaction
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $api_request );

        // Request response from PayPal
        $response = curl_exec( $ch );

        // If no response was received from PayPal there is no point parsing the response
        if( ! $response )
            die( 'Calling PayPal to change_subscription_status failed: ' . curl_error( $ch ) . '(' . curl_errno( $ch ) . ')' );

        curl_close( $ch );

        // An associative array is more usable than a parameter string
        parse_str( $response, $parsed_response );

        $data = array('subscription_id' =>null);
        $where1 = array('subscription_id' =>$subs_id);

        $this->Campgrounds->update_data("","",'subscribe', $data,$where1);

        return 1;
    }
    public function subscriberDetails($id="")
    {
        # code...
        // print_r($id)
        if(isset($this->adminId))
        {
            $where = array('subscribe.id' => $id );
            $subscribe=$this->Campgrounds->find('subscribe',$where);
          
            $data['subscriber']=$subscribe;
            $where = array('free_trial.user_id' => $id );
            $data['free_trial'] =$this->Campgrounds->find('free_trial',$where);
            $data['title']='Subscriber Details';
            $data['yield']='admin/pages/subscriber/subscriber-details.php';
            // print_r($data);
            // die($bool);

            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }

    }
    public function editSubscriber($id='')
    {
        if(isset($this->adminId))
        {
            $where = array('subscribe.id' => $id );
            $data['user']=$this->Campgrounds->find('subscribe',$where);

             $where = array('custom' => $id );
               $ordeBy= array('0'=>['payment_id','desc'],
        );
            $data['payments']=$this->Campgrounds->find('payments',$where,0,1,'','','','',$ordeBy);

            $data['title']='Edit Subscriber';
            $data['yield']='admin/pages/subscriber/subscriber-edit.php';
            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }
    public function Paymentlist($id='')
    {
        if(isset($this->adminId))
        {
            $data['title']='Subscriber Payment';
            $data['yield']='admin/pages/subscriber/subscriber-payments.php';
            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }

    public function outBoundEmail($id='')
    {
        if(isset($this->adminId))
        {
            $where = array('outboundemail.out_id' => 1 );
            $data['email']=$this->Campgrounds->find('outboundemail',$where);

            $data['title']='Outbound-Email';
            $data['yield']='admin/pages/subscriber/outbound-email.php';
            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }


    public function AddOutBoundEmail($value='')
    {
        $data=$this->input->post();

        //validation rules
        $this->form_validation->set_rules('details', 'Detail','required');
        $this->form_validation->set_rules('title', 'Title','required' );

        if ($this->form_validation->run() == FALSE)
        {
            // $data = $this->input->post();
            $ins =$this->form_validation->error_array();
            $this->session->set_flashdata('error', $ins);
            // $this->session->set_flashdata('data',$data);
            redirect($_SERVER['HTTP_REFERER']);

        }else{
            $insert_data=array(
                'title'=>$data['title'],
                'descritpion'=>$data['details'],
            );

            $where = array('outboundemail.out_id' => 1 );
            $this->Campgrounds->update_data('','','outboundemail',$insert_data,$where);
            $this->session->set_flashdata('success1', 'Outbound Email updated successfully');
            redirect($_SERVER['HTTP_REFERER']);


        }
    }

    public function update_Payment($value='')
    {
        $data=$this->input->post();
        $this->form_validation->set_rules('amount', 'Amount','required|greater_than_equal_to[1]');
        if ($this->form_validation->run() == FALSE)
        {
            // $data = $this->input->post();
            $ins =$this->form_validation->error_array();
            $this->session->set_flashdata('error2', $ins);
            // $this->session->set_flashdata('data',$data);
            redirect($_SERVER['HTTP_REFERER']);

        }else{
            $insert_data=array(
                'pAmount'=>$data['amount'],
            );

            $where = array('setpayment.s_payment' => 1 );
            $this->Campgrounds->update_data('','','setpayment',$insert_data,$where);
            $this->session->set_flashdata('success1', 'Subscription Amount updated successfully');
            redirect($_SERVER['HTTP_REFERER']);


        }
    }

     public function update_days($value='')
    {
        $data=$this->input->post();
        $this->form_validation->set_rules('amount', 'Amount','required|greater_than_equal_to[1]|less_than[365]');
        if ($this->form_validation->run() == FALSE)
        {
            // $data = $this->input->post();
            $ins =$this->form_validation->error_array();
            $this->session->set_flashdata('error2', $ins);
            // $this->session->set_flashdata('data',$data);
            redirect($_SERVER['HTTP_REFERER']);

        }else{
            $insert_data=array(
                'noDays'=>$data['amount'],
            );

            $where = array('s_days' => 1 );
            $this->Campgrounds->update_data('','','setDays',$insert_data,$where);
            $this->session->set_flashdata('success1', 'Subscription Expiry Days updated successfully');
            redirect($_SERVER['HTTP_REFERER']);


        }
    }

    public function setpayment($value='')
    {
        if(isset($this->adminId))
        {
            $where = array('setpayment.s_payment' => 1 );
            $data['amount']=$this->Campgrounds->find('setpayment',$where);

            $data['title']='Payment';
            $data['yield']='admin/pages/subscriber/set-payment.php';
            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }

      public function setdays($value='')
    {
        if(isset($this->adminId))
        {
            $where = array('s_days' => 1 );
            $data['amount']=$this->Campgrounds->find('setDays',$where);

            $data['title']='Set Days';
            $data['yield']='admin/pages/subscriber/set-days.php';
            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }


       public function CreateSubscriber($value='')
    {

        if(isset($this->adminId))
        {
            $where = array('setpayment.s_payment' => 1 );
            $data['amount']=$this->Campgrounds->find('setpayment',$where);

            $data['title']='Payment';
            $data['yield']='admin/pages/subscriber/create-subscriber.php';
            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }

    public function signup($value='')
    {
         
        $val=$this->input->post();
            //validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required|max_length[100]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|max_length[100]|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[subscribe.email]');
        $this->form_validation->set_message('is_unique', 'The %s is already taken');
        $this->form_validation->set_rules('billing_address', 'Billing Address', 'required|max_length[100]');
        $this->form_validation->set_rules('apartment', 'Apartment', 'max_length[100]');
        $this->form_validation->set_rules('city', 'City', 'required|max_length[100]');
        $this->form_validation->set_rules('state', 'State', 'required|max_length[100]');
        $this->form_validation->set_rules('country', 'Country', 'required|max_length[100]');
       $this->form_validation->set_rules('zip_code', 'Zip Code', 'required|max_length[100]');
       $this->form_validation->set_rules('subscriberType', 'Subscriber Type', 'required|max_length[100]');
       if($val['subscriberType']=='Manual Payment'){
       $this->form_validation->set_rules('amount', 'Amount', 'required');
       $this->form_validation->set_rules('e_date', 'Expiry Date', 'required');

        }


        if ($this->form_validation->run() == FALSE)
                {
                 $data = $this->input->post();
                $ins =$this->form_validation->error_array();

                 $this->session->set_flashdata('error2', $ins);
                 $this->session->set_flashdata('data',$data);
                 redirect($_SERVER['HTTP_REFERER']);
                    
                }
                else
                {
                    $data=$this->input->post();
                        if (empty($_FILES['imageSubscriber']['name'])) {
                            $length = 8;
        $random= substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
               if($data['subscriberType']=='Free For Ever'){
                        $st=2;
                        $varDate=NULL;
                        $subId = NULL;
                }else if($data['subscriberType']=='Manual Payment'){
                    $st=1;
                        $dateMonthYear = strtotime($data['e_date']);
                         $varDate = date("Y-m-d", $dateMonthYear);
                         $subId = '1-kolpmhyqekklj';


                }
                    $insert_data=array(
                        'first_name'=>$data['first_name'],
                        'last_name'=>$data['last_name'],
                        'email'=>$data['email'],
                        'billing_address'=>$data['billing_address'],
                        'apartment'=>$data['apartment'],
                        'city'=>$data['city'],
                        'state'=>$data['state'],
                        'zip_code'=>$data['zip_code'],
                        'country'=>$data['country'],
                        'password'=>md5($data['password']),
                        'code'=>$random,
                        'admin_status'=>$st,
                        'subscription_date'=>$varDate,
                        'subscription_id'=>$subId,
                        'createdBy'=>1,
                    );

                      
                                    $newuser=$this->Campgrounds->insert('subscribe',$insert_data);
                                       $where = array('id' => $newuser );
                                        $userData=$this->Campgrounds->find('subscribe',$where,'','','');
                                    // add payment details start
                                  if($data['subscriberType']=='Manual Payment'){
                                            $insert_data=array(
                                                              'custom'=>$newuser,
                                                              'product_id'=>'34',
                                                              'txn_id'=>'Manual Payment',
                                                              'payment_gross'=>$data["amount"],
                                                              'currency_code'=>'USD',
                                                              'payer_email'=>'admin@coloradocampgrounds.us.com',
                                                              'payment_status'=>'Completed',
                                                              );

                                // $newuser=$this->Campgrounds->insert('payments',$insert_data);
                                       $sql = $this->db->insert('payments',$insert_data); 
                                   }
                                    // add payment details end




                                    $this->session->set_userdata('paypalId', $newuser);
                                    // print_r($data['email']);return;
                                    // mailchimp 
                                    // non subscriber list id= 64d05e9579
                                    // subscriber list id =00998ad243
                                            $email=$data['email'];
                                            $apiKey = '96b6f7bfa7eaf9e9a9b163b39d391e31-us5';
                                            $listID = '00998ad243';
                                            // $segmentid = '21069';
                                            //5b3aa0cc48
                                            // MailChimp API URL
                                            $memberID = md5(strtolower($email));
                                            $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
                                            $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;
                                            
                                            // member information
                                            $json = json_encode([
                                                'email_address' => $email,
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
                                                // add payment details 


                                                    $this->transactionalEmail1( $userData,'Subscription Welcome','Welcome to Colorado Campgrounds' ) ;
                                                $this->session->set_flashdata('success1', 'Subscriber Added Successfully');
                                                redirect($_SERVER['HTTP_REFERER']);
                                        // mailchimp
                                            // $this->purchaseitem($newuser);
                                }else{
                                    $img='';
                                        $config['upload_path']          = './uploads/userImages/';
                                        $config['allowed_types']        = 'gif|jpg|png';
                                         $config['encrpy_name']  = 100;
                                        $config['file_name'] = date("Y_m_d H_i_s");

                                        $this->load->library('upload', $config);

                                        if ( ! $this->upload->do_upload('imageSubscriber'))
                                        {
                                                $error = array('error' => $this->upload->display_errors());
                                                $this->session->set_flashdata('imageError1',$error);
                                             
                                                  redirect($_SERVER['HTTP_REFERER']);
                                                // $this->load->view('upload_form', $error);
                                        }
                                        else
                                        {
                                            $length = 8;
                                            $random= substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                 if($data['subscriberType']=='Free For Ever'){
                                                    $st=2;
                                                    $varDate=NULL;
                                                    $subId = NULL;
                                            }else if($data['subscriberType']=='Manual Payment'){
                                                $st=1;
                                                    $dateMonthYear = strtotime($data['e_date']);
                                                     $varDate = date("Y-m-d", $dateMonthYear);
                                                     $subId = '1-kolpmhyqekklj';


                                            }

                                                 $file_data =  $this->upload->data();
                                                 $img  = $file_data['file_name'];
                                                $insert_data=array(
                                                'first_name'=>$data['first_name'],
                                                'last_name'=>$data['last_name'],
                                                'email'=>$data['email'],
                                                'billing_address'=>$data['billing_address'],
                                                'apartment'=>$data['apartment'],
                                                'city'=>$data['city'],
                                                'state'=>$data['state'],
                                                'zip_code'=>$data['zip_code'],
                                                'country'=>$data['country'],
                                                'password'=>md5($data['password']),
                                                'code'=>$random,
                                                'image'=>$img,
                                                'admin_status'=>$st,
                                                'subscription_date'=>$varDate,
                                                'subscription_id'=>$subId,
                                                'createdBy'=>1,
                                                );
                                            $newuser=$this->Campgrounds->insert('subscribe',$insert_data);
                                             $where = array('id' => $newuser );
                                        $userData=$this->Campgrounds->find('subscribe',$where,'','','');
                                                 // add payment details start
                                  if($data['subscriberType']=='Manual Payment'){
                                            $insert_data=array(
                                                              'custom'=>$newuser,
                                                              'product_id'=>'34',
                                                              'txn_id'=>'Manual Payment',
                                                              'payment_gross'=>$data["amount"],
                                                              'currency_code'=>'USD',
                                                              'payer_email'=>'admin@coloradocampgrounds.us.com',
                                                              'payment_status'=>'Completed',
                                                              );

                                // $newuser=$this->Campgrounds->insert('payments',$insert_data);
                                       $sql = $this->db->insert('payments',$insert_data); 
                                   }
                                                // $this->session->set_userdata('paypalId', $newuser);
                                   $this->transactionalEmail1( $userData,'Subscription Welcome','Welcome to Colorado Campgrounds' ) ;
                                             $this->session->set_flashdata('success1', 'Subscriber Added Successfully');
                                                 redirect($_SERVER['HTTP_REFERER']);
                                                // $this->purchaseitem($newuser);
                                        }



                                }
                                    // $this->session->set_userdata('newUser', $newuser);
                                    // $this->session->set_userdata('newEmail', $data['email']);
                                    // $this->session->set_userdata('newFor', 'subscribe');
                                 //    $this->session->set_flashdata('success1', 'We have just sent a verification email to your email address');
                              //      redirect(base_url('code-verification'));
                                   // }else{
                                   //   $this->session->set_flashdata('error1', 'Error! Try to sigup again');
                                   //      redirect($_SERVER['HTTP_REFERER']);
                                   // }
    
 
                }
        
    }

    public function updateProfile($id='')
    {
        $data=$this->input->post();
        //validation rules
        $where = array('id' => $id );
            $subscribers=$this->Campgrounds->find('subscribe',$where,'','','');



        $this->form_validation->set_rules('first_name', 'First Name', 'required|max_length[100]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('billing_address', 'Billing Address', 'required|max_length[100]');
        $this->form_validation->set_rules('apartment', 'Apartment', 'max_length[100]');
        $this->form_validation->set_rules('city', 'City', 'required|max_length[100]');
        $this->form_validation->set_rules('state', 'State', 'required|max_length[100]');
        $this->form_validation->set_rules('country', 'Country', 'required|max_length[100]');
        $this->form_validation->set_rules('zip_code', 'Zip Code', 'required|max_length[100]');
     
       if($subscribers->createdBy==1 && $data['subscriberType']=='Manual Payment'){
        $this->form_validation->set_rules('subscriberType', 'Subscriber Type', 'required|max_length[100]');
       $this->form_validation->set_rules('amount', 'Amount', 'required');
       $this->form_validation->set_rules('e_date', 'Expiry Date', 'required');

        $where = array('custom' => $id );
               $ordeBy= array('0'=>['payment_id','desc'],
        );
            $payments=$this->Campgrounds->find('payments',$where,0,1,'','','','',$ordeBy);
            if(empty($payments)){
                  $insert_data=array(
                      'custom'=>$id,
                      'product_id'=>'34',
                      'txn_id'=>'Manual Payment',
                      'payment_gross'=>$data["amount"],
                      'currency_code'=>'USD',
                      'payer_email'=>'admin@coloradocampgrounds.us.com',
                      'payment_status'=>'Completed',
                      );

                    // $newuser=$this->Campgrounds->insert('payments',$insert_data);
                 $sql = $this->db->insert('payments',$insert_data); 
            }else{

                  $insert_data=array(
                    'payment_gross'=>$data["amount"],
                );
             
                $where = array('payment_id' => $payments->payment_id );
                $this->Campgrounds->update_data('','','payments',$insert_data,$where);
            }


        }
        if ($this->form_validation->run() == FALSE)
        {
            // $data = $this->input->post();
            $ins =$this->form_validation->error_array();
            $this->session->set_flashdata('error', $ins);
            $this->session->set_flashdata('data',$data);
            redirect($_SERVER['HTTP_REFERER']);

        }
        else
        {
          



            if (empty($_FILES['imageSubscriber']['name'])) {
                   if($subscribers->createdBy==1 || $subscribers->payment_by==2){
                    if($data['subscriberType']=='Manual Payment'){
                         $st=1;
                         $dateMonthYear = strtotime($data['e_date']);
                         $varDate = date("Y-m-d", $dateMonthYear);
                         $subId = '1-kolpmhyqekklj';
                     }else if($data['subscriberType']=='Free For Ever'){
                        $st=2;
                        $varDate=NULL;
                        $subId = NULL;
                    }

                       $insert_data=array(
                    'first_name'=>$data['first_name'],
                    'last_name'=>$data['last_name'],
                    'billing_address'=>$data['billing_address'],
                    'apartment'=>$data['apartment'],
                    'city'=>$data['city'],
                    'state'=>$data['state'],
                    'zip_code'=>$data['zip_code'],
                    'country'=>$data['country'],
                    'admin_status'=>$st,
                    'subscription_date'=>$varDate,
                    'subscription_id'=>$subId,
                 );
             }else{

                  $insert_data=array(
                    'first_name'=>$data['first_name'],
                    'last_name'=>$data['last_name'],
                    'billing_address'=>$data['billing_address'],
                    'apartment'=>$data['apartment'],
                    'city'=>$data['city'],
                    'state'=>$data['state'],
                    'zip_code'=>$data['zip_code'],
                    'country'=>$data['country'],
                );
             }
                $where = array('id' => $id );
                $this->Campgrounds->update_data('','','subscribe',$insert_data,$where);
                $this->session->set_flashdata('success1', 'Profile updated Successfully');
                redirect($_SERVER['HTTP_REFERER']);
            }else{



                $img='';


                $config['upload_path']          = './uploads/userImages/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['encrpy_name']  = 100;
                $config['file_name'] = date("Y_m_d H_i_s");

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('imageSubscriber'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('imageError1',$error);

                    redirect($_SERVER['HTTP_REFERER']);
                    // $this->load->view('upload_form', $error);
                }
                else
                {

                    $file_data =  $this->upload->data();
                    $img  = $file_data['file_name'];
                    if($subscribers->createdBy==1 && $subscribers->payment_by==2){
                         if($data['subscriberType']=='Manual Payment'){
                         $st=1;
                         $dateMonthYear = strtotime($data['e_date']);
                         $varDate = date("Y-m-d", $dateMonthYear);
                         $subId = '1-kolpmhyqekklj';
                     }else if($data['subscriberType']=='Free For Ever'){
                        $st=2;
                        $varDate=NULL;
                        $subId = NULL;
                    }
                               $insert_data=array(
                            'first_name'=>$data['first_name'],
                            'last_name'=>$data['last_name'],
                            'billing_address'=>$data['billing_address'],
                            'apartment'=>$data['apartment'],
                            'city'=>$data['city'],
                            'state'=>$data['state'],
                            'zip_code'=>$data['zip_code'],
                            'country'=>$data['country'],
                            'admin_status'=>$st,
                            'subscription_date'=>$varDate,
                            'subscription_id'=>$subId,
                         );
                    }else{
                    $insert_data=array(
                        'first_name'=>$data['first_name'],
                        'last_name'=>$data['last_name'],
                        'billing_address'=>$data['billing_address'],
                        'apartment'=>$data['apartment'],
                        'city'=>$data['city'],
                        'state'=>$data['state'],
                        'zip_code'=>$data['zip_code'],
                        'country'=>$data['country'],
                        'image'=>$img,
                    );
                }

                    $where = array('id' => $id );
                    $this->Campgrounds->update_data('','','subscribe',$insert_data,$where);
                    $this->session->set_flashdata('success1', 'Profile updated Successfully');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }

            // echo 'validation successfully';
        }
    }

    public function subscriberPagination($value='')
    {
        # code...

        // $join= array('0'=>['parentcampground','sitedescription.p_id = parentcampground.p_id','left'],
        //       '1'=>['childcampground','sitedescription.childId = childcampground.c_id','left'],
        //       '2'=>['region','parentcampground.regionId = region.id','left']);
        $select = "subscribe.id as sb_id,subscribe.*,free_trial.*";
        $start=$_REQUEST['start'];
        $end=$_REQUEST['length'];
        $where = "subscribe.status= 1 AND  subscribe.first_name!='Anonymous' AND subscribe.id!=45 AND subscribe.free_trial = 0";
        $like='';
        $join= array('0'=>['free_trial','subscribe.id = free_trial.user_id','left']);


        // if(!empty($_REQUEST['dateRange']))
        // {
        //   $date=explode('-', $_REQUEST['dateRange']);
        //   $where .=" AND ( subscribe.subscription_date>='".$date[0]."'  AND subscribe.subscription_date<='".$date[1]."') ";
        // }


        //test
        if(!empty($_REQUEST['from'])){
            $old_date_timestamp = strtotime($_REQUEST['from']);
            $new_date = date('y-m-d', $old_date_timestamp);
            // 'comments.created_at <='=>$new_dateto\

            $where.=" AND DATE(subscribe.subscription_date) >= '".$new_date."' ";
        }
        if(!empty($_REQUEST['to'])){
            $old_date_timestamp = strtotime($_REQUEST['to']);
            $new_date = date('y-m-d', $old_date_timestamp);
            // 'comments.created_at <='=>$new_dateto\

            $where.=" AND DATE(subscribe.subscription_date) <= '".$new_date."' ";
        }

        if(!empty($_REQUEST['type']))
        {
            
             $where.=" AND subscribe.payment_by = ".$_REQUEST['type']." ";
        }
        //end test
     
        if(!empty($_REQUEST['search']['value']))
        {
            // print_r('searcj');
            $where .=" AND  subscribe.first_name LIKE '%".$_REQUEST['search']['value']."%' ";
            // $like=array('subscribe.first_name' => $_REQUEST['search']['value']);
        }
        // $ma=0;
        // $na=0;
        // if(!empty($_REQUEST['campsite'])){
        //     $like=array('sitedescription.site_no' => $_REQUEST['campsite']);
        //      $ma=1;
        // }else{
        //     $like='';
        // }

        // if(!empty($_REQUEST['extra_search'])){
        //      if($ma==1){
        //         $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'parentcampground.name' => $_REQUEST['extra_search']);
        //         }else{
        //           $like=array('parentcampground.name' => $_REQUEST['extra_search']);
        //           // print_r('ma=0');
        //         }

        //         $na=1;
        // }
        //  if(!empty($_REQUEST['child'])){
        //      if($ma==1 && $na==0){
        //         $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'childcampground.c_name' => $_REQUEST['child']);
        //         }else if($ma==1 && $na==1){
        //           $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'childcampground.c_name' => $_REQUEST['child'],'parentcampground.name' => $_REQUEST['extra_search']);
        //           // print_r('ma=0');
        //         }else if($ma==0 && $na==0){
        //             $like=array('childcampground.c_name' => $_REQUEST['child']);
        //         }else if($ma==0 && $na==1)
        //         {
        //             $like=array('childcampground.c_name' => $_REQUEST['child'],'parentcampground.name' => $_REQUEST['extra_search']);
        //         }
        // }
        $ordeBy= array('0'=>['subscribe.id','desc'],
        );
        $subscribers=$this->Campgrounds->find('subscribe',$where,$start,$end,1,$join,$like,$select,$ordeBy);
        $totaldata =$this->Campgrounds->findNumRows('subscribe',$where,'','');
        $i=1;
        if($start==0){
            $start=1;
        }
        $i=$i*$start;
        $a = 1;
        $columns=array();
        // foreach ($sire_Descriptions as $site) {
        // if($site->draft==0){
        //     $status='Draft';
        // }else{
        //     if($site->live==1){
        //          $status='Activated';
        //     }else{
        //          $status='De-Activated';
        //     }
        // }
        foreach ($subscribers as $subscriber) {
            $date=date_create($subscriber->created_at);
            $date1= date_format($date,"d-F-Y");

            if(isset($subscriber->subscription_date)){
                $date2=date_create($subscriber->subscription_date);
                $date3= date_format($date2,"d-F-Y");

            }

            elseif(!isset($subscriber->subscription_date) && $subscriber->admin_status == 2 && $subscriber->payment_by==1)
            {
                $date3="-";
            }else if(!isset($subscriber->subscription_date) && $subscriber->payment_by==2){
                $date3="Check Pending";
            }else{
                $date3="No Payment done yet";
            }


            if( isset($subscriber->subscription_date) && $subscriber->admin_status==1 ){
                $datetime1 = strtotime(date('l'));
                $datetime2 = strtotime($subscriber->subscription_date);

                $secs = $datetime2 - $datetime1;// == <seconds between the two times>
                $days = $secs / 86400;
                if($days>0){
                    $status='Active';
                }else{
                    $status='Expired';
                }

            }

            else if($subscriber->admin_status==2 ){
                $status='Free Account';
            }

            else{
                $status='Inactive';
            }
            if($subscriber->payment_by==2)
            {
                $pya='Check';
            }else{
                $pya='PayPal';
            }

            $freeTrial = '';
            if(isset($subscriber->start_date)){
                $freeTrial = 'Yes';
            }else{
                $freeTrial = 'No';
            }
            $columns[] = array(
                'no'=>$i,
                'id'  =>   $subscriber->sb_id,
                'date'  =>   $date1,
                'name' =>  $subscriber->first_name .' '.$subscriber->last_name ,
                // 'email' => $subscriber->email,
                'type'=>$pya,
                'admin_status'=>$subscriber->admin_status,
                'expire'=>$date3,
                'free_trial' => $freeTrial,
                'status'=>$status,
            );
            $i++;
            $a++;
        }
        $total=$totaldata;
        $json_data = array(
            "draw"            => intval( $_REQUEST['draw'] ),
            "recordsTotal"    => intval( $total ),
            "recordsFiltered" => intval( $total ),
            "data"            => $columns,
        );
        echo json_encode($json_data);
    }


    // Free trial pagination



    public function FreeTrialPagination($value='')
    {
        # code...

        // $join= array('0'=>['parentcampground','sitedescription.p_id = parentcampground.p_id','left'],
        //       '1'=>['childcampground','sitedescription.childId = childcampground.c_id','left'],
        //       '2'=>['region','parentcampground.regionId = region.id','left']);
       $select = "subscribe.id as sb_id,subscribe.*,free_trial.*";
        $start=$_REQUEST['start'];
        $end=$_REQUEST['length'];
        $where = "subscribe.status= 1 AND  subscribe.first_name!='Anonymous' AND subscribe.id!=45 AND subscribe.free_trial != 0";

        $like='';
        $join= array('0'=>['free_trial','subscribe.id = free_trial.user_id','left']);

        // if(!empty($_REQUEST['dateRange']))
        // {
        //   $date=explode('-', $_REQUEST['dateRange']);
        //   $where .=" AND ( subscribe.subscription_date>='".$date[0]."'  AND subscribe.subscription_date<='".$date[1]."') ";
        // }

        //test
        if(!empty($_REQUEST['from'])){
            $old_date_timestamp = strtotime($_REQUEST['from']);
            $new_date = date('Y-m-d', $old_date_timestamp);
            // 'comments.created_at <='=>$new_dateto\

            $where.=" AND DATE_FORMAT(subscribe.subscription_date  , '%Y-%m-%d') >= '".$new_date."' ";
        }
        if(!empty($_REQUEST['to'])){
            $old_date_timestamp = strtotime($_REQUEST['to']);
            $new_date = date('Y-m-d', $old_date_timestamp);
            // 'comments.created_at <='=>$new_dateto\

            $where.=" AND DATE_FORMAT(subscribe.subscription_date , '%Y-%m-%d') <= '".$new_date."' ";
        }

//        if(!empty($_REQUEST['type']))
//        {
//
//             $where.=" AND subscribe.payment_by = ".$_REQUEST['type']." ";
//        }
        //end test
     
        if(!empty($_REQUEST['search']['value']))
        {
            // print_r('searcj');
            $where .=" AND  subscribe.first_name LIKE '%".$_REQUEST['search']['value']."%' ";
            // $like=array('subscribe.first_name' => $_REQUEST['search']['value']);
        }
        // $ma=0;
        // $na=0;
        // if(!empty($_REQUEST['campsite'])){
        //     $like=array('sitedescription.site_no' => $_REQUEST['campsite']);
        //      $ma=1;
        // }else{
        //     $like='';
        // }

        // if(!empty($_REQUEST['extra_search'])){
        //      if($ma==1){
        //         $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'parentcampground.name' => $_REQUEST['extra_search']);
        //         }else{
        //           $like=array('parentcampground.name' => $_REQUEST['extra_search']);
        //           // print_r('ma=0');
        //         }

        //         $na=1;
        // }
        //  if(!empty($_REQUEST['child'])){
        //      if($ma==1 && $na==0){
        //         $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'childcampground.c_name' => $_REQUEST['child']);
        //         }else if($ma==1 && $na==1){
        //           $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'childcampground.c_name' => $_REQUEST['child'],'parentcampground.name' => $_REQUEST['extra_search']);
        //           // print_r('ma=0');
        //         }else if($ma==0 && $na==0){
        //             $like=array('childcampground.c_name' => $_REQUEST['child']);
        //         }else if($ma==0 && $na==1)
        //         {
        //             $like=array('childcampground.c_name' => $_REQUEST['child'],'parentcampground.name' => $_REQUEST['extra_search']);
        //         }
        // }
        $ordeBy= array('0'=>['subscribe.id','desc'],
        );
//        echo $where;
//        die($where);
        $subscribers=$this->Campgrounds->find('subscribe',$where,$start,$end,1,$join,$like,$select,$ordeBy);
        $totaldata =$this->Campgrounds->findNumRows('subscribe',$where,'','');
        $i=1;
        if($start==0){
            $start=1;
        }
        $i=$i*$start;
        $a = 1;
        $columns=array();
        // foreach ($sire_Descriptions as $site) {
        // if($site->draft==0){
        //     $status='Draft';
        // }else{
        //     if($site->live==1){
        //          $status='Activated';
        //     }else{
        //          $status='De-Activated';
        //     }
        // }

        foreach ($subscribers as $subscriber) {
            $date=date_create($subscriber->start_date);
             $date1= date_format($date,"d-F-Y");
                 
            if(isset($subscriber->subscription_date)){
                $date2=date_create($subscriber->subscription_date);
                $date3= date_format($date2,"d-F-Y");

            }

            elseif(!isset($subscriber->subscription_date) && $subscriber->admin_status == 2 && $subscriber->payment_by==1)
            {
                $date3="-";
            }else if(!isset($subscriber->subscription_date) && $subscriber->payment_by==2){
                $date3="Check Pending";
            }else{
                $date3="No Payment done yet";
            }



            if( isset($subscriber->subscription_date) && $subscriber->admin_status==1 ){
                $datetime1 = strtotime(date('l'));
                $datetime2 = strtotime($subscriber->subscription_date);

                $secs = $datetime2 - $datetime1;// == <seconds between the two times>
                $days = $secs / 86400;
                if($days>0){
                    $status='Active';
                }else{
                    $status='Expired';
                }

            }

            else if($subscriber->admin_status==2 ){
                $status='Free Account';
            }

            else{
                $status='Inactive';
            }
            if($subscriber->payment_by==2)
            {
                $pya='Check';
            }else{
                $pya='PayPal';
            }
            $columns[] = array(
                'no'=>$i,
                'id'  =>   $subscriber->sb_id,
                'date'  =>   $date1,
                'name' =>  $subscriber->first_name .' '.$subscriber->last_name ,
                // 'email' => $subscriber->email,
                'type'=>$pya,
                'admin_status'=>$subscriber->admin_status,
                'expire'=>$date3,
                'status'=>$status,
                'start_date' =>date_format(date_create($subscriber->start_date),"d-F-Y"),
                'end_date' => date_format(date_create($subscriber->end_date),"d-F-Y"),

            );
            $i++;
            $a++;
        }
        $total=$totaldata;
        $json_data = array(
            "draw"            => intval( $_REQUEST['draw'] ),
            "recordsTotal"    => intval( $total ),
            "recordsFiltered" => intval( $total ),
            "data"            => $columns,
        );
        echo json_encode($json_data);
    }
// transectional Email
        public function transactionalEmail( $user ) {

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
        'subject' => 'Account Deletion',
        'from_email' => 'admin@coloradocampgrounds.development-env.com',
        'from_name'=> 'Colorado Campgrounds',
        'to' => array(array('email' => $user[0]->email, 'name' => 'colorado') ),
        );

    $template_name = 'Account Deletion';

    $template_content = array(
        array(
            'name' => 'u_date',
            'content' => date("l jS \of F Y") ),
        array(
            'name' => 'u_name',
            'content' => $user[0]->first_name),

    );

    $response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);

    //end test

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
       

}

    //end transectonal email


    public function PaymentPagination($value='')
    {
        # code...

        $join= array('0'=>['subscribe','subscribe.id = payments.custom','inner']);
        // '1'=>['childcampground','sitedescription.childId = childcampground.c_id','left'],
        // '2'=>['region','parentcampground.regionId = region.id','left']);
        $select = "*";
        $start=$_REQUEST['start'];
        $end=$_REQUEST['length'];
        // $where = array('payments.status' => 1 );
        $like='';
        $where=array('0'=>['subscribe.email !=' => 'anonymous@gmail.com' ]);
        if(!empty($_REQUEST['search']['value']))
        {
            // print_r('searcj');
            $like=array('subscribe.first_name' => $_REQUEST['search']['value']);
        }

        if(!empty($_REQUEST['dateRange']))
        {
            // print_r($_REQUEST['dateRange']);return;
            $date=explode('-', $_REQUEST['dateRange']);
            // print_r($date);return;
            $where= array('0'=>['payments.date >=' =>  date('Y-m-d', strtotime($date[0]))],'1'=>['payments.date <='=>date('Y-m-d', strtotime($date[1]))]);
            // $where= array('date >=' => $date[0] ,'date <=' =>$date[1] );
        }
        // $ma=0;
        // $na=0;
        // if(!empty($_REQUEST['campsite'])){
        //     $like=array('sitedescription.site_no' => $_REQUEST['campsite']);
        //      $ma=1;
        // }else{
        //     $like='';
        // }

        // if(!empty($_REQUEST['extra_search'])){
        //      if($ma==1){
        //         $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'parentcampground.name' => $_REQUEST['extra_search']);
        //         }else{
        //           $like=array('parentcampground.name' => $_REQUEST['extra_search']);
        //           // print_r('ma=0');
        //         }

        //         $na=1;
        // }
        //  if(!empty($_REQUEST['child'])){
        //      if($ma==1 && $na==0){
        //         $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'childcampground.c_name' => $_REQUEST['child']);
        //         }else if($ma==1 && $na==1){
        //           $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'childcampground.c_name' => $_REQUEST['child'],'parentcampground.name' => $_REQUEST['extra_search']);
        //           // print_r('ma=0');
        //         }else if($ma==0 && $na==0){
        //             $like=array('childcampground.c_name' => $_REQUEST['child']);
        //         }else if($ma==0 && $na==1)
        //         {
        //             $like=array('childcampground.c_name' => $_REQUEST['child'],'parentcampground.name' => $_REQUEST['extra_search']);
        //         }
        // }
        $ordeBy= array('0'=>['payments.payment_id','desc'],
        );
        $payments=$this->Campgrounds->findSearchIssue('payments',$where,$start,$end,1,$join,$like,$select,$ordeBy);
        $totaldata =$this->Campgrounds->findNumRowsForaboveCode('payments',$where,$join);
        $i=1;
        if($start==0){
            $start1=1;
        }else{
            $start1=$start+1;
        }
        $i=$i*$start1;
        $a = 1;
        $columns=array();
        // foreach ($sire_Descriptions as $site) {
        // if($site->draft==0){
        //     $status='Draft';
        // }else{
        //     if($site->live==1){
        //          $status='Activated';
        //     }else{
        //          $status='De-Activated';
        //     }
        // }
        foreach ($payments as $payment) {
            // print_r($payment);return;
            $date=date_create($payment->date);
            $date1= date_format($date,"d-F-Y");
            // if($subscriber->admin_status==1){
            //     $status='Unblocked';
            // }else{
            //     $status='Blocked';
            // }
            //  $currentDate=date($date1);
            // $dateMonthYear = strtotime("+365 days", strtotime($currentDate));
            $columns[] = array(
                'no'=>$i,
                'id'  =>   $payment->payment_id,
                'date'  =>   $date1,
                'name' =>  $payment->first_name .' '.$payment->last_name ,
                'email' => $payment->email,
                'currency'=>$payment->payment_gross.' '.$payment->currency_code,
                'txn'=>$payment->txn_id,
                'user_id' =>$payment->id,
                // 'expire'=>$subscription,
            );
            $i++;
            $a++;
        }
        $total=$totaldata;
        $json_data = array(
            "draw"            => intval( $_REQUEST['draw'] ),
            "recordsTotal"    => intval( $total ),
            "recordsFiltered" => intval( $total ),
            "data"            => $columns,
        );
        echo json_encode($json_data);
    }


};

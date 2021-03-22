<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

	require_once('vendor/mailchimp/transactional/lib/Configuration.php');
	require_once('vendor/mailchimp/marketing/lib/Configuration.php');
	require 'vendor/autoload.php';

class HomeController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
	 	// if(isset($this->session->userdata['userdata'])  && $this->session->userdata['userdata']['days'] <0){
	 	// 	$this->layout="home/layout/subscription_expire_layout";
	 	// }else{
		$this->layout="home/layout/layout";
	 	// }

		$this->load->library("pagination");
	}


	public function index()
	{
		
		$data['information']=$this->Campgrounds->getInformationHOme();
		$data['homeContent']=$this->Campgrounds->getHomeContent();
		$data['homeImages']=$this->Campgrounds->getBannerImagesAll();
		$data['homeRegion']=$this->Campgrounds->getAllRegion();
		$data['blogs']=$this->Campgrounds->loadThreeBlogComments();
		$data['home_image'] = $this->Campgrounds->find("home_page_image",'','','',1);

	$this->db->select('slug')->from('take_peak_campground')
	 ->where('id',1) ;
	 $query = $this->db->get();        
	 $data['campground'] = $query->result();
	 
	 $this->db->select("*")->from('newsletter1')->limit(2)->order_by('created_at', 'desc');
	 $query = $this->db->get();
	 $newsletter = $query->result(); 
	 // print_r($result);
	 // die();
		//echo"<pre>";print_r($data['homeRegion']);exit;
		$data['title']='Find Your Campsite in Colorado';
		$data['yield']='home/home';
		$data['newsletters'] = $newsletter;
		 // $this->db->select('description')->from('description') ;
			
			// $query = $this->db->get();        
	  //  		$data['description'] = $query->result();

        $data['parent']=$this->Campgrounds->findNumRows('parentcampground',array('draft'=>0));
        $data['child']=$this->Campgrounds->findNumRows('childcampground',array('c_live'=>1));
        $data['campsite']=$this->Campgrounds->findNumRows('sitedescription',array('live'=>1,'import'=>0));
        $data['region']=$this->Campgrounds->findNumRows('region');

        $where = array('seo_for' => 'Home');
        $seo=$this->Campgrounds->find('region_seo',$where,'','','','','','');
//                print_r($seo);return;
        // $data['title']=$seo->title;
        $data['metadescription']=$seo->description;
        $data['metakeywords']=$seo->tags;

		$this->load->view($this->layout,$data);
		// $this->load->view('home/home');
	}


	public function explore()
	{
		// die(var_dump($this->session->userdata['userdata']));
		// $temp = -1;

		// $this->Campgrounds->checkSubscriptionExp();
		$data['homeRegion']=$this->Campgrounds->getAllRegion();
		$data['title']='Select a region to explore the Campgrounds and Campsites';
		$data['yield']='home/explore';

		$this->load->view($this->layout,$data);
	}

	public function myInformation($slug='' , $child_slug=null)
	{   

		//$data['[title']="Information pages";
		
		if(isset($this->session->userdata['admindata']['adminId']))
		{

			//$where = array('id =' => $this->userId);
			if($slug !=''){

				//print_r($slug);exit;
				$select = "*,subscribe.id as IDS,subscribe.created_at as create,comments.created_at as datenew ,comments.id as comID";
				$join= array('0'=>['subscribe','comments.sender_id = subscribe.id','left']);
				$data['information']=$this->Campgrounds->getInformationforHome();
				$where = array('slug' => $slug );
				//print_r($slug );exit;
				$data['information_rows'] = $this->Campgrounds->find("informationalpages",$where,'','',1);
				if(empty($data['information_rows'])){

					redirect(base_url().'404');
					return false;
				}
				//print_r($data['information_rows']);exit;
				$id_info=$data['information_rows'][0]->info_id;
				$where = array('comments.informationalpages_id' => $id_info );
				$ordeByCom= array(
					'0'=>['comments.id','desc'],
				);
				$start='0';
				$end=10;
				$data['countTotal'] = $this->Campgrounds->find("comments",$where,'','',1,$join,'',$select,$ordeByCom);
				$data['comments'] = $this->Campgrounds->find("comments",$where,$start,$end,1,$join,'',$select,$ordeByCom);
				// echo "<pre>";print_r($data['comments']);exit;

				 if($child_slug != null)
		         {
		         	
		         	//information 
		         	$select = "*,subscribe.id as IDS,subscribe.created_at as create,comments.created_at as datenew ,comments.id as comID";
				$join= array('0'=>['subscribe','comments.sender_id = subscribe.id','left']);
				$data['information']=$this->Campgrounds->getInformationforHome();
				$where = array('slug' => $slug );
				//print_r($slug );exit;
				$data['information_rows'] = $this->Campgrounds->find("informationalpages",$where,'','',1);
				//print_r($data['information_rows']);exit;
				$id_info=$data['information_rows'][0]->info_id;
				$where = array('comments.informationalpages_id' => $id_info );
				$ordeByCom= array(
					'0'=>['comments.id','desc'],
				);
				$start='0';
				$end=10;
				$data['countTotal'] = $this->Campgrounds->find("comments",$where,'','',1,$join,'',$select,$ordeByCom);
				$data['comments'] = $this->Campgrounds->find("comments",$where,$start,$end,1,$join,'',$select,$ordeByCom);
	         	//end information

		       	$this->db->select("info_id");
				   $this->db->from("informationalpages");
				   $this->db->where('slug' , $slug) ;
				    //$this->db->where('live',1);
				  //$this->db->order_by('info_id', 'asc');
				   
				   $query = $this->db->get();        
				   $info_id = $query->result();     	 


	         	$where = array('menu_slug' => $child_slug , 'informationalpages_id'=>$info_id[0]->info_id);
					 //print_r($slug );exit;
				$data['menu_item'] = $this->Campgrounds->find("menuitem",$where,'','',1);
					

   			   	$data['title']=$data['menu_item'][0]->menu_page_title;
				$data['metadescription']=$data['menu_item'][0]->menu_seo_description;
				$data['metakeywords']=$data['menu_item'][0]->menu_keywords;

				$data['yield']='home/login/menu_item_admin.php';
	         }else
	         {
	         	$data['title']=$data['information_rows'][0]->title;
				$data['metadescription']=$data['information_rows'][0]->meta_description;
				$data['metakeywords']=$data['information_rows'][0]->keyword;
				$data['yield']='home/login/informationalhome.php';
	         }
				$this->load->view($this->layout,$data);
			}else{

				$data['information']=$this->Campgrounds->getInformationforHome();
				$data['information_rows']=$this->Campgrounds->getInformationAll();
				//print_r($data['information_rows'][0]->info_id);exit;
				$id_info=$data['information_rows'][0]->info_id;
				$select = "*,subscribe.id as IDS,subscribe.created_at as create,comments.created_at as datenew ,comments.id as comID";
				$join= array('0'=>['subscribe','comments.sender_id = subscribe.id','left']);
				$where = array('informationalpages_id' => $id_info );
				$ordeByCom= array(
					'0'=>['comments.id','desc'],
				);
				$start='0';
				$end=10;
				$data['countTotal'] = $this->Campgrounds->find("comments",$where,'','',1,$join,'',$select,$ordeByCom);
				$data['comments'] = $this->Campgrounds->find("comments",$where,$start,$end,1,$join,'',$select,$ordeByCom);
				//print_r(expression)

				$data['title']=$data['information_rows'][0]->title;
				$data['metadescription']=$data['information_rows'][0]->meta_description;
				$data['metakeywords']=$data['information_rows'][0]->keyword;
				$data['yield']='home/login/informationalhome.php';
				$this->load->view($this->layout,$data);
			}
		}else{

			redirect(base_url().'admin/login');
		}
	}
		public function information_nextLoad()
{
		 
		$id=$this->input->post('id');
			$where = array('informationalpages_id' => $id );
			$c=$this->input->post('count');
			//print_r($c);exit;
			 $ordeByCom= array(
                    '0'=>['comments.id','desc'],
           );
  		 	$startnext=$c;
			$endnext=10;
  		 	$joinnextcom= array('0'=>['replys','comments.id = replys.comment_id','left']);
  		 		$selectnextcom = "*,replys.id as RIDS ,comments.id as comID";
  		 	$dataa= $this->Campgrounds->find("comments",$where,$startnext,$endnext,1,$joinnextcom,'',$selectnextcom,$ordeByCom);

  		 	$join= array('0'=>['subscribe','comments.sender_id = subscribe.id','left']);
  		 	$select = "*,subscribe.id as IDS,subscribe.created_at as create,comments.created_at as datenew ,comments.id as comID";


$comments = $this->Campgrounds->find("comments",$where,$startnext,$endnext,1,$join,'',$select,$ordeByCom);

  		 	$html='
<ul class="comment-list">';
foreach($comments as $key => $comment) {
$html.='<li class="new-comment-show">'; 
                                                $select = "*,subscribe.id as IDS,replys.id as replyID,";
                                          $join= array('0'=>['subscribe','replys.user_id = subscribe.id','left']);
                                              $where = array('comment_id' => $comment->comID );
                                              $replys = $this->Campgrounds->find("replys",$where,'','',1,$join,'',$select,'');
                                       $html.='<div class="thumb-list  newCommentsshow">
                                         
                                            <figure>';
                                             if($comment->image!=''){ 
                                           $html.='<img alt="" src="'.base_url().'/uploads/userImages/'.$comment->image.'"> '; }
                                           elseif($comment->image=='' &&  $comment->sender_id==0){
                                           	$html.='<img alt="" src="'.base_url().'/assets/admin/img/logo.png">
                                           '; }else{ 
                                           	$html.='<img alt="" src="'. base_url().'/assets/images/test.jpg">';}
                                           	$html.='  
                                           </figure>
                                           <div class="text-holder">
                                            
                                              ';
                                              $old_date_timestamp = strtotime($comment->datenew);
                                              $new_date = date('M d, y h:i', $old_date_timestamp); 
                                            // print_r($comment->created_at);
                                             $html.='
                                                <h6>
                                               ';
                                                if($comment->first_name!=''){
                                                 $html.=' '. $comment->first_name.' '.$comment->last_name .'';
                                                }else{
                                                   $html.= 'Admin';
                                                }
                                                $html.='</h6>                                              
                                               
                                              <time class="post-date" datetime="">'.$new_date.'</time><br>
                                              <p class="thumb-list-'.$comment->comID.'">'. $comment->comment.'</p>
                                            
                                           </div>
                                         
                                        </div>
                                        <ul class="children">
                                           <li class="reply-go-'.$comment->comID.'">
                                           '; foreach ($replys as $key => $reply) {
                                              $old_date_timestamp = strtotime($reply->create_at);
                                              $new_date = date('M d, y h:i', $old_date_timestamp); 
                                             // print_r($new_date);
                                             
                                             $html.='
                                              <div class="thumb-list">
                                                 <figure>';
                                                  if($reply->image!=''){ 
                                            $html.='<img alt="" src="'.base_url().'/uploads/userImages/'.$comment->image.'">
                                          '; }
                                           elseif($reply->image=='' &&  $reply->user_id==0){$html.='
                                            <img alt="" src="'. base_url().'/assets/admin/img/logo.png">
                                           '; }else{ $html.='
                                            <img alt="" src="'.base_url().'/assets/images/test.jpg">
                                          '; } $html.='
                                                 </figure>
                                                 <div class="text-holder">
                                                    <h6>'; 
                                                if($reply->first_name!=''){
                                                  $html.=''.$reply->first_name.' '.$reply->last_name.'';
                                                }else{
                                                   $html.='Admin';
                                                }
                                                $html.='</h6>
                                                   
                                                    
                                                    <time class="post-date" datetime="">'. $new_date.'</time><br>
                                                    <p class="thumb-list-repy-'.$reply->replyID.'">'.$reply->comment_reply.'</p>
                                                 </div>
                                              </div>
                                            ';
                                             } $html.='
                                           </li>
                                           <!-- #comment-## -->
                                        </ul>
                                         ';  
                                        $html.='
                                     </li>';
                                     }
                                  $html.='</ul>';
  		 		  // echo "<pre>";print_r($html);exit;
                                  $arrayName = array('0' =>$html ,'1'=>$c );
       echo json_encode($arrayName); 
	
}

//changes by adil
public function blogDetail($id)
{
	// if(!empty($this->session->userdata['userdata']['id'])){

	// die(var_dump($this->session->userdata['userdata']));

 	$data['blog_detail'] = $this->Campgrounds->getBlogDetail($id) ;
 	if(!empty($data['blog_detail']) && isset($data['blog_detail'])){

	$data['title']= $data['blog_detail'][0]->page_title;
	$data['yield']='home/blog-pages/blog_detail.php';
	$data['metadescription']= $data['blog_detail'][0]->blog_descrip_tag;
	$data['metakeywords']= $data['blog_detail'][0]->blog_keywords;
	$data['lastFiveBlog'] = $this->Campgrounds->lastFiveBlog();

	$data['blog_comments'] = $this->Campgrounds->approvedComments($id) ;

	$this->load->view($this->layout,$data) ;
}else{
	redirect(base_url().'404');
}

// }else{
// 	redirect(base_url()."login");
// }

}

public function forum()
{

	//$data['forums'] = $this->Campgrounds->getAllForums() ;
	// $this->Campgrounds->checkSubscriptionExp();
	if(!empty($this->session->userdata['userdata']['id'])){
	$data['title']='forum' ;
	$data['yield']='home/forum-pages/add_forum.php';

	$this->load->view($this->layout,$data) ;

  }else{
  	redirect(base_url());
  }
}


public function forumSearchAndPagination()
{
	$data = $this->input->post() ;

	$page_num = $data['page_num'] ;

        if ($page_num==1)
            $offset = 0;
        else
        {
            $offset = ($page_num-1) * 10;
        }
        
        if($data['forms_input'] == '')
        {
        	  $forums = $this->Campgrounds->getAllForumsPagination($offset) ;
     	 
        	  	 $totalRows =  $this->db
		        ->where('forum_approval', 1)
		        ->where('block', 0)
		        ->count_all_results('forums');

		     	  $data = array([
		     	  	'forums'=>$forums , 
		     	  	'totalRows'=>$totalRows,
		     	]) ;

		        echo json_encode($data) ;
        }else{

        	$forums = $this->Campgrounds->getAllForumsPagination($offset,$data['forms_input']) ;

        	 $totalRows =  $this->db
		        ->where('forum_approval', 1)
		        ->where('block', 0)
                 ->like('question', $data['forms_input'])
                 ->limit(10, $offset)
		        ->count_all_results('forums');

		     	  $data = array([
		     	  	'forums'=>$forums, 
		     	  	'totalRows'=>$totalRows,
		     	]) ;
       		 echo json_encode($data) ;
       	 }

       
}

public function updateForum()
{
		$data = $this->input->post();
		$insert_data=array(

					'question'=>$data['forum_question'],
					'description'=>$data['question_description'],
					'forum_approval'=>0,
				
				);

					$where = array('forum_id' => $data['modalId'] );

					$this->Campgrounds->update_data('modalId',$data['modalId'],'forums',$insert_data,$where);

					$this->session->set_flashdata('success1-edit', 'Success! Your edits are waiting admin approval.');
			        redirect($_SERVER['HTTP_REFERER']);

					//redirect(base_url().'add-forum-page');
	
}

public function forumDetail($id)
{

	if(!empty($this->session->userdata['userdata']['id'])){

	$data['title']='forum detail' ;
	$data['yield']='home/forum-pages/forum_detail.php';
	$data['forum_detail'] = $this->Campgrounds->getForumDetail($id) ;
	// print_r($data['forum_detail']);return;
	if(!empty($data['forum_detail'] ) && $data['forum_detail'][0]->forum_approval==1) {
	$data['forum_comments'] = $this->Campgrounds->getForumComents($id) ;


	$this->load->view($this->layout,$data) ;
	}else{
		redirect(base_url().'404');
	}

	}else{
		redirect(base_url());
	}
}

public function addForum()
{
	$uniqueId= time().'-'.mt_rand();

	$data = array(
		'question' => $this->input->post('forum_question'),
		'description' => $this->input->post('question_description'),
		'user_id' => $this->session->userdata['userdata']['id'],
		'secure_id' => $uniqueId,
	);

 	$this->Campgrounds->insert('forums',$data) ;
}

public function blogsBrows()
{

	// if(!empty($this->session->userdata['userdata']['id'])){
	$data['title']='all blogs' ;
	$data['yield']='home/blog-pages/blogs.php';
	$data['blogs']=$this->Campgrounds->getAllBlogs() ;

	$this->load->view($this->layout,$data) ;
	 // }else{
	 // 	redirect(base_url()."login");
	 // }
}

public function searchListBlog()
{
	$endnext=9;
if($this->input->post('current')==1){
	$c=0;
}else{
	$c=($this->input->post('current')-1)*$endnext;
}
	$startnext=$c;

	$query = $this->db->query('SELECT * FROM blog where status = 1');
	$totalBlog = $query->num_rows();

	$order= array(
					'0'=>['blog_id','desc'],
				);

	// $order = [
	// 	0=>'blog_id', 
	// 	1=>'DESC'
	// ] ;

	$where = array('status =' => 1);
	$bloglist= $this->Campgrounds->find("blog",$where,$startnext,$endnext,1,'','','',$order);
	$array=array('0'=>$bloglist,'1'=>$totalBlog);
	echo json_encode($array);
}




public function newsletterPagination()
{

if($this->input->post('current')==1){
	$c=0;
}else{
	$c=($this->input->post('current')-1)*$endnext;
}
	$startnext=$c;

	$query = $this->db->query('SELECT * FROM newsletter1');
	$totalBlog = $query->num_rows();
	$letters = $query->result();
	// $order= array(
	// 				'0'=>['blog_id','desc'],
	// 			);

	// $order = [
	// 	0=>'blog_id', 
	// 	1=>'DESC'
	// ] ;

	// $where = array('status =' => 1);
	// $bloglist= $this->Campgrounds->find("blog",$where,$startnext,$endnext,1,'','','',$order);
	$array=array('0'=>$letters,'1'=>$totalBlog);
	echo json_encode($array);
}









public function importantInformation($id)
{
	$data['title']='important informtion page' ;
	$data['yield']='home/imp-info-pages/imp-info-page.php';
//	$data['blogs']=$this->Campgrounds->getAllBlogs() ;

	$this->load->view($this->layout,$data) ;
}

public function aboutUs()
{
	$data['title']='about us' ;
	$data['yield']='home/login/about-us.php';

	 $this->db->select('*')->from('about_us') ;
			
			$query = $this->db->get();        
	   		$data['content'] = $query->result();

	$this->load->view($this->layout,$data) ;
}


public function termOfService()
{
	$data['title']='Terms and Conditions of Use' ;
	$data['yield']='home/login/terms_of_service.php';

	 $this->db->select('*')->from('term_of_service') ;
			
			$query = $this->db->get();        
	   		$data['content'] = $query->result();

	 $this->load->view($this->layout,$data) ;
}

//changes by adil

public function ckeditor($value='')
{
	if(isset($_FILES['upload']['name']))
	{
	 $file = $_FILES['upload']['tmp_name'];

	 $file_name = $_FILES['upload']['name'];
	 $file_name_array = explode(".", $file_name);
	 $extension = end($file_name_array);
	 $new_image_name = rand() . '.' . $extension;
	 // chmod('upload', 0777);
	 $allowed_extension = array("jpg", "gif", "png");
	 if(in_array($extension, $allowed_extension))
	 {
	  move_uploaded_file($file, 'images/' . $new_image_name);
	  $function_number = $_GET['CKEditorFuncNum'];
	  $url = base_url().'/images/' . $new_image_name;
	  $message = '';
	  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
	 }
	}
}


public function subscriberOnly()
{
	$data = $this->input->post();

	 $this->db->where('email', $data['email']);
    $query = $this->db->get('subscribe');
    if ($query->num_rows() == 0){

    	// enter the email for subscription
    	 $this->db->where('email', $data['email']);
    	$query = $this->db->get('newsletter');
    	 if ($query->num_rows() == 0){
    	$insert_data=array(
					'email'=>$data['email'],
				);

	$this->Campgrounds->insert('newsletter',$insert_data) ;



    	// enter the email for subscription
       $email = $data['email'] ;
	   $apiKey = '96b6f7bfa7eaf9e9a9b163b39d391e31-us5';
        $listID = '64d05e9579';
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

		echo "true";	
		}else{
		echo "false";
		}
    }else{
    	echo "false";
    }




	
}


public function disclaimer()
{
	$data['title']='disclaimer' ;
	$data['yield']='home/login/disclaimer.php';

	 $this->db->select('*')->from('description') ;
			
			$query = $this->db->get();        
	   		$data['description'] = $query->result();

	 $this->load->view($this->layout,$data) ;
}

public function policy()
{
	$data['title']='policy' ;
	$data['yield']='home/login/policy.php';
	
	 $this->db->select('*')->from('policy') ;
			
			$query = $this->db->get();        
	   		$data['policy'] = $query->result();

	 $this->load->view($this->layout,$data) ;
}

public function default_campground( $slug )
{

	redirect(base_url()."login");
	$this->db->select('titile')->from('take_peak_campground') ;
			
	$query = $this->db->get();        
	$data['title'] = $query->result();

	$data['title']=$data['title'][0]->titile ;
	$data['yield']='home/login/default_campground.php';
	
	 $this->db->select('*')->from('take_peak_campground')
	 ->where('id',1) ;
			
			$query = $this->db->get();        
	   		$data['campground'] = $query->result();

	 $this->load->view($this->layout,$data) ;
}

		public function exampleCampground()
		{	
			$select = "*,region.id as rId,region.name as rname, region.slug as rslug";
					$join= array('0'=>['parentcampground','region.id = parentcampground.regionId','inner']);
			$where = array('region.slug' => 'Central' );
			$where1 = array('region.slug' => 'Central',
								'parentcampground.p_id'=>39 );
			$ordeByCom= array(
                    '0'=>['parentcampground.p_id','desc'],
                    );
			$data['region'] = $this->Campgrounds->find("region",$where1,'','',1,$join,'',$select,$ordeByCom);
			$data['regionss'] = $this->Campgrounds->find("region",$where,'','',1,'','','','');


			$data['title']='example campground campsite' ;
			$data['yield']='home/login/take_peak_2.php';


			 $this->load->view($this->layout,$data) ;
		}


		public function delAccount()
		{
				$data = $this->input->post();
				$id = $data['id'];

				$where = array('id' => $data['id'] );
				//print_r($slug );exit;
				$subscribe = $this->Campgrounds->find("subscribe",$where,'','',1);

//				$this->db->where('sender_id', $data['id']);
//				$this->db->delete('comments');
//                $this->db->where('user_id', $data['id']);
//                $this->db->delete('replys');
//				$this->db->where('user_id', $data['id']);
//				$this->db->delete('forums');
					if(!empty($subscribe[0]->subscription_id)&&$subscribe[0]->subscription_id!=null){
				$this->cancel_sub($subscribe[0]->subscription_id);
			}
            $data = array('first_name' =>'Anonymous','last_name' =>' ' , 'email' =>'anonymous@gmail.com');
            $where1 = array('id' =>$id);

            $this->Campgrounds->update_data("","",'subscribe', $data,$where1);
//				$this->db->where('id', $data['id']);
//				$this->db->delete('subscribe');

				$this->session->sess_destroy();
				echo "1";
		}

		public function cancel_sub( $subs_id = null )
{

	// die(var_dump($this->session->userdata['userdata']));

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
	public function newsletters()
	{

        // if(!empty($this->session->userdata['userdata']['id'])){
            $data['title'] = 'NewsLetter';
            $data['yield'] = 'home/newsletter/newsletter.php';

            $this->load->view($this->layout, $data);
        // }else{
        //     redirect(base_url()."login");
        // }


	}


}

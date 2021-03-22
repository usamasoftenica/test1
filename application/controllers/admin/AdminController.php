<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

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
		$this->layout="admin/layout/main-layout";

		if(isset($this->session->userdata['admindata']))
		{
			$this->adminId = $this->session->userdata['admindata']['adminId'];
		}
	}

	public function index()
	{
		$this->load->view('admin/login/login');
	}
	public function submitLogin($value='')
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',array(
                'required'      => 'Email is required',
                'valid_email'	=> 'Invalid email address.'
        ));
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		 if ($this->form_validation->run() == FALSE)
            {
            	$this->session->set_flashdata('validation_error','Invalid email or password');
            	 redirect($_SERVER['HTTP_REFERER']);
            }
            else
            {

            	$val=$this->input->post();
				$where = array('email' => $val['email'],'password'=>md5($val['password']));
				$admin=$this->Campgrounds->find('admin',$where);
				if(!empty($admin))
				{
					$session=array(
			        'adminId' => $admin->adminId,
			        'email' => $admin->email,
			       );

	      			 $this->session->set_userdata('admindata' ,$session);
	      			 $this->session->set_flashdata('success','You are successfully Logged in');

	      			 $this->cleanup();


	      			redirect(base_url('admin/dashboard'));
                  
            }else{
            	$this->session->set_flashdata('login_error','Invalid email or password');
            	 redirect($_SERVER['HTTP_REFERER']);
           	 }
			}
		}

	public function cleanup()
    {
        $where =array();
        $query = $this->db->query('SELECT * FROM ci_sessions');
        $sessions= $query->result();
        foreach ($sessions as $session)
        {
            $epoch = $session->timestamp;
//            print_r($epoch);return;
            $dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
            $then = $dt->format('Y-m-d');
            $now = date('Y-m-d');
//            $now = date('Y-m-d', strtotime($now. ' + 3 days'));
            $date1=date_create($then);
            $date2=date_create($now);
//                print_r($date1);
//                print_r($date2);
            $diff=date_diff($date1,$date2,true);
            $days = $diff->format("%a");
//            print_r($days);
            if ($days >=3)
            {
                $where[] =$session->id;
            }
        }
//        print_r($where);return;
        if (!empty($where))
        {
            $this->db->from('ci_sessions');
            $this->db->where_in('id' , $where);
            $this->db->delete() ;
        }


    }

	public function dashboard()

	{if (isset($this->adminId)) 
	{	

		$query = $this->db->query('SELECT * FROM parentcampground');
		$data['parentcampground'] = $query->num_rows();

		$query = $this->db->query('SELECT * FROM childcampground');
		$data['childcampground'] = $query->num_rows();

		$query = $this->db->query('SELECT * FROM subscribe WHERE status= 1 AND first_name!="Anonymous" AND id!=45');
		$data['subscribe'] = $query->num_rows();

		//pending forums and pending comments.
		$query = $this->db->query('SELECT * FROM forums where forum_approval=0');
		$data['forums'] = $query->num_rows();

		$query = $this->db->query('SELECT * FROM comments where detect_forum=2 AND comments_approved=0');
		$data['comments'] = $query->num_rows();

		//blog and informations total comments..
		$query = $this->db->query('SELECT * FROM comments where detect_forum=0 AND comments_approved=0');
		$data['infor_comments'] = $query->num_rows();

		$query = $this->db->query('SELECT * FROM comments where detect_forum=1 AND comments_approved=0');
		$data['blog_comments'] = $query->num_rows();



		$data['title']='Dashboard';
		$data['yield']='admin/pages/dashboard.php';
		$this->load->view('admin/layout/main-layout',$data);
		}
	else
	{
		redirect(base_url('admin/login'));
	}
	}
	
	public function parentCampGround()
	{
	if (isset($this->adminId)) 
	{	
		$data['title']='Add Parent Campground';
		$data['yield']='admin/pages/parentCampGround.php';
		$this->load->view('admin/layout/main-layout',$data);
		}
	else
	{
		redirect(base_url('admin/login'));
	}
	}
	
	public function parentCampGroundList()
	{	if (isset($this->adminId)) 
	{
		$data['title']='List of Parent Campgrounds';
		$data['yield']='admin/pages/parentCampGroundList.php';
		$this->load->view('admin/layout/main-layout',$data);
		}
	else
	{
		redirect(base_url('admin/login'));
	}
	}
	
	public function childCampGround()
	{	
		if (isset($this->adminId)) 
	{
		$data['title']='Add Child Campground';
		$data['yield']='admin/pages/childCampGround.php';
		$this->load->view('admin/layout/main-layout',$data);
		}
	else
	{
		redirect(base_url('admin/login'));
	}
	}
	

	public function profile()
	{
	if (isset($this->adminId)) 
	{
		$where = array('adminId =' => $this->adminId);
        $data['admin']=$this->Campgrounds->find('admin',$where);
		$data['title']='Profile';
		$data['yield']='admin/pages/profile.php';
		$this->load->view('admin/layout/main-layout',$data);
		
		}
	else
	{
		redirect(base_url('admin/login'));
	}
	}


	public function update_profile()
	{
	if (isset($this->adminId)) 
	{
		$data = $this->input->post();
		$where = array('adminId' => $data['id'] );
		$insert_data  = array('email' => $data['email'], 'password' => md5($data['password']));
		$this->Campgrounds->update_data('adminId',$data['id'],'admin', $insert_data, $where);
					$this->session->set_flashdata('success', 'Profile update successfully');
					redirect($_SERVER['HTTP_REFERER']);
	}
	else
	{
		redirect(base_url('admin/login'));
	}

	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function forget_password()
	{
		$this->load->view('admin/login/forget-password');
	}


	public function check_email()
	{
		$data = $this->input->post();
		 $email = $data['email'];

		    //use model
        $where = array('email' => $email);
		$returnData = $this->Campgrounds->find("admin", $where);


		if(empty($returnData)){
			$this->session->set_flashdata('error','Invalid email address');			
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
					$this->load->helper('string');
					$num =  random_string('alnum',5);
					$url =  base_url()."admin/varify_code/".$num;
					$where = array('email' => $email);
					$data1 = array('code'=>$num);
					$this->Campgrounds->update_data('adminId',$returnData->adminId,'admin',$data1,$where);

		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$this->load->library('email',$config);
		$this->email->initialize($config);
        $this->email->from('testing@softenica.com', 'Colorado');
		$this->email->to($returnData->email);
		$this->email->subject('Forget Password');
		$html = '<a href="'.$url.'">click on link to change password</a>';
		$this->email->message($html);
		  if($this->email->send())
     {
		$this->session->set_flashdata('success','Email sent successfully check email');
		redirect($_SERVER['HTTP_REFERER']);
	
     }
     else
    {
    $this->session->set_flashdata('error', 'Email not sent, please try again');
			
		
		redirect($_SERVER['HTTP_REFERER']);
			
     }


    }
	}


	public function verify_code($code)
	{
		
		$where = array('code' => $code);
		$returnData = $this->Campgrounds->find("admin", $where);
		if(empty($returnData)){

 		 $this->session->set_flashdata('error', 'Verification code expired');


			
			redirect(base_url('admin/forget-password'));
		
				
		}
		else
		{
				$where = array('code' => $code);
					$data1 = array('code'=>'');
						$this->Campgrounds->update_data('code',$returnData->adminId,'admin',$data1,$where);
					
						$data['id'] = $returnData->adminId;

					$this->load->view('admin/login/change-password' , $data);
	

     	}
	}


	public function update_password()
{
	$data = $this->input->post();
	$where = array('adminId' => $data['id']);
	$data1 = array('password'=> md5($data['password']));
		$this->Campgrounds->update_data('adminId', $data['id'],'admin',$data1,$where);
		$this->session->set_flashdata('success','Password change');
		redirect(base_url('admin/login'));

}

	public function add_disclimer()
	{
		if(isset($this->adminId))
		{
		$data['title']='Description';
		$data['yield']='admin/pages/description/update_description.php';

		 $this->db->select('description')->from('description') ;
			
			$query = $this->db->get();        
	   		$data['description'] = $query->result();  

		$this->load->view('admin/layout/main-layout',$data);
			}
		else
		{
			redirect(base_url('admin/login'));
		}
	}

	public function update_desclimer()
	{
		if(isset($this->adminId))
		{
			$data = $this->input->post();
			if(!empty($data['main_description'])){
			$sql = "UPDATE description SET description = '".$data['main_description']."'";
	    	$this->db->query($sql);
	    	$this->session->set_flashdata('success_desclimer','Disclaimer Updated Successfully');
	    	redirect($_SERVER['HTTP_REFERER']);
		    }else{
		    	$this->session->set_flashdata('error1','Disclaimer should not be empty');
		    	redirect($_SERVER['HTTP_REFERER']);
		    }
    	}	
		else
		{
			redirect(base_url('admin/login'));
		}
	}


	public function add_about_us()
	{
		if(isset($this->adminId))
		{
		$data['title']='About US';
		$data['yield']='admin/pages/about_us/add_about_us.php';

		 $this->db->select('*')->from('about_us') ;
			
			$query = $this->db->get();        
	   		$data['content'] = $query->result();  


		$this->load->view('admin/layout/main-layout',$data);
			}
		else
		{
			redirect(base_url('admin/login'));
		}
	}


	//term of service
	public function add_term_of_service()
	{
		if(isset($this->adminId))
		{
		$data['title']='term of service';
		$data['yield']='admin/pages/term-of-service/term_of_service.php';

		 $this->db->select('*')->from('term_of_service') ;
			
			$query = $this->db->get();        
	   		$data['content'] = $query->result();  


		$this->load->view('admin/layout/main-layout',$data);
			}
		else
		{
			redirect(base_url('admin/login'));
		}
	}


	//privacy policy
	public function add_policy()
	{
		if(isset($this->adminId))
		{
		$data['title']='add policy';
		$data['yield']='admin/pages/policy/policy.php';

		 $this->db->select('*')->from('policy') ;
			
			$query = $this->db->get();        
	   		$data['policy'] = $query->result() ; 


		$this->load->view('admin/layout/main-layout',$data);
			}
		else
		{
			redirect(base_url('admin/login'));
		}
	}


		public function update_policy()
	{
		if(isset($this->adminId))
		{
			 $data = $this->input->post();
			 if(!empty($data['policy'])){
			 $text = $data['policy'];
		     $breaks = array("<br />","<br>","<br/>");  
		     $text = str_ireplace($breaks, "\r\n", $text);  

			//$text = nl2br($data['about_us']);

			$where = array('id!=' => 0 );
			$insert_data  = array('policy' => $data['policy']);
			$this->Campgrounds->update_data('adminId','1','policy', $insert_data, $where);
		

	    	$this->session->set_flashdata('success_about_us','Updated Successfully');
	    	redirect($_SERVER['HTTP_REFERER']);
		    }else{
		    	$this->session->set_flashdata('error1','Privacy Policy should not be empty');
		    	redirect($_SERVER['HTTP_REFERER']);
		    }
		}
		else
		{
			redirect(base_url('admin/login'));
		}

	}
	//end privacy policy


	public function term_of_service()
	{
		if(isset($this->adminId))
		{
			 $data = $this->input->post();
			 if(!empty($data['term_of_service'])){

			 $text = $data['term_of_service'];
		     $breaks = array("<br />","<br>","<br/>");  
		     $text = str_ireplace($breaks, "\r\n", $text);  

			//$text = nl2br($data['about_us']);

			$where = array('id!=' => 0 );
			$insert_data  = array('term_content' => $data['term_of_service']);
			$this->Campgrounds->update_data('adminId','1','term_of_service', $insert_data, $where);
		

    	$this->session->set_flashdata('success_about_us','Updated Successfully');
    	redirect($_SERVER['HTTP_REFERER']);
		    }else{
		    	$this->session->set_flashdata('error1','Terms of Services should not be empty');
    			redirect($_SERVER['HTTP_REFERER']);
		    }
    	}
		else
		{
			redirect(base_url('admin/login'));
		}
	}

	//end tern of service

	public function update_about_us()
	{
		$data = $this->input->post();
		if(!empty($data['about_us'])){
					 $config['upload_path'] = './uploads/blog/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
               		
	                    $this->load->library('upload');
	                    $this->upload->initialize($config);

	                    if ( ! $this->upload->do_upload('image'))
			                { 
			                    $img='';
			                }
			                else
			                {   $file_data	=  $this->upload->data();
								$img  = $file_data['file_name'];
			                }


			 

			 $text = $data['about_us'];
		     // $breaks = array("<br />","<br>","<br/>");  
		     // $text = str_ireplace($breaks, "\r\n", $text);  

			//$text = nl2br($data['about_us']);

			if($img != "")
			{

			$where = array('id!=' => 0 );
			$insert_data  = array('content' => $text, 'image' => $img);
			$this->Campgrounds->update_data('adminId','1','about_us', $insert_data, $where);		
		}else{

			$where = array('id!=' => 0 );
			$insert_data  = array('content' => $text);
			$this->Campgrounds->update_data('adminId','1','about_us', $insert_data, $where);

		}
		

    	$this->session->set_flashdata('success_about_us','About us content Updated Successfully');
    	redirect($_SERVER['HTTP_REFERER']);
    }else{
    	$this->session->set_flashdata('error1','Content should not be empty');
    	redirect($_SERVER['HTTP_REFERER']);
    }
	}


	public function take_peak()
	{
		if(isset($this->adminId))
		{
		$data['title']='take-peak-page';
		$data['yield']='admin/pages/take_peak_page.php';

	$peak = "SELECT * FROM take_peak_campground" ;
	     $query = $this->db->query($peak);

		$data['peak'] = $query->result_array(); 
     	
		$this->load->view('admin/layout/main-layout',$data);
			}
		else
		{
			redirect(base_url('admin/login'));
		}
	}

	public function take_peak_save()
	{
		
		 if(isset($this->adminId))
		{

		  $data = $this->input->post();

					$insert_data=array('name'=>$data['name'],
					'description'=>$data['description'],
					'slug'=>$data['slug'],
					'titile'=>$data['title'],
					'keyword'=>$data['keyword'],
					'meta_description'=>$data['meta_description'],
					'youtube_link'=>$data['youtube_link'],

				);

					$where = array('id' => 1 );
					$this->Campgrounds->update_data('adminId','1','take_peak_campground', $insert_data, $where);
					

						// $this->Campgrounds->insert('take_peak_campground',$insert_data);
				 $this->session->set_flashdata('success1', 'Take A Peak updated successfully');
				redirect($_SERVER['HTTP_REFERER']);
					
                
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}

}

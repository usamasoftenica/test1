<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogController extends CI_Controller {

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

	public function add_blog_page()
	{
		if(isset($this->adminId))
		{
				$data['title']='Add Blog';
				$data['yield']='admin/pages/blog_pages/add-blog-page.php';
				$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}


	public function allBlogs()
	{

	}

	public function blogComments()
	{
		if(isset($this->adminId))
		{

			$data=$this->input->post();

			$data['title']='Blogs Comment All View';
			$data['information']=$this->Campgrounds->getInformation();
			$data['subpages'] = $this->Campgrounds->find("blog",'','','',1,'','','','');
			$data['yield']='admin/pages/blog_pages/blog-all-comments.php';
			$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}
	public function approveblogComments()
	{
		if(isset($this->adminId))
		{

			$data=$this->input->post();

			$data['title']='Blogs Comment All View';
			$data['information']=$this->Campgrounds->getInformation();
			$data['subpages'] = $this->Campgrounds->find("blog",'','','',1,'','','','');
			$data['yield']='admin/pages/blog_pages/approve-comments.php';
			$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}


	public function blog_all_comments()
	{


		$start=$_REQUEST['start'];
		$end=$_REQUEST['length'];
		// if(!empty($_REQUEST['search']['value'])){
		// 	$like="CONCAT_WS(' ',subscribe.first_name,subscribe.last_name) LIKE '%".htmlspecialchars($_REQUEST['search']['value'])."%' ";
		//     //$like=array('subscribe.first_name' => htmlspecialchars($_REQUEST['search']['value']));
		// }else{
		//     $like='';
		// }

		if($_REQUEST['checkComments']=='comment'){
			$where="comments_approved=0 ";
			if(!empty($_REQUEST['from'])){
				$old_date_timestamp = strtotime($_REQUEST['from']);
				$new_date = date('y-m-d', $old_date_timestamp);
				// 'comments.created_at <='=>$new_dateto\

				$where.=" AND DATE(comments.created_at) >= '".$new_date."' ";
			}
			if(!empty($_REQUEST['to'])){
				$old_date_timestamp = strtotime($_REQUEST['to']);
				$new_date = date('y-m-d', $old_date_timestamp);
				// 'comments.created_at <='=>$new_dateto\

				$where.=" AND DATE(comments.created_at) <= '".$new_date."' ";
			}
			if(!empty($_REQUEST['commentname'])){
				// $old_date_timestamp = strtotime($_REQUEST['commentname']);
				//           $new_date = date('y-m-d', $old_date_timestamp);
				// 'comments.created_at <='=>$new_dateto\

				$where.=" AND comments.comment LIKE '%".htmlspecialchars($_REQUEST['commentname'])."%' ";
			}
			if(!empty($_REQUEST['commentname'])){
				$where.=" AND comments.comment LIKE '%".htmlspecialchars($_REQUEST['commentname'])."%' ";
			}

			if(!empty($_REQUEST['user'])){
				//  CONCAT_WS(' ', city, state) LIKE '%".htmlspecialchars($request->state)."%' "
				$where.=" AND CONCAT_WS(' ',subscribe.first_name,subscribe.last_name) LIKE '%".htmlspecialchars($_REQUEST['user'])."%' ";
			}
			if(!empty($_REQUEST['pageName'])){
				$where.=" AND comments.informationalpages_id =".htmlspecialchars($_REQUEST['pageName'])." ";
			}
			if(!empty($_REQUEST['subPage'])){

				$where.=" AND comments.menuitem_id =".htmlspecialchars($_REQUEST['subPage'])." ";
			}
			$where.=" AND detect_forum=1";
			//print_r($_REQUEST['subPage']);exit;
			$select = "*, subscribe.id as sId,subscribe.created_at as sCreate,comments.created_at as comCreate ,comments.id as comID";
			$join= array('0'=>['subscribe','comments.sender_id = subscribe.id','left']);
			$ordeByCom= array(
				'0'=>['comments.id','desc'],
			);

			//$where.=" AND comments.detect_forum ='0' ";
			// $where = array('comments_approved' => 0  );
			$infromations=$this->Campgrounds->find("comments",$where,$start,$end,1,$join,'',$select,$ordeByCom);
			//print_r($infromations);exit;
			// $table,$where="",$like="",$joins
			$totaldata =$this->Campgrounds->findNumRowsPagenation2('comments',$where,'',$join);
			$i=1;
			if($start==0)
			{
				$i=1;
			}else{

				$i=$i*$start;
				$i++;
			}
			$a = 1;
			$columns=array();
			foreach ($infromations as $info) {
				$old_date_timestamp = strtotime($info->comCreate);
											   $new_date = date('M d, y', $old_date_timestamp);
				$columns[] = array(
					'id'  =>   $info->comID,
					'Date' => $new_date,
					'Name' =>  $info->first_name.' '.$info->last_name,
					'Comment' =>  $info->comment,
					'newComment' => '<span id="comment-id-'.$info->comID.'">'.$info->comment.'</span>',
					//'order' =>  $info->order,
					'no' => $i,
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
				"page"   => $start,
			);
			echo json_encode($json_data);
		}

		else{
			$where="reply_approved=0 ";
			if(!empty($_REQUEST['from'])){
				$old_date_timestamp = strtotime($_REQUEST['from']);
				$new_date = date('y-m-d', $old_date_timestamp);
				// 'comments.created_at <='=>$new_dateto\

				$where.=" AND DATE(replys.create_at) >= '".$new_date."' ";
			}
			if(!empty($_REQUEST['to'])){
				$old_date_timestamp = strtotime($_REQUEST['to']);
				$new_date = date('y-m-d', $old_date_timestamp);
				// 'comments.created_at <='=>$new_dateto\

				$where.=" AND DATE(replys.create_at) <= '".$new_date."' ";
			}
			if(!empty($_REQUEST['commentname'])){
				// $old_date_timestamp = strtotime($_REQUEST['commentname']);
				//           $new_date = date('y-m-d', $old_date_timestamp);
				// 'comments.created_at <='=>$new_dateto\

				$where.=" AND replys.comment_reply LIKE '%".htmlspecialchars($_REQUEST['commentname'])."%' ";
			}
			if(!empty($_REQUEST['commentname'])){
				$where.=" AND replys.comment_reply LIKE '%".htmlspecialchars($_REQUEST['commentname'])."%' ";
			}

			if(!empty($_REQUEST['user'])){
				//  CONCAT_WS(' ', city, state) LIKE '%".htmlspecialchars($request->state)."%' "
				$where.=" AND CONCAT_WS(' ',subscribe.first_name,subscribe.last_name) LIKE '%".htmlspecialchars($_REQUEST['user'])."%' ";
			}
			if(!empty($_REQUEST['pageName'])){
				$where.=" AND comments.informationalpages_id =".htmlspecialchars($_REQUEST['pageName'])." ";
			}
			if(!empty($_REQUEST['subPage'])){

				$where.=" AND replys.menus_id =".htmlspecialchars($_REQUEST['subPage'])." ";
			}
			$where.=" AND detect_forum_reply=1";

			$select = "*,subscribe.id as IDS,replys.id as replyID,";
			$join= array('0'=>['subscribe','replys.user_id = subscribe.id','inner'],
				'1'=>['comments','comments.id = replys.comment_id','inner']);
			//$where = array('reply_approved' => 0 );
			$ordeByCom= array(
				'0'=>['replys.id','desc'],
			);
			$infromations = $this->Campgrounds->find("replys",$where,$start,$end,1,$join,'',$select,$ordeByCom);
			//print_r($infromations);exit;
			//$this->Campgrounds->findNumRowsPagenation2('comments',$where,'',$join);
			$totaldata =$this->Campgrounds->findNumRowsPagenation2('replys',$where,'',$join);
			$i=1;
			if($start==0)
			{
				$i=1;
			}else{

				$i=$i*$start;
				$i++;
			}
			$a = 1;
			$columns=array();
			foreach ($infromations as $info) {
				$old_date_timestamp = strtotime($info->create_at);
											   $new_date = date('M d, y', $old_date_timestamp);
				$columns[] = array(
					'id'  =>   $info->replyID,
					'Date' => $new_date,
					'Name' =>  $info->first_name.' '.$info->last_name,
					'Comment' => $info->comment_reply,
					'newComment' => '<span id="reply-comment-id-'.$info->replyID.'">'.$info->comment_reply.'</span>',
					//'order' =>  $info->order,
					'no' => $i,
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
				"page"   => $start,
			);
			echo json_encode($json_data);
		}
	}
	public function blog_all_comments1()
	{


		$start=$_REQUEST['start'];
		$end=$_REQUEST['length'];
		// if(!empty($_REQUEST['search']['value'])){
		// 	$like="CONCAT_WS(' ',subscribe.first_name,subscribe.last_name) LIKE '%".htmlspecialchars($_REQUEST['search']['value'])."%' ";
		//     //$like=array('subscribe.first_name' => htmlspecialchars($_REQUEST['search']['value']));
		// }else{
		//     $like='';
		// }

		if($_REQUEST['checkComments']=='comment'){
			$where="comments_approved=1 ";
			if(!empty($_REQUEST['from'])){
				$old_date_timestamp = strtotime($_REQUEST['from']);
				$new_date = date('y-m-d', $old_date_timestamp);
				// 'comments.created_at <='=>$new_dateto\

				$where.=" AND DATE(comments.created_at) >= '".$new_date."' ";
			}
			if(!empty($_REQUEST['to'])){
				$old_date_timestamp = strtotime($_REQUEST['to']);
				$new_date = date('y-m-d', $old_date_timestamp);
				// 'comments.created_at <='=>$new_dateto\

				$where.=" AND DATE(comments.created_at) <= '".$new_date."' ";
			}
			if(!empty($_REQUEST['commentname'])){
				// $old_date_timestamp = strtotime($_REQUEST['commentname']);
				//           $new_date = date('y-m-d', $old_date_timestamp);
				// 'comments.created_at <='=>$new_dateto\

				$where.=" AND comments.comment LIKE '%".htmlspecialchars($_REQUEST['commentname'])."%' ";
			}
			if(!empty($_REQUEST['commentname'])){
				$where.=" AND comments.comment LIKE '%".htmlspecialchars($_REQUEST['commentname'])."%' ";
			}

			if(!empty($_REQUEST['user'])){
				//  CONCAT_WS(' ', city, state) LIKE '%".htmlspecialchars($request->state)."%' "
				$where.=" AND CONCAT_WS(' ',subscribe.first_name,subscribe.last_name) LIKE '%".htmlspecialchars($_REQUEST['user'])."%' ";
			}
			if(!empty($_REQUEST['pageName'])){
				$where.=" AND comments.informationalpages_id =".htmlspecialchars($_REQUEST['pageName'])." ";
			}
			if(!empty($_REQUEST['subPage'])){

				$where.=" AND comments.menuitem_id =".htmlspecialchars($_REQUEST['subPage'])." ";
			}
			$where.=" AND detect_forum=1";
			//print_r($_REQUEST['subPage']);exit;
			$select = "*, subscribe.id as sId,subscribe.created_at as sCreate,comments.created_at as comCreate ,comments.id as comID";
			$join= array('0'=>['subscribe','comments.sender_id = subscribe.id','left']);
			$ordeByCom= array(
				'0'=>['comments.id','desc'],
			);

			//$where.=" AND comments.detect_forum ='0' ";
			// $where = array('comments_approved' => 0  );
			$infromations=$this->Campgrounds->find("comments",$where,$start,$end,1,$join,'',$select,$ordeByCom);
			//print_r($infromations);exit;
			// $table,$where="",$like="",$joins
			$totaldata =$this->Campgrounds->findNumRowsPagenation2('comments',$where,'',$join);
			$i=1;
			if($start==0)
			{
				$i=1;
			}else{

				$i=$i*$start;
				$i++;
			}
			$a = 1;
			$columns=array();
			foreach ($infromations as $info) {
				$old_date_timestamp = strtotime($info->comCreate);
											   $new_date = date('M d, y', $old_date_timestamp);
				$columns[] = array(
					'id'  =>   $info->comID,
					'Date' => $new_date,
					'Name' =>  $info->first_name.' '.$info->last_name,
					'Comment' =>  $info->comment,
					'newComment' => '<span id="comment-id-'.$info->comID.'">'.$info->comment.'</span>',
					//'order' =>  $info->order,
					'no' => $i,
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
				"page"   => $start,
			);
			echo json_encode($json_data);
		}

		else{
			$where="reply_approved=1 ";
			if(!empty($_REQUEST['from'])){
				$old_date_timestamp = strtotime($_REQUEST['from']);
				$new_date = date('y-m-d', $old_date_timestamp);
				// 'comments.created_at <='=>$new_dateto\

				$where.=" AND DATE(replys.create_at) >= '".$new_date."' ";
			}
			if(!empty($_REQUEST['to'])){
				$old_date_timestamp = strtotime($_REQUEST['to']);
				$new_date = date('y-m-d', $old_date_timestamp);
				// 'comments.created_at <='=>$new_dateto\

				$where.=" AND DATE(replys.create_at) <= '".$new_date."' ";
			}
			if(!empty($_REQUEST['commentname'])){
				// $old_date_timestamp = strtotime($_REQUEST['commentname']);
				//           $new_date = date('y-m-d', $old_date_timestamp);
				// 'comments.created_at <='=>$new_dateto\

				$where.=" AND replys.comment_reply LIKE '%".htmlspecialchars($_REQUEST['commentname'])."%' ";
			}
			if(!empty($_REQUEST['commentname'])){
				$where.=" AND replys.comment_reply LIKE '%".htmlspecialchars($_REQUEST['commentname'])."%' ";
			}

			if(!empty($_REQUEST['user'])){
				//  CONCAT_WS(' ', city, state) LIKE '%".htmlspecialchars($request->state)."%' "
				$where.=" AND CONCAT_WS(' ',subscribe.first_name,subscribe.last_name) LIKE '%".htmlspecialchars($_REQUEST['user'])."%' ";
			}
			if(!empty($_REQUEST['pageName'])){
				$where.=" AND comments.informationalpages_id =".htmlspecialchars($_REQUEST['pageName'])." ";
			}
			if(!empty($_REQUEST['subPage'])){

				$where.=" AND replys.menus_id =".htmlspecialchars($_REQUEST['subPage'])." ";
			}
			$where.=" AND detect_forum_reply=1";

			$select = "*,subscribe.id as IDS,replys.id as replyID,";
			$join= array('0'=>['subscribe','replys.user_id = subscribe.id','inner'],
				'1'=>['comments','comments.id = replys.comment_id','inner']);
			//$where = array('reply_approved' => 0 );
			$ordeByCom= array(
				'0'=>['replys.id','desc'],
			);
			$infromations = $this->Campgrounds->find("replys",$where,$start,$end,1,$join,'',$select,$ordeByCom);
			//print_r($infromations);exit;
			//$this->Campgrounds->findNumRowsPagenation2('comments',$where,'',$join);
			$totaldata =$this->Campgrounds->findNumRowsPagenation2('replys',$where,'',$join);
			$i=1;
			if($start==0)
			{
				$i=1;
			}else{

				$i=$i*$start;
				$i++;
			}
			$a = 1;
			$columns=array();
			foreach ($infromations as $info) {
				$old_date_timestamp = strtotime($info->create_at);
											   $new_date = date('M d, y', $old_date_timestamp);
				$columns[] = array(
					'id'  =>   $info->replyID,
					'Date' => $new_date,
					'Name' =>  $info->first_name.' '.$info->last_name,
					'Comment' => $info->comment_reply,
					'newComment' => '<span id="reply-comment-id-'.$info->replyID.'">'.$info->comment_reply.'</span>',
					//'order' =>  $info->order,
					'no' => $i,
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
				"page"   => $start,
			);
			echo json_encode($json_data);
		}
	}

	
	public function new_blog_page()
	{


		if(isset($this->adminId))
		{
		
		$data = $this->input->post();

		  $config = array(
        array(
                'field' => 'blog_title',
                'label' => 'title',
                'rules' => 'required'
        ),
         array(
                'field' => 'blog_slug',
                'label' => 'slug',
                'rules' => 'required'
        ),
       
         array(
                'field' => 'blog_keywords',
                'label' => 'keyword',
                'rules' => 'required'
        ),
		  array(
			  'field' => 'page_title',
			  'label' => 'title',
			  'rules' => 'required'
		  ),
           array(
                'field' => 'blog_slug',
                'label' => 'slug',
                'rules' => 'required|is_unique[blog.blog_slug]'
        ),
         array(
                'field' => 'blog_descrip_tag',
                'label' => 'descriptin meta tag',
                'rules' => 'required'
        ),
           
		);


		  $this->form_validation->set_rules($config);
			 	if ($this->form_validation->run() == FALSE)
                {
                	$data = $this->input->post();

                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                     $this->session->set_flashdata('data',$data);

             		$this->add_blog_page();
                }
                else
                {
//                	print_r($data);exit;
                	$config['upload_path'] = './uploads/blog/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
                    $this->load->library('upload');
                    $this->upload->initialize($config);
   				if ( ! $this->upload->do_upload('blog_image'))
                { 
//                	print_r( $this->upload->display_errors());return;
                    $img='';
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
                }
                	$insert_data=array(

					'blog_title'=>$data['blog_title'],
					'blog_slug'=>$data['blog_slug'],
					
					'blog_image'=>$img,

					'blog_keywords'=>$data['blog_keywords'],
					'page_title'=>$data['page_title'],
					//'mapLink'=>$data['map_link'],
					'blog_descrip_tag'=>$data['blog_descrip_tag'],
					'blog_description'=>$data['description'],
				);

					$this->Campgrounds->insert('blog',$insert_data);
				    $this->session->set_flashdata('success', 'Blog post added successfully');
			        redirect($_SERVER['HTTP_REFERER']);

                }


		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}


	//approved comments
//	public function blogApprovedComments($slug='')
//	{
//		$data['title'] = 'blog'
//	}
//
	//end approved comments

		public function list_blogs()
	{
		if(isset($this->adminId))
		{
            $data['title']='List of Blogs posts';
            $data['yield']='admin/pages/blog_pages/list-all-pages.php';

            $data['blogs'] = $this->Campgrounds->getAllBlogs() ;
            $this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}



	public function blog_detail($id)
    {

		if(isset($this->adminId))
		{
			
			$data['yield']='admin/pages/blog_pages/blog-detail.php';
			$data['blog_detail'] = $this->Campgrounds->getBlogDetail($id) ;
			if(!empty($data['blog_detail']) && isset($data['blog_detail'])){

			$data['title']=$data['blog_detail'][0]->blog_title;
			$data['user_id'] = $this->adminId ;

			$data['blog_comments'] = $this->Campgrounds->approvedComments($id) ;

			$this->load->view($this->layout,$data) ;
		}else{
			redirect(base_url().'404');
		}
		}else{
			redirect(base_url('admin/login'));
		}

    }
    public function blogDelete()
    {
        $data = $this->input->post();
        $this->Campgrounds->deleteBlog($data['id']) ;
    }

    public function blogEdit($id)
    {
    	$data['title']='detail of Blog post';
        $data['yield']='admin/pages/blog_pages/edit-blog-page.php';

        $data['blog'] = $this->Campgrounds->editBlog($id) ;
       
        $this->load->view($this->layout,$data) ;
    }

    public function updateBlog()
    {

    	if(isset($this->adminId))
		{
		
		$data = $this->input->post();
		  $config = array(
        array(
                'field' => 'blog_title',
                'label' => 'title',
                'rules' => 'required'
        ),
         array(
                'field' => 'blog_slug',
                'label' => 'slug',
                'rules' => 'required'
        ),
       
         array(
                'field' => 'blog_keywords',
                'label' => 'keyword',
                'rules' => 'required'
        ),
           array(
                'field' => 'blog_slug',
                'label' => 'slug',
                'rules' => 'required'
        ),
           array(
                'field' => 'blog_descrip_tag',
                'label' => 'descriptin meta tag',
                'rules' => 'required'
        ),

        array(
			  'field' => 'page_title',
			  'label' => 'title',
			  'rules' => 'required'
		  ),
           
		);


		  $this->form_validation->set_rules($config);
			 	if ($this->form_validation->run() == FALSE)
                {
                	$data = $this->input->post();

                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                     $this->session->set_flashdata('data',$data);

             		$this->add_blog_page();
                }
                else
                {

//                	print_r($data);exit;
                	$config['upload_path'] = './uploads/blog/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
                    $this->load->library('upload');
                    $this->upload->initialize($config);
   				if ( ! $this->upload->do_upload('blog_image'))
                { 
//                	print_r( $this->upload->display_errors());return;
                 //   $img='';
                }

                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
                }
                	$file_data	=  $this->upload->data();
					//$img  = $file_data['file_name'] ;

					if(isset($img))
					{

						$insert_data=array(

							'blog_title'=>$data['blog_title'],
							'blog_slug'=>$data['blog_slug'],

							'blog_image'=>$img,

							'blog_keywords'=>$data['blog_keywords'],
							'page_title'=>$data['page_title'],
							//'mapLink'=>$data['map_link'],
							'blog_descrip_tag'=>$data['blog_descrip_tag'],
							'blog_description'=>$data['blogDescription'],

						);
					}else{

						$insert_data=array(

							'blog_title'=>$data['blog_title'],
							'blog_slug'=>$data['blog_slug'],

							'blog_keywords'=>$data['blog_keywords'],
							'page_title'=>$data['page_title'],
							//'mapLink'=>$data['map_link'],
							'blog_descrip_tag'=>$data['blog_descrip_tag'],
							'blog_description'=>$data['blogDescription'],
						);
					}


					$where = array('blog_id' => $data['blog_id'] );

					$this->Campgrounds->update_data('blog_id',$data['blog_id'],'blog',$insert_data,$where);
				    $this->session->set_flashdata('success', 'Blog post update successfully');
			        redirect($_SERVER['HTTP_REFERER']);

                }


		}
		else
		{
			redirect(base_url('admin/login'));
		}
    }

      public function updateReply()
   {
       $data = array(
            'id' => $this->input->post('inputhidden'),
        'comment_reply' => $this->input->post('replytedit'),
        
        );
      $where = array('id' => $this->input->post('inputhidden'));
      // $id=$this->db->insert('replys', $data);
      $id= $this->Campgrounds->update_data('replys','','replys',$data,$where);
      
      // print_r($id);
      	 $this->session->set_flashdata('success', 'Reply updated successfully');
			        redirect($_SERVER['HTTP_REFERER']);
      // echo 'Added successfully.';  
   }
	public function blog_pagenation()
	
	{
		$start=$_REQUEST['start'];
		$end=$_REQUEST['length'];
		if(!empty($_REQUEST['search']['value'])){
		    $like=array('blog.blog_title' => $_REQUEST['search']['value']);
		}else{
		    $like='';
		}
		 $ordeBy= array(
                    '0'=>['blog.blog_id','desc'],
                    );
		$infromations=$this->Campgrounds->find('blog','',$start,$end,1,'',$like,'',$ordeBy);    
		$totaldata =$this->Campgrounds->findNumRows('blog','',$like);    
		$i=1;
		if($start==0)
		{
			$i=1;
		}else{

		$i=$i*$start;
		$i++;
	}

			$a = 1;
		$columns=array();
		foreach ($infromations as $info) { 
			$old_date_timestamp = strtotime($info->created_at);
											   $new_date = date('M d, y', $old_date_timestamp);          
		$columns[] = array(
			'id'  =>   $info->blog_id, 
			'date'=>      $new_date,          
		    'name' => $info->blog_title,
		    'slug' =>  $info->blog_slug,
		    'live' => $info->status,
		    'no' => $i,
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
		"page"   => $start,
		);      
		echo json_encode($json_data);

}


public function blockblog()
{
	$data = $this->input->post();
	$where = array('blog_id' => $data['id']);
	$insert_data = array('status'=>0);
	$this->Campgrounds->update_data('info_id',$data['id'],'blog',$insert_data,$where);
	echo 'true';
}

public function activeBlog()
{
	$data = $this->input->post();
	$where = array('blog_id' => $data['id']);
	$insert_data = array('status'=>1);
	$this->Campgrounds->update_data('info_id',$data['id'],'blog',$insert_data,$where);
	echo 'true';
}


	public function blogsAllComments()
	{
		$data['title']='detail of Blog post';
		$data['yield']='admin/pages/blog_pages/edit-blog-page.php';

		$data['blog'] = $this->Campgrounds->editBlog($id) ;

		$this->load->view($this->layout,$data) ;

	}

	public function comments_views_blog($id)
	{

		$data['blogs'] = $this->Campgrounds->getAllBlogs() ;
		$data['blog_comments'] = $this->Campgrounds->getAllBlogComments($id) ;
		$data['id']=$id;
		$data['title']='Comments of Blog post';
		$data['yield']='admin/pages/blog_pages/view-comments-blog.php';

		$this->load->view($this->layout,$data) ;

	}

	public function ajaxRequestCommentPost()
	{
		$admin = $this->Campgrounds->getAdminId() ;
		
		$data = array(
			'forum_id' => $this->input->post('forum_id'),
			'detect_forum' => $this->input->post('detect_forum'),

			'comment' => $this->input->post('comment'),
			'name' => "Admin",
			'comments_approved' =>1,
			'menuitem_id'=>'NULL',
			'sender_id' => $admin->id,
		);

		$id= $this->Campgrounds->insert('comments',$data);

		echo $id;
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformationalController extends CI_Controller {

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


	function __construct(){
		parent::__construct();
		$this->layout="admin/layout/main-layout";

		if(isset($this->session->userdata['admindata']))
		{
			$this->adminId = $this->session->userdata['admindata']['adminId'];
		}
	}

	public function add_informational_page()
	{
		if(isset($this->adminId))
		{
		$data['title']='Add Informational Head';
		$data['yield']='admin/pages/informational_pages/add-informational-page.php';
		$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}
	public function view_comments($id){
		if(isset($this->adminId))
		{
			$select = "*,subscribe.id as IDS,subscribe.created_at as create,comments.created_at as datenew ,comments.id as comID";
					$join= array('0'=>['subscribe','comments.sender_id = subscribe.id','left']);
			$where = array('comments.id' => $id );
			
			 $ordeByCom= array(
                    '0'=>['comments.id','desc'],
                    );
			$start='0';
			$end=10;
  		 
  		 	$data['comments'] = $this->Campgrounds->find("comments",$where,'','',1,$join,'',$select,$ordeByCom);
		$data['title']='View Comments';
		$data['yield']='admin/pages/informational_pages/view-comment.php';
		$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}
	public function comment_all()
	{
		// die('ok');
		if(isset($this->adminId))
		{

			$data=$this->input->post();

		$data['title']='Comment All View';
		$data['information']=$this->Campgrounds->getInformation();
		$data['subpages'] = $this->Campgrounds->find("menuitem",'','','',1,'','','','');
		$data['yield']='admin/pages/informational_pages/view-all-comment.php';
		$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}
	public function approve_comment_all()
	{
		if(isset($this->adminId))
		{

			$data=$this->input->post();

		$data['title']='Comment All View';
		$data['information']=$this->Campgrounds->getInformation();
		$data['subpages'] = $this->Campgrounds->find("menuitem",'','','',1,'','','','');
		$data['yield']='admin/pages/informational_pages/approve-comments.php';
		$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}



	public function all_commentss()
	{
		// // print_r('a,mir ishauqe');exit;
		// $data = $this->Campgrounds->all_commetns_with_replies() ;

		// //print_r($data);exit;

		// foreach ($data as $key => $comment) {
		// 		$columns[] = array(
		// 		'Date'  =>   $comment['created_at'],
		// 	    'Name' => 	$comment['name'],
		// 	    'Comment' =>  $comment['comment'],

		// 		);
		// 	}

		// 	$json_data = array(
		// "recordsTotal"    => intval( 10 ),
		// "recordsFiltered" => intval( 10 ),
		// "data"            => $columns,
		// );

		// return json_encode($json_data);

		$start=$_REQUEST['start'];
		$end=$_REQUEST['length'];
		// if(!empty($_REQUEST['search']['value'])){
		// 	$like="CONCAT_WS(' ',subscribe.first_name,subscribe.last_name) LIKE '%".htmlspecialchars($_REQUEST['search']['value'])."%' ";
		//     //$like=array('subscribe.first_name' => htmlspecialchars($_REQUEST['search']['value']));
		// }else{
		//     $like='';
		// }

		if($_REQUEST['checkComments']=='comment'){
			$bool = false ;
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

			$where.=" AND detect_forum=0";
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
					'parentComm' => 'no comment',
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

			$bool = true ;
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
			$where.=" AND detect_forum_reply=0";

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
					'parentComm' => $info->comment,
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
	public function all_commentss1()
	{
		// // print_r('a,mir ishauqe');exit;
		// $data = $this->Campgrounds->all_commetns_with_replies() ;

		// //print_r($data);exit;

		// foreach ($data as $key => $comment) {
		// 		$columns[] = array(
		// 		'Date'  =>   $comment['created_at'],
		// 	    'Name' => 	$comment['name'],
		// 	    'Comment' =>  $comment['comment'],

		// 		);
		// 	}

		// 	$json_data = array(
		// "recordsTotal"    => intval( 10 ),
		// "recordsFiltered" => intval( 10 ),
		// "data"            => $columns,
		// );

		// return json_encode($json_data);

		$start=$_REQUEST['start'];
		$end=$_REQUEST['length'];
		// if(!empty($_REQUEST['search']['value'])){
		// 	$like="CONCAT_WS(' ',subscribe.first_name,subscribe.last_name) LIKE '%".htmlspecialchars($_REQUEST['search']['value'])."%' ";
		//     //$like=array('subscribe.first_name' => htmlspecialchars($_REQUEST['search']['value']));
		// }else{
		//     $like='';
		// }

		if($_REQUEST['checkComments']=='comment'){
			$bool = false ;
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

			$where.=" AND detect_forum=0";
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
					'parentComm' => 'no comment',
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

			$bool = true ;
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
			$where.=" AND detect_forum_reply=0";

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
					'parentComm' => $info->comment,
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


	public function add_informational_head()
	{
		if(isset($this->adminId))
		{
		$data['title']='Add Informational Head';
		 $informationalhead=$this->Campgrounds->find('informationalhead','','','','','','','');
		 $data['informationhead']=$informationalhead;
		$data['yield']='admin/pages/informational_pages/add-informational-head.php';
		$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}

	}
	public function new_informational_head()
	{

		if(isset($this->adminId))
		{
		
		$data = $this->input->post();
                	$insert_data=array(
					
					'head_area'=>$data['head_area'],
					
				);
                	if(!empty($data['id'])){
                		$where = array('id' => $data['id']);
					$this->Campgrounds->update_data('id',$data['id'],'informationalhead',$insert_data,$where);
                	}else{
                		$this->Campgrounds->insert('informationalhead',$insert_data);
                	}

				    $this->session->set_flashdata('success', 'Informational head add successfully');
			        redirect($_SERVER['HTTP_REFERER']);

                


		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}
	public function new_informational_page()
	{

		if(isset($this->adminId))
		{
		
		$data = $this->input->post();
		  $config = array(
        array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
        ),
         array(
                'field' => 'slug',
                'label' => 'slug',
                'rules' => 'required'
        ),
         array(
                'field' => 'title',
                'label' => 'title',
                'rules' => 'required'
        ),
         array(
                'field' => 'keyword',
                'label' => 'keyword',
                'rules' => 'required'
        ),
           array(
                'field' => 'slug',
                'label' => 'slug',
                'rules' => 'required|is_unique[informationalpages.slug]'
        ),
           array(
                'field' => 'descriptin_meta_tag',
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

             		$this->add_informational_page();

                }
                else
                {
                	$config['upload_path'] = './uploads/informationalPages/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload');
              		 $this->upload->initialize($config);
   				if ( ! $this->upload->do_upload('banner'))
                {
                	$img='';
//                	print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];

                }
                	$file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
                	$insert_data=array('name'=>$data['name'],
					'slug'=>$data['slug'],
					'color'=>$data['color'],
					'nameColor'=>$data['nameColor'],
					'banner'=>$img,
					'alt'=>$data['alt'],
					'title'=>$data['title'],
					'keyword'=>$data['keyword'],
					//'mapLink'=>$data['map_link'],
					'meta_description'=>$data['descriptin_meta_tag'],
					'description'=>$data['description'],
				);

					$this->Campgrounds->insert('informationalpages',$insert_data) ;
				    $this->session->set_flashdata('success', 'Informational pages add successfully');
			        redirect($_SERVER['HTTP_REFERER']);

                }


		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}

	public function informational_pages()
	{
		if(isset($this->adminId))
		{
		$data['title']='Informational pages';
		$data['yield']='admin/pages/informational_pages/informational-pages.php';
		$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));	
		}
		
	}

public function informational_heads()
	{
		if(isset($this->adminId))
		{
		$data['title']='Informational heads';
		$data['yield']='admin/pages/informational_pages/informational-heads.php';
		$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));	
		}
		
	}

public function informational_pagenation_head()
{
		$start=$_REQUEST['start'];
		$end=$_REQUEST['length'];
		if(!empty($_REQUEST['search']['value'])){
		    $like=array('informationalhead.title' => $_REQUEST['search']['value']);
		}else{
		    $like='';
		}
		$infromations=$this->Campgrounds->find('informationalhead','',$start,$end,1,'',$like,'');       
		$totaldata =$this->Campgrounds->findNumRows('informationalhead','',$like);    
		$i=1;
		$i=$i*$start;
			$a = 1;
		$columns=array();
		foreach ($infromations as $info) {                   
		$columns[] = array(
			'id'  =>   $info->id,              
		    'title' => $info->title,
		    
		    'no' => $a,
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
public function informational_pagenation()
{
		$start=$_REQUEST['start'];
		$end=$_REQUEST['length'];
		if(!empty($_REQUEST['search']['value'])){
		    $like=array('informationalpages.name' => $_REQUEST['search']['value']);
		}else{
		    $like='';
		}
		 $ordeBy= array(
                    '0'=>['informationalpages.order','asc'],
                    );
		$infromations=$this->Campgrounds->find('informationalpages','',$start,$end,1,'',$like,'',$ordeBy);       
		$totaldata =$this->Campgrounds->findNumRows('informationalpages','',$like);    
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
		$columns[] = array(
			'id'  =>   $info->info_id,              
		    'name' => $info->name,
		    'slug' =>  $info->slug,
		    'live' =>  $info->live,
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
  public function sort_informational()
    {
    	$data = $this->input->post('order');
    	$start = $this->input->post('start');
    	//print_r($start);exit;
    	// print_r($data);exit;
    // $information = $this->Campgrounds->getInformationAllForSort(); //
  //  $start = $request->start;
        // foreach ($information as $info) {
           // $info->updated_at = false; // To disable update_at field updation
            // $id = $info->info_id;
            //print_r($id);exit;
            foreach ($this->input->post('order') as $orders) {
           // print_r($orders);exit;
                // if ($orders['id'] == $id) {
                    // $products->update(['order' => $order['position']]);
                    $update_data=array(
					
					'order'=>$orders['position']+$start,
				);
				$where = array('info_id' => $orders['id'] );

                  //  $categorie->order = $order['position'] + $start;
                    $this->Campgrounds->update_data('info_id',$orders['id'],'informationalpages',$update_data,$where);
                // }
            // }
        }        
        return 200;
    }


public function information_edit($id)
{
	if(isset($this->adminId))
	{	 $where = array('info_id' => $id);

  		 $informationalpages=$this->Campgrounds->find('informationalpages',$where,'','','','','','');
  		 	$select = "*,subscribe.id as IDS,subscribe.created_at as create,comments.created_at as datenew ,comments.id as comID";
					$join= array('0'=>['subscribe','comments.sender_id = subscribe.id','left']);
			$where = array('informationalpages_id' => $id );
			 $ordeBy= array(
                    '0'=>['menuitem.sort','asc'],
                    );
			 $ordeByCom= array(
                    '0'=>['comments.id','desc'],
                    );
			$start='0';
			$end=10;
  		 	$data['menuitems'] = $this->Campgrounds->find("menuitem",$where,'','',1,'','','',$ordeBy);
  		 	$where = array('informationalpages_id' => $id , 'comments_approved'=>1);
  		 	$data['comments'] = $this->Campgrounds->find("comments",$where,$start,$end,1,$join,'',$select,$ordeByCom);
  		 	// print_r($data['comments']);return;
  		 	$startnext='10';
			$endnext=10;
  		 	$joinnextcom= array('0'=>['replys','comments.id = replys.comment_id','left']);
  		 		$selectnextcom = "*,replys.id as RIDS ,comments.id as comID";
  		 		$data['countTotal'] = $this->Campgrounds->find("comments",$where,'','',1,$joinnextcom,'',$selectnextcom,$ordeByCom);
  		 	$data['commentsnext'] = $this->Campgrounds->find("comments",$where,$startnext,$endnext,1,$joinnextcom,'',$selectnextcom,$ordeByCom);
  		 		//echo "<pre>";print_r($data['commentsnext']);exit;
         $data['informationalpages']= $informationalpages;
	 	 $data['title']='Information Edit';
		 $data['yield']='admin/pages/informational_pages/edit-informational-page.php';
		 $this->load->view($this->layout,$data);
	}
	else
	{
		redirect(base_url('admin/login'));
	}
}

    public function sort_informational_menu()
    {
        $data = $this->input->post('order');
        $start = $this->input->post('start');
        //print_r($start);exit;
        // print_r($data);exit;
        // $information = $this->Campgrounds->getInformationAllForSort(); //
        //  $start = $request->start;
        // foreach ($information as $info) {
        // $info->updated_at = false; // To disable update_at field updation
        // $id = $info->info_id;
        //print_r($id);exit;
        foreach ($this->input->post('order') as $orders) {
            // print_r($orders);exit;
            // if ($orders['id'] == $id) {
            // $products->update(['order' => $order['position']]);
            $update_data=array(

                'sort'=>$orders['position'],
            );
            $where = array('id' => $orders['id'] );

            //  $categorie->order = $order['position'] + $start;
            $this->Campgrounds->update_data('id',$orders['id'],'menuitem',$update_data,$where);
            // }
            // }
        }
        return 200;
    }
public function comments_views($id)
{
	if(isset($this->adminId))
	{	 $where = array('info_id' => $id);

  		 $informationalpages=$this->Campgrounds->find('informationalpages',$where,'','','','','','');

  		 	$select = "*,subscribe.id as IDS,subscribe.created_at as create,comments.created_at as datenew ,comments.id as comID";
					$join= array('0'=>['subscribe','comments.sender_id = subscribe.id','left']);
			$where = array('informationalpages_id' => $id );
			 $ordeBy= array(
                    '0'=>['menuitem.id','desc'],
                    );
			 $ordeByCom= array(
                    '0'=>['comments.id','desc'],
                    );
			$start='0';
			$end=10;
			$data['id']=$id;
  		 	$data['menuitems'] = $this->Campgrounds->find("menuitem",$where,'','',1,'','','',$ordeBy);
  		 	$where = array('informationalpages_id' => $id , 'comments_approved'=>1,'menuitem_id'=>'NULL');
  		 	$data['comments'] = $this->Campgrounds->find("comments",$where,$start,$end,1,$join,'',$select,$ordeByCom);
  		 	// print_r($data['comments']);return;
  		 	$startnext='10';
			$endnext=10;
  		 	$joinnextcom= array('0'=>['replys','comments.id = replys.comment_id','left']);
  		 		$selectnextcom = "*,replys.id as RIDS ,comments.id as comID";
  		 		$data['countTotal'] = $this->Campgrounds->find("comments",$where,'','',1,$joinnextcom,'',$selectnextcom,$ordeByCom);
  		 	$data['commentsnext'] = $this->Campgrounds->find("comments",$where,$startnext,$endnext,1,$joinnextcom,'',$selectnextcom,$ordeByCom);
  		 		//echo "<pre>";print_r($data['commentsnext']);exit;
         $data['informationalpages']= $informationalpages;
	 	 $data['title']='Information Edit';
		 $data['yield']='admin/pages/informational_pages/views-comments-section.php';
		 $this->load->view($this->layout,$data);
	}
	else
	{
		redirect(base_url('admin/login'));
	}
}
public function comments_views_subpage()
{
	//echo $this->uri->segment(4);exit;
	
	if(isset($this->adminId))

	{	
//print_r($this->uri->segment(4));exit;
			$id=$this->uri->segment(3);
			$data['id']=$id;
			$idmenu=$this->uri->segment(4);
	 $where = array('info_id' => $id);

  		 $informationalpages=$this->Campgrounds->find('informationalpages',$where,'','','','','','');
  		 	$select = "*,subscribe.id as IDS,subscribe.created_at as create,comments.created_at as datenew ,comments.id as comID";
					$join= array('0'=>['subscribe','comments.sender_id = subscribe.id','left']);
			$where = array('informationalpages_id' => $id );
			 $ordeBy= array(
                    '0'=>['menuitem.id','desc'],
                    );
			 $ordeByCom= array(
                    '0'=>['comments.id','desc'],
                    );
			$start='0';
			$end=10;
  		 	$data['menuitems'] = $this->Campgrounds->find("menuitem",$where,'','',1,'','','',$ordeBy);

  		 	// single menu item which is selected 
  		 	$where = array('id' => $idmenu );
  		 	$data['SubpageDetails'] = $this->Campgrounds->find("menuitem",$where,'','',1,'','','',$ordeBy);
  		 	// print_r($data['SubpageDetails']);return;
  		 	
  		 	$where1 = array('informationalpages_id' => $id , 'comments_approved'=>1, 'menuitem_id'=>$idmenu);
  		 	$data['comments'] = $this->Campgrounds->find("comments",$where1,$start,$end,1,$join,'',$select,$ordeByCom);
  		 	 //print_r($data['comments']);return;
  		 	$startnext='10';
			$endnext=10;
  		 	$joinnextcom= array('0'=>['replys','comments.id = replys.comment_id','left']);
  		 		$selectnextcom = "*,replys.id as RIDS ,comments.id as comID";
  		 		$data['countTotal'] = $this->Campgrounds->find("comments",$where1,'','',1,$joinnextcom,'',$selectnextcom,$ordeByCom);
  		 	$data['commentsnext'] = $this->Campgrounds->find("comments",$where1,$startnext,$endnext,1,$joinnextcom,'',$selectnextcom,$ordeByCom);
  		 		//echo "<pre>";print_r($data['commentsnext']);exit;
         $data['informationalpages']= $informationalpages;
	 	 $data['title']='Information Edit';
		 $data['yield']='admin/pages/informational_pages/views-comments-section-subpage.php';
		 $this->load->view($this->layout,$data);
	}
	else
	{
		redirect(base_url('admin/login'));
	}
}
public function information_nextLoad()
{
	if(isset($this->adminId))
	{	 
		$id=$this->input->post('id');
			$where = array('informationalpages_id' => $id,'comments_approved'=>1 ,'menuitem_id'=>'NULL' );
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
$commentsCount = $this->Campgrounds->findNumRowsPagenation2("comments",$where,'',$join);
//print_r($comments);exit;

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
                                              <a class="comment-reply-link comment-replyss" href="javascript:void(0)" data-id="'.$comment->comID.'">Reply</a>
                                              
                                           </figure>
                                           <div class="text-holder">
                                            
                                              ';
                                              $old_date_timestamp = strtotime($comment->datenew);
                                              $new_date = date('M d, y', $old_date_timestamp);
                                            // print_r($comment->created_at);
                                             $html.='
                                                <h6>
                                               ';
    if($comment->first_name=='' && $comment->sender_id!=0){
        $html.= "Anonymous";
    }
    else if($comment->first_name!=''){
                                                 $html.=' '. $comment->first_name.' '.$comment->last_name .'';
                                                }else{
                                                   $html.= 'Camping Steve';
                                                }
                                                $html.='</h6>                                              
                                               <a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="'. $comment->comID.'" data-toggle="tooltip" title="Delete">Delete</a>
                                               <a class="comment-reply-link comment-edit comment-edit-'.$comment->comID.'" href="javascript:void(0)" data-id="'. $comment->comID.'" data-message="'.$comment->comment.'">Edit</a> 
                                              <time class="post-date" datetime="">'.$new_date.'</time><br>
                                              <p class="thumb-list-'.$comment->comID.'">'. $comment->comment.'</p>
                                            
                                           </div>
                                         
                                        </div>
                                        <ul class="children">
                                           <li class="reply-go-'.$comment->comID.'">
                                           '; foreach ($replys as $key => $reply) {
                                              $old_date_timestamp = strtotime($reply->create_at);
                                              $new_date = date('M d, y', $old_date_timestamp);
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
        if($reply->first_name==''&& $reply->user_id!=0){
            $html.= "Anonymous";
        }else if($reply->first_name!=''){
                                                  $html.=''.$reply->first_name.' '.$reply->last_name.'';
                                                }else{
                                                   $html.='Camping Steve';
                                                }
                                                $html.='</h6>
                                                   
                                                     <a href="javascript:void(0)" class="comment-reply-link delete_comment_reply"  data-id="'. $reply->replyID.'" data-toggle="tooltip" title="Delete">Delete</a>
                                                    <a class="comment-reply-link comment-edit-reply comment-edit-reply-'.$reply->replyID.'" href="javascript:void(0)" data-id="'.$reply->replyID.'" data-message="'. $reply->comment_reply.'">Edit</a>
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
                                  $arrayName = array('0' =>$html ,'1'=>$c, '2'=>$commentsCount );
       echo json_encode($arrayName); 
	}
	else
	{
		redirect(base_url('admin/login'));
	}
}



// make html 

                                  // <!--  -->

public function update_information()
{
	if(isset($this->adminId))
	{	
		$data = $this->input->post();
		  $config = array(
        array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
        ),
         array(
                'field' => 'slug',
                'label' => 'slug',
                'rules' => 'required'
        ),
         array(
                'field' => 'title',
                'label' => 'title',
                'rules' => 'required'
        ),
         array(
                'field' => 'keyword',
                'label' => 'keyword',
                'rules' => 'required'
        ),
        //    array(
        //         'field' => 'map_link',
        //         'label' => 'Map link',
        //         'rules' => 'required'
        // ),
           array(
                'field' => 'descriptin_meta_tag',
                'label' => 'descriptin meta tag',
                'rules' => 'required'
        ),
           
		);

		  		$this->form_validation->set_rules($config);
			 	if ($this->form_validation->run() == FALSE)
                {
             		$this->add_informational_page();
             		return;
                }
                	//print_r($data);exit;
            $config['upload_path'] = './uploads/informationalPages/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload');
              		 $this->upload->initialize($config);
   				if ( ! $this->upload->do_upload('ebanner'))
                { 
                	 $banner = $data['banner_O'];
                }
                else
                {   $file_data	=  $this->upload->data();
					 $banner   = $file_data['file_name'];					
                }

                	$insert_data=array('name'=>$data['name'],
					'slug'=>$data['slug'],
					'color'=>$data['color'],
					'nameColor'=>$data['nameColor'],
					'banner'=>$banner,
					'alt'=>$data['alt'],
					'title'=>$data['title'],
					'keyword'=>$data['keyword'],
					//'mapLink'=>$data['map_link'],
					'meta_description'=>$data['descriptin_meta_tag'],
					'description'=>$data['description'],
				);

                	$where = array('info_id' => $data['id']);
					$this->Campgrounds->update_data('info_id',$data['id'],'informationalpages',$insert_data,$where);
					$this->session->set_flashdata('success', 'Page updated successfully.');
					redirect($_SERVER['HTTP_REFERER']);

	}
	else
	{
		redirect(base_url('admin/login'));
	}
}

public function add_menu_item($id)
	{
		if(isset($this->adminId))
		{
		$data['info_page_id'] = $id;
		$data['title']='Add Menu Item';
		$data['yield']='admin/pages/informational_pages/add-menu-item.php';
		$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}



	public function new_menu_item()
	{
		if(isset($this->adminId))
		{
		$data = $this->input->post();
		//print_r($data);exit;
		  $config = array(
        array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
        ),
    	);
		  $this->form_validation->set_rules($config);
			 	if ($this->form_validation->run() == FALSE)
                {
             		$this->add_menu_item();
             		return;
                }

                $insert_data=array('name'=>$data['name'],
                		'informationalpages_id'=>$data['info_page_id'],
                		'menu_slug'=>$data['menu_slug'],
                		'menu_page_title'=>$data['menu_title'],
                		'menu_keywords'=>$data['menu_keywords'],
                		'menu_seo_description'=>$data['menu_description'],
					//'description'=>$data['description'],
					'description'=>$data['descriptionmenu'],
				);

					$this->Campgrounds->insert('menuitem',$insert_data);
				    $this->session->set_flashdata('success', 'Menu item add successfully');
			        redirect($_SERVER['HTTP_REFERER']);


		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}
public function banner_image_home()
{
	if(isset($this->adminId))
		{
				$data = $this->input->post();
				//print_r($data);exit;
			$config['upload_path'] = './uploads/homebanner/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload', $config);
   				if ( ! $this->upload->do_upload('banner_image'))
                { 
                	// print_r( $this->upload->display_errors());return;
                	   $this->session->set_flashdata('error', 'Error! Please Try Again');
					
					// $this->session->set_flashdata('show-v',"1");
					redirect(base_url('admin/homepage-content'));
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
                }
                	$file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];


                	$insert_data=array(
                	'banner_heading'=>$data['banner_text'],
                	// 'banner_time'=>$data['transition_time'],
                	'image_name'=>$img,
                	
                	);
               			$this->Campgrounds->insert('banner_image_home',$insert_data);
				    $this->session->set_flashdata('success', 'Banner Image added successfully');
					
					// $this->session->set_flashdata('show-v',"1");
					redirect(base_url('admin/homepage-content'));

               
		}else{
			redirect(base_url('admin/login'));
		}
	# code...
}
public function new_home_image()
{
	if(isset($this->adminId))
		{
				$data = $this->input->post();
				//print_r($data);exit;
			$config['upload_path'] = './uploads/homebanner/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload', $config);
   				if ( ! $this->upload->do_upload('banner_image'))
                { 
                	print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
                }
                	$file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];


                	$insert_data=array(
                	//'banner_heading'=>$data['banner_text'],
                	//'banner_time'=>$data['transition_time'],
                	'image'=>$img,
                	
                	);
               			$this->Campgrounds->insert('home_page_image',$insert_data);
				    $this->session->set_flashdata('success', 'Home Page Image added successfully');
					
					// $this->session->set_flashdata('show-v',"1");
					redirect(base_url('admin/homepage-content'));

               
		}else{
			redirect(base_url('admin/login'));
		}
	# code...
}

	public function menu_item_edit($id)
	{
		if(isset($this->adminId))
		{
		$where = array('id' => $id);
  		$menuitem=$this->Campgrounds->find('menuitem',$where,'','','','','','');
  		$data['menuitem'] = $menuitem;
		$data['title']='Edit Menu Item';
		$data['yield']='admin/pages/informational_pages/edit-menu-item.php';
		$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}


	public function update_menu_item()
	{
		if(isset($this->adminId))
		{
		$data = $this->input->post();
		//print_r($data);exit;
		  $config = array(
        array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
        ),
    	);
		  $this->form_validation->set_rules($config);
			 	if ($this->form_validation->run() == FALSE)
                {
             		$this->add_menu_item();
             		return;
                }

                $insert_data=array('name'=>$data['name'],
					//'description'=>$data['description'],
					'description'=>$data['descriptionedit'],
					'menu_slug'=>$data['menu_slug'],
            		'menu_page_title'=>$data['menu_title'],
            		'menu_keywords'=>$data['menu_keywords'],
            		'menu_seo_description'=>$data['menu_description'],

				);
				$where = array('id' => $data['id'] );

					$this->Campgrounds->update_data('id',$data['id'],'menuitem',$insert_data,$where);
					$this->session->set_flashdata('success', 'Menu item update successfully');
					redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}

	public function update_banner_image_home()
	{
		if(isset($this->adminId))
		{
		$data = $this->input->post();
				//print_r($data);exit;
			$config['upload_path'] = './uploads/homebanner/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload', $config);
              		$img;
   				if ( ! $this->upload->do_upload('banner_image'))
                { 
                	//echo "ok";exit;
                	//print_r( $this->upload->display_errors());return;
                	//$data['transition_time'];
                	$img=$data['image'];
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
                }
                //	$file_data	=  $this->upload->data();
                	//print_r($this->upload->do_upload('banner_image'));exit;
				//	$img  = $file_data['file_name'];
                	//print_r($img);exit;

                	$insert_data=array(
                	'banner_heading'=>$data['banner_text'],
                	//'banner_time'=>$data['transition_time'],
                	'image_name'=>$img,
                	
                	);
				$where = array('id_image' => $data['id'] );

					$this->Campgrounds->update_data('id_image',$data['id'],'banner_image_home',$insert_data,$where);
					$this->session->set_flashdata('success', 'Banner Image updated successfully');
					redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}
	public function main_image_add()
	{
		if(isset($this->adminId))
		{
		$data = $this->input->post();
				//print_r($data);exit;
			$config['upload_path'] = './uploads/homebanner/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload', $config);
              		$img;
   				if ( ! $this->upload->do_upload('banner_image'))
                { 
                	//echo "ok";exit;
                	//print_r( $this->upload->display_errors());return;
                	//$data['transition_time'];
                	$img=$data['image'];
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
                }
                //	$file_data	=  $this->upload->data();
                	//print_r($this->upload->do_upload('banner_image'));exit;
				//	$img  = $file_data['file_name'];
                	//print_r($img);exit;

                	$insert_data=array(
                	//'banner_heading'=>$data['banner_text'],
                	//'banner_time'=>$data['transition_time'],
                	'image'=>$img,
                	
                	);
				$where = array('id' => $data['id'] );

					$this->Campgrounds->update_data('id_image',$data['id'],'home_page_image',$insert_data,$where);
					$this->session->set_flashdata('success', 'Home Page Image updated successfully');
					redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}


public function save_info()
{
	$data = $this->input->post();
	$where = array('info_id' => $data['id']);
	$insert_data = array('live'=>0);
	$this->Campgrounds->update_data('info_id',$data['id'],'informationalpages',$insert_data,$where);
	echo 'true';
}

public function publish_info()
{
	$data = $this->input->post();
	$where = array('info_id' => $data['id']);
	$insert_data = array('live'=>1);
	$this->Campgrounds->update_data('info_id',$data['id'],'informationalpages',$insert_data,$where);
	echo 'true';
}

public function delete_info()
{
		$data = $this->input->post();
		$this->db->delete('informationalpages', array('info_id' => $data['id'])); 
		echo 'true';
}
public function delete_info_menu()
{
		$data = $this->input->post();
		$this->db->delete('menuitem', array('id' => $data['id'])); 
		echo 'true';
}
public function delete_banner_image_home()
{
		$data = $this->input->post();
		  $where = array('id_image' =>$data['id']);
      $subPage = $this->Campgrounds->find("banner_image_home",$where,'','',1);
		$image_path=base_url().'uploads/homebanner/'.$subPage->image_name;
		
        if (file_exists($image_path))
        {
            unlink($image_path);
        }
		$this->db->delete('banner_image_home', array('id_image' => $data['id'])); 
		echo 'true';
}
public function delete_comment()
{
		$data = $this->input->post();
		$this->db->delete('comments', array('id' => $data['id'])); 
		$this->db->delete('replys', array('comment_id' => $data['id'])); 
		echo 'true';
}
public function approved_comment()
{
	$data = $this->input->post();
	//print_r($data);exit;
		$dataa = array(
           // 'id' => $this->input->post('comment_id'),
        'comments_approved' => 1
        );
      $where = array('id' => $data['id']);
      // $id=$this->db->insert('replys', $data);
      $this->Campgrounds->update_data('comments_approved','','comments',$dataa,$where);
      echo 'true';
}
public function approved_reply()
{
	$data = $this->input->post();
	//print_r($data);exit;
		$dataa = array(
           // 'id' => $this->input->post('comment_id'),
        'reply_approved' => 1
        );
      $where = array('id' => $data['id']);
      // $id=$this->db->insert('replys', $data);
      $this->Campgrounds->update_data('reply_approved','','replys',$dataa,$where);
      echo 'true';
}
public function delete_comment_reply()
{
		$data = $this->input->post();
		$this->db->delete('replys', array('id' => $data['id']));
		echo 'true';
}
   public function ajaxRequestReply()
   {
    	$userAdminId = $this->Campgrounds->getAdminId() ;
//    	print_r($userAdminId);exit();

    	if(isset($this->session->userdata['admindata']['adminId']) )
		{
			$data = array(
				'comment_id' => $this->input->post('comment_id'),
				'comment_reply' => $this->input->post('comment_reply'),
				'reply_approved' => 1,
				'menus_id'=>'NULL',
				'detect_forum_reply' => $this->input->post('detect_forum_reply'),
				'user_id' => $userAdminId->id ,
			);
		}else{
			$data = array(
				'comment_id' => $this->input->post('comment_id'),
				'comment_reply' => $this->input->post('comment_reply'),
				'reply_approved' => 1,
				'menus_id'=>'NULL',
				'detect_forum_reply' => $this->input->post('detect_forum_reply'),
				) ;
		}

      // $id=$this->db->insert('replys', $data);
      		$id= $this->Campgrounds->insert('replys',$data);
      // print_r($id);
      	echo $id;
      // echo 'Added successfully.';  
   }
   public function ajaxRequestReplySubPage()
   {
     
      $data = array(
            'comment_id' => $this->input->post('comment_id'),
        'comment_reply' => $this->input->post('comment_reply'),
        'reply_approved' => 1,
        'menus_id'=>$this->input->post('menuid')
        );
      // $id=$this->db->insert('replys', $data);
      		$id= $this->Campgrounds->insert('replys',$data);
      // print_r($id);
      	echo $id;
      // echo 'Added successfully.';  
   }
   public function ajaxRequestCOmmentEdit()
   {
       $data = array(
            'id' => $this->input->post('comment_id'),
        	'comment' => $this->input->post('comment')
        );
      $where = array('id' => $this->input->post('comment_id'));
      // $id=$this->db->insert('replys', $data);
      $id= $this->Campgrounds->update_data('comment','','comments',$data,$where);
      
      // print_r($id);
      	echo $id;
      // echo 'Added successfully.';  
   }
   public function ajaxRequestCOmmentReplyEdit()
   {
   	$data=$this->input->post();
   //	print_r($data);exit;
       $data = array(
            'id' => $this->input->post('reply_id'),
        'comment_reply' => $this->input->post('comment'),
        );
      $where = array('id' => $this->input->post('reply_id'));
      // $id=$this->db->insert('replys', $data);
      $id= $this->Campgrounds->update_data('comment_reply','','replys',$data,$where);
      
      // print_r($id);
      	echo $id;
      // echo 'Added successfully.';  
   }
   public function ajaxRequestCommentPost()
   {
      $data = array(
            'informationalpages_id' => $this->input->post('informationalpages_id'),
              
            'comment' => $this->input->post('comment'),
            'name' => "Admin",
            'comments_approved' =>1,
            'menuitem_id'=>'NULL'
        );
     
	$id= $this->Campgrounds->insert('comments',$data);

     echo $id;  
   }
   public function ajaxRequestSubpage()
   {
   	$id=$this->input->post('id');
   $where = array('informationalpages_id' => $id);
      $subPage = $this->Campgrounds->find("menuitem",$where,'','',1);
    echo json_encode($subPage);
     // echo $subPage;  
   }
   public function ajaxRequestCommentPostSubPage()
   {
      $data = array(
            'informationalpages_id' => $this->input->post('informationalpages_id'),
              
            'comment' => $this->input->post('comment'),
            'name' => "Admin",
            'comments_approved' =>1,
            'menuitem_id'=>$this->input->post('menuid'),
        );
     
	$id= $this->Campgrounds->insert('comments',$data);

     echo $id;  
   }
public function delete_info_head()
{
		$data = $this->input->post();
		$this->db->delete('informationalhead', array('id' => $data['id'])); 
		echo 'true';
}


public function homepage_content()
{
		if(isset($this->adminId))
		{
			$this->db->select('*');
	        $this->db->from('home_content');
	        $query=$this->db->get();
			$row=$query->row();
			$data['regions'] = $this->Campgrounds->find("region",'','','',1);
			$data['home_images'] = $this->Campgrounds->find("banner_image_home",'','','',1);
			$data['home_main_img'] = $this->Campgrounds->find("home_page_image",'','','',1);
			//print_r($data['home_images']);exit;
			$data['home'] = $row;
			$data['title']='Homepage Content';
			$data['yield']='admin/pages/informational_pages/add-homepage-content.php';
			$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}

}

public function update_region_content()
{
	if(isset($this->adminId))
		{
			$data = $this->input->post();
				$insert_data=array(
                	'name'=>$data['r0']);
					$where = array('id' => 1);
					$this->Campgrounds->update_data('id',1,'region',$insert_data,$where);

					$insert_data=array(
                	'name'=>$data['r1']);
					$where = array('id' => 2);
					$this->Campgrounds->update_data('id',2,'region',$insert_data,$where);

					$insert_data=array(
                	'name'=>$data['r2']);
					$where = array('id' => 3);
					$this->Campgrounds->update_data('id',3,'region',$insert_data,$where);

					$insert_data=array(
                	'name'=>$data['r3']);
					$where = array('id' => 4);
					$this->Campgrounds->update_data('id',4,'region',$insert_data,$where);

						$insert_data=array(
                	'name'=>$data['r4']);
					$where = array('id' => 5);
					$this->Campgrounds->update_data('id',5,'region',$insert_data,$where);

						$insert_data=array(
                	'name'=>$data['r5']);
					$where = array('id' => 6);
					$this->Campgrounds->update_data('id',6,'region',$insert_data,$where);

						$insert_data=array(
                	'name'=>$data['r6']);
					$where = array('id' => 7);
					$this->Campgrounds->update_data('id',7,'region',$insert_data,$where);

						$insert_data=array(
                	'name'=>$data['r7']);
					$where = array('id' => 8);
					$this->Campgrounds->update_data('id',8,'region',$insert_data,$where);

						$insert_data=array(
                	'name'=>$data['r8']);
					$where = array('id' => 9);
					$this->Campgrounds->update_data('id',9,'region',$insert_data,$where);

					$this->session->set_flashdata('success', 'Region update successfully');
					redirect($_SERVER['HTTP_REFERER']);

		}
		else
		{
			redirect(base_url('admin/login'));
		}

}



	public function region_edit()
	{
		$data['regions'] = $this->Campgrounds->find("region",'','','',1);

		$data['title']='update region';
		$data['yield']='admin/pages/region/region.php';
		$this->load->view($this->layout,$data);
	}

public function region1($value='')
{
	if(isset($this->adminId))
		{
				$data = $this->input->post();
		
				$check=0;
				$check_map=0;

		  $valid = array(
        array(
                'field' => 'r0',
                'label' => 'Region Name',
                'rules' => 'required|max_length[50]'
        ),
         array(
                'field' => 'slug0',
                'label' => 'slug',
                'rules' => 'required|max_length[50]|alpha_dash'
        ),
        //  array(
        //         'field' => 'banner_alt0',
        //         'label' => 'Banner Alt',
        //         'rules' => 'required|max_length[200]'
        // ),
           array(
                'field' => 'color0',
                'label' => 'Color',
                'rules' => 'required|max_length[100]'
        ),
		);

		  		$file_name='';
                   $config['upload_path']          = './uploads/Banner';
                   $config['allowed_types']        = 'jpg|png|jpeg';
                   $config['encrpy_name']          = 100;
                   $this->load->library('upload', $config);
                   if ( strlen($_FILES['banner0']['name']) > 0){
		                if ($this->upload->do_upload('banner0'))
		                  {
		                       $file_data    =  $this->upload->data();
		                       $file_name  = $file_data['file_name'];

		                  }
		                  else
		                  {
		                     	 $imageError = $this->upload->display_errors();
		                         $this->session->set_flashdata('imageerror',$imageError);
		                         $check++;
		                     
		                  }
              }

              //in case of map.

              	$file_name_map='';
                   $config['upload_path']          = './uploads/Banner';
                   $config['allowed_types']        = 'jpg|png|jpeg';
                   $config['encrpy_name']          = 100;
                   $this->load->library('upload', $config);

                   if ( strlen($_FILES['map0']['name']) > 0){
		                if ($this->upload->do_upload('map0'))
		                  {
		                       $file_data    =  $this->upload->data();
		                       $file_name_map  = $file_data['file_name'];
		                       // print_r($file_name_map); return ;

		                  }else{
		                  	$check_map++;
		                  	$file_name_map='';

		                  }
		                  
              }
            //  print_r($file_name);exit;

		  $this->form_validation->set_rules($valid);
		  if ($this->form_validation->run() == FALSE)
                {
             		$ins =$this->form_validation->error_array();
             		
				       $this->session->set_flashdata('error1', $ins);
				       $this->session->set_flashdata('data',$data);

				        $check++;
				        $check_map++;
                }


                 //for map_iamge
                	if($check_map==0){
	                	if($file_name_map==''){
	                	$insert_data=array(
	                	'name'=>$data['r0'],
	                	'slug'=>$data['slug0'],
	                	'color'=>$data['color0'],
	                
	                	);
	                	$where = array('id' => 1);
					$this->Campgrounds->update_data('id','','region',$insert_data,$where);
	                	// print_r("in if") ;return ;
	                }else{
	                	$insert_data=array(
	                	'name'=>$data['r0'],
	                	'slug'=>$data['slug0'],
	                	//'bannerAlt'=>$data['banner_alt0'],
	                	'color'=>$data['color0'],
	                	'map_image'=>$file_name_map,
	                	);
	                	$where = array('id' => 1);
					$this->Campgrounds->update_data('id','','region',$insert_data,$where);
	                	// print_r("in else") ;return ;
	                }
	            }
                 //end for map image

                if($check==0){
                	if($file_name==''){
                	$insert_data=array(
                	'name'=>$data['r0'],
                	'slug'=>$data['slug0'],
                	//'bannerAlt'=>$data['banner_alt0'],
                	'color'=>$data['color0'],

                	);
                	$where = array('id' => 1);
					$this->Campgrounds->update_data('id','','region',$insert_data,$where);
                }else{
                	$insert_data=array(
                	'name'=>$data['r0'],
                	'slug'=>$data['slug0'],
                	//'bannerAlt'=>$data['banner_alt0'],
                	'color'=>$data['color0'],
                	'bannerImage'=>$file_name,
                	);
                	$where = array('id' => 1);
					$this->Campgrounds->update_data('id','','region',$insert_data,$where);
                }
                //print_r($insert_data);exit;
					// $where = array('id' => 1);
					// $this->Campgrounds->update_data('id','','region',$insert_data,$where);
					$this->session->set_flashdata('success1',"Region ".$data['r0']." updated succssfully");
					$this->session->set_flashdata('show-v',"1");
					redirect(base_url('admin/add-new-region'));

                }else{
                	$this->session->set_flashdata('show-v',"1");
                	redirect(base_url('admin/add-new-region'));
                }

		}else{
			redirect(base_url('admin/login'));
		}
	# code...
}

public function region2($value='')
{
	if(isset($this->adminId))
		{
				$data = $this->input->post();
				$check=0;

		  $valid = array(
        array(
                'field' => 'r2',
                'label' => 'Region Name',
                'rules' => 'required|max_length[50]'
        ),
         array(
                'field' => 'slug2',
                'label' => 'slug',
                'rules' => 'required|max_length[50]|alpha_dash'
        ),
        //  array(
        //         'field' => 'banner_alt2',
        //         'label' => 'Banner Alt',
        //         'rules' => 'required|max_length[200]'
        // ),
           array(
                'field' => 'color2',
                'label' => 'Color',
                'rules' => 'required|max_length[100]'
        ),
		);

		  		$file_name='';
                   $config['upload_path']          = './uploads/Banner';
                   $config['allowed_types']        = 'jpg|png|jpeg';
                   $config['encrpy_name']          = 100;
                   $this->load->library('upload', $config);
                   if ( strlen($_FILES['banner2']['name']) > 0){
		                if ($this->upload->do_upload('banner2'))
		                  {
		                       $file_data    =  $this->upload->data();
		                       $file_name  = $file_data['file_name'];

		                  }
		                  else
		                  {
		                     	 $imageError = $this->upload->display_errors();
		                         $this->session->set_flashdata('imageerror',$imageError);
		                         $check++;
		                      // print_r($errors);return;
		                  }
              }

              
		  $this->form_validation->set_rules($valid);
		  if ($this->form_validation->run() == FALSE)
                {
             		$ins =$this->form_validation->error_array();
				       $this->session->set_flashdata('error1', $ins);
				       $this->session->set_flashdata('data',$data);
				        $check++;
                }
                if($check==0){
                	if($file_name==''){
                	$insert_data=array(
                	'name'=>$data['r2'],
                	'slug'=>$data['slug2'],
                	//'bannerAlt'=>$data['banner_alt2'],
                	'color'=>$data['color2'],

                	);
                }else{
                	$insert_data=array(
                	'name'=>$data['r2'],
                	'slug'=>$data['slug2'],
                	//'bannerAlt'=>$data['banner_alt2'],
                	'color'=>$data['color2'],
                	'bannerImage'=>$file_name,
                	);
                }
					$where = array('id' => 2);
					$this->Campgrounds->update_data('id','','region',$insert_data,$where);
					$this->session->set_flashdata('success1',"Region ".$data['r2']." updated succssfully");
					$this->session->set_flashdata('show-v',"2");
						redirect(base_url('admin/add-new-region'));
                }else{
                	$this->session->set_flashdata('show-v',"2");
                		redirect(base_url('admin/add-new-region'));
                }

		}else{
			redirect(base_url('admin/login'));
		}
	# code...
}

public function region3($value='')
{
	if(isset($this->adminId))
		{
				$data = $this->input->post();
				$check=0;

		  $valid = array(
        array(
                'field' => 'r3',
                'label' => 'Region Name',
                'rules' => 'required|max_length[50]'
        ),
         array(
                'field' => 'slug3',
                'label' => 'slug',
                'rules' => 'required|max_length[50]|alpha_dash'
        ),
        //  array(
        //         'field' => 'banner_alt3',
        //         'label' => 'Banner Alt',
        //         'rules' => 'required|max_length[200]'
        // ),
           array(
                'field' => 'color3',
                'label' => 'Color',
                'rules' => 'required|max_length[100]'
        ),
		);

		  		$file_name='';
                   $config['upload_path']          = './uploads/Banner';
                   $config['allowed_types']        = 'jpg|png|jpeg';
                   $config['encrpy_name']          = 100;
                   $this->load->library('upload', $config);
                   if ( strlen($_FILES['banner3']['name']) > 0){
		                if ($this->upload->do_upload('banner3'))
		                  {
		                       $file_data    =  $this->upload->data();
		                       $file_name  = $file_data['file_name'];

		                  }
		                  else
		                  {
		                     	 $imageError = $this->upload->display_errors();
		                         $this->session->set_flashdata('imageerror',$imageError);
		                         $check++;
		                      // print_r($errors);return;
		                  }
              }

              
		  $this->form_validation->set_rules($valid);
		  if ($this->form_validation->run() == FALSE)
                {
             		$ins =$this->form_validation->error_array();
				       $this->session->set_flashdata('error1', $ins);
				       $this->session->set_flashdata('data',$data);
				        $check++;
                }
                if($check==0){
                	if($file_name==''){
                	$insert_data=array(
                	'name'=>$data['r3'],
                	'slug'=>$data['slug3'],
                	//'bannerAlt'=>$data['banner_alt3'],
                	'color'=>$data['color3'],

                	);
                }else{
                	$insert_data=array(
                	'name'=>$data['r3'],
                	'slug'=>$data['slug3'],
                	//'bannerAlt'=>$data['banner_alt3'],
                	'color'=>$data['color3'],
                	'bannerImage'=>$file_name,
                	);
                }
					$where = array('id' => 3);
					$this->Campgrounds->update_data('id','','region',$insert_data,$where);
					$this->session->set_flashdata('success1',"Region ".$data['r3']." updated succssfully");
					$this->session->set_flashdata('show-v',"3");
						redirect(base_url('admin/add-new-region'));
                }else{
                	$this->session->set_flashdata('show-v',"3");
                		redirect(base_url('admin/add-new-region'));
                }

		}else{
			redirect(base_url('admin/login'));
		}
	# code...
}


public function region4($value='')
{
	if(isset($this->adminId))
		{
				$data = $this->input->post();
				$check=0;

		  $valid = array(
        array(
                'field' => 'r4',
                'label' => 'Region Name',
                'rules' => 'required|max_length[50]'
        ),
         array(
                'field' => 'slug4',
                'label' => 'slug',
                'rules' => 'required|max_length[50]|alpha_dash'
        ),
        //  array(
        //         'field' => 'banner_alt4',
        //         'label' => 'Banner Alt',
        //         'rules' => 'required|max_length[200]'
        // ),
           array(
                'field' => 'color4',
                'label' => 'Color',
                'rules' => 'required|max_length[100]'
        ),
		);

		  		$file_name='';
                   $config['upload_path']          = './uploads/Banner';
                   $config['allowed_types']        = 'jpg|png|jpeg';
                   $config['encrpy_name']          = 100;
                   $this->load->library('upload', $config);
                   if ( strlen($_FILES['banner4']['name']) > 0){
		                if ($this->upload->do_upload('banner4'))
		                  {
		                       $file_data    =  $this->upload->data();
		                       $file_name  = $file_data['file_name'];

		                  }
		                  else
		                  {
		                     	 $imageError = $this->upload->display_errors();
		                         $this->session->set_flashdata('imageerror',$imageError);
		                         $check++;
		                      // print_r($errors);return;
		                  }
              }

              
		  $this->form_validation->set_rules($valid);
		  if ($this->form_validation->run() == FALSE)
                {
             		$ins =$this->form_validation->error_array();
				       $this->session->set_flashdata('error1', $ins);
				       $this->session->set_flashdata('data',$data);
				        $check++;
                }
                if($check==0){
                	if($file_name==''){
                	$insert_data=array(
                	'name'=>$data['r4'],
                	'slug'=>$data['slug4'],
                	//'bannerAlt'=>$data['banner_alt4'],
                	'color'=>$data['color4'],

                	);
                }else{
                	$insert_data=array(
                	'name'=>$data['r4'],
                	'slug'=>$data['slug4'],
                	//'bannerAlt'=>$data['banner_alt4'],
                	'color'=>$data['color4'],
                	'bannerImage'=>$file_name,
                	);
                }
					$where = array('id' => 4);
					$this->Campgrounds->update_data('id','','region',$insert_data,$where);
					$this->session->set_flashdata('success1',"Region ".$data['r4']." updated succssfully");
					$this->session->set_flashdata('show-v',"4");
						redirect(base_url('admin/add-new-region'));
                }else{
                	$this->session->set_flashdata('show-v',"4");
                		redirect(base_url('admin/add-new-region'));
                }

		}else{
			redirect(base_url('admin/login'));
		}
	# code...
}

public function region5($value='')
{
	if(isset($this->adminId))
		{
				$data = $this->input->post();
				$check=0;

		  $valid = array(
        array(
                'field' => 'r5',
                'label' => 'Region Name',
                'rules' => 'required|max_length[50]'
        ),
         array(
                'field' => 'slug5',
                'label' => 'slug',
                'rules' => 'required|max_length[50]|alpha_dash'
        ),
        //  array(
        //         'field' => 'banner_alt5',
        //         'label' => 'Banner Alt',
        //         'rules' => 'required|max_length[200]'
        // ),
           array(
                'field' => 'color5',
                'label' => 'Color',
                'rules' => 'required|max_length[100]'
        ),
		);

		  		$file_name='';
                   $config['upload_path']          = './uploads/Banner';
                   $config['allowed_types']        = 'jpg|png|jpeg';
                   $config['encrpy_name']          = 100;
                   $this->load->library('upload', $config);
                   if ( strlen($_FILES['banner5']['name']) > 0){
		                if ($this->upload->do_upload('banner5'))
		                  {
		                       $file_data    =  $this->upload->data();
		                       $file_name  = $file_data['file_name'];

		                  }
		                  else
		                  {
		                     	 $imageError = $this->upload->display_errors();
		                         $this->session->set_flashdata('imageerror',$imageError);
		                         $check++;
		                      // print_r($errors);return;
		                  }
              }

              
		  $this->form_validation->set_rules($valid);
		  if ($this->form_validation->run() == FALSE)
                {
             		$ins =$this->form_validation->error_array();
				       $this->session->set_flashdata('error1', $ins);
				       $this->session->set_flashdata('data',$data);
				        $check++;
                }
                if($check==0){
                	if($file_name==''){
                	$insert_data=array(
                	'name'=>$data['r5'],
                	'slug'=>$data['slug5'],
                	//'bannerAlt'=>$data['banner_alt5'],
                	'color'=>$data['color5'],

                	);
                }else{
                	$insert_data=array(
                	'name'=>$data['r5'],
                	'slug'=>$data['slug5'],
                	//'bannerAlt'=>$data['banner_alt5'],
                	'color'=>$data['color5'],
                	'bannerImage'=>$file_name,
                	);
                }
					$where = array('id' => 5);
					$this->Campgrounds->update_data('id','','region',$insert_data,$where);
					$this->session->set_flashdata('success1',"Region ".$data['r5']." updated succssfully");
					$this->session->set_flashdata('show-v',"5");
					redirect(base_url('admin/add-new-region'));
                }else{
                	$this->session->set_flashdata('show-v',"5");
                		redirect(base_url('admin/add-new-region'));
                }

		}else{
			redirect(base_url('admin/login'));
		}
	# code...
}




public function region6($value='')
{
	if(isset($this->adminId))
		{
				$data = $this->input->post();
				$check=0;

		  $valid = array(
        array(
                'field' => 'r6',
                'label' => 'Region Name',
                'rules' => 'required|max_length[60]'
        ),
         array(
                'field' => 'slug6',
                'label' => 'slug',
                'rules' => 'required|max_length[60]|alpha_dash'
        ),
        //  array(
        //         'field' => 'banner_alt6',
        //         'label' => 'Banner Alt',
        //         'rules' => 'required|max_length[200]'
        // ),
           array(
                'field' => 'color6',
                'label' => 'Color',
                'rules' => 'required|max_length[100]'
        ),
		);

		  		$file_name='';
                   $config['upload_path']          = './uploads/Banner';
                   $config['allowed_types']        = 'jpg|png|jpeg';
                   $config['encrpy_name']          = 100;
                   $this->load->library('upload', $config);
                   if ( strlen($_FILES['banner6']['name']) > 0){
		                if ($this->upload->do_upload('banner6'))
		                  {
		                       $file_data    =  $this->upload->data();
		                       $file_name  = $file_data['file_name'];

		                  }
		                  else
		                  {
		                     	 $imageError = $this->upload->display_errors();
		                         $this->session->set_flashdata('imageerror',$imageError);
		                         $check++;
		                      // print_r($errors);return;
		                  }
              }

              
		  $this->form_validation->set_rules($valid);
		  if ($this->form_validation->run() == FALSE)
                {
             		$ins =$this->form_validation->error_array();
				       $this->session->set_flashdata('error1', $ins);
				       $this->session->set_flashdata('data',$data);
				        $check++;
                }
                if($check==0){
                	if($file_name==''){
                	$insert_data=array(
                	'name'=>$data['r6'],
                	'slug'=>$data['slug6'],
                	//'bannerAlt'=>$data['banner_alt6'],
                	'color'=>$data['color6'],

                	);
                }else{
                	$insert_data=array(
                	'name'=>$data['r6'],
                	'slug'=>$data['slug6'],
                	//'bannerAlt'=>$data['banner_alt6'],
                	'color'=>$data['color6'],
                	'bannerImage'=>$file_name,
                	);
                }
					$where = array('id' => 6);
					$this->Campgrounds->update_data('id','','region',$insert_data,$where);
					$this->session->set_flashdata('success1',"Region ".$data['r6']." updated succssfully");
					$this->session->set_flashdata('show-v',"6");
						redirect(base_url('admin/add-new-region'));
                }else{
                	$this->session->set_flashdata('show-v',"6");
                		redirect(base_url('admin/add-new-region'));
                }

		}else{
			redirect(base_url('admin/login'));
		}
	# code...
}


public function region7($value='')
{
	if(isset($this->adminId))
		{
				$data = $this->input->post();
				$check=0;

		  $valid = array(
        array(
                'field' => 'r7',
                'label' => 'Region Name',
                'rules' => 'required|max_length[70]'
        ),
         array(
                'field' => 'slug7',
                'label' => 'slug',
                'rules' => 'required|max_length[70]|alpha_dash'
        ),
        //  array(
        //         'field' => 'banner_alt7',
        //         'label' => 'Banner Alt',
        //         'rules' => 'required|max_length[200]'
        // ),
           array(
                'field' => 'color7',
                'label' => 'Color',
                'rules' => 'required|max_length[100]'
        ),
		);

		  		$file_name='';
                   $config['upload_path']          = './uploads/Banner';
                   $config['allowed_types']        = 'jpg|png|jpeg';
                   $config['encrpy_name']          = 100;
                   $this->load->library('upload', $config);
                   if ( strlen($_FILES['banner7']['name']) > 0){
		                if ($this->upload->do_upload('banner7'))
		                  {
		                       $file_data    =  $this->upload->data();
		                       $file_name  = $file_data['file_name'];

		                  }
		                  else
		                  {
		                     	 $imageError = $this->upload->display_errors();
		                         $this->session->set_flashdata('imageerror',$imageError);
		                         $check++;
		                      // print_r($errors);return;
		                  }
              }

              
		  $this->form_validation->set_rules($valid);
		  if ($this->form_validation->run() == FALSE)
                {
             		$ins =$this->form_validation->error_array();
				       $this->session->set_flashdata('error1', $ins);
				       $this->session->set_flashdata('data',$data);
				        $check++;
                }
                if($check==0){
                	if($file_name==''){
                	$insert_data=array(
                	'name'=>$data['r7'],
                	'slug'=>$data['slug7'],
                	//'bannerAlt'=>$data['banner_alt7'],
                	'color'=>$data['color7'],

                	);
                }else{
                	$insert_data=array(
                	'name'=>$data['r7'],
                	'slug'=>$data['slug7'],
                	//'bannerAlt'=>$data['banner_alt7'],
                	'color'=>$data['color7'],
                	'bannerImage'=>$file_name,
                	);
                }
					$where = array('id' => 7);
					$this->Campgrounds->update_data('id','','region',$insert_data,$where);
					$this->session->set_flashdata('success1',"Region ".$data['r7']." updated succssfully");
					$this->session->set_flashdata('show-v',"7");
						redirect(base_url('admin/add-new-region'));
                }else{
                	$this->session->set_flashdata('show-v',"7");
                		redirect(base_url('admin/add-new-region'));
                }

		}else{
			redirect(base_url('admin/login'));
		}
	# code...
}


public function region8($value='')
{
	if(isset($this->adminId))
		{
				$data = $this->input->post();
				$check=0;

		  $valid = array(
        array(
                'field' => 'r8',
                'label' => 'Region Name',
                'rules' => 'required|max_length[80]'
        ),
         array(
                'field' => 'slug8',
                'label' => 'slug',
                'rules' => 'required|max_length[80]|alpha_dash'
        ),
        //  array(
        //         'field' => 'banner_alt8',
        //         'label' => 'Banner Alt',
        //         'rules' => 'required|max_length[200]'
        // ),
           array(
                'field' => 'color8',
                'label' => 'Color',
                'rules' => 'required|max_length[100]'
        ),
		);

		  		$file_name='';
                   $config['upload_path']          = './uploads/Banner';
                   $config['allowed_types']        = 'jpg|png|jpeg';
                   $config['encrpy_name']          = 100;
                   $this->load->library('upload', $config);
                   if ( strlen($_FILES['banner8']['name']) > 0){
		                if ($this->upload->do_upload('banner8'))
		                  {
		                       $file_data    =  $this->upload->data();
		                       $file_name  = $file_data['file_name'];

		                  }
		                  else
		                  {
		                     	 $imageError = $this->upload->display_errors();
		                         $this->session->set_flashdata('imageerror',$imageError);
		                         $check++;
		                      // print_r($errors);return;
		                  }
              }

              
		  $this->form_validation->set_rules($valid);
		  if ($this->form_validation->run() == FALSE)
                {
             		$ins =$this->form_validation->error_array();
				       $this->session->set_flashdata('error1', $ins);
				       $this->session->set_flashdata('data',$data);
				        $check++;
                }
                if($check==0){
                	if($file_name==''){
                	$insert_data=array(
                	'name'=>$data['r8'],
                	'slug'=>$data['slug8'],
                	//'bannerAlt'=>$data['banner_alt8'],
                	'color'=>$data['color8'],

                	);
                }else{
                	$insert_data=array(
                	'name'=>$data['r8'],
                	'slug'=>$data['slug8'],
                	//'bannerAlt'=>$data['banner_alt8'],
                	'color'=>$data['color8'],
                	'bannerImage'=>$file_name,
                	);
                }
					$where = array('id' => 8);
					$this->Campgrounds->update_data('id','','region',$insert_data,$where);
					$this->session->set_flashdata('success1',"Region ".$data['r8']." updated succssfully");
					$this->session->set_flashdata('show-v',"8");
						redirect(base_url('admin/add-new-region'));
                }else{
                	$this->session->set_flashdata('show-v',"8");
                		redirect(base_url('admin/add-new-region'));
                }

		}else{
			redirect(base_url('admin/login'));
		}
	# code...
}


public function region9($value='')
{
	if(isset($this->adminId))
		{
				$data = $this->input->post();
				$check=0;

		  $valid = array(
        array(
                'field' => 'r9',
                'label' => 'Region Name',
                'rules' => 'required|max_length[90]'
        ),
         array(
                'field' => 'slug9',
                'label' => 'slug',
                'rules' => 'required|max_length[90]|alpha_dash'
        ),
        //  array(
        //         'field' => 'banner_alt9',
        //         'label' => 'Banner Alt',
        //         'rules' => 'required|max_length[200]'
        // ),
           array(
                'field' => 'color9',
                'label' => 'Color',
                'rules' => 'required|max_length[100]'
        ),
		);

		  		$file_name='';
                   $config['upload_path']          = './uploads/Banner';
                   $config['allowed_types']        = 'jpg|png|jpeg';
                   $config['encrpy_name']          = 100;
                   $this->load->library('upload', $config);
                   if ( strlen($_FILES['banner9']['name']) > 0){
		                if ($this->upload->do_upload('banner9'))
		                  {
		                       $file_data    =  $this->upload->data();
		                       $file_name  = $file_data['file_name'];

		                  }
		                  else
		                  {
		                     	 $imageError = $this->upload->display_errors();
		                         $this->session->set_flashdata('imageerror',$imageError);
		                         $check++;
		                      // print_r($errors);return;
		                  }
              }

              
		  $this->form_validation->set_rules($valid);
		  if ($this->form_validation->run() == FALSE)
                {
             		$ins =$this->form_validation->error_array();
				       $this->session->set_flashdata('error1', $ins);
				       $this->session->set_flashdata('data',$data);
				        $check++;
                }
                if($check==0){
                	if($file_name==''){
                	$insert_data=array(
                	'name'=>$data['r9'],
                	'slug'=>$data['slug9'],
                	//'bannerAlt'=>$data['banner_alt9'],
                	'color'=>$data['color9'],

                	);
                }else{
                	$insert_data=array(
                	'name'=>$data['r9'],
                	'slug'=>$data['slug9'],
                	//'bannerAlt'=>$data['banner_alt9'],
                	'color'=>$data['color9'],
                	'bannerImage'=>$file_name,
                	);
                }
					$where = array('id' => 9);
					$this->Campgrounds->update_data('id','','region',$insert_data,$where);
					$this->session->set_flashdata('success1',"Region ".$data['r9']." updated succssfully");
					$this->session->set_flashdata('show-v',"9");
						redirect(base_url('admin/add-new-region'));
                }else{
                	$this->session->set_flashdata('show-v',"9");
                		redirect(base_url('admin/add-new-region'));
                }

		}else{
			redirect(base_url('admin/login'));
		}
	# code...
}



public function  update_homepage_content()
{
	// print_r('in');return;
		if(isset($this->adminId))
		{
			$data = $this->input->post();
			//print_r($data);exit;
				// 	$config['upload_path'] = './uploads/informationalPages/';
    //            		 $config['allowed_types'] = 'jpg|png';
    //            		 $config['encrpy_name']  = 100;
    //            		 $config['file_name'] = date("Y_m_d H_i_s");
    //           		$this->load->library('upload', $config);
   	// 			if ( ! $this->upload->do_upload('banner'))
    //             { 
    //             	print_r( $this->upload->display_errors());return;
    //             }
    //             else
    //             {   $file_data	=  $this->upload->data();
				// 	$img  = $file_data['file_name'];
    //             }

                	$insert_data=array(
                	//'banner_text'=>$data['banner_text'],
					//'transition_time'=>$data['transition_time'],
					//'banner'=>$img,
					//'action_text'=>$data['action_text'],
					'description'=>$data['description'],
				);

                	$where = array('home_id' => $data['id']);
					$this->Campgrounds->update_data('home_id',$data['id'],'home_content',$insert_data,$where);


					// $insert_data=array(
     //            	'name'=>$data['r0']);
					// $where = array('id' => 1);
					// $this->Campgrounds->update_data('id','','region',$insert_data,$where);

					// $insert_data=array(
     //            	'name'=>$data['r1']);
					// $where = array('id' => 2);
					// $this->Campgrounds->update_data('id','','region',$insert_data,$where);

					// $insert_data=array(
     //            	'name'=>$data['r2']);
					// $where = array('id' => 3);
					// $this->Campgrounds->update_data('id','','region',$insert_data,$where);

					// $insert_data=array(
     //            	'name'=>$data['r3']);
					// $where = array('id' => 4);
					// $this->Campgrounds->update_data('id','','region',$insert_data,$where);

					// 	$insert_data=array(
     //            	'name'=>$data['r4']);
					// $where = array('id' => 5);
					// $this->Campgrounds->update_data('id','','region',$insert_data,$where);

					// 	$insert_data=array(
     //            	'name'=>$data['r5']);
					// $where = array('id' => 6);
					// $this->Campgrounds->update_data('id','','region',$insert_data,$where);

					// 	$insert_data=array(
     //            	'name'=>$data['r6']);
					// $where = array('id' => 7);
					// $this->Campgrounds->update_data('id','','region',$insert_data,$where);

					// 	$insert_data=array(
     //            	'name'=>$data['r7']);
					// $where = array('id' => 8);
					// $this->Campgrounds->update_data('id','','region',$insert_data,$where);

					// 	$insert_data=array(
     //            	'name'=>$data['r8']);
					// $where = array('id' => 9);
					// $this->Campgrounds->update_data('id','','region',$insert_data,$where);

					$this->session->set_flashdata('success', 'Homepage Content Updated Successfully');
					redirect($_SERVER['HTTP_REFERER']);

		}
		else
		{
			redirect(base_url('admin/login'));
		}
}


public function aboutus_content()
{
		if(isset($this->adminId))
		{
			$this->db->select('*');
	        $this->db->from('about_us_content');
	        $query=$this->db->get();
			$row = $query->row();
			$data['aboutus'] = $row;
			$data['title']='Add About Us Content';
			$data['yield']='admin/pages/informational_pages/aboutus-content.php';
			$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}

}


public function update_aboutus_content()
{
	if(isset($this->adminId))
		{
			$data = $this->input->post();

					 $config['upload_path'] = './uploads/informationalPages/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload', $config);
   				if ( ! $this->upload->do_upload('banner'))
                { 
                	$banner_img  = $data['old_banner'];
                }
                else
                {   $file_data	=  $this->upload->data();
					$banner_img = $file_data['file_name'];
                }

                 $config['upload_path'] = './uploads/informationalPages/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload', $config);
   				if ( ! $this->upload->do_upload('content_img'))
                { 
                	$content_img  = $data['old_connent_img'];
                }
                else
                {   $file_data	=  $this->upload->data();
					$connent_img = $file_data['file_name'];
                }


                $insert_data = array('color' => $data['color'],
                					 'banner' => $banner_img,
                					 'content_img' => $content_img,
                					 'content' =>  $data['description'] );
                $where  = array('id' => $data['id'] );
               $this->Campgrounds->update_data('id',$data['id'],'about_us_content',$insert_data,$where);

					$this->session->set_flashdata('success', ' About us content update successfully');
					redirect($_SERVER['HTTP_REFERER']);

		
		}
		else
		{
			redirect(base_url('admin/login'));
		}
}





public function region_images()
{
	$data = $this->input->post();

	$this->db->select('map_image
,bannerImage')->from('region')->where('id',$data['id']);

	 $query=$this->db->get();
	 $images=$query->result();    

	echo json_encode($images)  ;
}

public function del_banner_image()
{
	$data = $this->input->post();

	$sql = "UPDATE region SET bannerImage = null where id  = ".$data['id'];
	$this->db->query($sql);

	echo true;
}

    public function region_Seo()
    {
        if(isset($this->adminId))
        {
//            $where = array('seo_for' => 'Region');
//            $seo=$this->Campgrounds->find('region_seo',$where,'','','','','','');
//            $data['seo'] = $seo;
            $data['title']='Region SEO';
            $data['yield']='admin/pages/seoInformation/seo.php';
            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }
    public function updateSeoRegion()
    {
        if(isset($this->adminId))
        {

            $data = $this->input->post();
            $insert_data=array(
                'title'=>$data['title'],
                'tags'=>$data['keyword'],
                'description'=>$data['meta_description'],
            );
            // if(!empty($data['id'])){
            $where = array('seo_for' => $data['region']);
            $this->Campgrounds->update_data('id',1,'region_seo',$insert_data,$where);
            // }else{
            // $this->Campgrounds->insert('informationalhead',$insert_data);
            // }
            $this->session->set_flashdata('success', 'Region\'s Seo Updated successfully');
            // redirect($_SERVER['HTTP_REFERER']);
            redirect(base_url('admin/region-seo'));
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }

    public function homeSEO()
    {
        if(isset($this->adminId))
        {
            $where = array('seo_for' => 'Home');
            $seo=$this->Campgrounds->find('region_seo',$where,'','','','','','');
            $data['seo'] = $seo;
            $data['title']='Home SEO';
            $data['yield']='admin/pages/seoInformation/homeseo.php';
            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }
    public function updateHomeSeo()
    {
        if(isset($this->adminId))
        {

            $data = $this->input->post();
            $insert_data=array(
                'title'=>$data['title'],
                'tags'=>$data['keyword'],
                'description'=>$data['meta_description'],
            );
            // if(!empty($data['id'])){
            $where = array('seo_for' => 'Home');
            $this->Campgrounds->update_data('id',2,'region_seo',$insert_data,$where);
            // }else{
            // $this->Campgrounds->insert('informationalhead',$insert_data);
            // }
            $this->session->set_flashdata('success', 'Home\'s Seo Updated successfully');
            // redirect($_SERVER['HTTP_REFERER']);
            redirect(base_url('admin/home-seo'));
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }

    public function detailSeo($value='')
    {
        if(isset($this->adminId))
        {

            $data = $this->input->post();
            $where = array('seo_for' => $data['regionName']);
            $seo=$this->Campgrounds->find('region_seo',$where,'','','','','','');
            if(!empty($seo))
            {
                echo json_encode($seo);
            }else{
                echo '1';
            }
        }else{
            echo '1';
        }
    }



}

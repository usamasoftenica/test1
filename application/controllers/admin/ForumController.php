<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForumController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->layout = "admin/layout/main-layout";

		if (isset($this->session->userdata['admindata'])) {
			$this->adminId = $this->session->userdata['admindata']['adminId'];
		}
	}


	public function forumComments()
	{
		if(isset($this->adminId))
		{

			$data=$this->input->post();

			$data['title']='Forum Comment';
			$data['information']=$this->Campgrounds->getInformation();
			$data['subpages'] = $this->Campgrounds->find("blog",'','','',1,'','','','');
			$data['yield']='admin/pages/forum_pages/forum-all-comments.php';
			$this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}
    public function approvedforumComments()
    {
        if(isset($this->adminId))
        {

            $data=$this->input->post();

            $data['title']='Forum Comment';
            $data['information']=$this->Campgrounds->getInformation();
            $data['subpages'] = $this->Campgrounds->find("blog",'','','',1,'','','','');
            $data['yield']='admin/pages/forum_pages/approve-comments.php';
            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }
	public function delete_comment_reply_forum()
	{
		$data = $this->input->post();

		$this->db->delete('replys', array('id' => $data['id']));
		echo 'true';
	}


	public function forumsPending()
	{
		if(isset($this->adminId))
		{
			$data['title']='pending forums';
			$data['yield']='admin/pages/forum_pages/all-forums.php';

			$this->load->view($this->layout,$data);
				}
		else
		{
			redirect(base_url('admin/login'));
		}
	}



	public function forum_all_comments()
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

			$where.=" AND detect_forum=2";
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
			$where.=" AND detect_forum_reply=2";

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
	public function forum_all_comments1()
	{



		$start=$_REQUEST['start'];
		$end=$_REQUEST['length'];


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

			$where.=" AND detect_forum=2";
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
			$where.=" AND detect_forum_reply=2";

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



	//all pending forums
	public function forum_all_pendings()
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

			$where="forum_approval=0 ";
			if(!empty($_REQUEST['from'])){
				$old_date_timestamp = strtotime($_REQUEST['from']);
				$new_date = date('y-m-d', $old_date_timestamp);
//				// 'comments.created_at <='=>$new_dateto\

				$where.=" AND DATE(forums.created_at) >= '".$new_date."' ";
			}
			if(!empty($_REQUEST['to'])){
				$old_date_timestamp = strtotime($_REQUEST['to']);
				$new_date = date('y-m-d', $old_date_timestamp);
				$where.=" AND DATE(forums.created_at) <= '".$new_date."' ";
			}



			if(!empty($_REQUEST['description'])){
				//  CONCAT_WS(' ', city, state) LIKE '%".htmlspecialchars($request->state)."%' "
				$where.=" AND description like  '%".htmlspecialchars($_REQUEST['description'])."%' ";
			}
			if(!empty($_REQUEST['question'])){
				//  CONCAT_WS(' ', city, state) LIKE '%".htmlspecialchars($request->state)."%' "
				$where.=" AND question like  '%".htmlspecialchars($_REQUEST['question'])."%' ";
			}


			$select = "*";
			$ordeByCom= array(
				'0'=>['forums.forum_id ','desc'],
			);
			$infromations = $this->Campgrounds->find("forums",$where,$start,$end,1,$join='','',$select,$ordeByCom);

			$totaldata =$this->Campgrounds->findNumRowsPagenation2('forums',$where,'',$join='');
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
					'id'  =>   $info->forum_id,
					'Date' => $new_date,
					'Name' =>  $info->question,
					'Comment' => $info->description,
					'newComment' => $info->description,
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
	//end all pending forums


	//all approve forums
	public function forum_all_approve()
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

		$where="forum_approval=1 ";
		if(!empty($_REQUEST['from'])){
			$old_date_timestamp = strtotime($_REQUEST['from']);
			$new_date = date('y-m-d', $old_date_timestamp);
//				// 'comments.created_at <='=>$new_dateto\

			$where.=" AND DATE(forums.created_at) >= '".$new_date."' ";
		}
		if(!empty($_REQUEST['to'])){
			$old_date_timestamp = strtotime($_REQUEST['to']);
			$new_date = date('y-m-d', $old_date_timestamp);
			$where.=" AND DATE(forums.created_at) <= '".$new_date."' ";
		}



		if(!empty($_REQUEST['description'])){
			//  CONCAT_WS(' ', city, state) LIKE '%".htmlspecialchars($request->state)."%' "
			$where.=" AND description like  '%".htmlspecialchars($_REQUEST['description'])."%' ";
		}
		if(!empty($_REQUEST['question'])){
			//  CONCAT_WS(' ', city, state) LIKE '%".htmlspecialchars($request->state)."%' "
			$where.=" AND question like  '%".htmlspecialchars($_REQUEST['question'])."%' ";
		}


		$select = "*";
		$ordeByCom= array(
			'0'=>['forums.forum_id ','desc'],
		);
		$infromations = $this->Campgrounds->find("forums",$where,$start,$end,1,$join='','',$select,$ordeByCom);

		$totaldata =$this->Campgrounds->findNumRowsPagenation2('forums',$where,'',$join='');
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
				'id'  =>   $info->forum_id,
				'Date' => $new_date,
				'Name' =>  $info->question,
				'Comment' => $info->description,
				'newComment' => $info->description,
				'block' => $info->block,
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
	//end all approve forums



	public function editForum()
	{
		$data = array(
			'question' => $this->input->post('question'),
			'description' => $this->input->post('description'),
		);

		$this->Campgrounds->editForum($data,$this->input->post('id')) ;
	}


	public function delete_forum()
	{
		$this->Campgrounds->forum_delete($this->input->post('id')) ;
	}

	public function approveForum()
	{
		$data = array(
			'forum_approval' => "1",
		);
		$this->Campgrounds->uproveForum($data,$this->input->post('id')) ;

	}

	public function forumsApprove()
	{
		if(isset($this->adminId))
		{
		$data['title']='approve forums';
		$data['yield']='admin/pages/forum_pages/list-all-approve-forums.php';

		$this->load->view($this->layout,$data);
			}
		else
		{
			redirect(base_url('admin/login'));
		}
	}

	public function activeDeactive($id)
	{
		$this->Campgrounds->activeDeactive($id) ;

		redirect($_SERVER['HTTP_REFERER']);
	}


	public function forumSpecificComment($id)
	{
		//$data['blogs'] = $this->Campgrounds->getAllBlogs() ;
		$data['blog_comments'] = $this->Campgrounds->forumPostComment($id) ;

		$data['title']='comments of forum';
		$data['yield']='admin/pages/forum_pages/forum-comments.php';

		$this->load->view($this->layout,$data) ;
	}

}

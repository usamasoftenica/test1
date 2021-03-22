<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChildCampGroundController extends CI_Controller {

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

	public function add_childCampGround()
	{	
		if(isset($this->adminId))
		{ 
      $where = array('name!=' => '' );
        $ordeBy= array(
                    '0'=>['parentcampground.name','asc'],
                    );
      // $childcampgrounds=$this->Campgrounds->find('childcampground','',$start,$end,1,$join,$like,$select,$ordeBy);   

		 $data['regions'] = $this->Campgrounds->find("parentcampground",$where,'','',1,'','','',$ordeBy);
		 $data['title']='Add Child Campground';
		 $data['yield']='admin/pages/childCampGround/add-childCampGround.php';
		 $this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	
	}

	public function new_childCampGround()
	{
		if(isset($this->adminId))
		{
		  $data = $this->input->post();
		//   $config = array(
  //       array(
  //               'field' => 'name',
  //               'label' => 'Name',
  //               'rules' => 'required'
  //       ),
  //       //  array(
  //       //         'field' => 'region',
  //       //         'label' => 'Region',
  //       //         'rules' => 'required'
  //       // ),
  //        array(
  //               'field' => 'parent',
  //               'label' => 'Parent campground',
  //               'rules' => 'required'
  //       ),
  //        array(
  //               'field' => 'color',
  //               'label' => 'Color',
  //               'rules' => 'required'
  //       ),
  //          array(
  //               'field' => 'com_map',
  //               'label' => 'Campsite Map',
  //               'rules' => 'required'
  //       ),
  //          array(
  //               'field' => 'reviewed',
  //               'label' => 'Reviewed',
  //               'rules' => 'required'
  //       ),
  //          array(
  //               'field' => 'video_link',
  //               'label' => 'Video link',
  //               'rules' => 'required'
  //       ),
  //           array(
  //               'field' => 'title',
  //               'label' => 'Title',
  //               'rules' => 'required'
  //       ),
  //        array(
  //               'field' => 'keyword',
  //               'label' => 'Keyword',
  //               'rules' => 'required'
  //       ),
  //          array(
  //               'field' => 'meta_description',
  //               'label' => 'Description',
  //               'rules' => 'required'
  //       ),
  //           array(
  //               'field' => 'slug',
  //               'label' => 'Slug',
  //               'rules' => 'required'
  //       ),
  //            array(
  //               'field' => 'location',
  //               'label' => 'location',
  //               'rules' => 'required'
  //       ),
  //             array(
  //               'field' => 'compgroundamenities',
  //               'label' => 'compground amenities',
  //               'rules' => 'required'
  //       ),
  //              array(
  //               'field' => 'activity',
  //               'label' => 'activity',
  //               'rules' => 'required'
  //       ),
  //               array(
  //               'field' => 'reservation',
  //               'label' => 'reservation',
  //               'rules' => 'required'
  //       ),

  //                array(
  //               'field' => 'fee',
  //               'label' => 'fee',
  //               'rules' => 'required'
  //       ),
  //                 array(
  //               'field' => 'check_In',
  //               'label' => 'check_In',
  //               'rules' => 'required'
  //       ),
  //                  array(
  //               'field' => 'check_Out',
  //               'label' => 'check_Out',
  //               'rules' => 'required'
  //       ),
  //                   array(
  //               'field' => 'terrain',
  //               'label' => 'terrain',
  //               'rules' => 'required'
  //       ),
  //                    array(
  //               'field' => 'averagetemps',
  //               'label' => 'average temps',
  //               'rules' => 'required'
  //       ),
  //                     array(
  //               'field' => 'altitude',
  //               'label' => 'altitude',
  //               'rules' => 'required'
  //       ),
  //                      array(
  //               'field' => 'wildlife',
  //               'label' => 'wildlife',
  //               'rules' => 'required'
  //       ),

		// );
				// $this->form_validation->set_rules($config);
			 	// if ($this->form_validation->run() == FALSE)
     //            {

     //         		$this->add_childCampGround();
     //            }
                // else
                // {
                  $data = $this->input->post();

                 	 if (isset($data['publish'])) {
                        $live = '1';  
                        $draft='0'; 
                 	}
                 	else{
                 		$live = '0';
                    $draft='1'; 
                 	}

                   if (isset($data['publish'])) {
                 	$slug = $this->db->query("SELECT * FROM `childcampground` WHERE slug= '".$data['slug']."' && slug!='' ")->result_array();			
				if (!empty($slug))
				{
					$this->session->set_flashdata('error1','Please enter a unique slug');
          $this->session->set_flashdata('data',$data);
     					redirect($_SERVER['HTTP_REFERER']);					
				}
        if(empty($data['parent'])){
          $this->session->set_flashdata('error2','Parent Campground name is required');
          redirect($_SERVER['HTTP_REFERER']);   
        }
      }

            //      	 $config['upload_path'] = './uploads/ChildCampGround/';
            //    		 $config['allowed_types'] = 'jpg|png';
            //    		 $config['encrpy_name']  = 100;
            //    		 $config['file_name'] = date("Y_m_d H_i_s");
            //   		$this->load->library('upload', $config);
   				     // if ( ! $this->upload->do_upload('banner'))
            //     { 
            //     	// print_r( $this->upload->display_errors());return;
            //       $img='';
            //     }
            //     else
            //     {   $file_data	=  $this->upload->data();
				        //   	$img  = $file_data['file_name'];
            //     }
                	$insert_data=array('parentId'=>$data['parent'],
					'c_name'=>$data['name'],
					// 'c_color'=>$data['color'],
					// 'c_banner'=>$img,
					'c_map'=>$data['com_map'],
          'video_link'=>$data['com_vedio'],
					// 'c_fav'=>$favorite,
					'c_details'=>$data['description'],
					// 'c_reviewed'=>$data['reviewed'],
					// 'video_link'=>$data['video_link'],
					'c_live'=>$live,
				    // 'alt'=>$data['banner_alt'],
					'titile'=>$data['title'],
					'keyword'=>$data['keyword'],
					// 'alt'=>$data['banner_alt'],
					'meta_description'=>$data['meta_description'],
					'slug'=>$data['slug'],
           'draft'=>$draft,
        );

					$this->Campgrounds->insert('childcampground',$insert_data);
				    $this->session->set_flashdata('success1', 'Child campground added successfully');
			        redirect($_SERVER['HTTP_REFERER']);
                // }
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}

	public function get_parent()
	{
		if(isset($this->adminId))
		{
			$data = $this->input->post();
			$where = array('regionId' => $data['id'] );
			$parentcampground = $this->Campgrounds->find("parentcampground",$where,'','',1);
			echo json_encode($parentcampground);			
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}

	public function get_child()
	{
		if(isset($this->adminId))
		{
      // print_r('123');return;
			$data = $this->input->post();
			$where = array('parentId' => $data['id'] );
			$childcampground = $this->Campgrounds->find("childcampground",$where,'','',1);
			echo json_encode($childcampground);			
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}

	public function child_campground_list()
	{
		if(isset($this->adminId))
		{
		 $data['title']='Child Campgrounds List';
		 $data['yield']='admin/pages/childCampGround/child-campground-list.php';
		 $this->load->view($this->layout,$data);			
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}

    public function draft_child_campground_list()
  {
    if(isset($this->adminId))
    {
     $data['title']='Child Campgrounds List';
     $data['yield']='admin/pages/childCampGround/draft-child-campground-list.php';
     $this->load->view($this->layout,$data);      
    }
    else
    {
      redirect(base_url('admin/login'));
    }
  }

	public function child_pagenation()
	{
   	$join= array('0'=>['parentcampground','childcampground.parentId = parentcampground.p_id','left'],
				'1'=>['region','parentcampground.regionId = region.id','left']);
            $select = "childcampground.* , region.name as r_name , parentcampground.name as p_name";
             // $where = array('childcampground.draft' => 0 );
		 	$start=$_REQUEST['start'];
		$end=$_REQUEST['length'];
		// if(!empty($_REQUEST['search']['value'])){
		//     $like=array('childcampground.c_name' => $_REQUEST['search']['value']);
		// }else{
		//     $like='';
		// }
    $ma=0;
    if(!empty($_REQUEST['search']['value']))
    {
      // print_r('searcj');
      $like=array('childcampground.c_name' => $_REQUEST['search']['value']);
      $ma=1;
    }
    if(!empty($_REQUEST['extra_search'])){
      if($ma==1){
        // print_r('ma=1');
      $like=array('parentcampground.name' => $_REQUEST['extra_search'],'childcampground.c_name' => $_REQUEST['search']['value']);
    }else{
      $like=array('parentcampground.name' => $_REQUEST['extra_search']);
      // print_r('ma=0');
    }
    }
    if(empty($like))
    {
      $like='';
    }
               // $desc="desc";
    // $ordeBy= array('0'=>['region.id','desc'],
    //                 '1'=>['parentcampground.name','asc'],
    //                 '2'=>['childcampground.c_name','asc'],);
        $ordeBy= array('0'=>['childcampground.sort','asc']);
//            $where=array('0'=>['id != 81']);
        $where = array('childcampground.c_id != 81');
		$childcampgrounds=$this->Campgrounds->findpagenation('childcampground',$where,$start,$end,1,$join,$like,$select,$ordeBy);
		$totaldata =$this->Campgrounds->findNumRowsPagenation('childcampground',$where,$like,$join);
		$i=1;
		$i=$i*$start;
			$a = 1;
		$columns=array();
		foreach ($childcampgrounds as $childcampground) { 
                      if($childcampground->draft==0 && $childcampground->c_live==1 )
                      {
                        $val='Activated';
                      }else if($childcampground->draft==0 && $childcampground->c_live==0)
                      {
                        $val='Deactivated';
                      }
                      else{
                        $val='Draft';
                      }
		$columns[] = array(
			'id'  =>   $childcampground->c_id,
			'name' =>  $childcampground->c_name,              
		    'rname' => $childcampground->r_name,
		    'pname' =>  $childcampground->p_name,
		    'live' =>  $childcampground->c_live,
        'draft' =>  $val,
		    'no' => $a,
        'draft1' =>  $childcampground->draft,

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

    public function sort_child()
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
        foreach ($data as $orders) {
            // print_r($orders);exit;
            // if ($orders['id'] == $id) {
            // $products->update(['order' => $order['position']]);
            $update_data=array(

                'sort'=>$orders['position']+$start,
            );
            $where = array('c_id' => $orders['id'] );

            //  $categorie->order = $order['position'] + $start;
            $this->Campgrounds->update_data('c_id',$orders['id'],'childcampground',$update_data,$where);
            // }
            // }
        }
        return 200;
    }

public function undraft()
{
  $data = $this->input->post();
  $where = array('c_id' => $data['id']);
  $insert_data = array('draft'=>0);
  $this->Campgrounds->update_data('c_id',$data['id'],'childcampground',$insert_data,$where);
  echo 'true';
}
public function draft_child_pagenation()
  {
    $join= array('0'=>['parentcampground','childcampground.parentId = parentcampground.p_id','left'],
        '1'=>['region','parentcampground.regionId = region.id','left']);
            $select = "childcampground.* , region.name as r_name , parentcampground.name as p_name";
            $where = array('childcampground.draft' => 1 );
      $start=$_REQUEST['start'];
    $end=$_REQUEST['length'];
    if(!empty($_REQUEST['search']['value'])){
        $like=array('childcampground.c_name' => $_REQUEST['search']['value']);
    }else{
        $like='';
    }
    $childcampgrounds=$this->Campgrounds->find('childcampground',$where,$start,$end,1,$join,$like,$select);       
    $totaldata =$this->Campgrounds->findNumRows('childcampground',$where,$like);    
    $i=1;
    $i=$i*$start;
      $a = 1;
    $columns=array();
    foreach ($childcampgrounds as $childcampground) {                   
    $columns[] = array(
      'id'  =>   $childcampground->c_id,
      'name' =>  $childcampground->c_name,              
        'rname' => $childcampground->r_name,
        'pname' =>  $childcampground->p_name,
        'live' =>  $childcampground->c_live,
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
public function child_details($id)
{
	if (isset($this->adminId)) 
	{
	$join= array('0'=>['parentcampground','childcampground.parentId = parentcampground.p_id','left'],
				'1'=>['region','parentcampground.regionId = region.id','left']);
              $select = "childcampground.* , region.name as r_name , parentcampground.name as p_name ";
            $where = array('c_id =' => $id);
         

         $childcampground=$this->Campgrounds->find('childcampground',$where,'','','',$join,'',$select);
         $data['childcampground']= $childcampground;
	 	 $data['title']='Child Campground Detail';
		 $data['yield']='admin/pages/childCampGround/child-campground-detail.php';
		 	 $this->load->view($this->layout,$data);		
	}
	else
	{
		redirect(base_url('admin/login'));
	}
}


public function child_edit($id)
{
	if (isset($this->adminId)) 
	{
	$join= array('0'=>['parentcampground','childcampground.parentId = parentcampground.p_id','left'],
				'1'=>['region','parentcampground.regionId = region.id','left']);
              $select = "childcampground.* , region.name as r_name,region.id as r_id , parentcampground.name as p_name";
            $where = array('c_id =' => $id);
         $childcampground=$this->Campgrounds->find('childcampground',$where,'','','',$join,'',$select);
         $where1= array('name !=' => '');
         $data['regions'] = $this->Campgrounds->find("parentcampground",$where1,'','',1);
         $data['childcampground']= $childcampground;
	 	 $data['title']='Edit Child Campground';
		 $data['yield']='admin/pages/childCampGround/edit-childCampGround.php';
		 $this->load->view($this->layout,$data);		
	}
	else
	{
		redirect(base_url('admin/login'));
	}
}

public function update_childCampGround()
{
	if (isset($this->adminId)) 
	{
		 $data = $this->input->post();
		//   $config = array(
  //       array(
  //               'field' => 'name',
  //               'label' => 'Name',
  //               'rules' => 'required'
  //       ),
  //        array(
  //               'field' => 'region',
  //               'label' => 'Region',
  //               'rules' => 'required'
  //       ),
  //        array(
  //               'field' => 'parent',
  //               'label' => 'Parent campground',
  //               'rules' => 'required'
  //       ),
  //        array(
  //               'field' => 'color',
  //               'label' => 'Color',
  //               'rules' => 'required'
  //       ),
  //          array(
  //               'field' => 'com_map',
  //               'label' => 'Campsite Map',
  //               'rules' => 'required'
  //       ),
  //          array(
  //               'field' => 'reviewed',
  //               'label' => 'Reviewed',
  //               'rules' => 'required'
  //       ),
  //          array(
  //               'field' => 'video_link',
  //               'label' => 'Video link',
  //               'rules' => 'required'
  //       ),
  //           array(
  //               'field' => 'title',
  //               'label' => 'Title',
  //               'rules' => 'required'
  //       ),
  //        array(
  //               'field' => 'keyword',
  //               'label' => 'Keyword',
  //               'rules' => 'required'
  //       ),
  //          array(
  //               'field' => 'meta_description',
  //               'label' => 'Description',
  //               'rules' => 'required'
  //       ),
  //            array(
  //               'field' => 'location',
  //               'label' => 'location',
  //               'rules' => 'required'
  //       ),
  //             array(
  //               'field' => 'compgroundamenities',
  //               'label' => 'compground amenities',
  //               'rules' => 'required'
  //       ),
  //              array(
  //               'field' => 'activity',
  //               'label' => 'activity',
  //               'rules' => 'required'
  //       ),
  //               array(
  //               'field' => 'reservation',
  //               'label' => 'reservation',
  //               'rules' => 'required'
  //       ),

  //                array(
  //               'field' => 'fee',
  //               'label' => 'fee',
  //               'rules' => 'required'
  //       ),
  //                 array(
  //               'field' => 'check_In',
  //               'label' => 'check_In',
  //               'rules' => 'required'
  //       ),
  //                  array(
  //               'field' => 'check_Out',
  //               'label' => 'check_Out',
  //               'rules' => 'required'
  //       ),
  //                   array(
  //               'field' => 'terrain',
  //               'label' => 'terrain',
  //               'rules' => 'required'
  //       ),
  //                    array(
  //               'field' => 'averagetemps',
  //               'label' => 'average temps',
  //               'rules' => 'required'
  //       ),
  //                     array(
  //               'field' => 'altitude',
  //               'label' => 'altitude',
  //               'rules' => 'required'
  //       ),
  //                      array(
  //               'field' => 'wildlife',
  //               'label' => 'wildlife',
  //               'rules' => 'required'
  //       ),
		// );
		// 		$this->form_validation->set_rules($config);
			 	// if ($this->form_validation->run() == FALSE)
     //            {
     //         		redirect($_SERVER['HTTP_REFERER']);
     //            }
     //            else
     //            {
               $data = $this->input->post();
               // print_r($data['publish']);return;
                   if (!empty($data['publish']) &&  $data['publish']=='Activate') {
                        $live = '1';  
                        $draft='0'; 
                  }
                  else{
                    $live = '0';
                    $draft='1'; 
                  }
                  
                   if (!empty($data['publish']) &&  $data['publish']=='Activate') {
                 	    $slug = $this->db->query("SELECT * FROM `childcampground` WHERE c_id != '".$data['id']."' &&  slug= '".$data['slug']."' &&  slug!=''")->result_array();			
              				if (!empty($slug))
              				{
              					$this->session->set_flashdata('error1','Please enter a unique slug');
                        // $this->session->set_flashdata('data',$data);
                   					redirect($_SERVER['HTTP_REFERER']);					
              				}
                    }
          //  $config['upload_path'] = './uploads/ChildCampGround/';
          //          $config['allowed_types'] = 'jpg|png';
          //          $config['encrpy_name']  = 100;
          //          $config['file_name'] = date("Y_m_d H_i_s");
          //         $this->load->library('upload', $config);
          // if ( ! $this->upload->do_upload('banner'))
          //       { 
          //         $img  = $data['img'];
          //       }
          //       else
          //       {   $file_data  =  $this->upload->data();
          //       $img  = $file_data['file_name'];
          //       }
                // if (isset($data['favorite'])) {
                // 	$favorite = 1;
                // }
                // else
                // {
                // 	$favorite = 0;
                // }
          //     'c_name'=>$data['name'],
          // 'c_color'=>$data['color'],
          // 'c_banner'=>$img,
          // 'c_map'=>$data['com_map'],
          // // 'c_fav'=>$favorite,
          // 'c_details'=>$data['description'],
          // // 'c_reviewed'=>$data['reviewed'],
          // 'video_link'=>$data['video_link'],
          // 'c_live'=>$live,
          //   'alt'=>$data['banner_alt'],
          // 'titile'=>$data['title'],
          // 'keyword'=>$data['keyword'],
          // // 'alt'=>$data['banner_alt'],
          // 'meta_description'=>$data['meta_description'],
          // 'slug'=>$data['slug'],
          
          //  'draft'=>$draft,
                	$insert_data=array('parentId'=>$data['parent'],
					'c_name'=>$data['name'],
					// 'c_color'=>$data['color'],
					// 'c_banner'=>$img,
					'c_map'=>$data['com_map'],
          'video_link'=>$data['com_vedio'],
					// 'c_fav'=>$favorite,
					'c_details'=>$data['description'],
					// 'c_reviewed'=>$data['reviewed'],
					// 'video_link'=>$data['video_link'],
					'c_live'=>$live,
					// 'alt'=>$data['banner_alt'],
					'titile'=>$data['title'],
					'keyword'=>$data['keyword'],
					'meta_description'=>$data['meta_description'],
				'slug'=>$data['slug'],
          'draft'=> $draft,
        );

					$where = array('c_id' => $data['id']);
					$this->Campgrounds->update_data('c_id',$data['id'],'childcampground',$insert_data,$where);
					$this->session->set_flashdata('success1', 'Child campground updated successfully');
					redirect($_SERVER['HTTP_REFERER']);
                // }	
	}
	else
	{
		redirect(base_url('admin/login'));
	}
}

public function save_child()
{
	$data = $this->input->post();
	$where = array('c_id' => $data['id']);
	$insert_data = array('c_live'=>0);
	$this->Campgrounds->update_data('c_id',$data['id'],'childcampground',$insert_data,$where);
	echo 'true';
}

public function publish_child()
{
	$data = $this->input->post();
	$where = array('c_id' => $data['id']);
	$insert_data = array('c_live'=>1);
	$this->Campgrounds->update_data('c_id',$data['id'],'childcampground',$insert_data,$where);
	echo 'true';
}

public function delete_child()
{
		$data = $this->input->post();
		$this->db->delete('childcampground', array('c_id' => $data['id'])); 
		echo 'true';
}

public function excelfile()
{
  $this->load->library("excel");
  $object = new PHPExcel();
  $object->setActiveSheetIndex(0);
  $table_columns = array( "Region", "Parent Campground","Child Campground",);
  $column = 0;
 	$join= array('0'=>['parentcampground','childcampground.parentId = parentcampground.p_id','left'],
				'1'=>['region','parentcampground.regionId = region.id','left']);
              $select = "childcampground.c_name , region.name as r_name, parentcampground.name as p_name";
    $ordeBy= array('0'=>['region.id','desc'],
                    '1'=>['parentcampground.name','asc'],
                    '2'=>['childcampground.c_name','asc'],);
  $childcampgrounds=$this->Campgrounds->find('childcampground','','','',1,$join,'',$select,$ordeBy);  
  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }
  $excel_row = 2;



  foreach($childcampgrounds as $child)
  {
     $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $child->p_name);
      $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $child->c_name);
     $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $child->r_name);
  
  
  
  
   $excel_row++;
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Child CampGround Data.xls"');
  $object_writer->save('php://output');
}





}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParentCampGroundController extends CI_Controller {

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

	public function add_parentCampGround()
	{	
		if(isset($this->adminId))
		{
			  $ordeBy= array('0'=>['region.id','desc'],
                   );
		 $data['regions'] = $this->Campgrounds->find("region",'','','',1,'','','',$ordeBy);
		 $data['title']='Add Parent Campground';
		 $data['yield']='admin/pages/parentCampGround/add-parentCampGround.php';
		 $this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	
	}

	public function new_parentCampGround()
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
  //        array(
  //               'field' => 'region',
  //               'label' => 'Region',
  //               'rules' => 'required'
  //       ),
  //       //  array(
  //       //         'field' => 'color',
  //       //         'label' => 'Color',
  //       //         'rules' => 'required'
  //       // ),
  //          array(
  //               'field' => 'com_map',
  //               'label' => 'Campsite Map',
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
  //       )
		// );

				// $this->form_validation->set_rules($config);
			 	// if ($this->form_validation->run() == FALSE)
     //            {
     //         		$this->add_parentCampGround();
     //            }
     //            else
     //            {
                  if (isset($data['publish'])) {
                        $live = '1';
                        $draft=0;   
                 	}
                 	else{
                 		$live = '0';
                 		$draft=1;  
                 	}

   //               	if (isset($data['publish'])) {
   //               	$slug = $this->db->query("SELECT * FROM `parentcampground` WHERE slug= '".$data['slug']."'")->result_array();			
			// 	if (!empty($slug))
			// 	{
			// 		$this->session->set_flashdata('error1','Please enter a unique slug');
			// 		$this->session->set_flashdata('data',$data);
   //   					redirect($_SERVER['HTTP_REFERER']);					
			// 	}
			// }

				// }


     //             	$config['upload_path'] = './uploads/ParentCampGround/';
     //           		 $config['allowed_types'] = 'jpg|png';
     //           		 $config['encrpy_name']  = 100;
     //           		 $config['file_name'] = date("Y_m_d H_i_s");
     //          		$this->load->library('upload', $config);
   		// 		if ( ! $this->upload->do_upload('banner'))
     //            { 
     //            	// print_r( $this->upload->display_errors());return;
     //            	$img='';
     //            }
     //            else
     //            {   $file_data	=  $this->upload->data();
					// $img  = $file_data['file_name'];
     //            }

                 	$this->load->helper('text');
					$this->load->helper('url');
					$slug = url_title(convert_accented_characters($data['name']), 'dash', true);

                 	$insert_data=array('regionId'=>$data['region'],
					'name'=>$data['name'],
					'campSiteMap'=>$data['com_map'],
					'description'=>$data['description'],
					 'slug'=>$slug,
					'titile'=>$data['title'],
					'keyword'=>$data['keyword'],
					'meta_description'=>$data['meta_description'],
					'youtube_link'=>$data['youtube_link'],
					'live'=>$live,
                     'draft'=>$draft,
                     // 'alt'=>$data['banner_alt'],
                     // 'color'=>$data['color'],
					// 'bannerImage'=>$img,

     //                 'location'=>$data['location'],
					// 'compgroundamenities'=>$data['compgroundamenities'],
				 //    'activity'=>$data['activity'],
					// 'reservation'=>$data['reservation'],
					// 'fee'=>$data['fee'],
					//  'check_In'=>$data['check_In'],
					// 'check_Out'=>$data['check_Out'],
					// 'terrain'=>$data['terrain'],
					// 'averagetemps'=>$data['averagetemps'],
					// 'wildlife'=>$data['wildlife'],
				 //    'altitude'=>$data['altitude'],
					//  'Localamenities'=>$data['Localamenities'],
					// 'regulation'=>$data['regulation'],
					// 'parkamenies'=>$data['parkamenies'],
					// 'parkactivities'=>$data['parkactivities'],
				);

						$this->Campgrounds->insert('parentcampground',$insert_data);
				 $this->session->set_flashdata('success1', 'Parent campground added successfully');
				redirect($_SERVER['HTTP_REFERER']);
					
                
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}



	public function parent_campground_list()
	{
		if(isset($this->adminId))
		{
		 $data['title']='Parent Campground List';
		 $data['yield']='admin/pages/parentCampGround/parentCampGroundList.php';
		 $this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}

//usman afzal woking
public function draft_parent_campground_list()
	{
		if(isset($this->adminId))
		{
		 $data['title']='Draft Parent Campground List';
		 $data['yield']='admin/pages/parentCampGround/draft-parentCampGroundList.php';
		 $this->load->view($this->layout,$data);
		}
		else
		{
			redirect(base_url('admin/login'));
		}
	}



	public function parent_pagenation()
{

   $join= array('0'=>['region','parentcampground.regionId=region.id','left']);

            $select = "parentcampground.* , region.name as r_name";
              // $where = array('parentcampground.draft' => 0 );
		 	$start=$_REQUEST['start'];
		$end=$_REQUEST['length'];
$ma=0;
	if(!empty($_REQUEST['search']['value']))
		{
			// print_r('searcj');
			$like1=array('parentcampground.name' => $_REQUEST['search']['value']);
			$ma=1;
		}
		if(!empty($_REQUEST['extra_search'])){
			if($ma==1){
				// print_r('ma=1');
			$like1=array('region.name' => $_REQUEST['extra_search'],'parentcampground.name' => $_REQUEST['search']['value']);
		}else{
			$like1=array('region.name' => $_REQUEST['extra_search']);
			// print_r('ma=0');
		}
		}
		if(empty($like1))
		{
			$like1='';
		}
		// print_r($like1);return;
		// $where = array('0'=>['parentcampground.regionId !=' =>0]);
		// if(!empty($post['search']['value']))
		// {
		// 	$where['1']=['parentcampground.name'=>$_REQUEST['search']['value']];
		// }
		// if(!empty($_REQUEST['extra_search'])){
		// 	$where['2']=['region.name' => $_REQUEST['extra_search']];
		// }
			
	
		
		// if(!empty($_REQUEST['search']['value'])){
		// 			if(!empty($_REQUEST['extra_search'])){
		// 		    $like1=array('region.name' => $_REQUEST['extra_search'],'parentcampground.name' => $_REQUEST['search']['value']);
		// 		}else{
		// 		   $like1=array();
		// 		}
				    
		// }else{
		//     $like1='';
		// }
		
			$desc="desc";
		    $ordeBy= array('0'=>['parentcampground.p_id','desc']);
		$totaldata =$this->Campgrounds->findNumRowsPagenation('parentcampground','',$like1,$join);   

		$parentcampgrounds=$this->Campgrounds->findpagenation('parentcampground','',$start,$end,1,$join,$like1,$select,$ordeBy);       

		
		$i=1;
		if($start==0){
			$start=1;
		}
		$i=$i*$start;

			$a = 1;
		$columns=array();
		foreach ($parentcampgrounds as $parentcampground) {  
		 if($parentcampground->draft==0 && $parentcampground->live==1 )
                      {
                        $val='Activated';
                      }else if($parentcampground->draft==0 && $parentcampground->live==0)
                      {
                        $val='Deactivated';
                      }
                      else{
                        $val='Draft';
                      }                 
		$columns[] = array(
			'id'  =>   $parentcampground->p_id,              
		    'rname' => $parentcampground->r_name,
		    'name' =>  $parentcampground->name,
		     'draft1' =>  $parentcampground->draft,
		       'draft' =>  $val,
		    'live' =>  $parentcampground->live,
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
		);      
		echo json_encode($json_data);

}

// usman afzal working
		public function draft_parent_pagenation()
{

   $join= array('0'=>['region','parentcampground.regionId=region.id','left']);

            $select = "parentcampground.* , region.name as r_name";
          $where = array('parentcampground.draft' => 1 );
		 	$start=$_REQUEST['start'];
		$end=$_REQUEST['length'];
		if(!empty($_REQUEST['search']['value'])){
		    $like=array('parentcampground.name' => $_REQUEST['search']['value']);
		}else{
		    $like='';
		}
		$parentcampgrounds=$this->Campgrounds->find('parentcampground',$where,$start,$end,1,$join,$like,$select);       
		$totaldata =$this->Campgrounds->findNumRows('parentcampground',$where,$like);    
		$i=1;
		$i=$i*$start;
			$a = 1;
		$columns=array();
		foreach ($parentcampgrounds as $parentcampground) {                   
		$columns[] = array(
			'id'  =>   $parentcampground->p_id,              
		    'rname' => $parentcampground->r_name,
		    'name' =>  $parentcampground->name,
		    'live' =>  $parentcampground->live,
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
 // usman afzal working 



public function parent_details($id)
{
	if(isset($this->adminId))
	{
		$join= array('0'=>['region','parentcampground.regionId=region.id','left']);
            $select = "parentcampground.* , region.name as r_name";
            $where = array('p_id =' => $id);
         $parentcampground=$this->Campgrounds->find('parentcampground',$where,'','','',$join,'',$select);
         $data['parentcampground']= $parentcampground;
	 	 $data['title']='Parent Campground Detail';
		 $data['yield']='admin/pages/parentCampGround/parent-campground-detail.php';
		 $this->load->view($this->layout,$data);
	}
	else
	{
		redirect(base_url('admin/login'));
	}
}

public function parent_edit($id)
{
	if(isset($this->adminId))
	{
		 $ordeBy= array('0'=>['region.id','desc'],
                   );
		 $data['regions'] = $this->Campgrounds->find("region",'','','',1,'','','',$ordeBy);
	     $where = array('p_id =' => $id);
         $parentcampground=$this->Campgrounds->find('parentcampground',$where,'','','','','','');
         if($parentcampground){
         $data['parentcampground']= $parentcampground;
	 	 $data['title']='Parent Campground Edit';
		 $data['yield']='admin/pages/parentCampGround/edit-parentCampGround.php';
		 $this->load->view($this->layout,$data);
		}else{
			redirect(base_url('admin/parent-campground-list'));
		}
	}
	else
	{
		redirect(base_url('admin/login'));
	}
}


public function update_parentCampGround()
{
	if(isset($this->adminId))
	{

		$data = $this->input->post();

		//  $config = array(
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
  //       //  array(
  //       //         'field' => 'color',
  //       //         'label' => 'Color',
  //       //         'rules' => 'required'
  //       // ),
  //          array(
  //               'field' => 'com_map',
  //               'label' => 'Campsite Map',
  //               'rules' => 'required'
  //       ),
  //            array(
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
		// );

		 // $this->form_validation->set_rules($config);
			 	// if ($this->form_validation->run() == FALSE)
     //            {

     //         		redirect($_SERVER['HTTP_REFERER']);
     //            }
     //            else
     //            {

  // if (isset($data['publish'])) {
  //              $slug = $this->db->query("SELECT * FROM `parentcampground` WHERE p_id != '".$data['id']."' &&  slug= '".$data['slug']."'")->result_array();			
		// 			if (!empty($slug))
		// 			{
		// 				$this->session->set_flashdata('error1','Please enter a unique slug');
	 //     					redirect($_SERVER['HTTP_REFERER']);					
		// 			}
		// 		}

                  if (isset($data['publish'])) {
                        $live = '1'; 
                         $draft='0';   
                 	}
                 	else{
                 		$live = '0';
                 		 $draft='1'; 
                 	}

					// $config['upload_path'] = './uploads/ParentCampGround/';
     //           		 $config['allowed_types'] = 'jpg|png';
     //           		 $config['encrpy_name']  = 100;
     //           		 $config['file_name'] = date("Y_m_d H_i_s");
     //          		$this->load->library('upload', $config);
   		// 		if ( ! $this->upload->do_upload('bannerE'))
     //            { 
     //            	$img  = $data['img'];
     //            }
     //            else
     //            {   $file_data	=  $this->upload->data();
					// $img  = $file_data['file_name'];
     //            }
				

                 	// $slug = str_replace(' ', '', $data['name']);
                 	// $slug = str_replace('.', '', $slug);

                 	$this->load->helper('text');
					$this->load->helper('url');
					$slug = url_title(convert_accented_characters($data['name']), 'dash', true);



                 	$insert_data=array('regionId'=>$data['region'],
					'name'=>$data['name'],
					// 'color'=>$data['color'],
					// 'bannerImage'=>$img,
					'campSiteMap'=>$data['com_map'],
					'description'=>$data['description'],
					'live'=>$live,
					// 'alt'=>$data['banner_alt'],
					'slug'=>$slug,
					'titile'=>$data['title'],
					'keyword'=>$data['keyword'],
					'youtube_link'=>$data['youtube_link'],
					'meta_description'=>$data['meta_description'],
					'draft'=>$draft,
				);

					$where = array('p_id' => $data['id']);
					$this->Campgrounds->update_data('p_id',$data['id'],'parentcampground',$insert_data,$where);
					$this->session->set_flashdata('success1', 'Parent campground updated successfully');
					redirect($_SERVER['HTTP_REFERER']);
					
                // }
	}
	else
	{
		redirect(base_url('admin/login'));
	}
}


public function save_parent()
{
	$data = $this->input->post();
	$where = array('p_id' => $data['id']);
	$insert_data = array('live'=>0);
	$this->Campgrounds->update_data('p_id',$data['id'],'parentcampground',$insert_data,$where);
	echo 'true';
}
public function undraft()
{
	$data = $this->input->post();
	$where = array('p_id' => $data['id']);
	$insert_data = array('draft'=> 0);
	$this->Campgrounds->update_data('p_id',$data['id'],'parentcampground',$insert_data,$where);
	echo 'true';
}


public function publish_parent()
{
	$data = $this->input->post();
	$where = array('p_id' => $data['id']);
	$insert_data = array('live'=>1);
	$this->Campgrounds->update_data('p_id',$data['id'],'parentcampground',$insert_data,$where);
	echo 'true';
}

public function delete_parent()
{
	$data = $this->input->post();
	$where = array('parentId' => $data['id'] );
	$child=$this->Campgrounds->find('childcampground',$where);
	if(!empty($child))
	{
		echo "0";
	}
	else{
		$this->db->delete('parentcampground', array('p_id' => $data['id'])); 
		echo '1';	
	}


}



public function excelfile()
{
  $this->load->library("excel");
  $object = new PHPExcel();
  $object->setActiveSheetIndex(0);
  $table_columns = array("Region", "Parent Campground");
  $column = 0;
  $join= array('0'=>['region','parentcampground.regionId=region.id','left']);
            $select = "parentcampground.* , region.name as r_name";
            $desc="desc";
		    $ordeBy= array('0'=>['region.id','desc'],'1'=>['parentcampground.name','asc']);
  $parentcampgrounds=$this->Campgrounds->find('parentcampground','','','',1,$join,'',$select,$ordeBy);  
  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }
  $excel_row = 2;
  foreach($parentcampgrounds as $parent)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $parent->r_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $parent->name);
   $excel_row++;
  }
  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Parent CampGround Data.xls"');
  $object_writer->save('php://output');
}



}

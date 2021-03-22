<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

	require_once('vendor/mailchimp/transactional/lib/Configuration.php');
	require_once('vendor/mailchimp/marketing/lib/Configuration.php');
	require 'vendor/autoload.php';

class UserController extends CI_Controller {

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
		$this->layout="home/layout/layout";
		  $this->load->library('paypal_lib');
		    if(isset($this->session->userdata['userdata']))
		{
			//print_r($this->session->userdata['userdata']);exit;
			// $this->email = $this->session->userdata['userdata']['email'];
			if(!empty($this->session->userdata['userdata']['id'])){
			$this->userId = $this->session->userdata['userdata']['id'];
	}
		}

		// if(isset($this->session->userdata['userdata'])  && $this->session->userdata['userdata']['days'] <0){
	 // 		$this->layout="home/layout/subscription_expire_layout";
	 // 	}

		
	}


	public function index()
	{
		$where = array('s_payment' => 1 );
		$data['amount']=$this->Campgrounds->find('setpayment',$where);
		$data['title']='Subscribe';
		$data['yield']='home/login/subscribe';
		$this->load->view($this->layout,$data);
		
	}


	public function freeTrial()
	{
		# code...
		$where = array('s_payment' => 1 );
		$data['amount']=$this->Campgrounds->find('setpayment',$where);
		$data['title']='Free Trial';
		$data['yield']='home/login/free_trial';
		$this->load->view($this->layout,$data);

	}

	// to edit his personal information
		public function editProfile()
	{   

		// die(var_dump($this->session->userdata['days']));

		if(isset($this->userId)){
			$where = array('id =' => $this->userId);
        $data['user']=$this->Campgrounds->find('subscribe',$where);
		$data['title']='Profile';
		$data['yield']='home/login/profile';
		$this->load->view($this->layout,$data);
	}else{
		redirect(base_url());
	}
		
	}

	public function myPayments()
	{   

			// $this->Campgrounds->checkSubscriptionExp();
			if(isset($this->userId)){
				// $where = array('id =' => $this->userId);
	   //      $data['user']=$this->Campgrounds->find('subscribe',$where);
			$data['title']='My-payment';
			$data['yield']='home/login/my-payment.php';
			$this->load->view($this->layout,$data);
		}else{
			redirect(base_url());
		}
		
	}
	public function region($slug){

		if(isset($this->userId)){

            $_SESSION['region'] = $slug;

			$select = "*,region.id as rId,region.name as rname, region.slug as rslug";
					$join= array('0'=>['parentcampground','region.id = parentcampground.regionId','inner']);
			$where = array('region.slug' => $slug );
			$where1 = array('region.slug' => $slug,
								'parentcampground.live'=>1 );
			$ordeByCom= array(
                    '0'=>['parentcampground.name','DESC'],
                    );
			$data['region'] = $this->Campgrounds->find("region",$where1,'','',1,$join,'',$select,$ordeByCom);
			
			$data['regionss'] = $this->Campgrounds->find("region",$where,'','',1,'','','','');
			if(!empty($data['regionss'])){
//			echo "<pre>";print_r($data['region']);exit;

                $where = array('seo_for' => $slug);
                $seo=$this->Campgrounds->find('region_seo',$where,'','','','','','');
//                print_r($seo);return;
                $data['title']=$seo->title;
                $data['metadescription']=$seo->description;
                $data['metakeywords']=$seo->tags;

			$data['title']='Parent Campground';
		
			$data['yield']='home/login/region.php';
			
			$this->load->view($this->layout,$data);
		}else{
			redirect(base_url().'404');
		}

		}else{
			redirect(base_url('/login'));
		}
	}
	public function parentregion($slug){

		if(isset($this->userId)){
			$select = "*,region.id as rId,region.name as rname, region.slug as rslug";
					$join= array('0'=>['parentcampground','region.id = parentcampground.regionId','inner']);
			$where = array('region.slug' => $slug );
			$where1 = array('region.slug' => $slug,
								'parentcampground.live'=>1 );
			$ordeByCom= array(
                    '0'=>['parentcampground.p_id','desc'],
                    );
			$data['region'] = $this->Campgrounds->find("region",$where1,'','',1,$join,'',$select,$ordeByCom);
			$data['regionss'] = $this->Campgrounds->find("region",$where,'','',1,'','','','');
//			echo "<pre>";print_r($data['region']);exit;
			$data['title']='Parent Campground';

			$data['yield']='home/login/region_parent.php';

			$this->load->view($this->layout,$data);

		}else{
			redirect(base_url('/login'));
		}
	}
public function parent_campground($slug){

		if(isset($this->userId)){

			$select = "*,region.id as rId,region.name as rname, region.slug as rslug";
			$join= array('0'=>['parentcampground','region.id = parentcampground.regionId','inner']);
			//$where = array('parentcampground.slug' => $slug );
			$where = array('parentcampground.slug' => $slug );
			$ordeByCom= array(
                    '0'=>['parentcampground.p_id','desc'],
                    );
			$data['parents'] = $this->Campgrounds->find("region",$where,'','',1,$join,'',$select,$ordeByCom);
			if(!empty($data['parents']) && isset($data['parents'])){
			//echo "<pre>";print_r($data['parents']);exit;

			$where = array('parentcampground.regionId' => $data['parents'][0]->rId );
			$data['region'] = $this->Campgrounds->find("region",$where,'','',1,$join,'',$select,$ordeByCom);
			//echo "<pre>"; print_r($data['region']);exit;

			$data['title']='Parent Campground';
			$data['slug']=$slug;
			$data['yield']='home/login/parent-campground.php';
			$this->load->view($this->layout,$data);
		}else{
			redirect(base_url().'404');
		}

		}else{
			redirect(base_url());
		}
	}
	public function child_campground($slug){
		$n_Slug=$slug;
        $slug = strtok($slug, '-');
     
		$this->db->select('parentId')->from('childcampground')
		 	->where('slug',$slug) ;

		 $query = $this->db->get();        
		 $p_id = $query->result();




        $ordeBy1= array(
            '0'=>['parameter_view.order_by','asc'],
        );
        $data['views'] = $this->Campgrounds->find("parameter_view",'','','',1,'','','',$ordeBy1);

        $ordeBy1= array(
            '0'=>['parameter_grade.order_by','asc'],
        );
        $data['grades'] = $this->Campgrounds->find("parameter_grade",'','','',1,'','','',$ordeBy1);

        $ordeBy1= array(
            '0'=>['parameter_acess.order_by','asc'],
        );
        $data['access'] = $this->Campgrounds->find("parameter_acess",'','','',1,'','','',$ordeBy1);

        $ordeBy1= array(
            '0'=>['parameter_base.order_by','asc'],
        );
        $data['bases'] = $this->Campgrounds->find("parameter_base",'','','',1,'','','',$ordeBy1);

        $water =  $this->db->query("Select * from parameter_water where water_name !='No' || water_name !='no' order by order_by asc" );
//            print_r($water);
        $data['waters'] = $water->result();
        $sewer =  $this->db->query("Select * from parameter_sewer where sewer_name !='No' || sewer_name !='no' order by order_by asc" );
        //            print_r($water);
        $data['sewers'] = $sewer->result();

        $ordeBy11= array(
            '0'=>['parameter_shade.order_by','asc'],
        );
        $data['parameter_shades'] = $this->Campgrounds->find("parameter_shade",'','','',1,'','','',$ordeBy11);

        $ordeBy14= array(
            '0'=>['parameter_table.order_by','asc'],
        );

        $data['parameter_tables'] = $this->Campgrounds->find("parameter_table",'','','',1,'','','',$ordeBy14);

        $ordeBy2= array(
            '0'=>['parameter_camping.order_by','asc'],
        );
        $data['campings'] = $this->Campgrounds->find("parameter_camping",'','','',1,'','','',$ordeBy2);

//        $ordeBy7= array(
//            '0'=>['parameter_amp.order_by','asc'],
//        );
//        $data['parameter_amps'] = $this->Campgrounds->find("parameter_amp",'','','',1,'','','',$ordeBy7);




        if(!empty($p_id)){
		if(isset($this->userId)){
			 if( $p_id[0]->parentId == ""  ) {
			 	// fetching the region 
			 	$pI=explode('-', $n_Slug);
			 	if(isset($pI[1])){
				 $this->db->select("regionId");
                 $this->db->from("parentcampground");
                 $this->db->where('p_id',$pI[1]);

                 $query = $this->db->get();
                 $parentPId = $query->row();
                 if(empty($parentPId))
                 {
                 	if(isset($_SESSION['region']))
                 	{
                 		$pSlug=$_SESSION['region'];
                 	}else{
                 		redirect(base_url());
                 	}
                 	
                 }else{
                 // print_r($parentPId);return;

               $this->db->select("slug");
                 $this->db->from("region");
                 $this->db->where('id',$parentPId->regionId);
                 $query = $this->db->get();
                 $rSlug = $query->row();

                 $pSlug=$rSlug->slug;
             }
             }else{
             	$pSlug=$_SESSION['region'];
             }
			 	// 
                 $noChild = true ;
                	 $this->db->select("id");
                 $this->db->from("region");
                 $this->db->where('slug',$pSlug);
                 $query = $this->db->get();
                 $region_id = $query->result();

                 $selects = "*, childcampground.slug as cslug,childcampground.video_link as c_v_link,childcampground.c_map as c_map";
             $wheres = array('childcampground.slug' => $slug ,'childcampground.c_live'=>1);
             $ordeByComs= array(
                               '0'=>['childcampground.c_id','desc'],
                               );
                                
			$data['childs']= $this->Campgrounds->find("childcampground",$wheres,'','',1,'','',$selects,$ordeByComs);
			if(!empty($data['childs'])){
                 $where = array('parentcampground.regionId' => $region_id[0]->id);
                 $select = "*,region.id as rId,region.name as rname, region.slug as rslug";
                 $join= array('0'=>['parentcampground','region.id = parentcampground.regionId','inner']);
                 //$where = array('parentcampground.slug' => $slug );

                 $ordeByCom= array('0'=>['parentcampground.name','DESC'],
                 );
                 $data['region'] = $this->Campgrounds->find("region",$where,'','',1,$join,'',$select,$ordeByCom);
                 $data['title']='No Child Campground';
                 $data['noChild'] = $noChild ;
                 $data['site_auto'] = "true" ;
		 	$data['yield']='home/login/child-campground.php';
			$this->load->view($this->layout,$data);
		}else{
			redirect(base_url().'404');
		}
		 }else{

                 $noChild = false ;
		 		 $selects = "*, childcampground.slug as cslug,childcampground.video_link as c_v_link,childcampground.c_map as c_map";
             $joins= array('0'=>['parentcampground','childcampground.parentId = parentcampground.p_id','inner']);
             $wheres = array('childcampground.slug' => $slug ,'childcampground.c_live'=>1 );
             $ordeByComs= array(
                               '0'=>['childcampground.c_id','desc'],
                               );
                                
		
			// $ordeByCom= array(
   //                  '0'=>['parentcampground.p_id','desc'],
   //                  );
			$data['childs']= $this->Campgrounds->find("childcampground",$wheres,'','',1,$joins,'',$selects,$ordeByComs);

			if(!empty($data['childs'])){
			
			// echo "<pre>";print_r($data['child']);exit;  
			$where = array('parentcampground.regionId' => $data['childs'][0]->regionId ,);
				$select = "*,region.id as rId,region.name as rname, region.slug as rslug";
					$join= array('0'=>['parentcampground','region.id = parentcampground.regionId','inner']);
			//$where = array('parentcampground.slug' => $slug );

					$ordeByCom= array('0'=>['parentcampground.name','DESC'],
                   );
			//print_r($where);exit;
			$data['region'] = $this->Campgrounds->find("region",$where,'','',1,$join,'',$select,$ordeByCom);
//			echo "<pre>";print_r($data['region']);exit;
		   
			$data['title']='Child Campground';
			$data['noChild'] = $noChild ;
			$data['yield']='home/login/child-campground.php';

			$data['site_auto'] = "false" ;
			$this->load->view($this->layout,$data);
		}else{
			redirect(base_url().'404');
		}

		 }


		}

			
		else if($p_id[0]->parentId == 39)
		{
			// print_r(expression)
			// print_r('ishaque');return;

				 $selects = "*, childcampground.slug as cslug,childcampground.video_link as c_v_link,childcampground.c_map as c_map";
             $joins= array('0'=>['parentcampground','childcampground.parentId = parentcampground.p_id','inner']);
             $wheres = array('childcampground.slug' => $slug );
             $ordeByComs= array(
                               '0'=>['childcampground.c_id','desc'],
                               );
                                
			$select = "*,region.id as rId,region.name as rname, region.slug as rslug";
					$join= array('0'=>['parentcampground','region.id = parentcampground.regionId','inner']);
			//$where = array('parentcampground.slug' => $slug );
			$ordeByCom= array(
                    '0'=>['parentcampground.p_id','desc'],
                    );
			$data['childs']= $this->Campgrounds->find("childcampground",$wheres,'','',1,$joins,'',$selects,$ordeByComs);

			
			// echo "<pre>";print_r($data['child']);exit;  
			$where = array('parentcampground.regionId' => $data['childs'][0]->regionId , 'parentcampground.p_id'=>39);
			//print_r($where);exit;
			$data['region'] = $this->Campgrounds->find("region",$where,'','',1,$join,'',$select,$ordeByCom);
			//echo "<pre>";print_r($data['region']);exit;
		   
			$data['title']='Child Campground';
			$data['site_auto'] = "false" ;
			$data['yield']='home/login/child-campground.php';
			$this->load->view($this->layout,$data);
		}


		else{
			redirect(base_url());
		}
	}else{
		redirect(base_url().'404');
	}
	}

	
	public function site_descriptions(){

		// if(isset($this->userId)){

			$data=$this->input->post();

			//print_r($data);exit;
			//$idc=explode(',', $data['childID']);
			//print_r($idc);exit;
			if($data['current']==1)
		    {
		      $start=0;
		    }else{
		      $start=($data['current']-1)*$data['length'];
		    }
            $selects = "*, childcampground.slug as cslug,parentcampground.slug as pslug";

			if( ($data['childID'] == " ") )
			{
				$joins= array(
					'0'=>['parameter_spacing','sitedescription.spacing = parameter_spacing.sp_id','left'],
					'1'=>['parameter_trailer','sitedescription.lengthTrailer = parameter_trailer.trailer_id','left'],
					'2'=>['parameter_grade','sitedescription.grade = parameter_grade.grade_id','left'],
					'3'=>['parameter_base','sitedescription.base = parameter_base.base_id','left'],
					'4'=>['parameter_water','sitedescription.water = parameter_water.water_id','left'],
					'5'=>['parameter_sewer','sitedescription.sewer = parameter_sewer.sewer_id','left'],
					'6'=>['parameter_verizon','sitedescription.verizon = parameter_verizon.verizon_id','left'],
					'7'=>['parameter_shade','sitedescription.shadeType = parameter_shade.shade_id','left'],
					'8'=>['parameter_view','sitedescription.viewType = parameter_view.view_id','left'],
					// '9'=>['parameter_camping','sitedescription.campType = parameter_camping.camping_id','left'],
					'9'=>['parameter_acess','sitedescription.acess = parameter_acess.acess_id','left'],
					'10'=>['parameter_amp','sitedescription.amps = parameter_amp.amp_id','left'],
					'11'=>['sitedescription_pics','sitedescription.siteId = sitedescription_pics.sitedescription_id','left'],
					'12'=>['parameter_wifi','sitedescription.wifi = parameter_wifi.wifi_id','left'],
					'13'=>['parameter_cable','sitedescription.cableTv = parameter_cable.cable_id','left'],
					'14'=>['parentcampground','sitedescription.p_id = parentcampground.p_id','inner']);
					//'15'=>['childcampground','sitedescription.childId = childcampground.c_id','inner']);

				$ordeByComs= array('0'=>['parentcampground.name','asc'],
                          '1'=>['sitedescription.site_no','asc'],
                   );

				// $ordeByComs= array(
				// 	'0'=>['childcampground.c_id','desc'],
				// ) ;

				$wheres = array('sitedescription.live' => 1, 'sitedescription.draft'=>1 , 'sitedescription.import'=>0, 'sitedescription.p_id' => $data['parent_id']);
			}else{

				$joins= array(
					'0'=>['parameter_spacing','sitedescription.spacing = parameter_spacing.sp_id','left'],
					'1'=>['parameter_trailer','sitedescription.lengthTrailer = parameter_trailer.trailer_id','left'],
					'2'=>['parameter_grade','sitedescription.grade = parameter_grade.grade_id','left'],
					'3'=>['parameter_base','sitedescription.base = parameter_base.base_id','left'],
					'4'=>['parameter_water','sitedescription.water = parameter_water.water_id','left'],
					'5'=>['parameter_sewer','sitedescription.sewer = parameter_sewer.sewer_id','left'],
					'6'=>['parameter_verizon','sitedescription.verizon = parameter_verizon.verizon_id','left'],
					'7'=>['parameter_shade','sitedescription.shadeType = parameter_shade.shade_id','left'],
					'8'=>['parameter_view','sitedescription.viewType = parameter_view.view_id','left'],
					// '9'=>['parameter_camping','sitedescription.campType = parameter_camping.camping_id','left'],
					'9'=>['parameter_acess','sitedescription.acess = parameter_acess.acess_id','left'],
					'10'=>['parameter_amp','sitedescription.amps = parameter_amp.amp_id','left'],
					'11'=>['sitedescription_pics','sitedescription.siteId = sitedescription_pics.sitedescription_id','left'],
					'12'=>['parameter_wifi','sitedescription.wifi = parameter_wifi.wifi_id','left'],
					'13'=>['parameter_cable','sitedescription.cableTv = parameter_cable.cable_id','left'],
					'14'=>['parentcampground','sitedescription.p_id = parentcampground.p_id','inner'],
					'15'=>['childcampground','sitedescription.childId = childcampground.c_id','inner']);

					$ordeByComs= array('0'=>['parentcampground.name','asc'],
                          '1'=>['childcampground.c_name','asc'],
                          '2'=>['sitedescription.site_no','asc'],
                   );
					// $ordeByComs= array(
     //                      '0'=>['sitedescription.site_no','asc'],
     //               );


				// $ordeByComs= array(
				// 	'0'=>['sitedescription.p_id','desc'],
				// ) ;

				$wheres = array('sitedescription.childId' => $data['childID'], 'sitedescription.draft'=>1 , 'sitedescription.import'=>0, 'sitedescription.live' => 1, 'sitedescription.p_id' => $data['parent_id']);

				//$wheres = array('sitedescription.live' => 1, 'sitedescription.p_id' => $data['parent_id'] );
			}


//             $wheres = array('sitedescription.childId' => $data['childID'], 'sitedescription.live' => 1, 'sitedescription.p_id' => $data['parent_id'] );

//             $ordeByComs= array(
//                               '0'=>['childcampground.c_id','desc'],
//                               ) ;
             
                   // $sites= $this->Campgrounds->find("sitedescription",$wheres,$start,$data['length'],1,$joins,'',$selects,$ordeByComs);
                   // echo json_encode($sites);


                    $select = "parentcampground.*,sitedescription.*, parameter_spacing.sp_name as sp_name,  parameter_spacing.sp_image as sp_image,  parameter_trailer.trailer_name as trailer_name, parameter_trailer.trailer_image as trailer_image,  parameter_grade.grade_name as grade_name, parameter_grade.grade_image as grade_image, parameter_base.base_name as base_name, parameter_base.base_image as base_image,  parameter_water.water_name as water_name, parameter_water.water_image as water_image, parameter_sewer.sewer_name as sewer_name, parameter_verizon.verizon_name as verizon_name, parameter_verizon.verizon_image as verizon_image, parameter_shade.shade_name as shade_name , parameter_shade.shade_image as shade_image , parameter_view.view_name as view_name, parameter_view.view_image as view_image, parameter_acess.acess_name as acess_name, parameter_acess.acess_image as acess_image,parameter_wifi.wifi_name as wifi_name, parameter_wifi.wifi_image as wifi_image,parameter_cable.cable_name as cable_name, parameter_cable.cable_image as cable_image, parameter_amp.amp_name as amp_name,parameter_amp.amp_image as amp_image,sitedescription_pics.sitePic";

   // group by for count grouping
    $group_by=array('0'=>['sitedescription.siteId']);
     //findNumRowsForaboveCode function get num of rows (general function) from database
    $total=$this->Campgrounds->findNumRowsForaboveCodeCampsite2("sitedescription",$wheres,'',$joins,'',$select,'',$group_by);
     $returnData = $this->Campgrounds->findSearchIssueCampingsite("sitedescription",$wheres,$start,$data['length'],"1",$joins,"",$select,$ordeByComs,$group_by );


     $ordeBy1= array('0'=>['order_by','asc'],
                   );

     $campings = $this->Campgrounds->find("parameter_camping",'','','',1,'','','',$ordeBy1);
     if(isset($this->userId))
     {
     		 $fvWhere=array('subscriber_id' => $this->userId);
     		 $favorite = $this->Campgrounds->find("favorite",$fvWhere,'','',1) ;
     }else{
     	$favorite = [] ;
     }
    
       //print_r($returnData);return;

     // $sitedescription_pics = $this->Campgrounds->find("sitedescription_pics",'','','',1);
     foreach ($returnData as $value) {
       $where1 = array('sitedescription_id =' => $value->siteId);
            $sitedescription_pics[$value->siteId] = $this->Campgrounds->find_rows_data("sitedescription_pics",$where1);
         
			           }
			             // print_r($sitedescription_pics);return;
          // $data['site_pics']= $sitedescription_pics;  

         $views = $this->Campgrounds->find("parameter_view",'','','',1);
          $waters = $this->Campgrounds->find("parameter_water",'','','',1);
            $sewers = $this->Campgrounds->find("parameter_sewer",'','','',1);
             $tables = $this->Campgrounds->find("parameter_table",'','','',1);
              $amps = $this->Campgrounds->find("parameter_amp",'','','',1);
     // print_r($total);return;
          // print_r($returnData);

          $free_trial = $this->session->userdata['userdata']['free_trial'];   
          $arrayName = array('total' => $total,'sitedescription'=>$returnData, 'campings'=>$campings, 'sitedescription_pics'=>$sitedescription_pics, 'views'=>$views ,'waters'=>$waters,'sewers'=>$sewers,'tables'=>$tables,'amps'=>$amps,'favorite'=>$favorite,'free_trial'=>$free_trial );

          echo json_encode($arrayName);
			//  echo "<pre>";print_r($data['sites']);exit;               
			// $select = "*,region.id as rId,region.name as rname, region.slug as rslug";
			// 		$join= array('0'=>['parentcampground','region.id = parentcampground.regionId','inner']);
			// //$where = array('parentcampground.slug' => $slug );
			// $ordeByCom= array(
   //                  '0'=>['parentcampground.p_id','desc'],
   //                  );
			
			// $where = array('parentcampground.regionId' => $data['sites'][0]->regionId );
			// //print_r($where);exit;
			// $data['region'] = $this->Campgrounds->find("region",$where,'','',1,$join,'',$select,$ordeByCom);
			// $data['title']='Site Description';
			
			// $data['yield']='home/login/site-description.php';
			// $this->load->view($this->layout,$data);

		// }else{
		// 	redirect(base_url());
		// }
	}

	public function site_description($id){
		if(isset($this->userId)){

			
            $selects = "*, childcampground.slug as cslug,parentcampground.slug as pslug";
             $joins= array(
             	'0'=>['parameter_spacing','sitedescription.spacing = parameter_spacing.sp_id','left'],
                '1'=>['parameter_trailer','sitedescription.lengthTrailer = parameter_trailer.trailer_id','left'],
                '2'=>['parameter_grade','sitedescription.grade = parameter_grade.grade_id','left'],
                '3'=>['parameter_base','sitedescription.base = parameter_base.base_id','left'],
                '4'=>['parameter_water','sitedescription.water = parameter_water.water_id','left'],
                '5'=>['parameter_sewer','sitedescription.sewer = parameter_sewer.sewer_id','left'],
                '6'=>['parameter_verizon','sitedescription.verizon = parameter_verizon.verizon_id','left'],
                '7'=>['parameter_shade','sitedescription.shadeType = parameter_shade.shade_id','left'],
                '8'=>['parameter_view','sitedescription.viewType = parameter_view.view_id','left'],
                // '9'=>['parameter_camping','sitedescription.campType = parameter_camping.camping_id','left'],
                '9'=>['parameter_acess','sitedescription.acess = parameter_acess.acess_id','left'],
                '10'=>['parameter_amp','sitedescription.amps = parameter_amp.amp_id','left'],
                '11'=>['sitedescription_pics','sitedescription.siteId = sitedescription_pics.sitedescription_id','left'],
                '12'=>['parameter_wifi','sitedescription.wifi = parameter_wifi.wifi_id','left'],
                '13'=>['parameter_cable','sitedescription.cableTv = parameter_cable.cable_id','left'],
             	'14'=>['parentcampground','sitedescription.p_id = parentcampground.p_id','inner'], 
             	'15'=>['childcampground','sitedescription.childId = childcampground.c_id','inner']);
             $wheres = array('sitedescription.siteId' => $id );
             $ordeByComs= array(
                               '0'=>['childcampground.c_id','desc'],
                               );
             
                   $data['sites']= $this->Campgrounds->find("sitedescription",$wheres,'','',1,$joins,'',$selects,$ordeByComs);
			 //echo "<pre>";print_r($data['sites']);exit;               
			$select = "*,region.id as rId,region.name as rname, region.slug as rslug";
					$join= array('0'=>['parentcampground','region.id = parentcampground.regionId','inner']);
			//$where = array('parentcampground.slug' => $slug );
			$ordeByCom= array(
                    '0'=>['parentcampground.p_id','desc'],
                    );
			
			$where = array('parentcampground.regionId' => $data['sites'][0]->regionId );
			//print_r($where);exit;
			$data['region'] = $this->Campgrounds->find("region",$where,'','',1,$join,'',$select,$ordeByCom);
			$data['title']='Site Description';
			
			$data['yield']='home/login/site-description.php';
			$this->load->view($this->layout,$data);

		}else{
			redirect(base_url());
		}
	}
	public function myInformation($slug='' , $child_slug=null)
	{
		
		//$data['[title']="Information pages";
	// $data['back_url']=	$_SERVER['HTTP_REFERER'];
		// $this->Campgrounds->checkSubscriptionExp();
			if(isset($this->userId)){
				//$where = array('id =' => $this->userId);
				if($slug !=''){
					
					//print_r($slug);exit;
					$select = "*,subscribe.id as IDS,subscribe.created_at as create,comments.created_at as datenew ,comments.id as comID";
					$join= array('0'=>['subscribe','comments.sender_id = subscribe.id','left']);
					 $data['information']=$this->Campgrounds->getInformation();
					 $where = array('slug' => $slug );
					 //print_r($slug );exit;
					 $data['information_rows'] = $this->Campgrounds->find("informationalpages",$where,'','',1);
					 //print_r($data['information_rows']);exit;
                    if (!empty($data['information'])&&!empty($data['information_rows']))
                    {
                        $id_info=$data['information_rows'][0]->info_id;

                        $where = array('comments.informationalpages_id' => $id_info, 'comments.comments_approved'=>1,'comments.menuitem_id'=>'NULL' );
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
                            $data['information']=$this->Campgrounds->getInformation();
                            $where = array('slug' => $slug );
                            //print_r($slug );exit;
                            $data['information_rows'] = $this->Campgrounds->find("informationalpages",$where,'','',1);
                            //print_r($data['information_rows']);exit;
                            $id_info=$data['information_rows'][0]->info_id;

                            $where = array('comments.informationalpages_id' => $id_info, 'comments.comments_approved'=>1,'comments.menuitem_id'=>'NULL' );
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

                            $data['yield']='home/login/menu_item.php';
                        }else
                        {

                            $data['title']=$data['information_rows'][0]->title;
                            $data['metadescription']=$data['information_rows'][0]->meta_description;
                            $data['metakeywords']=$data['information_rows'][0]->keyword;
                            $data['yield']='home/login/informational.php';
                        }
                    }
					else
                    {
                        $data['information'] = array();
                        $data['information_rows'] = array();
                        $data['yield']='home/login/informational.php';
                    }


	
			        $this->load->view($this->layout,$data);
				}else{

					 $data['information']=$this->Campgrounds->getInformation();
					 $data['information_rows']=$this->Campgrounds->getInformationAll();
					 if (!empty($data['information'])&&!empty($data['information_rows']))
                     {
                         $id_info=$data['information_rows'][0]->info_id;
                         $select = "*,subscribe.id as IDS,subscribe.created_at as create,comments.created_at as datenew ,comments.id as comID";
                         $join= array('0'=>['subscribe','comments.sender_id = subscribe.id','left']);
                         $where = array('informationalpages_id' => $id_info, 'comments.comments_approved'=>1,'comments.menuitem_id'=>'NULL' );
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
                     }
					 else
                     {
                         $data['information'] = array();
                         $data['information_rows'] = array();
                     }
					 //print_r($data['information_rows']);exit;

			$data['yield']='home/login/informational.php';
			$this->load->view($this->layout,$data);
				}
	        
		}else{

			// session_start();

			$_SESSION["url"]= base_url().'information-pages/' ;
			//$this->session->set_userdata('url', current_url()."information-pages/") ;
			 redirect(base_url()."login");
		}
		
	}

	public function information_nextLoad()
{
	if(isset($this->userId))
	{	 
		$id=$this->input->post('id');
			$where = array('informationalpages_id' => $id,'comments_approved'=>1,'comments.menuitem_id'=>'NULL');
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
// $commentsCount = $this->Campgrounds->findNumRowsPagenation2("comments",$where,'',$join);
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
                                                if($comment->first_name!=''){
                                                 $html.=' '. $comment->first_name.' '.$comment->last_name .'';
                                                }else{
                                                   $html.= 'Camping Steve';
                                                }
                                                $html.='</h6>';
                                                if($this->userId==$comment->sender_id){
                                               $html.='<a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="'. $comment->comID.'" data-toggle="tooltip" title="Delete">Delete</a>
                                               <a class="comment-reply-link comment-edit comment-edit-'.$comment->comID.'" href="javascript:void(0)" data-id="'. $comment->comID.'" data-message="'.$comment->comment.'">Edit</a>';
                                               } 
                                              $html.='<time class="post-date" datetime="">'.$new_date.'</time><br>
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
                                                if($reply->first_name!=''){
                                                  $html.=''.$reply->first_name.' '.$reply->last_name.'';
                                                }else{
                                                   $html.='Camping Steve';
                                                }
                                                $html.='</h6>';
                                                if($this->userId==$reply->user_id){
                                                   
                                                    $html.=' <a href="javascript:void(0)" class="comment-reply-link delete_comment_reply"  data-id="'. $reply->replyID.'" data-toggle="tooltip" title="Delete">Delete</a>
                                                    <a class="comment-reply-link comment-edit-reply comment-edit-reply-'.$reply->replyID.'" href="javascript:void(0)" data-id="'.$reply->replyID.'" data-message="'. $reply->comment_reply.'">Edit</a>';
                                                }

                                                    $html.='<time class="post-date" datetime="">'. $new_date.'</time><br>
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
                                  $arrayName = array('0' =>$html ,'1'=>$c,'2'=>$commentsCount );
       echo json_encode($arrayName); 
	}
	else
	{
		redirect(base_url());
	}
}
	public function delete_comment()
{
		$data = $this->input->post();
		$this->db->delete('comments', array('id' => $data['id'])); 
		$this->db->delete('replys', array('comment_id' => $data['id'])); 
		echo 'true';
}
	public function update_imge()
{
		
		$data = $this->input->post();
		$this->db->where('id',$data['id']); 
		$this->db->set('image','');
		$this->db->update('subscribe');
		$this->session->userdata['userdata']['image']='';
		//$this->db->update('subscribe', array('id' => $data['id'])); 
		//$this->db->delete('replys', array('comment_id' => $data['id'])); 
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
   	//print_r($this->input->post());exit;

	   $aprovedReply =  (isset($this->session->userdata['admindata']['adminId']) || $this->input->post('email_blog') == "admin@colorado.com")  ? 1 : 0 ;

      $data = array(
        'comment_id' => $this->input->post('comment_id'),
        'comment_reply' => $this->input->post('comment_reply'),
        'menus_id' => $this->input->post('menud'),
        'user_id' => $this->userId,
		'detect_forum_reply' => $this->input->post('detect_forum_reply'),
		'reply_approved' => $aprovedReply,
        )	;
      // $id=$this->db->insert('replys', $data);
      	$id= $this->Campgrounds->insert('replys',$data);
      // print_r($id);
      	echo $id;
      // echo 'Added successfully.';  
   }
   public function ajaxRequestReplyAdmin()
   {
//	   var_dump($this->input->post('detect_forum_reply')); return ;
   			 $where = array('email' => 'admin@colorado.com');
			   $returnData = $this->Campgrounds->find('subscribe', $where);
      $data = array(
      	'comment_id' => $this->input->post('comment_id'),
        'comment_reply' => $this->input->post('comment_reply'),
        'user_id' =>$returnData->id,
        'detect_forum_reply' => $this->input->post('detect_forum_reply'),
        'reply_approved'=>1,
        'menus_id'=>$this->input->post('menud')
        );
      // $id=$this->db->insert('replys', $data);
      	$id= $this->Campgrounds->insert('replys',$data);
      // print_r($id);
      	echo $id;
      // echo 'Added successfully.';  
   }
   function get_item()

{
	$wheres = array('id' => $this->input->post('id'));
    $dataaa =$this->Campgrounds->find('menuitem',$wheres);
   //print_r($data->informationalpages_id);exit;
    $where = array('menuitem_id' => $this->input->post('id'),'comments_approved'=>1 );
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
// $commentsCount = $this->Campgrounds->findNumRowsPagenation2("comments",$where,'',$join);
//print_r($comments);exit;
//$where = array('menuitem_id' => $this->input->post('id'),'comments_approved'=>1 );
  		 	$html= 
  		 	'
<ul class="comment-list"><li class="new-comment-show new-comment-load-first"></li>';
if($this->session->userdata['userdata']['first_name']!='Camping' && $this->session->userdata['userdata']['last_name']!='Steve') {
foreach($comments as $key => $comment) {
$html.='<li class="">'; 
                                                $select = "*,subscribe.id as IDS,replys.id as replyID,";
                                          $join= array('0'=>['subscribe','replys.user_id = subscribe.id','left']);
                                              $where = array('comment_id' => $comment->comID,'reply_approved'=>1 );
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
                                              <a class="comment-reply-link comment-replyss" href="javascript:void(0)" data-id="'.$comment->comID.'" data-menuid="'.$comment->menuitem_id.'">Reply</a>
                                              
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
                                                   $html.= 'Camping Steve';
                                                }
                                                $html.='</h6>';
                                                if($this->userId==$comment->sender_id){
                                               $html.='<a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="'. $comment->comID.'" data-toggle="tooltip" title="Delete">Delete</a>
                                               <a class="comment-reply-link comment-edit comment-edit-'.$comment->comID.'" href="javascript:void(0)" data-id="'. $comment->comID.'" data-message="'.$comment->comment.'">Edit</a>';
                                               } 
                                              $html.='<time class="post-date" datetime="">'.$new_date.'</time><br>
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
                                                   $html.='Camping Steve';
                                                }
                                                $html.='</h6>';
                                                if($this->userId==$reply->user_id){
                                                   
                                                    $html.=' <a href="javascript:void(0)" class="comment-reply-link delete_comment_reply"  data-id="'. $reply->replyID.'" data-toggle="tooltip" title="Delete">Delete</a>
                                                    <a class="comment-reply-link comment-edit-reply comment-edit-reply-'.$reply->replyID.'" href="javascript:void(0)" data-id="'.$reply->replyID.'" data-message="'. $reply->comment_reply.'">Edit</a>';
                                                }

                                                    $html.='<time class="post-date" datetime="">'. $new_date.'</time><br>
                                                    <p class="thumb-list-repy-'.$reply->replyID.'">'.$reply->comment_reply.'</p>
                                                 </div>
                                              </div>
                                            ';
                                             }
                                              $html.='
                                           </li>';
                                           
                                           
                                        $html.='</ul>
                                         '; 
                                        $html.='
                                     </li>';
                                     } }
                                 
  		 	
if($this->session->userdata['userdata']['first_name']=='Camping' && $this->session->userdata['userdata']['last_name']=='Steve') {
	$html.='<li class="new-comment-show new-comment-load-first-1"></li>';
foreach($comments as $key => $comment) {
$html.='<li class="">'; 
                                                $select = "*,subscribe.id as IDS,replys.id as replyID,";
                                          $join= array('0'=>['subscribe','replys.user_id = subscribe.id','left']);
                                              $where = array('comment_id' => $comment->comID,'reply_approved'=>1 );
                                              $replys = $this->Campgrounds->find("replys",$where,'','',1,$join,'',$select,'');
                                       $html.='<div class="thumb-list  ">
                                         
                                            <figure>';
                                             if($comment->image!=''){ 
                                           $html.='<img alt="" src="'.base_url().'/uploads/userImages/'.$comment->image.'"> '; }
                                           elseif($comment->image=='' &&  $comment->sender_id==0){
                                           	$html.='<img alt="" src="'.base_url().'/assets/admin/img/logo.png">
                                           '; }else{ 
                                           	$html.='<img alt="" src="'. base_url().'/assets/images/test.jpg">';}
                                           	$html.='
                                              <a class="comment-reply-link comment-replyssadmin" href="javascript:void(0)" data-id="'.$comment->comID.'" data-menuid="'.$comment->menuitem_id.'">Reply</a>
                                              
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
                                                   $html.= 'Camping Steve';
                                                }
                                                $html.='</h6>';
                                                if($this->userId==$comment->sender_id){
                                               $html.='<a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="'. $comment->comID.'" data-toggle="tooltip" title="Delete">Delete</a>
                                               <a class="comment-reply-link comment-edit comment-edit-'.$comment->comID.'" href="javascript:void(0)" data-id="'. $comment->comID.'" data-message="'.$comment->comment.'">Edit</a>';
                                               } 
                                              $html.='<time class="post-date" datetime="">'.$new_date.'</time><br>
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
                                                   $html.='Camping Steve';
                                                }
                                                $html.='</h6>';
                                                if($this->userId==$reply->user_id){
                                                   
                                                    $html.=' <a href="javascript:void(0)" class="comment-reply-link delete_comment_reply"  data-id="'. $reply->replyID.'" data-toggle="tooltip" title="Delete">Delete</a>
                                                    <a class="comment-reply-link comment-edit-reply comment-edit-reply-'.$reply->replyID.'" href="javascript:void(0)" data-id="'.$reply->replyID.'" data-message="'. $reply->comment_reply.'">Edit</a>';
                                                }

                                                    $html.='<time class="post-date" datetime="">'. $new_date.'</time><br>
                                                    <p class="thumb-list-repy-'.$reply->replyID.'">'.$reply->comment_reply.'</p>
                                                 </div>
                                              </div>
                                            ';
                                             }
                                              $html.='
                                           </li>';
                                           
                                           
                                        $html.='</ul>
                                         '; 
                                        $html.='
                                     </li>';
                                     } }
                                  $html.='</ul>';
  		 		  // echo "<pre>";print_r($html);exit;
                                  $arrayName = array('0' =>$html ,'1'=>$c,'2'=>$commentsCount,'3'=>$dataaa );
       echo json_encode($arrayName); 
    //echo json_encode($data);

}
   public function ajaxRequestCommentPost()
   {
      $data = array(

            'informationalpages_id' => $this->input->post('informationalpages_id'),

            'comment' => $this->input->post('comment'),
            'sender_id' => $this->userId,
            'menuitem_id' => $this->input->post('menu'),
            
        );
     
	$id= $this->Campgrounds->insert('comments',$data);

     echo $id;  
   }

	public function ajaxRequestBlogCommentPost()
	{

		$approve = ($this->input->post('email_blog') == "admin@colorado.com") ? 1: 0 ;

		$data = array(

			'forum_id' => $this->input->post('forum_id'),
			'comment' => $this->input->post('comment'),
			'sender_id' => $this->userId,
			'detect_forum' => $this->input->post('forum'),
			'comments_approved'=> $approve ,
//			'name' => $this->input->post('name'),
//			'email' => $this->input->post('email'),

		);

		$id= $this->Campgrounds->insert('comments',$data);

		echo $id;
	}


   public function ajaxRequestCommentPostAdmin()
   {
      $data = array(
            'informationalpages_id' => $this->input->post('informationalpages_id'),
              
            'comment' => $this->input->post('comment'),
            'sender_id' => $this->userId,
            'comments_approved'=>1,
            'menuitem_id'=>$this->input->post('menu'),
        );
     
	$id= $this->Campgrounds->insert('comments',$data);

     echo $id;  
   }


		public function forgotpassword()
	{   
		if(!isset($this->userId)){
			// $where = array('id =' => $this->userId);
   //      $data['user']=$this->Campgrounds->find('subscribe',$where);
		$data['title']='Forgot Password';
		$data['yield']='home/login/forgot-password';
		$this->load->view($this->layout,$data);
	}else{
		redirect(base_url());
	}
		
	}

	public function submitForgotPassword($value='')
	{

		$data = $this->input->post();
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			if ($this->form_validation->run() == FALSE)
		    {
		    	$this->session->set_flashdata('error1','Invalid Email address');
		    	redirect(base_url('forgot-password'));
		    }else{
		    	
				$email = $data['email'];
				$where = array('email' => $email);
				$returnData = $this->Campgrounds->find("subscribe", $where);

				if(empty($returnData)){		
				$this->session->set_flashdata('error1','This email is not registered to Colorado Campground');	
				 $this->session->set_flashdata('data',$data);		
				redirect(base_url('forgot-password'));
					}else{
						$length = 8;
    	$random= substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
		
		  						 $config['protocol'] = 'sendmail';
									$config['mailpath'] = '/usr/sbin/sendmail';
									$config['charset'] = 'iso-8859-1';
									$config['wordwrap'] = TRUE;
									$config['mailtype'] = 'html';
									$config['crlf'] = "\r\n";
									$config['newline'] = "\r\n";
									$this->email->initialize($config);

									$this->email->from('testing@softenica.com', 'Colorado Campground');
									$this->email->to($returnData->email);
									$subject = 'Forgot Password | Colorado Campground' ;
									$this->email->subject($subject);
									$url =  base_url()."update-password/".$random;
									// '<a href="'.$url.'">click on link to change password</a>';
// 									Hello,
// You have received this email because you requested to recover your password. If you did not request password recovery, you don't need to do anything.
// If you requested password recovery, please click this link to go to password recovery page:
// Recover Session Plaza Password (it will have the link)
// Best Regards,
// Session Plaza Team.
									$this->email->message('Hello '.$returnData->first_name.' '.$returnData->last_name.', <br><br>You have received this email because you requested to recover your password. If you did not request password recovery, you dont need to do anything. <br> If you requested password recovery, please click this link to go to password recovery page: <a href="'.$url.'"> Recover your Colorado Campground Password<a/><br><br>Best Regards, <br>Colorado Campground Team.');
									// print_r($this->email->print_debugger());return;									
									 if($this->email->send()){  
									 	 $where = array('id' => $returnData->id);
			                            $data1 = array('code'=>$random);
			                            $this->Campgrounds->update_data( '','', 'subscribe', $data1, $where );
			                    $this->session->set_flashdata('success1', "Check your Email to update the password");
								redirect(base_url('forgot-password'));
				}else{
					$this->session->set_flashdata('error', "Please try again");
								redirect(base_url('forgot-password'));
				}

						
					}
		    }
	}


public function updateForgotPassword($value='')
	{
				$code = $value;
				$where = array('code' => $code);
				$returnData = $this->Campgrounds->find("subscribe", $where);
				if(empty($returnData)){
				$this->session->set_flashdata('error1', "Link expired! Please try again");
				redirect(base_url('forgot-password'));
				return false;
				}else{
					 $where = array('id' => $returnData->id);
                    $data1 = array('code'=>'');
                    $this->Campgrounds->update_data( '','', 'subscribe', $data1, $where );
					$data['title']='Update password';
					$data['yield']='home/login/updateforgot-password';
			        $this->session->set_userdata('newForgotpassword', $returnData->id);
					$this->load->view($this->layout,$data);

				}
	}

	// 
	public function forgotsetpassword($value='')
	{
		if($this->session->userdata('newForgotpassword')){
			$data=$this->input->post();
		// $this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|max_length[100]|matches[password]');

		if ($this->form_validation->run() == FALSE)
                {
              	 $data = $this->input->post();
                $ins =$this->form_validation->error_array();
                 $this->session->set_flashdata('error', $ins);
                 $this->session->set_flashdata('data',$data);
                 redirect($_SERVER['HTTP_REFERER']);
                }else{
                	 $where = array('id' => $this->session->userdata('newForgotpassword'));
			   $returnData = $this->Campgrounds->find('subscribe', $where);
					if(!empty($returnData)){
						$insert_data=array(
					'password'=>md5($data['password']),
					);

						$where = array('id' => $this->session->userdata('newForgotpassword') );
                	$this->Campgrounds->update_data('','','subscribe',$insert_data,$where);
                		$this->session->set_flashdata('success1', 'Password updated Successfully');
						redirect(base_url('/login'));

					}else{
						$this->session->set_flashdata('error1', 'Invalid Request');
						redirect(base_url('/login'));

					}
                }
		}else{
			$this->session->set_flashdata('error1', 'Session Expired! Please Try Again');
					
			redirect(base_url('/login'));
		}

	}


public function purchaseitem($id , $isTrial=false)
    {
    	// die(var_dump($isTrial));
        $this->db->select('*')->from('subscribe')
            ->where('id',$id) ;
        $query = $this->db->get();
        $data = $query->row();
        // die(var_dump($this->session->userdata['paypalId']));
    	// print($id);
    	// print('arg');
     //   print($this->session->userdata['paypalId']);return;
    	if(isset($this->session->userdata['paypalId']) && $this->session->userdata['paypalId']==$id){
          
       $returnURL = base_url().'Paypal/success';
       $cancelURL = base_url().'Paypal/cancel';
       $notifyURL = base_url().'Paypal/ipn';

       // Get product data from the database
      // $product = $this->product->getRows($id);

       // Get current user ID from the session
       // $userID = $this->session->userdata('user_id');

       // Add fields to paypal form
       	 $where = array('s_payment' => 1);
			   $SubscriptionPayment = $this->Campgrounds->find('setpayment', $where);
			   $pay=$SubscriptionPayment->pAmount;

        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', 'Yearly Subscription');
        $this->paypal_lib->add_field('cmd', '_xclick-subscriptions');
       // <input type="hidden" name="no_note" value="1">
        $this->paypal_lib->add_field('no_note', '1');
        $this->paypal_lib->add_field('no_shipping', '2');
//        trial
        $this->paypal_lib->add_field('a1','0.00');
        if($isTrial && empty($data->subscription_date)){
           $this->paypal_lib->add_field('p1','30');
           $this->paypal_lib->add_field('t1','D');
        }

//
         $this->paypal_lib->add_field('rm','2');
         $this->paypal_lib->add_field('a3',$pay);  
         // $this->paypal_lib->add_field('item_number','30.00');    
   		 $this->paypal_lib->add_field('p3','1');
   		 $this->paypal_lib->add_field('t3','Y');
   		 $this->paypal_lib->add_field('src','1');

            $this->paypal_lib->add_field('custom', $id);
         $this->paypal_lib->add_field('item_number','34');
        
         $this->paypal_lib->add_field('currency_code','USD');

         // <input type="hidden" name="currency_code" value="NZD">
         // $this->paypal_lib->add_field('amount','5');
       $this->paypal_lib->paypal_auto_form();
   }else{
   	$this->session->set_flashdata('error1', 'Session Expired! Please Try Again');
			redirect(base_url('/login'));
   }

        }
      

	public function updateProfile($value='')
	{
			$data=$this->input->post();
			//validation rules
		$this->form_validation->set_rules('first_name', 'First Name', 'required|max_length[100]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|max_length[100]');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('billing_address', 'Billing Address', 'required|max_length[100]');
		$this->form_validation->set_rules('apartment', 'Apartment', 'max_length[100]');
		$this->form_validation->set_rules('city', 'City', 'required|max_length[100]');
		$this->form_validation->set_rules('state', 'State', 'required|max_length[100]');
		$this->form_validation->set_rules('country', 'Country', 'required|max_length[100]');
       $this->form_validation->set_rules('zip_code', 'Zip Code', 'required|max_length[100]');
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
				

	      			$this->session->userdata['userdata']['first_name']=$data['first_name'];
					$this->session->userdata['userdata']['last_name']=$data['last_name'];

	      			 // $this->session->set_userdata('name', $fullname);
						$where = array('id' => $this->userId );
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

						                         $file_data	=  $this->upload->data();
					      						 $img  = $file_data['file_name'];
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
												$this->session->userdata['userdata']['first_name']=$data['first_name'];
												$this->session->userdata['userdata']['last_name']=$data['last_name'];
												$this->session->userdata['userdata']['image']=$img;
													$where = array('id' => $this->userId );
							                	$this->Campgrounds->update_data('','','subscribe',$insert_data,$where);
							                		$this->session->set_flashdata('success1', 'Profile updated Successfully');
															        redirect($_SERVER['HTTP_REFERER']);
						                }
								    }
                }
	}

	public function updatepassword($value='')
	{
		if(isset($this->userId)){
		$data['title']='Profile';
		$data['yield']='home/login/updatepassword';
		$this->load->view($this->layout,$data);
	}else{
		redirect(base_url());
	}
	}

	public function setpassword($value='')
	{
		if(isset($this->userId)){
			$data=$this->input->post();
		$this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|max_length[100]|matches[password]');

		if ($this->form_validation->run() == FALSE)
                {
              	 $data = $this->input->post();
                $ins =$this->form_validation->error_array();
                 $this->session->set_flashdata('error', $ins);
                 $this->session->set_flashdata('data',$data);
                 redirect($_SERVER['HTTP_REFERER']);
                }else{
                	 $where = array('id' => $this->userId,'password'=>md5($data['oldPassword']));
			   $returnData = $this->Campgrounds->find('subscribe', $where);
					if(!empty($returnData)){
						$insert_data=array(
					'password'=>md5($data['password']),
					);

						$where = array('id' => $this->userId );
                	$this->Campgrounds->update_data('','','subscribe',$insert_data,$where);
                		$this->session->set_flashdata('success1', 'Password updated Successfully');
						redirect($_SERVER['HTTP_REFERER']);

					}else{
						$this->session->set_flashdata('error1', 'Invalid old password');
						redirect($_SERVER['HTTP_REFERER']);

					}
                }
		}else{
			redirect(base_url());
		}

	}

	//signup function for user and employer also send emails for verification
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
       	$this->form_validation->set_rules('pay', 'Payment Type', 'required');


		if ($this->form_validation->run() == FALSE)
                {
              	 $data = $this->input->post();
                $ins =$this->form_validation->error_array();
                 $this->session->set_flashdata('error', $ins);
                 $this->session->set_flashdata('data',$data);
                 redirect($_SERVER['HTTP_REFERER']);
                	
                }
                else
                {

                	$data=$this->input->post();
                		if (empty($_FILES['imageSubscriber']['name'])) {
               				$length = 8;
    	$random= substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
    		if($data['pay']==2)
    		{
    			$pay=2;
    		}else{
    			$pay=1;
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
					'payment_by'=>$pay,
					'free_trial' => 0,
					);
					  
									$newuser=$this->Campgrounds->insert('subscribe',$insert_data);
									$where = array('id' => $newuser);
									$subscribe=$this->Campgrounds->find('subscribe',$where);

									$this->session->set_userdata('paypalId', $newuser);
									// print_r($data['email']);return;
									// mailchimp 
									// non subscriber list id= 64d05e9579
									// subscriber list id =00998ad243
											$email=$data['email'];
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
										// mailchimp
        										if($data['pay']!=2){
											$this->purchaseitem($newuser , false);
										}else{
											// print_r('payment by check');
											$this->transactionalEmail1($subscribe,'Pay-by-check Instructions','Pay-by-check Instructions');
											$this->session->set_flashdata('success1', 'Check your email for pay-by-check instructions.');
								       			 redirect(base_url('login'));
										}
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

						                         $file_data	=  $this->upload->data();
					      						 $img  = $file_data['file_name'];
					      						 if($data['pay']==2)
										    		{
										    			$pay=2;
										    		}else{
										    			$pay=1;
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
												'image'=>$img,
												'payment_by'=>$pay,
												'free_trial' => 0,
												);
											$newuser=$this->Campgrounds->insert('subscribe',$insert_data);
							                	$this->session->set_userdata('paypalId', $newuser);
														if($data['pay']!=2){
																$this->purchaseitem($newuser , false);
														}else{
														$this->transactionalEmail1($subscribe,'Pay-by-check Instructions','Pay-by-check Instructions');
														$this->session->set_flashdata('success1', 'Check your email for pay-by-check instructions.');
								       					redirect(base_url('login'));
														}
						                }



								}
									// $this->session->set_userdata('newUser', $newuser);
									// $this->session->set_userdata('newEmail', $data['email']);
									// $this->session->set_userdata('newFor', 'subscribe');
								 //    $this->session->set_flashdata('success1', 'We have just sent a verification email to your email address');
							  //      redirect(base_url('code-verification'));
								   // }else{
								   // 	$this->session->set_flashdata('error1', 'Error! Try to sigup again');
								   //      redirect($_SERVER['HTTP_REFERER']);
								   // }
    
 
                }
		
	}



		public function free_trial_signup($value='')
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
       	// $this->form_validation->set_rules('pay', 'Payment Type', 'required');

		if ($this->form_validation->run() == FALSE)
                {
              	 $data = $this->input->post();
                $ins =$this->form_validation->error_array();
                 $this->session->set_flashdata('error', $ins);
                 $this->session->set_flashdata('data',$data);
                 redirect($_SERVER['HTTP_REFERER']);
                	
                }
                else
                {

                	$data=$this->input->post();
                  if (empty($_FILES['imageSubscriber']['name'])) {
			         
			         $length = 8;
			    	$random= substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
			    		if($data['pay']==2)
			    		{
			    			$pay=2;
			    		}else{
			    			$pay=1;
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
							'payment_by'=>$pay,
							'free_trial' => 1,
							);
					  
									$newuser=$this->Campgrounds->insert('subscribe',$insert_data);
									$where = array('id' => $newuser);
									$subscribe=$this->Campgrounds->find('subscribe',$where);

									$this->session->set_userdata('paypalId', $newuser);
									// print_r($data['email']);return;
									// mailchimp 
									// non subscriber list id= 64d05e9579
									// subscriber list id =00998ad243
											$email=$data['email'];
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
										// mailchimp
        										if($data['pay']!=2){
											$this->purchaseitem($newuser , true);
										}else{
											// print_r('payment by check');
											$this->transactionalEmail1($subscribe,'Pay-by-check Instructions','Pay-by-check Instructions');
											$this->session->set_flashdata('success1', 'Check your email for pay-by-check instructions.');
								       			 redirect(base_url('login'));
										}
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

						                         $file_data	=  $this->upload->data();
					      						 $img  = $file_data['file_name'];
					      						 if($data['pay']==2)
										    		{
										    			$pay=2;
										    		}else{
										    			$pay=1;
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
												'image'=>$img,
												'payment_by'=>$pay,
												'free_trial' => 1,
												);
											$newuser=$this->Campgrounds->insert('subscribe',$insert_data);
							                	$this->session->set_userdata('paypalId', $newuser);
														if($data['pay']!=2){
																$this->purchaseitem($newuser , true);
														}else{
														$this->transactionalEmail1($subscribe,'Pay-by-check Instructions','Pay-by-check Instructions');
														$this->session->set_flashdata('success1', 'Check your email for pay-by-check instructions.');
								       					redirect(base_url('login'));
														}
						                }



								}
									// $this->session->set_userdata('newUser', $newuser);
									// $this->session->set_userdata('newEmail', $data['email']);
									// $this->session->set_userdata('newFor', 'subscribe');
								 //    $this->session->set_flashdata('success1', 'We have just sent a verification email to your email address');
							  //      redirect(base_url('code-verification'));
								   // }else{
								   // 	$this->session->set_flashdata('error1', 'Error! Try to sigup again');
								   //      redirect($_SERVER['HTTP_REFERER']);
								   // }
    
 
                }
		
	}



public function Codeverification()
	{
		 if(isset($this->session->userdata['newUser'])){
		$data['yield']="home/login/code_verification";
		 $data['title']="Colorado Campground|Verification";
		$this->load->view($this->layout,$data);
	}else{
		redirect(base_url('login'));
	}
	 	
	}
// confirm  verification code
	public function confirmcode($value='')
	{
		 if(isset($this->session->userdata['newUser'])){
		$data = $this->input->post();

		$this->form_validation->set_rules('code', 'Code', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
            redirect(base_url('code-verification'));
		}else{
			   $where = array('code' => $data['code'],'id'=>$this->session->userdata['newUser']);
			   $returnData = $this->Campgrounds->find($this->session->userdata['newFor'], $where);
			   if(!empty($returnData)){
			   		$where = array('id' => $returnData->id);
					$data1 = array('status'=>1,'code'=>'');
					$this->Campgrounds->update_data( 'id','', $this->session->userdata['newFor'], $data1, $where );

					
					$this->session->unset_userdata('newUser');
					$this->session->unset_userdata('newEmail');
					$this->session->unset_userdata('newFor');
					$this->session->set_flashdata('success', 'Account Verified Successfully');
            		// redirect(base_url('login'));
          //   		$session=array(
			       //  'id' => $returnData->id,
			       //  'email' => $returnData->email,
			       //  'first_name' => $returnData->first_name,
			       //  'last_name' => $returnData->last_name,
			       // );

	      			//  $this->session->set_userdata('userdata' ,$session);

	      			$this->session->set_userdata('paypalId', $returnData->id);
	      			// print($returnData->id);print('123');
	      			// print($this->session->userdata['paypalId']);return;
					$this->purchaseitem($returnData->id , false);
			   }else{
			   	$this->session->set_flashdata('error', 'Invalid Code');
            		  redirect(base_url('code-verification'));
			   }
		}
	}else{
		$this->session->set_flashdata('error', 'Try to Login again to verify the account');
            redirect(base_url('login'));
	}
	}

//for new verification code
public function createNewverificationCode($value='')
{
	 if(isset($this->session->userdata['newUser'])){
	 	
	 	$length = 8;
    	$random= substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
    	 $config['protocol'] = 'sendmail';
									$config['mailpath'] = '/usr/sbin/sendmail';
									$config['charset'] = 'iso-8859-1';
									$config['wordwrap'] = TRUE;
									$config['mailtype'] = 'html';
									$config['crlf'] = "\r\n";
									$config['newline'] = "\r\n";
									$this->email->initialize($config);

									$this->email->from('testing@softenica.com', 'Colorado Campground');
									$this->email->to($this->session->userdata['newEmail']);
									$this->email->subject('Verify your account | Colorado Campground');
									$url =  base_url()."verify-email/".$random."/".$this->session->userdata['newFor'];
									
									$this->email->message('Hello ! <br> You are just one step away from making your account on Colorado Campground.com. Please click the link below to verify your email address and then you can login:
<br> <a href="'.$url.'">Click this link to verify your account on Colorado Campground.com</a> <br> Use this code to verify account :'.$random.' <br> Best Regards, <br> Session Plaza Team  ');
																	
									 if($this->email->send()){  
									 	$where = array('id' => $this->session->userdata['newUser']);
										$data1 = array('code'=>$random);
										$this->Campgrounds->update_data( 'id','', $this->session->userdata['newFor'], $data1, $where );

									    $this->session->set_flashdata('success1', 'We have just sent a verification email to your email address');
								        redirect(base_url('code-verification'));
									 }else{
									 	 	$this->session->set_flashdata('error1', 'Error! Click on the link again to get new code');
			     							  redirect(base_url('login'));
									 }

									
	 }else{
	 	$this->session->set_flashdata('error1', 'Try to Login again to verify the account');
            redirect(base_url('login'));
	 }

}
//verify email
	public function verifyYourEmail($code='',$user)
	{
	
		$data = $code;

	
			   $where = array('code' => $code);
			   $returnData = $this->Campgrounds->find($user, $where);


			   if(!empty($returnData)){
			   		$where = array('id' => $returnData->id);
					$data1 = array('status'=>1,'code'=>'');
					$this->Campgrounds->update_data( 'id','', $user, $data1, $where );

					
					$this->session->unset_userdata('newUser');
					$this->session->unset_userdata('newEmail');
					$this->session->unset_userdata('newFor');
					$this->session->set_flashdata('success1', 'Account Verified Successfully');
            		// redirect(base_url('login'));
            		$this->Paypal();
			   }else{
			   	$this->session->set_flashdata('error1', 'Invalid Code');
            		redirect(base_url('code-verification'));
			   }
	
	}
// for login page
	public function login()
	{

		       $data['yield']="home/login/login";
			  $data['title']="Colorado Campground|Login";
		$referred_from = $this->session->userdata('referred_from');

//		$this->session->set_userdata('referred_from', $referred_from);
			$this->load->view($this->layout,$data);
	 	
	}

//login process
public function submitLogin($value='')
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',array(
                'required'      => 'Email is required',
                'valid_email'	=> 'Invalid email address.'
        ));
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		 if ($this->form_validation->run() == FALSE)
            {
            	 $data = $this->input->post();

                $ins =$this->form_validation->error_array();
                 $this->session->set_flashdata('error', $ins);
                 $this->session->set_flashdata('data',$data);
                 redirect($_SERVER['HTTP_REFERER']);
            }
            else
            {

            	$val=$this->input->post();
				$where = array('email' => $val['email'],'password'=>md5($val['password'] ));
				$admin=$this->Campgrounds->find('subscribe',$where);

				if(!empty($admin))
				{


						if((isset($admin->subscription_date) && $admin->subscription_date!=NULL) || $admin->admin_status==2 ){

							
					if($admin->admin_status==1 || $admin->admin_status == 2){  

						$date1=date_create($admin->subscription_date);
							
							$date2=date_create();
							$diff=date_diff($date2,$date1);
							$day=$diff->format("%R%a");
                            $hour=$diff->format("%h");
                            $minutes=$diff->format('%i');
                            $time=$day.'.'.$minutes;

                               // die(var_dump($time));
					// die(var_dump(isset($admin->subscription_date) , $admin->subscription_date!=NULL)  );
//							die(var_dump(date_create("02:30:27 Jan 26, 2021 PST")));
//							if($diff->format("%R%a days")>0 || $admin->admin_status==2){

                    if($time>0 || $admin->admin_status==2){
                    // if(true || $admin->admin_status==2){


	      			$days = $this->Campgrounds->dateDiffrence($admin->subscription_date);
					$session=array(
				        'id' => $admin->id,
				        'email' => $admin->email,
				        'first_name' => $admin->first_name,
				        'last_name' => $admin->last_name,
				        'image'=>$admin->image, 
				        'status'=>$admin->admin_status,
				    	'days' => $days,
				    	'free_trial' => $admin->free_trial     
			       	);

	      			// die(var_dump($session));
	      			// die(var_dump($days));


	      			 $this->session->set_userdata('userdata' ,$session);
	      			 $this->session->set_userdata( 'paypalId',$admin->id);
	      			 $this->session->set_flashdata('success','You are successfully Logged in');
						$referred_from = $this->session->userdata('referred_from');

//						var_dump($_SESSION["url"]); return;
						//header('Location: '.$this->session->userdata['url']. '?redirect');
						if($this->session->userdata('url'))
						{
							header('Location: '.$this->session->userdata['url']);
						}else{
							redirect($referred_from, 'refresh');
						}
					}else{
                            $this->session->set_userdata('paypalId',$admin->id);
                            // die(var_dump($admin));
                            $button=' <br><br><a href="'.base_url().'paypal-subscription/'.$admin->id.'" class="btn btn-primary view-list-btn">PAY NOW</a>';
                            $here = ' <a class="here" href="'.base_url().'paypal-subscription/'.$admin->id.'">here</a>';
                            $this->session->set_flashdata('error1','Your subscription has expired. Please pay your subscription fee '.$here.' to continue.'.$button);
                            redirect($_SERVER['HTTP_REFERER']);
					}

//	      			redirect(base_url());
						//redirect($_SERVER['HTTP_REFERER']);
					//	echo "<script>window.location.history.go(-2)</script>" ;
	      		}else{
	      		// 			$this->session->set_userdata('newUser', $admin->id);
									// $this->session->set_userdata('newEmail', $admin->email);
									// $this->session->set_userdata('newFor', 'subscribe');
									// $this->createNewverificationCode();
	      			 // $this->session->set_userdata('userdata' ,$session);
	      			 $this->session->set_flashdata('error1','Your Account has been blocked by Team Colorado');
	      			 redirect($_SERVER['HTTP_REFERER']);

	      		}
	      		
	      	}else{

	      		// die(var_dump($admin));
	      		$button = '';
	      		$this->session->set_userdata('paypalId',$admin->id);
	      		if($admin->subscription_date == null && $admin->subscription_id == null && $admin->free_trial == 1){
	      			$button=' <br><br><a href="'.base_url().'free-trial-subscription/'.$admin->id.'/'.true.'" class="btn btn-primary view-list-btn">Free Trial</a>';
	      		}else{
	      			$button=' <br><br><a href="'.base_url().'paypal-subscription/'.$admin->id.'" class="btn btn-primary view-list-btn">PAY NOW</a>';
	      		}
	      		$here = ' <a class="here" href="'.base_url().'paypal-subscription/'.$admin->id.'">here</a>';
	      		$this->session->set_flashdata('error1','Your last attempt for payment was not completed successfully. Please pay your subscription fee '.$here.' to continue.'.$button);
	      			 redirect($_SERVER['HTTP_REFERER']);
	      	}
            }else{
            	$this->session->set_flashdata('error1','Invalid email or password');
            	 redirect($_SERVER['HTTP_REFERER']);
           	 }
			}
		}



		public function checkLogin($value='')
		{
			# code...


		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',array(
                'required'      => 'Email is required',
                'valid_email'	=> 'Invalid email address.'
        ));
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		 if ($this->form_validation->run() == FALSE)
            {
            	 $data = $this->input->post();

                $ins =$this->form_validation->error_array();
                 $this->session->set_flashdata('error', $ins);
                 $this->session->set_flashdata('data',$data);
                 redirect($_SERVER['HTTP_REFERER']);
            }
            else
            {

            	$val=$this->input->post();
				$where = array('email' => $val['email'],'password'=>md5($val['password']));
				$admin=$this->Campgrounds->find('subscribe',$where);
//				die(var_dump($admin));
				if(!empty($admin))
				{

						if((isset($admin->subscription_date) && $admin->subscription_date!=NULL) || $admin->admin_status==2 ){


					if($admin->admin_status==1 || $admin->admin_status == 2){

						$date1=date_create($admin->subscription_date);
							
							$date2=date_create();
							$diff=date_diff($date2,$date1);
							$day=$diff->format("%R%a");
                            $hour=$diff->format("%h");
                            $minutes=$diff->format('%i');
                            $time=$day.'.'.$minutes;
//                                die(var_dump($admin->admin_status));
//							die(var_dump(date_create("02:30:27 Jan 26, 2021 PST")));
//							if($diff->format("%R%a days")>0 || $admin->admin_status==2){
                if($time>0 || $admin->admin_status==2){
//                    die(var_dump($admin))/;
                    $days = $this->Campgrounds->dateDiffrence($admin->subscription_date);    	
					$session=array(
			        'id' => $admin->id,
			        'email' => $admin->email,
			        'first_name' => $admin->first_name,
			        'last_name' => $admin->last_name,
			        'image'=>$admin->image,
			        'status'=>$admin->admin_status,
				    'days' => $days, 
				    'free_trial' => $admin->free_trial 
			       );

	      			 $this->session->set_userdata('userdata' ,$session);
	      			 $this->session->set_flashdata('success','You are successfully Logged in');
					 $referred_from = $this->session->userdata('referred_from');

//						var_dump($_SESSION["url"]); return;
						//header('Location: '.$this->session->userdata['url']. '?redirect');
						$data['logIn'] = true;
						echo json_encode($data);

						return ;
					}else{
                    $this->session->set_userdata('paypalId',$admin->id);
                    // die(var_dump($admin));
                    $button=' <br><br><a href="'.base_url().'paypal-subscription/'.$admin->id.'" class="btn btn-primary view-list-btn">PAY NOW</a>';
                    $here = ' <a class="here" href="'.base_url().'paypal-subscription/'.$admin->id.'">here</a>';
                    $html ='Your subscription has expired. Please pay your subscription fee '.$here.' to continue.'.$button;
                    $data['html'] = $html;
                    $data['logIn'] = false;
                    echo json_encode($data);
                    return;
//                    redirect($_SERVER['HTTP_REFERER']);
                }

//	      			redirect(base_url());
						//redirect($_SERVER['HTTP_REFERER']);
					//	echo "<script>window.location.history.go(-2)</script>" ;
	      		}
	      		
	      	}
            }
			}

//            $this->session->set_userdata('paypalId',$admin->id);
            $html = '';
            if(!empty($admin)){
                if($admin->subscription_date == null && $admin->subscription_id == null && $admin->free_trial == 1){
                    $button=' <br><br><a href="'.base_url().'free-trial-subscription/'.$admin->id.'/'.true.'" class="btn btn-primary view-list-btn">Free Trial</a>';
                }else{
                    $button=' <br><br><a href="'.base_url().'paypal-subscription/'.$admin->id.'" class="btn btn-primary view-list-btn">PAY NOW</a>';
                }
                $here = ' <a class="here" href="'.base_url().'paypal-subscription/'.$admin->id.'">here</a>';
                $this->session->set_flashdata('error1','Your last attempt for payment was not completed successfully. Please pay your subscription fee '.$here.' to continue.'.$button);
                $html = 'Your last attempt for payment was not completed successfully. Please pay your subscription fee '.$here.' to continue.'.$button;
                $data['html'] = $html;
            }else{
                $data['html'] = 'Invalid email or password';
            }


						$data['logIn'] = false;
						echo json_encode($data);

		}


//for search page
    public function search(){
    	// $this->Campgrounds->checkSubscriptionExp();
        if (isset($this->userId))
        {
            $ordeBy= array(
                '0'=>['region.id','desc'],
            );
            $data['regions'] = $this->Campgrounds->find("region",'','','',1,'','','',$ordeBy);

            $ordeBy= array(
                '0'=>['childcampground.c_id','desc'],
            );
            $where= array('childcampground.draft' => 0, );
            $data['childcampgrounds'] = $this->Campgrounds->find("childcampground",$where,'','',1,'','','',$ordeBy);


            $ordeBy1= array(
                '0'=>['parameter_view.order_by','asc'],
            );
            $data['views'] = $this->Campgrounds->find("parameter_view",'','','',1,'','','',$ordeBy1);

            $ordeBy1= array(
                '0'=>['parameter_grade.order_by','asc'],
            );
            $data['grades'] = $this->Campgrounds->find("parameter_grade",'','','',1,'','','',$ordeBy1);

            $ordeBy1= array(
                '0'=>['parameter_acess.order_by','asc'],
            );
            $data['access'] = $this->Campgrounds->find("parameter_acess",'','','',1,'','','',$ordeBy1);

            $ordeBy1= array(
                '0'=>['parameter_base.order_by','asc'],
            );
            $data['bases'] = $this->Campgrounds->find("parameter_base",'','','',1,'','','',$ordeBy1);

            $water =  $this->db->query("Select * from parameter_water where water_name !='No' || water_name !='no' order by order_by asc" );
//            print_r($water);
            $data['waters'] = $water->result();
            $sewer =  $this->db->query("Select * from parameter_sewer where sewer_name !='No' || sewer_name !='no' order by order_by asc" );
            //            print_r($water);
            $data['sewers'] = $sewer->result();

            $ordeBy11= array(
                '0'=>['parameter_shade.order_by','asc'],
            );
            $data['parameter_shades'] = $this->Campgrounds->find("parameter_shade",'','','',1,'','','',$ordeBy11);

            $ordeBy14= array(
                '0'=>['parameter_table.order_by','asc'],
            );

            $data['parameter_tables'] = $this->Campgrounds->find("parameter_table",'','','',1,'','','',$ordeBy14);

            $ordeBy8= array(
                '0'=>['parameter_water.order_by','asc'],
            );
            $data['parameter_waters'] = $this->Campgrounds->find("parameter_water",'','','',1,'','','',$ordeBy8);

            $ordeBy9= array(
                '0'=>['parameter_sewer.order_by','asc'],
            );
            $data['parameter_sewers'] = $this->Campgrounds->find("parameter_sewer",'','','',1,'','','',$ordeBy9);

            $ordeBy2= array(
                '0'=>['parameter_camping.order_by','asc'],
            );
            $data['campings'] = $this->Campgrounds->find("parameter_camping",'','','',1,'','','',$ordeBy2);

            $ordeBy7= array(
                '0'=>['parameter_amp.order_by','asc'],
            );
            $data['parameter_amps'] = $this->Campgrounds->find("parameter_amp",'','','',1,'','','',$ordeBy7);

            $data['yield']="home/search";
            $data['title']="Colorado Campground|Search";

            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('login'));
        }
    }

//


    //for search page
    public function topratedCampsites(){

    	// $this->Campgrounds->checkSubscriptionExp();

        if (isset($this->userId))
        {
            $ordeBy= array(
                '0'=>['region.id','desc'],
            );
            $data['regions'] = $this->Campgrounds->find("region",'','','',1,'','','',$ordeBy);

            $ordeBy= array(
                '0'=>['childcampground.c_id','desc'],
            );
            $where= array('childcampground.draft' => 0, );
            $data['childcampgrounds'] = $this->Campgrounds->find("childcampground",$where,'','',1,'','','',$ordeBy);


            $ordeBy1= array(
                '0'=>['parameter_view.order_by','asc'],
            );
            $data['views'] = $this->Campgrounds->find("parameter_view",'','','',1,'','','',$ordeBy1);

            $ordeBy1= array(
                '0'=>['parameter_grade.order_by','asc'],
            );
            $data['grades'] = $this->Campgrounds->find("parameter_grade",'','','',1,'','','',$ordeBy1);

            $ordeBy1= array(
                '0'=>['parameter_acess.order_by','asc'],
            );
            $data['access'] = $this->Campgrounds->find("parameter_acess",'','','',1,'','','',$ordeBy1);

            $ordeBy1= array(
                '0'=>['parameter_base.order_by','asc'],
            );
            $data['bases'] = $this->Campgrounds->find("parameter_base",'','','',1,'','','',$ordeBy1);

            $water =  $this->db->query("Select * from parameter_water where water_name !='No' || water_name !='no' order by order_by asc" );
//            print_r($water);
            $data['waters'] = $water->result();
            $sewer =  $this->db->query("Select * from parameter_sewer where sewer_name !='No' || sewer_name !='no' order by order_by asc" );
            //            print_r($water);
            $data['sewers'] = $sewer->result();

            $ordeBy11= array(
                '0'=>['parameter_shade.order_by','asc'],
            );
            $data['parameter_shades'] = $this->Campgrounds->find("parameter_shade",'','','',1,'','','',$ordeBy11);

            $ordeBy14= array(
                '0'=>['parameter_table.order_by','asc'],
            );

            $data['parameter_tables'] = $this->Campgrounds->find("parameter_table",'','','',1,'','','',$ordeBy14);

            $ordeBy8= array(
                '0'=>['parameter_water.order_by','asc'],
            );
            $data['parameter_waters'] = $this->Campgrounds->find("parameter_water",'','','',1,'','','',$ordeBy8);

            $ordeBy9= array(
                '0'=>['parameter_sewer.order_by','asc'],
            );
            $data['parameter_sewers'] = $this->Campgrounds->find("parameter_sewer",'','','',1,'','','',$ordeBy9);

            $ordeBy2= array(
                '0'=>['parameter_camping.order_by','asc'],
            );
            $data['campings'] = $this->Campgrounds->find("parameter_camping",'','','',1,'','','',$ordeBy2);

            $ordeBy7= array(
                '0'=>['parameter_amp.order_by','asc'],
            );
            $data['parameter_amps'] = $this->Campgrounds->find("parameter_amp",'','','',1,'','','',$ordeBy7);

            $data['yield']="home/toprated-campsites";
            $data['title']="Top Campsites";
    		// die('inside function');

            $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('login'));
        }
    }





  public function showFavCampsite($value='')
  {

  	// $this->Campgrounds->checkSubscriptionExp();
  	if (isset($this->userId)) 
			{
                $ordeBy1= array(
                    '0'=>['parameter_view.order_by','asc'],
                );
                $data['views'] = $this->Campgrounds->find("parameter_view",'','','',1,'','','',$ordeBy1);

                $ordeBy1= array(
                    '0'=>['parameter_grade.order_by','asc'],
                );
                $data['grades'] = $this->Campgrounds->find("parameter_grade",'','','',1,'','','',$ordeBy1);

                $ordeBy1= array(
                    '0'=>['parameter_acess.order_by','asc'],
                );
                $data['access'] = $this->Campgrounds->find("parameter_acess",'','','',1,'','','',$ordeBy1);

                $ordeBy1= array(
                    '0'=>['parameter_base.order_by','asc'],
                );
                $data['bases'] = $this->Campgrounds->find("parameter_base",'','','',1,'','','',$ordeBy1);

                $water =  $this->db->query("Select * from parameter_water where water_name !='No' || water_name !='no' order by order_by asc" );
//            print_r($water);
        $data['waters'] = $water->result();
        $sewer =  $this->db->query("Select * from parameter_sewer where sewer_name !='No' || sewer_name !='no' order by order_by asc" );
        //            print_r($water);
        $data['sewers'] = $sewer->result();

        $ordeBy11= array(
            '0'=>['parameter_shade.order_by','asc'],
        );
        $data['parameter_shades'] = $this->Campgrounds->find("parameter_shade",'','','',1,'','','',$ordeBy11);

        $ordeBy14= array(
            '0'=>['parameter_table.order_by','asc'],
        );

        $data['parameter_tables'] = $this->Campgrounds->find("parameter_table",'','','',1,'','','',$ordeBy14);

        $ordeBy2= array(
            '0'=>['parameter_camping.order_by','asc'],
        );
        $data['campings'] = $this->Campgrounds->find("parameter_camping",'','','',1,'','','',$ordeBy2);

        $ordeBy7= array(
            '0'=>['parameter_amp.order_by','asc'],
        );
        $data['parameter_amps'] = $this->Campgrounds->find("parameter_amp",'','','',1,'','','',$ordeBy7);
		             $data['yield']="home/login/favorite";
					  $data['title']="Colorado Campground|Favorite Campsites";

					$this->load->view($this->layout,$data);
						}
			else
			{
				redirect(base_url('login'));
			}
  }

  public function paginationForFavCampsite($value='')
  {
    $post=$this->input->post();
    // print_r($post['e_id']);return;
    if($post['current']==1)
    {
      $start=0;
    }else{
      $start=($post['current']-1)*$post['length'];
    }


    $e_id=$post['e_id'];

    $where = array('0'=>['sitedescription.live' => 1],'1'=>['favorite.subscriber_id'=>$this->userId]);
    //join for sql
     $join= array('0'=>['parameter_spacing','sitedescription.spacing = parameter_spacing.sp_id','left'],
                '1'=>['parameter_trailer','sitedescription.lengthTrailer = parameter_trailer.trailer_id','left'],
                '2'=>['parameter_grade','sitedescription.grade = parameter_grade.grade_id','left'],
                '3'=>['parameter_base','sitedescription.base = parameter_base.base_id','left'],
                '4'=>['parameter_water','sitedescription.water = parameter_water.water_id','left'],
                '5'=>['parameter_sewer','sitedescription.sewer = parameter_sewer.sewer_id','left'],
                '6'=>['parameter_verizon','sitedescription.verizon = parameter_verizon.verizon_id','left'],
                '7'=>['parameter_shade','sitedescription.shadeType = parameter_shade.shade_id','left'],
                '8'=>['parameter_view','sitedescription.viewType = parameter_view.view_id','left'],
                // '9'=>['parameter_camping','sitedescription.campType = parameter_camping.camping_id','left'],
                '9'=>['parameter_acess','sitedescription.acess = parameter_acess.acess_id','left'],
                '10'=>['parameter_amp','sitedescription.amps = parameter_amp.amp_id','left'],
                '11'=>['sitedescription_pics','sitedescription.siteId = sitedescription_pics.sitedescription_id','left'],
                '12'=>['parameter_wifi','sitedescription.wifi = parameter_wifi.wifi_id','left'],
                '13'=>['parameter_cable','sitedescription.cableTv = parameter_cable.cable_id','left'],
                '14'=>['favorite','sitedescription.siteId = favorite.campsite_id','inner'],
                '15'=>['parentcampground','sitedescription.p_id = parentcampground.p_id','inner'],
                '16'=>['childcampground','sitedescription.childId = childcampground.c_id','left'],
            );
 $select = "sitedescription.*, childcampground.c_name as c_name , parentcampground.name as p_name , parameter_spacing.sp_name as sp_name,  parameter_spacing.sp_image as sp_image,  parameter_trailer.trailer_name as trailer_name, parameter_trailer.trailer_image as trailer_image,  parameter_grade.grade_name as grade_name, parameter_grade.grade_image as grade_image, parameter_base.base_name as base_name, parameter_base.base_image as base_image,  parameter_water.water_name as water_name, parameter_water.water_image as water_image, parameter_sewer.sewer_name as sewer_name, parameter_verizon.verizon_name as verizon_name, parameter_verizon.verizon_image as verizon_image, parameter_shade.shade_name as shade_name , parameter_shade.shade_image as shade_image , parameter_view.view_name as view_name, parameter_view.view_image as view_image, parameter_acess.acess_name as acess_name, parameter_acess.acess_image as acess_image,parameter_wifi.wifi_name as wifi_name, parameter_wifi.wifi_image as wifi_image,parameter_cable.cable_name as cable_name, parameter_cable.cable_image as cable_image, parameter_amp.amp_name as amp_name,parameter_amp.amp_image as amp_image,sitedescription_pics.sitePic";

   // group by for count grouping
    $group_by=array('0'=>['sitedescription.siteId']);

    $ordeByComs= array('0'=>['parentcampground.name','asc'],
                          '1'=>['childcampground.c_name','asc'],
                          '2'=>['sitedescription.site_no','asc'],
                   );
     //findNumRowsForaboveCode function get num of rows (general function) from database
    $total=$this->Campgrounds->findNumRowsForaboveCode("sitedescription",$where,$join);
     $returnData = $this->Campgrounds->findSearchIssue("sitedescription",$where,$start,$post['length'],"1",$join,"",$select,$ordeByComs,$group_by);

     $ordeBy1= array('0'=>['order_by','asc'],
                   );
     $campings = $this->Campgrounds->find("parameter_camping",'','','',1,'','','',$ordeBy1);
     $fvWhere=array('subscriber_id' => $this->userId);

     	$favorite = $this->Campgrounds->find("favorite",$fvWhere,'','',1);
  
     
      // print_r($favorite);return;

     // $sitedescription_pics = $this->Campgrounds->find("sitedescription_pics",'','','',1);
      $sitedescription_pics=[];
     foreach ($returnData as $value) {

       $where1 = array('sitedescription_id =' => $value->siteId );
           $sitedescription_pics[$value->siteId] = $this->Campgrounds->find_rows_data("sitedescription_pics",$where1);
         
			           }
			             // print_r($sitedescription_pics);return;
          // $data['site_pics']= $sitedescription_pics;  

         $views = $this->Campgrounds->find("parameter_view",'','','',1);
          $waters = $this->Campgrounds->find("parameter_water",'','','',1);
            $sewers = $this->Campgrounds->find("parameter_sewer",'','','',1);
             $tables = $this->Campgrounds->find("parameter_table",'','','',1);
              $amps = $this->Campgrounds->find("parameter_amp",'','','',1);
     // print_r($total);return;
          // print_r($returnData);
          $arrayName = array('total' => $total,'sitedescription'=>$returnData, 'campings'=>$campings, 'sitedescription_pics'=>$sitedescription_pics, 'views'=>$views ,'waters'=>$waters,'sewers'=>$sewers,'tables'=>$tables,'amps'=>$amps,'favorite'=>$favorite );
    echo json_encode($arrayName);
  }

//campsite pagination

  public function campssite_pagination($value='')
  {
    $post=$this->input->post();

    if($post['current']==1)
    {
      $start=0;
    }else{
      $start=($post['current']-1)*$post['length'];
    }
    // print_r($post['searchCamp']);return;
    $e_id=$post['e_id'];
// OR sitedescription.childId = 81
   
    	$where ="sitedescription.live=1 AND parentcampground.live=1 AND childcampground.c_live=1 ";

    	 if($post['region_fav'] != "")
    {
    	if($post['region_fav'] == 10)
    	{
    		$where="sitedescription.favourite = 1 AND parentcampground.regionId IN (1,2,3,4,5,6,7,8,9)";
    	}else{
    		// $where.=" AND sitedescription.favourite = 1 AND parentcampground.regionId =".$post['region_fav']."";
    	$where="sitedescription.favourite = 1 AND parentcampground.regionId =".$post['region_fav']."";
    	}
    	
    }else{

    // 	  if(!empty($post['typeView']))
    // {
    // 	$view0=$post['typeView'];
    // 	$view1=$post['typeView'].'@@';
    // 	$view2='@@'.$post['typeView'];
    // 	$view3='@@'.$post['typeView'].'@@';
    // 	 $where.=" AND  ( sitedescription.viewType LIKE '".$view0."%' OR sitedescription.viewType LIKE  '".$view1."%' OR sitedescription.viewType LIKE '%".$view2."' OR sitedescription.viewType LIKE '%".$view3."%' ) ";
    // }
    // if(!empty($post['parentCampground'])){
    // 	$where.=" AND sitedescription.p_id='".$post['parentCampground']."'";
    // 	//print_r($where);exit;
    // }
    //  if(!empty($post['childCampground'])){
    // 	$where.=" AND sitedescription.childId='".$post['childCampground']."'";
    // 	//print_r($where);exit;
    // }
    //  if(!empty($post['searchCamp'])){
    // 	$where.=" AND sitedescription.childId='".$post['searchCamp']."'";
    // 	//print_r($where);exit;
    // }
     if(!empty($post['campingSearch']))
    {
    	$view0=$post['campingSearch'];
    	$view1=$post['campingSearch'].'@@';
    	$view2='@@'.$post['campingSearch'];
    	$view3='@@'.$post['campingSearch'].'@@';
    	 $where.=" AND  ( sitedescription.campType LIKE  '".$view0."%' OR sitedescription.campType LIKE '".$view1."%' OR sitedescription.campType LIKE '%".$view2."' OR sitedescription.campType LIKE '%".$view3."%' ) ";
    }
    if(!empty($post['searchElectricity']) && $post['searchElectricity']!='No'){
    	$where.=" AND sitedescription.electric='".$post['searchElectricity']."'";
    	//print_r($where);exit;
    }
      if(!empty($post['WaterSupply']))
    {

    	// $view0=$post['WaterSupply'];
    	// $view1=$post['WaterSupply'].'@@';
    	// $view2='@@'.$post['WaterSupply'];
    	// $view3='@@'.$post['WaterSupply'].'@@';
    	//  $where.=" AND  ( sitedescription.water LIKE  '".$view0."%' OR sitedescription.water LIKE '".$view1."%' OR sitedescription.water LIKE '%".$view2."' OR sitedescription.water LIKE '%".$view3."%' ) ";

    	 $view0=$post['WaterSupply'];

    	 if(!empty($post['WaterSupplyHtml']) && $post['WaterSupplyHtml']!='No'){
    	 	if($view0==5 || $view0==6)
    	 	{
    	 		$where.=" AND  ( sitedescription.water LIKE  6  OR sitedescription.water LIKE  5 ) ";
    	 	}else{
    	 		$where.=" AND  ( sitedescription.water LIKE  ".$view0." ) ";
    		}
    	}
    }
      if(!empty($post['sewerSupply']))
    {
    	 $view0=$post['sewerSupply'];
    	 if(!empty($post['sewerSupplyHtml']) && $post['sewerSupplyHtml']!='No'){
    	 $where.=" AND  ( sitedescription.sewer LIKE  ".$view0." ) ";
    	}
    }
    if(!empty($post['campsiteLength'])){

    	$where.=" AND sitedescription.lengthTrailer >= ".$post['campsiteLength']."";
    }
    if(!empty($post['restroom'])){
    	$where.=" AND sitedescription.yardToilet <=".$post['restroom']."";
    	//print_r($where);exit;
    }

     if(!empty($post['regionSearch'])){
    	$where.=" AND parentcampground.regionId =".$post['regionSearch']."";
    	//print_r($where);exit;
    }

   

   if($post['parentCampground_fav'] != ""){
    	$where.=" AND sitedescription.p_id='".$post['parentCampground_fav']."'";
    	//print_r($where);exit;
    }

    if($post['childCampground_fav'] != ""){
    	$where.=" AND sitedescription.childId='".$post['childCampground_fav']."'";
    	//print_r($where);exit;
    }


    if(!empty($post['accessible'])){

    	if($post['accessible'] == "yes")
    	{
    		 // $where.=" AND  ( sitedescription.s_table LIKE  '".$view0."%' OR sitedescription.s_table LIKE '".$view1."%' OR sitedescription.s_table LIKE '%".$view2."' OR sitedescription.s_table LIKE '%".$view3."%' ) ";

    		$where.=" AND sitedescription.s_table like '%12%' ";
    	}
//        else{
//    		$where.=" AND sitedescription.s_table NOT LIKE '%12%' ";
//    	}
    		
    }
    }

     $join= array('0'=>['parameter_spacing','sitedescription.spacing = parameter_spacing.sp_id','left'],
                '1'=>['parameter_trailer','sitedescription.lengthTrailer = parameter_trailer.trailer_id','left'],
                '2'=>['parameter_grade','sitedescription.grade = parameter_grade.grade_id','left'],
                '3'=>['parameter_base','sitedescription.base = parameter_base.base_id','left'],
                '4'=>['parameter_water','sitedescription.water = parameter_water.water_id','left'],
                '5'=>['parameter_sewer','sitedescription.sewer = parameter_sewer.sewer_id','left'],
                '6'=>['parameter_verizon','sitedescription.verizon = parameter_verizon.verizon_id','left'],
                '7'=>['parameter_shade','sitedescription.shadeType = parameter_shade.shade_id','left'],
                '8'=>['parameter_view','sitedescription.viewType = parameter_view.view_id','left'],
                // '9'=>['parameter_camping','sitedescription.campType = parameter_camping.camping_id','left'],
                '9'=>['parameter_acess','sitedescription.acess = parameter_acess.acess_id','left'],
                '10'=>['parameter_amp','sitedescription.amps = parameter_amp.amp_id','left'],
                '11'=>['sitedescription_pics','sitedescription.siteId = sitedescription_pics.sitedescription_id','left'],
                '12'=>['parameter_wifi','sitedescription.wifi = parameter_wifi.wifi_id','left'],
                '13'=>['parameter_cable','sitedescription.cableTv = parameter_cable.cable_id','left'],
                '14'=>['parentcampground','sitedescription.p_id = parentcampground.p_id','inner'],
                '15'=>['childcampground','sitedescription.childId = childcampground.c_id','left'],
            );
 $select = "sitedescription.*, parameter_spacing.sp_name as sp_name,  parameter_spacing.sp_image as sp_image,  parameter_trailer.trailer_name as trailer_name, parameter_trailer.trailer_image as trailer_image,  parameter_grade.grade_name as grade_name, parameter_grade.grade_image as grade_image, parameter_base.base_name as base_name, parameter_base.base_image as base_image,  parameter_water.water_name as water_name, parameter_water.water_image as water_image, parameter_sewer.sewer_name as sewer_name, parameter_verizon.verizon_name as verizon_name, parameter_verizon.verizon_image as verizon_image, parameter_shade.shade_name as shade_name , parameter_shade.shade_image as shade_image , parameter_view.view_name as view_name, parameter_view.view_image as view_image, parameter_acess.acess_name as acess_name, parameter_acess.acess_image as acess_image,parameter_wifi.wifi_name as wifi_name, parameter_wifi.wifi_image as wifi_image,parameter_cable.cable_name as cable_name, parameter_cable.cable_image as cable_image, parameter_amp.amp_name as amp_name,parameter_amp.amp_image as amp_image,sitedescription_pics.sitePic,parentcampground.name as pcName,childcampground.c_name as CcName";


   // group by for count grouping
    $group_by=array('0'=>['sitedescription.siteId']);

    $ordeByComs= array('0'=>['parentcampground.name','asc'],
                          '1'=>['childcampground.c_name','asc'],
                          '2'=>['sitedescription.site_no','asc'],
                   );

     //findNumRowsForaboveCode function get num of rows (general function) from database
    $total=$this->Campgrounds->findNumRowsForaboveCodeCampsite123("sitedescription",$where,$start,$post['length'],"1",$join,"",$select,"",$group_by);
     $returnData = $this->Campgrounds->findSearchIssueCampingsite("sitedescription",$where,$start,$post['length'],"1",$join,"",$select,$ordeByComs,$group_by);

     $ordeBy1= array('0'=>['order_by','asc'],
                   );
     $campings = $this->Campgrounds->find("parameter_camping",'','','',1,'','','',$ordeBy1);
     $fvWhere=array('subscriber_id' => $this->userId);
      $favorite = $this->Campgrounds->find("favorite",$fvWhere,'','',1);
      // print_r($favorite);return;
      $sitedescription_pics[]=array();
      //$sitedescription_pics = $this->Campgrounds->find("sitedescription_pics",'','','',1);
      
     foreach ($returnData as $value) {
       $where1 = array('sitedescription_id =' => $value->siteId);
            $sitedescription_pics[$value->siteId] = $this->Campgrounds->find_rows_data("sitedescription_pics",$where1);
         
			           }
			             // print_r($sitedescription_pics);return;
          // $data['site_pics']= $sitedescription_pics;  

         $views = $this->Campgrounds->find("parameter_view",'','','',1);
          $waters = $this->Campgrounds->find("parameter_water",'','','',1);
            $sewers = $this->Campgrounds->find("parameter_sewer",'','','',1);
             $tables = $this->Campgrounds->find("parameter_table",'','','',1);
              $amps = $this->Campgrounds->find("parameter_amp",'','','',1);
     // print_r($total);return;
          // print_r($returnData);
          $free_trial = $this->session->userdata['userdata']['free_trial'];    
          $arrayName = array('total' => $total,'sitedescription'=>$returnData, 'campings'=>$campings, 'sitedescription_pics'=>$sitedescription_pics, 'views'=>$views ,'waters'=>$waters,'sewers'=>$sewers,'tables'=>$tables,'amps'=>$amps,'favorite'=>$favorite ,'where'=>$where , 'free_trial' => $free_trial);
    	echo json_encode($arrayName);
  }





  public function ajaxRequestCOmmentEdit()
   {

   		$approve = ($this->input->post('email_blog') == "admin@colorado.com") ? 1:0 ;

       $data = array(
         'id' => $this->input->post('comment_id'),
        'comment' => $this->input->post('comment'),
        'comments_approved'=>$approve
        );

      $where = array('id' => $this->input->post('comment_id'));
      // $id=$this->db->insert('replys', $data);
      $id= $this->Campgrounds->update_data('comment','','comments',$data,$where);
      
      // print_r($id);
      	echo $id;
      // echo 'Added successfully.';  
   }
  public function ajaxRequestCOmmentEditAdmin()
   {
       $data = array(
            'id' => $this->input->post('comment_id'),
        'comment' => $this->input->post('comment'),
        
        );
      $where = array('id' => $this->input->post('comment_id'));
      // $id=$this->db->insert('replys', $data);
      $id= $this->Campgrounds->update_data('comment','','comments',$data,$where);
      
      // print_r($id);
      	echo $id;
      // echo 'Added successfully.';  
   }

   public function ajaxRequestCOmmentReplyEditAdmin()
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
   public function ajaxRequestCOmmentReplyEdit()
   {


   	$approve = ($this->input->post('email_blog') == "admin@colorado.com") ? 1:0 ;

   	$data=$this->input->post();
   //	print_r($data);exit;
       $data = array(
            'id' => $this->input->post('reply_id'),
        'comment_reply' => $this->input->post('comment'),
        'reply_approved'=>$approve,
        );
      $where = array('id' => $this->input->post('reply_id'));
      // $id=$this->db->insert('replys', $data);
      $id= $this->Campgrounds->update_data('comment_reply','','replys',$data,$where);
      
      // print_r($id);
      	echo $id;
      // echo 'Added successfully.';  
   }

  public function favorite($value='')
  {
  	$data=$this->input->post();
  if (isset($this->userId)) {
if($data['fav']=='like'){

		$where = array('campsite_id ' => $data['id'],'subscriber_id'=>$this->userId);
        $campsitelike=$this->Campgrounds->find('favorite',$where);
        if(empty($campsitelike)){
	$insert_data=array(
					'campsite_id'=>$data['id'],
					'subscriber_id'=>$this->userId,
					);

  	$this->Campgrounds->insert('favorite',$insert_data);
  	echo 1; // successfully added in the fv8 list.
  }else{
  	echo 2;// already added in the like list
  }
  }else{

  	$where = array('campsite_id ' => $data['id'],'subscriber_id'=>$this->userId);
        $campsitelike=$this->Campgrounds->find('favorite',$where);
        if(!empty($campsitelike)){
        	$this->Campgrounds->delete('','','favorite',$where);
        	echo 3; // successfully deleted
        }else{
        	echo 4; // not available in the like list.
        }
  	//in case of dislike
  }
  }else{
  	echo 0;
  }
  	# code...
  }

  // list of parent campground that are active and publish ... jin ka live 1 ho and draft zero ho.

  public function parentCampGroundList($value='')
  {
  		$data=$this->input->post();
  		//print_r($data);exit;
  	 	$where = array('regionId' => $data['id'],'live'=>1,'draft'=>0);
        $campsitelike=$this->Campgrounds->find('parentcampground',$where);
        print_r($campsitelike);exit;
        echo json_encode($campsitelike);
        	// print_r($campsitelike);

  }

  public function parentCampGroundListSearch($value='')
  {
  		$data=$this->input->post();
  		//print_r($data);exit;
  	 	$where = array('regionId' => $data['id'],'live'=>1,'draft'=>0);
        $campsitelike=$this->Campgrounds->find('parentcampground',$where,'','',1);
        //print_r($campsitelike);exit;
        echo json_encode($campsitelike);
        	// print_r($campsitelike);

  }
  public function childCampGroundListSearch($value='')
  {
  		$data=$this->input->post();
  		//print_r($data);exit;
  	 	$where = array('parentId' => $data['id'],'c_live'=>1,'draft'=>0);
        $campsitelike=$this->Campgrounds->find('childcampground',$where,'','',1);
        //print_r($campsitelike);exit;
        echo json_encode($campsitelike);
        	// print_r($campsitelike);

  }
  public function PaymentPagination($value='')
    {
        # code...
if (isset($this->userId)){
         // $join= array('0'=>['subscribe','subscribe.id = payments.custom','inner']);
            // '1'=>['childcampground','sitedescription.childId = childcampground.c_id','left'],
            // '2'=>['region','parentcampground.regionId = region.id','left']);
        $select = "*";
            $start=$_REQUEST['start'];
        $end=$_REQUEST['length'];
      $where = array('payments.custom' => $this->userId );
      $like='';
        if(!empty($_REQUEST['search']['value']))
        {
            // print_r('searcj');
            $like=array('payments.payment_gross' => $_REQUEST['search']['value']);
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
        $payments=$this->Campgrounds->find('payments',$where,$start,$end,1,'',$like,$select,$ordeBy);       
        $totaldata =$this->Campgrounds->find_rows_data('payments',$where);  
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
            'currency'=>$payment->payment_gross.' '.$payment->currency_code,
             'txn'=>$payment->txn_id,
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
    }else{
    	redirect(base_url());
    }
    }
public function errorpage($value='')
{
		$data['title']='Error ';
		$data['yield']='home/error';
		$this->load->view($this->layout,$data);
}




public function cancelSubscription( $subs_id = null )
{
		

	// die(var_dump($this->session->userdata['userdata']));

	$where = array('subscription_id' => $subs_id);
       		   $susbcriber=$this->Campgrounds->find('subscribe',$where,'','','','','',''); 

       		   // if($this->session->userdata['userdata']['free_trial'] == 1){
       		   // 	redirect(base_url('/'));
       		   // }
       		   // $this->transactionalEmail( $susbcriber ) ;

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
 	
 	 $data = array('subscription_id' =>null );
                $where1 = array('subscription_id' =>$subs_id );

               $this->Campgrounds->update_data("","",'subscribe', $data,$where1);

		    	redirect(base_url('/'));
}


  //logout function
public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}




//transectional email
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
        'subject' => 'Subscription Cancellation',
        'from_email' => 'admin@coloradocampgrounds.development-env.com',
        'from_name'=> 'Colorado Campgrounds',
        'to' => array(array('email' => $user->email, 'name' => 'colorado') ),
        );

    $template_name = 'Subscription Cancellation';

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



}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class  SiteDescriptionController extends CI_Controller {



  /**

   * Index Page for this controller.

   *

   * Maps to the following URL

   *    http://example.com/index.php/welcome

   *  - or -

   *    http://example.com/index.php/welcome/index

   *  - or -

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

      $this->load->library('upload');

    if(isset($this->session->userdata['admindata']))

    {

      $this->adminId = $this->session->userdata['admindata']['adminId'];

    }

    else

        {

            redirect(base_url('admin/login'));

        }



  }



  public function add_site_description()

  { 

    if(isset($this->adminId))

    {

        $data['regions'] = $this->Campgrounds->find("region",'','','',1);

        $ordeBy= array('0'=>['order','asc'],

                   );

        $data['spacings'] = $this->Campgrounds->find("parameter_spacing",'','','',1,'','','',$ordeBy); 

        $ordeBy1= array('0'=>['order_by','asc'],

                   );

        $data['views'] = $this->Campgrounds->find("parameter_view",'','','',1,'','','',$ordeBy1); 

        $data['campings'] = $this->Campgrounds->find("parameter_camping",'','','',1,'','','',$ordeBy1);

        $data['parameter_trailers'] = $this->Campgrounds->find("parameter_trailer",'','','',1,'','','',$ordeBy1);  

        $data['parameter_grades'] = $this->Campgrounds->find("parameter_grade",'','','',1,'','','',$ordeBy1); 

        $data['parameter_bases'] = $this->Campgrounds->find("parameter_base",'','','',1,'','','',$ordeBy1);

        $data['parameter_acess'] = $this->Campgrounds->find("parameter_acess",'','','',1,'','','',$ordeBy1);

        $data['parameter_amps'] = $this->Campgrounds->find("parameter_amp",'','','',1,'','','',$ordeBy1); 

        $data['parameter_waters'] = $this->Campgrounds->find("parameter_water",'','','',1,'','','',$ordeBy1); 

        $data['parameter_sewers'] = $this->Campgrounds->find("parameter_sewer",'','','',1,'','','',$ordeBy1);

        $data['parameter_verizons'] = $this->Campgrounds->find("parameter_verizon",'','','',1,'','','',$ordeBy1);

        $data['parameter_shades'] = $this->Campgrounds->find("parameter_shade",'','','',1,'','','',$ordeBy1);

         $data['parameter_wifis'] = $this->Campgrounds->find("parameter_wifi",'','','',1,'','','',$ordeBy1);

           $data['parameter_cables'] = $this->Campgrounds->find("parameter_cable",'','','',1,'','','',$ordeBy1);

            $data['parameter_tables'] = $this->Campgrounds->find("parameter_table",'','','',1,'','','',$ordeBy1);

             // $where = array('parentId' => $data['id'] );

            $data['parentCampground'] = $this->Campgrounds->find("parentcampground",'','','',1);

            // print_r($childcampground);return;



    $data['title']='Add Site Description';

    $data['yield']='admin/pages/siteDescription/add-site-description.php';

    $this->load->view($this->layout,$data);

    }

    else

    {

      redirect(base_url('admin/login'));

    }

  

  }

 

  public function validate_member_site($site ="", $parent="" , $child="") {





              $select = "*" ;

              $where = "site_no =".$site." AND p_id=".$parent." AND childId =".$child."" ;

              $exist = $this->Campgrounds->find("sitedescription",$where,'','',1,'','',$select,'','');



                 if(isset($exist) && !empty($exist)) {



                    // $this->form_validation->set_message('validate_member_site', 'SITE NO FIELD SHOULD BE UNIQUE FOR PARENT AND CHILD CAMPGROUND');



                    return false;

                 }else{



                  return true;

                 }



            }







  public function new_siteDescription()

  {

        // print_r('hello');return;

    if(isset($this->adminId))

    {

              // print_r('expression');return;

      $data = $this->input->post();

  





          // print_r($data['changes']);return;

          if($data['changes']!=1){ // if value is 1 it means draft button click hwa ha ... 

      $validation = array(

        // array(

        //         'field' => 'color',

        //         'label' => 'Color',

        //         'rules' => 'required'

        // ),

        array(

                'field' => 'siteno',

                'label' => 'Site No',

                'rules' => 'required'

        ),

      

         array(

                'field' => 'parentcom',

                'label' => 'Parent',

                'rules' => 'required'

        ),



      



           array(

                'field' => 'spacing',

                'label' => 'Spacing',

                'rules' => 'required'

        ),

           array(

                'field' => 'view[]',

                'label' => 'View',

                'rules' => 'required'

        ),

            array(

                'field' => 'camping[]',

                'label' => 'Camping',

                'rules' => 'required'

        ),

            array(

                'field' => 'guests',

                'label' => 'Guests',

                'rules' => 'required'

        ),

            array(

                'field' => 'vehicles',

                'label' => 'Vehicles',

                'rules' => 'required'

        ), 

             array(

                'field' => 'pets',

                'label' => 'Pets',

                'rules' => 'required'

        ),

              array(

                'field' => 'trailer',

                'label' => 'Trailer',

                'rules' => 'required'

        ),

               array(

                'field' => 'grade',

                'label' => 'Grade',

                'rules' => 'required'

        ),

               array(

                'field' => 'base',

                'label' => 'Base',

                'rules' => 'required'

        ),

                array(

                'field' => 'access[]',

                'label' => 'Access',

                'rules' => 'required'

        ),

                array(

                'field' => 'electric',

                'label' => 'Electric',

                'rules' => 'required'

        ),

        //         array(

        //         'field' => 'amps[]',

        //         'label' => 'Amps',

        //         'rules' => 'required'

        // ),

                array(

                'field' => 'water[]',

                'label' => 'Water',

                'rules' => 'required'

        ),

                array(

                'field' => 'sewer[]',

                'label' => 'Sewer',

                'rules' => 'required'

        ),

                array(

                'field' => 'wifi',

                'label' => 'Wifi',

                'rules' => 'required'

        ),

                array(

                'field' => 'tv',

                'label' => 'TV',

                'rules' => 'required'

        ),

                array(

                'field' => 'verizon',

                'label' => 'Service Provider',

                'rules' => 'required'

        ),

                array(

                'field' => 'shade',

                'label' => 'Shade',

                'rules' => 'required'

        ),

        //          array(

        //         'field' => 'shelter',

        //         'label' => 'Shelter',

        //         'rules' => 'required'

        // ),

                array(

                'field' => 'table[]',

                'label' => 'Table',

                'rules' => 'required'

        ),

        //         array(

        //         'field' => 'firering',

        //         'label' => 'Fire ring',

        //         'rules' => 'required'

        // ),



        //         array(

        //         'field' => 'fireringgrill',

        //         'label' => 'Fire-Ring/Grill',

        //         'rules' => 'required'

        // ),     

        //         array(

        //         'field' => 'sgrill',

        //         'label' => 'Separate Grill',

        //         'rules' => 'required'

        // ),

                 array(

                'field' => 'toilet',

                'label' => 'Toilet',

                'rules' => 'required'

        ),

                array(

                'field' => 'ywater',

                'label' => 'Yards to Water',

                'rules' => 'required'

        ),

                array(

                'field' => 'ytrash',

                'label' => 'Yards to Trash',

                'rules' => 'required'

        ),





    );





       $error_no= $this->validate_member_site($data['siteno'],$data['parentcom'],$data['childcom']);



        $this->form_validation->set_rules($validation);

        if ($this->form_validation->run() == FALSE || $error_no==false)

                {

                    $ins =$this->form_validation->error_array();

                    // print_r($ins);return;

                    // $data=$this->input->post();

                    if(!$error_no){

                    $this->session->set_flashdata('error_no', 'SITE NO FIELD SHOULD BE UNIQUE FOR PARENT AND CHILD CAMPGROUND');

                  }

                    $this->session->set_flashdata('error', $ins);

                    $this->session->set_flashdata('data',$data);

                    redirect(base_url('admin/add-site-description'));

                // $this->add_site_description();

                }

                else

                {

                        // $slug = $this->db->query("SELECT * FROM `sitedescription` WHERE slug= '".$data['slug']."' &&  slug!=''")->result_array();         

                        //     if (!empty($slug))

                        //     {

                        //         $this->session->set_flashdata('error1','Please enter a unique slug');

                        //         $this->session->set_flashdata('data',$data);

                        // // $this->session->set_flashdata('data',$data);

                        //             redirect($_SERVER['HTTP_REFERER']);                 

                        //     }

                            

                     // $config['upload_path'] = './uploads/SiteDescription/';

                     // $config['allowed_types'] = 'jpg|png';

                     // $config['encrpy_name']  = 100;

                     // $config['file_name'] = date("Y_m_d H_i_s");

                     // $this->load->library('upload', $config);

                     //    if ( ! $this->upload->do_upload('img'))

                     //    { 

                     //        $img='';

                     //    }

                     //    else

                     //    {   $file_data  =  $this->upload->data();

                     //        $img  = $file_data['file_name'];

                     //    }

                // $view = implode('@@', $data['view']);

                  //amps



                 

                     if(isset($data['amps'])){

                $amps = implode('@@', $data['amps']);

                   }else{

                     $amps = '';

                }

                   //for table

                   if(isset($data['table'])){

                $table = implode('@@', $data['table']);

                   }else{

                     $table = '';

                }

                  //for sewer

                   if(isset($data['sewer'])){

                $sewer = implode('@@', $data['sewer']);

                   }else{

                     $sewer = '';

                }

                  //for water

                   if(isset($data['water'])){

                $water = implode('@@', $data['water']);

                   }else{

                     $water = '';

                }

                  //camping

                   if(isset($data['camping'])){

                $comping = implode('@@', $data['camping']);

                   }else{

                     $comping = '';

                }

                //for view

                 if(isset($data['view'])){

                 $view = implode('@@', $data['view']);

                  }else{

                     $view = '';

                }

                // $asses = implode('@@', $data['access']);

                // $amp = implode('@@', $data['amps']);

                   if(isset($data['favourite'])){

               $fav=1;

            }else{

                $fav=0;

            }

               if(isset($data['pets']))

            {

                $pet=$data['pets'];

            }else{

                $pet='';

            }

            // print_r($amps);return;

                $insert_data=array('p_id'=>$data['parentcom'],

                    'childId'=>$data['childcom'],

                    // 'name'=>$data['name'],

                    // 'slug'=>$data['slug'],

                    'site_no'=>$data['siteno'],

                    'spacing'=>$data['spacing'],

                    'viewType'=>$view,//--- 

                    // 'sitePic'=> $img,

                    'campType '=> $comping,//---

                    'noGuest'=>$data['guests'],

                    'noVehicle'=>$data['vehicles'],

                    'pets'=>$pet,

                    'lengthTrailer'=>$data['trailer'],

                    'grade '=>$data['grade'],

                    'base'=>$data['base'],

                    'acess'=>$data['access'],//---

                    'electric'=>$data['electric'],

                    'amps '=>$amps,//---

                    'water'=>$water,

                    'sewer'=>$sewer,

                    'wifi'=>$data['wifi'],

                    'cableTv '=>$data['tv'],

                    'verizon'=>$data['verizon'], // it will work like for service provider

                    'shadeType'=>$data['shade'],

                    // 's_shelter'=>$data['shelter'],

                    's_table '=>$table,

                    // 'fireRing'=>$data['firering'],

                    // 'fireRingGril '=>$data['fireringgrill'],

                    // 'sGrill'=>$data['sgrill'],

                    'yardToilet'=>$data['toilet'],

                    'yardWater'=>$data['ywater'],

                    'yardTrash '=>$data['ytrash'],

                    'coverage '=>$data['coverage'],

                    'favourite'=>$fav,

                    'live'=>1,

                    'map_link'=>$data['google_map'],

                    'draft'=>1,

                    );



            $store= $this->Campgrounds->insert('sitedescription',$insert_data);

                     if(!empty($store)){ 

                                     //insert function insert data in database  

                                        // $this->db->insert('user', $data);

                                        $insert_id = $this->db->insert_id();

                                       

 

      $data = array();



      // Count total files

      $countfiles = count($_FILES['img']['name']);

 

      // Looping all files

       $filename='';

      for($i=0;$i<$countfiles;$i++){

        

        if(!empty($_FILES['img']['name'][$i])){

               // Define new $_FILES array - $_FILES['file']

          $_FILES['file']['name'] = $_FILES['img']['name'][$i];

          $_FILES['file']['type'] = $_FILES['img']['type'][$i];

          $_FILES['file']['tmp_name'] = $_FILES['img']['tmp_name'][$i];

          $_FILES['file']['error'] = $_FILES['img']['error'][$i];

          $_FILES['file']['size'] = $_FILES['img']['size'][$i];



          // Set preference

          $config['upload_path'] = './uploads/SiteDescription/'; 

          $config['allowed_types'] = 'jpg|jpeg|png|gif';

          $config['max_size'] = '5000'; // max_size in kb

          $config['file_name'] = $_FILES['img']['name'][$i];

 

          //Load upload library

          // $this->load->library('upload',$config); 

           $this->upload->initialize($config);

 

          // File upload

          if($this->upload->do_upload('file')){

            // Get data about the file

            $uploadData = $this->upload->data();

            $filename = $uploadData['file_name'];



            // Initialize array

            $data['filenames'][] = $filename;



             $insertdata = array('sitedescription_id' => $insert_id , 'sitePic' => $filename);

                                        $result=$this->Campgrounds->insert('sitedescription_pics',$insertdata);

          }

          else{

           

            $filename='';

          }

        }

       

      }

 

     

   

 

  

                                       

                                       

                            }else{

                                $this->session->set_flashdata('error', "Something went wrong. kindly fill the form Again.");

                                            redirect($_SERVER['HTTP_REFERER']);

                            }

            $this->session->set_flashdata('success1', 'Site description add successfully');

            redirect($_SERVER['HTTP_REFERER']);



            }



                

    }else{

        //incase if the user click of the draft button

        // 

        // 



           // $config['upload_path'] = './uploads/SiteDescription/';

           //           $config['allowed_types'] = 'jpg|png';

           //           $config['encrpy_name']  = 100;

           //           $config['file_name'] = date("Y_m_d H_i_s");

           //           $this->load->library('upload', $config);

           //      if ( ! $this->upload->do_upload('img'))

           //      { 

           //          $img='';

           //      }

           //      else

           //      {   $file_data  =  $this->upload->data();

           //          $img  = $file_data['file_name'];

           //      }

                // $view = implode('@@', $data['view']);

                // print_r($data['camping']);return;

      //fo amps

       if(isset($data['amps'])){

                $amps = implode('@@', $data['amps']);

                   }else{

                     $amps = '';

                }

      //fo table

       if(isset($data['table'])){

                $table = implode('@@', $data['table']);

                   }else{

                     $table = '';

                }

      //fo sewer

       if(isset($data['sewer'])){

                $sewer = implode('@@', $data['sewer']);

                   }else{

                     $sewer = '';

                }

      //for water

       if(isset($data['water'])){

                $water = implode('@@', $data['water']);

                   }else{

                     $water = '';

                }

                //camp

                if(isset($data['camping'])){

                $comping = implode('@@', $data['camping']);

                }else{

                     $comping = '';

                }

                //for view

                 if(isset($data['view'])){

                $view = implode('@@', $data['view']);

                }else{

                     $view = '';

                }

                // $asses = implode('@@', $data['access']);

                // $amp = implode('@@', $data['amps']);

                if(isset($data['favourite'])){

               $fav=1;

            }else{

                $fav=0;

            }

            if(isset($data['pets']))

            {

                $pet=$data['pets'];

            }else{

                $pet='';

            }

            if(!isset($data['childcom']))

            {

              $childcom=0;

            }else{

              $childcom=$data['childcom'];

            }

          // print_r($data);return;

                $insert_data=array('p_id'=>$data['parentcom'],

                    'childId'=>$childcom,

                    // 'name'=>$data['name'],

                    // 's_color'=>$data['color'],

                    // 's_banner'=>$banner,

                    // 'slug'=>$data['slug'],

                    'site_no'=>$data['siteno'],

                    'spacing'=>$data['spacing'],

                    'viewType'=>$view,//--- 

                    // 'sitePic'=> $img,

                    'campType '=> $comping,//---

                    'noGuest'=>$data['guests'],

                    'noVehicle'=>$data['vehicles'],

                    'pets'=>$pet,

                    'lengthTrailer'=>$data['trailer'],

                    'grade '=>$data['grade'],

                    'base'=>$data['base'],

                    'acess'=>$data['access'],//---

                    'electric'=>$data['electric'],

                    'amps '=>$amps,//---

                    'water'=>$water,

                    'sewer'=>$sewer,

                    'wifi'=>$data['wifi'],

                    'cableTv '=>$data['tv'],

                    'verizon'=>$data['verizon'],

                    'shadeType'=>$data['shade'],

                    // 's_shelter'=>$data['shelter'],

                    's_table '=>$table,

                    // 'fireRing'=>$data['firering'],

                    // 'fireRingGril '=>$data['fireringgrill'],

                    // 'sGrill'=>$data['sgrill'],

                    'yardToilet'=>$data['toilet'],

                    'yardWater'=>$data['ywater'],

                    'yardTrash '=>$data['ytrash'],

                     'coverage '=>$data['coverage'],

                    'favourite'=>$fav,

                    'live'=>0,

                    'draft'=>0,

                    );



            $store=$this->Campgrounds->insert('sitedescription',$insert_data);

                   if(!empty($store)){ 

                                     //insert function insert data in database  

                                        // $this->db->insert('user', $data);

                                        $insert_id = $this->db->insert_id();

                                       

 

      $data = array();



      // Count total files

      $countfiles = count($_FILES['img']['name']);

 // print_r($countfiles);return;

      // Looping all files

      $filename='';

      for($i=0;$i<$countfiles;$i++){

 

        if(!empty($_FILES['img']['name'][$i])){

 

          // Define new $_FILES array - $_FILES['file']

          $_FILES['file']['name'] = $_FILES['img']['name'][$i];

          $_FILES['file']['type'] = $_FILES['img']['type'][$i];

          $_FILES['file']['tmp_name'] = $_FILES['img']['tmp_name'][$i];

          $_FILES['file']['error'] = $_FILES['img']['error'][$i];

          $_FILES['file']['size'] = $_FILES['img']['size'][$i];



          // Set preference

          $config['upload_path'] = './uploads/SiteDescription/'; 

          $config['allowed_types'] = 'jpg|jpeg|png|gif';

          $config['max_size'] = '5000'; // max_size in kb

          $config['file_name'] = $_FILES['img']['name'][$i];

 

          //Load upload library

         $this->upload->initialize($config);

 

          // File upload

          if($this->upload->do_upload('file')){

            // Get data about the file

            $uploadData = $this->upload->data();

            $filename = $uploadData['file_name'];



            // Initialize array

            $data['filenames'][] = $filename;

          }

          else{

            $filename='';

          }

        }

        $insertdata = array('sitedescription_id' => $insert_id , 'sitePic' => $filename);

                                        $result=$this->Campgrounds->insert('sitedescription_pics',$insertdata);

 

      }

 

     

   

 

  

                                        

                                       

                            }else{

                                $this->session->set_flashdata('error', "Something went wrong. kindly fill the form Again.");

                               redirect($_SERVER['HTTP_REFERER']);

                            }

            $this->session->set_flashdata('success1', 'Site description add successfully');





            redirect($_SERVER['HTTP_REFERER']);

    }

    

    }else

    {

      redirect(base_url('admin/login'));

    }

  }







    public function site_description_list()

    {



       if(isset($this->adminId))

        {

             

        $data['regions'] = $this->Campgrounds->find("region",'','','',1,'','','','');



        $data['title']='Site Description Lists';

        $data['yield']='admin/pages/siteDescription/site-description-list.php';





         $data['parentCampground'] = $this->Campgrounds->find("parentcampground",'','','',1,'','','','');

        $this->load->view($this->layout,$data);

        }

        else

        {

            redirect(base_url('admin/login'));

        } 

    }





    public function site_pagenation()

    {

        $join= array('0'=>['parentcampground','sitedescription.p_id = parentcampground.p_id','left'],

            '1'=>['childcampground','sitedescription.childId = childcampground.c_id','left'],

            '2'=>['region','parentcampground.regionId = region.id','left']);

        $select = "sitedescription.* , region.name as r_name , parentcampground.name as p_name, childcampground.c_name as c_name";



        // $groupBy = array('0'=>['parentcampground.p_id'],

        //     '1'=>['childcampground.childId'],

        //     '2'=>['sitedescription.site_no']);



            $start=$_REQUEST['start'];

        $end=$_REQUEST['length'];

        $ma=0;

        $na=0;

        if(!empty($_REQUEST['campsite'])){

            $like=array('sitedescription.site_no' => $_REQUEST['campsite']);

             $ma=1;

        }else{

            $like='';

        }

         

        if(!empty($_REQUEST['extra_search'])){

             if($ma==1){

                $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'parentcampground.name' => $_REQUEST['extra_search']);

                }else{

                  $like=array('parentcampground.name' => $_REQUEST['extra_search']);

                  // print_r('ma=0');

                }



                $na=1;

        }

         if(!empty($_REQUEST['child'])){

             if($ma==1 && $na==0){

                $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'childcampground.c_name' => $_REQUEST['child']);

                }else if($ma==1 && $na==1){

                  $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'childcampground.c_name' => $_REQUEST['child'],'parentcampground.name' => $_REQUEST['extra_search']);

                  // print_r('ma=0');

                }else if($ma==0 && $na==0){

                    $like=array('childcampground.c_name' => $_REQUEST['child']);

                }else if($ma==0 && $na==1)

                {

                    $like=array('childcampground.c_name' => $_REQUEST['child'],'parentcampground.name' => $_REQUEST['extra_search']);

                }

        }

          $ordeBy= array('0'=>['p_name','asc'],

                          '1'=>['c_name','asc'],

                          '2'=>['sitedescription.site_no','asc'],

                   );

        $sire_Descriptions=$this->Campgrounds->find('sitedescription',array('import' => 0),$start,$end,1,$join,$like,$select,$ordeBy);       

        $totaldata =count($this->Campgrounds->find('sitedescription',array('import' => 0),'','',1,$join,$like,$select,$ordeBy));

//        $totaldata =$this->Campgrounds->findNumRowsPagenation('sitedescription',array('import' => 0),$like,$join);



        // print_r($sire_Descriptions) ; return ; 

        $i=1;

        $i=$i*$start;

            $a = $start+1;

        $columns=array();



        

        foreach ($sire_Descriptions as $site) {  

        if($site->draft==0){

            $status='Draft';

        }else{

            if($site->live==1){

                 $status='Activated';

            }else{

                 $status='De-Activated';

            }

        }





        $cName =  ( $site->childId == 81 ) ? "" : $site->c_name ;



        $columns[] = array(

            'id'  =>   $site->siteId,

            'name' =>  $site->site_no,              

            'rname' => $site->r_name,

            'pname' =>  $site->p_name,

            'cname' =>  $cName,

            'live' =>  $site->live,

            'no' => $a,

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





public function import_site_discription()

{

    $join= array('0'=>['parentcampground','sitedescription.p_id = parentcampground.p_id','left'],

            '1'=>['childcampground','sitedescription.childId = childcampground.c_id','left'],

            '2'=>['region','parentcampground.regionId = region.id','left']);

        $select = "sitedescription.* , region.name as r_name , parentcampground.name as p_name, childcampground.c_name as c_name";







        $start=$_REQUEST['start'] ;

        $end=$_REQUEST['length'] ;

        $ma=0;

        $na=0;

        if(!empty($_REQUEST['campsite'])){

            $like=array('sitedescription.site_no' => $_REQUEST['campsite']);

             $ma=1;

        }else{

            $like='';

        }

         

        if(!empty($_REQUEST['extra_search'])){

             if($ma==1){

                $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'parentcampground.name' => $_REQUEST['extra_search']);

                }else{

                  $like=array('parentcampground.name' => $_REQUEST['extra_search']);

                  // print_r('ma=0');

                }



                $na=1;

        }

         if(!empty($_REQUEST['child'])){

             if($ma==1 && $na==0){

                $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'childcampground.c_name' => $_REQUEST['child']);

                }else if($ma==1 && $na==1){

                  $like=array('sitedescription.site_no' => $_REQUEST['campsite'],'childcampground.c_name' => $_REQUEST['child'],'parentcampground.name' => $_REQUEST['extra_search']);

                  // print_r('ma=0');

                }else if($ma==0 && $na==0){

                    $like=array('childcampground.c_name' => $_REQUEST['child']);

                }else if($ma==0 && $na==1)

                {

                    $like=array('childcampground.c_name' => $_REQUEST['child'],'parentcampground.name' => $_REQUEST['extra_search']);

                }

        }

          $ordeBy= array('0'=>['p_name','asc'],

                          '1'=>['c_name','asc'],

                          '2'=>['sitedescription.site_no','asc'],

                   );

        $sire_Descriptions=$this->Campgrounds->find('sitedescription',array('import' => 1 ),$start,$end,1,$join,$like,$select,$ordeBy);   



        $totaldata = count( $this->Campgrounds->find('sitedescription',array('import' => 1 ),"","",1,$join,$like,$select,$ordeBy) ) ;



        //$totaldata =$this->Campgrounds->findNumRowsPagenation('sitedescription',array('import' => 1 ),$like,$join,'');   



        // print_r($totaldata) ;

        // print_r($sire_Descriptions) ; return ; 

        $i=1;

        $i=$i*$start;

            $a = $start+1;

        $columns=array();

        foreach ($sire_Descriptions as $site) {  

        if($site->draft==0){

            $status='Draft';

        }else{

            if($site->live==1){

                 $status='Activated';

            }else{

                 $status='De-Activated';

            }

        }  

        

        if(trim($site->c_name)=='Click To Explore Site Description') 

        {

          $c_nname='';

        }else{

          $c_nname=$site->c_name;

        }              

        $columns[] = array(

            'id'  =>   $site->siteId,

            'name' =>  $site->site_no,              

            'rname' => $site->r_name,

            'pname' =>  $site->p_name,

            'cname' =>  $c_nname,

            'live' =>  $site->live,

            'no' => $a,

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



public function site_description_details($id)

{

    if (isset($this->adminId)) 

    {



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

            );











              $select = "sitedescription.*, parameter_spacing.sp_name as sp_name,  parameter_spacing.sp_image as sp_image,  parameter_trailer.trailer_name as trailer_name, parameter_trailer.trailer_image as trailer_image,  parameter_grade.grade_name as grade_name, parameter_grade.grade_image as grade_image, parameter_base.base_name as base_name, parameter_base.base_image as base_image,  parameter_water.water_name as water_name, parameter_water.water_image as water_image, parameter_sewer.sewer_name as sewer_name, parameter_verizon.verizon_name as verizon_name, parameter_verizon.verizon_image as verizon_image, parameter_shade.shade_name as shade_name , parameter_shade.shade_image as shade_image , parameter_view.view_name as view_name, parameter_view.view_image as view_image, parameter_acess.acess_name as acess_name, parameter_acess.acess_image as acess_image,parameter_wifi.wifi_name as wifi_name, parameter_wifi.wifi_image as wifi_image,parameter_cable.cable_name as cable_name, parameter_cable.cable_image as cable_image, parameter_amp.amp_name as amp_name,parameter_amp.amp_image as amp_image,sitedescription_pics.sitePic";



            $where = array('siteId =' => $id);

         $sitedescription=$this->Campgrounds->find('sitedescription',$where,'','','',$join,'',$select);

          if(!empty($sitedescription)){ 

         // print_r($sitedescription);return;

           $where1 = array('sitedescription_id =' => $id);

           $sitedescription_pics = $this->Campgrounds->find_rows_data("sitedescription_pics",$where1);

          $data['site_pics']= $sitedescription_pics;  

         $data['sitedescription']= $sitedescription;

        $data['campings'] = $this->Campgrounds->find("parameter_camping",'','','',1);

         $where1 = array('sitedescription_id =' => $id);

           $sitedescription_pics = $this->Campgrounds->find_rows_data("sitedescription_pics",$where1);

         $data['views'] = $this->Campgrounds->find("parameter_view",'','','',1);

          $data['waters'] = $this->Campgrounds->find("parameter_water",'','','',1);

            $data['sewers'] = $this->Campgrounds->find("parameter_sewer",'','','',1);

             $data['tables'] = $this->Campgrounds->find("parameter_table",'','','',1);

              $data['amps'] = $this->Campgrounds->find("parameter_amp",'','','',1);

          // print_r( $sitedescription);return;

         $data['title']='Site Description Detail';

         $data['yield']='admin/pages/siteDescription/site-description-detail.php';

         $this->load->view($this->layout,$data);  

         }else{

          redirect(base_url().'404');

         }      

    }

    else

    {

        redirect(base_url('admin/login'));

    }

}





public function site_description_edit($id)

{

    if (isset($this->adminId)) 

    {



           $where = array('siteId =' => $id);

            $join= array('0'=>['parentcampground','sitedescription.p_id = parentcampground.p_id','left'],

            '1'=>['childcampground','sitedescription.childId = childcampground.c_id','left'],

            '2'=>['region','parentcampground.regionId = region.id','left']);

        $select = "sitedescription.* ,region.name as r_name , region.id as r_id , parentcampground.name as p_name, childcampground.c_name as c_name";



          $sitedescription=$this->Campgrounds->find('sitedescription',$where,'','','',$join,'',$select);

          if(!empty($sitedescription)){ 

    

        $data['regions'] = $this->Campgrounds->find("region",'','','',1);

        $wherep = array('regionId' => $sitedescription->r_id);

        $data['parents'] = $this->Campgrounds->find("parentcampground",$wherep,'','',1);

        $wherec = array('parentId' => $sitedescription->p_id);

        $data['childs'] = $this->Campgrounds->find("childcampground",$wherec,'','',1);



        $data['spacings'] = $this->Campgrounds->find("parameter_spacing",'','','',1); 

        $data['views'] = $this->Campgrounds->find("parameter_view",'','','',1); 

        $data['campings'] = $this->Campgrounds->find("parameter_camping",'','','',1);

          $data['views'] = $this->Campgrounds->find("parameter_view",'','','',1);

            $data['waters'] = $this->Campgrounds->find("parameter_water",'','','',1);

        $data['parameter_trailers'] = $this->Campgrounds->find("parameter_trailer",'','','',1);  

        $data['parameter_grades'] = $this->Campgrounds->find("parameter_grade",'','','',1); 

        $data['parameter_bases'] = $this->Campgrounds->find("parameter_base",'','','',1);

        $data['parameter_acess'] = $this->Campgrounds->find("parameter_acess",'','','',1);

        $data['parameter_amps'] = $this->Campgrounds->find("parameter_amp",'','','',1); 

        $data['parameter_waters'] = $this->Campgrounds->find("parameter_water",'','','',1); 

        $data['parameter_sewers'] = $this->Campgrounds->find("parameter_sewer",'','','',1);

        $data['parameter_verizons'] = $this->Campgrounds->find("parameter_verizon",'','','',1);

        $data['parameter_shades'] = $this->Campgrounds->find("parameter_shade",'','','',1);

         $data['parameter_wifis'] = $this->Campgrounds->find("parameter_wifi",'','','',1);

           $data['parameter_cables'] = $this->Campgrounds->find("parameter_cable",'','','',1);

            $data['parameter_tables'] = $this->Campgrounds->find("parameter_table",'','','',1);



           // print_r( $data['parameter_cables']);return;

        $data['sitedescription']= $sitedescription;

         $data['parentCampground'] = $this->Campgrounds->find("parentcampground",'','','',1);

          $where1 = array('sitedescription_id =' => $id);

       $site_pics  = $this->Campgrounds->find_rows_data("sitedescription_pics",$where1);



        $data['sitedescription_pics']=$site_pics;

        $data['title']='Edit Site Description';

        $data['yield']='admin/pages/siteDescription/edit-site-description.php';

        $this->load->view($this->layout,$data); 

        }else{

          redirect(base_url().'404');

        }       

    }

    else

    {

        redirect(base_url('admin/login'));

    }

}





public function update_site_description()

{

    if (isset($this->adminId)) 

    {



        $data = $this->input->post();



if($data['changes']!=1){

          $config = array(

        // array(

        //         'field' => 'name',

        //         'label' => 'Site Name',

        //         'rules' => 'required'

        // ),

        //  array(

        //         'field' => 'slug',

        //         'label' => 'Slug',

        //         'rules' => 'required'

        // ),

      

         array(

                'field' => 'parentcom',

                'label' => 'Parent Campground',

                'rules' => 'required'

        ),

           array(

                'field' => 'siteno',

                'label' => 'Site no',

                'rules' => 'required'

        ),

           array(

                'field' => 'spacing',

                'label' => 'Spacing',

                'rules' => 'required'

        ),

           array(

                'field' => 'view[]',

                'label' => 'View',

                'rules' => 'required'

        ),

            array(

                'field' => 'camping[]',

                'label' => 'Camping',

                'rules' => 'required'

        ),

            array(

                'field' => 'guests',

                'label' => 'Guests',

                'rules' => 'required'

        ),

            array(

                'field' => 'vehicles',

                'label' => 'Vehicles',

                'rules' => 'required'

        ), 

             array(

                'field' => 'pets',

                'label' => 'Pets',

                'rules' => 'required'

        ),

              array(

                'field' => 'trailer',

                'label' => 'Trailer',

                'rules' => 'required'

        ),

               array(

                'field' => 'grade',

                'label' => 'Grade',

                'rules' => 'required'

        ),

               array(

                'field' => 'base',

                'label' => 'Base',

                'rules' => 'required'

        ),

                array(

                'field' => 'access[]',

                'label' => 'Access',

                'rules' => 'required'

        ),

                array(

                'field' => 'electric',

                'label' => 'Electric',

                'rules' => 'required'

        ),

        //         array(

        //         'field' => 'amps[]',

        //         'label' => 'Amps',

        //         'rules' => 'required'

        // ),

                array(

                'field' => 'water[]',

                'label' => 'Water',

                'rules' => 'required'

        ),

                array(

                'field' => 'sewer[]',

                'label' => 'Sewer',

                'rules' => 'required'

        ),

                array(

                'field' => 'wifi',

                'label' => 'Wifi',

                'rules' => 'required'

        ),

                array(

                'field' => 'tv',

                'label' => 'TV',

                'rules' => 'required'

        ),

                array(

                'field' => 'verizon',

                'label' => 'Service Providers',

                'rules' => 'required'

        ),

                array(

                'field' => 'shade',

                'label' => 'Shade',

                'rules' => 'required'

        ),

        //          array(

        //         'field' => 'shelter',

        //         'label' => 'Shelter',

        //         'rules' => 'required'

        // ),

                array(

                'field' => 'table[]',

                'label' => 'Table',

                'rules' => 'required'

        ),

        //         array(

        //         'field' => 'firering',

        //         'label' => 'Fire ring',

        //         'rules' => 'required'

        // ),

        //         array(

        //         'field' => 'fireringgrill',

        //         'label' => 'Fire-Ring/Grill',

        //         'rules' => 'required'

        // ),     

        //         array(

        //         'field' => 'sgrill',

        //         'label' => 'Separate Grill',

        //         'rules' => 'required'

        // ),

                 array(

                'field' => 'toilet',

                'label' => 'Toilet',

                'rules' => 'required'

        ),

                array(

                'field' => 'ywater',

                'label' => 'Yards to Water',

                'rules' => 'required'

        ),

                array(

                'field' => 'ytrash',

                'label' => 'Yards to Trash',

                'rules' => 'required'

        ),





        );



//             $join= array('0'=>['parentcampground','sitedescription.p_id = parentcampground.p_id','left'],

//                '1'=>['childcampground','sitedescription.childId = childcampground.c_id','left'],

//                '2'=>['region','parentcampground.regionId = region.id','left']);

//            $select = "sitedescription.site_no as sitName, region.name as r_name , parentcampground.name as p_name, childcampground.c_name as c_name";





    $where = array('siteId !=' => $data['id'],'p_id' => $data['parentcom'],'childID' =>$data['childcom'],'site_no'=>$data['siteno'],'import'=>0);



//    print_r($where);return;



            $exist=$this->Campgrounds->find('sitedescription',$where,"","",1,"","","","");

//            print_r(count($exist));return;

            $error_no = true ;

            if (count($exist))

            {

                $error_no=false ;

            }

//            if( $exist ) {

//

//              if( $exist[0]->sitName !== $data['siteno'] ) {

//

//                  $error_no= $this->validate_member_site($data['siteno'],$data['parentcom'],$data['childcom']);

//              }

//            }



    $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == FALSE || $error_no==false )

                {

                   // redirect($_SERVER['HTTP_REFERER']);







                     $ins =$this->form_validation->error_array();



                     $data=$this->input->post();

                       if(!$error_no){

                     $this->session->set_flashdata('error_no', 'SITE NO FIELD SHOULD BE UNIQUE FOR PARENT AND CHILD CAMPGROUND');

                   }

                    $this->session->set_flashdata('error', $ins);

                 redirect($_SERVER['HTTP_REFERER']);

                    // redirect(base_url('admin/add-site-description'));

                }

                else

                {

                        // $slug = $this->db->query("SELECT * FROM `sitedescription` WHERE siteId != '".$data['id']."' &&  slug= '".$data['slug']."' &&  slug!=''")->result_array();         

                        //     if (!empty($slug))

                        //     {

                        //         $this->session->set_flashdata('error1','Please enter a unique slug');

                        //          $this->session->set_flashdata('data',$data);

                        //             redirect($_SERVER['HTTP_REFERER']);                 

                        //     }



                //  $config['upload_path'] = './uploads/SiteDescription/';

                //    $config['allowed_types'] = 'jpg|png';

                //    $config['encrpy_name']  = 100;

                //    $config['file_name'] = date("Y_m_d H_i_s");

                //   $this->load->library('upload', $config);

                // if ( ! $this->upload->do_upload('imge'))

                // { 

                //   $img = $data['eimg'];



                // }

                // else

                // {   $file_data  =  $this->upload->data();

                //     $img  = $file_data['file_name'];          

                // }

                    //fo amps

                  if(isset($data['amps'])){

                $amps = implode('@@', $data['amps']);

                   }else{

                     $amps = '';

                }

                  //fo table

                  if(isset($data['table'])){

                $table = implode('@@', $data['table']);

                   }else{

                     $table = '';

                }

                   //fo sewer

                  if(isset($data['sewer'])){

                $sewer = implode('@@', $data['sewer']);

                   }else{

                     $sewer = '';

                }

                  //fo water

                  if(isset($data['water'])){

                $water = implode('@@', $data['water']);

                   }else{

                     $water = '';

                }

                //fo camp

                   if(isset($data['camping'])){

                $comping = implode('@@', $data['camping']);

                   }else{

                     $comping = '';

                }

                 if(isset($data['view'])){

                 $view = implode('@@', $data['view']);

                  }else{

                     $view = '';

                }

                

                // $asses = implode('@@', $data['access']);

                // $amp = implode('@@', $data['amps']);

                          if(isset($data['favourite'])){

               $fav=1;

            }else{

                $fav=0;

            }



            //for pets

            // $pets='';

            if(empty($data['pets'])){

              $pets='';

            }else{

              $pets=$data['pets'];

            }

                $insert_data=array('p_id'=>$data['parentcom'],

                    'childId'=>$data['childcom'],

                    // 'name'=>$data['name'],

                    // 'slug'=>$data['slug'],

                    // 's_color'=>$data['color'],

                    // 's_banner'=> $banner,

                    'site_no'=>$data['siteno'],

                    'spacing'=>$data['spacing'],

                    'viewType'=>$view,//--- 

                    // 'sitePic'=> $img ,

                    'campType '=> $comping,//---

                    'noGuest'=>$data['guests'],

                    'noVehicle'=>$data['vehicles'],

                    'pets'=>$pets,

                    'lengthTrailer'=>$data['trailer'],

                    'grade '=>$data['grade'],

                    'base'=>$data['base'],

                    'acess'=>$data['access'],//---

                    'electric'=>$data['electric'],

                    'amps '=>$amps,//---

                    'water'=>$water,

                    'sewer'=>$sewer,

                    'wifi'=>$data['wifi'],

                    'cableTv '=>$data['tv'],

                    'verizon'=>$data['verizon'],

                    'shadeType'=>$data['shade'],

                    // 's_shelter'=>$data['shelter'],

                    's_table '=>$table,

                    // 'fireRing'=>$data['firering'],

                    // 'fireRingGril '=>$data['fireringgrill'],

                    // 'sGrill'=>$data['sgrill'],

                    'yardToilet'=>$data['toilet'],

                    'yardWater'=>$data['ywater'],

                    'yardTrash '=>$data['ytrash'],

                     'coverage '=>$data['coverage'],

                    'favourite'=>$fav,

                     'live'=>1,

                     'map_link'=>$data['google_map'],

                    'draft'=>1,

                    'import'=>0,

                    );



         $where = array('siteId' => $data['id']);

         $check= $this->Campgrounds->update_data('siteId',$data['id'],'sitedescription',$insert_data,$where);



                     if(empty($check)){ 

                                     //insert function insert data in database  

                                        // $this->db->insert('user', $data);

                                        // $insert_id = $this->db->insert_id();

                                       

 

      $data = array();



      // Count total files



      $countfiles = count($_FILES['img']['name']);



      // Looping all files

      $filename='';

      for($i=0;$i<$countfiles;$i++){

 

        if(!empty($_FILES['img']['name'][$i])){

          // Define new $_FILES array - $_FILES['file']

          $_FILES['file']['name'] = $_FILES['img']['name'][$i];

          $_FILES['file']['type'] = $_FILES['img']['type'][$i];

          $_FILES['file']['tmp_name'] = $_FILES['img']['tmp_name'][$i];

          $_FILES['file']['error'] = $_FILES['img']['error'][$i];

          $_FILES['file']['size'] = $_FILES['img']['size'][$i];



          // Set preference

          $config['upload_path'] = './uploads/SiteDescription/'; 

          $config['allowed_types'] = 'jpg|jpeg|png|gif';

          $config['max_size'] = '5000'; // max_size in kb

          $config['file_name'] = $_FILES['img']['name'][$i];





          //Load upload library

          $this->upload->initialize($config);

         

          // File upload



           // print_r($this->upload->do_upload('file')) ; return ;



          if($this->upload->do_upload('file')){

            // Get data about the file

            $uploadData = $this->upload->data();

          

            $filename = $uploadData['file_name'];



            // Initialize array

            // $data['filenames'][] = $filename;

             $data=$this->input->post();

  $insertdata = array('sitedescription_id' => $data['id'], 'sitePic' => $filename);

                                        $result=$this->Campgrounds->insert('sitedescription_pics',$insertdata);





          }

          else{

            $filename='';

          }

            

        }

     

      }

 

     

   

 

  

                                       

                                       

                            }else{

                                $this->session->set_flashdata('error', "Something went wrong. kindly fill the form Again.");

                                            redirect($_SERVER['HTTP_REFERER']);

                            }

                            $data=$this->input->post();

                            // print_r($data);return;

                            if(isset($data['publish'])){

          $this->session->set_flashdata('success1', 'Site description updated successfully');

          redirect($_SERVER['HTTP_REFERER']);

        }else if(isset($data['ActivateNext'])){

          $id=$data['id'];

            $next=$this->Campgrounds->get_next($id);

            if(!empty($next)){

            $this->session->set_flashdata('success1', 'Site description updated successfully and next site description is opened');

            redirect(base_url('admin/site-description-edit/'.$next->siteId));

          }else{

             $this->session->set_flashdata('success1', "Site description updated successfully and next site description is not available");

                                            redirect($_SERVER['HTTP_REFERER']);

            // print_r($next);return;

          }

          // print_r('ActivateNext');return;

        }else if(isset($data['ActivatePrevious'])){

          $id=$data['id'];

            $previous=$this->Campgrounds->get_previous($id);

            if(!empty($previous)){

            $this->session->set_flashdata('success1', 'Site description updated successfully and previous site description is opened');

            redirect(base_url('admin/site-description-edit/'.$previous->siteId));

          }else{

            $this->session->set_flashdata('success1', "Site description updated successfully and previous site description is not available");

                                            redirect($_SERVER['HTTP_REFERER']);

          }

            // print_r($previous);

           // print_r('ActivatePrevious');return;

        }else{

          $this->session->set_flashdata('success1', 'Site description updated successfully');

            redirect($_SERVER['HTTP_REFERER']);

        }













                }

            }else{

                // print_r('123');return;



                //    $config['upload_path'] = './uploads/SiteDescription/';

                //    $config['allowed_types'] = 'jpg|png';

                //    $config['encrpy_name']  = 100;

                //    $config['file_name'] = date("Y_m_d H_i_s");

                //   $this->load->library('upload', $config);

                // if ( ! $this->upload->do_upload('imge'))

                // { 

                //   $img = $data['eimg'];



                // }

                // else

                // {   $file_data  =  $this->upload->data();

                //     $img  = $file_data['file_name'];          

                // }

               //fo table

                  if(isset($data['amps'])){

                $amps = implode('@@', $data['amps']);

                   }else{

                     $amps = '';

                }

               //fo table

                  if(isset($data['table'])){

                $table = implode('@@', $data['table']);

                   }else{

                     $table = '';

                }

               //fro water

                if(isset($data['sewer'])){

                $sewer = implode('@@', $data['sewer']);

                   }else{

                     $sewer = '';

                }

                //fro water

                if(isset($data['water'])){

                $water = implode('@@', $data['water']);

                   }else{

                     $water = '';

                }

                   if(isset($data['camping'])){

                $comping = implode('@@', $data['camping']);

                   }else{

                     $comping = '';

                }

                 if(isset($data['view'])){

                 $view = implode('@@', $data['view']);

                  }else{

                     $view = '';

                }

                // $asses = implode('@@', $data['access']);

                // $amp = implode('@@', $data['amps']);

                          if(isset($data['favourite'])){

               $fav=1;

            }else{

                $fav=0;

            }

            //for pets

             if(empty($data['pets'])){

              $pets='';

            }else{

              $pets=$data['pets'];

            }

                $insert_data=array('p_id'=>$data['parentcom'],

                    'childId'=>$data['childcom'],

                    // 'name'=>$data['name'],

                    // 'slug'=>$data['slug'],

                    // 's_color'=>$data['color'],

                    // 's_banner'=> $banner,

                    'site_no'=>$data['siteno'],

                    'spacing'=>$data['spacing'],

                    'viewType'=> $view,//--- 

                    // 'sitePic'=> $img ,

                    'campType '=> $comping,//---

                    'noGuest'=>$data['guests'],

                    'noVehicle'=>$data['vehicles'],

                    'pets'=>$pets,

                    'lengthTrailer'=>$data['trailer'],

                    'grade '=>$data['grade'],

                    'base'=>$data['base'],

                    'acess'=>$data['access'],//---

                    'electric'=>$data['electric'],

                    'amps '=>$amps,//---

                    'water'=>$water,

                    'sewer'=>$sewer,

                    'wifi'=>$data['wifi'],

                    'cableTv '=>$data['tv'],

                    'verizon'=>$data['verizon'],

                    'shadeType'=>$data['shade'],

                    // 's_shelter'=>$data['shelter'],

                    's_table '=>$table,

                    // 'fireRing'=>$data['firering'],

                    // 'fireRingGril '=>$data['fireringgrill'],

                    // 'sGrill'=>$data['sgrill'],

                    'yardToilet'=>$data['toilet'],

                    'yardWater'=>$data['ywater'],

                    'yardTrash '=>$data['ytrash'],

                     'coverage '=>$data['coverage'],

                    'favourite'=>$fav,

                     'live'=>0,

                    'draft'=>0,

                    );



                 $where = array('siteId' => $data['id']);

                 $check= $this->Campgrounds->update_data('siteId',$data['id'],'sitedescription',$insert_data,$where);

                   if(empty($check)){ 

                                     //insert function insert data in database  

                                        // $this->db->insert('user', $data);

                                        // $insert_id = $this->db->insert_id();

                                       

 

      $data = array();



      // Count total files

      $countfiles = count($_FILES['img']['name']);

 

      // Looping all files

       $filename='';

      for($i=0;$i<$countfiles;$i++){

 

        if(!empty($_FILES['img']['name'][$i])){

          // Define new $_FILES array - $_FILES['file']

          $_FILES['file']['name'] = $_FILES['img']['name'][$i];

          $_FILES['file']['type'] = $_FILES['img']['type'][$i];

          $_FILES['file']['tmp_name'] = $_FILES['img']['tmp_name'][$i];

          $_FILES['file']['error'] = $_FILES['img']['error'][$i];

          $_FILES['file']['size'] = $_FILES['img']['size'][$i];



          // Set preference

          $config['upload_path'] = './uploads/SiteDescription/'; 

          $config['allowed_types'] = 'jpg|jpeg|png|gif';

          $config['max_size'] = '5000'; // max_size in kb

          $config['file_name'] = $_FILES['img']['name'][$i];





          //Load upload library

          $this->upload->initialize($config);

         

          // File upload



           // print_r($this->upload->do_upload('file')) ; return ;



          if($this->upload->do_upload('file')){

            // Get data about the file

            $uploadData = $this->upload->data();

          

            $filename = $uploadData['file_name'];



            // Initialize array

            // $data['filenames'][] = $filename;

             $data=$this->input->post();

  $insertdata = array('sitedescription_id' => $data['id'], 'sitePic' => $filename);

                                        $result=$this->Campgrounds->insert('sitedescription_pics',$insertdata);





          }

          else{

            $filename='';

          }

            

        }

     

      }

 

     

   

 

  

                                       

                                       

                            }else{

                                $this->session->set_flashdata('error', "Something went wrong. kindly fill the form Again.");

                                            redirect($_SERVER['HTTP_REFERER']);

                            }

                  $this->session->set_flashdata('success1', 'Site description update successfully');

                  redirect($_SERVER['HTTP_REFERER']);

            }







    }

    else

    {

        redirect(base_url('admin/login'));

    }

}







public function save_site()

{

    $data = $this->input->post();

    $where = array('siteId' => $data['id']);

    $insert_data = array('live'=>0);

    $this->Campgrounds->update_data('siteId',$data['id'],'sitedescription',$insert_data,$where);

    echo 'true';

}



public function publish_site()

{

    $data = $this->input->post();

    $where = array('siteId' => $data['id']);

    $insert_data = array('live'=>1);

    $this->Campgrounds->update_data('siteId',$data['id'],'sitedescription',$insert_data,$where);

    echo 'true';

}



public function delete_site()

{

        $data = $this->input->post();

        $this->db->delete('sitedescription', array('siteId' => $data['id'])); 

        echo 'true';

}



public function delete_newsletter()

{

        $data = $this->input->post();

        $this->db->delete('newsletter', array('id' => $data['id'])); 

        echo 'true';

}





public function excelfile()

{



  $this->load->library("excel");

  $object = new PHPExcel();

  $object->setActiveSheetIndex(0) ;



  $table_columns = array("Region", "Parent Campground","Child Campground","Campground Sites");

 $column = 0;

   $join= array('0'=>['parentcampground','sitedescription.p_id = parentcampground.p_id','left'],

            '1'=>['childcampground','sitedescription.childId = childcampground.c_id','left'],

            '2'=>['region','parentcampground.regionId = region.id','left']);

        $select = "sitedescription.site_no as sitName, region.name as r_name , parentcampground.name as p_name, childcampground.c_name as c_name";

          // $ordeBy= array('0'=>['sitedescription.siteId','desc'],

          //          

        $sire_Descriptions=$this->Campgrounds->find('sitedescription','',"","",1,$join,"",$select,"");    



  // $join= array('0'=>['region','parentcampground.regionId=region.id','left']);

  //           $select = "parentcampground.* , region.name as r_name";

  //           $desc="desc";

  //           $ordeBy= array('0'=>['region.id','desc'],'1'=>['parentcampground.name','asc']);

  // $parentcampgrounds=$this->Campgrounds->find('parentcampground','','','',1,$join,'',$select,$ordeBy);  

  foreach($table_columns as $field)

  {

   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

   $column++;

  }

  $excel_row = 2;



  foreach($sire_Descriptions as $parent)

  {



   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $parent->r_name);

   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $parent->p_name);

   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $parent->c_name);

   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $parent->sitName);

   $excel_row++;

  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

  header('Content-Type: application/vnd.ms-excel');

  header('Content-Disposition: attachment;filename="Site-Data.xls"');

  $object_writer->save('php://output');



}





// public function importVew()

// {
//          $data['title']='Import Campsites';

//          $data['yield']='admin/pages/siteDescription/import/import.php';

//          $this->load->view($this->layout,$data); 

// }

public function importVew()

{
    // die('its me');

         $data['title']='Import Campsites';

         $data['yield']='admin/pages/siteDescription/import/import.php';

         $this->load->view($this->layout,$data); 

}



protected $crptRows = array() ;

public function explodeVal( $val, $table , $name , $index , $row , $worksheet, $field, $rowName )

{



    $bool = false ;

    $arr = explode(',', $val) ;

   // print_r( $arr ) ; exit ;

    foreach ($arr as $key => $val) {

      

      $arr[$key] = $this->Campgrounds->findOrCreate( $table , array($field => $val) , $name ) ;



    //  print_r( $arr[$key] ) ; exit ;



       if( $arr[$key] == 0 ) {



           foreach( $this->crptRows as $key=>$c_row ) {



               if( $c_row == $row ) {



                   $bool = true ;

               }

           }



           if( $bool != true ) {



               array_push( $this->crptRows , $row .' and Column:'.$rowName ) ;

           }



       }



    }





    return implode("@@", $arr) ;

}



protected $skipArr = [] ;



public function importedExcelCamp()

{

  $skipArr=[];



   $this->load->library("excel");



    // $object_1 = new PHPExcel();



//  $insert ;

      

  //     $validation = array(

       

  //        array(

  //               'field' => 'campsites_file',

  //               'label' => 'campsites file',

  //               'rules' => 'required'

  //       ),

  // ) ;



  //      $this->form_validation->set_rules($validation);

  //       if (  $this->form_validation->run() == FALSE )

  //               {



  //                   $ins =$this->form_validation->error_array();

                   

  //                   $this->session->set_flashdata('error', $ins);



  //                   redirect($_SERVER['HTTP_REFERER']);

                    

  //                   return false ;

  //               }



   $ext = @end((explode('.', $_FILES["campsites_file"]["name"])));





//print_r($ext);return;

    if(isset($_FILES["campsites_file"]["name"]) && $_FILES["campsites_file"]["name"] != "" && ( $ext == "csv"  || $ext == "CSV" || $ext == "xlsx" || $ext == "XLSX" ) )

      {



          $crpt = false ;

//        print_r('in');return;

       $path = $_FILES["campsites_file"]["tmp_name"];

       @$object = PHPExcel_IOFactory::load($path);



       foreach($object->getWorksheetIterator() as $worksheet)

       {

//           print_r($worksheet->getHighestRow());return;



        $highestRow = $worksheet->getHighestRow();

        $highestColumn = $worksheet->getHighestColumn();



 

        for($row=3; $row<=$highestRow; $row++)

        {

//            print_r( $worksheet->getCellByColumnAndRow(0, $row)->getValue() );return;



            $check =false ;

            $bool = false ;

         // $insert = $this->Campgrounds->findOrCreate( 'parameter_spacing' , $like , 'sp_id' ) ;



            $p_id = $this->Campgrounds->find('parentcampground' , array('name' => $worksheet->getCellByColumnAndRow(0, $row)->getValue()));



            if (!empty($p_id))

            {

                 $insert['p_id'] = $p_id->p_id;

             



             

                $childId = $this->Campgrounds->find( 'childcampground' , array('c_name' => $worksheet->getCellByColumnAndRow(1, $row)->getValue(),'parentId'=>$insert['p_id']));

                if (!empty($childId))

                {

                    $insert['childId'] = $childId->c_id;

                }else{

                   if(!empty(trim($worksheet->getCellByColumnAndRow(1, $row)->getValue())))

                     {

                        foreach( $this->crptRows as $key=>$c_row ) {



                          if( $c_row == $row ) {



                              $check = true ;

                          }

                      }



                      if ( $check !=true ) {



                          array_push( $this->crptRows , $row.' and Column: Child Campground' ) ;

                      }

                     }else{

                   $insert['childId'] = 81;

                }



                }

             

            }else{



                foreach( $this->crptRows as $key=>$c_row ) {



                    if( $c_row == $row ) {



                        $check = true ;

                    }

                }



                if ( $check !=true ) {



                    array_push( $this->crptRows , $row.' and Column: Parent Campground' ) ;

                }



            }

            $insert['site_no'] = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

          $insert['campType'] =  $this->explodeVal( $worksheet->getCellByColumnAndRow(3, $row)->getValue(), 'parameter_camping' , 'camping_id' , 3 , $row , $worksheet, 'camping_name','Site No.' ) ;

            $insert['noGuest'] = $worksheet->getCellByColumnAndRow(4, $row)->getValue()  ;

            $insert['noVehicle'] = $worksheet->getCellByColumnAndRow(5, $row)->getValue() ;

          $insert['lengthTrailer'] = $worksheet->getCellByColumnAndRow(6, $row)->getValue() ;



           $insert['grade'] =  $this->explodeVal( $worksheet->getCellByColumnAndRow(7, $row)->getValue(), 'parameter_grade' , 'grade_id' , 7 , $row , $worksheet, 'grade_name','Grade' ) ;

           $insert['base'] =  $this->explodeVal( $worksheet->getCellByColumnAndRow(8, $row)->getValue(), 'parameter_base' , 'base_id' , 8 , $row , $worksheet, 'base_name' ,'Base') ;

            $insert['acess'] =  $this->explodeVal( $worksheet->getCellByColumnAndRow(9, $row)->getValue(), 'parameter_acess' , 'acess_id' , 9 , $row , $worksheet, 'acess_name','Acess') ;

             $insert['water'] =  $this->explodeVal( $worksheet->getCellByColumnAndRow(10, $row)->getValue(), 'parameter_water' , 'water_id' , 10 , $row , $worksheet, 'water_name','Water') ;

              $insert['sewer'] =  $this->explodeVal( $worksheet->getCellByColumnAndRow(11, $row)->getValue(), 'parameter_sewer' , 'sewer_id' , 11 , $row , $worksheet, 'sewer_name','Sewer' ) ;

               $insert['wifi'] =  $this->explodeVal( $worksheet->getCellByColumnAndRow(12, $row)->getValue(), 'parameter_wifi' , 'wifi_id' , 12 , $row , $worksheet, 'wifi_name','Wifi' ) ;

                $insert['cableTv'] =  $this->explodeVal( $worksheet->getCellByColumnAndRow(13, $row)->getValue(), 'parameter_cable' , 'cable_id' , 13 , $row , $worksheet, 'cable_name','Cable Tv' ) ;

                 $insert['shadeType'] =  $this->explodeVal( $worksheet->getCellByColumnAndRow(14, $row)->getValue(), 'parameter_shade' , 'shade_id' , 14 , $row , $worksheet, 'shade_name','Shade Type' ) ;

                  $insert['s_table'] =  $this->explodeVal( $worksheet->getCellByColumnAndRow(15, $row)->getValue(),  'parameter_table' , 'table_id' , 15 , $row , $worksheet, 'table_name','Campsite Amenities' ) ;

          $insert['yardToilet'] = $worksheet->getCellByColumnAndRow(16, $row)->getValue() ;

           $insert['yardWater'] = $worksheet->getCellByColumnAndRow(17, $row)->getValue() ;

             $insert['yardTrash'] = $worksheet->getCellByColumnAndRow(18, $row)->getValue() ;

            $insert['viewType'] =  $this->explodeVal( $worksheet->getCellByColumnAndRow(19, $row)->getValue(), 'parameter_view' , 'view_id' , 19 , $row , $worksheet, 'view_name','View Type' ) ;

            $insert['spacing'] = $this->explodeVal( $worksheet->getCellByColumnAndRow(20, $row)->getValue(), 'parameter_spacing' , 'sp_id' , 20 , $row , $worksheet , 'sp_name','Spacing') ;

            $insert['map_link'] =    $worksheet->getCellByColumnAndRow(21, $row)->getValue()  ;

            $insert['electric'] = $worksheet->getCellByColumnAndRow(22, $row)->getValue();

            $electric = strtolower($insert['electric']);

            if( $electric != "yes" && $electric != "no" ) {

                foreach( $this->crptRows as $key=>$c_row ) {

                    if( $c_row == $row ) {

                        $bool = true ;

                    }

                }

                if ( $bool !=true ) {

                    array_push( $this->crptRows , $row.' and Column: Electric' ) ;

                }

            }

            $cCover=$worksheet->getCellByColumnAndRow(24, $row)->getValue();

            $insert['amps'] = $this->explodeVal( $worksheet->getCellByColumnAndRow(23, $row)->getValue(), 'parameter_amp' , 'amp_id' , 23 , $row , $worksheet, 'amp_name','AMPS' ) ;

            $insert['verizon'] = $this->explodeVal( $worksheet->getCellByColumnAndRow(24, $row)->getValue(), 'parameter_verizon' , 'verizon_id' , 24 , $row , $worksheet, 'verizon_name' ,'Service Providers' ) ;



           $insert['coverage'] = $worksheet->getCellByColumnAndRow(25, $row)->getValue() ;



           $coverage = strtolower($insert['coverage']) ;

           $coverage = str_replace(' ', '', $coverage) ;

           // print_r();return;

           // print_r($cCover);

           // print_r('amir ishaque');return;

            if( $cCover!='no' && $coverage != "1bar" && $coverage != "2bar" &&$coverage != "3bar" && $coverage != "4bar"  ) {





                foreach( $this->crptRows as $key=>$c_row ) {



                    if( $c_row == $row ) {



                        $bool = true ;

                    }

                }



                if ( $bool !=true ) {



                    array_push( $this->skipArr , $row.' and Column: Cell Phone coverage' ) ;

                }

            }



           $insert['pets'] = $worksheet->getCellByColumnAndRow(26, $row)->getValue() ;

           $pets = strtolower($insert['pets']);



            $pets = str_replace(' ', '', $pets) ;

            if( $pets != "no" && $pets != "domesticonly" ) {



                foreach( $this->crptRows as $key=>$c_row ) {



                    if( $c_row == $row ) {



                        $bool = true ;

                    }

                }



                if ( $bool !=true ) {



                    array_push( $this->skipArr ,  $row .' and Column: Pets' ) ;

                }

            }



           $insert['import'] = 1  ;



//        print_r($insert);return;





//          if( !empty($this->crptRows) ) {



              foreach ( $this->crptRows as $crpt_r ) {

              $number = explode('and', $crpt_r) ;

                  if(intval($number[0]) == $row ) {



                      $crpt = true ;



                      array_push( $this->skipArr , $crpt_r ) ;

                  }



              }

//          }





//            if( !empty($this->crptRows) )  {

//

//                if( $crpt != true ) {

//

//                    $this->Campgrounds->insert('sitedescription',$insert);

//                    $crpt = false ;

//                }

//            }

           // else{



            if( $crpt != true ) {



                $this->Campgrounds->insert('sitedescription',$insert);

            }



            //}







        }



      }



      if( !empty( $this->skipArr ) ) {



          $arrStr = implode(" ",$this->skipArr) ;

     

          $ins = [] ;

          $ins['rows'] = $arrStr ;

          $this->session->set_flashdata('missingRows', $this->skipArr );

      }



    }else{

//        print_r('out');return;



        $ins = [] ;

        $ins['campsites_file'] = "Something went wrong! please check your file" ;



      $this->session->set_flashdata('error', $ins);

    } 



        redirect($_SERVER['HTTP_REFERER']);

}





public function delSiteImg()

{

    $data = $this->input->post() ;

    $this->db->delete('sitedescription_pics', array('sitepic_id' => $data['id'])); 

     echo 'true';

}



//    public function publishImpoortSite() {

//

//      $data = $this->input->post();

//

//        $sql="Select * from sitedescription where siteId > ".$data['siteId']." LIMIT 1";

//        $query = $this->db->query($sql);

//        $nextData = $query->result_array();

//

//

//        if (isset($this->adminId))

//        {

//

//            $data = $this->input->post();

//            // print_r($data['pets']);return;

//            if($data['changes']!=1){

//                $config = array(

//                    // array(

//                    //         'field' => 'name',

//                    //         'label' => 'Site Name',

//                    //         'rules' => 'required'

//                    // ),

//                    //  array(

//                    //         'field' => 'slug',

//                    //         'label' => 'Slug',

//                    //         'rules' => 'required'

//                    // ),

//

//                    array(

//                        'field' => 'parentcom',

//                        'label' => 'Parent Campground',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'siteno',

//                        'label' => 'Site no',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'spacing',

//                        'label' => 'Spacing',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'view[]',

//                        'label' => 'View',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'camping[]',

//                        'label' => 'Camping',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'guests',

//                        'label' => 'Guests',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'vehicles',

//                        'label' => 'Vehicles',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'pets',

//                        'label' => 'Pets',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'trailer',

//                        'label' => 'Trailer',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'grade',

//                        'label' => 'Grade',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'base',

//                        'label' => 'Base',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'access[]',

//                        'label' => 'Access',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'electric',

//                        'label' => 'Electric',

//                        'rules' => 'required'

//                    ),

//                    //         array(

//                    //         'field' => 'amps[]',

//                    //         'label' => 'Amps',

//                    //         'rules' => 'required'

//                    // ),

//                    array(

//                        'field' => 'water[]',

//                        'label' => 'Water',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'sewer[]',

//                        'label' => 'Sewer',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'wifi',

//                        'label' => 'Wifi',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'tv',

//                        'label' => 'TV',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'verizon',

//                        'label' => 'Service Providers',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'shade',

//                        'label' => 'Shade',

//                        'rules' => 'required'

//                    ),

//                    //          array(

//                    //         'field' => 'shelter',

//                    //         'label' => 'Shelter',

//                    //         'rules' => 'required'

//                    // ),

//                    array(

//                        'field' => 'table[]',

//                        'label' => 'Table',

//                        'rules' => 'required'

//                    ),

//                    //         array(

//                    //         'field' => 'firering',

//                    //         'label' => 'Fire ring',

//                    //         'rules' => 'required'

//                    // ),

//                    //         array(

//                    //         'field' => 'fireringgrill',

//                    //         'label' => 'Fire-Ring/Grill',

//                    //         'rules' => 'required'

//                    // ),

//                    //         array(

//                    //         'field' => 'sgrill',

//                    //         'label' => 'Separate Grill',

//                    //         'rules' => 'required'

//                    // ),

//                    array(

//                        'field' => 'toilet',

//                        'label' => 'Toilet',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'ywater',

//                        'label' => 'Yards to Water',

//                        'rules' => 'required'

//                    ),

//                    array(

//                        'field' => 'ytrash',

//                        'label' => 'Yards to Trash',

//                        'rules' => 'required'

//                    ),

//

//

//                );

//

//

//

//                $this->form_validation->set_rules($config);

//                if ($this->form_validation->run() == FALSE )

//                {

//                    // redirect($_SERVER['HTTP_REFERER']);

//

//

//

//                    $ins =$this->form_validation->error_array();

//

//                    $data=$this->input->post();

//                    //     if(!$error_no){

//                    //   $this->session->set_flashdata('error_no', 'SITE NO FIELD SHOULD BE UNIQUE FOR PARENT AND CHILD CAMPGROUND');

//                    // }

//                    $this->session->set_flashdata('error', $ins);

//

//                    $this->site_description_edit( $data['siteId'] ) ;

//                    // redirect(base_url('admin/add-site-description'));

//                }

//                else

//                {

//                    // $slug = $this->db->query("SELECT * FROM `sitedescription` WHERE siteId != '".$data['id']."' &&  slug= '".$data['slug']."' &&  slug!=''")->result_array();

//                    //     if (!empty($slug))

//                    //     {

//                    //         $this->session->set_flashdata('error1','Please enter a unique slug');

//                    //          $this->session->set_flashdata('data',$data);

//                    //             redirect($_SERVER['HTTP_REFERER']);

//                    //     }

//

//                    //  $config['upload_path'] = './uploads/SiteDescription/';

//                    //    $config['allowed_types'] = 'jpg|png';

//                    //    $config['encrpy_name']  = 100;

//                    //    $config['file_name'] = date("Y_m_d H_i_s");

//                    //   $this->load->library('upload', $config);

//                    // if ( ! $this->upload->do_upload('imge'))

//                    // {

//                    //   $img = $data['eimg'];

//

//                    // }

//                    // else

//                    // {   $file_data  =  $this->upload->data();

//                    //     $img  = $file_data['file_name'];

//                    // }

//                    //fo amps

//                    if(isset($data['amps'])){

//                        $amps = implode('@@', $data['amps']);

//                    }else{

//                        $amps = '';

//                    }

//                    //fo table

//                    if(isset($data['table'])){

//                        $table = implode('@@', $data['table']);

//                    }else{

//                        $table = '';

//                    }

//                    //fo sewer

//                    if(isset($data['sewer'])){

//                        $sewer = implode('@@', $data['sewer']);

//                    }else{

//                        $sewer = '';

//                    }

//                    //fo water

//                    if(isset($data['water'])){

//                        $water = implode('@@', $data['water']);

//                    }else{

//                        $water = '';

//                    }

//                    //fo camp

//                    if(isset($data['camping'])){

//                        $comping = implode('@@', $data['camping']);

//                    }else{

//                        $comping = '';

//                    }

//                    if(isset($data['view'])){

//                        $view = implode('@@', $data['view']);

//                    }else{

//                        $view = '';

//                    }

//

//                    // $asses = implode('@@', $data['access']);

//                    // $amp = implode('@@', $data['amps']);

//                    if(isset($data['favourite'])){

//                        $fav=1;

//                    }else{

//                        $fav=0;

//                    }

//

//                    //for pets

//                    // $pets='';

//                    if(empty($data['pets'])){

//                        $pets='';

//                    }else{

//                        $pets=$data['pets'];

//                    }

//                    $insert_data=array('p_id'=>$data['parentcom'],

//                        'childId'=>$data['childcom'],

//                        // 'name'=>$data['name'],

//                        // 'slug'=>$data['slug'],

//                        // 's_color'=>$data['color'],

//                        // 's_banner'=> $banner,

//                        'site_no'=>$data['siteno'],

//                        'spacing'=>$data['spacing'],

//                        'viewType'=>$view,//---

//                        // 'sitePic'=> $img ,

//                        'campType '=> $comping,//---

//                        'noGuest'=>$data['guests'],

//                        'noVehicle'=>$data['vehicles'],

//                        'pets'=>$pets,

//                        'lengthTrailer'=>$data['trailer'],

//                        'grade '=>$data['grade'],

//                        'base'=>$data['base'],

//                        'acess'=>$data['access'],//---

//                        'electric'=>$data['electric'],

//                        'amps '=>$amps,//---

//                        'water'=>$water,

//                        'sewer'=>$sewer,

//                        'wifi'=>$data['wifi'],

//                        'cableTv '=>$data['tv'],

//                        'verizon'=>$data['verizon'],

//                        'shadeType'=>$data['shade'],

//                        // 's_shelter'=>$data['shelter'],

//                        's_table '=>$table,

//                        // 'fireRing'=>$data['firering'],

//                        // 'fireRingGril '=>$data['fireringgrill'],

//                        // 'sGrill'=>$data['sgrill'],

//                        'yardToilet'=>$data['toilet'],

//                        'yardWater'=>$data['ywater'],

//                        'yardTrash '=>$data['ytrash'],

//                        'coverage '=>$data['coverage'],

//                        'favourite'=>$fav,

//                        'live'=>1,

//                        'map_link'=>$data['google_map'],

//                        'draft'=>1,

//                        'import'=>0,

//                    );

//

//                    $where = array('siteId' => $data['siteId']);

//                    $check= $this->Campgrounds->update_data('siteId',$data['siteId'],'sitedescription',$insert_data,$where);

//

//                    if(empty($check)){

//                        //insert function insert data in database

//                        // $this->db->insert('user', $data);

//                        // $insert_id = $this->db->insert_id();

//

//

//                        $data = array();

//

//                        // Count total files

//

//                        $countfiles = count($_FILES['img']['name']);

//

//                        // Looping all files

//                        $filename='';

//                        for($i=0;$i<$countfiles;$i++){

//

//                            if(!empty($_FILES['img']['name'][$i])){

//                                // Define new $_FILES array - $_FILES['file']

//                                $_FILES['file']['name'] = $_FILES['img']['name'][$i];

//                                $_FILES['file']['type'] = $_FILES['img']['type'][$i];

//                                $_FILES['file']['tmp_name'] = $_FILES['img']['tmp_name'][$i];

//                                $_FILES['file']['error'] = $_FILES['img']['error'][$i];

//                                $_FILES['file']['size'] = $_FILES['img']['size'][$i];

//

//                                // Set preference

//                                $config['upload_path'] = './uploads/SiteDescription/';

//                                $config['allowed_types'] = 'jpg|jpeg|png|gif';

//                                $config['max_size'] = '5000'; // max_size in kb

//                                $config['file_name'] = $_FILES['img']['name'][$i];

//

//

//                                //Load upload library

//                                $this->upload->initialize($config);

//

//                                // File upload

//

//                                // print_r($this->upload->do_upload('file')) ; return ;

//

//                                if($this->upload->do_upload('file')){

//                                    // Get data about the file

//                                    $uploadData = $this->upload->data();

//

//                                    $filename = $uploadData['file_name'];

//

//                                    // Initialize array

//                                    // $data['filenames'][] = $filename;

//                                    $data=$this->input->post();

//                                    $insertdata = array('sitedescription_id' => $data['id'], 'sitePic' => $filename);

//                                    $result=$this->Campgrounds->insert('sitedescription_pics',$insertdata);

//

//

//                                }

//                                else{

//                                    $filename='';

//                                }

//

//                            }

//

//                        }

//

//

//

//

//

//

//

//                    }else{

//                        $this->session->set_flashdata('error', "Something went wrong. kindly fill the form Again.");

//

//                        $this->site_description_edit( $data['siteId'] ) ;

//                    }

//                    $this->session->set_flashdata('success1', 'Site description update successfully');

//

//                    $this->site_description_edit( $data['siteId'] ) ;

//

//

//

//

//

//                }

//            }else{

//                // print_r('123');return;

//

//                //    $config['upload_path'] = './uploads/SiteDescription/';

//                //    $config['allowed_types'] = 'jpg|png';

//                //    $config['encrpy_name']  = 100;

//                //    $config['file_name'] = date("Y_m_d H_i_s");

//                //   $this->load->library('upload', $config);

//                // if ( ! $this->upload->do_upload('imge'))

//                // {

//                //   $img = $data['eimg'];

//

//                // }

//                // else

//                // {   $file_data  =  $this->upload->data();

//                //     $img  = $file_data['file_name'];

//                // }

//                //fo table

//                if(isset($data['amps'])){

//                    $amps = implode('@@', $data['amps']);

//                }else{

//                    $amps = '';

//                }

//                //fo table

//                if(isset($data['table'])){

//                    $table = implode('@@', $data['table']);

//                }else{

//                    $table = '';

//                }

//                //fro water

//                if(isset($data['sewer'])){

//                    $sewer = implode('@@', $data['sewer']);

//                }else{

//                    $sewer = '';

//                }

//                //fro water

//                if(isset($data['water'])){

//                    $water = implode('@@', $data['water']);

//                }else{

//                    $water = '';

//                }

//                if(isset($data['camping'])){

//                    $comping = implode('@@', $data['camping']);

//                }else{

//                    $comping = '';

//                }

//                if(isset($data['view'])){

//                    $view = implode('@@', $data['view']);

//                }else{

//                    $view = '';

//                }

//                // $asses = implode('@@', $data['access']);

//                // $amp = implode('@@', $data['amps']);

//                if(isset($data['favourite'])){

//                    $fav=1;

//                }else{

//                    $fav=0;

//                }

//                //for pets

//                if(empty($data['pets'])){

//                    $pets='';

//                }else{

//                    $pets=$data['pets'];

//                }

//                $insert_data=array('p_id'=>$data['parentcom'],

//                    'childId'=>$data['childcom'],

//                    // 'name'=>$data['name'],

//                    // 'slug'=>$data['slug'],

//                    // 's_color'=>$data['color'],

//                    // 's_banner'=> $banner,

//                    'site_no'=>$data['siteno'],

//                    'spacing'=>$data['spacing'],

//                    'viewType'=> $view,//---

//                    // 'sitePic'=> $img ,

//                    'campType '=> $comping,//---

//                    'noGuest'=>$data['guests'],

//                    'noVehicle'=>$data['vehicles'],

//                    'pets'=>$pets,

//                    'lengthTrailer'=>$data['trailer'],

//                    'grade '=>$data['grade'],

//                    'base'=>$data['base'],

//                    'acess'=>$data['access'],//---

//                    'electric'=>$data['electric'],

//                    'amps '=>$amps,//---

//                    'water'=>$water,

//                    'sewer'=>$sewer,

//                    'wifi'=>$data['wifi'],

//                    'cableTv '=>$data['tv'],

//                    'verizon'=>$data['verizon'],

//                    'shadeType'=>$data['shade'],

//                    // 's_shelter'=>$data['shelter'],

//                    's_table '=>$table,

//                    // 'fireRing'=>$data['firering'],

//                    // 'fireRingGril '=>$data['fireringgrill'],

//                    // 'sGrill'=>$data['sgrill'],

//                    'yardToilet'=>$data['toilet'],

//                    'yardWater'=>$data['ywater'],

//                    'yardTrash '=>$data['ytrash'],

//                    'coverage '=>$data['coverage'],

//                    'favourite'=>$fav,

//                    'live'=>0,

//                    'draft'=>0,

//                );

//

//                $where = array('siteId' => $data['id']);

//                $check= $this->Campgrounds->update_data('siteId',$data['id'],'sitedescription',$insert_data,$where);

//                if(empty($check)){

//                    //insert function insert data in database

//                    // $this->db->insert('user', $data);

//                    // $insert_id = $this->db->insert_id();

//

//

//                    $data = array();

//

//                    // Count total files

//                    $countfiles = count($_FILES['img']['name']);

//

//                    // Looping all files

//                    $filename='';

//                    for($i=0;$i<$countfiles;$i++){

//

//                        if(!empty($_FILES['img']['name'][$i])){

//                            // Define new $_FILES array - $_FILES['file']

//                            $_FILES['file']['name'] = $_FILES['img']['name'][$i];

//                            $_FILES['file']['type'] = $_FILES['img']['type'][$i];

//                            $_FILES['file']['tmp_name'] = $_FILES['img']['tmp_name'][$i];

//                            $_FILES['file']['error'] = $_FILES['img']['error'][$i];

//                            $_FILES['file']['size'] = $_FILES['img']['size'][$i];

//

//                            // Set preference

//                            $config['upload_path'] = './uploads/SiteDescription/';

//                            $config['allowed_types'] = 'jpg|jpeg|png|gif';

//                            $config['max_size'] = '5000'; // max_size in kb

//                            $config['file_name'] = $_FILES['img']['name'][$i];

//

//

//                            //Load upload library

//                            $this->upload->initialize($config);

//

//                            // File upload

//

//                            // print_r($this->upload->do_upload('file')) ; return ;

//

//                            if($this->upload->do_upload('file')){

//                                // Get data about the file

//                                $uploadData = $this->upload->data();

//

//                                $filename = $uploadData['file_name'];

//

//                                // Initialize array

//                                // $data['filenames'][] = $filename;

//                                $data=$this->input->post();

//                                $insertdata = array('sitedescription_id' => $data['id'], 'sitePic' => $filename);

//                                $result=$this->Campgrounds->insert('sitedescription_pics',$insertdata);

//

//

//                            }

//                            else{

//                                $filename='';

//                            }

//

//                        }

//

//                    }

//

//

//

//

//

//

//

//                }else{

//                    $this->session->set_flashdata('error', "Something went wrong. kindly fill the form Again.");

//                    $this->site_description_edit( $data['siteId'] ) ;

//                }

//                $this->session->set_flashdata('success1', 'Site description update successfully');

//

//               $this->site_description_edit( $data['siteId'] ) ;

//

//            }

//

//

//

//        }

//        else

//        {

//            redirect(base_url('admin/login'));

//        }

//    }







}
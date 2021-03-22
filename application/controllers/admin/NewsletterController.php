<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    require_once('vendor/mailchimp/transactional/lib/Configuration.php');
    require_once('vendor/mailchimp/marketing/lib/Configuration.php');
    require 'vendor/autoload.php';

class  NewsletterController extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->layout="admin/layout/main-layout";

        if(isset($this->session->userdata['admindata']))
        {
            $this->adminId = $this->session->userdata['admindata']['adminId'];
        }
    }


    public function addNewsletter()
    {
        # code...
     
        
        // die('ok');


           if(isset($this->adminId))
        {
                $data['title']='Add Newsletter';
                $data['yield']='admin/pages/newsletters/add.php';
                $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }


        public function store_news_letter()
    {

        $bool = 0;

        if(isset($this->adminId))
        {
        
        $data = $this->input->post();
        // var_dump($data);
        // die();

          $config = array(
        array(
                'field' => 'newsletter_title',
                'label' => 'Newsletter title',
                'rules' => 'required'
        ),
        array(
              'field' => 'description1',
              'label' => 'Newsletter description',
              'rules' => 'required'
          ),
           
        );

          $img='';
          $img2='';

          $this->form_validation->set_rules($config);
          // $bool = $this->form_validation->run();
          // die($bool == false);
                if ($this->form_validation->run() == FALSE)
                {
                    $data = $this->input->post();

                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('data',$data);
                    // var_dump($ins);
                    // die();
                    // $this->add_newsletter_page();
                    $bool++;
                }
              
//                  print_r($data);exit;
                    $config['upload_path'] = './uploads/newsletter/';
                     $config['allowed_types'] = 'jpg|png|jpeg';
                     $config['encrpy_name']  = 100;
                     $config['file_name'] = date("Y_m_d H_i_s");
                    $this->load->library('upload');
                    $this->upload->initialize($config);
               



                if ( ! $this->upload->do_upload('newsletter_image'))
                {
                 
                 $this->session->set_flashdata('image_error',$this->upload->display_errors());
                //  $this->session->set_flashdata('error', ['image_error'=>'Image is required']);
                // $this->session->set_flashdata('data',$data);
                    $img='';
                    $bool++;
                }
                else
                {   $file_data  =  $this->upload->data();

                    $img  = $file_data['file_name'];
                }


                    $config['upload_path'] = './uploads/newsletter/';
                    $config['allowed_types'] = 'pdf';
                    $config['encrpy_name']  = 100;
                    $config['file_name'] = date("Y_m_d H_i_s");
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('newsletter_pdf_file'))
                { 
                 // print_r( $this->upload->display_errors());return;
                // $this->session->set_flashdata('error', ['newsletter_pdf_file'=>'Pdf file is required']);
                // $this->session->set_flashdata('data',$data);
                $this->session->set_flashdata('pdf_error',$this->upload->display_errors());
                    $img2='';
                    $bool++;
                }
                else
                {   $file_data  =  $this->upload->data();
                    $img2  = $file_data['file_name'];
                }

                    // var_dump($data);
                    // die();

                    $insert_data=array(

                    'title'=>$data['newsletter_title'],
                    'image'=>$img,
                    'pdf_file'=>$img2,
                    'description'=>$data['description1'],
                    'created_at'=>date("Y_m_d H_i_s")                   
                );
                    if($bool > 0)
                    $this->add_newsletter_page(); 

                       /// create data base for news latter 


                    else{

                    $this->Campgrounds->insert('newsletter1',$insert_data);
                    $this->session->set_flashdata('success', 'Newsletter added successfully');
                    redirect($_SERVER['HTTP_REFERER']);

                    }
                


        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }


    //approved comments
//  public function blogApprovedComments($slug='')
//  {
//      $data['title'] = 'blog'
//  }
//
    //end approved comments




        public function newsletter_pagenation()
    
    {
        $start=$_REQUEST['start'];
        $end=$_REQUEST['length'];
        if(!empty($_REQUEST['search']['value'])){
            $like=array('newsletter1.title' => $_REQUEST['search']['value']);
        }else{
            $like='';
        }
         $ordeBy= array(
                    '0'=>['newsletter1.id','asc'],
                    );
        $infromations=$this->Campgrounds->find('newsletter1','',$start,$end,1,'',$like,'',$ordeBy);    
        $totaldata =$this->Campgrounds->findNumRows('newsletter1','',$like);    
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
            'no' => $a,
            'id'  =>   $info->id, 
            'title'=>    $info->title,          
//            'image' => '<img width=50px src='.base_url().'uploads/newsletter/'.$info->image.'>',
            'image' => '<a class="elem" href="'.base_url().'uploads/newsletter/'.$info->image.'" data-lcl-thumb="'.base_url().'uploads/newsletter/'.$info->image.'"><img src="'.base_url().'uploads/newsletter/'.$info->image.'" alt=""></a>',
            'pdf_file' =>  "<a href=".base_url().'uploads/newsletter/'.$info->pdf_file." target='blank'><i class='fa fa-file-pdf-o' style='font-size:30px;color:red'></i></a>",
            'description' => $info->description,
            'date' => $info->created_at,
        );
 
        // print_r($info);
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



        public function add_newsletter_page()
    {
        if(isset($this->adminId))
        {
                $data['title']='Add Newsletter';
                $data['yield']='admin/pages/newsletters/add.php';
                $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }


    public function newsletterList()
    {
        # code...
     
        
        // die('ok');


           if(isset($this->adminId))
        {
                $data['title']='Add Newsletter';
                $data['yield']='admin/pages/newsletters/newsletter-list.php';
                $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }


        public function NewsletterEdit($id)
    {
        $data['title']='detail of Blog post';
        $data['yield']='admin/pages/newsletters/edit-newsletter.php';


        $this->db->from('newsletter1');
        $this->db->where('id' , $id);
        $query = $this->db->get() ;
        $data['newsletter'] =  $query->result();
        // print_r($data['newsletter']);
        // return;
        $this->load->view($this->layout,$data) ;
    }




        public function updateNewslatter()
    {

        $img = '';
        $file = '';

        $this->load->helper("file");
        $this->load->helper("url");
        // delete_files($path);

        if(isset($this->adminId))
        {
        
        $data = $this->input->post();
      
          $config = array(
        array(
                'field' => 'title',
                'label' => 'Newsletter title',
                'rules' => 'required'
        ),
        array(
              'field' => 'description1',
              'label' => 'Newsletter description',
              'rules' => 'required'
          ),
           
        );


          $this->form_validation->set_rules($config);
                if ($this->form_validation->run() == FALSE)
                {
                    $data = $this->input->post();

                    $ins =$this->form_validation->error_array();
                    // print_r($ins);exit;
                    $this->session->set_flashdata('error', $ins);
                     $this->session->set_flashdata('data',$data);
                     redirect($_SERVER['HTTP_REFERER']);
                    $this->update_newsletter_page();
                }
                else
                {


                 // print_r($data);exit;
                    $config['upload_path'] = './uploads/newsletter/';
                     $config['allowed_types'] = 'jpg|png';
                     $config['encrpy_name']  = 100;
                     $config['file_name'] = date("Y_m_d H_i_s");
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('image'))
                { 
//                  print_r( $this->upload->display_errors());return;
                   $img=$data['image'];
                }

                else
                {   $file_data  =  $this->upload->data();
                    unlink(FCPATH.'/uploads/newsletter/'.$data['image']);
                    // die(base_url().'uploads/newsletter/'.$data['image']);
                    $img  = $file_data['file_name'];
                }

                $file_data  =  $this->upload->data();
                // print_r($file_data);exit();



                $config['upload_path'] = './uploads/newsletter/';
                $config['allowed_types'] = 'pdf';
                 $config['encrpy_name']  = 100;
                 $config['file_name'] = date("Y_m_d H_i_s");
                $this->load->library('upload');
                    $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('file'))
                { 
//                  print_r( $this->upload->display_errors());return;
                   $file=$data['file'];
                }

                else
                {   $file_data  =  $this->upload->data();
                    unlink(FCPATH.'/uploads/newsletter/'.$data['file']);
                    $file  = $file_data['file_name'];
                }
                    $file_data  =  $this->upload->data();
                    // print_r($file_data);
                    // die();
                    //$img  = $file_data['file_name'] ;

                   $insert_data=array(

                            'title'=>$data['title'],
                            'image'=>$img,
                            'pdf_file'=>$file,
                            'description' => $data['description1'],
                        );

                   $where = array('id' => $data['id'] ); 
                   $this->Campgrounds->update_data('id',$data['id'],'newsletter1',$insert_data,$where);
                    $this->session->set_flashdata('success', 'Newsletter update successfully');
                    redirect(base_url()."admin/newsletter-edit/".$data['id']);



                   if(isset($img))
                    {

                        
                    }else{

                        // $insert_data=array(

                        //     'blog_title'=>$data['blog_title'],
                        //     'blog_slug'=>$data['blog_slug'],

                        //     'blog_keywords'=>$data['blog_keywords'],
                        //     'page_title'=>$data['page_title'],
                        //     //'mapLink'=>$data['map_link'],
                        //     'blog_descrip_tag'=>$data['blog_descrip_tag'],
                        //     'blog_description'=>$data['blogDescription'],
                        // );
                    }


                    // $where = array('blog_id' => $data['blog_id'] );

                    // $this->Campgrounds->update_data('blog_id',$data['blog_id'],'blog',$insert_data,$where);
                    // $this->session->set_flashdata('success', 'Blog post update successfully');
                    // redirect($_SERVER['HTTP_REFERER']);

                }


        }
        else
        {
            redirect(base_url('admin/login'));
        }
    }



     public function update_newsletter_page()
            {
                if(isset($this->adminId))
                {
                        $data['title']='Edit Newsletter';
                        $data['yield']='admin/pages/newsletters/edit-newsletter.php';
                        $this->load->view($this->layout,$data);
                }
                else
                {
                    redirect(base_url('admin/login'));
                }
            }

            
        public function newsletterDelete()
            {
                $data = $this->input->post();
                $this->Campgrounds->deleteNewsletter($data['id']) ;
            }

};

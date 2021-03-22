<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LibraryController extends CI_Controller {

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

    public function index()
    {
        $data['libraries']=$this->Campgrounds->find('library','','','',1);
      
        $data['title']='Library';
        $data['yield']='admin/pages/library/library.php';
        $this->load->view($this->layout,$data);
    }
   public function insert()
   {
      $data = $this->input->post();

       $config['upload_path'] = './uploads/library/';
            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
            $config['encrpy_name']  = 100;
            $config['file_name'] = date("Y_m_d H_i_s");
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('library_file'))
            {
                // print_r( $this->upload->display_errors());return;
                $this->session->set_flashdata('error', 'Error! Please Try Again');

                // $this->session->set_flashdata('show-v',"1");
                redirect(base_url('admin/library'));
            }
            else
            {   $file_data   =  $this->upload->data();
                $img  = $file_data['file_name'];
            }
            $file_data   =  $this->upload->data();
            $img  = $file_data['file_name'];

                        $insert_data=array(
                'name'=>$data['library_name'],
                // 'banner_time'=>$data['transition_time'],
                'link'=>$img,

            );
            $this->Campgrounds->insert('library',$insert_data);
            $this->session->set_flashdata('success', 'Library added successfully');
            redirect(base_url('admin/library'));
      //       print_r($img);
      // print_r($data);
   }

   public function delete()
{
      $data = $this->input->post();
        $where = array('l_id' =>$data['id']);
        $subPage = $this->Campgrounds->find("library",$where,'','',1);
        $image_path=base_url().'uploads/library/'.$subPage->name;

        if (file_exists($image_path))
        {
            unlink($image_path);
        }
        $this->db->delete('library', array('l_id' => $data['id']));
        echo 'true';
}

   public function update()
   {
      $data = $this->input->post();

       $config['upload_path'] = './uploads/library/';
            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
            $config['encrpy_name']  = 100;
            $config['file_name'] = date("Y_m_d H_i_s");
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('library_file'))
            {
                $img='';
                // print_r( $this->upload->display_errors());return;
                // $this->session->set_flashdata('error', 'Error! Please Try Again');

                // $this->session->set_flashdata('show-v',"1");
                // redirect(base_url('admin/library'));
            }
            else
            {   $file_data   =  $this->upload->data();
                $img  = $file_data['file_name'];
            }
            if(!empty($img)){
                                         $insert_data=array(
                'name'=>$data['library_name'],
                //'banner_time'=>$data['transition_time'],
                'link'=>$img,

            );
            $where = array('l_id' => $data['libraryId'] );

            $this->Campgrounds->update_data('l_id',$data['libraryId'],'library',$insert_data,$where);
            $this->session->set_flashdata('success', 'Library updated successfully');
            // redirect($_SERVER['HTTP_REFERER']);
            redirect(base_url('admin/library'));
            }else{
                                            $insert_data=array(
                'name'=>$data['library_name'],
            );
            $where = array('l_id' => $data['libraryId'] );

            $this->Campgrounds->update_data('l_id',$data['libraryId'],'library',$insert_data,$where);
            $this->session->set_flashdata('success', 'Library updated successfully');
            // redirect($_SERVER['HTTP_REFERER']);
            redirect(base_url('admin/library'));
            }
           
      //       print_r($img);
      // print_r($data);
   }

    // public function informational_pagenation_head()
    // {
    //     $start=$_REQUEST['start'];
    //     $end=$_REQUEST['length'];
    //     if(!empty($_REQUEST['search']['value'])){
    //         $like=array('informationalhead.title' => $_REQUEST['search']['value']);
    //     }else{
    //         $like='';
    //     }
    //     $infromations=$this->Campgrounds->find('informationalhead','',$start,$end,1,'',$like,'');
    //     $totaldata =$this->Campgrounds->findNumRows('informationalhead','',$like);
    //     $i=1;
    //     $i=$i*$start;
    //     $a = 1;
    //     $columns=array();
    //     foreach ($infromations as $info) {
    //         $columns[] = array(
    //             'id'  =>   $info->id,
    //             'title' => $info->title,

    //             'no' => $a,
    //         );

    //         $i++;
    //         $a++;
    //     }
    //     $total=$totaldata;
    //     $json_data = array(
    //         "draw"            => intval( $_REQUEST['draw'] ),
    //         "recordsTotal"    => intval( $total ),
    //         "recordsFiltered" => intval( $total ),
    //         "data"            => $columns,
    //     );
    //     echo json_encode($json_data);

    // }
    // public function informational_pagenation()
    // {
    //     $start=$_REQUEST['start'];
    //     $end=$_REQUEST['length'];
    //     if(!empty($_REQUEST['search']['value'])){
    //         $like=array('informationalpages.name' => $_REQUEST['search']['value']);
    //     }else{
    //         $like='';
    //     }
    //     $ordeBy= array(
    //         '0'=>['informationalpages.order','asc'],
    //     );
    //     $infromations=$this->Campgrounds->find('informationalpages','',$start,$end,1,'',$like,'',$ordeBy);
    //     $totaldata =$this->Campgrounds->findNumRows('informationalpages','',$like);
    //     $i=1;
    //     if($start==0)
    //     {
    //         $i=1;
    //     }else{

    //         $i=$i*$start;
    //         $i++;
    //     }
    //     $a = 1;
    //     $columns=array();
    //     foreach ($infromations as $info) {
    //         $columns[] = array(
    //             'id'  =>   $info->info_id,
    //             'name' => $info->name,
    //             'slug' =>  $info->slug,
    //             'live' =>  $info->live,
    //             //'order' =>  $info->order,
    //             'no' => $i,
    //         );

    //         $i++;
    //         $a++;
    //     }
    //     $total=$totaldata;
    //     $json_data = array(
    //         "draw"            => intval( $_REQUEST['draw'] ),
    //         "recordsTotal"    => intval( $total ),
    //         "recordsFiltered" => intval( $total ),
    //         "data"            => $columns,
    //         "page"   => $start,
    //     );
    //     echo json_encode($json_data);

    // }


    // public function banner_image_home()
    // {
    //     if(isset($this->adminId))
    //     {
    //         $data = $this->input->post();
    //         //print_r($data);exit;
    //         $config['upload_path'] = './uploads/homebanner/';
    //         $config['allowed_types'] = 'jpg|png';
    //         $config['encrpy_name']  = 100;
    //         $config['file_name'] = date("Y_m_d H_i_s");
    //         $this->load->library('upload', $config);
    //         if ( ! $this->upload->do_upload('banner_image'))
    //         {
    //             // print_r( $this->upload->display_errors());return;
    //             $this->session->set_flashdata('error', 'Error! Please Try Again');

    //             // $this->session->set_flashdata('show-v',"1");
    //             redirect(base_url('admin/homepage-content'));
    //         }
    //         else
    //         {   $file_data	=  $this->upload->data();
    //             $img  = $file_data['file_name'];
    //         }
    //         $file_data	=  $this->upload->data();
    //         $img  = $file_data['file_name'];


    //         $insert_data=array(
    //             'banner_heading'=>$data['banner_text'],
    //             // 'banner_time'=>$data['transition_time'],
    //             'image_name'=>$img,

    //         );
    //         $this->Campgrounds->insert('banner_image_home',$insert_data);
    //         $this->session->set_flashdata('success', 'Banner Image added successfully');

    //         // $this->session->set_flashdata('show-v',"1");
    //         redirect(base_url('admin/homepage-content'));


    //     }else{
    //         redirect(base_url('admin/login'));
    //     }
    //     # code...
    // }
    // public function new_home_image()
    // {
    //     if(isset($this->adminId))
    //     {
    //         $data = $this->input->post();
    //         //print_r($data);exit;
    //         $config['upload_path'] = './uploads/homebanner/';
    //         $config['allowed_types'] = 'jpg|png';
    //         $config['encrpy_name']  = 100;
    //         $config['file_name'] = date("Y_m_d H_i_s");
    //         $this->load->library('upload', $config);
    //         if ( ! $this->upload->do_upload('banner_image'))
    //         {
    //             print_r( $this->upload->display_errors());return;
    //         }
    //         else
    //         {   $file_data	=  $this->upload->data();
    //             $img  = $file_data['file_name'];
    //         }
    //         $file_data	=  $this->upload->data();
    //         $img  = $file_data['file_name'];


    //         $insert_data=array(
    //             //'banner_heading'=>$data['banner_text'],
    //             //'banner_time'=>$data['transition_time'],
    //             'image'=>$img,

    //         );
    //         $this->Campgrounds->insert('home_page_image',$insert_data);
    //         $this->session->set_flashdata('success', 'Home Page Image add successfully');

    //         // $this->session->set_flashdata('show-v',"1");
    //         redirect(base_url('admin/homepage-content'));


    //     }else{
    //         redirect(base_url('admin/login'));
    //     }
    //     # code...
    // }
    // public function update_banner_image_home()
    // {
    //     if(isset($this->adminId))
    //     {
    //         $data = $this->input->post();
    //         //print_r($data);exit;
    //         $config['upload_path'] = './uploads/homebanner/';
    //         $config['allowed_types'] = 'jpg|png';
    //         $config['encrpy_name']  = 100;
    //         $config['file_name'] = date("Y_m_d H_i_s");
    //         $this->load->library('upload', $config);
    //         $img;
    //         if ( ! $this->upload->do_upload('banner_image'))
    //         {
    //             //echo "ok";exit;
    //             //print_r( $this->upload->display_errors());return;
    //             //$data['transition_time'];
    //             $img=$data['image'];
    //         }
    //         else
    //         {   $file_data	=  $this->upload->data();
    //             $img  = $file_data['file_name'];
    //         }
    //         //	$file_data	=  $this->upload->data();
    //         //print_r($this->upload->do_upload('banner_image'));exit;
    //         //	$img  = $file_data['file_name'];
    //         //print_r($img);exit;

    //         $insert_data=array(
    //             'banner_heading'=>$data['banner_text'],
    //             //'banner_time'=>$data['transition_time'],
    //             'image_name'=>$img,

    //         );
    //         $where = array('id_image' => $data['id'] );

    //         $this->Campgrounds->update_data('id_image',$data['id'],'banner_image_home',$insert_data,$where);
    //         $this->session->set_flashdata('success', 'Banner Image updated successfully');
    //         redirect($_SERVER['HTTP_REFERER']);
    //     }
    //     else
    //     {
    //         redirect(base_url('admin/login'));
    //     }
    // }
    // public function main_image_add()
    // {
    //     if(isset($this->adminId))
    //     {
    //         $data = $this->input->post();
    //         //print_r($data);exit;
    //         $config['upload_path'] = './uploads/homebanner/';
    //         $config['allowed_types'] = 'jpg|png';
    //         $config['encrpy_name']  = 100;
    //         $config['file_name'] = date("Y_m_d H_i_s");
    //         $this->load->library('upload', $config);
    //         $img;
    //         if ( ! $this->upload->do_upload('banner_image'))
    //         {
    //             //echo "ok";exit;
    //             //print_r( $this->upload->display_errors());return;
    //             //$data['transition_time'];
    //             $img=$data['image'];
    //         }
    //         else
    //         {   $file_data	=  $this->upload->data();
    //             $img  = $file_data['file_name'];
    //         }
    //         //	$file_data	=  $this->upload->data();
    //         //print_r($this->upload->do_upload('banner_image'));exit;
    //         //	$img  = $file_data['file_name'];
    //         //print_r($img);exit;

    //         $insert_data=array(
    //             //'banner_heading'=>$data['banner_text'],
    //             //'banner_time'=>$data['transition_time'],
    //             'image'=>$img,

    //         );
    //         $where = array('id' => $data['id'] );

    //         $this->Campgrounds->update_data('id_image',$data['id'],'home_page_image',$insert_data,$where);
    //         $this->session->set_flashdata('success', 'Home Page Image updated successfully');
    //         redirect($_SERVER['HTTP_REFERER']);
    //     }
    //     else
    //     {
    //         redirect(base_url('admin/login'));
    //     }
    // }

    // public function delete_banner_image_home()
    // {
    //     $data = $this->input->post();
    //     $where = array('id_image' =>$data['id']);
    //     $subPage = $this->Campgrounds->find("banner_image_home",$where,'','',1);
    //     $image_path=base_url().'uploads/homebanner/'.$subPage->image_name;

    //     if (file_exists($image_path))
    //     {
    //         unlink($image_path);
    //     }
    //     $this->db->delete('banner_image_home', array('id_image' => $data['id']));
    //     echo 'true';
    // }


    // public function del_banner_image()
    // {
    //     $data = $this->input->post();

    //     $sql = "UPDATE region SET bannerImage = null where id  = ".$data['id'];
    //     $this->db->query($sql);

    //     echo true;
    // }





}

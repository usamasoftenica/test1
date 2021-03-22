<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  SiteParametersController extends CI_Controller {

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

	public function add_site_parameters()
    {
      if(isset($this->adminId))
        {   
      
         $ordeBy= array(
                    '0'=>['parameter_spacing.order','asc'],
                    );
     
         $data['spacings'] = $this->Campgrounds->find("parameter_spacing",'','','',1,'','','',$ordeBy); 
         $ordeBy1= array(
                        '0'=>['parameter_view.order_by','asc'],
                        );
         $data['views'] = $this->Campgrounds->find("parameter_view",'','','',1,'','','',$ordeBy1); 
          $ordeBy2= array(
                        '0'=>['parameter_camping.order_by','asc'],
                        );
         $data['campings'] = $this->Campgrounds->find("parameter_camping",'','','',1,'','','',$ordeBy2); 
        $ordeBy3= array(
                        '0'=>['parameter_trailer.order_by','asc'],
                        );
         $data['parameter_trailers'] = $this->Campgrounds->find("parameter_trailer",'','','',1,'','','',$ordeBy3); 
         $ordeBy4= array(
                        '0'=>['parameter_grade.order_by','asc'],
                        );
         $data['parameter_grades'] = $this->Campgrounds->find("parameter_grade",'','','',1,'','','',$ordeBy4); 
         $ordeBy5= array(
                        '0'=>['parameter_base.order_by','asc'],
                        );
         $data['parameter_bases'] = $this->Campgrounds->find("parameter_base",'','','',1,'','','',$ordeBy5); 
        $ordeBy6= array(
                        '0'=>['parameter_acess.order_by','asc'],
                        );
         $data['parameter_acess'] = $this->Campgrounds->find("parameter_acess",'','','',1,'','','',$ordeBy6); 
        $ordeBy7= array(
                        '0'=>['parameter_amp.order_by','asc'],
                        );
         $data['parameter_amps'] = $this->Campgrounds->find("parameter_amp",'','','',1,'','','',$ordeBy7); 
        $ordeBy8= array(
                        '0'=>['parameter_water.order_by','asc'],
                        );
         $data['parameter_waters'] = $this->Campgrounds->find("parameter_water",'','','',1,'','','',$ordeBy8); 
        $ordeBy9= array(
                        '0'=>['parameter_sewer.order_by','asc'],
                        );
         $data['parameter_sewers'] = $this->Campgrounds->find("parameter_sewer",'','','',1,'','','',$ordeBy9); 
        $ordeBy10= array(
                        '0'=>['parameter_verizon.order_by','asc'],
                        );
         $data['parameter_verizons'] = $this->Campgrounds->find("parameter_verizon",'','','',1,'','','',$ordeBy10); 
        $ordeBy11= array(
                        '0'=>['parameter_shade.order_by','asc'],
                        );
         $data['parameter_shades'] = $this->Campgrounds->find("parameter_shade",'','','',1,'','','',$ordeBy11); 
            
       $ordeBy12= array(
                        '0'=>['parameter_wifi.order_by','asc'],
                        );
         $data['parameter_wifi'] = $this->Campgrounds->find("parameter_wifi",'','','',1,'','','',$ordeBy12); 
         $ordeBy13= array(
                        '0'=>['parameter_cable.order_by','asc'],
                        );
         $data['parameter_cable'] = $this->Campgrounds->find("parameter_cable",'','','',1,'','','',$ordeBy13); 
         $ordeBy14= array(
                        '0'=>['parameter_table.order_by','asc'],
                        );
          $data['parameter_table'] = $this->Campgrounds->find("parameter_table",'','','',1,'','','',$ordeBy14);
          // print_r( $data['parameter_table']);return;
         $data['title']='Add Site Parameters';
         $data['yield']='admin/pages/siteDescription/site-parameters.php';
         $this->load->view($this->layout,$data);
        }
        else
        {
            redirect(base_url('admin/login'));
        }  
    }

    public function new_spacing()
    {
    	if(isset($this->adminId))
    	{
    		  $data = $this->input->post();
    		    $config = array(
        	array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_spacing.sp_name]'
        	),
      );
    		    $this->form_validation->set_rules($config);
			 	if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','1');
                 redirect($_SERVER['HTTP_REFERER']);
             		// $this->add_site_parameters();
                }
                else
                {
                  if (!empty($_FILES['icon']['name'])) {

                	$config['upload_path'] = './uploads/SideParameter/';
               		 $config['allowed_types'] = 'jpeg|jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		// $this->load->library('upload', $config);
                   $this->load->library('upload');
                   $this->upload->initialize($config);
   				if ( ! $this->upload->do_upload('icon'))
                { 
                  $this->session->set_flashdata('imageError1','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','1');
                  redirect($_SERVER['HTTP_REFERER']);
                	// print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data	=  $this->upload->data();
					         $img  = $file_data['file_name'];
                }
              }else{
                $img='';
              }
                $insert_data=array('sp_name'=>$data['name'],
					'sp_image'=>$img);
				$this->Campgrounds->insert('parameter_spacing',$insert_data);
        $this->session->set_flashdata('section','1');
				 $this->session->set_flashdata('success', 'Spacing added successfully');
				redirect($_SERVER['HTTP_REFERER']);
                }
    	}
    	else
        {
            redirect(base_url('admin/login'));
        }
    }

 public function delete_spacing()
{


		$data = $this->input->post();

     $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('spacing',$data['id']);

     $query = $this->db->get();        
       $val = $query->result();    

        if(empty($val))
       {  
            $this->db->delete('parameter_spacing', array('sp_id' => $data['id'])); 
            $this->session->set_flashdata('section','1');
            echo 'true';
       }else{
           $this->session->set_flashdata('section','1');
       }


}

public function update_spacing()
{
	  if(isset($this->adminId))
        {     
   			    $data = $this->input->post();
             $where = array('sp_name' => $data['name'], 'sp_id!='=>$data['id'] );
   		     $findUnique=$this->Campgrounds->find("parameter_spacing",$where);
           if(empty($findUnique)){
					         $config['upload_path'] = './uploads/SideParameter/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		 $this->load->library('upload');
                   $this->upload->initialize($config);
   				      if ( ! $this->upload->do_upload('icon'))
                { 
                	$insert_data=array('sp_name'=>$data['name']);
                }
                else
                {   
                  $file_data	=  $this->upload->data();
					        $img  = $file_data['file_name'];
						      $insert_data=array('sp_name'=>$data['name'],
					                           'sp_image'=>$img);
                }			
					$where = array('sp_id' => $data['id']);
					$this->Campgrounds->update_data('sp_id',$data['id'],'parameter_spacing',$insert_data,$where);
					$this->session->set_flashdata('success', 'Spacing updated successfully');
          $this->session->set_flashdata('section','1');
					redirect($_SERVER['HTTP_REFERER']);
         }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
        }
        else
        {
            redirect(base_url('admin/login'));
        } 
}


   public function new_type_view()
    {
      if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name2',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_view.view_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','1');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon2']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon2'))
                { 
                  $this->session->set_flashdata('imageError2','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','1');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('view_name'=>$data['name2'],
                                    'view_image'=>$img);
                $this->Campgrounds->insert('parameter_view',$insert_data);
                 $this->session->set_flashdata('success', 'View added successfully');
                  $this->session->set_flashdata('section','1');
                redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }
    }

 public function update_view()
{
	  if(isset($this->adminId))
        {     
   		
   			 $where = array('view_name' => $data['name'], 'view_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_view",$where);
           if(empty($findUnique)){
                 
					$config['upload_path'] = './uploads/SideParameter/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		 $this->load->library('upload');
                   $this->upload->initialize($config);
   				if ( ! $this->upload->do_upload('icon'))
                { 
                	 $insert_data=array('view_name'=>$data['name'],
					);
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
					 $insert_data=array('view_name'=>$data['name'],
					'view_image'=>$img);

                }
				
				
					$where = array('view_id' => $data['id']);
					$this->Campgrounds->update_data('view_id',$data['id'],'parameter_view',$insert_data,$where);
					$this->session->set_flashdata('success', 'View updated successfully');
          $this->session->set_flashdata('section','1');
					redirect($_SERVER['HTTP_REFERER']);
        }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
        
        }
        else
        {
            redirect(base_url('admin/login'));
        } 
}

 public function delete_view()
{


		$data = $this->input->post();

      $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('viewType',$data['id']);

     $query = $this->db->get();        
    $val = $query->result();    

    if(empty($val))
    {
        $this->db->delete('parameter_view', array('view_id' => $data['id'])); 
        $this->session->set_flashdata('section','1');
        echo 'true';
    }else{
      $this->session->set_flashdata('section','1');
    }

		
}


   public function new_comping()
    {
        if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name3',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_camping.camping_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','2');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon3']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon3'))
                { 
                  $this->session->set_flashdata('imageError3','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','2');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('camping_name'=>$data['name3'],
          'camping_image'=>$img);
              $this->Campgrounds->insert('parameter_camping',$insert_data);
               $this->session->set_flashdata('success', 'Type of Camping added successfully');
                $this->session->set_flashdata('section','2');
              redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }
    }


public function update_comping()
{
	  if(isset($this->adminId))
        {     
   					$data = $this->input->post();  
             $where = array('camping_name' => $data['name'], 'camping_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_camping",$where);
           if(empty($findUnique)){
					$config['upload_path'] = './uploads/SideParameter/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		 $this->load->library('upload');
                   $this->upload->initialize($config);
   				if ( ! $this->upload->do_upload('icon'))
                { 
                	 $insert_data=array('camping_name'=>$data['name'],
					);
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
					 $insert_data=array('camping_name'=>$data['name'],
					'camping_image'=>$img);
                }
					$where = array('camping_id' => $data['id']);
					$this->Campgrounds->update_data('camping_id',$data['id'],'parameter_camping',$insert_data,$where);
					$this->session->set_flashdata('success', 'Camping updated successfully');
           $this->session->set_flashdata('section','2');
					redirect($_SERVER['HTTP_REFERER']);
                }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
        }

        
        else
        {
            redirect(base_url('admin/login'));
        } 
}

public function delete_camping()
{
		$data = $this->input->post();

     $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('campType',$data['id']);

     $query = $this->db->get();        
      $val = $query->result();    

     if(empty($val))
     {
        $this->db->delete('parameter_camping', array('camping_id' => $data['id'])); 
         $this->session->set_flashdata('section','2');
        echo '1';
     }else{
          $this->session->set_flashdata('section','2');
            // $this->session->set_flashdata('error', 'Camping update successfully');
          echo '0';
     }

		
}

//trailer
  public function new_trailer()
    {
           if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name4',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_trailer.trailer_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','3');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon4']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                   $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon4'))
                { 
                  $this->session->set_flashdata('imageError4','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','3');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('trailer_name'=>$data['name4'],
          'trailer_image'=>$img);
              $this->Campgrounds->insert('parameter_trailer',$insert_data);
               $this->session->set_flashdata('success', 'Trailer added successfully');
                $this->session->set_flashdata('section','3');
              redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }
    }


 public function update_trailer()
{
	  if(isset($this->adminId))
        {     
   					$data = $this->input->post();    
             $where = array('trailer_name' => $data['name'], 'trailer_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_trailer",$where);
           if(empty($findUnique)){
					$config['upload_path'] = './uploads/SideParameter/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload');
                   $this->upload->initialize($config);
   				if ( ! $this->upload->do_upload('icon'))
                { 
                	 $insert_data=array('trailer_name'=>$data['name'],
					);
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
					 $insert_data=array('trailer_name'=>$data['name'],
					'trailer_image'=>$img);
                }
					$where = array('trailer_id' => $data['id']);
					$this->Campgrounds->update_data('trailer_id',$data['id'],'parameter_trailer',$insert_data,$where);
					$this->session->set_flashdata('success', 'Trailer updated successfully');
           $this->session->set_flashdata('section','3');
					redirect($_SERVER['HTTP_REFERER']);
                }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
        
        }
        else
        {
            redirect(base_url('admin/login'));
        } 
}

public function delete_trailer()
{
		$data = $this->input->post();
		$this->db->delete('parameter_trailer', array('trailer_id' => $data['id'])); 
     $this->session->set_flashdata('section','3');
		echo 'true';
}


//grade

  public function new_grade()
    {
               if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name5',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_grade.grade_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','3');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon5']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon5'))
                { 
                  $this->session->set_flashdata('imageError5','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','3');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('grade_name'=>$data['name5'],
          'grade_image'=>$img);
              $this->Campgrounds->insert('parameter_grade',$insert_data);
               $this->session->set_flashdata('success', 'Grade added successfully');
                $this->session->set_flashdata('section','3');
              redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }
    }

     public function update_grade()
{
	  if(isset($this->adminId))
        {     
   					$data = $this->input->post();   
             $where = array('grade_name' => $data['name'], 'grade_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_grade",$where);
           if(empty($findUnique)){
					$config['upload_path'] = './uploads/SideParameter/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload');
                   $this->upload->initialize($config);
   				if ( ! $this->upload->do_upload('icon'))
                { 
                	 $insert_data=array('grade_name'=>$data['name'],
					);
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
					 $insert_data=array('grade_name'=>$data['name'],
					'grade_image'=>$img);
                }
					$where = array('grade_id' => $data['id']);
					$this->Campgrounds->update_data('grade_id',$data['id'],'parameter_grade',$insert_data,$where);
					$this->session->set_flashdata('success', 'Grade updated successfully');
           $this->session->set_flashdata('section','3');
					redirect($_SERVER['HTTP_REFERER']);
                }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
        
        }
        else
        {
            redirect(base_url('admin/login'));
        } 
}

public function delete_grade()
{
		$data = $this->input->post();

     $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('grade',$data['id']);

     $query = $this->db->get();        
     $val = $query->result();    

       if(empty($val))
       {
          $this->db->delete('parameter_grade', array('grade_id' => $data['id'])); 
           $this->session->set_flashdata('section','3');
          echo 'true';
       }else{
           $this->session->set_flashdata('section','3');
       }
		
}

//base

	public function new_base()
    {
                   if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name6',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_base.base_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    if(isset($ins['name']) && $ins['name']=='The Name field must contain a unique value.'){
                    $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
                    // print_r('123');return;
                  }else{
                    $this->session->set_flashdata('error', $ins);
                    // print_r('123qwe');return;
                  }
                    $this->session->set_flashdata('section','3');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon6']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon6'))
                { 
                  $this->session->set_flashdata('imageError6','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','3');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('base_name'=>$data['name6'],
          'base_image'=>$img);
              $this->Campgrounds->insert('parameter_base',$insert_data);
               $this->session->set_flashdata('success', 'Base added successfully');
                $this->session->set_flashdata('section','3');
              redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }
    }

 public function update_base()
{
	  if(isset($this->adminId))
        {     
   					$data = $this->input->post();  
                     $where = array('base_name' => $data['name'], 'base_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_base",$where);
           if(empty($findUnique)){
					$config['upload_path'] = './uploads/SideParameter/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload');
                   $this->upload->initialize($config);
   				if ( ! $this->upload->do_upload('icon'))
                { 
                	 $insert_data=array('base_name'=>$data['name'],
					);
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
					 $insert_data=array('base_name'=>$data['name'],
					'base_image'=>$img);
                }
					$where = array('base_id' => $data['id']);
					$this->Campgrounds->update_data('base_id',$data['id'],'parameter_base',$insert_data,$where);
					$this->session->set_flashdata('success', 'Base updated successfully');
          $this->session->set_flashdata('section','3');
					redirect($_SERVER['HTTP_REFERER']);
                }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
        }

        
        else
        {
            redirect(base_url('admin/login'));
        } 
}

public function delete_base()
{
		$data = $this->input->post();

     $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('base',$data['id']);

     $query = $this->db->get();        
       $val = $query->result();    

       if(empty($val))
       {
          $this->db->delete('parameter_base', array('base_id' => $data['id'])); 
          $this->session->set_flashdata('section','3');
          echo 'true';
       }else{
           $this->session->set_flashdata('section','3');
       }

		
}

//access

public function new_access()
    {
     if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name7',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_acess.acess_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','4');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon7']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon7'))
                { 
                  $this->session->set_flashdata('imageError7','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','4');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('acess_name'=>$data['name7'],
          'acess_image'=>$img);
              $this->Campgrounds->insert('parameter_acess',$insert_data);
               $this->session->set_flashdata('success', 'Access added successfully');
                $this->session->set_flashdata('section','4');
              redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }
    }

 public function update_access()
{
	  if(isset($this->adminId))
        {    

   					$data = $this->input->post();  
                         $where = array('acess_name' => $data['name'], 'acess_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_acess",$where);
           if(empty($findUnique)){
					$config['upload_path'] = './uploads/SideParameter/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload');
                   $this->upload->initialize($config);
   				if ( ! $this->upload->do_upload('icon'))
                { 
                	 $insert_data=array('acess_name'=>$data['name'],
					);
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
					 $insert_data=array('acess_name'=>$data['name'],
					'acess_image'=>$img);
                }
					$where = array('acess_id' => $data['id']);
					$this->Campgrounds->update_data('acess_id',$data['id'],'parameter_acess',$insert_data,$where);
					$this->session->set_flashdata('success', 'Access updated successfully');
           $this->session->set_flashdata('section','4');
					redirect($_SERVER['HTTP_REFERER']);
                }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
        
        }
        else
        {
            redirect(base_url('admin/login'));
        } 
}

public function delete_access()
{
		$data = $this->input->post();

     $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('acess',$data['id']);

     $query = $this->db->get();        
       $val = $query->result();    

       if(empty($val))
       {
            $this->db->delete('parameter_acess', array('acess_id' => $data['id'])); 
           $this->session->set_flashdata('section','4');
          echo 'true';
       }else{ 
           $this->session->set_flashdata('section','4');
       }

	
}


//amps

public function new_amps()
    {
                      if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name8',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_amp.amp_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','5');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon8']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon8'))
                { 
                  $this->session->set_flashdata('imageError8','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','5');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('amp_name'=>$data['name8'],
          'amp_image'=>$img);
              $this->Campgrounds->insert('parameter_amp',$insert_data);
               $this->session->set_flashdata('success', 'Amp added successfully');
                $this->session->set_flashdata('section','5');
              redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }
    // 	if(isset($this->adminId))
    // 	{
			 // $data = $this->input->post();           
    //     	 $config['upload_path'] = './uploads/SideParameter/';
    //    		 $config['allowed_types'] = 'jpg|png';
    //    		 $config['encrpy_name']  = 100;
    //    		 $config['file_name'] = date("Y_m_d H_i_s");
    //   		$this->load->library('upload');
                   // $this->upload->initialize($config);
   	// 			if ( ! $this->upload->do_upload('icon'))
    //             { 
    //             	print_r( $this->upload->display_errors());return;
    //             }
    //             else
    //             {   $file_data	=  $this->upload->data();
				// 	$img  = $file_data['file_name'];
    //             }
    //             $insert_data=array('amp_name'=>$data['name'],
				// 	'amp_image'=>$img);
				// $this->Campgrounds->insert('parameter_amp',$insert_data);
				//  $this->session->set_flashdata('success', 'Amps add successfully');
				// redirect($_SERVER['HTTP_REFERER']);                
    // 	}
    // 	else
    //     {
    //         redirect(base_url('admin/login'));
    //     }

    }

public function update_amps()
{
	  if(isset($this->adminId))
        {     
   					$data = $this->input->post();   
                    $where = array('amp_name' => $data['name'], 'amp_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_amp",$where);
           if(empty($findUnique)){
					$config['upload_path'] = './uploads/SideParameter/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload');
                   $this->upload->initialize($config);

   				if ( ! $this->upload->do_upload('icon'))
                { 
                	 $insert_data=array('amp_name'=>$data['name'],
					);
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
					 $insert_data=array('amp_name'=>$data['name'],
					'amp_image'=>$img);
                }
					$where = array('amp_id' => $data['id']);
					$this->Campgrounds->update_data('amp_id',$data['id'],'parameter_amp',$insert_data,$where);
					$this->session->set_flashdata('success', 'Amps updated successfully');
           $this->session->set_flashdata('section','5');
					redirect($_SERVER['HTTP_REFERER']);
                }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
        
        }
        else
        {
            redirect(base_url('admin/login'));
        } 
}

public function delete_amps()
{
		$data = $this->input->post();

     $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('amps',$data['id']);

     $query = $this->db->get();        
       $val = $query->result();    

    if(empty($val))
    {
          $this->db->delete('parameter_amp', array('amp_id' => $data['id'])); 
           $this->session->set_flashdata('section','5');
           $this->session->set_flashdata('success', 'Amps Deleted successfully');
          echo 'true';
        }else{

           $this->session->set_flashdata('section','5');
           // $this->session->set_flashdata('error', 'You are not allowed to delete this Amp');
          echo 'false';
        }

		
}

//water
public function new_water()
    {
    // 	if(isset($this->adminId))
    // 	{
			 // $data = $this->input->post();           
    //     	 $config['upload_path'] = './uploads/SideParameter/';
    //    		 $config['allowed_types'] = 'jpg|png';
    //    		 $config['encrpy_name']  = 100;
    //    		 $config['file_name'] = date("Y_m_d H_i_s");
    //   		$this->load->library('upload');
                   // $this->upload->initialize($config);
   	// 			if ( ! $this->upload->do_upload('icon'))
    //             { 
    //             	print_r( $this->upload->display_errors());return;
    //             }
    //             else
    //             {   $file_data	=  $this->upload->data();
				// 	$img  = $file_data['file_name'];
    //             }
    //             $insert_data=array('water_name'=>$data['name'],
				// 	'water_image'=>$img);
				// $this->Campgrounds->insert('parameter_water',$insert_data);
				//  $this->session->set_flashdata('success', 'Water add successfully');
				// redirect($_SERVER['HTTP_REFERER']);                
    // 	}
    // 	else
    //     {
    //         redirect(base_url('admin/login'));
    //     }
                   if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name9',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_water.water_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','6');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon9']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon9'))
                { 
                  $this->session->set_flashdata('imageError9','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','6');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('water_name'=>$data['name9'],
          'water_image'=>$img);
              $this->Campgrounds->insert('parameter_water',$insert_data);
               $this->session->set_flashdata('success', 'Water added successfully');
                $this->session->set_flashdata('section','6');
              redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }

    }

    public function update_water()
{
	  if(isset($this->adminId))
        {     
   					$data = $this->input->post();    
                $where = array('water_name' => $data['name'], 'water_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_water",$where);
           if(empty($findUnique)){
					$config['upload_path'] = './uploads/SideParameter/';
               		 $config['allowed_types'] = 'jpg|png';
               		 $config['encrpy_name']  = 100;
               		 $config['file_name'] = date("Y_m_d H_i_s");
              		$this->load->library('upload');
                   $this->upload->initialize($config);
   				if ( ! $this->upload->do_upload('icon'))
                { 
                	 $insert_data=array('water_name'=>$data['name'],
					);
                }
                else
                {   $file_data	=  $this->upload->data();
					$img  = $file_data['file_name'];
					 $insert_data=array('water_name'=>$data['name'],
					'water_image'=>$img);
                }
					$where = array('water_id' => $data['id']);
					$this->Campgrounds->update_data('water_id',$data['id'],'parameter_water',$insert_data,$where);
					$this->session->set_flashdata('success', 'Water updated successfully');
           $this->session->set_flashdata('section','6');
					redirect($_SERVER['HTTP_REFERER']);
                }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
            }
        
        else
        {
            redirect(base_url('admin/login'));
        } 
}

public function delete_water()
{

		  $data = $this->input->post();

     $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('water',$data['id']);

     $query = $this->db->get();        
       $val = $query->result();    

     if(empty($val))
     {
        $this->db->delete('parameter_water', array('water_id' => $data['id'])); 
         $this->session->set_flashdata('section','6');
        echo 'true';
     }else{
         $this->session->set_flashdata('section','6');
     }  

		
}

//sewer

public function new_sewer()

    {
    if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name10',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_sewer.sewer_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','6');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon10']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);

          if ( ! $this->upload->do_upload('icon10'))
                { 
                  $this->session->set_flashdata('imageError10','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','6');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('sewer_name'=>$data['name10'],
          'sewer_image'=>$img);
              $this->Campgrounds->insert('parameter_sewer',$insert_data);
               $this->session->set_flashdata('success', 'Sewer added successfully');
                $this->session->set_flashdata('section','6');
              redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }

    }


      public function update_sewer()
{
    if(isset($this->adminId))
        {     
            $data = $this->input->post();
              $where = array('sewer_name' => $data['name'], 'sewer_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_sewer",$where);
           if(empty($findUnique)){     
          $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon'))
                { 
                   $insert_data=array('sewer_name'=>$data['name'],
          );
                }
                else
                {   $file_data  =  $this->upload->data();
          $img  = $file_data['file_name'];
           $insert_data=array('sewer_name'=>$data['name'],
          'sewer_image'=>$img);
                }
          $where = array('sewer_id' => $data['id']);
          $this->Campgrounds->update_data('sewer_id',$data['id'],'parameter_sewer',$insert_data,$where);
          $this->session->set_flashdata('success', 'Sewer updated successfully');
           $this->session->set_flashdata('section','6');
          redirect($_SERVER['HTTP_REFERER']);
                }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
            
        }
        else
        {
            redirect(base_url('admin/login'));
        } 
}

public function delete_sewer()
{
    $data = $this->input->post();

     $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('sewer',$data['id']);

     $query = $this->db->get();        
       $val = $query->result();    

     if(empty($val))  
     {
            $this->db->delete('parameter_sewer', array('sewer_id' => $data['id'])); 
           $this->session->set_flashdata('section','6');
          echo 'true';
     }else{
       $this->session->set_flashdata('section','6');
     }


}

//verizon

public function new_verizon()
    {
     if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name11',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_verizon.verizon_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','7');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon11']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon11'))
                { 
                  $this->session->set_flashdata('imageError11','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','7');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('verizon_name'=>$data['name11'],
          'verizon_image'=>$img);
              $this->Campgrounds->insert('parameter_verizon',$insert_data);
               $this->session->set_flashdata('success', 'Sewer added successfully');
                $this->session->set_flashdata('section','7');
              redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }

    }

          public function update_verizon()
{
    if(isset($this->adminId))
        {     
            $data = $this->input->post();     
                $where = array('verizon_name' => $data['name'], 'verizon_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_verizon",$where);
           if(empty($findUnique)){
          $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                   $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon'))
                { 
                   $insert_data=array('verizon_name'=>$data['name'],
          );
                }
                else
                {   $file_data  =  $this->upload->data();
          $img  = $file_data['file_name'];
           $insert_data=array('verizon_name'=>$data['name'],
          'verizon_image'=>$img);
                }
          $where = array('verizon_id' => $data['id']);
          $this->Campgrounds->update_data('verizon_id',$data['id'],'parameter_verizon',$insert_data,$where);
          $this->session->set_flashdata('success', 'Verizon updated successfully');
          $this->session->set_flashdata('section','7');
          redirect($_SERVER['HTTP_REFERER']);
                }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
          
        }
        else
        {
            redirect(base_url('admin/login'));
        } 
}

public function delete_verizon()
{
    $data = $this->input->post();

      $data = $this->input->post();

     $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('verizon',$data['id']);

     $query = $this->db->get();        
     $val = $query->result();    

     if(empty($val))
     {
         $this->db->delete('parameter_verizon', array('verizon_id' => $data['id'])); 
          $this->session->set_flashdata('section','7');
          echo 'true';
     }else{
          $this->session->set_flashdata('section','7');
     }

   
}

//shade



public function new_shade()
    {
     if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name12',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_shade.shade_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','8');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon12']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon12'))
                { 
                  $this->session->set_flashdata('imageError12','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','8');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('shade_name'=>$data['name12'],
                                   'shade_image'=>$img);
              $this->Campgrounds->insert('parameter_shade',$insert_data);
               $this->session->set_flashdata('success', 'Shade added successfully');
                $this->session->set_flashdata('section','8');
              redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }

    }

         public function update_shade()
{
    if(isset($this->adminId))
        {     

            $data = $this->input->post(); 
                  $where = array('shade_name' => $data['name'], 'shade_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_shade",$where);
           if(empty($findUnique)){
          $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                   $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon'))
                { 
                   $insert_data=array('shade_name'=>$data['name'],
          );
                }
                else
                {   $file_data  =  $this->upload->data();
          $img  = $file_data['file_name'];
           $insert_data=array('shade_name'=>$data['name'],
          'shade_image'=>$img);
                }
          $where = array('shade_id' => $data['id']);
          $this->Campgrounds->update_data('shade_id',$data['id'],'parameter_shade',$insert_data,$where);
          $this->session->set_flashdata('success', 'Shade updated successfully');
                $this->session->set_flashdata('section','8');

          redirect($_SERVER['HTTP_REFERER']);
                }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
          
        }
        else
        {
            redirect(base_url('admin/login'));
        } 
}

public function delete_shade()
{
    $data = $this->input->post();

      $data = $this->input->post();

     $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('shadeType',$data['id']);

     $query = $this->db->get();        
       $val = $query->result();    

      if(empty($val))
      {
         $this->db->delete('parameter_shade', array('shade_id' => $data['id'])); 
                $this->session->set_flashdata('section','8');

        echo 'true';
      } else{
        $this->session->set_flashdata('section','8');
      }

   
}

//table



public function new_table()
    {
    
                     if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name13',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_table.table_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','9');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon13']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon13'))
                { 
                  $this->session->set_flashdata('imageError13','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','9');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('table_name'=>$data['name13'],
                                   'table_image'=>$img);
              $this->Campgrounds->insert('parameter_table',$insert_data);
               $this->session->set_flashdata('success', 'Tabel/Firing Grill/Grill parameter added successfully');
                $this->session->set_flashdata('section','9');
              redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }

    }

         public function update_table()
{
    if(isset($this->adminId))
        {     
          
                          $data = $this->input->post();   
                           $where = array('table_name' => $data['name'], 'table_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_table",$where);
           if(empty($findUnique)){             
                        $config['upload_path'] = './uploads/SideParameter/';
                                 $config['allowed_types'] = 'jpg|png';
                                 $config['encrpy_name']  = 100;
                                 $config['file_name'] = date("Y_m_d H_i_s");
                                 $this->load->library('upload');
                   $this->upload->initialize($config);
                        if ( ! $this->upload->do_upload('icon'))
                              { 
                                 $insert_data=array('table_name'=>$data['name'],
                        );
                              }
                              else
                              {   $file_data  =  $this->upload->data();
                        $img  = $file_data['file_name'];
                         $insert_data=array('table_name'=>$data['name'],
                        'table_image'=>$img);
                              }
                        $where = array('table_id' => $data['id']);
                        $this->Campgrounds->update_data('table_id',$data['id'],'parameter_table',$insert_data,$where);
                        $this->session->set_flashdata('success', 'Table updated successfully');
                              $this->session->set_flashdata('section','9');

                        redirect($_SERVER['HTTP_REFERER']);
                              }else{
                                  $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
                                  redirect($_SERVER['HTTP_REFERER']);
                                 }
                     }
        
        else
        {
            redirect(base_url('admin/login'));
        } 
}

public function delete_table()
{
    $data = $this->input->post();

     $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('s_table',$data['id']);

     $query = $this->db->get();        
       $val = $query->result();    

      if(empty($val))
      {
          $this->db->delete('parameter_table', array('table_id' => $data['id'])); 
                $this->session->set_flashdata('section','9');

         echo 'true';
      }else{
          $this->session->set_flashdata('section','9');
      }

    
  }
//wifi


public function new_wifi()
    {
      // if(isset($this->adminId))
      // {
      //  $data = $this->input->post();           
      //      $config['upload_path'] = './uploads/SideParameter/';
      //      $config['allowed_types'] = 'jpg|png';
      //      $config['encrpy_name']  = 100;
      //      $config['file_name'] = date("Y_m_d H_i_s");
      //     $this->load->library('upload', $config);
      //     if ( ! $this->upload->do_upload('icon'))
      //           { 
      //             print_r( $this->upload->display_errors());return;
      //           }
      //           else
      //           {   $file_data  =  $this->upload->data();
      //     $img  = $file_data['file_name'];
      //           }
      //           $insert_data=array('verizon_name'=>$data['name'],
      //     'verizon_image'=>$img);
      //   $this->Campgrounds->insert('parameter_verizon',$insert_data);
      //    $this->session->set_flashdata('success', 'Verizon add successfully');
      //   redirect($_SERVER['HTTP_REFERER']);                
      // }
      // else
      //   {
      //       redirect(base_url('admin/login'));
      //   }
                     if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name12',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_wifi.wifi_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','7');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon12']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon12'))
                { 
                  $this->session->set_flashdata('imageError12','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','7');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('wifi_name'=>$data['name12'],
          'wifi_image'=>$img);
              $this->Campgrounds->insert('parameter_wifi',$insert_data);
               $this->session->set_flashdata('success', 'Wifi added successfully');
                $this->session->set_flashdata('section','7');
              redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }

    }

          public function update_wifi()
{
    if(isset($this->adminId))
        {     

            $data = $this->input->post(); 
            $where = array('wifi_name' => $data['name'], 'wifi_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_wifi",$where);
           if(empty($findUnique)){
          $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                   $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon'))
                { 
                   $insert_data=array('wifi_name'=>$data['name'],
          );
                }
                else
                {   $file_data  =  $this->upload->data();
          $img  = $file_data['file_name'];
           $insert_data=array('wifi_name'=>$data['name'],
          'wifi_image'=>$img);
                }
          $where = array('wifi_id' => $data['id']);
          $this->Campgrounds->update_data('wifi_id',$data['id'],'parameter_wifi',$insert_data,$where);
          $this->session->set_flashdata('success', 'WIFI updated Successfully');
          $this->session->set_flashdata('section','7');
          redirect($_SERVER['HTTP_REFERER']);
                }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
          
        }
        else
        {
            redirect(base_url('admin/login'));
        } 
}

public function delete_wifi()
{
    $data = $this->input->post();

     $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('wifi',$data['id']);

     $query = $this->db->get();        
       $val = $query->result();    

       if(empty($val))
       {
            $this->db->delete('parameter_wifi', array('wifi_id' => $data['id'])); 
            $this->session->set_flashdata('section','7');
            echo 'true';
       }else{
           $this->session->set_flashdata('section','7');
       }

  
}

//for cable

public function new_cable()
    {
    if(isset($this->adminId))
      {
          $data = $this->input->post();
            $config = array(
          array(
                'field' => 'name13',
                'label' => 'Name',
                'rules' => 'required|is_unique[parameter_cable.cable_name]'
          ),
      );
            $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE)
                {
                    $ins =$this->form_validation->error_array();
                    $this->session->set_flashdata('error', $ins);
                    $this->session->set_flashdata('section','7');
                 redirect($_SERVER['HTTP_REFERER']);
                // $this->add_site_parameters();
                }
                else
                {
                   if (!empty($_FILES['icon13']['name'])) {
                  $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpeg|jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                  $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon13'))
                { 
                  $this->session->set_flashdata('imageError13','Only jpeg and png images are allowed');
                   $this->session->set_flashdata('section','7');
                  redirect($_SERVER['HTTP_REFERER']);
                  // print_r( $this->upload->display_errors());return;
                }
                else
                {   $file_data  =  $this->upload->data();
                   $img  = $file_data['file_name'];
                }
                  }else{
                $img='';
              }
                $insert_data=array('cable_name'=>$data['name13'],
          'cable_image'=>$img);
              $this->Campgrounds->insert('parameter_cable',$insert_data);
               $this->session->set_flashdata('success', 'Cable TV added successfully');
                $this->session->set_flashdata('section','7');
              redirect($_SERVER['HTTP_REFERER']);
                }
      }
      else
        {
            redirect(base_url('admin/login'));
        }

    }

          public function update_cable()
{
    if(isset($this->adminId))
        {     
            $data = $this->input->post();
                        $where = array('cable_name' => $data['name'], 'cable_id!='=>$data['id'] );
           $findUnique=$this->Campgrounds->find("parameter_cable",$where);
           if(empty($findUnique)){
          $config['upload_path'] = './uploads/SideParameter/';
                   $config['allowed_types'] = 'jpg|png';
                   $config['encrpy_name']  = 100;
                   $config['file_name'] = date("Y_m_d H_i_s");
                   $this->load->library('upload');
                   $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('icon'))
                { 
                   $insert_data=array('cable_name'=>$data['name'],
          );
                }
                else
                {   $file_data  =  $this->upload->data();
          $img  = $file_data['file_name'];
           $insert_data=array('cable_name'=>$data['name'],
          'cable_image'=>$img);
                }
          $where = array('cable_id' => $data['id']);
          $this->Campgrounds->update_data('cable_id',$data['id'],'parameter_cable',$insert_data,$where);
          $this->session->set_flashdata('success', 'Cable TV updated Successfully');
          $this->session->set_flashdata('section','7');
          redirect($_SERVER['HTTP_REFERER']);
                }else{
          $this->session->set_flashdata('error1', 'The Name field must contain a unique value.');
          redirect($_SERVER['HTTP_REFERER']);
         }
            
        }
        else
        {
            redirect(base_url('admin/login'));
        } 
}

public function delete_cable()
{

    $data = $this->input->post();

    $this->db->select("*");
     $this->db->from("sitedescription");
     $this->db->where('cableTv',$data['id']);

     $query = $this->db->get();        
     $val = $query->result();    
 
     if(empty($val))
     {
        $this->db->delete('parameter_cable', array('cable_id' => $data['id'])); 
        $this->session->set_flashdata('section','7');
        echo 'true';
     }else{
        $this->session->set_flashdata('section','7');
     }


    
}
    //for add spacig sorting
public function sorting($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('sp_id' =>$order['id'] );
          
                  $insert_data = array('order' => $order['position'] );
                    $this->Campgrounds->update_data('sp_id','','parameter_spacing',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reorder successfully');

}


 //for type view spacig sorting
public function sortspacingview($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('view_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('view_id','','parameter_view',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reorder successfully');

}

 //for camping sorting
public function sortcamping($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('camping_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('camping_id','','parameter_camping',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reorder successfully');

}
//for length sorting
public function sortlength($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('trailer_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('trailer_id','','parameter_trailer',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reorder successfully');

}

//for grade sorting
public function sortgrade($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('grade_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('grade_id','','parameter_grade',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reorder successfully');

}
//for base sorting
public function sortbase($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('base_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('base_id','','parameter_base',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reorder successfully');

}

//for access sorting
public function access_sorting($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('acess_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('acess_id','','parameter_acess',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reordered successfully');

}

//for amps sorting
public function sortamps($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('amp_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('amp_id','','parameter_amp',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reordered successfully');

}

//for amps sorting
public function sortwater($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('water_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('water_id','','parameter_water',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reordered successfully');

}

// /for sewer sorting
public function sortsewer($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('sewer_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('sewer_id','','parameter_sewer',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reordered successfully');

}

// /for sortverizon sorting
public function sortverizon($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('verizon_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('verizon_id','','parameter_verizon',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reordered successfully');

}

// /for  sortshade sorting
public function sortshade($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('shade_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('shade_id','','parameter_shade',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reordered successfully');

}
// /for  wifi sorting
public function sortwifi($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('wifi_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('wifi_id','','parameter_wifi',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reordered successfully');

}
// /for  cable sorting
public function sortcable($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('cable_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('cable_id','','parameter_cable',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reordered successfully');

}
// /for  table sorting
public function sorttable($value=""){
    $data = $this->input->post();
  $start=$data['start'];

             foreach ($data['order'] as $order) {
            
                  $where= array('table_id' =>$order['id'] );
          
                  $insert_data = array('order_by' => $order['position'] );
                    $this->Campgrounds->update_data('table_id','','parameter_table',$insert_data,$where);
                }
  $this->session->set_flashdata('success', 'Reordered successfully');

}
}
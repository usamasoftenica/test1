<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->layout="admin/layout/main-layout";

		if(isset($this->session->userdata['admindata']))
		{
			$this->adminId = $this->session->userdata['admindata']['adminId'];
		}
	}

	public function add_form_page()
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

	public function addForum()
	{
		$data['title']='Add forum';
		$data['yield']='admin/pages/blog_pages/add-blog-page.php';
		$this->load->view($this->layout,$data);
	}

}

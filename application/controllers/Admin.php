<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('adminModel');
	}

	public function index()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin\login"));
		}
		else
		$data = ['page'=>'admin\page\dashboard'	];
		$this->load->view('admin\index', $data);

		
	}

	public function login()
	{
		$this->load->view('admin\login');
	}

	public function doLogin()
	{
		$user = $this->input->post('user');
		$pwd = $this->input->post('pwd');
		// echo "0";
		// var_dump($user);
		$num = $this->adminModel->doLogin($user, $pwd);
		if ($num==0) {
			echo "0";
		}
		else{
			echo "1";
			// var_dump($this->session->userdata('name'));
		}
	}

	public function test(){
		$a = 'itfestusu2020';
		$p = password_hash("adminitfestusu2020admin", PASSWORD_DEFAULT);
		$data = ['username'=>$a, 'password' => $p];
		$this->db->insert('user', $data);
	}
}

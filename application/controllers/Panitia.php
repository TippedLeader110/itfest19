<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('panitiaModel');
	}	

	public function index()
	{
		$this->loginProtocol();
		$dataGet = $this->panitiaModel->getKompetisiinfo();
		$data = [
			'page'=>'panitia/page/dashboard',
			'title' => 'Dashboard',
			'dataGet' => $dataGet
		];
		$this->load->view('panitia/index', $data);
	}

	public function login()
	{
		// $this->session->set_userdata('rule', 'now-login');
		$this->load->view('panitia/login');
	}

	public function loginProtocol()
	{
		if(($this->session->userdata('status') != "login-panitia") && ($this->session->userdata('panitia-id') == NULL)){
			redirect(base_url("panitia/login"));
		}
	}

	public function doLogin()
	{
		$user = $this->input->post('user');
		$pwd = $this->input->post('pwd');
		// echo "0";
		// var_dump($user);
		$num = $this->panitiaModel->doLogin($user, $pwd);
		if ($num==0) {
			echo "0";
		}
		else{
			echo "1";
			// var_dump($this->session->userdata('name'));
		}
	}

	#######################TAHAP#########################

	public function tambahTahap()
	{
		$this->loginProtocol();
		$data = [
			'title' => 'Tambah Tahap'
		];
		$this->load->view('panitia/page/tahap', $data);
	}
}
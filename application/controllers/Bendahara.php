<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bendahara extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('bendaharaModel');
	}

	public function index()
	{
		$this->loginProtocol();
		$data = [
			'title' => 'Dashboard'
		];
		$this->load->view('bendahara/index', $data);
	}
	##################PANITIA###################

	
	public function testdelete($idLomba){
		$this->adminModel->deleteFile($idLomba);
	}

	##################Lomba#####################


	public function login()
	{
		$this->load->view('bendahara/login');
	}

	public function doLogin()
	{
		
		$user = $this->input->post('user');
		$pwd = $this->input->post('pwd');
		// echo "0";
		// var_dump($user);
		$num = $this->bendaharaModel->doLogin($user, $pwd);
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

	public function loginProtocol()
	{
		if(($this->session->userdata('status') == "login-bendahara")){
			
		}
		else{
			redirect(base_url("bendahara/login"));
		}
	}

	public function reSingkat()
	{
		$this->loginProtocol();
		$dataGet = $this->bendaharaModel->getSingkat();
		$dataGet2 = $this->bendaharaModel->getSingkat2();
		$data = [
			'title' => 'Laporan Singkat',
			'reTahap' => $dataGet,
			'reTahapkompe' => $dataGet2
		];
		$this->load->view('bendahara/page/reSingkat', $data);
	}

	public function logout()
	{
			$this->session->sess_destroy();
			redirect(base_url("bendahara/login"));
	}

	public function cekBayar()
	{
		$this->loginProtocol();
		$dataGet = $this->bendaharaModel->getDatafullTable('data_tim_aktif');
		$data = [
			'title' => 'Laporan Singkat',
			'cekBayar' => $dataGet
		];
		$this->load->view('bendahara/page/cekBayar', $data);
	}

	public function getTim()
	{
		$id = $this->input->get('tim');
		$dataGet = $this->bendaharaModel->getTim($id);
		// var_dump($dataGet);
		// die;
		$data = [
			'title' => 'Ambil data tim',
			'getTim' => $dataGet
		];
		$this->load->view('bendahara/page/subpage/getTim', $data);
	}

	public function doSimpan()
	{
		$status = $this->input->post('sel');
		$id = $this->input->post('id');
		if ($status==1) {
			$status = 'Active';
		}
		else{
			$status = 'Non-Active';	
		}
		$this->db->set('status_pembayaran', $status);
		$this->db->where('id_tim', $id);
		$this->db->update('tim');
	}
}

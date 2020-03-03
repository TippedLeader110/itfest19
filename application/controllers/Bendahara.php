<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bendahara extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('bendaharaModel');
		if (session_status() == PHP_SESSION_NONE) {
		}
    		$this->load->library('session');
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

	public function seminar()
	{
		$this->loginProtocol();
		$dbapi = $this->load->database('api', TRUE); 
		$s = $dbapi->get('seminar');
		$sem = $s->num_rows();
		$seminardata = $s->result();
		$sem2 = $dbapi->where('status_pembayaran', '1')->get('seminar')->num_rows();
		$sem3 = $dbapi->where('path_bukti', NULL, false)->get('seminar')->num_rows();
		$data = [
			'title' => 'Seminar',
			'sem' => $sem,
			'sem2' => $sem2,
			'sem3' => $sem3,
			'seminardata' => $seminardata
		];
		$this->load->view('bendahara/page/seminar', $data);
	}

	public function emailManual(){
		$data = array('nama' => $this->input->get('nama'),
			'bayar' => $this->input->get('bayar'),
			'qr' => $this->input->get('qr')
		 );
		$this->load->view('bendahara/page/email/email2', $data);
	}

	public function test(){
		$this->loginProtocol();
		$a = 'itfestusu2020';
		$p = password_hash("adminitfestusu2020admin", PASSWORD_DEFAULT);
		$data = ['username'=>$a, 'password' => $p];
		$this->db->insert('user', $data);
	}

	public function EmailConfirm()
	{
		$nilai = $this->uri->segment(3);
		$this->loginProtocol();
		$id = $this->input->post('id');
		$dbapi = $this->load->database('api', TRUE); 
		$dbapi->set('sended', $nilai);
		$dbapi->where('kode_seminar', $id);
		$dbapi->update('seminar');
	}

	public function warning()
	{
		$this->loginProtocol();
		$id = $this->input->post('val');
		$dbapi = $this->load->database('api', TRUE); 
		$dd = $dbapi->where('kode_seminar', $id)->get('seminar')->row();
		$em = $dd->email;
		$nama = $dd->nama;
		$warn = $dd->warn;
		$warn = $warn+1;
		$this->load->model('Seminar_email');
		if ($this->Seminar_email->warnSend($em,$warn,$nama)==true) {
			$dbapi->set('warn', $warn);
			$dbapi->where('kode_seminar', $id);
			$dbapi->update('seminar');
			echo "1";
		}
		else{
			echo "0";
		}
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
		$dbapi = $this->load->database('api', TRUE); 
		$sem = $dbapi->get('seminar')->num_rows();
		$data = [
			'title' => 'Laporan Singkat',
			'reTahap' => $dataGet,
			'reTahapkompe' => $dataGet2,
			'sem' => $sem
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
		$this->loginProtocol();
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

	public function getPeserta()
	{
		$this->loginProtocol();
		$id = $this->input->get('tim');
		$dbapi = $this->load->database('api', TRUE); 
		$datapeserta = $dbapi->where("kode_seminar", $id)->get('seminar')->result();
		// var_dump($dataGet);
		// die;
		$data = [
			'title' => 'Ambil data tim',
			'datapeserta' => $datapeserta
		];
		$this->load->view('bendahara/page/subpage/getPeserta', $data);
	}

	public function sdoSimpan()
	{
		$this->loginProtocol();
		$status = $this->input->post('sel');
		$id = $this->input->post('id');
		if ($status==1) {
			$status = '1';
		}
		else{
			$status = '0';	
		}
		$dbapi = $this->load->database('api', TRUE); 

		$q = $dbapi->where('kode_seminar', $id)->get('seminar')->row();

		$dbapi->set('status_pembayaran', $status);
		$this->load->model('Seminar_email');
        if ($status==1) {
        	if ($this->Seminar_email->kirim2($q->nama,$id,$q->email)) {
			$dbapi->set('sended', 1);
		}
        }
		
		$dbapi->where('kode_seminar', $id);
		$dbapi->update('seminar');
	}

	public function doSimpan()
	{
		$this->loginProtocol();
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

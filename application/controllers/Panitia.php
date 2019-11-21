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
	###################Report page#######################

	public function reSingkat()
	{
		$this->loginProtocol();
		$id = $this->session->userdata('panitia-id');
		$dataGet = $this->panitiaModel->getSingkat($id);
		$data = [
			'title' => 'Laporan Singkat',
			'reTahap' => $dataGet
		];
		$this->load->view('panitia/page/reSingkat', $data);
	}

	public function reTahap()
	{
		$this->loginProtocol();
		$id = $this->session->userdata('panitia-id');
		$dataGet = $this->panitiaModel->getTahap($id);
		$data = [
			'title' => 'Laporan Singkat',
			'reTahap' => $dataGet,
		];
		$this->load->view('panitia/page/reTahap', $data);
	}

	public function subreTahap(){
		$this->loginProtocol();
		$tahap = $this->uri->segment(3);
		$id = $this->session->userdata('panitia-id');
		$dataGet = $this->panitiaModel->detailTahap($id,$tahap);
		$data = [
			'subreTahap' => $dataGet
		];
		$this->load->view('panitia/page/subpage/reTahap', $data);	
	}

	#######################TAHAP#########################
	public function Tahap()
	{
		$this->loginProtocol();
		$dataGet = $this->panitiaModel->getKompetisiTahap();
		$data = [
			'title' => 'Tambah Tahap',
			'dataTahap' => $dataGet
		];
		$this->load->view('panitia/page/tahap', $data);
	}

	public function hapusTahap(){
		$id = $this->input->post('value');
		$done = $this->panitiaModel->delDatabyid('tahap_lomba', 'id_tahap', $id);
		echo $done;
	}

	public function tambahTahap()
	{
		$this->loginProtocol();
		$data = [
			'title' => 'Tambah Tahap'
		];
		$this->load->view('panitia/page/tambahTahap', $data);
	}

	public function doTambahtahap(){
		$config['upload_path']="./public/kompetisi/tahap/"; //path folder file upload
        $config['allowed_types']='pdf|JPEG|jpg|pdf'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $this->load->library('upload',$config,'tahapUP'); //call library upload 
        $this->tahapUP->initialize($config);
        if($this->tahapUP->do_upload("file")){ //upload file
            $data = array('upload_data' => $this->tahapUP->data()); //ambil file name yang diupload
            $filename= $data['upload_data']['file_name']; //set file name ke variable image
            $desk = $this->input->post('deskripsi');
            $id = $this->input->post('id');
            $this->panitiaModel->kompetisi_tahapTambah($filename,$desk,$id); //simpan data sementara
            echo "1";
        }
        else{
        	echo "Gagal Upload / Unknown Folder / Tidak ada permission DIR";
        }
	}
}

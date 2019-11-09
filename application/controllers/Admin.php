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
		$data = [
			'page'=>'admin\page\dashboard',
			'title' => 'Dashboard'
		];
		$this->load->view('admin\index', $data);
	}


	##################LOMBA#####################



	public function lomba(){
		$data = [
			'page'=>'admin\page\Lomba',
			'title' => 'Kompetisi'
		];
		$this->load->view('admin\index', $data);
	}

	public function tambahLomba(){
		$data = [
			'page'=>'admin\page\tambahLomba',
			'title' => 'Tambah Kompetisi'
		];
		$this->load->view('admin\index', $data);
	}
	public function DoTambahlomba(){
		
		$config['upload_path']="./public/kompetisi/logo/"; //path folder file upload
        $config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $this->load->library('upload',$config,'logoup'); //call library upload 
        $this->logoup->initialize($config);
        if($this->logoup->do_upload("logo")){ //upload file
            $data = array('upload_data' => $this->logoup->data()); //ambil file name yang diupload
            $image= $data['upload_data']['file_name']; //set file name ke variable image
            $this->adminModel->kompetisi_FlashLOGO($image); //simpan data sementara
            $ver = 1;
        }

        $config['upload_path']="./public/kompetisi/rule/"; //path folder file upload
        $config['allowed_types']='pdf'; //type file yang boleh di upload
        $this->load->library('upload',$config,'ruleup');
        $this->ruleup->initialize($config);
        if($this->ruleup->do_upload("rule")){ //upload file
            $data = array('upload_data' => $this->ruleup->data()); //ambil file name yang diupload
            $pdf= $data['upload_data']['file_name']; //set file name ke variable pdf
            $this->adminModel->kompetisi_FlashRULE($pdf); //simpan data sementara
            $ver = 1;
        }
        if ($ver == 1) {
        $ver=0;
        $deskripsi = $this->input->post('deskripsi');
        $nama = $this->input->post('nama');
        $this->adminModel->kompetisiDoTambah($deskripsi,$nama);
        echo "1";
        }
        else{
        	echo "0";
        }
	}


	##################Lomba#####################



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

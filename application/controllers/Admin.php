<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('adminModel');
		$this->load->library('session');
	}

	public function index()
	{
		$this->loginProtocol();
		$data = [
			'page'=>'admin/page/dashboard',
			'title' => 'Dashboard'
		];
		$this->load->view('admin/index', $data);
	}
	##################PANITIA###################

	public function panitia(){
		$this->loginProtocol();
		$data = [
			'title' => 'Kompetisi'
		];
		$this->load->view('admin/page/Panitia', $data);
	}

	public function dataPanitia(){
		
		// $dataPanitia = $this->adminModel->getDatafullTable('user_lomba');

		$this->load->library('pagination');
		$config['per_page'] = 10;
		if ($this->uri->segment(3)==null) {
			$from = 0;
		}
		else{
			$from = $this->uri->segment(3);
		}
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		$data['from'] = $from;
		if ($this->input->get('cari')!=NUll) {
			$cari = $this->input->get('cari');
			$dataGet = $this->adminModel->getPanitiacari($config['per_page'],$from,$cari);
			$jumlah_data = $this->adminModel->sumPanitiacari($cari);
			$data = [
				'title' => 'Daftar Panitia',
				'dataPanitia' => $dataGet,
				'cari' => $cari,
				'num' => $from
			];
		}
		else{
			$dataGet = $this->adminModel->getPanitia($config['per_page'],$from);
			// var_dump($dataGet);
			$jumlah_data = $this->adminModel->sumPanitia();
			$data = [
				'title' => 'Daftar Panitia',
				'dataPanitia' => $dataGet,
				'num' => $from
			];
		}
		$config['total_rows'] = $jumlah_data;
		$this->pagination->initialize($config);		
		$this->load->view('admin/page/ajax/panitia', $data);
	}

	public function tambahPanitia(){
		$this->loginProtocol();
		$dataLomba = $this->adminModel->getDatafullTable('lomba');
		$data = [
			'title' => 'Tambah Panitia',
			'dataLomba' => $dataLomba
		];
		$this->load->view('admin/page/tambahPanitia',	 $data);
	}

	public function DoTambahpanitia(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$kompetisi = $this->input->post('kompetisi');
		$this->adminModel->tambahPanitia($username,$password,$kompetisi);
		

	}

	##################PANITIA###################

	public function tim(){
		$this->loginProtocol();
		$dataTim = $this->adminModel->getDatafullTable('data_tim_ketua');
		$data = [
			'title' => 'Data Tim',
			'dataTim' => $dataTim
		];
		$this->load->view('admin/page/tim', $data);
	}
	##################TIM#######################

	##################LOMBA#####################

	

	public function logTim(){
		$this->loginProtocol();
		$logTim = $this->adminModel->getDatafullTable('log_tim_en');
		$data = [
			'title' => 'log TIm',
			'logTim' => $logTim
		];
		$this->load->view('admin/page/logTim', $data);
	}



	public function logPanitia(){
		$this->loginProtocol();
		$logPanitia = $this->adminModel->getDatafullTable('log_panitia_en');
		$data = [
			'title' => 'log Panitia',
			'logPanitia' => $logPanitia
		];
		$this->load->view('admin/page/logPanitia', $data);
	}




	public function lomba(){
		$this->loginProtocol();
		$dataLomba = $this->adminModel->getDatafullTable('lomba');
		$data = [
			'title' => 'Kompetisi',
			'dataLomba' => $dataLomba
		];
		$this->load->view('admin/page/Lomba', $data);
	}

	public function editLomba(){
		$this->loginProtocol();
		$id = $this->uri->segment(3);
		$dataLomba = $this->adminModel->getDatabyID($id,'id_lomba','lomba');
		$data = [
			'title' => 'Edit Kompetisi',
			'dataLomba' => $dataLomba
		];
		$this->load->view('admin/page/editLomba', $data);
	}

	public function tambahLomba(){
		$this->loginProtocol();
		$data = [
			'title' => 'Tambah Kompetisi'
		];
		$this->load->view('admin/page/tambahLomba', $data);
	}

	public function DoTambahlomba(){
		$this->loginProtocol();
		$config['upload_path']="./public/kompetisi/logo/"; //path folder file upload
        $config['allowed_types']='*'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $this->load->library('upload',$config,'logoup'); //call library upload 
        $this->logoup->initialize($config);
        // var_dump("done1");
        // echo $this->logoup->display_errors(); 
        if($this->logoup->do_upload("logo")){ //upload file
            $data = array('upload_data' => $this->logoup->data()); //ambil file name yang diupload
            $image= $data['upload_data']['file_name'];
            $this->adminModel->kompetisi_FlashLOGO($image); //simpan data sementara
            $ver1 = 1;
        }
        else{
        	$ver1 = 0;
        }
        echo $this->logoup->display_errors(); 
        $config['encrypt_name'] = TRUE;
        $config['upload_path']="./public/kompetisi/rule/"; //path folder file upload
        $config['allowed_types']='*'; //type file yang boleh di upload
        $this->load->library('upload',$config,'ruleup');
        $this->ruleup->initialize($config);
        if($this->ruleup->do_upload("rule")){ //upload file
            $data = array('upload_data' => $this->ruleup->data()); //ambil file name yang diupload
            $pdf= $data['upload_data']['file_name']; //set file name ke variable pdf
            $this->adminModel->kompetisi_FlashRULE($pdf); //simpan data sementara
            $ver2 = 1;
        }
        else{
        	$ver2 = 0;
        }
        if ($ver1==1 && $ver2==1) {
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


	public function DoEditlomba(){
		$this->loginProtocol();
		$config['upload_path']="./public/kompetisi/logo/"; //path folder file upload
        $config['allowed_types']='*'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $this->load->library('upload',$config,'logoup'); //call library upload 
        $this->logoup->initialize($config);
        // var_dump("done1");
        // echo $this->logoup->display_errors(); 
        if($this->logoup->do_upload("logo")){ //upload file
            $data = array('upload_data' => $this->logoup->data()); //ambil file name yang diupload
            $image= $data['upload_data']['file_name'];
            $this->adminModel->kompetisi_FlashLOGO($image); //simpan data sementara
            $ver1 = 1;
        }
        else{
        	$ver1 = 0;
        }
        echo $this->logoup->display_errors(); 
        $config['encrypt_name'] = TRUE;
        $config['upload_path']="./public/kompetisi/rule/"; //path folder file upload
        $config['allowed_types']='pdf|PDF'; //type file yang boleh di upload
        $this->load->library('upload',$config,'ruleup');
        $this->ruleup->initialize($config);
        if($this->ruleup->do_upload("rule")){ //upload file
            $data = array('upload_data' => $this->ruleup->data()); //ambil file name yang diupload
            $pdf= $data['upload_data']['file_name']; //set file name ke variable pdf
            $this->adminModel->kompetisi_FlashRULE($pdf); //simpan data sementara
            $ver2 = 1;
        }
        else{
        	$ver2 = 0;
        }
        if ($ver1==1 && $ver2==1) {
        $ver=0;
        $deskripsi = $this->input->post('deskripsi');
        var_dump($deskripsi);
        $nama = $this->input->post('nama');
        var_dump($nama);
        $id = $this->input->post('id');
        var_dump($id);

        $this->adminModel->kompetisiDoEdit($deskripsi,$nama,$id);
        echo "1";
        }
        else{
        	echo "0";
        }
	}

	public function doHapuslomba(){
		$this->loginProtocol();
		$idLomba = $this->input->post('value');
		if ($this->adminModel->deleteFile($idLomba)==1) {
			$this->adminModel->deleteDatabyID($idLomba,'id_lomba','lomba');
			echo 'Deleted by ID : '.$idLomba.'';
		}
		else{
			echo "Something went wrong !!";
		}

	}

	public function reSingkat()
	{
		$this->loginProtocol();
		$dataGet = $this->adminModel->getSingkat();
		$dataGet2 = $this->adminModel->getSingkat2();
		$data = [
			'title' => 'Laporan Singkat',
			'reTahap' => $dataGet,
			'reTahapkompe' => $dataGet2
		];
		$this->load->view('admin/page/reSingkat', $data);
	}

	public function doHapusPanitia()
	{
		$this->loginProtocol();
		$id = $this->input->post('value');
		if ($this->adminModel->deleteDatabyID($id,'id_user','user')) {
			echo 'Deleted by ID : '.$id.'';
		}
	}

	public function testdelete($idLomba){
		$this->loginProtocol();
		$this->adminModel->deleteFile($idLomba);
	}

	##################Lomba#####################



	public function login()
	{
		$this->session->sess_destroy();
		$this->load->view('admin/login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("admin/login"));
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

	public function loginProtocol()
	{
		if(($this->session->userdata('status') == "login-admin")){
			
		}
		else{
			redirect(base_url("admin/login"));
		}
	}

	public function email()
	{
		$this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'Itfestusu@gmail.com';
        $mail->Password = 'ITfestusu@1';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('Itfestusu@gmail.com', 'ITFEST USU 2020 CS');
        $mail->addReplyTo('Itfestusu@gmail.com', 'ITFEST USU 2020 CS');
        
        // Add a recipient
        $mail->addAddress('bayhaqi101@gmail.com');
        
        // Add cc or bcc 
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;
        
        // Send email
        echo "1";
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
	}	
}

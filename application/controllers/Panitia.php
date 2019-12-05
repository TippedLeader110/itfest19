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
		$this->session->sess_destroy();
		$this->load->view('panitia/login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("panitia/login"));
	}

	public function loginProtocol()
	{
		if(($this->session->userdata('status') == "login-panitia")){
			
		}
		else{
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

	public function reBerkas()
	{
		$this->loginProtocol();
		$id = $this->session->userdata('panitia-id');
		$dataGet = $this->panitiaModel->getBerkas($id);
		$this->db->close();
		$dataGet2 = $this->panitiaModel->getSingkat($id);
		$data = [
			'title' => 'Laporan Singkat',
			'reBerkas' => $dataGet,
			'reSingkat' => $dataGet2
		];
		$this->load->view('panitia/page/reBerkas', $data);
	}
	#######################TIM###########################

	public function seleksiTim()
	{
		$this->loginProtocol();
		$id = $this->session->userdata('panitia-id');
		$dataGet = $this->panitiaModel->getTahap($id);
		$data = [
			'title' => 'Kelolah Tim Peserta',
			'seleksiTim' => $dataGet
		];
		$this->load->view('panitia/page/seleksiTim', $data);	
	}

	public function subseleksiTim()
	{	
		$id = $this->session->userdata('panitia-id');
		$id_tahap = $this->input->get('id');
		$this->loginProtocol();
		// $getData = $this->panitiaModel->getseleksiTim($id_tahap);
		$data = [
			'title' => 'Kelolah Tim Peserta',
			'id' => $id_tahap
		];
		$this->load->view('panitia/page/subpage/seleksiTim', $data);		
	}

	public function subTim()
	{	
		$this->loginProtocol();
		$id = $this->session->userdata('panitia-id');


		$this->load->library('pagination');
		$config['per_page'] = 10;
		if ($this->uri->segment(3)=='') {
			$from = 0;
		}
		else{
		$from = $this->uri->segment(3);
		}
		// var_dump($from);
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
		$tag = $this->input->get('tag');
		$id_tahap = $this->input->get('id');
		if ($this->input->get('cari')!=NUll) {
			$cari = $this->input->get('cari');
			// $dataGet = $this->panitiaModel->getBerkascari($config['per_page'],$from,$id,$cari,$tag);
			$dataGet = $this->panitiaModel->getseleksiTimcari($config['per_page'],$from,$id_tahap,$cari,$tag);
			$jumlah_data = $this->panitiaModel->sumseleksiTimcari($cari,$id_tahap,$tag);
			$data = [
				'title' => 'Kelolah Tim Peserta',
				'seleksiTim' => $dataGet,
				'cari' => $cari,
				'id' => $id_tahap,
				'tag' => $tag
			];
		}
		else{
			$dataGet = $this->panitiaModel->getseleksiTim($config['per_page'],$from,$id_tahap,$tag);
			$jumlah_data = $this->panitiaModel->sumseleksiTim($id_tahap,$tag);
			$data = [
				'title' => 'Kelolah Tim Peserta',
				'seleksiTim' => $dataGet,
				'id' => $id_tahap,
				'tag' => $tag
			];
		}
		$config['total_rows'] = $jumlah_data;
		$this->pagination->initialize($config);		


		$this->load->view('panitia/page/subpage/subTim', $data);		
	}

	public function seleksiBerkas()
	{
		$this->loginProtocol();
		
		$data = [
			'title' => 'Kelolah Tim Peserta'
		];
		$this->load->view('panitia/page/seleksiBerkas', $data);
	}

	public function subseleksiBerkas()
	{
		$this->loginProtocol();
		// if ($this->input->get('cari')!=null) {
			// var_dump($this->input->get('cari'));
		// }
		$id = $this->session->userdata('panitia-id');
		// $dataGet = $this->panitiaModel->getTim($id);
		$this->load->library('pagination');
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
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
		$tag = $this->input->get('tag');
		if ($this->input->get('cari')!=NUll) {
			$cari = $this->input->get('cari');
			$dataGet = $this->panitiaModel->getBerkascari($config['per_page'],$from,$id,$cari,$tag);
			$jumlah_data = $this->panitiaModel->sumBerkascari('tim',$id,$cari,$tag);
			$data = [
				'title' => 'Kelolah Tim Peserta',
				'daftarTim' => $dataGet,
				'cari' => $cari,
				'tag' => $tag
			];
		}
		else{
			$dataGet = $this->panitiaModel->getBerkas2($config['per_page'],$from,$id,$tag);
			$jumlah_data = $this->panitiaModel->sumBerkas('tim',$id,$tag);
			$data = [
				'title' => 'Kelolah Tim Peserta',
				'daftarTim' => $dataGet,
				'tag' => $tag
			];
		}
		$config['total_rows'] = $jumlah_data;
		$this->pagination->initialize($config);		
		
		$this->load->view('panitia/page/subpage/seleksiBerkas', $data);
	}

	public function daftarTim(){
		$this->loginProtocol();
		
		$data = [
			'title' => 'Kelolah Tim Peserta'
		];
		$this->load->view('panitia/page/daftarTim', $data);
	}

	public function subdaftarTim()
	{
		$this->loginProtocol();
		// }
		$id = $this->session->userdata('panitia-id');
		// $dataGet = $this->panitiaModel->getTim($id);
		$this->load->library('pagination');
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
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
			$dataGet = $this->panitiaModel->getTimcari($config['per_page'],$from,$id,$cari);
			$jumlah_data = $this->panitiaModel->sumDatacari('tim',$id,$cari);
			$data = [
				'title' => 'Kelolah Tim Peserta',
				'daftarTim' => $dataGet,
				'cari' => $cari
			];
		}
		else{
			$dataGet = $this->panitiaModel->getTim($config['per_page'],$from,$id);
			$jumlah_data = $this->panitiaModel->sumData('tim',$id);
			$data = [
				'title' => 'Kelolah Tim Peserta',
				'daftarTim' => $dataGet
			];
		}
		$config['total_rows'] = $jumlah_data;
		$this->pagination->initialize($config);		
		
		$this->load->view('panitia/page/subpage/daftarTim', $data);
	}

	public function modalTim()
	{
		$this->loginProtocol();
		$tim = $this->input->get('tim');
		$tag = $this->input->get('tag');
		// var_dump($tim);
		$dataGet = $this->panitiaModel->infoTim($tim);
		$data = [
				'title' => 'Kelolah Tim Peserta',
				'modalTim' => $dataGet,
				'tag' => $tag
			];
		$this->load->view('panitia/page/subpage/modalTim', $data);
	}

	public function modalTimseleksi()
	{
		$this->loginProtocol();
		$tim = $this->input->get('tim');
		$id = $this->input->get('id');
		$tag = $this->input->get('tag');
		// var_dump($tim);
		$dataGet = $this->panitiaModel->infoseleksiTim($tim,$id);
		$data = [
				'title' => 'Kelolah Tim Peserta',
				'modalTim' => $dataGet,
				'tag' => $tag
			];
		$this->load->view('panitia/page/subpage/modalseleksiTim', $data);
	}

	public function saveStatus(){
		$val = $this->input->post('value');
		$tim = $this->input->post('tim');
		$tahap = $this->input->post('tahap');
		$this->db->set('status_tim',$val);
		$this->db->where('id_tahap', $tahap);
		$this->db->where('id_tim', $tim);
		$this->db->update('tahap_tim');
	}

	public function saveBerkas(){
		$val = $this->input->post('value');
		$tim = $this->input->post('tim');
		$this->db->set('status_tim',$val);
		$this->db->where('id_tim', $tim);
		$this->db->update('tim');
	}
	#######################TIM###########################
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

	public function Post()
	{
		$this->loginProtocol();
		$dataGet = $this->panitiaModel->getDatafullTable('post');
		$data = [
			'title' => 'Tambah Tahap',
			'post' => $dataGet
		];
		$this->load->view('panitia/page/post', $data);	
	}

	public function hapusTahap(){
		$id = $this->input->post('value');
		$done = $this->panitiaModel->delDatabyid('tahap_lomba', 'id_tahap', $id);
		echo $done;
	}

	public function hapusPost(){
		$id = $this->input->post('value');
		$done = $this->panitiaModel->delDatabyid('post', 'id_post', $id);
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

	public function tambahPost()
	{
		$this->loginProtocol();
		$data = [
			'title' => 'Tambah Tahap'
		];
		$this->load->view('panitia/page/tambahPost', $data);
	}

	public function editTahap()
	{
		$this->loginProtocol();
		$id_tahap = $this->uri->segment(3);
		$editTahap = $this->db->where('id_tahap', $id_tahap)->get('tahap_lomba')->result();
		$data = [
			'title' => 'Edit Tahap',
			'editTahap' => $editTahap
		];
		$this->load->view('panitia/page/editTahap', $data);
	}

	public function editPost()
	{
		$this->loginProtocol();
		$id_post = $this->uri->segment(3);
		$post = $this->db->where('id_post', $id_post)->get('post')->result();
		$data = [
			'title' => 'Edit post',
			'editPost' => $post,
			'post' => $id_post
		];
		$this->load->view('panitia/page/editPost', $data);
	}

	public function doSimpanPost()
	{
		$this->loginProtocol();
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$id = $this->input->post('id');
		$oldid = $this->input->post('oldid');
		if($this->panitiaModel->updatePost($judul,$isi,$id,$oldid)) {
			echo "done";
		}
	}

	public function doTambahtahap(){
		$config['upload_path']="./public/kompetisi/tahap/"; //path folder file upload
        $config['allowed_types']='PDF|JPEG|jpg|pdf|docx|doc'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $this->load->library('upload',$config,'tahapUP'); //call library upload 
        $this->tahapUP->initialize($config);
        $data = array('upload_data' => $this->tahapUP->data()); //ambil file name yang diupload
        if($this->tahapUP->do_upload("file")){ //upload file
            $data = array('upload_data' => $this->tahapUP->data()); //ambil file name yang diupload
            $filename= $data['upload_data']['file_name']; //set file name ke variable image
            $desk = $this->input->post('deskripsi');
            $id = $this->input->post('id');
            $deadline = $this->input->post('deadline');
            $this->panitiaModel->kompetisi_tahapTambah($filename,$desk,$id,$deadline); //simpan data sementara
            echo "1";
        }
        else{
        	echo "Gagal Upload / Format file tidak didukung (jpg|pdf|docx|doc)";
        }
	}

	public function doTambahPost()
	{
		$this->loginProtocol();
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$id = $this->input->post('id');
		if ($this->panitiaModel->tambahPost($judul,$isi,$id)) {
			echo "done";
		}
	}

	public function doEdittahap(){
		$this->loginProtocol();
		$config['upload_path']="./public/kompetisi/tahap/"; //path folder file upload
        $config['allowed_types']='PDF|JPEG|jpg|pdf|docx|doc'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $this->load->library('upload',$config,'tahapUP'); //call library upload 
        $this->tahapUP->initialize($config);

        if($this->tahapUP->do_upload("file")){ //upload file
            $data = array('upload_data' => $this->tahapUP->data()); //ambil file name yang diupload
            $filename= $data['upload_data']['file_name']; //set file name ke variable image
            $desk = $this->input->post('deskripsi');
            $origin = $this->input->post('origin');
            $id = $this->input->post('id');
            $deadline = $this->input->post('deadline');
            $this->panitiaModel->kompetisi_tahapEdit($filename,$desk,$id,$deadline,$origin); //simpan data sementara
            echo "1";
        }
        else{
        	echo "Gagal Upload / Format file tidak didukung (jpg|pdf|docx|doc)";
        }	
	}

}

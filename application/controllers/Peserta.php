<?php
class Peserta extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Peserta_Model');
	}
	/**
	 * Index Page for this controller
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
	public function login_protocol(){
		if(is_null($this->session->userdata('id_tim'))){
			redirect(base_url('index.php/Peserta/login_page'));
		}
	}
	public function login_page(){
		$this->load->view('peserta/login');
	}
	public function login(){
		$username = $this->input->post('user');
		$password = $this->input->post('pwd');

		$data = array(
						'username_tim' => $username,
						'password_tim' => md5($password),
						'status_tim' => 1,
		);

		$success = $this->Peserta_Model->login($data);
		if($success){
			echo "1";
		}
		else{
			echo "0";
		}
	}
	public function logout(){
		session_start();
		session_unset();
		session_destroy();
		header("location:login_page");
	}
	public function index(){
		$this->login_protocol();

		$id_team = ['id_tim'=>$this->session->userdata('id_tim')];
		$data_tim = $this->Peserta_Model->ambil_data_tim($id_team);

		$data = array(
			'page'=>'peserta/page/home',
			'title' => 'Dashboard',
			'data_tim' => $data_tim

		);

		$this->load->view('peserta/index',$data);
	}

	public function upload_file_kompetisi(){
		$this->input->post('id_kompetisi');
	}
	public function kontenHome(){
		$this->load->view('peserta/page/home');
	}
	public function kontenProgres(){
		$this->load->view('peserta/page/progres');
	}
	public function upload_bukti_pembayaran(){
		$this->load->view('peserta/page/upload_bukti_pembayaran');
	}
	public function upload_berkas(){
		$this->load->view('peserta/page/upload_berkas');
	}
}
?>
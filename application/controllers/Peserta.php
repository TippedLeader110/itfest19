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
			redirect(base_url('index.php/Peserta/loginpage'));
		}
	}
	public function loginpage(){
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
	public function index(){
		$this->login_protocol();
		$data = [
			'page'=>'peserta/page/dashboard',
			'title' => 'Dashboard'
		];

		$this->load->view('peserta/index',$data);
	}


}
?>
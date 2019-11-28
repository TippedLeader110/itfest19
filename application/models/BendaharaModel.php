<?php
define('PUBPATH',str_replace(SELF,'',FCPATH)); // added
defined('BASEPATH') OR exit('No direct script access allowed');

class bendaharaModel extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function getIP(){
		$ip = getenv('HTTP_CLIENT_IP')?:
		getenv('HTTP_X_FORWARDED_FOR')?:
		getenv('HTTP_X_FORWARDED')?:
		getenv('HTTP_FORWARDED_FOR')?:
		getenv('HTTP_FORWARDED')?:
		getenv('REMOTE_ADDR');
		return $ip;
	}

	public function doLogin($user_real, $pwd)
	{

		$user = $this->db
			->where('username', $user_real)
			->where('id_lomba', 0)
			->get('user');
		// var_dump($user_real);die;
		// var_dump($user->result());die;
		$match = password_verify($pwd , $user->row()->password);
		$id = $user->row()->id_user;
		$nama = $user->row()->nama;
		$user = $user->row()->username;
		if ($match) {
				$this->session->set_userdata([
					'username' =>  $user,
					'status' => 'login-bendahara',
					'name' => $nama
				]);
				$this->LogLoginBendahara();
				return 1;
		}
		else
		{
			return 0;
		}
	}

	public function LogLoginBendahara(){
		$ip = $this->getIP();
		$user = $this->session->userdata('username');
		$query = $this->db
			->where('username', $user)
			->get('user');
		$id_panitia = $query->row()->id_user;
		$data = array('ip_address' => $ip,
			'keterangan' => 'Login Admin',
			'waktu' => date("Y-m-d H:i:s"),
			'id_panitia' => $id_panitia
		 );
		$this->db->insert('log_panitia', $data);
	}

		public function getSingkat()
	{
		$query = $this->db->get('jumlah_all');
        return $query->result();
	}

	public function getSingkat2()
	{
		$query = $this->db->get('jumlah_tim_lomba');
        return $query->result();
	}

	public function getDatafullTable($table){
		$data = $this->db->get($table)->result();
		return $data;
	}
	
	public function getTim($id)
	{
		return $this->db->where('id_tim', $id)->get('data_tim_aktif')->result();
	}
}
?>

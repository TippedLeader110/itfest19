<?php
define('PUBPATH',str_replace(SELF,'',FCPATH)); // added
defined('BASEPATH') OR exit('No direct script access allowed');

class adminModel extends CI_Model {

	function __construct(){
		parent::__construct();


	}

	public function doLogin($user_real, $pwd)
	{
		$user = $this->db
			->where('username', $user_real)
			->get('user');
		// var_dump($user_real);die;
		// var_dump($user->result());die;
		$match = password_verify($pwd , $user->row()->password);
		$id = $user->row()->id_user;
		$nama = $user->row()->nama;

		$num2 = $this->db
		->where('keterangan_panitia', 'super_admin')
		->where('id_panitia', $id)
		->get('panitia')->num_rows();


		if ($num2==0) {
			return 0;
		}
		else
		{
			$num = $user->num_rows();
			if ($match) 
			{
				$this->session->set_userdata([
					'username' =>  $user,
					'status' => 'login',
					'name' => $nama
				]);
				return $num;
			}
			else{
				return 0;
				}				
		}
	}


	public function kompetisi_FlashLOGO($data)
	{
		$this->session->set_userdata('logo', $data);
	}

	public function kompetisi_FlashRULE($data)
	{
		$this->session->set_userdata('rule', $data);
	}

	public function kompetisiDoTambah($deskripsi, $nama)
	{	
		$rule = $this->session->userdata('rule');
		$logo = $this->session->userdata('logo');
		$data = array('deskripsi' => $deskripsi,
			'nama_lomba' => $nama,
			'rule' => $rule,
			'url_logo' => $logo
		);

		$this->db->insert('lomba', $data);
		$this->session->unset_userdata('rule');
		$this->session->unset_userdata('logo');
	}

	public function getDatafullTable($table){
		$data = $this->db->get($table)->result();
		return $data;
	}

	public function deleteDatabyID($id,$kolomID,$table){
		$this->db->where($kolomID , $id)->delete($table);
		return 1;
	}

	public function deleteFile($id){
		$data = $this->db->where('id_lomba', $id)->get('lomba');
		$logo = $data->row()->url_logo;
		$rule = $data->row()->rule;
		$logolink = PUBPATH.'public/kompetisi/logo/'.$logo;
		$rulelink = PUBPATH.'public/kompetisi/rule/'.$rule;
		if (unlink($logolink)) {
			echo "deleted file : " .$logo;
		}
		if (unlink($rulelink)) {
			echo "deleted file L " .$rule;
			return 1;
		}


		
	}
}
?>
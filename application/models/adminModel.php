<?php
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

}

?>
<?php
define('PUBPATH',str_replace(SELF,'',FCPATH)); // added
defined('BASEPATH') OR exit('No direct script access allowed');

class panitiaModel extends CI_Model {

	function __construct(){
		parent::__construct();
	}


	public function doLogin($user_real, $pwd)
	{
		$user = $this->db
			->where('username', $user_real)
			->get('user');
			
		$match = password_verify($pwd , $user->row()->password);
		$id = $user->row()->id_user;
		$nama = $user->row()->nama;
		$num2 = $user->row()->id_lomba;
		$username = $user->row()->username;

		if (!isset($num2)) {
			return 0;
		}
		else
		{
			if ($match) 
			{
				$this->session->set_userdata([
					'username' =>  $username,
					'status' => 'login-panitia',
					'name' => $nama,
					'panitia-id' => $num2,
				]);
				$this->LogLoginPanitia();
				return 1;
			}
			else{
				return 0;
				}				
		}
	}

	public function LogLoginPanitia(){
		$ip = $this->getIP();
		$user = $this->session->userdata('username');
		$query = $this->db
			->where('username', $user)
			->get('user');
		$id_panitia = $query->row()->id_user;
		$data = array('ip_address' => $ip,
			'keterangan' => 'Login Panitia',
			'waktu' => time(),
			'id_panitia' => $id_panitia
		 );
		$this->db->insert('log_panitia', $data);

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

	public function getKompetisiinfo()
	{	
		$var = $this->session->userdata('panitia-id');
		return $this->db->where('id_lomba', $var)->get('lomba')->result();
	}

	public function getKompetisiTahap(){
		$var = $this->session->userdata('panitia-id');
		return $this->db->where('id_lomba', $var)->get('tahap_lomba')->result();
	}

	public function kompetisi_tahapTambah($file,$desk,$id)
	{
		$data = array('file_tahap' => $file,
			'deskripsi_tahap' => $desk,
			'id_lomba' => $id
		);
		$this->db->insert('tahap_lomba', $data);
	}

	public function delDatabyid($datab,$kol,$id){
		$this->db->where($kol, $id)->delete($datab);
		return 1;
	}

	public function sumData($table,$id)
	{
		return $this->db->where('id_lomba', $id)->get($table)->num_rows();
	}

	public function sumBerkas($table,$id,$tag)
	{
		if ($tag==1) {
			return $this->db->where('id_lomba', $id)->get($table)->num_rows();
		}
		elseif ($tag==2) {
			return $this->db->where('id_lomba', $id)->where('status_tim is null', NULL, FALSE)->get($table)->num_rows();	
		}
		elseif ($tag==3) {
			return $this->db->where('id_lomba', $id)->where('status_tim', 1)->get($table)->num_rows();	
		}
		elseif ($tag==4) {
			return $this->db->where('id_lomba', $id)->where('status_tim', 0)->get($table)->num_rows();	
		}
	}

	public function sumBerkascari($table,$id,$cari,$tag)
	{
		// return $this->db->where('id_lomba', $id)->like('nama_team',$cari)->get($table)->num_rows();
		if ($tag==1) {
			return $this->db->where('id_lomba', $id)->like('nama_team',$cari)->get($table)->num_rows();
		}
		elseif ($tag==2) {
			return $this->db->where('id_lomba', $id)->where('status_tim is null', NULL, FALSE)->like('nama_team',$cari)->get($table)->num_rows();	
		}
		elseif ($tag==3) {
			return $this->db->where('id_lomba', $id)->where('status_tim', 1)->like('nama_team',$cari)->get($table)->num_rows();	
		}
		elseif ($tag==4) {
			return $this->db->where('id_lomba', $id)->where('status_tim', 0)->like('nama_team',$cari)->get($table)->num_rows();	
		}
	}

	public function sumDatacari($table,$id,$cari)
	{
		return $this->db->where('id_lomba', $id)->like('nama_team',$cari)->get($table)->num_rows();
	}

	public function cariData($kolom,$id,$table,$id_lomba)
	{
		$data =$this->db->where('id_lomba', $id_lomba)->like($kolom, $id)->get($table); 
		return $data->result();
	}

	public function getTahap($id)
	{
		$data = $this->db->where('id_lomba', $id)->get('tahap_lomba');
		return $data->result();
	}

	public function detailTahap($id,$thp)
	{
		$query = $this->db->query("CALL seleksi_info('.$id.','.$thp.')");
        return $query->result();
	}

	public function getSingkat($id)
	{
		$query = $this->db->query("CALL report_lomba('.$id.')");
        return $query->result();
	}

	public function getBerkas($id)
	{
		// select * from tim where id_lomba = 1 order by id_tim DESC;
		$query = $this->db->query("CALL berkas_info('.$id.')");
		return $query->result();
	}

	public function getsumBerkas($id)
	{
		// select * from tim where id_lomba = 1 order by id_tim DESC;
		$query = $this->db->where('id_lomba', 1)
		->order_by("id_tim", "desc")
		->get('tim');
		return $query->result();
	}

	public function getnewBerkas($id)
	{
		// select * from tim where id_lomba = 1 order by id_tim DESC;
		$query = $this->db->where('id_lomba', 1)
		->where('status_tim is null', NULL, FALSE)
		->order_by("id_tim", "desc")
		->get('tim');
		return $query->result();
	}

	public function getrejectBerkas($id)
	{
		// select * from tim where id_lomba = 1 order by id_tim DESC;
		$query = $this->db->where('id_lomba', 1)
		->where('status_tim', 0)
		->order_by("id_tim", "desc")
		->get('tim');
		return $query->result();
	}

	public function getacepttBerkas($id)
	{
		// select * from tim where id_lomba = 1 order by id_tim DESC;
		$query = $this->db->where('id_lomba', 1)
		->where('status_tim', 1)
		->order_by("id_tim", "desc")
		->get('tim');
		return $query->result();
	}	

	// public function getTim($id)
	// {
	// 	$data =$this->db->where('id_lomba', $id)->get('tim'); 
	// 	return $data->result();
	// }

	function getTim($number,$offset,$id){
		return $query = $this->db->where('id_lomba', $id)->get('tim',$number,$offset)->result();		
	}

	function getBerkas2($number,$offset,$id,$tag){
		if ($tag==1) {
			return $query = $this->db->where('id_lomba', $id)->get('tim',$number,$offset)->result();		
		}
		elseif ($tag==2) {
			return $query = $this->db->where('id_lomba', $id)->where('status_tim is null', NULL, FALSE)->get('tim',$number,$offset)->result();			
		}
		elseif ($tag==3) {
			return $query = $this->db->where('id_lomba', $id)->where('status_tim', 1)->get('tim',$number,$offset)->result();			
		}
		elseif ($tag==4) {
			return $query = $this->db->where('id_lomba', $id)->where('status_tim', 0)->get('tim',$number,$offset)->result();			
		}
	}

	function getTimcari($number,$offset,$id,$cari){
		return $query = $this->db->where('id_lomba', $id)->like('nama_team', $cari)->get('tim',$number,$offset)->result();		
	}
	
	function getBerkascari($number,$offset,$id,$cari,$tag){
		if ($tag==1) {
			return $query = $this->db->where('id_lomba', $id)->like('nama_team', $cari)->get('tim',$number,$offset)->result();		
		}
		elseif ($tag==2) {
			return $query = $this->db->where('id_lomba', $id)->where('status_tim is null', NULL, FALSE)->like('nama_team', $cari)->get('tim',$number,$offset)->result();			
		}
		elseif ($tag==3) {
			return $query = $this->db->where('id_lomba', $id)->where('status_tim', 1)->like('nama_team', $cari)->get('tim',$number,$offset)->result();			
		}
		elseif ($tag==4) {
			return $query = $this->db->where('id_lomba', $id)->where('status_tim', 0)->like('nama_team', $cari)->get('tim',$number,$offset)->result();			
		}
	}

	function infoTim($id){
		return $query = $this->db->query('CALL tim_info('.$id.')')->result();
	}

}
?>

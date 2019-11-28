<?php
class Peserta_Model extends CI_Model {

	/**
	 * Index Page for this controller.
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

	public function login($user_real, $pwd){
		$user = $this->db
			->where('username', $user_real)
			->where('id_lomba', 0)
			->get('tim');
			
		$match = password_verify($pwd , $user->row()->password);
		$status = $result[0]->status_tim;

		if($match)
			$this->session->set_userdata([
					'nama_tim' =>  $result[0]->nama_team,
					'id_tim' => $result[0]->id_tim
				]);	
			return $status;
		else{
			return 10;
		}
	}

	public function ambil_data_tim($id_team){
		return $this->db->where('id_tim',$id_team)->get('data_tim')->result();
	}
	public function ambil_info_tim($id_team){
		return $this->db->where('id_tim',$id_team)->get('tim')->result();
	}
	public function getDatafullTable($table){
		$data = $this->db->get($table)->result();
		return $data;
	}
	public function ambilDataLombaTim($id_lomba){

		$data = $this->db->query("SELECT * FROM lomba a INNER JOIN tim b on a.id_lomba = b.id_lomba where id_tim = ".$id_lomba." ")->result();

		return $data;
	}
	public function ambilDataAnggota($id_lomba){
		$data = $this->db->query("CALL tim_info(".$id_lomba.")")->result();
		return $data;
	}
}
?>
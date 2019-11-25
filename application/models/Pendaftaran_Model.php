<?php
class Pendaftaran_Model extends CI_Model {

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

	//Fungsi untuk ngambil nama-nama lomba
	public function ambil_data_lomba(){
		return $this->db->query('select * from lomba')->result();
	}

	// Fungsi untuk nambah data di tabel tim, terus ngasih id tim yg baru dimasukkan
	public function tambah_tim($data_team){
		$this->db->insert('tim',$data_team);
		return $this->db->insert_id();
	}

	// Fungsi nambah peserta ketua dan ngembalikan id ketuanya
	public function tambah_peserta($data_peserta){

		$this->db->insert('peserta',$data_peserta);
		return $this->db->insert_id();
	}

	// Fungsi untuk update kolom id ketua di tabel tim
	public function update_id_ketua($id_ketua,$id_team){
		$this->db->query("update tim set id_ketua=".$id_ketua." where id_tim=".$id_team.";");
	}

	public function cek_nama_tim($nama_tim){
		return $this->db->query("select * from tim where nama_team = '".$nama_tim."';")->num_rows();
	}
}
?>
<?php
class Verifikasi extends CI_Controller {

	function __construct(){
		parent::__construct();
		
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
	public function Tes1(){
		$this->load->view('folderTes/tes1');
	}

	public function generate(){
		$id = $this->input->get('api-key');
		$dbapi = $this->load->database('api', TRUE); 
		$query = $dbapi->where('qr', $id)->get('seminar');
		$val = $query->num_rows();
		if ($val == 0) {
			redirect(base_url());
		}
		else{
		$val2 =  $query->row()->status_pembayaran;
		if ($val2 == 0) {
			redirect(base_url());
		}
		else{
			$kode = $query->row()->random;
			$data['data'] = $kode;
			$this->load->view('peserta/qrgenerate', $data);
		}
		}
	}

	// public function bar($id){
	// 	$data = $this->db->where('id_tim', $id)->get('peserta')->result();
	// 	$data['data'] = $data;
	// 	$this->load->view('peserta/barcode', $data);
	// }

}
?>
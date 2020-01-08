<?php
class Pendaftaran extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pendaftaran_Model');
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

	public function index(){
		$data_lomba = $this->Pendaftaran_Model->ambil_data_lomba();
		$data = array(
						'data_lomba'=>$data_lomba
		);
		$this->load->view('Pendaftaran/pendaftaranPesertaLomba',$data);
	}
	public function cekUsername()
	{
		$data = $this->input->post("username");
		// var_dump($data);
		$va = $this->db->where('username_tim', $data)->get('tim')->num_rows();
		echo $va;

	}

	public function daftar_kompetisi(){
		// Nyusun data yang akan dikirim ke tabel tim
		// echo $this->input->post('jumlah_anggota');
		// die;
		$pass = $this->input->post('password_tim');
		$newpass = password_hash($pass, PASSWORD_DEFAULT);
		$data_team = array(
						'username_tim'=>$this->input->post('username'),
						'nama_team'=>$this->input->post('nama_tim'),
						'id_lomba'=>$this->input->post('cabang_lomba'),
						'asal_univ'=>$this->input->post('universitas_tim'),
						'password_tim'=> $newpass
		);

		// Insert data tim dan ngambil id team
		$id_team = $this->Pendaftaran_Model->tambah_tim($data_team);

		// Persiapan config untuk upload berkas ketua
		$config['upload_path']          = './public/kompetisi/file_pendaftaran/';
	    $config['allowed_types']        = '*';
	    $config['encrypt_name'] = TRUE; //enkripsi file name upload
	    $config['overwrite']			= true;
	    $config['max_size']             = 2048;

	    //Upload berkas dan menyimpan nama berkas ke variabel link_file untuk dimasukkan ke database
	    $this->load->library('upload',$config);
	    $this->upload->initialize($config);

	    if($this->upload->do_upload('file_ketua')) {
	        $data = array('upload_data'=>$this->upload->data());
	        $link_file_ketua= $data['upload_data']['file_name']; 
	        $status_upload = 1;
	    }
	    else{
	    	$status_upload = 0;
	    	$this->db->where('id_tim', $id_team)->delete('tim');
	    	echo "0";
	    	die;
	    	// echo $this->upload->display_errors();
	    }

		// Nyusun data yang akan dikirim ke tabel peserta sebagai ketua
		$data_ketua = array(
						'nama_peserta'=>$this->input->post('nama_ketua'),
						'email'=>$this->input->post('email_ketua'),
						'no_hp'=>$this->input->post('no_hp_ketua'),
						'jenis_kelamin'=>$this->input->post('jenis_kelamin_ketua'),
						'id_tim' =>$id_team,
						'url_berkas'=> $link_file_ketua
		);
		// insert data ketua dan nyimpan id nya
		$id_ketua = $this->Pendaftaran_Model->tambah_peserta($data_ketua);		
		// Update data di tabel tim supaya kolom id_ketua enggak null

	
		$this->Pendaftaran_Model->update_id_ketua($id_ketua,$id_team);


		$jumlah_anggota = $this->input->post('jumlah_anggota');
		//kalau jumlah anggota 1
		if($jumlah_anggota == 1){

			// Persiapan config untuk upload berkas anggota 1
			$config['upload_path']          = './public/kompetisi/file_pendaftaran/';
		    $config['allowed_types']        = '*';
		    $config['encrypt_name'] = TRUE; //enkripsi file name upload
		    $config['overwrite']			= true;
		    $config['max_size']             = 2048;

		    //Upload berkas dan menyimpan nama berkas ke variabel link_file untuk dimasukkan ke database
		    $this->load->library('upload',$config,'agsolo');
		    if ($this->agsolo->do_upload('file_anggota1')) {
		        $data = array('upload_data'=>$this->agsolo->data());
	        	$link_file1= $data['upload_data']['file_name']; 
				$data_anggota1 = array(
							'nama_peserta'=>$this->input->post('nama_anggota1'),
							'email'=>$this->input->post('email_anggota1'),
							'no_hp'=>$this->input->post('no_hp_anggota1'),
							'jenis_kelamin'=>$this->input->post('jenis_kelamin1'),
							'id_tim' =>$id_team,
							'url_berkas'=>$link_file1
				);
				//Nyimpan data anggota 1
				$this->Pendaftaran_Model->tambah_peserta($data_anggota1);
		    }
		    else{
				// echo "angt = ";
				// echo $jumlah_anggota;
		    	$status_upload = 0;
		    	$this->db->where('id_tim', $id_team)->delete('tim');
		    	$this->db->where('id_peserta', $id_ketua)->delete('peserta');
		    	echo "0";
	    		die;
	    	}
	    	// echo $this->agsolo->display_errors();
	    	echo 1;
			//Nyusun data untuk disimpan ke tabel peserta sebagai anggota 1
		}
		elseif($jumlah_anggota == 2){

		    $this->load->library('upload',$config,'ag1');
		    $this->load->library('upload',$config,'ag2');

			$config['upload_path']          = './public/kompetisi/file_pendaftaran/';
		    $config['allowed_types']        = '*';
		    $config['encrypt_name'] = TRUE; //enkripsi file name upload
		    $config['overwrite']			= true;
		    $config['max_size']             = 2048;
		    $this->ag1->initialize($config);
		    //Upload berkas dan menyimpan nama berkas ke variabel link_file untuk dimasukkan ke database
		    if ($this->ag1->do_upload('file_anggota1')) {
		        $data = array('upload_data'=>$this->ag1->data());
	        	$link_file1= $data['upload_data']['file_name']; 
				$data_anggota1 = array(
							'nama_peserta'=>$this->input->post('nama_anggota1'),
							'email'=>$this->input->post('email_anggota1'),
							'no_hp'=>$this->input->post('no_hp_anggota1'),
							'jenis_kelamin'=>$this->input->post('jenis_kelamin1'),
							'id_tim' =>$id_team,
							'url_berkas'=>$link_file1
				);
				$id_ag1 = $this->Pendaftaran_Model->tambah_peserta($data_anggota1);
		    }
		    else{
		    	$status_upload = 0;
		    	$this->db->where('id_tim', $id_team)->delete('tim');
		    	$this->db->where('id_peserta', $id_ketua)->delete('peserta');
		    	echo "0";
		    	die;
	    	}
		    // echo $this->ag1->display_errors();
		    // die;

			//Nyusun data untuk disimpan ke tabel peserta sebagai anggota 1
			//Nyimpan data anggota 1
			// Persiapan config untuk upload berkas anggota 1
			$config['upload_path']          = './public/kompetisi/file_pendaftaran/';
		    $config['allowed_types']        = '*';
		    $config['encrypt_name'] = TRUE; //enkripsi file name upload
		    $config['overwrite']			= true;
		    $config['max_size']             = 2048;
		    $this->ag2->initialize($config);
		    //Upload berkas dan menyimpan nama berkas ke variabel link_file untuk dimasukkan ke database
		    // $this->load->library('upload',$config);
		    if ($this->ag2->do_upload('file_anggota2')) {
		        $data = array('upload_data'=>$this->ag2->data());
	        	$link_file2= $data['upload_data']['file_name']; 

			    // Upload data anggota 2
				$data_anggota2 = array(
							'nama_peserta'=>$this->input->post('nama_anggota2'),
							'email'=>$this->input->post('email_anggota2'),
							'no_hp'=>$this->input->post('no_hp_anggota2'),
							'jenis_kelamin'=>$this->input->post('jenis_kelamin2'),
							'id_tim' =>$id_team,
							'url_berkas' => $link_file2
				);
				// Nyimpan data anggota 2
				$this->Pendaftaran_Model->tambah_peserta($data_anggota2);
		    }
		    else{
		    	$status_upload = 0;
		    	$this->db->where('id_tim', $id_team)->delete('tim');
		    	$this->db->where('id_peserta', $id_ketua)->delete('peserta');
		    	$this->db->where('id_peserta', $id_ag1)->delete('peserta');
		    	echo "0";
		    	die;
	    	}
			echo 1;
		}

	}

	public function cek_nama_tim(){
			$nama_tim = $this->input->post('nama_tim');
			$num_rows =  $this->Pendaftaran_Model->cek_nama_tim($nama_tim);
			echo $num_rows;
		}

	}

?>
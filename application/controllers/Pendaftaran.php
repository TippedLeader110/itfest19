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
	    $config['file_name']            = password_hash($this->input->post('file_ketua'), PASSWORD_DEFAULT);
	    $config['overwrite']			= true;
	    $config['max_size']             = 2048;

	    //Upload berkas dan menyimpan nama berkas ke variabel link_file untuk dimasukkan ke database
	    $this->load->library('upload',$config);
	    $this->upload->initialize($config);

	    if($this->upload->do_upload('file_ketua')) {
	        $data = array('upload_data'=>$this->upload->data());
	        $link_file= $data['upload_data']['file_name']; 
	        $status_upload = 1;
	    }
	    else{
	    	$status_upload = 0;
	    }
	    echo $this->upload->display_errors();

		// Nyusun data yang akan dikirim ke tabel peserta sebagai ketua
		$data_ketua = array(
						'nama_peserta'=>$this->input->post('nama_ketua'),
						'email'=>$this->input->post('email_ketua'),
						'no_hp'=>$this->input->post('no_hp_ketua'),
						'jenis_kelamin'=>$this->input->post('jenis_kelamin_ketua'),
						'id_tim' =>$id_team,
						'url_berkas'=> $link_file
		);
		// insert data ketua dan nyimpan id nya
		$id_ketua = $this->Pendaftaran_Model->tambah_peserta($data_ketua);		
		// Update data di tabel tim supaya kolom id_ketua enggak null

	
		$this->Pendaftaran_Model->update_id_ketua($id_ketua,$id_team);


		$jumlah_anggota = $this->input->post('jumlah_anggota');
		//kalau jumlah anggota 1
		if($jumlah_anggota == 1){

			// Persiapan config untuk upload berkas anggota 1
			$config['upload_path']          = './file_pendaftaran/';
		    $config['allowed_types']        = '*';
		    $config['file_name']            = password_hash($this->input->post('file_anggota1'), PASSWORD_DEFAULT);
		    $config['overwrite']			= true;
		    $config['max_size']             = 2048;

		    //Upload berkas dan menyimpan nama berkas ke variabel link_file untuk dimasukkan ke database
		    $this->load->library('upload',$config);
		    if ($this->upload->do_upload('file_anggota1')) {
		        $link_file = $this->upload->data("file_name");
		    }

			//Nyusun data untuk disimpan ke tabel peserta sebagai anggota 1
			$data_anggota1 = array(
						'nama_peserta'=>$this->input->post('nama_anggota1'),
						'email'=>$this->input->post('e-mail_anggota1'),
						'no_hp'=>$this->input->post('no_hp_anggota1'),
						'jenis_kelamin'=>$this->input->post('jenis_kelamin_anggota1'),
						'id_team' =>$id_team,
						'url_file'=>$link_file
			);
			//Nyimpan data anggota 1
			$this->Pendaftaran_Model->tambah_peserta($data_anggota1);
		}
		elseif($jumlah_anggota == 2){

		    $this->load->library('upload',$config,'ag1');
		    $this->load->library('upload',$config,'ag2');

			$config['upload_path']          = './file_pendaftaran/';
		    $config['allowed_types']        = '*';
		    $config['file_name']            = password_hash($this->input->post('file_anggota1'), PASSWORD_DEFAULT);
		    $config['overwrite']			= true;
		    $config['max_size']             = 2048;
		    $this->ag1->initialize($config);
		    //Upload berkas dan menyimpan nama berkas ke variabel link_file untuk dimasukkan ke database
		    if ($this->ag1->do_upload('file_anggota1')) {
		        $link_file = $this->ag1->data("file_name");
		    }

			//Nyusun data untuk disimpan ke tabel peserta sebagai anggota 1
			$data_anggota1 = array(
						'nama_peserta'=>$this->input->post('nama_anggota1'),
						'email'=>$this->input->post('e-mail_anggota1'),
						'no_hp'=>$this->input->post('no_hp_anggota1'),
						'jenis_kelamin'=>$this->input->post('jenis_kelamin_anggota1'),
						'id_team' =>$id_team,
						'url_file'=>$link_file
			);
			//Nyimpan data anggota 1
			$this->Pendaftaran_Model->tambah_peserta($data_anggota1);
			// Persiapan config untuk upload berkas anggota 1
			$config['upload_path']          = './file_pendaftaran/';
		    $config['allowed_types']        = '*';
		    $config['file_name']            = password_hash($this->input->post('file_anggota2'), PASSWORD_DEFAULT);
		    $config['overwrite']			= true;
		    $config['max_size']             = 2048;
		    $this->ag2->initialize($config);
		    //Upload berkas dan menyimpan nama berkas ke variabel link_file untuk dimasukkan ke database
		    // $this->load->library('upload',$config);
		    if ($this->ag2->do_upload('file_anggota2')) {
		        $link_file = $this->ag2->data("file_name");
		    }

		    // Upload data anggota 2
			$data_anggota2 = array(
						'nama_peserta'=>$this->input->post('nama_anggota2'),
						'email'=>$this->input->post('e-mail_anggota2'),
						'no_hp'=>$this->input->post('no_hp_anggota2'),
						'jenis_kelamin'=>$this->input->post('jenis_kelamin_anggota2'),
						'id_team' =>$id_team,
						'url_file' => $link_file
			);
			// Nyimpan data anggota 2
			$this->Pendaftaran_Model->tambah_peserta($data_anggota2);
		}

		echo 1;

		}

		public function cek_nama_tim(){
			$nama_tim = $this->input->post('nama_tim');
			$num_rows =  $this->Pendaftaran_Model->cek_nama_tim($nama_tim);
			echo $num_rows;
		}

	}

?>
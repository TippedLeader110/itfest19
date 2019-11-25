	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
    	parent::__construct();
	}

	public function resentPembayaranemail(){
		$this->load->model("PesertaSeminarModel");

		$dataEmail = $this->PesertaSeminarModel->getAllDataBelumFix()->result();
		foreach ($dataEmail as $key => $value) {
			$email = $value->email;
			$dataEmail['email'] = $value->email;
			$isiEmail = $this->load->view('ITFest/emailMasaHabisPresale', $dataEmail, TRUE);
			$configEmail = array(
				'protocol' => 'sendmail',
				'smtp_host' => 'ssl://mail.itfestusu.id',
				'smtp_port' => '465',
				'smtp_user' => 'admin@itfestusu.id',
				'smtp_pass' => 'Universitas09~',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1'
			);

			$this->load->library('email', $configEmail);
			$this->email->set_newline('\r\n');
			$this->email->from('admin@itfestusu.id', 'Admin ITFest 3.0');
			$this->email->to($email);
			$this->email->subject('Pre-Sale 2 Seminar ITFest 3.0');
			$this->email->message($isiEmail);
			$this->email->send();
		}
	}

	public function verifikasiPembayaranSeminar(){
		if($this->input->post()!= NULL){

			$email = $this->input->post('email');

			$this->load->model("PesertaSeminarModel");

			$dataEmail = $this->PesertaSeminarModel->getDataByEmail($email)->row();

			if($dataEmail->status == "2"){
				$this->session->set_flashdata("message", "Anda sudah melakukan pembayaran.");
				redirect("ITFest/daftarSeminar");
			} else if($dataEmail->status == "1"){
				$this->session->set_flashdata("message", "Anda sudah melakukan upload bukti pembayaran.");
				redirect("ITFest/daftarSeminar");
			} else{

				if($_FILES['filePembayaran'] != NULL){
					$data['data'] = $this->PesertaSeminarModel->getDataByEmail($email)->row();
					$this->load->library('upload');
					$path = "./ITFestAssets/documents/DataSeminar/pembayaran/";
		
					// Upload Proposal
					$namaBerkas = $data['data']->id;
		
					if(!is_dir($path)){
						$oldmask = umask(0);
						mkdir($path, 0777);
						umask($oldmask);
					}

					$config['upload_path'] = $path;
					$config['allowed_types'] = "png|jpg|jpeg|dwg|bmp";
					$config['encrypt_name'] = FALSE;
					$config['file_name'] = $namaBerkas;
		
					$this->upload->initialize($config);
					if(!empty($_FILES['filePembayaran']['name'])){
						if(!$this->upload->do_upload('filePembayaran')){
							$this->session->set_flashdata('message', $this->upload->display_errors());
							redirect('ITFest/verifikasiPembayaranSeminar');
						} else{
							$filePembayaran = $this->upload->data();
							$pathCut = explode("./", $path);
							$urlFilePembayaran = base_url() . $pathCut[1] . $filePembayaran['file_name'];
						}
					} else{
						$this->session->set_flashdata('message', 'File pembayaran kosong.');
						redirect('ITFest/verifikasiPembayaranSeminar');
					}

					// Insert to Database
					$data = array(
						'urlBuktiPembayaran' => $urlFilePembayaran,
						'status' => '1'
					);
		
					if($this->PesertaSeminarModel->updateData($email, $data)){
						$this->session->set_flashdata('message', 'File berhasil diupload.');
						redirect('ITFest/daftarSeminar');
					} else{
						$this->session->set_flashdata('message', 'Gagal mengupload file.');
						redirect('ITFest/daftarSeminar');
					}
				} else{
					$this->session->set_flashdata('message', 'Error uploading file.');
					redirect('ITFest/verifikasiPembayaranSeminar');
				}
			}
		} else{
			$data['email'] = $this->input->get('email');
			$this->load->view("ITFest/verifikasiPembayaranSeminar", $data);
		}
	}

	// Generate ID Random Peserta
	public function generateID(){

		$rand = strtoupper(substr(md5(microtime()),rand(0,26),6));

		return $rand;
	}
	
	public function daftarSeminar(){
		$this->load->model("PesertaSeminarModel");
		if($this->input->post() != NULL){
			$email = $this->input->post("email");

			if($this->PesertaSeminarModel->getDataByEmail($email)->row() != NULL){
				$this->session->set_flashdata("message", "Email sudah terdaftar untuk seminar ITFest 3.0");
				redirect("ITFest/daftarSeminar");
			} else{

				// Menghindari ID yang Sama
				do{
					$id = $this->generateID();
				} while($this->PesertaSeminarModel->getData($id)->row() != NULL);

				$data = array(
					"id" => $id,
					"nama" => $this->input->post("nama"),
					"jenisKelamin" => $this->input->post("jenisKelamin"),
					"email" => $this->input->post("email"),
					"noHP" => $this->input->post("noHP"),
					"instansi" => $this->input->post("instansi"),
					"status" => "0"
				);

				if($this->PesertaSeminarModel->insertData($data)){
					$pesan['message'] = "Data telah terdaftar, silahkan melakukan pembayaran dan cek email anda untuk link konfirmasi pembayaran";
					$this->load->view("ITFest/successDaftar", $pesan);

					$dataEmail['email'] = $email;
					$isiEmail = $this->load->view('ITFest/emailSuccessDaftar', $dataEmail, TRUE);
					$configEmail = array(
							'protocol' => 'sendmail',
							'smtp_host' => 'ssl://mail.itfestusu.id',
							'smtp_port' => '465',
							'smtp_user' => 'admin@itfestusu.id',
							'smtp_pass' => 'Universitas09~',
							'mailtype' => 'html',
							'charset' => 'iso-8859-1'
					);

					$this->load->library('email', $configEmail);
					$this->email->set_newline('\r\n');
					$this->email->from('admin@itfestusu.id', 'Admin ITFest 3.0');
					$this->email->to($email);
					$this->email->subject('Seminar ITFest 3.0');
					$this->email->message($isiEmail);
					$this->email->send();
				} else{
					$dataPesan['message'] = "Data tidak berhasil didaftarkan, silahkan coba lagi";
					$this->load->view("ITFest/successDaftar", $dataPesan);
				}
			}
		} else{
			// Presale 1: 29 Januari 2019 -> 100 Tiket
			// Presale 2: 5 Februari 2019 -> 400 Tiket
			// Presale 3: 26 Februari 2019 -> 500 Tiket
			$data['judul'] = "";
			$data['waktu'] = "";
			$data['tiket'] = "";
			if(strtotime(date("Y-m-d H:i:s")) > strtotime("2019-01-25 00:00:00") && strtotime(date("Y-m-d H:i:s")) < strtotime("2019-02-05 00:00:00")){
				$data['judul'] = "Pre-Sale 1";
				$data['waktu'] = "29 Januari 2019 - 4 Februari 2019";
				$data['tiket'] = $this->PesertaSeminarModel->countTiketAvailable(1);
				if($this->PesertaSeminarModel->countPesertaVerified() >= 100){
					$this->load->view("ITFest/tiketHabis", $data);
				} else{
					$this->load->view("ITFest/daftarSeminar", $data);
				}
			} else if(strtotime(date("Y-m-d H:i:s")) > strtotime("2019-02-05 00:00:00") && strtotime(date("Y-m-d H:i:s")) < strtotime("2019-02-26 00:00:00")){
				$data['judul'] = "Pre-Sale 2";
				$data['waktu'] = "5 Februari 2019 - 25 Februari 2019";
				$data['tiket'] = $this->PesertaSeminarModel->countTiketAvailable(2);
				if($this->PesertaSeminarModel->countPesertaVerified() >= 500){
					$this->load->view("ITFest/tiketHabis", $data);
				} else{
					$this->load->view("ITFest/daftarSeminar", $data);
				}
			} else if(strtotime(date("Y-m-d H:i:s")) > strtotime("2019-02-26 00:00:00") && strtotime(date("Y-m-d H:i:s")) < strtotime("2019-03-17 00:00:00")){
				$data['judul'] = "Pre-Sale 3";
				$data['waktu'] = "26 Februari 2019 - 16 Maret 2019";
				$data['tiket'] = $this->PesertaSeminarModel->countTiketAvailable(3);
				if($this->PesertaSeminarModel->countPesertaVerified() >= 1000){
					$this->load->view("ITFest/tiketHabis", $data);
				} else{
					$this->load->view("ITFest/daftarSeminar", $data);
				}
			} else{
				$this->load->view("ITFest/belumDaftarSeminar");
			}
		}
	}

	public function forgotPassword(){
		if ($this->input->post() != NULL) {
			$this->load->model('TeamModel');
			$email = $this->input->post('email');
			$team = $this->TeamModel->getAllData()->result();
			foreach ($team as $key => $value) {
				if($value->email == $email){
					$data['team'] = $value->id;
					$isiEmail = $this->load->view('email/forgotPassword', $data, TRUE);
			    $config = array(
			      'protocol' => 'sendmail',
			      'smtp_host' => 'ssl://mail.itfestusu.id',
			      'smtp_port' => '465',
			      'smtp_user' => 'admin@itfestusu.id',
			      'smtp_pass' => 'Universitas09~',
			      'mailtype' => 'html',
			      'charset' => 'iso-8859-1'
			    );

			    $this->load->library('email', $config);
			    $this->email->set_newline('\r\n');
			    $this->email->from('admin@itfestusu.id', 'Admin ITFest 3.0');
			    $this->email->to($email);
			    $this->email->subject('Silahkan Melakukan Reset Password.');
			    $this->email->message($isiEmail);
			    $this->email->send();
					$this->session->set_flashdata('message', 'Lihat Email untuk melakukan reset password.');
					redirect('ITFest/signin');
				}
			}
			$this->session->set_flashdata('message', 'Tidak ada data dengan email tersebut.');
			redirect('ITFest/signin');
		} else{
			$this->load->view('ITFest/forgotPassword');
		}
	}

	public function index(){
		$this->load->model('LombaModel');
		$data['kompetisi'] = $this->LombaModel->getAllData()->result();
		$this->load->view('ITFest/index', $data);//, $data);
	}

	public function kompetisi(){
		$namaKompetisi = $this->input->get('k');
		$this->load->model("LombaModel");
		$data['lomba'] = $this->LombaModel->getDatabyName($namaKompetisi)->row();
		$this->load->view('ITFest/kompetisi', $data);
	}

	public function signup(){
		if($this->input->post() != NULL){
			$this->load->model('TeamModel');
			$this->load->model('PesertaModel');
			$this->load->library('upload');
			$namaTim = $this->input->post("namaTim");
			$idLomba = $this->input->post("cabangLomba");
			$password = md5($this->input->post('password'));
			$nama = $this->input->post("nama");
			$jenisKelamin = $this->input->post("jenisKelamin");
			$universitas = $this->input->post("universitas");
			$fakultas = $this->input->post('fakultas');
			$noHp = $this->input->post("noHP");
			$email = $this->input->post("email");
			$fileKTM = $_FILES['fileKTM'];
			$fileSuratAktif = $_FILES['fileSuratAktif'];
			$fileFoto = $_FILES['fileFoto'];

			for ($i=0; $i < 3 ; $i++) {
				// File KTM
				$_FILES["fileKTM$i"]['name'] = $fileKTM['name'][$i];
				$_FILES["fileKTM$i"]['type'] = $fileKTM['type'][$i];
				$_FILES["fileKTM$i"]['tmp_name'] = $fileKTM['tmp_name'][$i];
				$_FILES["fileKTM$i"]['error'] = $fileKTM['error'][$i];
				$_FILES["fileKTM$i"]['size'] = $fileKTM['size'][$i];
				// File Surat Aktif Kuliah
				$_FILES["fileSuratAktif$i"]['name'] = $fileSuratAktif['name'][$i];
				$_FILES["fileSuratAktif$i"]['type'] = $fileSuratAktif['type'][$i];
				$_FILES["fileSuratAktif$i"]['tmp_name'] = $fileSuratAktif['tmp_name'][$i];
				$_FILES["fileSuratAktif$i"]['error'] = $fileSuratAktif['error'][$i];
				$_FILES["fileSuratAktif$i"]['size'] = $fileSuratAktif['size'][$i];
				// File Foto
				$_FILES["fileFoto$i"]['name'] = $fileFoto['name'][$i];
				$_FILES["fileFoto$i"]['type'] = $fileFoto['type'][$i];
				$_FILES["fileFoto$i"]['tmp_name'] = $fileFoto['tmp_name'][$i];
				$_FILES["fileFoto$i"]['error'] = $fileFoto['error'][$i];
				$_FILES["fileFoto$i"]['size'] = $fileFoto['size'][$i];
			}
			for ($i=0; $i < 3 ; $i++) {
				if(!empty($_FILES["fileKTM$i"]['name']) && !empty($_FILES["fileSuratAktif$i"]['name']) && !empty($_FILES["fileFoto$i"]['name'])){
					if($i == 0){
						$dataTeam = array(
							'namaTeam' => $namaTim,
							'email' => $email[$i],
							'password' => $password,
							'idLomba' => $idLomba,
							'status' => '0',
							'createdDate' => date("Y-m-d H:i:s"),
							'active' => '1',
							'namaKetua' => $nama[0]
						);
						$idTeam = $this->TeamModel->insertData($dataTeam);
						$path = "./ITFestAssets/documents/" . md5($idTeam) . "/";
					}
						if($idTeam != NULL){
							// Upload File KTM
			        $tmp = explode(".", $fileKTM['name'][$i]);
			    		$ext = end($tmp);

			    		if(!is_dir($path)){
								$oldmask = umask(0);
								mkdir($path, 0777);
								umask($oldmask);
			    		}
							if(!is_dir($path."$i/")){
								$oldmask = umask(0);
								mkdir($path."$i/", 0777);
								umask($oldmask);
			    		}
							if(!is_dir($path."$i/KTM/")){
								$oldmask = umask(0);
								mkdir($path."$i/KTM/", 0777);
								umask($oldmask);
			    		}
			    		$config['upload_path'] = $path."$i/KTM/";
			    		$config['allowed_types'] = "pdf|jpeg|png|jpg|bmp|dwg";
							$config['max_size'] = 25000;
			    		$config['encrypt_name'] = FALSE;
			    		$config['file_name'] = "$nama[$i]." . $ext;

			    		$this->upload->initialize($config);
			    		if(!empty($fileKTM['name'][$i])){
			    			if(!$this->upload->do_upload("fileKTM$i")){
			            $this->session->set_flashdata('message', $this->upload->display_errors());
			            redirect();
			          } else{
			            $fileUploadKTM = $this->upload->data();
									$pathUrl  = explode("./", $path."$i/KTM/");
			            $urlFileKTM = base_url($pathUrl[1]) . $fileUploadKTM['file_name'];
			          }
			        } else{
			          $this->session->set_flashdata('message', 'File KTM kosong.');
			          redirect();
			        }

							// Upload File Surat Aktif Kuliah
							$tmp = explode(".", $fileSuratAktif['name'][$i]);
			    		$ext = end($tmp);

			    		if(!is_dir($path."$i/suratAktif/")){
								$oldmask = umask(0);
								mkdir($path."$i/suratAktif/", 0777);
								umask($oldmask);
			    		}
			    		$config['upload_path'] = $path."$i/suratAktif/";
			    		$config['allowed_types'] = "pdf|png|jpg|jpeg|bmp|dwg";
			    		$config['encrypt_name'] = FALSE;
			    		$config['file_name'] = "$nama[$i]." . $ext;

			    		$this->upload->initialize($config);
			    		if(!empty($fileSuratAktif['name'][$i])){
			    			if(!$this->upload->do_upload("fileSuratAktif$i")){
			            $this->session->set_flashdata('message', $this->upload->display_errors());
			            redirect();
			          } else{
			            $fileUploadSuratAktif = $this->upload->data();
									$pathUrl  = explode("./", $path."$i/suratAktif/");
			            $urlFileSuratAktif = base_url($pathUrl[1]) . $fileUploadSuratAktif['file_name'];
			          }
			        } else{
			          $this->session->set_flashdata('message', 'File Surat Aktif kosong.');
			          redirect();
			        }

							// Upload File Foto
							$tmp = explode(".", $fileFoto['name'][$i]);
			    		$ext = end($tmp);

			    		if(!is_dir($path."$i/foto/")){
								$oldmask = umask(0);
								mkdir($path."$i/foto/", 0777);
								umask($oldmask);
			    		}
			    		$config['upload_path'] = $path."$i/foto/";
			    		$config['allowed_types'] = "png|jpeg|jpg|bmp|dwg";
			    		$config['encrypt_name'] = FALSE;
			    		$config['file_name'] = "$nama[$i]." . $ext;

			    		$this->upload->initialize($config);
			    		if(!empty($fileFoto['name'][$i])){
			    			if(!$this->upload->do_upload("fileFoto$i")){
			            $this->session->set_flashdata('message', $this->upload->display_errors());
			            redirect();
			          } else{
			            $fileUploadFoto = $this->upload->data();
									$pathUrl  = explode("./", $path."$i/foto/");
			            $urlFileFoto = base_url($pathUrl[1]) . $fileUploadFoto['file_name'];
			          }
			        } else{
			          $this->session->set_flashdata('message', 'File Surat Aktif kosong.');
			          redirect();
			        }

			        // Insert to Database
			        $dataPeserta = array(
			          'namaPeserta' => $nama[$i],
								'jenisKelamin' => $jenisKelamin[$i],
								'noHP' => $noHp[$i],
								'email' => $email[$i],
								'idTeam' => $idTeam,
								'universitas' => $universitas,
								'fakultas' => $fakultas[$i],
								'urlKTM' => $urlFileKTM,
								'urlSuratAktif' => $urlFileSuratAktif,
								'urlFoto' => $urlFileFoto
			        );
			        if($this->PesertaModel->insertData($dataPeserta)){
			          continue;
			        } else{
			          $this->session->set_flashdata('message', 'Gagal menambah data.');
			          redirect();
			        }
					} else{
						$this->session->set_flashdata('message', "File tidak lengkap.");
            redirect();
					}
				}
			}
			$this->session->set_flashdata('message', 'Tunggu verifikasi berkas tim.');
			$this->session->set_flashdata('color', 'green');
			redirect('ITFest/signin');
		} else{
			$this->load->model("LombaModel");
			$data['lomba'] = $this->LombaModel->getAllData()->result();
			$this->load->view('ITFest/signup', $data);
		}
	}

	public function signin(){
		if($this->session->userdata('userTeam') == NULL){
			$this->load->view("ITFest/signin");
		} else{
			redirect("Team");
		}
	}
}

	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kompetisi extends CI_Controller {

	function __construct(){
    	parent::__construct();
	}
	public function index(){
		$kompetisi = $this->input->get("k");
		$this->load->model('LombaModel');
		$data['kompetisi'] = $this->LombaModel->getDatabyName($kompetisi)->result();
		$this->load->view('ITFest/kompetisi', $data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LombaModel extends CI_Model {

	function __construct(){
		parent::__construct();
		//$this->load->library('session');
		//$this->load->model('LogPanitiaModel');
	}

	public function insertLogPanitia($id, $work){
		$data = array(
			'idPanitia' => $id,
			'time' => date("Y-m-d H:i:s"),
			"ipAddress" => $this->input->ip_address(),
			'work' => $work
		);
		return $this->LogPanitiaModel->insertData($data);
	}

	public function insertData($data){
		$work = "add new Lomba data";
		$this->db->insert('lomba', $data);
		return $this->insertLogPanitia($this->session->userdata('id'), $work);
	}

	public function getAllData(){
		return $this->db->get('lomba');
	}

	public function updateData($id, $data){
		$work = "update Lomba data in ID = " . $id;
		$this->db->where('id', $id);
		$this->db->update('lomba', $data);
		return $this->insertLogPanitia($this->session->userdata('id'), $work);
	}

	public function deleteData($id){
		$work = 'delete Lomba data in ID = '. $id;
		$this->db->where('id', $id);
		$data = array(
			'active' => '0'
		);
		$this->db->update('lomba', $data);
		return $this->insertLogPanitia($this->session->userdata('id'), $work);
	}

	public function getDatabyName($name){
		$this->db->where('nama_lomba', $name);
		return $this->db->get('lomba');
	}

	public function getData($id)
	{
		$this->db->where('id', $id);
		$this->db->where('active', '1');
		return $this->db->get('lomba') ;
	}
}

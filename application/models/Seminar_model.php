<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seminar_model extends CI_Model
{
        function __construct()
        {
                parent::__construct();
                
        }

        public function register_data($data)
        {       
                $dbapi = $this->load->database('api', TRUE); 
                $dbapi->insert('seminar', $data);
                return TRUE;
        }
        
        public function getKode($identitas)
        {       
                $dbapi = $this->load->database('api', TRUE); 
                $dbapi->where('identitas', $identitas);
                $result=$dbapi->get('seminar');
                if($result->num_rows()==1)
                        return $result->row(0)->kode_seminar;
                else
                        return false;
        }
        
        public function registered_update($kode_seminar,$file)
        {       
                $kode = "ITF-".$kode_seminar;
                $dbapi = $this->load->database('api', TRUE); 
                $dbapi->where('kode_seminar', $kode);
                $dbapi->set('path_bukti', $file);
                $dbapi->update('seminar');
        }
}

?>
<?php

class Usuario_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
		$this->load->database();
    }

    public function registrar($data){
        $data['rol_id'] = 4;
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        return $this->db->insert('usuarios', $data);
    }
}
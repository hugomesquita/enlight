<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TesteDatabase extends CI_Controller {
    public function index() {
        $this->load->database();
        print_r($this->db->conn_id);
        if ($this->db->conn_id) {
            echo 'Conexão bem-sucedida!';
        } else {
            echo 'Falha na conexão!';
        }
    }
}

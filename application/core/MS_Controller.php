<?php 
if ( ! defined('BASEPATH')) 
    exit('No direct script access allowed');

class MS_Controller extends CI_Controller {
        
    function __construct() {
        parent::__construct(); 

        // PUBLIC 
        $this->load->helper(array('form', 'url', 'html', 'directory'));

        if ($this->session->userdata('userID') == '') {
            redirect(base_url('painel/login/logout'), 'refresh');
        } 
    
    }
}
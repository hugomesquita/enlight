<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html')); 
        $this->load->library(array('form_validation', 'session'));
    }

	 
	public function index()
	{

        	$data = [];
		$this->template->load('layoutWithoutFooter', 'index', $data);
	}
}

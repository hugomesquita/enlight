<?php
defined('BASEPATH') OR exit('No direct script access allowed');


include_once(APPPATH.'core/MS_Controller.php');

class Main extends MS_Controller {

    private $tela = 'painel/';

	function __construct() 
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html')); 
        $this->load->library(array('form_validation', 'session'));
    }

	 
	public function index()
	{
        $sess_data = $this->session->userdata();

        // $data = [];
        $data['sess_data'] = $sess_data;
		$this->template->load('painel/layout', $this->tela.'index', $data);
    }

    public function error404()
	{
        $data = [ 
            'titulo' => 'Error404',
            'tela'   => $this->tela, 
        ];
        $this->template->load('painel/layout', $this->tela . 'error404', $data);
	}
}

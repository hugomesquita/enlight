<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Glossario extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('TermosModel', 'termos', FALSE);
        $this->load->model('SignificadosModel', 'SignificadosModel', FALSE);
        $this->load->helper(array('form', 'url', 'html')); 
        $this->load->library('form_validation');
        
    }

	 
	public function index()
	{
        $get = $this->input->get('initial'); 

        $data = [ 
            'titulo' => 'Publicação',
            'rows'   => $this->Filter($get)
        ];
		$this->template->load('layout', 'glossario/index', $data);
	}

    function Filter($get) 
    {
        //if ($get['descricao'] == '')
        //     return ([]);     
        $param = [];
        $like = [];
        if ($get != '')
            $param[] = ['campo' => "termo like '".$get."%'", 'valor' => ''];
        else
            $param[] = ['campo' => "termo like 'A%'", 'valor' => ''];

        $ordem = ['campo' => 'termo','ordem' => 'ASC'];
        $res = $this->termos->filtrar($param, $ordem)->result_object();

        return($res);
    }
}

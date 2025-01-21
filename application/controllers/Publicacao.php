<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacao extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('ArtefatosModel', 'artefato', FALSE);
        $this->load->helper(array('form', 'url', 'html')); 
        $this->load->library('form_validation');
    }

	 
	public function index()
	{
        $search = $this->input->get('s'); 

        $data = [ 
            'titulo' => 'Publicação',
            'search' => $search,
            'rows'   => $this->Filter($search)
        ];
		$this->template->load('layout', 'publicacao/index', $data);
	}

    function filter($get) 
    {
        $param = [];
        $like = [];
        if(!$get)
            $param[] = ['campo' => "categoria_id IN(1,3,5,6,7,8,9,14) AND (upper(titulo) like '%".strtoupper($get)."%'   OR upper(descricao) like '%".strtoupper($get)."%')", 'valor' => ''];
        else
            $param[] = ['campo' => "categoria_id IN(1,3,5,6,7,8,9,14)", 'valor' => ''];

        $ordem = ['campo' => 'titulo','ordem' => 'ASC'];
        $res = $this->artefato->filtrar($param, $ordem)->result_object();

        return($res);
    }

    public function descricao($id)
	{
        $param[] = ['campo' => 'id', 'valor' => $id];

        $res = $this->artefato->filtrar($param, [])->row();

        $data = [ 
            'titulo' => 'Publicação',
            'row'   => $res
        ];
		$this->template->load('layout', 'publicacao/descricao', $data);
	}
}

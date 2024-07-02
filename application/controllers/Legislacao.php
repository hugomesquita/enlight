<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Legislacao extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('ArtefatosModel', 'artefato', FALSE);
        $this->load->helper(array('form', 'url', 'html')); 
        $this->load->library('form_validation');
    }

	 
	public function index($current = 1, $id = 0)
	{

        $search = $this->input->get('s'); 

        $data = [];
        $data = [ 
            'titulo' => 'Publicação',
            'search' => $search,
            'treeview'   => $this->Treeview(),
            'id' => $id,
            'rows' => ($id === 0 ? $this->Filter($search) : $this->filterId($id)),
            'currentId' => $current,
        ]; 

		$this->template->load('layout', 'legislacao/index', $data);
	}

    function filter($get) 
    {
        $param = [];
        if($get !== ''){
            $param[] = ['campo' => "categoria_id IN(2,4,12,15,10) AND (upper(titulo) like '%".strtoupper($get)."%' OR upper(descricao) like '%".strtoupper($get)."%' OR upper(conteudo) like '%".strtoupper($get)."%')", 'valor' => ''];
            $ordem = ['campo' => 'titulo','ordem' => 'ASC'];
            $res = $this->artefato->filtrar($param, $ordem)->result_object();

            return($res);

        } else {
            return [];
        }
    }

    public function filterId($id = null)
	{
        $param[] = ['campo' => 'id', 'valor' => $id];
        $res = $this->artefato->filtrar($param, [])->result_object();
        return $res;
	}


    public function descricao($id)
	{
        $param[] = ['campo' => 'id', 'valor' => $id];

        $res = $this->artefato->filtrar($param, [])->row();

        $data = [ 
            'titulo' => 'Publicação',
            'row'   => $res,
            'treeview'   => $this->Treeview()
        ];
		$this->template->load('layout', 'legislacao/descricao', $data);
	}

    function TreeviewMaps($id, $data = [])
    { 
        $res = [];
        foreach ($data as $d){
            if($d->pai_id === $id)
            {
                $abrev = explode(',', $d->titulo);
                $res[] = [
                    "id" => $d->id,
                    "abrev" => $abrev[0],
                    "titulo" => $d->titulo,
                    "descricao" => $d->descricao,
                    "pai_id" => $d->pai_id,
                    "categoria_id" => $d->categoria_id,
                    "dependencia" => $this->TreeviewMaps($d->id, $data)
                ];
            }
        }
        return $res;
    }

    function Treeview()
    { 
      
        $colunas = "id, titulo, pai_id, categoria_id";
        $param = [];
        $ordem = ['campo' => 'titulo','ordem' => 'ASC'];

        $res = $this->artefato->filtrar_campo($param, $ordem, $colunas)->result_object();
 
        $pais = [];
        $i = 0;
        // Cria o object com os ID Pais
        foreach ($res as $row)
        {
            if($row->categoria_id === '15')
            {
                $abrev = explode(',', $row->titulo);
                $pais[$row->id] = [
                    "id" => $row->id,
                    "abrev" => $abrev[0],
                    "titulo" => $row->titulo,
                    "descricao" => $row->descricao,
                    "pai_id" => $row->pai_id,
                    "categoria_id" => $row->categoria_id,
                    "dependencia" => $this->TreeviewMaps($row->id, $res)
                ];
            }
        } 
         return $pais ;
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');


include_once(APPPATH . 'core/MS_Controller.php');

class Artefatos extends MS_Controller
{

    private $tela = 'painel/artefatos/';

    function __construct()
    {
        parent::__construct();
        $this->load->model('ArtefatosModel', 'registro', FALSE);
        $this->load->model('CategoriasModel', 'categorias', FALSE);
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data = [ 
            'titulo' => 'Publicação',
            'tela'   => $this->tela,
            'rows'   => $this->DataGridResult(),
        ];
        $this->template->load('painel/layout', $this->tela . 'index', $data);
    }

    function DataGridResult()
    {
        // $get = $this->input->get(); 
    
        $param = [];
        $like = [];
    
        // if (isset($get['description']) && $get['description'] != '') // Verifica se 'description' está definido e não vazio
        //     $like[] = ['campo' => 'upper(nome)', 'valor' => strtoupper($get['description'])];
        // $ordem = ['campo' => 'nome', 'ordem' => 'ASC'];
    
        if (@$get['description'] != '')
            $like[] = ['campo' => 'upper(titulo)', 'valor' => strtoupper($get['description'])];
        $ordem = ['campo' => 'titulo', 'ordem' => 'ASC'];



        $result = $this->registro->filtrar_like($param, $like, $ordem);
        if ($result !== false) {
            $res = $result->result_object();
            return $res;
        } else {
            return [];
        }
    }

    // function DataGridResult()
    // {
    //     //if ($get['descricao'] == '')
    //     //     return ([]);

    //     $param = [];
    //     $like = [];

    //     if ($get['description'] != '')
    //         $like[] = ['campo' => 'upper(nome)', 'valor' => strtoupper($get['description'])];
    //     $ordem = ['campo' => 'nome', 'ordem' => 'ASC'];

    //     $res = $this->registro->filtrar_like($param, $like, $ordem)->result_object();

    //     return $res;
    // }

    function cadastro($id = null) 
    {
        if($id != null){
            $param = [];
            $param[] = ['campo' => 'id', 'valor' => $id];
            $row = $this->registro->filtrar($param, null)->row();
        }

        $data = array(
            'titulo' => $this->titulo,
            'tela' => $this->tela, 
            'categoria'   => $this->categorias->filtrar([])->result_object(),
            'parents'   => $this->registro->filtrar([], ['campo' => 'titulo', 'ordem' => 'ASC'])->result_object(),
            'row' => $row,
        );
        $this->template->load('painel/layout', $this->tela . 'cadastro', $data);
    } 

    function save()
    {

        (array)$atr = $this->registro->atributo(); 
        $reg = $this->input->get_post('Register');

        switch ($this->input->get_post('Op')) 
        {
            case 'I':
                // INSERT 
                $param = array(); 
               // $param['id'] = date('dhis');
                foreach ((object) $atr as $t) 
                {
                    if ($t->coluna != 'id' && $reg[$t->coluna] != '') 
                    {
                        $param[$t->coluna] = $this->registro->atrbtype($reg[$t->coluna], $t->tipo);
                    }
                } 
                $retorno = $this->registro->insere($param);
            break;
            case 'E': 

                $param = [];
                foreach ((object) $reg as $key => $t)
                {
                    if ($t != 'id' && $t != '') 
                    {
                        $param[] = ['campo' => $key,   'valor' => $this->registro->atrbtype($t, 'normal')]; 
                    }
                    elseif ($t != 'id' && $t == '') 
                    { 
                        $param[] = ['campo' => $key,   'valor' => NULL]; 
                    }
                } 
                $key = array(
                    array('campo' => 'id', 'valor' => $reg['id'])
                );                
                $retorno = $this->registro->edite($key, $param);
            break;
            case 'D': 
                $key = array(
                    array('campo' => 'id', 'valor' => $this->input->get_post('token'))
                );
                $retorno = $this->registro->delete($key); 
                echo json_encode($retorno);
            break;
        }

        $label = '<div class="alert alert-'.$retorno['icon'].' alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                    <i class="mdi mdi-'.$retorno['icon-mdi'].' label-icon"></i><strong>'.$retorno['heading'].'</strong> - '.$retorno['text'].'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
        
        $this->session->set_flashdata('register', $label);
        redirect($this->tela, 'refresh');
    } 
}

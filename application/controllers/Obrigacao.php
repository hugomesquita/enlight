<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obrigacao extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html')); 
        $this->load->library('form_validation');
        $this->load->model('ObrigacaosModel', 'obrigacao', FALSE);
        $this->load->model('ObrigacaoEventosModel', 'eventos', FALSE);
        $this->load->model('AgentesModel', 'agentes', FALSE);
        
    }

	public function index()
	{

        $ftrAnoBase = $this->input->post('anoBase')?? '';
        $ftrPerfil = $this->input->post('perfil')? implode("','", $this->input->post('perfil')) : '';
        $ftrEvento = $this->input->post('evento')?? '';
        $ftrTermo = $this->input->post('termo')?? '';

        // Filtro por ano base
        $paramObrigacao = [];
        if($ftrAnoBase !== '') $paramObrigacao[] = ['campo' => 'baseyear', 'valor' => $ftrAnoBase];
        if($ftrTermo !== '')   $paramObrigacao[] = ['campo' => "name like '%".$ftrTermo."%' OR description like '%".$ftrTermo."%'", 'valor' => ''];

        // Filtro dos eventos e perfil
        $paramEvento = [];
        if($ftrPerfil !== '') $paramEvento[] = ['campo' => "agente like '%".implode("%' AND agente like '%", $this->input->post('perfil'))."%'", 'valor' => ''];
        if($ftrEvento !== '') $paramEvento[] = ['campo' => 'classificacao', 'valor' => $ftrEvento];
        if($ftrTermo !== '')  $paramEvento[] = ['campo' => "evento like '%".$ftrTermo."%' ", 'valor' => ''];

        $data = [];
        $data['dados']    = ( count($paramEvento) === 0 || count($paramObrigacao) === 1 ? $this->obrigacao->filtrar($paramObrigacao, ['campo' => 'baseyear, date','ordem' => 'ASC'])->result_object() : [] );
        $data['eventos']  = $this->eventos->filtrar($paramEvento, ['campo' => 'id','ordem' => 'DESC'])->result_object();
        $data['filters']  = $this->ComboLists();
        $data['ano']  = ($ftrAnoBase !== '' ? $ftrAnoBase : date('Y'));
		$this->template->load('layout', 'obrigacao/index', $data);
	}

    function eventsJson()
    {
        
        $param = [];
        $ordem = ['campo' => 'id','ordem' => 'DESC'];

        $res = $this->obrigacao->filtrar($param, $ordem)->result_object();

        $events = [];
        $i = 0;
        foreach($res as $row)
        {
            $events[$i] = [
                "title" => $row->name,
                "start" => $row->date,
                "base" => $row->baseyear,
                "description" => $row->description,
                "download" => base_url($row->filepath),
                "backgroundColor" => 'green',
                "borderColor"=> 'green'
            ];
            $i++;
        }
        echo json_encode($events);
    }

    function ComboLists()
    {
        
        $param = [];
        $res = $this->obrigacao->filtrar($param, ['campo' => 'id','ordem' => 'DESC'])->result_object();
        // Gera Ano base
        $anoBase = [];
        foreach($res as $row) { $anoBase[] = $row->baseyear; }
        $anoBase = array_keys(array_flip($anoBase));

        // Gera Agentes
        $agentes = $this->agentes->filtrar($param, ['campo' => 'name','ordem' => 'ASC'])->result_object(); 

         // Gera Eventos
         $res_evento = $this->eventos->filtrar($param, ['campo' => 'classificacao','ordem' => 'ASC'])->result_object();
         $evento = [];
         foreach($res_evento as $row) { $evento[] = $row->classificacao;}
         $evento = array_keys(array_flip($evento));
        
        return [
            'anoBase' => $anoBase,
            'agente' => $agentes,
            'evento' => $evento,
        ];
    }

}

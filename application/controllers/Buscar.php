<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscar extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html')); 
        $this->load->library('form_validation');

        $this->load->model('TermosModel', 'termos', FALSE);
        $this->load->model('ArtefatosModel', 'artefato', FALSE);
        $this->load->model('SignificadosModel', 'SignificadosModel', FALSE);
    }

	 
	public function index()
	{
        $search = $this->input->get('s');
        $type = $this->input->get('type') ? 'termo' : 'livre'; 
        $data = [
            "chave" => $search,
            'glossario'   => $this->filterGlossario($search),
            'publicacao'   => $this->filterPublicacao($search),
            'legislacao'   => $this->filterLegislacao($search),
            // 'livre' => $this->BuscaAPI($search)
        ];

        if($type === 'termo' ) {
		    $this->template->load('layout', 'buscar/termo', $data);
        } else {
            $this->template->load('layout', 'buscar/livre', $data);
        }
	}

    function filterGlossario($get) 
    {
        $param = [];
        $like = [];
        $param[] = ['campo' => "termo like '%".$get."%'", 'valor' => ''];

        $ordem = ['campo' => 'termo','ordem' => 'ASC'];
        $res = $this->termos->filtrar($param, $ordem)->result_object();

        return($res);
    }

    function filterPublicacao($get) 
    {
        $param = [];
        $like = [];
        $param[] = ['campo' => "categoria_id IN(1,3,5,6,7,8,9,14) AND (upper(titulo) like '%".strtoupper($get)."%' OR upper(descricao) like '%".strtoupper($get)."%' OR upper(conteudo) like '%".strtoupper($get)."%' )", 'valor' => ''];
        $ordem = ['campo' => 'titulo','ordem' => 'ASC'];
        $res = $this->artefato->filtrar($param, $ordem)->result_object();

        return($res);
    }

    function filterLegislacao($get) 
    {
        $param = [];
        $like = [];
        $param[] = ['campo' => "categoria_id IN(2,4,12,15,10) AND ( upper(titulo) like '%".strtoupper($get)."%'   OR upper(descricao) like '%".strtoupper($get)."%' OR upper(conteudo) like '%".strtoupper($get)."%' )", 'valor' => ''];
        $ordem = ['campo' => 'titulo','ordem' => 'ASC'];
        $res = $this->artefato->filtrar($param, $ordem)->result_object();

        return($res);
    }

    function BuscaAPI($text) 
    {
         // Inicia a sessão cURL
        $ch = curl_init();
        
        $params = [
            'question' => $text
        ];
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'https://enlight.uea.edu.br/api/answer_question/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            // CURLOPT_MAXREDIRS => 10,
            // CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($params),
            CURLOPT_HTTPHEADER => array(
                "Content-type: application/json"
            ),
        )); 
        
        // Envia a requisição
        $result = curl_exec($ch); 
        print_r($result);
        (object)$res = json_decode($result);
        // Finaliza a sessão
         // print_r($res);
        curl_close($ch); 
        return($ch);
    } 

    // https://enlight.uea.edu.br/api/answer_question


}

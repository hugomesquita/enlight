<?php
defined('BASEPATH') or exit('No direct script access allowed');


include_once(APPPATH . 'core/MS_Controller.php');

class Obrigacoeseventos extends MS_Controller
{

    private $tela = 'painel/obrigacoeseventos/';

    function __construct()
    {
        parent::__construct();
        $this->load->model('ObrigacaoEventosModel', 'registro', FALSE);
        $this->load->model('AgentesModel', 'agentes', FALSE);
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');

        $this->titulo = 'Agentes';
    }

    public function index()
    {
        $data = [ 
            'titulo' => $this->titulo,
            'tela'   => $this->tela,
            'rows'   => $this->DataGridResult([]),
        ];
        $this->template->load('painel/layout', $this->tela . 'index', $data);
    }

    function DataGridResult($get)
    {
        //if ($get['descricao'] == '')
        //     return ([]);

        $param = [];
        $like = [];

        if (@$get['description'] != '')
            $like[] = ['campo' => 'upper(evento)', 'valor' => strtoupper($get['description'])];
        $ordem = ['campo' => 'evento', 'ordem' => 'ASC'];


        $result = $this->registro->filtrar_like($param, $like, $ordem);
        if ($result !== false) {
            $res = $result->result_object();
            return $res;
        } else {
            return []; 
        }

    }

    function cadastro($id = null)
    {
        $row = null;
    
        if ($id !== null) {
            $param = [['campo' => 'id', 'valor' => $id]];
            $row = $this->registro->filtrar($param, null)->row();
        }
    
        $agentes_result = $this->agentes->filtrar([]);
        $agentes = $agentes_result !== false ? $agentes_result->result_object() : [];
    
        $data = array(
            'titulo' => $this->titulo,
            'tela' => $this->tela,
            'agentes' => $agentes,
            'row' => $row,
        );
        

        $this->template->load('painel/layout', $this->tela . 'cadastro', $data);
    }
    
 



    // public function save()
    // { 
    //     try {
    //         $atr = (array) $this->registro->atributo(); 
    //         $reg = $this->input->post('Register'); // Usando post() ao invés de get_post()
    
    //         // Verifica se é uma inserção ou edição
    //         $op = $this->input->post('Op');
    
    //         switch ($op) {
    //             case 'I':
    //                 // INSERT 
    //                 $param = array(); 
    //                 foreach ($atr as $t) {
    //                     if ($t->coluna != 'id' && isset($reg[$t->coluna]) && $reg[$t->coluna] != '') {
    //                         if ($t->coluna == 'agente' && is_array($reg[$t->coluna])) {
    //                             // Verifica se $reg[$t->coluna] é um array antes de usar implode
    //                             $param[$t->coluna] = implode(', ', $reg[$t->coluna]); // Une os elementos do array em uma string com vírgula
    //                         } else {
    //                             $param[$t->coluna] = $this->registro->atrbtype($reg[$t->coluna], $t->tipo);
    //                         }
    //                     }
    //                 }
                    
    //                 $retorno = $this->registro->insere($param);                    
    //                 break;
    //             case 'E': 
    //                 $param = [];
    //                 foreach ($reg as $key => $t) {
    //                     if ($key != 'id' && $t != '') {
    //                         if ($key == 'agente' && is_string($t)) {
    //                             $param[] = ['campo' => $key, 'valor' => explode(', ', $this->registro->atrbtype($t, 'normal'))]; 
    //                         } else {
    //                             $param[] = ['campo' => $key, 'valor' => $this->registro->atrbtype($t, 'normal')]; 
    //                         }
    //                     } elseif ($key != 'id' && $t == '') { 
    //                         $param[] = ['campo' => $key, 'valor' => NULL]; 
    //                     }
    //                 } 
    
    //                 $key = [['campo' => 'id', 'valor' => isset($reg['id']) ? $reg['id'] : '']];
    
    //                 $retorno = $this->registro->edite($key, $param);
    //                 break;
    //             case 'D': 
                    
    //                 $key = array(
    //                     array('campo' => 'id', 'valor' => $this->input->get_post('token'))
    //                 );

    //                 $retorno = $this->registro->delete($key); 
    //                 echo json_encode($retorno);
    //                 break;
    //             // default:
    //             //     throw new Exception('Operação inválida');
    //         }
    //         $label = '<div class="alert alert-'.$retorno['icon'].' alert-dismissible alert-label-icon label-arrow fade show" role="alert">
    //                 <i class="mdi mdi-'.$retorno['icon-mdi'].' label-icon"></i><strong>'.$retorno['heading'].'</strong> - '.$retorno['text'].'
    //                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //             </div>';

    //         $this->session->set_flashdata('register', $label);
    //         redirect($this->tela, 'refresh');

    //         // Mensagem de sucesso ou erro
    //         // $message = ($op == 'I') ? 'Registro inserido com sucesso!' : 'Registro atualizado com sucesso!';
    //         // $this->session->set_flashdata('register', '<div class="alert alert-success">'.$message.'</div>');
    //         // redirect($this->tela, 'refresh');
            
    
    //     } catch (Exception $e) {
    //         // Em caso de erro, redireciona com mensagem de erro
    //         $this->session->set_flashdata('register', '<div class="alert alert-danger">Erro: '.$e->getMessage().'</div>');
    //         redirect($this->tela, 'refresh');
    //     }
    // }
    

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

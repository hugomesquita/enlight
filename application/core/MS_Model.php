<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MS_Model extends CI_Model
{

    public $tabela = "";
    public $view = "";
    public $tipo = "";
    public $database = 'default';

    public $chaves;
    public $campos;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        $obj = &get_instance();
        $obj->load->library('session');

    }
    
    public function remove_special($value)
    { 
        $return = strtr(
            $value,
            array(
                'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
                'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E',
                'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ð' => 'D', 'Ñ' => 'N',
                'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O',
                'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', '?' => 'R',
                'Þ' => 's', 'ß' => 'B', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
                'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
                'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
                'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
                'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y',
                'þ' => 'b', 'ÿ' => 'y', '?' => 'r', ';' => '', ',' => '-', '��' => 'o', 
                ' ' => '-','$' => '',"'" => '','"' => '',
            )
        );
        return strtolower($return);
    }
    
    
    
    // FUNCAO PARA LISTAR
    // TODOS OS REGISTROS COM CLAUSULAS 'or'
    // DA TABELA
    // RETORNA UM OBJETO/ARRAY
    public function listar_or($param = null)
    {

        if (is_array($param) == null) {
            return null;
        }
        foreach ($param as $p) {
            if ($p['valor'] != '') {
                $this->db->or_where($p['campo'], $p['valor']);
            } else {
                $this->db->or_where($p['campo']);
            }
        }
        $result = $this->db->get($this->view)->result_object();

        return $result;
    }

    // FUNCAO PARA LISTAR
    // TODOS OS REGISTROS
    // DA TABELA COM LIMITES
    // RETORNA UM OBJETO/ARRAY
    public function limite($param = null, $limite = null, $coluna = null)
    {
        
        if(strlen($coluna) > 0)
            $this->db->select($coluna);

        if (!is_array($param) == null) {
            $this->db->order_by($param['campo'], $param['ordem']);
        }
        $this->db->limit($limite['inicio'], $limite['fim']);
        $result = $this->db->get($this->view); 
        return $result;
    }

    // FUNÇÃO PARA IR FILTRANDO
    // ATRASVÉS DOS CAMPOS DA TABELA
    // RETORNA UM OBJETO/ARRAY
     public function filtrar_like($param = null, $like = null, $ordem = null)
    {

        if (is_array($param)) {
            foreach ($param as $p) {
                if ($p['valor'] != '') {
                    $this->db->where($p['campo'], $p['valor']);
                } else {
                    $this->db->where($p['campo']);
                }
            }
        }

        if (!is_array($like) == null) {
            foreach ($like as $l) {
                $this->db->or_like( $l['campo'], $l['valor']);
            }
        }

        if (!is_array($ordem) == null) {
            $this->db->order_by($ordem['campo'], $ordem['ordem']);
        }
        $result = $this->db->get($this->view);
        //echo $this->db->last_query();
        return ($result);
    }

    // FUNÇÃO PARA IR FILTRANDO
    // ATRASVÉS DOS CAMPOS DA TABELA
    // RETORNA UM OBJETO/ARRAY
    public function filtrar($param = null, $ordem = null, $limit = null)
    {

        if (!is_array($param) == null) {
            foreach ($param as $p) {
                if ($p['valor'] != '') {
                    $this->db->where($p['campo'], $p['valor']);
                } else {
                    $this->db->where($p['campo']);
                }
            }
        }

        if (!is_array($ordem) == null) {
            $this->db->order_by($ordem['campo'], $ordem['ordem']);
        }
        
        if ($limit != null)
            $this->db->limit($limit);
        
        $result = $this->db->get($this->view);
        // echo $this->db->last_query();
        //echo  $this->db->_error_message();
        return $result;
        
    }
            
     // FUNÇÃO PARA IR FILTRANDO
    // ATRASVÉS DOS CAMPOS DA TABELA
    // RETORNA UM OBJETO/ARRAY
    public function filtrar_buscar($param, $like = null, $ordem = null)
    {

        if (is_array($param)) {
            foreach ($param as $p) {
                if ($p['valor'] != '') {
                    $this->db->where($p['campo'], $p['valor']);
                } else {
                    $this->db->where($p['campo']);
                }
            }
        }

        if (!is_array($like) == null) {
            foreach ($like as $l) {
                if ($l['valor'] != '') {
                    $this->db->like( $l['campo'], $l['valor']);
                }else{
                    $this->db->like( $l['campo']);
                }
            }
        }

        if (!is_array($ordem) == null) {
            $this->db->order_by($ordem['campo'], $ordem['ordem']);
        }
        $result = $this->db->get($this->view);
        // echo $this->db->last_query();
        return ($result);
        
    }
    
    // FUNÇÃO PARA IR FILTRANDO
    // ATRASVÉS DOS CAMPOS DA TABELA
    // RETORNA UM OBJETO/ARRAY
    public function filtrar_campo($param = null, $ordem = null, $coluna = '')
    {
        
        if(strlen($coluna) > 0)
            $this->db->select($coluna);

        if (!is_array($param) == null) {
            foreach ($param as $p) {
                if ($p['valor'] != '') {
                    $this->db->where($p['campo'], $p['valor']);
                } else {
                    $this->db->where($p['campo']);
                }
            }
        }

        if (!is_array($ordem) == null) {
            $this->db->order_by($ordem['campo'], $ordem['ordem']);
        }

        $result = $this->db->get($this->view);
        // echo $this->db->last_query();
        return $result;
    }

    // FUNÇÃO PARA PEGAR ATRIBUTOS DA TABELA
    public function atributo()
    { 
        $table = explode('.', $this->table);
        $this->db->select(' column_name as coluna, data_type as tipo ');
        // $this->db->where('table_schema', $table[0]);
        $this->db->where('table_name', $table[0]); 
        $result = $this->db->get('information_schema.columns')->result_object(); 
        // echo $this->db->last_query();
        return $result;
    }
    
    private function formatItemList($items)
    {
        $count = count($items);
        if ($count > 2) {
            $lastItem = array_pop($items);
            return implode(', ', $items) . ' e ' . $lastItem;
        } elseif ($count == 2) {
            return implode(' e ', $items);
        } else {
            return reset($items);
        }
    }

    public function atrbtype($value, $type)
    {
        $return = $value;
        switch ($type) {
            case 'varchar':
                $return = (($value == '') ? null : $value);
            break;
            case 'character varying':
                $return = (($value == '') ? null : $value);
            break;
            case 'numeric':
                $return = (($value == '') ? 0 : str_replace(',', '.', $value));
            break;
            case 'double precision':
                $return = (($value == '') ? 0 : str_replace(',', '.', $value));
            break;
            case 'double':
                $return = (($value == '') ? 0 : str_replace(',', '.', $value));
            break;
            case 'integer':
                $cnpj = '';
                $cnpj = str_replace('.', '', $value);
                $cnpj = str_replace('-', '', $cnpj);
                $cnpj = str_replace('/', '', $cnpj);
                $cnpj = str_replace('(', '', $cnpj);
                $cnpj = str_replace(')', '', $cnpj);
                $cnpj = str_replace(' ', '', $cnpj);
                $return = (($cnpj == '') ? NULL : intval($cnpj));
            break;
            case 'bigint':
                $bigint = '';
                $bigint = str_replace('.', '', $value);
                $bigint = str_replace('-', '', $bigint);
                $bigint = str_replace('/', '', $bigint);
                $bigint = str_replace('(', '', $bigint);
                $bigint = str_replace(')', '', $bigint);
                $bigint = str_replace(' ', '', $bigint);
                $return = (($bigint == '') ? NULL : intval($bigint));
            break;
            case 'cpf':
                $bigint = '';
                $bigint = str_replace('.', '', $value);
                $bigint = str_replace('-', '', $bigint);
                $bigint = str_replace('/', '', $bigint);
                $bigint = str_replace('(', '', $bigint);
                $bigint = str_replace(')', '', $bigint);
                $bigint = str_replace(' ', '', $bigint);
                $return = $bigint;
            break;
            case 'character':
                $return = (($value == '') ? 'S' : $value);
            break;
            case 'data':
                $return = (($value == '') ? null : date('Y-m-d', strtotime(implode("-", array_reverse(explode("/", $value))))));
            break;
        }
        return $return;
    }
    
    // FUNCAO PARA INSERIR
    public function insert_batch($data)
    {
        try {
            
            $res = $this->db->insert_batch($this->table, $data);
            $erro = $res->error_message;
            if(strlen($erro[2]) == 0){
                $retorno = array(
                    'retorno' => 'success',
                    'heading' => 'Sucesso',
                    'text'    => 'Cadastro atualizado com sucesso!',
                    'icon'    => 'success',
                    'msg'     => $this->db->last_query(),
                    'id'      => $this->db->insert_id(),
                );
                return $retorno;
            }else{
                //$log = new Dblog_lib();
                $part = explode('DETAIL:',$erro[2]);
                //$log->log = $part[0];
                //$conversao = $log->retorno();
                throw new Exception($part[0]);
            }
        } catch (Exception $e) {
            $retorno = array(
                'retorno' => 'error',
                'heading' => 'Error',
                'text' => $e->getMessage(),
                'icon' => 'danger',
                'msg'   => $this->db->last_query()
            );
            return ($retorno);
        }
    }



    public function insere($data)
    {
        try {
            if (isset($data['agente']) && is_array($data['agente'])) {
                $data['agente'] = $this->formatItemList($data['agente']);
            }
    
            $res = $this->db->insert($this->table, $data);
    
            if ($res) {
                $retorno = array(
                    'retorno' => 'success',
                    'heading' => 'Sucesso',
                    'text' => 'Cadastro atualizado com sucesso!',
                    'icon' => 'success',
                );
                return $retorno;
            } else {
                $erro = $this->db->error();
                throw new Exception($erro['message']);
            }
        } catch (Exception $e) {
            $retorno = array(
                'retorno' => 'error',
                'heading' => 'Error',
                'text' => $e->getMessage(),
                'icon' => 'danger',
            );
            return $retorno;
        }
    }
    
    


    // FUNCAO PARA INSERIR
    // public function insere($data)
    // {
    //     try {
            
    //         $res = $this->db->insert($this->table, $data);
            
    //         if($res['validate'] !== 'error')
    //         {
    //             $retorno = array(
    //                 'retorno' => 'success',
    //                 'heading' => 'Sucesso',
    //                 'text' => 'Cadastro atualizado com sucesso!',
    //                 'icon' => 'success',
    //                 //'msg'   => $this->db->last_query()
    //             );
    //             return $retorno;
    //         }else{
    //             $erro = $res['message']; 
    //             throw new Exception($erro['message']);
    //         }
    //     } catch (Exception $e) {
    //         $retorno = array(
    //             'retorno' => 'error',
    //             'heading' => 'Error',
    //             'text' => $e->getMessage(),
    //             'icon' => 'danger',
    //             //'msg'   => $this->db->last_query()
    //         );  
    //         // print_r($retorno);
    //         return ($retorno);
    //     }
    // }

    // FUNCAO PARA EDITAR
    // public function edite($key, $param)
    // {

    //     try {
            
    //         if (is_array($key) == null || is_array($param) == null) {
    //             $retorno = array(
    //                 'retorno' => 'error',
    //                 'heading' => 'Error',
    //                 'text' => 'Informe todos os campos obrigatórios.',
    //                 'icon' => 'danger',
    //                 'msg'   => $this->db->last_query()
    //             );
    //             return ($retorno);
    //         }

    //         // PEGA OS VALOR A SEREM ATUALIZADOS
    //         foreach ($param as $p) {
    //             if ($p['valor'] != 'null') {
    //                 $this->db->set($p['campo'], $p['valor']);
    //             }elseif ($p['valor'] == null) {
    //                 $this->db->set($p['campo'], null);
    //             }else {
    //                 $this->db->set($p['campo']);
    //             }
    //         }

    //         // PEGA A CHAVE DA TABELA
    //         foreach ($key as $k) {
    //             $this->db->where($k['campo'], $k['valor']);
    //         }
            
    //         $res = $this->db->update($this->table);

    //         if($res['validate'] !== 'error')
    //         {
    //             $retorno = array(
    //                 'retorno' => 'success',
    //                 'heading' => 'Sucesso',
    //                 'text' => 'Registro atualizado com sucesso!',
    //                 'icon' => 'success',
    //                 'msg'   => $this->db->last_query()
    //             );
    //            // echo $this->db->last_query();
    //             return $retorno;
    //         }else{
    //             $erro = $res['message']; 
    //             throw new Exception($erro['message']);
    //         }
    //     } catch (Exception $e) {
    //         $retorno = array(
    //             'retorno' => 'error',
    //             'heading' => 'Error',
    //             'text' => $e->getMessage(),
    //             'icon' => 'danger',
    //             //'msg'   => $this->db->last_query()
    //         );
    //         // echo $this->db->last_query();
    //         return ($retorno);
    //     }
    // }

    
    // public function edite($key, $param)
    // {
    //     try {
    //         if (!is_array($key) || !is_array($param)) {
    //             throw new Exception('Key and param must be arrays');
    //         }
    
    //         foreach ($param as $p) {
    //             if (!isset($p['campo'], $p['valor'])) {
    //                 throw new Exception('Invalid parameter structure');
    //             }
    //         }
    
    //         // PEGA OS VALOR A SEREM ATUALIZADOS
    //         foreach ($param as $p) {
    //             if ($p['valor'] !== 'null') {
    //                 $this->db->set($p['campo'], $p['valor']);
    //             } elseif ($p['valor'] === null) {
    //                 $this->db->set($p['campo'], null);
    //             } else {
    //                 $this->db->set($p['campo']);
    //             }
    //         }
    
    //         // PEGA A CHAVE DA TABELA
    //         foreach ($key as $k) {
    //             if (!isset($k['campo'], $k['valor'])) {
    //                 throw new Exception('Invalid key structure');
    //             }
    //             $this->db->where($k['campo'], $k['valor']);
    //         }
    
    //         $res = $this->db->update($this->table);
    
    //         if ($res === true) {
    //             $retorno = array(
    //                 'retorno' => 'success',
    //                 'heading' => 'Sucesso',
    //                 'text' => 'Registro atualizado com sucesso!',
    //                 'icon' => 'success',
    //                 'msg' => $this->db->last_query()
    //             );
    //             return $retorno;
    //         } else {
    //             throw new Exception('Update operation failed');
    //         }
    //     } catch (Exception $e) {
    //         $retorno = array(
    //             'retorno' => 'error',
    //             'heading' => 'Error',
    //             'text' => $e->getMessage(),
    //             'icon' => 'danger',
    //             'msg' => $this->db->last_query()
    //         );
    //         return $retorno;
    //     }
    // }
        
 
    public function edite($key, $param)
    {
        try {
            if (!is_array($key) || !is_array($param)) {
                throw new Exception('Key and param must be arrays');
            }
    
            foreach ($param as $p) {
                if (!isset($p['campo'], $p['valor'])) {
                    throw new Exception('Invalid parameter structure');
                }
            }
    
            // PEGA OS VALORES A SEREM ATUALIZADOS
            foreach ($param as $p) {
                if ($p['valor'] !== 'null') {
                    // Verifica se $p['valor'] é um array e converte para string se necessário
                    if (is_array($p['valor'])) {
                        $valor = $this->formatItemList($p['valor']); // Converte o array em uma string separada por vírgulas
                    } else {
                        $valor = $p['valor']; // Mantém o valor como está se não for um array
                    }
                    $this->db->set($p['campo'], $valor);
                } elseif ($p['valor'] === null) {
                    $this->db->set($p['campo'], null);
                } else {
                    $this->db->set($p['campo']);
                }
            }
    
            // PEGA A CHAVE DA TABELA
            foreach ($key as $k) {
                if (!isset($k['campo'], $k['valor'])) {
                    throw new Exception('Invalid key structure');
                }
                $this->db->where($k['campo'], $k['valor']);
            }
    
            $res = $this->db->update($this->table);
    
            if ($res === true) {
                $retorno = array(
                    'retorno' => 'success',
                    'heading' => 'Sucesso',
                    'text' => 'Registro atualizado com sucesso!',
                    'icon' => 'success',
                    'msg' => $this->db->last_query()
                );
                return $retorno;
            } else {
                throw new Exception('Update operation failed');
            }
        } catch (Exception $e) {
            $retorno = array(
                'retorno' => 'error',
                'heading' => 'Error',
                'text' => $e->getMessage(),
                'icon' => 'danger',
                'msg' => $this->db->last_query()
            );
            return $retorno;
        }
    }
        


    // FUNCAO PARA DELETAR
    public function delete($param)
    {
        try {
            if (is_array($param) == null) {
                return null;
            }
            foreach ($param as $p) {
                $this->db->where($p['campo'], $p['valor']);
            }
            $res = $this->db->delete($this->table);
            
            if($res['validate'] !== 'error')
            {
                $retorno = array(
                    'retorno' => 'success',
                    'heading' => 'Sucesso',
                    'text' => 'Registro excluído com sucesso!',
                    'icon' => 'success',
                    //'msg'   => $this->db->last_query()
                );
                return $retorno;
            }else{
                $erro = $res['message']; 
                throw new Exception($erro['message']);
            }
        } catch (Exception $e) {
            $retorno = array(
                'retorno' => 'danger',
                'heading' => 'Error',
                'text' => $e->getMessage(),
                'icon' => 'danger',
                // 'msg'   => $this->db->last_query()
            );
            return ($retorno);
        }
        
    }
  
    public function views($view, $param, $ordem = null)
    {

        if (is_array($param)) {
            foreach ($param as $p) {
                if ($p['valor'] != '') {
                    $this->db->where($p['campo'], $p['valor']);
                }
            }
        }

        if (!is_array($ordem) == null) {
            $this->db->order_by($ordem['campo'], $ordem['ordem']);
        }

        $result = $this->db->get($view);
        // echo $this->db->last_query();
        return $result;
    }

}
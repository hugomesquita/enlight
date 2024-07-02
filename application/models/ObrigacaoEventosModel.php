<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ObrigacaoEventosModel extends MS_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'obrigacao_eventos';
        $this->view = 'obrigacao_eventos'; 
    }
}
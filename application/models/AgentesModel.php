<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AgentesModel extends MS_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'agentes';
        $this->view = 'agentes'; 
    }
}
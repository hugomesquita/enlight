<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ArtefatosModel extends MS_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'artefatos';
        $this->view = 'vw_artefatos'; 
    }
}
<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ObrigacaosModel extends MS_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'obrigacaos';
        $this->view = 'obrigacaos'; 
    }
}
<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class TermosModel extends MS_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'termos';
        $this->view = 'termos'; 
    }

    
}
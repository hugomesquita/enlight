<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class SignificadosModel extends MS_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'significados';
        $this->view = 'significados'; 
    }
}
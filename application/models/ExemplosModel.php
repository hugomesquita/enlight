<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ExemplosModel extends MS_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'exemplos';
        $this->view = 'exemplos'; 
    }
}
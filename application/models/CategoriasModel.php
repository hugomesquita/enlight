<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class CategoriasModel extends MS_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'categorias';
        $this->view = 'categorias'; 
    }
}
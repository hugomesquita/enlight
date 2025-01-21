<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class PalavraChaveModel extends MS_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'palavra_chaves';
        $this->view = 'palavra_chaves'; 
    }
}
<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class PerfisModel extends MS_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'perfis';
        $this->view = 'perfis'; 
    }
}
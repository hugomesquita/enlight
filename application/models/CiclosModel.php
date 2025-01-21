<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class CiclosModel extends MS_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'ciclos';
        $this->view = 'ciclos'; 
    }
}
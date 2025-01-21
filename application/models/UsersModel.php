<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class UsersModel extends MS_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'users';
        $this->view = 'users'; 
    }
}
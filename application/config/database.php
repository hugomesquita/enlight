<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => '200.98.136.138', //'mysql.l2sapollo.kinghost.net',
	'username' => 'codeigniter_user', //'l2sapollo',
	'password' => 'codeigniter_password', //'Eleonor18',
	'database' => 'codeigniter_db', //'l2sapollo',
	'dbdriver' => 'mysqli',
	'port'     => '3306',
	'dbprefix' => '',
	'pconnect' => TRUE,
	'db_debug' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

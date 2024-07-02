<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = [
    'translate_uri_dashes' => true,
    'default_controller'   => "main",
    'error_override'       => 'painel/main/error404', 
    '404_override'         => 'painel/main/error404',
    '500_override'         => 'painel/main/error404',
    'legislacao/(:num)'    => "legislacao/index/$1",
    'legislacao/(:num)/(:num)'    => "legislacao/index/$1/$2",
];

$auth = [
    'painel/login/token'  => "painel/login/token",
    'painel/login/logout' => "painel/login/logout",
];


$cadastro = [
    // CATEGORIAS
    'painel/categorias' => "painel/categorias",
    'painel/categorias/(:num)' => "painel/categorias/cadastro/$1",
    'painel/categorias/save'   => "painel/categorias/save",

    // ARTEFATOS
    'painel/artefatos'        => "painel/artefatos",
    'painel/artefatos/(:num)' => "painel/artefatos/cadastro/$1",
    'painel/artefatos/save'   => "painel/artefatos/save",

    // TERMOS
    'painel/termos'        => "painel/termos",
    'painel/termos/(:num)' => "painel/termos/cadastro/$1",
    'painel/termos/save'   => "painel/termos/save",

    // CICLOS
    'painel/ciclos'        => "painel/ciclos",
    'painel/ciclos/(:num)' => "painel/ciclos/cadastro/$1",
    'painel/ciclos/save'   => "painel/ciclos/save",

    // TAGS
    'painel/palavrachave'        => "painel/palavrachave",
    'painel/palavrachave/(:num)' => "painel/palavrachave/cadastro/$1",
    'painel/palavrachave/save'   => "painel/palavrachave/save",

    // Significados
    'painel/significados'        => "painel/significados",
    'painel/significados/(:num)' => "painel/significados/cadastro/$1",
    'painel/significados/save'   => "painel/significados/save",

    // Perfis
    'painel/perfis'        => "painel/perfis",
    'painel/perfis/(:num)' => "painel/perfis/cadastro/$1",
    'painel/perfis/save'   => "painel/perfis/save",


    // Agentes
    'painel/agentes'        => "painel/agentes",
    'painel/agentes/(:num)' => "painel/agentes/cadastro/$1",
    'painel/agentes/save'   => "painel/agentes/save",


    // Obrigações
    'painel/obrigacoes'        => "painel/obrigacoes",
    'painel/obrigacoes/(:num)' => "painel/obrigacoes/cadastro/$1",
    'painel/obrigacoes/save'   => "painel/obrigacoes/save",

    // Obrigações
    'painel/obrigacoeseventos'        => "painel/obrigacoeseventos",
    'painel/obrigacoeseventos/(:num)' => "painel/obrigacoeseventos/cadastro/$1",
    'painel/obrigacoeseventos/save'   => "painel/obrigacoeseventos/save",

    
];

$route = array_merge($config, $auth, $cadastro);
 
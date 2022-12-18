<?php
/*
 * Environment - define o ambiente que desejo acessa
 * 	development - desenvolvimento
 * 	prodution - repositório web
 */
define("ENVIRONMENT", "development");

//nome do projeto
define("NAME_PROJECT", "Projeto Mini-Framework");

$config = array();
if (ENVIRONMENT == 'development') {
    //Raiz
    define("BASE_URL", "http://localhost/sispam/");
    //Nome do banco
    $config['dbname'] = 'sispam';
    //host
    $config['host'] = 'localhost';
    //usuario
    $config['user'] = 'root';
    //senha
    $config['pass'] = '';
} else {
    //Raiz
    define("BASE_URL", "http://localhost/sispam/");
    //Nome do banco
    $config['dbname'] = 'mini-framework';
    //host
    $config['host'] = 'localhost';
    //usuario
    $config['user'] = 'root';
    //senha
    $config['pass'] = '';
};
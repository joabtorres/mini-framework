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
    $config['db']['dbname'] = 'sispam';
    //host
    $config['db']['host'] = 'localhost';
    //usuario
    $config['db']['user'] = 'root';
    //senha
    $config['db']['pass'] = '';
} else {
    //Raiz
    define("BASE_URL", "http://localhost/sispam/");
    //Nome do banco
    $config['db']['dbname'] = 'mini-framework';
    //host
    $config['db']['host'] = 'localhost';
    //usuario
    $config['db']['user'] = 'root';
    //senha
    $config['db']['pass'] = '';
};
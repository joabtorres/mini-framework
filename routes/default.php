<?php

router::get('', function ($arg) {
    $view = template::getInstance();

    $dados = array('nome' => 'Joab Torres Alencar');

    $view->loadTemplate('home', $dados);
});

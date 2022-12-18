<?php
class template
{
    private function __construct() {
    }
    public static function getInstance() {
        static $inst = null;
        if ($inst === null) {
            $inst = new template();
        }
        return $inst;
    }
    public function loadView($viewName, $viewData = array()) {
        if (file_exists('templates/' . $viewName . '.php')) {
            extract($viewData);
            require 'templates/' . $viewName . '.php';
        }
    }
}
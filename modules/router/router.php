<?php
class router
{
    private $core;
    private $get;
    private $post;
    private function __construct() {
    }
    public static function getInstance() {
        static $inst = null;
        if ($inst === null) {
            $inst = new router();
        }
        return $inst;
    }

    public function load() {
        $this->core = core::getInstance();
        $this->loadRouteFile('default');
        return $this;
    }
    public function loadRouteFile($f) {
        if (file_exists('routes/' . $f . '.php')) {
            require 'routes/' . $f . '.php';
        }
    }

    public function match () {
        $url = (isset($_GET['url'])) ? $_GET['url'] : '';
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
            default:
                $type = $this->get;
                break;
            case 'POST':
                $type = $this->post;
                break;
        }
        //Loop em todos os routes
        foreach ($type as $pt => $func) {
            //identifica os argumentos e substitui por regex
            $pattern = preg_replace('(\{[a-z0-9]{0,}\})', '([a-z0-9]{0,})', $pt);
            //faz o match de URL
            if (preg_match('#^(' . $pattern . ')*$#i', $url, $matches) === 1) {
                array_shift($matches);
                array_shift($matches);
                //pega todos os argumentos para associar
                $itens = array();
                if (preg_match_all('(\{[a-z0-9]{0,}\})', $pt, $m)) {
                    $itens = preg_replace('(\{|\})', '', $m[0]);
                }
                //faz a associação
                $arg = array();
                foreach ($matches as $key => $match) {
                    $arg[$itens[$key]] = $match;
                }
                $func($arg);
                break;

            } else {
                $template = template::getInstance();
                $template->loadView('404');
                break;
            }
        }
    }

    public static function get($pattern, $function) {
        router::getInstance()->get[$pattern] = $function;
    }

    public static function post($pattern, $function) {
        router::getInstance()->post[$pattern] = $function;
    }

}

?>
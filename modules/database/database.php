<?php
class database
{
    private $pdo;
    private function __construct() {
        $core = core::getInstance();
        $db = $core->getConfig('db');
        try {
            $this->pdo = new PDO("mysql:dbname=" . $db['dbname'] . ";host=" . $db['host'].';charset=utf8', $db['user'], $db['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public static function getInstance() {
        static $inst = null;
        if ($inst === null) {
            $inst = new database();
        }
        return $inst;
    }

    public function query($sql) {
        return $this->pdo->query($sql);
    }
    public function prepare($sql) {
        return $this->pdo->prepare($sql);
    }
}
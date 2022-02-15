<?php

class Router
{
    public function run() : void {

        $file = '';
        $controller = '';
        $action = '';
        $args = [];

        $this->getController($file, $controller, $action, $args);

        if(!is_readable($file)) {
            die("404 Not Found");
        }

        require_once $file;
        $controllerObj = new $controller();

        if(!is_callable([$controllerObj, $action])) {
            die("404 Not Found");
        }

        $controllerObj->$action($args);
    }

    private function getController(string & $file, string & $controller, string & $action, array & $args) : void {
        $parts = parse_url($this->getURI());

        parse_str( $parts['query'] ?? '' , $args);

        $path = explode('/', $parts['path']);

        $controller = array_shift($path);

        if(empty($controller)) {
            $controller = 'user';
        }

        $action = array_shift($path);
        if(empty($action)) {
            $action = 'index';
        }

        $controller = ucfirst($controller) . 'Controller';
        $action = $action . 'Action';
        $file = DIR . DS . 'src' . DS . 'Controller' . DS . $controller . '.php';
    }

    private function getURI() : string {
        $uri = $_SERVER['REQUEST_URI'];
        return trim($uri, '/');
    }
}
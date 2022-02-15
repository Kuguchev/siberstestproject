<?php

class Template
{
    private string $dirControllerName;

    public function __construct(string $controllerName)
    {
        $this->dirControllerName = strtolower(str_replace('Controller', '', $controllerName));;
    }

    public function render(string $templateName, array $args = []) : void
    {
        $baseTemplatePath = DIR . DS . 'templates' . DS . 'base.php';
        $controllerTemplatePath = DIR . DS . 'templates' . DS . $this->dirControllerName . DS . $templateName . '.php';

        foreach($args as $key => $value) {
            $$key = $value;
        }
        require_once $baseTemplatePath;
    }
}
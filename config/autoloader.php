<?php

spl_autoload_register(function (string $className) {
    $fileName = $className . '.php';

    $folders = [
        'config',
        'router',
        'src' . DS . 'Controller',
        'src' . DS . 'Entity',
        'src' . DS . 'Repository',
    ];

    foreach ($folders as $folder) {
        $file = DIR . DS . $folder . DS . $fileName;

        if(is_readable($file)) {
            require_once $file;
            break;
        }
    }
});

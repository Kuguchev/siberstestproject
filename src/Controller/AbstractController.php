<?php

use JetBrains\PhpStorm\Pure;

abstract class AbstractController
{
    protected Template $template;

    public function __construct()
    {
        $this->template = new Template(get_class($this));
    }
}
<?php

namespace App\Views;

use Core\View;

class HomePage extends View
{

    public function __construct()
    {
        parent::__construct($this->data);
    }

    public function render($templatePath = '')
    {
        return parent::render('../app/templates/home.tpl.php');
    }
}
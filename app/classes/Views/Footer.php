<?php

namespace App\Views;

use Core\View;

class Footer extends View
{


    public function __construct()
    {
        parent::__construct($this->data);

    }


    public function render($templatePath = '')
    {
        return parent::render('../app/templates/footer.tpl.php'); // TODO: Change the autogenerated stub
    }
}
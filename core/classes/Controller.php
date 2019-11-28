<?php

namespace Core;

use App\Views\Navbar;

class Controller
{

    /**
     * Page data container
     * @var array
     */
    protected $page;

    public function __construct()
    {


        // Init Page Defaults
        $this->page = [
            'title' => 'Taxi',
            'stylesheets' => ['media/CSS/main.css'],
            'scripts' => [
                'head' => [],
                'body_start' => [],
                'body_end' => [],
            ],
            'header' => (new \App\Views\NavBar())->render(),
            'footer' => (new \App\Views\Footer())->render(),
            'content' => [
            ],

        ];
    }

    public function onRender()
    {
        return (new View($this->page))->render(ROOT . $templatePath);
    }

}

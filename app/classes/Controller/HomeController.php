<?php

namespace App\Controller;

use App\Views\LoginForm;
use Core\Controller;
use Core\View;

class HomeController extends Controller
{

    public $form;

    public function __construct()
    {
        parent::__construct();
        $this->form = new LoginForm();

    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializePost()
    {

        $this->page['content'] = ['homeForm' => $this->form->validateForm()];


    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializeGet()
    {

        $this->page['content'] = ['homeForm' => 'home page'];


    }

    public function onRender()
    {
        return (new View($this->page))->render(ROOT . '/core/views/layout.tpl.php');
    }
};
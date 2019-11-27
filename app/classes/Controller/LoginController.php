<?php

namespace App\Controller;

use App\App;
use Core\Controller;
use Core\View;
use App\Views\LoginForm;

class LoginController extends Controller
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
        $this->page['header'] = (new \App\Views\NavBar())->render();
        $this->page['content'] = ['LoginForm' => $this->form->validateForm()];

        $this->page['stylesheets'][]= 'media/CSS/forms.css';

    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializeGet()
    {

        $this->page['stylesheets'][]= 'media/CSS/forms.css';
        $this->page['content'] = ['registerForm' => (new \App\Views\LoginForm())->render()];
        $this->page['header'] = (new \App\Views\NavBar())->render();

    }

    public function onRender()
    {
        return (new View($this->page))->render(ROOT . '/core/views/layout.tpl.php');
    }
};
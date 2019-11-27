<?php

namespace App\Controller;

use Core\Controller;
use App\Views\RegisterForm;
use Core\User\User;
use App\App;
use Core\View;

class RegisterController extends Controller
{
    public $form;

    public function __construct()
    {
        parent::__construct();
        $this->form = new RegisterForm();
    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializePost()
    {

        $this->page['content'] = ['registerForm' => $this->form->validateForm()];
    }

    /**
     * @param
     * @throws \Exception
     */
    public function initializeGet()
    {
        $this->page['content'] = ['registerForm' => (new \App\Views\RegisterForm())->render()];
    }

    public function onRender()
    {
        return (new View($this->page))->render(ROOT . '/core/views/layout.tpl.php');
    }
};